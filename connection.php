<?php

$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "aaaaa"; 

$conn = new mysqli("localhost", "root", "", "aaaaa");

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

?> 