<?php

include '../classes/Machine.php';
include '../classes/Connection.php';
header('Content-Type: application/json');

$connection = new Connection();
$conn = $connection->getInstance();

$machine = new Machine($conn, NULL, $_POST['marque'], $_POST['prix']);
echo json_encode(['id' => $machine->create()]);