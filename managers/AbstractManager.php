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
        $this->dbName = "blanchepeltier_e-commerce";
        $this->port = "3306";
        $this->host = "db.3wa.io";
        $this->username = "blanchepeltier";
        $this->password = "6df6213ed1bccc46589270829cdb7338";

        $this->db = new PDO(
            "mysql:host=$this->host;port=$this->port;dbname=$this->dbName",
            $this->username,
            $this->password
        );
    }
}
