#Use this for User Authentication

<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION["username"] = $username;
$_SESSION["password"] = $password;



if($username == "106114104" && $password == "Octa104"){
	header("Location: ../html/print.php");
	exit();
}

else{
	header("Location: ../html/wrong.html");
	exit();
}

?>