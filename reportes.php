<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Esencias Únicas Florencio</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <script src="./js/chart.js"></script>
  <?php 
    include 'conn.php';
  ?>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="" />
            <span>
                Esencias Únicas Florencio
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item">
                  <a class="nav-link" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="graficas.php"> Gráficas </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reportes.php"> Reportes </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consultas.php"> Consultas </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="historial.php"> Historial </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="usuarios.php">Usuarios</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

  </div>
  <!-- end hero area -->



 <!-- Inicio tabla perfumes más vendidos -->
 <section class="about_section layout_padding">
    <h1 class="text-center">Listado de perfumes más vendidos</h1>
        <table class="table table-hover border">
            <thead>
                <tr>
                    <!-- <th scope="col">ID_Cliente</th> -->
                    <th scope="col">Nombre</th>
                    <!-- <th scope="col">Marca</th> -->
                    <th scope="col">Sku</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cantidad vendida</th>
                    <!-- <th scope="col">Opciones</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT p.NOMBRE_PD, p.SKU_PD, p.FECHA_ALTA_PD, SUM(vd.CANTIDAD_PRODUCTO_VD) AS cantidad FROM PRODUCTOS_T p INNER JOIN VENTAS_DETALLE_T vd ON vd.ID_PD_VD = p.ID_PD GROUP BY NOMBRE_PD ORDER BY cantidad DESC LIMIT 10";
                $resultado = $conn->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        // echo "<td>" . $row['ID_PD'] . "</td>";
                        echo "<td>" . $row['NOMBRE_PD'] . "</td>";
                        // echo "<td>" . $row['NOMBRE_M'] . "</td>";
                        echo "<td>" . $row['SKU_PD'] . "</td>";
                        echo "<td>" . $row['FECHA_ALTA_PD'] . "</td>";
                        echo "<td>" . $row['cantidad'] . "</td>";
                        // echo "<td><a href='verProducto.php?id={$row["ID_PD"]}' class='btn btn-success'>Editar</a><a href='eliminarProducto.php?id={$row["ID_PD"]}' class='btn btn-danger'>Eliminar</a></td>";
                        // echo "<td><a href='productos/editarProducto.php?id=". $row["ID_PD"] . "&user=" . $user ."' class='btn btn-success'>Editar</a>  <a href='clientes/editarCliente.php?id=" . $row['ID_Cliente'] . "&user=" . $user ."' class='btn btn-warning'>Editar</a> <a href='clientes/eliminarCliente.php?id=" . $row['ID_Cliente'] . "&user=" . $user ."' class='btn btn-danger'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay registros</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>


<!-- Final de tabla perfumes más vendidos -->


<!-- Inicio tabla ventas por rango de fechas -->



<!-- Final de tabla por rangos de fecha -->

<!-- Inicio tabla ventas por perfume -->
<section class="about_section layout_padding">
    <h1 class="text-center">Listado de perfumes más vendidos</h1>
        <table class="table table-hover border">
            <thead>
                <tr>
                    <!-- <th scope="col">ID_Cliente</th> -->
                    <th scope="col">Número de venta</th>
                    <th scope="col">Nombre</th>
                    <!-- <th scope="col">Marca</th> -->
                    <th scope="col">Cantidad vendida</th>
                    <th scope="col">Precio total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT p.NOMBRE_PD, v.ID_V_VD, v.CANTIDAD_PRODUCTO_VD, v.PRECIO_TOTAL_VD FROM PRODUCTOS_T p INNER JOIN VENTAS_DETALLE_T v ON v.NOMBRE_PD_VD = p.NOMBRE_PD ORDER BY p.ID_PD";
                $resultado = $conn->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        // echo "<td>" . $row['ID_PD'] . "</td>";
                        echo "<td>" . $row['ID_V_VD'] . "</td>";
                        echo "<td>" . $row['NOMBRE_PD'] . "</td>";
                        // echo "<td>" . $row['NOMBRE_M'] . "</td>";
                        echo "<td>" . $row['CANTIDAD_PRODUCTO_VD'] . "</td>";
                        echo "<td>" . $row['PRECIO_TOTAL_VD'] . "</td>";
                        // echo "<td><a href='verProducto.php?id={$row["ID_PD"]}' class='btn btn-success'>Editar</a><a href='eliminarProducto.php?id={$row["ID_PD"]}' class='btn btn-danger'>Eliminar</a></td>";
                        // echo "<td><a href='productos/editarProducto.php?id=". $row["ID_PD"] . "&user=" . $user ."' class='btn btn-success'>Editar</a>  <a href='clientes/editarCliente.php?id=" . $row['ID_Cliente'] . "&user=" . $user ."' class='btn btn-warning'>Editar</a> <a href='clientes/eliminarCliente.php?id=" . $row['ID_Cliente'] . "&user=" . $user ."' class='btn btn-danger'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay registros</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="why_section d-flex justify-content-center">
            <a href="agregarProducto.php">
                Agregar perfume
            </a>
        </div>
    </section>


<!-- Final de tabla ventas por perfume -->


  <?php include "footer.php"; ?>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>