<?php

abstract class AbstractManager
{
    protected PDO $db;

    

    public function __construct()
    {
        $dbName = "kevincorvaisier_e-commerce";
        $port = "3306";
        $host = "db.3wa.io";
        $username = "kevincorvaisier";
        $password = "04646b679a4ab0a202f8007ea81fe675";
        

        $this->db = new PDO(
            "mysql:host=$host;port=$port;charset=utf8;dbname=$dbName",
            $username,
            $password
        );
    }
}
