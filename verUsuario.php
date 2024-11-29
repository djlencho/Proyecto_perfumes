<?php
    session_start();
?>
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
    <?php 
       include 'conn.php';
       $id = $_GET['id'];
       $sql = "SELECT ID_US, NOMBRES_US, APELLIDOS_US, DIRECCION_US, CELULAR_US, CORREO_US, CLAVE_US FROM USUARIOS_T WHERE ID_US = $id AND ESTATUS_US = 1";
       $resultado = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        mysqli_close($conn);

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
  <section class="product_section layout_padding">
    </section>
  
    <section class="contact_section layout_padding">
      <div class="custom_heading-container">
        <h3 class="text-center " style="color: black;">
          EDITAR DATOS DE USUARIO
        </h3>
      </div>
      <div class="container layout_padding2-top">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <form action="" method="POST">
            <div>
                <input id="txtNombres" name="txtNombres" type="text" placeholder="Nombres" value="<?php echo "{$resultado['NOMBRES_US']}";?>">
              </div>
              <div>
                <input id="txtApellidos" name="txtApellidos" type="text" placeholder="Apellidos" value="<?php echo "{$resultado['APELLIDOS_US']}";?>">
              </div>
              <div>
                  <input id="txtCelular" name="txtCelular" type="text" placeholder="Número de celular" value="<?php echo "{$resultado['CELULAR_US']}";?>">
                </div>
                <div>
                    <input id="txtCorreo" name="txtCorreo" type="text" placeholder="Correo electrónico" value="<?php echo "{$resultado['CORREO_US']}";?>">
                </div>
                <div>
                    <input id="txtClave" name="txtClave" type="password" placeholder="Contraseña" value="<?php echo "{$resultado['CLAVE_US']}";?>">
                </div>
                <div>
                  <input id="txtDireccion" name="txtDireccion" type="text" class="message-box" placeholder="Dirección" value="<?php echo "{$resultado['DIRECCION_US']}";?>">
                </div>
              <div class="d-flex justify-content-center mb-2">
                <button type="submit" id="btnAgregar" name="btnAgregar">
                  Editar
                </button>
              </div>
              <div class="d-flex justify-content-center ">
                <button type="submit" id="btnCancelar" name="btnCancelar">
                  Cancelar
                </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </section>
                
    <section class="product_section layout_padding">
    </section>

    <?php 
      include "./actions/editarUsuario.php";
      include 'footer.php'
    ?>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>