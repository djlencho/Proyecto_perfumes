<?php
  include './conn.php';
  if(isset($_POST['btnAgregar'])){
    $idUsuario = $_SESSION['idUser'];
    $nombre = $_POST['txtNombre'];
    $nombreInterno = $_POST['txtNombreInterno'];
    $sku = $_POST['txtSku'];
    $descripcion = $_POST['txtDescripcion'];
    $marca = $_POST['txtMarca'];
    $categoria = $_POST['txtCategoria'];
    $subcategoria = $_POST['txtSubcategoria'];
    $status = 1; // $status = $_POST['txtStatus'];
   
    $sql = "CALL EDITAR_PRODUCTO(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iissssiiii", $idUsuario, $id, $nombre, $nombreInterno, $sku, $descripcion, $categoria, $subcategoria, $marca, $status);
    if (mysqli_stmt_execute($stmt)) {
        // echo "Consulta realizada correctamente";
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