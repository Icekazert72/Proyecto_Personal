<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <link rel="stylesheet" href="css/styleLogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>

<body>

    <main class="container">
        <div class="formularioLogin">
            <div class="logo">
                <h2>nDONGz</h2>
            </div>
            <div class="miForm">
                <div class="cuerpoForm">
                    <form action="php/session.php" method="post" id="formLogin" class="formLogin">
                        <div class="form-label">
                            <label for="" id="labelEmail" class="labelEmail">Correo Electronico</label>
                            <input type="email" name="email" class="form-wh" id="inputEmail">
                            <div class="Error" id="ErrEmail"></div>
                        </div>
                        <div class="form-label">
                            <label for="" id="labelPassword" class="labelPassword">Contraseña</label>
                            <input type="password" name="password" class="form-wh" id="con">
                            <div class="Error" id="ErrEmail"></div>
                        </div>
                        <div class="form-button mt-3">
                            <button type="submit" class="btn btnIniciar">Iniciar</button>
                            <button type="button" class="btn btnCrearCuenta" id="btnCrear">Crear Cuenta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="modalCrearUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom"></label></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="imgmodal2">
                    <form action="" method="post" id="formCrearCuenta">
                        <div class="form-label">
                            <label for="inputNombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="inputNombre" required>
                            <div class="Err" id="ErrNombre"></div>
                        </div>
                        <div class="form-label">
                            <label for="inputApellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="inputApellido" required>
                            <div class="Err" id="ErrApellido"></div>
                        </div>
                        <div class="form-label">
                            <label for="inputCE">Correo Electronico</label>
                            <input type="email" class="form-control" name="correo" id="inputCorreo" required>
                            <div class="Err" id="ErrCorreo"></div>
                        </div>
                        <div class="form-label">
                            <label for="inputCell">Telefono</label>
                            <input type="text" class="form-control" name="telefono" id="inputCell" required>
                            <div class="Err" id="ErrTelefono"></div>
                        </div>
                        <div class="form-label">
                            <label for="inputDireccion">Direccion</label>
                            <input type="text" class="form-control" name="direccion" id="inputDireccion" required>
                            <div class="Err" id="ErrDireccion"></div>
                        </div>
                        <div class="form-label">
                            <label for="inputCon">Contraseña</label>
                            <input type="password" class="form-control" name="con1" id="inputCon" required>
                            <div class="Err" id="ErrCon"></div>
                        </div>
                        <div class="form-label">
                            <label for="inputCon2">Repetir Contraseña</label>
                            <input type="password" class="form-control" name="con2" id="inputCon2" required>
                            <div class="Err" id="ErrCon2"></div>
                        </div>
                        <div class="form-button">
                            <button type="submit" class="btn btnCrear">Crear Cuenta</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <h5 style="color: brown;">nDONGz</h5>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2.js"></script>
    <script src="js/funcionesLogin.js"></script>
</body>

</html>