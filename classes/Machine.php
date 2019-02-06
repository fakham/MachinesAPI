<?php

class Machine {

    private $conn;
    private $id;
    private $marque;
    private $prix;

    function __construct($conn, $id, $marque, $prix) {
        $this->conn = $conn;
        $this->id = $id;
        $this->marque = $marque;
        $this->prix = $prix;
    }

    function getId() {
        return $this->id;
    }

    function getMarque() {
        return $this->marque;
    }

    function getPrix() {
        return $this->prix;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMarque($marque) {
        $this->marque = $marque;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    function all() {
        $machines = $this->conn->query('SELECT * FROM machines')->fetchAll();
        return $machines;
    }

    static function find($id, $conn) {
        $statement = $conn->prepare("SELECT * FROM machines WHERE id = :id");
        $statement->execute(['id' => $id]);
        $data = $statement->fetch();
        return new Machine($conn, $data->id, $data->marque, $data->prix);
    }

    function create() {
        $statement = $this->conn->prepare("INSERT INTO machines(marque, prix) VALUES (:marque, :prix)");
        $statement->execute(['marque' => $this->marque, 'prix' => $this->prix]);
        return $this->conn->lastInsertId();
    }

    function update() {
        $statement = $this->conn->prepare("UPDATE machines SET marque = :marque, prix = :prix WHERE id = :id");
        $statement->execute(['marque' => $this->marque, 'prix' => $this->prix, 'id' => $this->id]);
    }

    static function delete($id, $conn) {
        $statement = $conn->prepare("DELETE FROM machines WHERE id = :id");
        $statement->execute(['id' => $id]);
    }

    function __toString()
    {
        return json_encode(['id' => $this->id, 'marque' => $this->marque, 'prix' => $this->prix]);
    }
}