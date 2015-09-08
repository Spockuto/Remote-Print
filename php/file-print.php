<?php
session_start();

$username = $_SESSION["username"];
$password = $_SESSION["password"];

$target_dir = "/var/www/html/Upload/";
$target_file = $target_dir . basename($_FILES["print-file"]["name"]);



if (move_uploaded_file($_FILES['print-file']['tmp_name'], $target_file)) {
    echo "File is valid, and was successfully uploaded.<br>";
} else {
    header("Location: ../html/unsuccess.html");
	exit();
}

$cmd = sprintf(' smbclient //octa.edu/A4-4515X %s -U %s -W octa.edu -I 10.0.0.38 -c "print %s; exit;" 2>&1 1> /dev/null',$password,$username,$target_file);
$output = shell_exec($cmd);
$str = "Domain=[OCTA] OS=[Windows Server 2008 R2 Enterprise 7600] Server=[Windows Server 2008 R2 Enterprise 6.1]";
$va = strcmp($output,$str);
echo $va;
if($va==1){
	header("Location: ../html/success.html");
	exit();
}
else{
	header("Location: ../html/unsuccess.html");
	exit();
}




?>