#Use this for User Authentication

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
    header("Location: ../html/print.php");
} else {
    header("Location: ../html/wrong.html");
}

?>
