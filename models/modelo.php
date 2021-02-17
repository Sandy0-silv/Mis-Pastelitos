
<?php
	require_once("../controlador/conexion.php");
	require_once("../controlador/controlador.php");
	
	
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
			$sqlTablas .= "WHERE TABLE_SCHEMA='sistema_archivos'";
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
			$query = "INSERT INTO `users` (`nombre`, `apellido1`, `apellido2`, `telefono`, `correo`, `edad`, `usuario`, `password`)";

			$query .= " VALUES ('".$nombre."', '".$ape1."', '".$ape2."', '".$telefono."', '".$email."', '".$edad."', '".$usuario."', '".$pass."');";

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

		

	}
		