<?php

include '../classes/Machine.php';
include '../classes/Connection.php';
header('Content-Type: application/json');

$connection = new Connection();
$conn = $connection->getInstance();

extract($_POST);

$machine = Machine::find($id, $conn);

$machine->setMarque($marque);
$machine->setPrix($prix);

$machine->update();

echo $machine;