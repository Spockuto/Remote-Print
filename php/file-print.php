<?php
	session_start();

	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	$_SESSION["panel_heading_print"]="";

	$filename = $_FILES["print-file"]["name"];
	$target_dir = "/var/www/html/Upload/";
	$target_file = $target_dir . basename($filename);



	if(move_uploaded_file($_FILES['print-file']['tmp_name'], $target_file)) {
		$ext = 	pathinfo($filename, PATHINFO_EXTENSION);
		$file = basename($filename,'.'. $ext);	
		$ext = '.'.strtolower($ext);

	
		if($ext == '.pdf'){
			$cmd = sprintf("bash Shell-Script.sh %s %s%s.pcl",$target_file,$target_dir,$file);
		}
		elseif($ext == '.jpg' || $ext == '.png'){
			$cmd = sprintf("convert %s %s%s.pcl",$target_file,$target_dir,$file);	
		}
		else{
			$_SESSION["panel_heading_print"]="<h4>Error. File Type not Supported</h4>";
			header("Location: ../html/print.php");
		}
		shell_exec($cmd);
		$target_file = sprintf("%s%s.pcl",$target_dir,$file);
		
		$cmd=sprintf("chmod 777 %s",$target_file);
		shell_exec($cmd);
		
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
	
	elseif($_FILES["print-file"]["name"]==NULL){
		$_SESSION["panel_heading_print"]=sprintf("<h4>Welcome! %s </h4>",$username);
		header("Location: ../html/print.php");
	}	
?>