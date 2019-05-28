<!--
 * Created by PhpStorm.
 * User: mohamed ibrahiem elfert
 * Date: 20/02/2017
 * Time: 07:00 م
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/normalize.css"/>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <form class="login" action="log_in_process.php" method="post">
            <label>UserName :</label>
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" name="username" placeholder="Type Your UserName">
            <label>Password :</label>
            <i class="fa fa-key" aria-hidden="true"></i>
            <input type="password" name="password" placeholder="Type Your Password">
            <i id="sendf" class="fa fa-sign-in" aria-hidden="true"></i>
            <input id="sendbut" type="submit" value="Login">
            <a href="sign_up.php">Go To Sign Up Form</a>
        </form>

        <div class="alert alert-info">
            <strong>copyright &copy;  2017 Mohamed Elfert &trade;</strong>
        </div>
    </body>
</html>