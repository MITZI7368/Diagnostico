@extends('base.plantilla')

@section('contenido')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Sobre Nosotros</h1>

        <!-- Misión -->
        <div class="mb-12 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Misión</h2>
            <p class="text-gray-600 leading-relaxed">
                Brindar servicios médicos de alta calidad en análisis clínicos, odontología, ginecología y ultrasonido, 
                utilizando tecnología de vanguardia y un equipo de profesionales comprometidos con la salud y bienestar 
                de nuestros pacientes.
            </p>
        </div>

        <!-- Visión -->
        <div class="mb-12 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Visión</h2>
            <p class="text-gray-600 leading-relaxed">
                Ser el núcleo médico de referencia en nuestra región, reconocido por nuestra excelencia en el diagnóstico 
                oportuno, la atención integral y la confianza que generamos en cada paciente, contribuyendo al cuidado 
                preventivo y al bienestar de la comunidad.
            </p>
        </div>

        <!-- Valores -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Valores</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Compromiso</h3>
                        <p class="text-gray-600">Nos dedicamos a ofrecer un servicio eficiente, confiable y centrado en las necesidades de nuestros pacientes.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Calidad</h3>
                        <p class="text-gray-600">Garantizamos diagnósticos precisos mediante el uso de tecnología avanzada y personal altamente capacitado.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Empatía</h3>
                        <p class="text-gray-600">Escuchamos y comprendemos las inquietudes de nuestros pacientes, brindando una atención cálida y humana.</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Ética</h3>
                        <p class="text-gray-600">Actuamos con transparencia, honestidad y respeto en cada una de nuestras acciones.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Innovación</h3>
                        <p class="text-gray-600">Nos actualizamos constantemente para aplicar las mejores prácticas y tecnologías en el ámbito de la salud.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Trabajo en equipo</h3>
                        <p class="text-gray-600">Fomentamos la colaboración entre nuestros especialistas para ofrecer una atención médica integral.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection