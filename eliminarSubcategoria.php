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
        $sql = "SELECT ID_ST, ID_CT_ST, NOMBRE_ST, DESCRIPCION_ST FROM SUBCATEGORIAS_T WHERE ID_ST = $id";
        $resultado = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $sql = "SELECT ID_CT, NOMBRE_CT FROM CATEGORIAS_T WHERE ESTATUS_CT = 1";
        $categorias = $conn->query($sql);
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
          ELIMINAR SUBCATEGORÍA
        </h3>
      </div>
      <div class="container layout_padding2-top">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <form action="" method="POST">
            <div>
                <input disabled id="txtNombre" name="txtNombre" type="text" placeholder="Nombre" value="<?php echo "{$resultado['NOMBRE_ST']}";?>">
              </div>
              <div>
                <input disabled id="txtDescripcion" name="txtDescripcion" type="text" class="message-box" placeholder="Descripción" value="<?php echo "{$resultado['DESCRIPCION_ST']}";?>">
              </div>
              <div>
                <select disabled id="txtCategoria" name="txtCategoria" class="form-control mb-3">
                  <option value="" disabled selected>Categoría</option>
                  <?php
                    if ($categorias->num_rows > 0) {
                        while ($row = $categorias->fetch_assoc()) {
                            echo "<option id='{$row["ID_CT"]}' value='{$row["ID_CT"]}'>{$row["NOMBRE_CT"]}</option>";
                        }
                    }
                  ?>
                </select>
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
      include "./actions/eliminarSubcategoria.php";
      include 'footer.php'
    ?>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>