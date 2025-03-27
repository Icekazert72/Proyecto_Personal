<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" href="../../css/sweetalert2.css">
    <link rel="stylesheet" href="../../css/admin.css">
</head>

<body>

    <header>
        <div class="lf">
            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                <i class="fa-solid fa-angles-right"></i>
            </button>
        </div>
        <div class="gestiones">

        </div>
    </header>

    <main>
        <div class="usuarios">
            <div class="botones">
                <div class="btn">Pedidos Recientes</div>
                <div class="btn">Usuarios Recientes</div>
                <div class="btn">Productos reservados</div>
                <div class="btn">Nuevo Producto</div>
            </div>

            <div class="conttent_usuarios mt-3">
                <form action="" method="post" id="Form_CrearUsuario">
                    <div class="input-group mt-5">
                        <span class="input-group-text">Nombre y Apellidos</span>
                        <input type="text" aria-label="First name" name="nombre" id="nombre" class="form-control">
                        <input type="text" aria-label="Last name" name="apellidos" id="apellidos" class="form-control">
                    </div>
                    <div class="input-group mt-5">
                        <span class="input-group-text">Email y Telefono</span>
                        <input type="email" aria-label="First name" name="email" id="email" class="form-control">
                        <input type="text" aria-label="Last name" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="input-group mt-5">
                        <span class="input-group-text">Direccion y Contrasña</span>
                        <input type="text" aria-label="First name" name="direccion" id="direccion" class="form-control">
                        <input type="password" aria-label="Last name" name="contraseña" id="contraseña" class="form-control">
                    </div>
                    <select class="form-select mt-5" name="tipo_usuario" aria-label="Default select example">
                        <option selected>Tipo de Usuario</option>
                        <option value="admin">admin</option>
                        <option value="cliente">cliente</option>
                    </select>
                    <button type="submit" class="btn mt-5" style="background-color: brown; color: white;">Crear</button>
                </form>
            </div>


        </div>

        <div class="contadores">
            <div class="tablon pedidos">
                <div class="text">Pedidos</div>
                <div class="cantidad">
                    <h3>0</h3>
                </div>
            </div>
            <div class="tablon Usuarios">
                <div class="text">Usuarios</div>
                <div class="cantidad">
                    <h3>0</h3>
                </div>
            </div>
            <div class="tablon Productos">
                <div class="text">Productos</div>
                <div class="cantidad">
                    <h3>0</h3>
                </div>
            </div>
            <div class="tablon pedidos">
                <div class="text">Visitas</div>
                <div class="cantidad">
                    <h3>1000</h3>
                </div>
            </div>
        </div>
    </main>

    <div id="loadingSpinner_craer_usuarios" style="display: none;">
        <div class="spinner-overlay">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 class="logo">nDONGz</h1> <!-- Logo (opcional) -->
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
                <p class="ms-3">Creando cuenta...</p>
            </div>
        </div>
    </div>





    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="staticBackdropLabel" style="font-family: fantasy; color:brown;">nDONGz</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../../Proyecto_Fin_de_curso/admin/index.php" style="color: brown;">Panel Central</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" style="color: brown;">Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/gestion_usuarios.php" style="color: brown; background-color: white;">Nuevo Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: brown;">Gestion Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: brown;">Mensageria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: brown;">Administradores y Colaboradores</a>
                    </li>
                    <li class="nav-item" style="position: relative; top:200px;">
                    <button type="button" class="nav-link" href="#" id="btn_cerrar_sesion" style="color: red; border: none;">Cerrar Sesion <i class="fa-solid fa-right-from-bracket" style="margin-left: 20px;"></i></button>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/sweetalert2.js"></script>
    <script src="../js/CrearUsuario.js"></script>
    <script>
         document.getElementById('btn_cerrar_sesion').addEventListener('click', function() {
      // Mostrar spinner con texto y logo animado
      const spinner = document.createElement('div');
      spinner.id = 'spinner';
      spinner.style.position = 'fixed';
      spinner.style.top = '50%';
      spinner.style.left = '50%';
      spinner.style.transform = 'translate(-50%, -50%)';
      spinner.style.zIndex = '9999';
      spinner.style.textAlign = 'center';
      spinner.innerHTML = `
        <div class="spinner-border text-primary" role="status" style="margin-bottom: 15px;">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div style="font-size: 1.5rem; color: brown; font-family: fantasy; animation: blink 1s infinite;">
          nDONGz
        </div>
        <div style="margin-top: 10px; font-size: 1.2rem; color: #333;">Cerrando sesión...</div>
      `;
      document.body.appendChild(spinner);

      // Realizar una solicitud para cerrar sesión
      fetch('../../../Proyecto_Fin_de_curso/login/login.php')
        .then(response => {
          if (response.ok) {
            // Esperar 5 segundos antes de redirigir
            setTimeout(() => {
              window.location.href = '../../../Proyecto_Fin_de_curso/login/login.php';
            }, 5000);
          } else {
            alert('Error al cerrar sesión.');
            document.body.removeChild(spinner); // Ocultar spinner en caso de error
          }
        })
        .catch(error => {
          console.error('Error:', error);
          document.body.removeChild(spinner); // Ocultar spinner en caso de error
        });
    });

    // Animación parpadeante para el logo
    const style = document.createElement('style');
    style.innerHTML = `
      @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
      }
    `;
    document.head.appendChild(style);
    </script>
</body>

</html>