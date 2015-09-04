<?php

$username = $_POST['username'];
$password = $_POST['password'];
if(isset($_POST["submit"])){
$target_dir = "UPLOAD";
$target_file = $target_dir . basename($_FILES["print_file"]["file"]);
echo $username $password ;}
?>
