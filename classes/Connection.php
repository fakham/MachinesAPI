<?php

class Connection {

    private $server;
    private $username;
    private $password;
    private $database;

    function __construct()
    {
        $this->server = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'MachinesAPI';
    }

    function getInstance() {
        $dsn = "mysql:host=$this->server;dbname=$this->database";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        $pdo = new PDO($dsn, $this->username, $this->password, $options);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }

}