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
  <?php include 'conn.php';?>
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
                <li class="nav-item active">
                  <a class="nav-link" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
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

     <!-- Inicio tabla historial -->
     <section class="about_section layout_padding">
    <h1 class="text-center">Historial de acciones</h1>
        <table class="table table-hover border">
            <thead>
                <tr>
                    <!-- <th scope="col">ID_Cliente</th> -->
                    <th scope="col">Acción realizada</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Tabla afectada</th>
                    <th scope="col">Fecha</th>
                    <!-- <th scope="col">Acciones</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT ID_HA, ACCION_HA, NOMBRE_US_HA, TABLA_AFECTADA_HA, FECHA_HA FROM HISTORIAL_ACCIONES_T";
                $resultado = $conn->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['ACCION_HA'] . "</td>";
                        echo "<td>" . $row['NOMBRE_US_HA'] . "</td>";
                        echo "<td>" . $row['TABLA_AFECTADA_HA'] . "</td>";
                        echo "<td>" . $row['FECHA_HA'] . "</td>";
                        // echo "<td><a href='verHistorial.php?id={$row["ID_HA"]}' class='btn btn-success'>Ver detalle</a></td>";
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


<!-- Final de tabla de historial -->



    <?php 
      include 'footer.php'
    ?>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>