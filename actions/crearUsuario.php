<?php
  include './conn.php';
  if(isset($_POST['btnAgregar'])){
    $idUsuario = $_SESSION['idUser'];
    $nombre = $_POST['txtNombres'];
    $apellidos = $_POST['txtApellidos'];
    $direccion = $_POST['txtDireccion'];
    $correo = $_POST['txtCorreo'];
    $clave = $_POST['txtClave'];
    $celular = $_POST['txtCelular'];
    $status = 1;// $status = $_POST['txtStatus'];
   
    $sql = "CALL CREAR_USUARIO(?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issssssi", $idUsuario, $nombre, $apellidos, $direccion, $correo, $clave, $celular, $status);
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