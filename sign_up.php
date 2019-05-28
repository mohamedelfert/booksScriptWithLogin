<!--
 * Created by PhpStorm.
 * User: mohamed ibrahiem elfert
 * Date: 20/02/2017
 * Time: 07:00 م
-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sign Up Form</title>
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/normalize.css"/>
        <link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<form class="signUp" action="sign_up_process.php" method="post">
			<label>Name :</label>
            <i class="fa fa-user" aria-hidden="true"></i>
			<input type="text" name="name" placeholder="Type Your Name">
			
            <label>Email :</label>
            <i class="fa fa-envelope" aria-hidden="true"></i>
			<input type="email" name="email" placeholder="Type Your Email">
            
			<label>UserName :</label>
            <i class="fa fa-user" aria-hidden="true"></i>
			<input type="text" name="username" placeholder="Type Your Username">
			
			<label>Password :</label>
            <i class="fa fa-key" aria-hidden="true"></i>
			<input type="password" name="password" placeholder="Type Your Password">
			
			<label>City :</label>
            <i class="fa fa-globe" aria-hidden="true"></i>
			<input type="text" name="city" placeholder="Type Your City">

			<label>Message :</label>
			<textarea name="message" placeholder="Type Your Message"></textarea>
            
			<i id="sendf" class="fa fa-paper-plane" aria-hidden="true"></i>
			<input id="sendbut" type="submit" value="Sign Up">
			<a href="index.php">Go To Log In Form</a>
		</form>

        <div class="alert alert-info">
            <strong>copyright &copy;  2017 Mohamed Elfert &trade;</strong>
        </div>		
	</body>
</html>