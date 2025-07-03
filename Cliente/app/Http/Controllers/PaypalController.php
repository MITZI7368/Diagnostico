<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalController extends Controller
{
    private $client;

    public function __construct()
    {
        // Configurar el entorno PayPal
        $paypalConf = config('services.paypal');
        $environment = new SandboxEnvironment(
            $paypalConf['client_id'],
            $paypalConf['secret']
        );

        $this->client = new PayPalHttpClient($environment);
    }

    public function checkout(Request $request)
    {
        $carrito = (array) session('cart', []);

        if (empty($carrito)) {
            return redirect()->route('pedidos.crear')->with('error', 'Tu carrito está vacío.');
        }

        $total = 0;
        $items_paypal = [];

        foreach ($carrito as $producto_id => $item) {
            $producto = Producto::find($producto_id);

            if (!$producto) {
                continue;
            }

            $precio = (float) $producto->precio;
            $cantidad = (int) $item['cantidad'];
            $total += $precio * $cantidad;

            $items_paypal[] = [
                "name" => $producto->nombre,
                "unit_amount" => [
                    "currency_code" => "MXN",
                    "value" => number_format($precio, 2, '.', '')
                ],
                "quantity" => $cantidad
            ];
        }

        $request_paypal = new OrdersCreateRequest();
        $request_paypal->prefer('return=representation');
        $request_paypal->body = $this->createRequestBody($total, $items_paypal);

        try {
            $response = $this->client->execute($request_paypal);

            session([
                'paypal_order_id' => $response->result->id,
                'direccion' => $request->input('direccion'),
                'total_pedido' => $total
            ]);

            $approvalLink = collect($response->result->links)->firstWhere('rel', 'approve')->href;
            return redirect()->away($approvalLink);

        } catch (\Exception $e) {
            return redirect()->route('pedidos.crear')
                ->with('error', 'Error al procesar el pago: ' . $e->getMessage());
        }
    }

    protected function createRequestBody($total, $items)
    {
        return [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "reference_id" => "ORDER-" . uniqid(),
                    "description" => "Compra en " . config('app.name'),
                    "amount" => [
                        "currency_code" => "MXN",
                        "value" => number_format($total, 2, '.', ''),
                        "breakdown" => [
                            "item_total" => [
                                "currency_code" => "MXN",
                                "value" => number_format($total, 2, '.', '')
                            ]
                        ]
                    ],
                    "items" => $items
                ]
            ],
            "application_context" => [
                "brand_name" => config('app.name'),
                "locale" => "es-MX",
                "landing_page" => "BILLING",
                "shipping_preference" => "NO_SHIPPING",
                "user_action" => "PAY_NOW",
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel')
            ]
        ];
    }

    public function success(Request $request)
    {
        $orderId = session('paypal_order_id');
        $direccion = session('direccion');
        $total = session('total_pedido');

        if (empty($orderId)) {
            return redirect()->route('pedidos.crear')->with('error', 'ID de orden de PayPal no encontrado.');
        }

        try {
            $captureRequest = new OrdersCaptureRequest($orderId);
            $response = $this->client->execute($captureRequest);

            if ($response->result->status == "COMPLETED") {
                $this->createOrder($direccion, $total);
                session()->forget(['paypal_order_id', 'direccion', 'total_pedido', 'cart']);
                return redirect()->route('dashboard')->with('success', '¡Pago realizado con éxito!');
            }

            return redirect()->route('pedidos.crear')
                ->with('error', 'El pago no fue completado. Estado: ' . $response->result->status);

        } catch (\Exception $e) {
            return redirect()->route('pedidos.crear')
                ->with('error', 'Error al confirmar el pago: ' . $e->getMessage());
        }
    }

    protected function createOrder($direccion, $total)
    {
        $carrito = (array) session('cart', []);
        
        $pedido = Pedido::create([
            'clientes_id' => Auth::id(),
            'fecha_pedido' => now(),
            'estado' => 'pagado',
            'total' => $total,
            'direccion_entrega' => $direccion,
            'iva' => 0,
            'descuento' => 0,
        ]);

        foreach ($carrito as $producto_id => $item) {
            $pedido->productos()->attach($producto_id, [
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
            ]);
        }

        return $pedido;
    }

    public function cancel()
    {
        return redirect()->route('pedidos.crear')->with('error', 'El pago fue cancelado.');
    }
}