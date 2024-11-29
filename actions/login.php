<?php
  include './conn.php';
  if(isset($_POST['btnSend'])){
    $correo = $_POST['txtCorreo'];
    $clave = $_POST['txtClave'];
   
    $sql = "SELECT ID_US, NOMBRES_US FROM USUARIOS_T WHERE CORREO_US = '$correo' AND CLAVE_US = '$clave' AND ESTATUS_US = 1";
    $data = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if ($data) {
        echo "Todo correcto";
        $_SESSION["idUser"] = $data['ID_US'];
        header("Location:inicio.php");
        exit();
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

  }
?>