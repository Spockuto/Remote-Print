<?php 
	/*session_start();
	$username=$_SESSION["username"];
    $password=$_SESSION["password"];*/
	
	$username ="106114051";
    $password = "Octa500";
	

	$host = '10.0.0.39';
   	$domain = 'octa.edu';
   	$dn = "DC=octa,DC=edu";
    $mail = $username."@nitt.edu";
    

    $con = ldap_connect("ldap://{$host}") or die('Could not connect to LDAP server.');
	ldap_set_option($con, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($con, LDAP_OPT_REFERRALS, 0);
	$result =  @ldap_bind($con, $username.'@'.$domain,$password);
	$user_search = ldap_search($con,$dn,"(|(sAMAccountName=$username)(mail=$mail))");
	$auth_entry = ldap_first_entry($con, $user_search);
 	$user_dn = ldap_get_dn($con, $auth_entry);
	
	$pwdexpiry = ldap_get_values($con, $auth_entry, "pwdLastSet");
	$winSecs = (int)($pwdexpiry[0] / 10000000); 
	$unixTimestamp = ($winSecs - 11644473600); 
	$unixTimestamp= strtotime('+60 day', $unixTimestamp);

	$var = "margin: 0 auto; text-align: center; color: red; background: #FFF0F0; border: 1px solid red; border-radius: 10px; margin: 2px;" ;
	echo"<div";
	echo $var ;
	echo "><h4>Your Password will Expire On</h4>";
	echo "<h4>".date(DateTime::RFC822, $unixTimestamp)."</h4>";
	echo "</div>"
?>  