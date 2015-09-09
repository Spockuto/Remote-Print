<?php
	session_start();

	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	$_SESSION["panel_heading_print"]="";
	$target_dir = "/var/www/html/Upload/";
	$target_file = $target_dir . basename($_FILES["print-file"]["name"]);



	if(move_uploaded_file($_FILES['print-file']['tmp_name'], $target_file)) {
 		} 
	elseif($_FILES["print-file"]["name"]==NULL){
		$_SESSION["panel_heading_print"]=sprintf("<h4>Welcome! %s </h4>",$username);
		header("Location: ../html/print.php");
		}

	if($_FILES["print-file"]["name"]!=NULL){
		$cmd = sprintf(' smbclient //octa.edu/A4 %s -U %s -W octa.edu -I 10.0.0.38 -c "print %s; exit;"',$password,$username,$target_file);
		$output = shell_exec($cmd);
		if($output==NULL){
			$_SESSION["panel_heading_print"]="<h4>File sent to Printer</h4>";
			header("Location: ../html/print.php");
		}
		else {
			$_SESSION["panel_heading_print"]="<h4>Something Went Wrong. Try Again.</h4>";
			header("Location: ../html/print.php");
		}
	}
?>