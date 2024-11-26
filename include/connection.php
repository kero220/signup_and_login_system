<?php
$DSN = 'mysql: host=localhost; dbname=myfirstdb';  // Data Source Name
$dbUsername = 'root';
$dbPassword = '';

try {
   $PDO = new PDO($DSN, $dbUsername, $dbPassword);  // PHP Data Object
   // mysqli_connect("localhost", $dbUsername, $dbPassword, "mufirstdb");     // ONLY MYSQL CONNECTION
   $PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOEXCEPTION $error){
   echo "Connection Failed: " . $error->getMessage();
}