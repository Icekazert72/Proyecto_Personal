<?php

session_start();

include('../../Proyecto_Fin_de_curso/php/conexion.php');

if (!isset($_SESSION['id']) || !isset($_SESSION['nombre'])) {
  header('Location: ../../../../Proyecto_Fin_de_curso/index.php');
  exit();
} else if ($_SESSION['tipo_usuario'] !== 'admin') {
  header('Location: ../../../../Proyecto_Fin_de_curso/session_iniciada.php');
  exit();
}

// Conectar a la base de datos
$db = new Database();
$conn = $db->getConnection();

// Contar registros en la tabla de pedidos
$query = 'SELECT COUNT(*) AS count FROM pedidos';
$result = $conn->query($query);
$pedidosCount = $result->fetch_assoc()['count'];

// Contar registros en la tabla de usuarios
$query = 'SELECT COUNT(*) AS count FROM usuarios';
$result = $conn->query($query);
$usuariosCount = $result->fetch_assoc()['count'];

// Contar registros en la tabla de productos
$query = 'SELECT COUNT(*) AS count FROM productos';
$result = $conn->query($query);
$productosCount = $result->fetch_assoc()['count'];

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/fontawesome.min.css">
  <link rel="stylesheet" href="../css/sweetalert2.css">
  <link rel="stylesheet" href="../css/admin.css">
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
    <div class="tablas">
      <div class="botones">
        <div class="btn" id="btnPedidosRecientes">Pedidos Recientes</div>
        <div class="btn" id="btnUsuariosRecientes">Usuarios Recientes</div>
        <div class="btn" id="btnProductosReservados">Productos Disponibles</div>
        <div class="btn" id="btnNuevoProducto">Nuevo Producto</div>
      </div>

      <div class="conttent_tables mt-5">
        <table class="table Pedidos_Recientes" id="Pedidos_Recientes">
          <thead>
            <tr>
              <th scope="col">Num</th>
              <th scope="col">Nombre</th>
              <th scope="col">Cant.Productos</th>
              <th scope="col">Nombre</th>
              <th scope="col">Fecha</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="tbodyPedidosRecientes">
            <tr>
              <!-- <th scope="row">1</th>
              <td>Luiz Mario Cortez</td>
              <td>5</td>
              <td>Jordan IV</td>
              <td>12-24-2025</td>
              <td>15.000 xaf</td> -->
            </tr>
          </tbody>
        </table>

        <table class="table Usuarios_Recientes" id="Usuarios_Recientes" style="display:none;">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Email</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Fecha de Creación</th>
            </tr>
          </thead>
          <tbody >
            <!-- Contenido dinámico -->
          </tbody>
        </table>

        <table class="table Productos_Reservados" id="Productos_Reservados" style="display:none;">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descripción</th>
              <th scope="col">Precio</th>
              <th scope="col">Stock</th>
              <th scope="col">Categoría</th>
            </tr>
          </thead>
          <tbody>
            <!-- Contenido dinámico -->
          </tbody>
        </table>
      </div>
    </div>

    <div class="contadores">
      <div class="tablon pedidos">
        <div class="text">Pedidos</div>
        <div class="cantidad">
          <h3><?php echo $pedidosCount; ?></h3>
        </div>
      </div>
      <div class="tablon Usuarios">
        <div class="text">Usuarios</div>
        <div class="cantidad">
          <h3><?php echo $usuariosCount; ?></h3>
        </div>
      </div>
      <div class="tablon Productos">
        <div class="text">Productos</div>
        <div class="cantidad">
          <h3><?php echo $productosCount; ?></h3>
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

  <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
      <h2 class="offcanvas-title" id="staticBackdropLabel" style="font-family: fantasy; color:brown;">nDONGz</h2>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" style="color: brown;">Mi Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php/gestion_productos.php" style="color: brown;">Nuevo Producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: brown;">Gestion Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: brown;">Estadisticas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: brown;">Mensageria</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php/gestion_usuarios.php" style="color: brown;">Administradores y Colaboradores</a>
          </li>
          <li class="nav-item" style="position: relative; top:200px;">
            <button type="button" class="nav-link" href="#" id="btn_cerrar_sesion" style="color: red; border: none;">Cerrar Sesion <i class="fa-solid fa-right-from-bracket" style="margin-left: 20px;"></i></button>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/sweetalert2.js"></script>
  <script src="js/Pedidos_Recientes.js"></script>
  <script src="js/Usuarios_Recientes.js"></script>
  <script src="js/Productos_Reservados.js"></script>
  <script>
    document.getElementById('btnPedidosRecientes').addEventListener('click', function() {
      document.getElementById('Pedidos_Recientes').style.display = 'table';
      document.getElementById('Usuarios_Recientes').style.display = 'none';
      document.getElementById('Productos_Reservados').style.display = 'none';
    });

    document.getElementById('btnUsuariosRecientes').addEventListener('click', function() {
      document.getElementById('Pedidos_Recientes').style.display = 'none';
      document.getElementById('Usuarios_Recientes').style.display = 'table';
      document.getElementById('Productos_Reservados').style.display = 'none';
    });

    document.getElementById('btnProductosReservados').addEventListener('click', function() {
      document.getElementById('Pedidos_Recientes').style.display = 'none';
      document.getElementById('Usuarios_Recientes').style.display = 'none';
      document.getElementById('Productos_Reservados').style.display = 'table';
    });

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
      fetch('../php/logout.php')
        .then(response => {
          if (response.ok) {
            // Esperar 5 segundos antes de redirigir
            setTimeout(() => {
              window.location.href = '../login/login.php';
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