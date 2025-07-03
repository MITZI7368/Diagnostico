let inNombre = document.getElementById('nombre');
let Pnombre = document.getElementById('Pnombre');

function validacionNombre() {
    console.log('Validando nombre');
    let valido = true;
    if (inNombre.value.trim() === '') {
        Pnombre.innerHTML = 'Este campo es obligatorio';
        valido = false;
    }
    if (inNombre.value.length < 3) {
        Pnombre.innerHTML = 'La cantidad mínima es de 3 letras';
        valido = false;
    }
    if (inNombre.value.length > 50) {
        Pnombre.innerHTML = 'La cantidad máxima es de 50 caracteres';
        valido = false;
    }
    if (!/^[a-zA  -Z0-9 ]+$/.test(inNombre.value)) {
        Pnombre.innerHTML = 'Solo letras, números y espacios';
        valido = false;
    }

    if (valido == false) {
        Pnombre.classList.remove('hidden');
        Pnombre.classList.add('block', 'text-red-500');
        inNombre.classList.remove('border-gray-300');
        inNombre.classList.add('border-red-500');
    }

    if (valido == true) {
        Pnombre.classList.remove('block');
        Pnombre.classList.add('hidden');
        inNombre.classList.remove('border-gray-300', 'border-red-500');
        inNombre.classList.add('border-green-500');
    }
}
let inCategoria = document.getElementById('categoria');
let Pcategoria = document.getElementById('mensaje-categoria');
function validacionCategoria() {
    console.log('Validando categoría');
    let valido = true;
    if (inCategoria.value.trim() === '') {
        Pcategoria.innerHTML = 'Este campo es obligatorio';
        valido = false;
    }
    if (!/^[a-zA-Z0-9 ]+$/.test(inCategoria.value)) {
        Pcategoria.innerHTML = 'Solo letras, números y espacios';
        valido = false;
    }

    if (valido == false) {
        Pcategoria.classList.remove('hidden');
        Pcategoria.classList.add('block', 'text-red-500');
        inCategoria.classList.remove('border-gray-300');
        inCategoria.classList.add('border-red-500');
    }

    if (valido == true) {
        Pcategoria.classList.remove('block');
        Pcategoria.classList.add('hidden');
        inCategoria.classList.remove('border-gray-300', 'border-red-500');
        inCategoria.classList.add('border-green-500');
    }
}
let inPrecio = document.getElementById('precio');
let Pprecio = document.getElementById('mensaje-precio');

function validacionPrecio() {
    console.log('Validando precio');
    let valido = true;
    if (inPrecio.value.trim() === '') {
        Pprecio.innerHTML = 'Este campo es obligatorio';
        valido = false;
    }
    if (isNaN(inPrecio.value) || parseFloat(inPrecio.value) <= 0) {
        Pprecio.innerHTML = 'Debe ser un número mayor a 0';
        valido = false;
    }
    if (valido == false) {
        Pprecio.classList.remove('hidden');
        Pprecio.classList.add('block', 'text-red-500');
        inPrecio.classList.remove('border-gray-300');
        inPrecio.classList.add('border-red-500');
    }
    if (valido == true) {
        Pprecio.classList.remove('block');
        Pprecio.classList.add('hidden');
        inPrecio.classList.remove('border-gray-300', 'border-red-500');
        inPrecio.classList.add('border-green-500');}
}
let inExistencia = document.getElementById('existencia');
let Pexistencia = document.createElement('mensaje-existencia');
function validacionExistencia() {
    console.log('Validando existencia');
    let valido = true;
    if (inExistencia.value.trim() === '') {
        Pexistencia.innerHTML = 'Este campo es obligatorio';
        valido = false;
    }
    if (isNaN(inExistencia.value) || parseInt(inExistencia.value) < 0) {
        Pexistencia.innerHTML = 'Debe ser un número mayor o igual a 0';
        valido = false;
    }

    if (valido == false) {
        Pexistencia.classList.remove('hidden');
        Pexistencia.classList.add('block', 'text-red-500');
        inExistencia.classList.remove('border-gray-300');
        inExistencia.classList.add('border-red-500');
    }

    if (valido == true) {
        Pexistencia.classList.remove('block');
        Pexistencia.classList.add('hidden');
        inExistencia.classList.remove('border-gray-300', 'border-red-500');
        inExistencia.classList.add('border-green-500');
    }
}

// Validación del Descuento (Opcional)
let inDescuento = document.getElementById('descuento');
let Pdescuento = document.createElement('mensaje-descuento');

   

function validacionDescuento() {
    console.log('Validando descuento');
    let valido = true;
    if (inDescuento.value.trim() !== '' && (isNaN(inDescuento.value) || parseFloat(inDescuento.value) < 0 || parseFloat(inDescuento.value) > 100)) {
        Pdescuento.innerHTML = 'Debe ser un número entre 0 y 100';
        valido = false;
    }

    if (valido == false) {
        Pdescuento.classList.remove('hidden');
        Pdescuento.classList.add('block', 'text-red-500');
        inDescuento.classList.remove('border-gray-300');
        inDescuento.classList.add('border-red-500');
    }

    if (valido == true) {
        Pdescuento.classList.remove('block');
        Pdescuento.classList.add('hidden');
        inDescuento.classList.remove('border-gray-300', 'border-red-500');
        inDescuento.classList.add('border-green-500');
    }
}

// Validación del Estado
let inEstado = document.getElementById('estado');
let Pestado = document.createElement('mensaje-estado');

function validacionEstado() {
    console.log('Validando estado');
    let valido = true;
    if (inEstado.value !== 'disponible' && inEstado.value !== 'agotado') {
        Pestado.innerHTML = 'Seleccione un estado válido';
        valido = false;
    }

    if (valido == false) {
        Pestado.classList.remove('hidden');
        Pestado.classList.add('block', 'text-red-500');
        inEstado.classList.remove('border-gray-300');
        inEstado.classList.add('border-red-500');
    }

    if (valido == true) {
        Pestado.classList.remove('block');
        Pestado.classList.add('hidden');
        inEstado.classList.remove('border-gray-300', 'border-red-500');
        inEstado.classList.add('border-green-500');
    }
}

// Evento para validar al hacer clic en el botón
let boton = document.getElementById('enviar');
boton.addEventListener('click', function (event) {
    validacionNombre();
    validacionCategoria();
    validacionPrecio();
    validacionExistencia();
    validacionDescuento();
    validacionEstado();
});
