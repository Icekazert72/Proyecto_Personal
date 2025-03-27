<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
                            <div class="Error" id="ErrPassword"></div>
                        </div>
                        <div class="form-button mt-3">
                            <button type="submit" class="btn btnIniciar">Iniciar</button>
                            <button type="button" class="btn btnCrearCuenta" id="btnCrear" data-bs-toggle="modal" data-bs-target="#modalCrearUsuario">Crear Cuenta</button>
                        </div>
                    </form>
                    <div id="loadingSpinner" style="display: none;">
                        <div class="spinner-overlay">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <h1 class="logo">nDONGz</h1>
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Cargando...</span>
                                </div>
                                <p class="ms-3 text-blinking">Iniciando sesión...</p>
                            </div>
                        </div>
                    </div>
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

                    <form action="" method="post" id="formCrearCuenta" class="p-4 border rounded shadow-sm bg-light">
                        <h3 class="text-center mb-4">Crear Cuenta</h3>
                        <div class="mb-3">
                            <label for="inputNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="inputNombre" placeholder="Ingrese su nombre">
                            <div class="text-danger small" id="ErrNombre"></div>
                        </div>
                        <div class="mb-3">
                            <label for="inputApellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="inputApellido" placeholder="Ingrese su apellido">
                            <div class="text-danger small" id="ErrApellido"></div>
                        </div>
                        <div class="mb-3">
                            <label for="inputCorreo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correo" id="inputCorreo" placeholder="Ingrese su correo electrónico">
                            <div class="text-danger small" id="ErrCorreo"></div>
                        </div>
                        <div class="mb-3">
                            <label for="inputTelefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="inputTelefono" placeholder="Ingrese su número de teléfono">
                            <div class="text-danger small" id="ErrTelefono"></div>
                        </div>
                        <div class="mb-3">
                            <label for="inputDireccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="inputDireccion" placeholder="Ingrese su dirección">
                            <div class="text-danger small" id="ErrDireccion"></div>
                        </div>
                        <div class="mb-3">
                            <label for="inputCon" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="con1" id="inputCon" placeholder="Ingrese su contraseña">
                            <div class="text-danger small" id="ErrCon"></div>
                        </div>
                        <div class="mb-3">
                            <label for="inputCon2" class="form-label">Repetir Contraseña</label>
                            <input type="password" class="form-control" name="con2" id="inputCon2" placeholder="Repita su contraseña">
                            <div class="text-danger small" id="ErrCon2"></div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Crear Cuenta</button>
                        </div>
                    </form>

                    <div id="loadingSpinner_craer" style="display: none;">
                        <div class="spinner-overlay">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <h1 class="logo">nDONGz</h1>
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Cargando...</span>
                                </div>
                                <p class="ms-3">Creando cuenta...</p>
                            </div>
                        </div>
                    </div>

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
    <script src="js/funcionCrear.js"></script>
</body>

</html>