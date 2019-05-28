<?php

/*
 * Created by PhpStorm.
 * User: mohamed ibrahiem elfert
 * Date: 20/02/2017
 * Time: 07:00 م
*/

include 'connect.php';

$name     = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$email    = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'],FILTER_SANITIZE_NUMBER_INT);
$city     = filter_var($_POST['city'],FILTER_SANITIZE_STRING);
$message  = filter_var($_POST['message'],FILTER_SANITIZE_STRING);

if (empty($name && $email && $username && $password && $city || $message)){
    
    echo "<h2>Please fill out the fields !</h2>" . "<br>";
    
} else {
    
    $query = $conn->prepare("INSERT INTO users (name,email,username,password,city,message) 
                                      VALUES ('$name','$email','$username','$password','$city','$message')")
                                      or die(getMessage($conn));
    $query->execute();
    
    echo "<h2>receipt of your application ." . "<br>";
    
}

?>

<a href="sign_up.php">Go Back To Sign Up Form</a>