<?php
@session_start();
require_once("../modelo/modelo.php");
$params = array(
    "nombre" => $_POST['nombre'],
    "apellido1" => $_POST['apellido1'],
    "apellido2" => $_POST['apellido2'],
    "telefono" => $_POST['telefono'],
    "email" => $_POST['email'],
    "email" => $_POST['email'],
    "usuario" => $_POST['usuario'],
    "contrasenia" => $_POST['contrasenia'],
    "edad" => $_POST['edad'],
);


$db = Database::getInstance();
$conn = $db->getConnection();
$sesion = new Modelo($conn);

list ($valor, $error) = $sesion->agregausuario($params);


if(empty($valor)){
    if(!empty($error)) {
        $_SESSION["error"] = $error;
        echo $error;
    }
} else{
    echo "Usuario Registrado";
    echo "<script>alert('Usuario registrado exitosamente');
  window.location.href='../index.html';
</script>";
}
?>