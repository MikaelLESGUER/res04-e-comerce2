<?php

abstract class AbstractManager
{
    protected PDO $db;

    private string $dbName;
    private string $port;
    private string $host;
    private string $username;
    private string $password;

    public function __construct()
    {
        $this->dbName = "kevincorvaisier_e-commerce";
        $this->port = "3306";
        $this->host = "db.3wa.io";
        $this->username = "kevincorvaisier";
        $this->password = "04646b679a4ab0a202f8007ea81fe675";

        $this->db = new PDO(
            "mysql:host=$this->host;port=$this->port;charset=utf8;dbname=$this->dbName",
            $this->username,
            $this->password
        );
    }
}
