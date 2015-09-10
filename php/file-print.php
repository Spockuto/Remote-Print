<?php
	session_start();

	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	$_SESSION["panel_heading_print"]="";

	$filename = $_FILES["print-file"]["name"];
	$target_dir = "/var/www/html/Upload/";
	$target_file = $target_dir . basename($filename);



	if(move_uploaded_file($_FILES['print-file']['tmp_name'], $target_file)) {
 		} 
	elseif($_FILES["print-file"]["name"]==NULL){
		$_SESSION["panel_heading_print"]=sprintf("<h4>Welcome! %s </h4>",$username);
		header("Location: ../html/print.php");
		}


	$ext = 	pathinfo($filename, PATHINFO_EXTENSION);
	$file = basename($filename, $ext);
	$ext = strtolower($ext);


	if($ext == 'gif' || $ext == 'png' || $ext == 'jpg' || $ext == 'bmp' || $ext =='jpeg'){
		$cmd = sprintf(" convert %s eps:%s%s.ps",$targetfile,$target_dir,$file);
		shell_exec($cmd);
		$target_file = sprintf("%s%s.eps",$target_dir,$file);
	}
	elseif($ext == 'pdf' ){
		$cmd = sprintf(" pdftops %s %s%s.ps",$targetfile,$target_dir,$file);
		shell_exec($cmd);
		$target_file = sprintf("%s%s.ps",$target_dir,$file);

	}
	elseif($ext == 'doc' || $ext == 'docx' || $ext == 'txt'){
		$cmd = sprintf(" groff -Tps %s > %s%s.ps",$targetfile,$target_dir,$file);
		shell_exec($cmd);
		$target_file = sprintf("%s%s.ps",$target_dir,$file);

	}
	else(){
		echo "Error. File Type not Supported";
	}


	if($filename!=NULL){

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
?>