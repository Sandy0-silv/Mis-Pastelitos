<?php
$mysqli = new mysqli("localhost", "root", "", "pastelitos");

if($mysqli->connect_errno){
    echo "Fallo la conexión con la BD" .
        $mysqli->connect_errno . "-----" . $mysqli->connect_error;
}else{
    echo "Conexión exitosa";
}
return $mysqli;
?>