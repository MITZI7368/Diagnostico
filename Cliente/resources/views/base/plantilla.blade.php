<!DOCTYPE html>
<html lang="en">
<head>
    @php
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Storage;
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
    <!-- Actualizar estos scripts para model-viewer -->
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.3.0/model-viewer.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    {{-- Header Navbar --}}
    <header>
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Diagnostico</span>
                </a>
                <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                    <span class="sr-only">Abrir menú principal</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="{{ route('dashboard.index') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 dark:text-white">Inicio</a>
                        </li>
                        <li class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center py-2 px-3 text-gray-900 hover:bg-gray-100 dark:text-white">
                                Categorías
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                <a href="{{ route('catalogo.listado', ['categoria' => 'Ginecología']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ginecología</a>
<a href="{{ route('catalogo.listado', ['categoria' => 'Odontología']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Odontología</a>
<a href="{{ route('catalogo.listado', ['categoria' => 'Análisis Clínico']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Análisis Clínico</a>

                            </div>
                        </li>
                        <li>
                            <a href="{{ route('catalogo.listado') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 dark:text-white">Productos</a>
                        </li>
                        <li>
                            <a href="{{ route('carrito.carrito') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 dark:text-white">
                                <svg class="w-6 h-6 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Carrito
                            </a>
                        </li>
                        @guest
                            <li>
                                <a href="{{ route('registro') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 dark:text-white">Registrarse</a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 dark:text-white">Iniciar Sesión</a>
                            </li>
                        @else
                            <li class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center py-2 px-3 text-gray-900 hover:bg-gray-100 dark:text-white">
                                    <span>{{ Auth::user()->name }}</span>
                                    
                                </button>
                                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                    <div class="px-4 py-2 text-sm text-gray-700">
                                        <div>{{ Auth::user()->email }}</div>
                                    </div>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Cerrar sesión
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{-- fin del header --}}
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="#" class="#">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Bienvenidos a diagnostico</span>
      </a>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        </ul>
      </div>
    </div>
</nav>

    {{-- Content --}}
    <main>
      {{-- Contenido dinamico --}}
    @yield('contenido')
      {{-- Contenido dinamico --}}
    </main>
    {{-- fin del Content --}}

    {{-- Footer --}}
    <footer class="bg-white dark:bg-gray-900">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <span class="text-2xl font-semibold dark:text-white">Diagnostico de imagen</span>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">
                        Soluciones en diagnóstico médico
                    </p>
                </div>
                
                <div class="grid grid-cols-2 gap-8 sm:gap-6">
                    <div>
                        <h2 class="mb-4 text-sm font-semibold uppercase dark:text-white">Empresa</h2>
                        <ul class="text-gray-500 dark:text-gray-400">
                            <li class="mb-2">
                                <a href="{{ route('nosotros') }}" class="hover:text-gray-900 dark:hover:text-white">Sobre Nosotros</a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('contacto') }}" class="hover:text-gray-900 dark:hover:text-white">Contacto</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-4 text-sm font-semibold uppercase dark:text-white">Legal</h2>
                        <ul class="text-gray-500 dark:text-gray-400">
                            <li class="mb-2">
                                <a href="/documentos/act_marlene.pdf" target="_blank" class="hover:text-gray-900 dark:hover:text-white">Aviso de Privacidad</a>
                            </li>
                            <li class="mb-2">
                                <a href="/documentos/Devoluciones_y_cancelaciones.pdf" target="_blank" class="hover:text-gray-900 dark:hover:text-white">devoluciones y cancelaciones</a>
                            </li>
                            <li class="mb-2">
                                <a href="/documentos/PoliticasPedidos.pdf" target="_blank" class="hover:text-gray-900 dark:hover:text-white">Politicas de pedidos</a>
                            </li>
                            <li class="mb-2">
                                <a href="/documentos/Politicagarantia.pdf" target="_blank" class="hover:text-gray-900 dark:hover:text-white">Politicas de garantía</a>
                            </li>
                            <li class="mb-2">
                                <a href="/documentos/Terminos_condiciones.pdf" target="_blank" class="hover:text-gray-900 dark:hover:text-white">Terminos y condiciones</a>
                            </li>
                            <li class="mb-2">
                                <a href="/documentos/Propiedad_intelectual.pdf" target="_blank" class="hover:text-gray-900 dark:hover:text-white">Política de propiedad intelectual</a>
                            </li>
                            <li class="mb-2">
                                {{-- <a href="/documentos/act_marlene.pdf" download class="hover:text-gray-900 dark:hover:text-white">Descargar Aviso de Privacidad</a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            
            <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                © 2025 Diagnostico™.
 <a href="#" class="hover:underline">Diagnostico™</a>. Todos los derechos reservados.
                <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
                                        <a href="https://www.facebook.com/profile.php?id=61577614748867&locale=es_LA" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                                        <a href="https://www.instagram.com/diagnostico.imagen/?next=%2Fstories%2Fhighlights%2F18129529759436261%2F" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm3.338 2.015a1.2 1.2 0 100 2.4 1.2 1.2 0 000-2.4zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666z" clip-rule="evenodd"/>
                        </svg>
                        <span class="sr-only">Instagram page</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    {{-- fin del footer --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.bundle.min.js"></script>
</body>
</html>