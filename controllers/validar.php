<?php
    @session_start();
    require_once("../models/modelo.php");

    $params = array(
        "usuario" =>$_POST['usuario'],
        "contrasenia" => $_POST['contrasenia'],

    );

    //print_r($params); die();

    $db = Database::getInstance();
    $conn = $db->getConnection();
    $sesion = new Modelo($conn);

    $registro = $sesion->validaUsuario($params);
    // var_dump($registro);
    if(!$registro){

        echo "<script>alert('El usuario o la contraseña son incorrectos');
        window.location.href='../acceder';
        </script>";

    } else {

        echo "<script>alert('Bienvenido');
        window.location.href='../home';
        </script>";

    }

?>