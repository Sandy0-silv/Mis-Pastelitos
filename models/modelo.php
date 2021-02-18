
<?php
	require_once("../controllers/conexion.php");
	require_once("../controllers/controlador.php");
	
	
	class Modelo{
		
		private $conn;
		
		function __construct( $conexion ){
			$this->conn = $conexion;
		}

		function select( $consulta ){ 
		    $this->total_consultas++;
		    $resultado = mysqli_query($this->conn, $consulta);
		    if(!$resultado){ 
		    	$error = 'MySQL Error: ' . mysqli_connect_error();
		    	
		    }
		    return $resultado;
		}
		
		function mostrarTablas( ){
			$sqlTablas = "SELECT TABLE_NAME as 'tabla' FROM INFORMATION_SCHEMA.tables ";
			$sqlTablas .= "WHERE TABLE_SHEMA='sistema_archivos'";
			//Se ejecuta la consulta
			$resTablas = mysqli_query($this->conn, $sqlTablas);
			if( !$resTablas ){ 
		    	$error = 'MySQL Error: ' . mysqli_connect_error();
		    	$alert = 'danger';
			}
			$resultado = array();
			while($row = mysqli_fetch_array($resTablas))
			{
				$resultado[] = $row['tabla'];
			}
			return $resultado;
		}

		function agregaUsuario( $params ){
			$error = "";
			$valor = "";
			$nombre = $params["nombre"];
			$ape1 = $params["apellido1"];
			$ape2 = $params["apellido2"];
			$telefono = $params["telefono"];
			$email = $params["email"];
			$edad =$params["edad"];
			$usuario = $params["usuario"];
			$pass = $params["contrasenia"];
			$query = "INSERT INTO `users` (`name`, `lastname1`, `lastname2`, `phone`, `email`, `age`, `password`)";

			$query .= " VALUES ('".$nombre."', '".$ape1."', '".$ape2."', '".$telefono."', '".$email."', '".$edad."', '".$pass."');";

			if(!empty( $nombre ) && !empty( $ape1 ) && !empty( $email ) ){ 
				if(! $this->conn->query($query)){
					$error = 'Ocurrio un error ejecutando el query [' . $this->conn->error . ']';
					$resul[] = $valor;
					$resul[] = $error; 
					return $resul;
			}

			$valor = $this->conn->affected_rows;
			}
			$resul[] = $valor;
			$resul[] = $error; 
			return $resul;
		}

		
		function validaUsuario( $params ){
			$error = "";
			$valor = "";
			$user = $params["usuario"];
			$pass = $params["contrasenia"];
			$query = "SELECT * FROM users WHERE email = '".$user."'";
			// var_dump($pass);
			
			$resultado = mysqli_query($this->conn, $query);
			// var_dump($resultado);

			

			while ($row = $resultado->fetch_assoc()) {

				if(!password_verify($pass,$row['password'])){
					return false;
				}
				$_SESSION["nombre"] = $row['name'];
				$_SESSION["usuario"] = $row['email'];
			}
				
				
			

			
			
			// while($row = mysqli_fetch_array($resultado)){
			// 	var_dump($row['name']);
				
			// }
			// var_dump($resultado);
			// if(mysqli_num_rows($resultado)!= 0){
			// $valor = "OK";
			// session_start();
			// $_SESSION["logueado"] = TRUE;
			// while($row = mysqli_fetch_array($resultado)){
			// 	$_SESSION["nombre"] = $row['nombre'];
			// 	$_SESSION["usuario"] = $row['usuario'];
			// }
			// }
			
		
			// }
			
			return true;
			// }
			
			return true;
		}



	}
		