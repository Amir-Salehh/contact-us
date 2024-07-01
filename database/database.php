<?php

$username='root' ;
$password='';
$host='localhost';
$db_name='contact-us';

try {
    $conn = new PDO("mysql: host=$host ; dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error){
    echo "errors: ". $error->getMessage();
}