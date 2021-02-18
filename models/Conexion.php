<?php
namespace Models;

class Conexion{

    private const dbServer = "db";
    private const dbUser = "root";
    private const dbPass = "dorime";
    private const dbName = "pastelitos";

    public $link;

    public function __construct(){


        $this->link = new PDO('mysql:host='.self::dbServer.';dbname='.self::dbName.'', self::dbUser, self::dbPass);

        $this->link ->exec("set names utf8");

        return $this->link;
    }
}
