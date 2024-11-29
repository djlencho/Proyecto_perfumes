<?php
  include './conn.php';
  if(isset($_POST['btnAgregar'])){
    $idUsuario = $_SESSION['idUser'];
    $categoria = $_POST['txtCategoria'];
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $status = 1; // $status = $_POST['txtStatus'];
   
    $sql = "CALL EDITAR_SUBCATEGORIA(?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iiissi", $idUsuario, $id, $categoria, $nombre, $descripcion, $status);
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