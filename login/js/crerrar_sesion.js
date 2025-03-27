document.getElementById('cerrar_Sesion').addEventListener('click', function() {
    document.getElementById('loadingSpinner').style.display = 'flex';

    setTimeout(function() {
        window.location.href = '../../../Proyecto_Fin_de_curso/login/php/cerrar_sesion.php';
    }, 5000);  
});
