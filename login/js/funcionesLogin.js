const formLogin = document.querySelector('#formLogin');
const btnCrearCuenta = document.getElementById('btnCrear');
const loadingSpinner = document.getElementById('loadingSpinner');

formLogin.addEventListener('submit', (e) => {
    e.preventDefault(); 

    const email = document.getElementById('inputEmail').value;
    const password = document.getElementById('con').value;

 
    const regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!regexCorreo.test(email)) {
        document.getElementById('ErrEmail').textContent = "El correo electrónico no es válido.";
        return;
    } else {
        document.getElementById('ErrEmail').textContent = "";
    }

  
    if (password.length < 6) {
        document.getElementById('ErrPassword').textContent = "La contraseña debe tener al menos 6 caracteres.";
        return;
    } else {
        document.getElementById('ErrPassword').textContent = "";
    }

  
    loadingSpinner.style.display = 'flex';

  
    setTimeout(() => {
        loadingSpinner.style.display = 'none';
        new swal('Error', 'La solicitud ha tardado demasiado, por favor intente nuevamente.', 'error');
    }, 10000); 

    
    let xhr = new XMLHttpRequest();
    let formData = new FormData(formLogin);

    xhr.open('POST', 'php/session.php', true);

    xhr.onload = () => {
        
        loadingSpinner.style.display = 'none';

        if (xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);

            if (response.status === 'error') {
               
                new swal('Error', response.message, 'error');
            } else {
                
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            }
        } else {
           new swal('Error', 'Error al iniciar sesión, por favor intente nuevamente.', 'error');
        }
    };

    xhr.onerror = () => {
        loadingSpinner.style.display = 'none';
       new swal('Error', 'Error de red, por favor intente nuevamente.', 'error');
    };

    xhr.send(formData);
});

