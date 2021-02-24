<?php
namespace Controllers\RegistrarUsuario;

use Models\RegistrarUsuario\RegistrarUsuarioModel;
// require("../../models/RegistrarUsuario/RegistrarUsuarioModel.php");


class RegistrarUsuarioController{
     

    public function register(){

        $params = array(
        "nombre" => $_POST['nombre'],
        "apellido1" => $_POST['apellido1'],
        "apellido2" => $_POST['apellido2'],
        "telefono" => $_POST['telefono'],
        "email" => $_POST['email'],
        "contrasenia" => $_POST['contrasenia'],
        "edad" => $_POST['edad'],
        );

    // // $user = "root";
    // // $pass = "dorime";
    // // $dbh = new PDO('mysql:host=localhost;dbname=pastelitos', $user, $pass);
        var_dump($params);
        $registro = new RegistrarUsuarioModel();
        if($registro->registrar($params)){
            echo "<script>alert('Usuario Registrado exitosamente')<script>";
        }
        else{
            echo "<script>alert('For any reason it did not work')<script>";
        }
    }
    

}

$hi=new RegistrarUsuarioController();
$hi->register();




?>