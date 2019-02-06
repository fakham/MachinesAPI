<?php

include '../classes/Machine.php';
include '../classes/Connection.php';
header('Content-Type: application/json');

$connection = new Connection();
$conn = $connection->getInstance();

$machine = new Machine($conn, NULL, NULL, NULL);
echo json_encode($machine->all());