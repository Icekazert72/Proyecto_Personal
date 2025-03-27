<?php

session_start();
if (!$_SESSION['id'] && !$_SESSION['nombre']) {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nDONGz</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <link rel="stylesheet" href="css/styleform.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>

<body>
    <header class="fluit">

        <div class="logo">
            <div>
                <label for="">nDONGz</label>
            </div>
            <div class="btn btn-nav" id="btn-nav">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <div class="loguear">

            <div class="btn ini" id="btnModalPrefil" data-bs-toggle="modal" data-bs-target="#ModalUsuario"><a href="#"><i class="fa-regular fa-user"></i></a></div>

            <div id="loadingSpinner" style="display: none;">
                <div class="spinner-overlay">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h1 class="logo">nDONGz</h1>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                        <p class="ms-3">Cerrando sesión...</p>
                    </div>
                </div>
            </div>
            <script>
                var btnProfil = document.querySelector('#btnModalPrefil');
                btnProfil.addEventListener('click', (e) => {
                    e.preventDefault();
                    console.log('Funcion del Modal');
                });
            </script>

            <!-- Zona del carrito (con diseño mejorado) -->
            <div id="carrito" class="btn">
                <i class="fa-solid fa-cart-shopping"></i>
                <span id="contador-carrito">0</span> <!-- Contador de productos -->
            </div>

            <div id="zona-carrito" class="carrito-container" style="display: none;">
                <button id="cerrar-carrito" class="btn btn-danger cerrar-carrito">Cerrar</button>
                <h2 class="carrito-title">Tu Carrito</h2>
                <div id="productos-en-carrito" class="productos-carrito">
                    <!-- Los productos seleccionados se mostrarán aquí -->
                </div>
                <div class="total-container">
                    <p class="total-text">Total: $<span id="total-carrito">0.00</span></p>
                </div>
                <button id="finalizar-compra" class="btn btn-success finalizar-compra">Finalizar compra</button>
            </div>






            <div class="ajustes">
                <div class="btn"><i class="fa-solid fa-ellipsis-vertical"></i></div>
            </div>

            <div class="idioma">
                <div class="btnLenguaje">
                    <img src="img/bandera.png" alt="" width="28px"><span>ES</span>
                </div>
            </div>

        </div>

    </header>
    <div class="headerFalso"></div>

    <nav class="container" id="nav">
        <div class="navbar btn">
            <a href="Sesion_components/hombre.php">
                <label for="#">Hombres</label>
                <i class="fa-solid fa-person"></i>
            </a>
        </div>
        <div class="navbar btn">
            <a href="Sesion_components/mujer.php">
                <label for="#">Mujeres</label>
                <i class="fa-solid fa-person-dress"></i>
            </a>
        </div>
        <div class="navbar btn">
            <a href="Sesion_components/niño.php">
                <label for="#">Niños</label>
                <i class="fa-solid fa-child"></i>
            </a>
        </div>
        <div class="navbar btn">
            <a href="Sesion_components/niña.php">
                <label for="">Niñas</label>
                <i class="fa-solid fa-child-dress"></i>
            </a>
        </div>
        <div class="navbar btn">
            <a href="#">
                <label for="#">Mercados</label>
                <i class="fa-solid fa-store"></i>
            </a>
        </div>
    </nav>

    <main>

        <div class="slider">
            <div class="img">
                <div><img src="img/InShot_20250113_121830319.png" width="259px" alt=""></div>
            </div>
            <div class="text-label">
                <div>
                    <h1 style="font-size: 21px;">"Bienvenido/a" " <?php echo $_SESSION['nombre'] ?> "</h1>
                </div>
                <div id="mi_pedido">
                    <p>Ckliquea tu favorita</p>
                    <button class="btn" style="border: solid 2px brown; color: brown;" data-bs-toggle="modal" data-bs-target="#ticketModal">Ver Ticket de Pedido</button>
                </div>
                <div><small>text</small></div>
            </div>
            <div class="img">
                <div><img src="img/InShot_20250113_122011194.png" width="259px" alt=""></div>
            </div>
        </div>

        <div class="shops container mt-5">
            <div class="Regions">
                <div class="Rinsu">
                    <div class="dimg"><img src="img/WhatsAppImage2024-11-19at07.28.47_816c8c5d.jpg" alt=""></div>
                    <div class="tex">
                        <div>
                            <h3>Mercado</h3>
                        </div>
                        <div><small><a href="#" class="btn btn-ver">Ver</a></small></div>
                    </div>
                </div>
                <div class="Rcont">
                    <div class="dimg"><img src="img/WhatsAppImage2024-11-19at07.28.47_816c8c5d.jpg" alt=""></div>
                    <div class="tex">
                        <div>
                            <h3>Tienda</h3>
                        </div>
                        <div><small><a href="#" class="btn btn-ver">Ver</a></small></div>
                    </div>
                </div>
            </div>
            <div class="masDestacados">
                <div class="cart">
                    <div><img src="img/InShot_20250113_121830319.png" width="150px" alt=""></div>
                    <div>
                        <p class="btn btn-ver bo">ver ofertas</p>
                    </div>
                </div>
                <div class="cart">
                    <div><img src="img/InShot_20250113_121830319.png" width="150px" alt=""></div>
                    <div>
                        <p class="btn btn-ver bo">ver ofertas</p>
                    </div>
                </div>
                <div class="cart">
                    <div><img src="img/InShot_20250113_121830319.png" width="150px" alt=""></div>
                    <div>
                        <p class="btn btn-ver bo">ver ofertas</p>
                    </div>
                </div>
                <div class="cart">
                    <div><img src="img/InShot_20250113_121830319.png" width="150px" alt=""></div>
                    <div>
                        <p class="btn btn-ver bo">ver ofertas</p>
                    </div>
                </div>
                <div class="cart">
                    <div><img src="img/InShot_20250113_121830319.png" width="150px" alt=""></div>
                    <div>
                        <p class="btn btn-ver bo">ver ofertas</p>
                    </div>
                </div>
                <div class="cart">
                    <div><img src="img/InShot_20250113_122011194.png" width="150px" alt=""></div>
                    <div>
                        <p class="btn btn-ver bo">ver ofertas</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container muestra">
            <div class="detalles">
                <div class="colors">
                    <div class="txtColors">
                        <h5>Colores</h5>
                    </div>
                    <div class="pack1">

                        <div class="colores">
                            <div class="cl" style="background-color: red;"></div>
                            <div class="cl" style="background-color: #ff5733;"></div>
                            <div class="cl" style="background-color: #ffbd33;"></div>
                            <div class="cl" style="background-color: #dbff33;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #75ff33;"></div>
                            <div class="cl" style="background-color: #33ff57;"></div>
                            <div class="cl" style="background-color: #33ffbd;"></div>
                            <div class="cl" style="background-color: #ff80ab;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #f3e5f5;"></div>
                            <div class="cl" style="background-color: #e1bee7;"></div>
                            <div class="cl" style="background-color: #7b1fa2;"></div>
                            <div class="cl" style="background-color: #4a148c;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #2196f3;"></div>
                            <div class="cl" style="background-color: #42a5f5;"></div>
                            <div class="cl" style="background-color: #b3e5fc;"></div>
                            <div class="cl" style="background-color: #03a9f4;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #0097a7;"></div>
                            <div class="cl" style="background-color: #006064;"></div>
                            <div class="cl" style="background-color: #00838f;"></div>
                            <div class="cl" style="background-color: #00b8d4;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #b2ff59;"></div>
                            <div class="cl" style="background-color: #ccff90;"></div>
                            <div class="cl" style="background-color: #76ff03;"></div>
                            <div class="cl" style="background-color: #dce775;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #827717;"></div>
                            <div class="cl" style="background-color: #eeff41;"></div>
                            <div class="cl" style="background-color: #aeea00;"></div>
                            <div class="cl" style="background-color: #fff9c4;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #ffee58;"></div>
                            <div class="cl" style="background-color: #fbc02d;"></div>
                            <div class="cl" style="background-color: #f57f17;"></div>
                            <div class="cl" style="background-color: #f9a825;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #ffff00;"></div>
                            <div class="cl" style="background-color: #ffea00;"></div>
                            <div class="cl" style="background-color: #ffd600;"></div>
                            <div class="cl" style="background-color: #ffecb3;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #ffb300;"></div>
                            <div class="cl" style="background-color: #ffa000;"></div>
                            <div class="cl" style="background-color: #ff8f00;"></div>
                            <div class="cl" style="background-color: #ff6f00;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #d7ccc8;"></div>
                            <div class="cl" style="background-color: #bcaaa4;"></div>
                            <div class="cl" style="background-color: #8d6e63;"></div>
                            <div class="cl" style="background-color: #795548;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #5d4037;"></div>
                            <div class="cl" style="background-color: #4e342e;"></div>
                            <div class="cl" style="background-color: #3e2723;"></div>
                            <div class="cl" style="background-color: #fafafa;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #f5f5f5;"></div>
                            <div class="cl" style="background-color: #e0e0e0;"></div>
                            <div class="cl" style="background-color: #e0e0e0;"></div>
                            <div class="cl" style="background-color: #616161;"></div>
                        </div>
                        <div class="colores">
                            <div class="cl" style="background-color: #424242;"></div>
                            <div class="cl" style="background-color: #212121;"></div>
                            <div class="cl" style="background-color: #ffffff;"></div>
                            <div class="cl" style="background-color: #000000;"></div>
                        </div>
                    </div>
                </div>
                <div class="tallas">
                    <div class="textNums">
                        <h5>Tallas</h5>
                    </div>
                    <div class="numero">
                        <div class="num">5.5</div>
                        <div class="num">7.5</div>
                        <div class="num">10</div>
                        <div class="num">12.5</div>
                    </div>
                    <div class="numero">
                        <div class="num">5.5</div>
                        <div class="num">7.5</div>
                        <div class="num">10</div>
                        <div class="num">12.5</div>
                    </div>
                    <div class="numero">
                        <div class="num">5.5</div>
                        <div class="num">7.5</div>
                        <div class="num">10</div>
                        <div class="num">12.5</div>
                    </div>
                    <div class="numero">
                        <div class="num">5.5</div>
                        <div class="num">7.5</div>
                        <div class="num">10</div>
                        <div class="num">12.5</div>
                    </div>
                    <div class="numero">
                        <div class="num">5.5</div>
                        <div class="num">7.5</div>
                        <div class="num">10</div>
                        <div class="num">12.5</div>
                    </div>
                    <div class="numero">
                        <div class="num">5.5</div>
                        <div class="num">7.5</div>
                        <div class="num">10</div>
                        <div class="num">12.5</div>
                    </div>
                    <div class="numero">
                        <div class="num">5.5</div>
                        <div class="num">7.5</div>
                        <div class="num">10</div>
                        <div class="num">12.5</div>
                    </div>
                    <div class="numero">
                        <div class="num">5.5</div>
                        <div class="num">7.5</div>
                        <div class="num">10</div>
                        <div class="num">12.5</div>
                    </div>
                    <div class="numero">
                        <div class="num">5.5</div>
                        <div class="num">7.5</div>
                        <div class="num">10</div>
                        <div class="num">12.5</div>
                    </div>
                    <div class="numero">
                        <div class="num">5.5</div>
                        <div class="num">7.5</div>
                        <div class="num">10</div>
                        <div class="num">12.5</div>
                    </div>
                </div>
            </div>
            <div class="imgMuestras">
                <div class="pack1">
                    <div class="img"><img src="img/InShot_20250113_121830319.png" alt="Zapatilla"></div>
                    <div class="img"><img src="img/InShot_20250113_122011194.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122344725.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122303203.png" alt=""></div>
                </div>
                <div class="pack2">
                    <div class="img"><img src="img/InShot_20250113_121830319.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122011194.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122344725.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122303203.png" alt=""></div>
                </div>
                <div class="pack3">
                    <div class="img"><img src="img/InShot_20250113_121830319.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122011194.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122344725.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122303203.png" alt=""></div>
                </div>
                <div class="pack4">
                    <div class="img"><img src="img/InShot_20250113_121830319.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122011194.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122344725.png" alt=""></div>
                    <div class="img"><img src="img/InShot_20250113_122303203.png" alt=""></div>
                </div>
            </div>
        </div>

        <div class="marcas container mt-3">
            <div class="m-c">
                <div class="logo"><a href="components/adidas/index.php"><img src="img/adidas.png" width="90px" alt=""></a></div>
                <div class="logo"><a href="components/newBalance/index.php"><img src="img/new-balance.jpg" width="90px" alt=""></a></div>
                <div class="logo"><a href="components/nike/index.php"><img src="img/nike.png" width="90px" alt=""></a></div>
                <div class="logo"><a href="components/underArmour/index.php"><img src="img/underarmour.png" width="90px" alt=""></a></div>
                <div class="logo"><a href="components/jordan/index.php"><img src="img/jordan.png" width="90px" alt=""></a></div>
            </div>
        </div>

        <div class="row" id="productos-container">
            <!-- Los productos se cargarán aquí dinámicamente -->
        </div>

        <div class="mapa mt-3 container">
            <div class="imagen-mapa">
                <iframe src="https://maps.app.goo.gl/ReaYYJ61tkYZiXXG6" frameborder="0"></iframe>
            </div>
            <div class="text">
                <h3>Localizanos</h3>
                <p>Encuentra lugares que te sorprenderan con variedaa
                    de productos de tu gusto
                </p>
                <p><small>
                        Explora nuestra web, y deja de recibie sms
                        WhatsApp que limitan tu almacenamiento
                    </small></p>
                <p><a href="#"></a></p>
            </div>
            <div class="logo">
                <label for="">nDONGz</label>
            </div>
        </div>

    </main>

    <footer>
        <div class="head">
            <p>Enalce de otros sitios:</p>
            <p><a href="">Google</a></p>
            <p><a href="">Chrome</a></p>
        </div>
        <div class="body mt-3 mb-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Productos</th>
                        <th scope="col">Recursos</th>
                        <th scope="col">Comunidad</th>
                        <th scope="col">Empresas</th>
                        <th scope="col">Ayuda</th>
                        <th scope="col">Mas ...</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">- Zapatillas</th>
                        <th>- Glosario de Marketing</th>
                        <th>Agencias</th>
                        <th>Nuestra Historia</th>
                        <th>Contacto</th>
                        <th><a href="#">Descubre</a></th>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <th scope="row">- Basketball</th>
                        <th>- Consejos de Marketing</th>
                        <th>Desarrolladores</th>
                        <th>Empleo</th>
                        <th>Contactar Experto</th>
                        <th></th>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <th scope="row">- Running</th>
                        <th></th>
                        <th>Grupos</th>
                        <th>Accesibilidad</th>
                        <th>Centro de Ayuda</th>
                        <th></th>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <th scope="row">- Colecciones</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Hablar de Ventas</th>
                        <th></th>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <th scope="row">- Marcas de Nombre</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <th scope="row">- Prod.Jogadores</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <div class="fhead">
                <h2>-- nDONGz --</h2>
            </div>
            <div class="fbody">
                <div class="imagen">
                    <img src="img/adidas.png" alt="">
                </div>
                <div class="imagen">
                    <img src="img/new-balance.jpg" alt="">
                </div>
                <div class="imagen">
                    <img src="img/nike.png" alt="">
                </div>
                <div class="imagen">
                    <img src="img/underarmour.png" alt="">
                </div>
                <div class="imagen">
                    <img src="img/jordan.png" alt="">
                </div>
            </div>
            <div class="ffooter">
                <div class="select">
                    <form action="">
                        <select name="" id="">
                            <option value="">ESPAÑOL</option>
                            <option value="">INGLES</option>
                            <option value="">FRANCES</option>
                        </select>
                    </form>
                </div>
                <div class="text">
                    <p><small style="color: grey;">
                            AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAaaaaaaaaaaaaaaaaaaaaa
                        </small></p>
                </div>
            </div>
        </div>
    </footer>



    <div class="modal fade" id="ModalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content" style=" background-color: transparent;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" style="font-family:fantasy;" id="exampleModalLabel">Mi Perfil</h1>
                </div>
                <div class="modal-body">
                    <div class="card" style="width: 100%;">
                        <div class="card-header" style="display: flex; gap:10px;">
                            <h3 style=" color:brown; font-family:fantasy;"><?php echo $_SESSION['nombre'] ?> </h3>
                            <h3 style=" color:black; font-family:fantasy;"><?php echo $_SESSION['apellido'] ?> </h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style=" font-family:fantasy;"><?php echo $_SESSION['email'] ?></li>
                            <li class="list-group-item" style=" font-family:fantasy;"><?php echo $_SESSION['telefono'] ?></li>
                            <li class="list-group-item" style=" font-family:fantasy;"><?php echo $_SESSION['direccion'] ?></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cerrar_Sesion" class="btn" style=" background-color:red;">Cerrar Sesion</button>
                    <button type="button" class="btn" style=" background-color:red;" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for displaying the ticket -->
    <div class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="ticketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ticketModalLabel">Ticket de Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="ticketContent">
                        <!-- Ticket details will be dynamically loaded here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/funciones.js"></script>
    <!-- <script src="js/AddCarritoCompras.js"></script> -->
    <script src="login/js/crerrar_sesion.js"></script>
    <script>
        class Producto {
            constructor(id, nombre, descripcion, precio, stock, categoria, imagenUrl) {
                this.id = id;
                this.nombre = nombre;
                this.descripcion = descripcion;
                this.precio = parseFloat(precio) || 0;
                this.stock = stock;
                this.categoria = categoria;
                this.imagenUrl = `admin/uploads/${imagenUrl}`; // La URL de la imagen
            }

            // Método para generar la tarjeta HTML de un producto
            mostrarTarjeta() {
                return `
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-img-top" style="background-image: url('${this.imagenUrl}'); background-size: cover; background-position: center; height: 200px; overflow: hidden;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${this.nombre}</h5>
                        <p class="card-text">${this.descripcion}</p>
                        <p class="card-text"><strong>Precio:</strong> XAF ${this.precio.toFixed(2)}</p>
                        <p class="card-text"><strong>Cantidad:</strong> ${this.stock}</p>
                        <a href="#" class="btn btn-primary" data-id="${this.id}" data-nombre="${this.nombre}" data-precio="${this.precio}">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
        `;
            }
        }

        // Función para cargar los productos desde la base de datos
        function cargarProductos() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'php/get_productos.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Parseamos la respuesta JSON
                    const productos = JSON.parse(xhr.responseText);

                    // Limpiamos el contenedor de productos
                    const contenedor = document.getElementById('productos-container');
                    contenedor.innerHTML = '';

                    // Creamos y mostramos las tarjetas para cada producto
                    productos.forEach(producto => {
                        const prod = new Producto(producto.id, producto.nombre, producto.descripcion, producto.precio, producto.stock, producto.categoria, producto.imagen_url);
                        contenedor.innerHTML += prod.mostrarTarjeta(); // Insertamos la tarjeta en el contenedor
                    });

                    // Configuramos los botones de agregar al carrito
                    agregarAlCarrito();
                } else {
                    console.error('Error al cargar los productos.');
                }
            };
            xhr.send();
        }

        // Función para agregar los productos al carrito
        function agregarAlCarrito() {
            document.querySelectorAll('a[data-id]').forEach(boton => {
                boton.addEventListener('click', (e) => {
                    e.preventDefault(); // Evitar la acción predeterminada

                    const id = e.target.getAttribute('data-id');
                    const nombre = e.target.getAttribute('data-nombre');
                    const precio = parseFloat(e.target.getAttribute('data-precio'));

                    // Agregar producto al carrito
                    if (carrito.has(id)) {
                        const producto = carrito.get(id);
                        producto.cantidad++; // Si ya existe, aumentamos la cantidad
                        carrito.set(id, producto);
                    } else {
                        carrito.set(id, {
                            id,
                            nombre,
                            precio,
                            cantidad: 1
                        }); // Si no existe, lo agregamos
                    }

                    // Actualizar el carrito en el DOM
                    actualizarCarrito();

                    // Usar SweetAlert para mostrar el mensaje
                    Swal.fire({
                        title: 'Producto agregado al carrito',
                        text: `${nombre} - $${precio.toFixed(2)}`,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                });
            });
        }

        // Estructura para almacenar el carrito
        let carrito = new Map(); // Usamos un Map para manejar el carrito de forma eficiente

        // Función para actualizar la vista del carrito
        function actualizarCarrito() {
            const carritoContainer = document.getElementById('productos-en-carrito');
            carritoContainer.innerHTML = ''; // Limpiar contenido previo
            let total = 0;

            // Recorrer los productos en el carrito
            carrito.forEach(producto => {
                total += producto.precio * producto.cantidad;

                // Crear HTML para cada producto
                const productoHTML = `
            <div class="producto-carrito d-flex justify-content-between align-items-center mb-2 p-2 border rounded">
                <div>
                    <p class="mb-0"><strong>${producto.nombre}</strong></p>
                    <p class="mb-0">Precio: XAF ${producto.precio.toFixed(2)}</p>
                    <p class="mb-0">Cantidad: ${producto.cantidad}</p>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-success me-2" onclick="incrementarCantidad(${producto.id})">+</button>
                    <button class="btn btn-sm btn-warning me-2" onclick="reducirCantidad(${producto.id})">-</button>
                    <button class="btn btn-sm btn-danger" onclick="eliminarDelCarrito(${producto.id})">Eliminar</button>
                </div>
            </div>`;

                carritoContainer.innerHTML += productoHTML; // Agregar al carrito visualmente
            });

            // Actualizar el total
            document.getElementById('total-carrito').innerText = total.toFixed(2);

            // Mostrar el carrito si tiene productos
            document.getElementById('zona-carrito').style.display = carrito.size > 0 ? 'block' : 'none';
        }

        // Función para incrementar la cantidad de un producto en el carrito
        function incrementarCantidad(id) {
            if (carrito.has(id)) {
                const producto = carrito.get(id);
                producto.cantidad++; // Aumentamos la cantidad en 1
                carrito.set(id, producto); // Actualizamos el producto en el carrito
                actualizarCarrito(); // Actualizamos la vista del carrito
            }
        }

        // Función para reducir la cantidad de un producto en el carrito
        function reducirCantidad(id) {
            if (carrito.has(id)) {
                const producto = carrito.get(id);
                if (producto.cantidad > 1) {
                    producto.cantidad--; // Restamos 1 a la cantidad
                    carrito.set(id, producto); // Actualizamos el producto en el carrito
                } else {
                    carrito.delete(id); // Si la cantidad es 1, eliminamos el producto del carrito
                }
                actualizarCarrito(); // Actualizamos la vista del carrito
            }
        }

        // Función para eliminar un producto del carrito
        function eliminarDelCarrito(id) {
            if (carrito.has(id)) {
                carrito.delete(id); // Eliminamos el producto del carrito
                actualizarCarrito(); // Actualizamos la vista del carrito
            }
        }



        document.getElementById('finalizar-compra').addEventListener('click', function() {
            // Verificar que el carrito no está vacío
            if (carrito.size === 0) {
                Swal.fire({
                    title: 'Carrito vacío',
                    text: 'No hay productos en el carrito para realizar el pedido.',
                    icon: 'warning',
                    confirmButtonText: 'Aceptar'
                });
                return;
            }

            // Recoger los productos y calcular el total
            let productos = [];
            let total = 0;
            carrito.forEach(producto => {
                productos.push({
                    id_producto: producto.id,
                    cantidad: producto.cantidad,
                    precio_unitario: producto.precio,
                    subtotal: producto.precio * producto.cantidad
                });
                total += producto.precio * producto.cantidad;
            });

            // Crear el objeto para enviar los datos al servidor
            let data = {
                id_usuario: 1, // Esto se debería obtener desde la sesión en el backend
                total: total.toFixed(2),
                productos: productos
            };

            // Enviar los datos al servidor usando XMLHttpRequest
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'php/set_pedido.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function() {
                try {
                    if (xhr.status === 200) {
                        // Attempt to parse the response as JSON
                        let response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            Swal.fire({
                                title: 'Compra finalizada',
                                text: 'Tu pedido ha sido realizado exitosamente.',
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            });
                            carrito.clear();
                            actualizarCarrito();
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response.message || 'Hubo un error al procesar el pedido.',
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    } else {
                        throw new Error('Error en la solicitud al servidor.');
                    }
                } catch (error) {
                    console.error('Error al procesar la respuesta:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'El servidor devolvió una respuesta inesperada. Intenta nuevamente.'+xhr.responseText,
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            };

            xhr.send(JSON.stringify(data)); // Enviar los datos al servidor
        });



        // Cargar productos al cargar la página
        window.onload = cargarProductos;

        // Add event listener to close the carrito
        document.getElementById('cerrar-carrito').addEventListener('click', function() {
            document.getElementById('zona-carrito').style.display = 'none';
        });

        // Toggle carrito visibility when clicking the carrito button
        document.getElementById('carrito').addEventListener('click', function() {
            const carritoZona = document.getElementById('zona-carrito');
            carritoZona.style.display = carritoZona.style.display === 'none' || carritoZona.style.display === '' ? 'block' : 'none';
        });

        document.querySelector('[data-bs-target="#ticketModal"]').addEventListener('click', function() {
            const userId = <?php echo $_SESSION['id']; ?>; // Get user ID from PHP session
            const ticketContent = document.getElementById('ticketContent');

            // Fetch ticket details via XMLHttpRequest
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `php/get_ticket.php?id_usuario=${userId}`, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        const data = JSON.parse(xhr.responseText);
                        if (data.success) {
                            ticketContent.innerHTML = `
                                <p><strong>ID Pedido:</strong> ${data.ticket.id_pedido}</p>
                                <p><strong>Fecha:</strong> ${data.ticket.fecha}</p>
                                <p><strong>Total:</strong> XAF ${data.ticket.total}</p>
                                <h6>Productos:</h6>
                                <ul>
                                    ${data.ticket.productos.map(producto => `
                                        <li>${producto.nombre} - Cantidad: ${producto.cantidad} - Subtotal: XAF ${producto.subtotal}</li>
                                    `).join('')}
                                </ul>
                            `;
                        } else {
                            ticketContent.innerHTML = `<p class="text-danger">No se pudo cargar el ticket. Inténtalo nuevamente.</p>`;
                        }
                    } catch (error) {
                        console.error('Error parsing ticket response:', error);
                        ticketContent.innerHTML = `<p class="text-danger">Error al procesar el ticket.</p>`;
                    }
                } else {
                    ticketContent.innerHTML = `<p class="text-danger">Error al cargar el ticket. Código de estado: ${xhr.status}</p>`;
                }
            };
            xhr.onerror = function() {
                ticketContent.innerHTML = `<p class="text-danger">Error de red al intentar cargar el ticket.</p>`;
            };
            xhr.send();
        });
    </script>
</body>

</html>