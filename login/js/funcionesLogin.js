const FormLogin = document.querySelector('#formLogin');
const FormCrear = document.querySelector('#formCrearCuenta');
const ModalCrearUsuario = new bootstrap.Modal(document.getElementById('modalCrearUsuario'));

var btnCrearUsuario = document.getElementById('btnCrear');

btnCrearUsuario.addEventListener('click', () => {
    ModalCrearUsuario.show();
});


FormCrear.addEventListener('submit', (e) => {
    e.preventDefault();  

    let xhr = new XMLHttpRequest();
    let DatosFormulario = new FormData(FormCrear);

    xhr.open('POST', './php/insertNew.php', true);  

   
    xhr.onload = () => {
        if (xhr.status === 200) {
           
            console.log(xhr.responseText);  
        } else {
            
            console.error('Error en la solicitud: ' + xhr.statusText);
        }
    };

    
    xhr.onerror = () => {
        console.error('Error de red.');
    };

    xhr.send(DatosFormulario);
});