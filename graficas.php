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



  <!-- product section -->
  <!-- <section class="product_section layout_padding">
    <div class="d-flex justify-content-center">
      <h2 class="custom_heading">
        Our Products
      </h2>
    </div>
    <div class="container layout_padding2">
      <div class="img-box box-1">
        <img src="images/p-1.jpg" alt="">
      </div>
      <div class="img-box box-2">
        <img src="images/p-2.jpg" alt="">
      </div>
      <div class="img-box box-3">
        <img src="images/p-3.jpg" alt="">
      </div>
      <div class="img-box box-4">
        <img src="images/p-4.jpg" alt="">
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <a href="">
        See More
      </a>
    </div>
  </section> -->

  <!-- end product section -->

  <section class="about_section layout_padding">
   <?php
      $sql = 'SELECT COUNT(ID_V) AS cantidad, YEAR(FECHA_V) AS anio FROM VENTAS_T GROUP BY YEAR(FECHA_V)';
      $data = $conn->query($sql);
      $etiquetas = [];
      $datosVentas = [];

      foreach($data as $position => $array){
          array_push($etiquetas, $array['anio']);
          array_push($datosVentas, $array['cantidad']);
      }
    ?>
    <div class="d-flex justify-content-center">
      <h2 class="">
          Ventas anuales
      </h2>
    </div>
    <canvas id="ventasAnuales"></canvas>
    <script type="text/javascript">

      var $ventas = document.querySelector("#ventasAnuales");
      var etiquetas = <?php echo json_encode($etiquetas) ?>;
      var datosVentas = {
      label: "Ventas anuales",
      // Pasar los datos igualmente desde PHP
      data: <?php echo json_encode($datosVentas) ?>,
      backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
      borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
      borderWidth: 1, // Ancho del borde
      };
      const chart1 = new Chart($ventas, {
      type: 'line', // Tipo de gráfica
      data: {
          labels: etiquetas,
          datasets: [
              datosVentas,
          ]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }],
          },
      }
      });
    </script>
  </section>

  <section class="about_section layout_padding">
   <?php
      $sql = 'SELECT COALESCE(COUNT(v.ID_V), 0) AS cantidad, m.mes AS numero_mes
      FROM 
          (SELECT 1 AS mes
          UNION SELECT 2
          UNION SELECT 3
          UNION SELECT 4
          UNION SELECT 5
          UNION SELECT 6
          UNION SELECT 7
          UNION SELECT 8
          UNION SELECT 9
          UNION SELECT 10
          UNION SELECT 11
          UNION SELECT 12) AS m
      LEFT JOIN VENTAS_T v ON MONTH(v.FECHA_V) = m.mes AND YEAR(v.FECHA_V) = YEAR(NOW())
      GROUP BY m.mes
      ORDER BY m.mes';
      $data = $conn->query($sql);
      $etiquetas = ['Enero',"Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];  
      $datosVentas = [];

      foreach($data as $position => $array){
          array_push($datosVentas, $array['cantidad']);
      }
    ?>
    <div class="d-flex justify-content-center">
      <h2 class="">
          Ventas por mes
      </h2>
    </div>
    <canvas id="ventasMensuales"></canvas>
    <script type="text/javascript">

      var $ventas = document.querySelector("#ventasMensuales");
      var etiquetas = <?php echo json_encode($etiquetas) ?>;
      var datosVentas = {
      label: "Ventas anuales",
      // Pasar los datos igualmente desde PHP
      data: <?php echo json_encode($datosVentas) ?>,
      backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
      borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
      borderWidth: 1, // Ancho del borde
      };
      const chart2 = new Chart($ventas, {
      type: 'line', // Tipo de gráfica
      data: {
          labels: etiquetas,
          datasets: [
              datosVentas,
          ]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }],
          },
      }
      });
    </script>
  </section>
  
  <section class="about_section layout_padding">
   <?php
      $sql = 'SELECT p.NOMBRE_PD AS nombre, SUM(vd.CANTIDAD_PRODUCTO_VD) AS cantidad FROM PRODUCTOS_T p INNER JOIN VENTAS_DETALLE_T vd ON vd.ID_PD_VD = p.ID_PD GROUP BY nombre ORDER BY cantidad DESC LIMIT 10';
      $data = $conn->query($sql);
      $etiquetas = [];
      $datosVentas = [];

      foreach($data as $position => $array){
          array_push($etiquetas, $array['nombre']);
          array_push($datosVentas, $array['cantidad']);
      }
    ?>
    <div class="d-flex justify-content-center">
      <h2 class="">
          10 perfumes más vendidos
      </h2>
    </div>
    <canvas id="masVendidos"></canvas>
    <script type="text/javascript">

      var $ventas = document.querySelector("#masVendidos");
      var etiquetas = <?php echo json_encode($etiquetas) ?>;
      var datosVentas = {
      label: "10 perfumes más vendidos",
      // Pasar los datos igualmente desde PHP
      data: <?php echo json_encode($datosVentas) ?>,
      backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
      borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
      borderWidth: 1, // Ancho del borde
      };
      const chart3 = new Chart($ventas, {
      type: 'line', // Tipo de gráfica
      data: {
          labels: etiquetas,
          datasets: [
              datosVentas,
          ]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }],
          },
      }
      });
    </script>
  </section>

  <?php include "footer.php"; ?>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>