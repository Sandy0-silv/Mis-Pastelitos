<?php
namespace Models;

use PDO;

class Conexion{

    private const dbServer = "db";
    private const dbUser = "root";
    private const dbPass = "dorime";
    private const dbName = "pastelitos";

    public $link;

    public function __construct(){


        
        try {
            $this->link = new PDO('mysql:host=' . self::dbServer . ';dbname=' . self::dbName . '', self::dbUser, self::dbPass);
            $this->link->exec("set names utf8");

            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            $this->link = "Error en la consulta";
            echo "ERROR: ". $e->getMessage();
        }

        

        return $this->link;
    }
}
