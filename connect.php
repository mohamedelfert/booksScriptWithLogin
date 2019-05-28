<?php
/**
 * Created by PhpStorm.
 * User: mohamed ibrahiem elfert
 * Date: 23/02/2017
 * Time: 08:00 م
 */

$dsn = "mysql:host=localhost;dbname=booksscript";
$user = "root";
$pass = "";

try{
    $conn = new PDO($dsn,$user,$pass);
} catch (Exception $e){
    echo "<h3>Failed To Connect To MySQL : { " . $e->getMessage() . " }</h3>";
}
