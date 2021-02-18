<?php
namespace Models\RegistrarUsuario;
// require('../../models/Conexion.php');
use Models\Conexion;
use PDO;

class RegistrarUsuarioModel{
    public function registrar($datos){

        $conexion=new Conexion();
		echo gettype( $conexion );
		var_dump($conexion);

        $query = $conexion->prepare('INSERT INTO `users` (`name`, `lastname1`, `lastname2`, `phone`, `email`, `age`, `password`) VALUES (:name, :lastname1, :lastname2, :phone, :email, :age, :password);');

        var_dump($query);

        $stmt->bindParam(':name', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':lastname1', $datos['apellido1'], PDO::PARAM_STR);
        $stmt->bindParam(':lastname2', $datos['apellido2'], PDO::PARAM_STR);
        $stmt->bindParam(':phone', $datos['telefono'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':age', $datos['edad'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $datos['contrasenia'], PDO::PARAM_STR);

        if(!$stmt->execute()){
				$error = $stmt->errorInfo();

				if($error[1]==1062){

					if((strpos($error[2], "usuario")) != false){
						return "Error en el registro: El usuario ya está registrado, verifique sus datos";
					}
					else if((strpos($error[2], "email")) != false)	{
						return "Error en el registro: El email ya está en nuestros datos, intente con otro";
					}
				}

        }

        if(!$stmt->execute()){
				$error = $stmt->errorInfo();

				if($error[1]==1062){

					if((strpos($error[2], "usuario")) != false){
						return "Error en el registro: El usuario ya está registrado, verifique sus datos";
					}
					else if((strpos($error[2], "email")) != false)	{
						return "Error en el registro: El email ya está en nuestros datos, intente con otro";
					}
				}
				$respuestaRegistro = 'Error en la consulta:Código de error:'.$stmt[2];
				unset($link,$stmt);
				return $respuestaRegistro;

			}

			else{
				unset($link, $stmt);
				return true;
			}

    
    }
}



