@extends('base.plantilla')

@section('contenido')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Company Introduction -->
        <div class="mb-12 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Diagnóstico de Imagen</h1>
            <p class="text-lg text-gray-600">Soluciones profesionales en diagnóstico médico</p>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Nuestros Servicios</h2>
                <ul class="space-y-2 text-gray-600">
                    <li>• Laboratorio Clínico</li>
                    <li>• Servicios Dentales</li>
                    <li>• Ginecología</li>
                    <li>• Ultrasonido</li>
                    <li>• Productos Médicos Especializados</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Horario de Atención</h2>
                <ul class="space-y-2 text-gray-600">
                    <li>Lunes a Viernes: 8:00 AM - 8:00 PM</li>
                    <li>Sábados: 8:00 AM - 2:00 PM</li>
                    <li>Domingos: Cerrado</li>
                </ul>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="bg-white p-8 rounded-lg shadow-md mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Información de Contacto</h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-3">Ubicación Principal</h3>
                    <p class="text-gray-600 mb-4">
                        Av. 8 de julio #3236<br>
                        Col.  Lomas de Polanco<br>
                        Guadalajara, Jalisco<br>
                        CP 44960
                    </p>
                    
                    <h3 class="text-lg font-medium text-gray-700 mb-3">Contacto Directo</h3>
                    <p class="text-gray-600">
                        Teléfono: (55) 3326500042<br>
                        WhatsApp: (55) 33 2561 0824<br>
                        Email: contacto@diagnostico.com
                    </p>
                </div>
                
<div class="bg-white p-8 rounded-lg shadow-md mt-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Envíanos un mensaje</h2>
    <form action="{{ route('contacto.store') }}" method="POST">
        @csrf
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="nombre" class="block text-gray-700 mb-2">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" required 
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="email" class="block text-gray-700 mb-2">Correo electrónico</label>
                <input type="email" id="email" name="email" required 
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div class="mt-4">
            <label for="telefono" class="block text-gray-700 mb-2">Teléfono (opcional)</label>
            <input type="tel" id="telefono" name="telefono" 
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mt-4">
            <label for="mensaje" class="block text-gray-700 mb-2">Mensaje</label>
            <textarea id="mensaje" name="mensaje" rows="4" required 
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <button type="submit" class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            Enviar mensaje
        </button>
    </form>
</div>
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-3">Redes Sociales</h3>
                    <div class="space-y-2">
                        <a href="https://www.facebook.com/profile.php?id=61577614748867&locale=es_LA" class="flex items-center text-blue-600 hover:text-blue-800">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </a>
                        
                        <a href="https://www.instagram.com/diagnostico.imagen/?next=%2Fstories%2Fhighlights%2F18129529759436261%2F" class="flex items-center text-pink-600 hover:text-pink-800">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                            </svg>
                            Instagram
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Nuestra Ubicación</h2>
            <div class="aspect-w-16 aspect-h-9">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.1234567890123!2d-99.1234567!3d19.1234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDA3JzM0LjQiTiA5OcKwMDcnMzQuNCJX!5e0!3m2!1ses!2smx!4v1234567890123!5m2!1ses!2smx" 
                    class="w-full h-96 rounded-lg"
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            e.preventDefault();
            alert('Por favor ingresa un correo electrónico válido');
        }
    });
</script>
@endsection
@endsection