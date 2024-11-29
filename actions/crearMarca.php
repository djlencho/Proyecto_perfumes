<?php
  include './conn.php';
  if(isset($_POST['btnAgregar'])){
    $idUsuario = $_SESSION['idUser'];
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $status = 1; // $status = $_POST['txtStatus'];
   
    $sql = "CALL CREAR_MARCA(?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issi", $idUsuario, $nombre, $descripcion, $status);
    if (mysqli_stmt_execute($stmt)) {
        echo "Consulta realizada correctamente";
    } else {
        echo "Error al ejecutar el procedimiento almacenado: " . mysqli_error($conn);
    }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);

  }else if(isset($_POST['btnCancelar'])){
    header("Location: agregar.php");
    exit;
  }
?>