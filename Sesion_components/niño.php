<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Niños</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <link rel="stylesheet" href="../css/styleform.css">
    <link rel="stylesheet" href="../css/gente.css">
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

            <script>
                var btnProfil = document.querySelector('#btnModalPrefil');
                btnProfil.addEventListener('click', (e) => {
                    e.preventDefault();
                    console.log('Funcion del Modal');
                });
            </script>

            <div class="carrito">
                <div id="carrito" data-bs-toggle="modal" data-bs-target="#Modalcarrito" class="btn"><i class="fa-solid fa-cart-shopping"></i></div>
            </div>

            <script>
                var btnCarrito = document.querySelector('#carrito');
                btnCarrito.addEventListener('click', () => {
                    console.log('modal carrito');

                });
            </script>

            <div class="ajustes">
                <div class="btn"><i class="fa-solid fa-ellipsis-vertical"></i></div>
            </div>

            <div class="idioma">
                <div class="btnLenguaje">
                    <img src="../img/bandera.png" alt="" width="35px"><span>ES</span>
                </div>
            </div>

        </div>

    </header>
    <div class="headerFalso"></div>
    <nav class="container" id="nav">
        <div class="navbar btn">
            <a href="hombre.php">
                <label for="">Hombres</label>
                <i class="fa-solid fa-person"></i>
            </a>
        </div>
        <div class="navbar btn">
            <a href="mujer.php">
                <label for="#">Mujeres</label>
                <i class="fa-solid fa-person-dress"></i>
            </a>
        </div>
        <div class="navbar btn">
            <a href="niño.php">
                <label for="#">Niños</label>
                <i class="fa-solid fa-child"></i>
            </a>
        </div>
        <div class="navbar btn">
            <a href="niña.php">
                <label for="#">Niñas</label>
                <i class="fa-solid fa-child-dress"></i>
            </a>
        </div>
        <div class="navbar btn">
            <a href="../session_iniciada.php">
                <label for="#">Mercados</label>
                <i class="fa-solid fa-store"></i>
            </a>
        </div>
    </nav>

    <main>
        <div class="titulo-gente">
            <h1>Niños</h1>
        </div>

        <div class="buscador container mt-1 mb-1">
            <form action="" id="buscador">
                <label for="">El nombre de tu Zapatilla !</label>
                <input type="text">
                <label for=""><i class="fa-solid fa-magnifying-glass" style="font-size: 20px;"></i></label>
                <div class="btnADD" id="btnAdd"><i class="fa-solid fa-square-plus"></i></div>
            </form>
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
                <div class="pack">
                    <div class="img"><img src="../img/InShot_20250113_121830319.png" alt=""></div>
                </div>
            </div>
        </div>

        <div class="marcas container mt-3">
            <div class="m-c">
                <div class="logo"><a href="adidas/index.php"><img src="../img/adidas.png" width="90px" alt=""></a></div>
                <div class="logo"><a href="newBalance/index.php"><img src="../img/new-balance.jpg" width="90px" alt=""></a></div>
                <div class="logo"><a href="nike/index.php"><img src="../img/nike.png" width="90px" alt=""></a></div>
                <div class="logo"><a href="underArmour/index.php"><img src="../img/underarmour.png" width="90px" alt=""></a></div>
                <div class="logo"><a href="jordan/index.php"><img src="../img/jordan.png" width="90px" alt=""></a></div>
            </div>
        </div>

        <div class="modelos container mt-3">
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Adidas !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    New Balance !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Nike !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Under Armour !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Jordan !
                </div>
            </div>
        </div>
        <div class="modelos container mt-3">
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Adidas !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    New Balance !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Nike !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Under Armour !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Jordan !
                </div>
            </div>
        </div>
        <div class="modelos container mt-3">
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Adidas !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    New Balance !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Nike !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Under Armour !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Jordan !
                </div>
            </div>
        </div>
        <div class="modelos container mt-3">
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Adidas !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    New Balance !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Nike !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Under Armour !
                </div>
            </div>
            <div class="imagen" style="background-image: url('../img/jjj.png');">
                <div class="text">
                    Jordan !
                </div>
            </div>
        </div>


        <div class="buscador container">
            <form action="" id="buscador">
                <label for="">El nombre de lo que buscas aqui !</label>
                <input type="text">
                <label for=""><i class="fa-solid fa-magnifying-glass" style="font-size: 20px;"></i></label>
            </form>
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
                    <img src="../img/adidas.png" alt="">
                </div>
                <div class="imagen">
                    <img src="../img/new-balance.jpg" alt="">
                </div>
                <div class="imagen">
                    <img src="../img/nike.png" alt="">
                </div>
                <div class="imagen">
                    <img src="../img/underarmour.png" alt="">
                </div>
                <div class="imagen">
                    <img src="../img/jordan.png" alt="">
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
                    <p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="Modalcarrito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...Modalcarrito
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content" style=" background-color: transparent;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" style="font-family:fantasy;" id="exampleModalLabel">Mi Perfil</h1>
                </div>
                <div class="modal-body">
                    <div class="card" style="width: 100%;">
                        <div class="card-header" style="display: flex; gap:10px;">
                            <h3 style=" color:brown; font-family:fantasy;"><?php echo $_SESSION['nombre']?> </h3> <h3 style=" color:black; font-family:fantasy;"><?php echo $_SESSION['apellido']?> </h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style=" font-family:fantasy;"><?php echo $_SESSION['email']?></li>
                            <li class="list-group-item" style=" font-family:fantasy;"><?php echo $_SESSION['telefono']?></li>
                            <li class="list-group-item" style=" font-family:fantasy;"><?php echo $_SESSION['direccion']?></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style=" background-color:red;" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
        </div>
    </div>


    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2.js"></script>
    <script src="../js/funciones.js"></script>
</body>

</html>