<?php
function agregaUsuario($params)
{
    $error = "";
    $valor = "";
    $nombre = $params["nombre"];
    $ape1 = $params["ape1"];
    $ape2 = $params["ape2"];
    $telefono = $params["telefono"];
    $email = $params["email"];
    $edad = $params["edad"];
    $usuario = $params["usuario"];
    $pass = $params["pass"];
    $query = "INSERT INTO `usuarios` (`nombre`, `apellido1`, `apellido2`, `telefono`, `correo`, `edad`, `usuario`, `password`)";
    $query .= " VALUES ('" . $nombre . "', '" . $ape1 . "', '" . $ape2 . "', '" . $telefono . "', '" . $email . "', '" . $edad . "', '" . $usuario . "', '" . $pass . "');";
    if (!empty($nombre) && !empty($ape1) && !empty($email)) {if (!$this->conn->query($query)) {
        $error = 'Ocurrio un error ejecutando el query [' . $this->conn->error . ']';
    }
        $valor = $this->conn->affected_rows;
    }
    $resul[] = $valor;
    $resul[] = $error;return $resul;
}
