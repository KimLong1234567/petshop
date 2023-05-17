<?php

$username = "root";
$password = "";

$host = "localhost";
$database = "petshop";

try{
    $con = new mysqli($host, $username, $password, $database);
}
catch (e){
    echo "Ket nối thất bại";
}
?> 