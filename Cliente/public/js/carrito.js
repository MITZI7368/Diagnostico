// Botones del carrito
let btnIncrementar = document.querySelectorAll('.btn-incrementar');
let btnDecrementar = document.querySelectorAll('.btn-decrementar');
let btnEliminar = document.querySelectorAll('.btn-eliminar');
let spanTotal = document.getElementById('total-carrito');

// Aumentar cantidad de producto
function incrementarCantidad(boton) {
    let contenedor = boton.parentElement;
    let spanCantidad = contenedor.querySelector('.cantidad');
    let cantidadActual = parseInt(spanCantidad.textContent);
    spanCantidad.textContent = cantidadActual + 1;
    actualizarTotal();
}

// Disminuir cantidad de producto
function decrementarCantidad(boton) {
    let contenedor = boton.parentElement;
    let spanCantidad = contenedor.querySelector('.cantidad');
    let cantidadActual = parseInt(spanCantidad.textContent);
    
    if (cantidadActual > 1) {
        spanCantidad.textContent = cantidadActual - 1;
        actualizarTotal();
    }
}

// Eliminar producto del carrito
function eliminarProducto(boton) {
    let confirmarEliminacion = confirm('¿Quieres eliminar este producto?');
    
    if (confirmarEliminacion) {
        let producto = boton.closest('.producto-carrito');
        let idProducto = producto.dataset.id;

        // Comunicación con el servidor
        let token = document.querySelector('meta[name="csrf-token"]').content;
        
        fetch('/carrito/eliminar/' + idProducto, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            }
        })
        .then(respuesta => respuesta.json())
        .then(datos => {
            if (datos.success) {
                producto.remove();
                actualizarTotal();
            }
        });
    }
}

// Calcular el total del carrito
function actualizarTotal() {
    let subtotal = 0;
    let productosEnCarrito = document.querySelectorAll('.producto-carrito');
    
    productosEnCarrito.forEach(function(producto) {
        let precioProducto = parseFloat(producto.dataset.precio);
        let cantidadProducto = parseInt(producto.querySelector('.cantidad').textContent);
        let descuento = parseFloat(producto.dataset.descuento) || 0;
        
        // Aplicar descuento si existe
        if (descuento > 0) {
            precioProducto = precioProducto * (1 - descuento/100);
        }
        
        subtotal = subtotal + (precioProducto * cantidadProducto);
    });

    let iva = subtotal * 0.16; // Calculamos el IVA (16%)
    let total = subtotal + iva;

    // Actualizamos los elementos en el DOM
    document.getElementById('subtotal-carrito').textContent = '$' + subtotal.toFixed(2);
    document.getElementById('iva-carrito').textContent = '$' + iva.toFixed(2);
    document.getElementById('total-carrito').textContent = '$' + total.toFixed(2);
}

// Activar botones
btnIncrementar.forEach(function(boton) {
    boton.onclick = function() {
        incrementarCantidad(this);
    };
});

btnDecrementar.forEach(function(boton) {
    boton.onclick = function() {
        decrementarCantidad(this);
    };
});

btnEliminar.forEach(function(boton) {
    boton.onclick = function() {
        eliminarProducto(this);
    };
});

// Calcular total al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    actualizarTotal();
});