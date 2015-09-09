<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;

	$host = '10.0.0.39';
	$domain = 'octa.edu';

	$ad = ldap_connect("ldap://{$host}") or die('Could not connect to LDAP server.');
	ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
	$result = @ldap_bind($ad, $username.'@'.$domain,$password);

	ldap_unbind($ad);
	if ($result == TRUE) {
		$_SESSION["panel_heading_print"]=sprintf("<h4>Welcome! %s </h4>",$username);
		header("Location: ../html/print.php");
		exit();
    } 
    else {
		$_SESSION["panel_heading_index"]="<h4>Wrong Username & Password</h4>";
		header("Location: ../index.php");
	}
?>