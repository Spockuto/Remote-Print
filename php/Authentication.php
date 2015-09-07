#Use this for User Authentication

<?php

$username = $_POST['username'];
$password = $_POST['password'];


if($username == "106114104" && $password == "a"){
	header("Location: ../html/print.html");
	exit();
}

else{
	header("Location: ../html/wrong.html");
	exit();
}

?>