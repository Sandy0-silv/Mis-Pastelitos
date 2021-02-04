<?php
	//Datos de la conexión
	define( "HOST",     "localhost" );
	define( "USER",     "root" );
	define( "PASSWORD", "" );
	define( "DATABASE", "pastelitos" );	
	
	
	
	class Database 
	{
		private $_connection;
		private static $_instance;
		
		//Establecer la conexión o indicar errores
		private function __construct()
		{
			$this->_connection = new mysqli( HOST, USER, PASSWORD, DATABASE );
			
			if(mysqli_connect_error())
			{
				trigger_error("Fallo la conexion a MySQL: " . mysqli_connect_error(), E_USER_ERROR);
			}
			
		}

		//Función para la instancia de la Base de Datos	
		public static function getInstance()
		{
			if(!self::$_instance)
			{	
				self::$_instance = new self();
			}
			return self::$_instance;
		}

       //Función para retornar la conexión de la BD
		public function getConnection()
		{
			
			return $this->_connection;
			
		}
	}
  
?>



