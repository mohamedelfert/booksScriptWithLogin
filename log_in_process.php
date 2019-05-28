<?php

/*
 * Created by PhpStorm.
 * User: mohamed ibrahiem elfert
 * Date: 20/02/2017
 * Time: 07:00 م
*/

include 'connect.php';

$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'],FILTER_SANITIZE_NUMBER_INT);

if (empty($username && $password)){
    
    echo "<h2>Please fill out the fields !</h2>" . "<br>";
    
} else {
    
    $query = $conn->prepare("SELECT * FROM users where username = ? and password = ?")
                                  or die(getMessage($conn));
    $query->execute(array($username,$password));
    $row =  $query->fetch();
    $count = $query->rowCount();
    if ($count > 0){
        
        $row ['username'] = $username ;
        $row ['password'] = $password ;
        header("Location: control.php");
        
    } else {
        
        echo "<h2>Failed To Log in !!!  Please Try Again Later .</h2>" . "<br>";
        
    }
    
}

?>

<a href="index.php">Go Back To Log In Form</a>
