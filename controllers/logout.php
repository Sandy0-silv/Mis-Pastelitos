<?php 

    @session_start();

    //liberar las variables de sesion registradas
    unset($_SESSION["nombre"]);
    unset($_SESSION["usuario"]);
    unset($_SESSION["id"]);

    //Borrar los datos de la sesion actual
    session_destroy();

    //redireccionar al index
    header("Location: /");
    
    

?>