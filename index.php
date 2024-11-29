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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="">
            <img src="images/logo.png"/>
            <span>
                Esencias Únicas Florencio
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- hero section -->
    <section class="why_section layout_padding">
    <div class="container">
    <div class="why_container my-4">
      <div class="img_box">
        <img src="images/why-img.jpg" alt="">
      </div>
    </div>
  </section>
  <section class="product_section layout_padding">
    </section>
    <section class="contact_section layout_padding">
      <div class="custom_heading-container">
        <h3 class="text-center " style="color: black;">
          INICIA SESIÓN
        </h3>
      </div>
      <div class="container layout_padding2-top">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <form method="POST">
            <div>
                <input type="text" id="txtCorreo" name="txtCorreo" placeholder="Correo">
              </div>
              <div>
                <input type="password" id="txtClave" name="txtClave" placeholder="Contraseña">
              </div>
              <div class="d-flex justify-content-center mb-2">
                <button type="submit" id="btnSend" name="btnSend">
                  Iniciar
                </button>
              </div>
              <!-- <div class="d-flex justify-content-center ">
                <button type="submit" id="btnCancelar" name="btnCancelar">
                  Cancelar
                </button>
              </div> -->
            </form>
          </div>
        </div>

      </div>
    </section>
                
        <section class="product_section layout_padding">
        </section>

<?php
include "./actions/login.php";
include 'footer.php';
?>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>