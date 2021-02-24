<?php
@session_start();
require_once("../models/modelo.php");
require_once("../controllers/conexion.php");
	require_once("../controllers/controlador.php");

$params = array(
    "nombre" => $_POST['nombre'],
    "apellido1" => $_POST['apellido1'],
    "apellido2" => $_POST['apellido2'],
    "telefono" => $_POST['telefono'],
    "email" => $_POST['email'],
    "email" => $_POST['email'],
    "usuario" => $_POST['usuario'],
    "contrasenia" => password_hash($_POST['contrasenia'], PASSWORD_DEFAULT),
    "edad" => $_POST['edad'],
);

// // $user = "root";
// // $pass = "dorime";
// // $dbh = new PDO('mysql:host=localhost;dbname=pastelitos', $user, $pass);


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
  window.location.href='/home';
</script>";
}
?>