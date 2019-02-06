<?php

include '../classes/Machine.php';
include '../classes/Connection.php';

$connection = new Connection();
$conn = $connection->getInstance();

Machine::delete($_POST['id'], $conn);