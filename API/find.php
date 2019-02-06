<?php

include '../classes/Machine.php';
include '../classes/Connection.php';
header('Content-Type: application/json');

$connection = new Connection();
$conn = $connection->getInstance();

$machine = Machine::find($_GET['id'], $conn);
echo $machine;