<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
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
        if ($result == TRUE)
        {
            $_SESSION["panel_heading_print"]=sprintf("<h4>Welcome! %s </h4>",$username);
            $data["print_name"] = $_SESSION["panel_heading_print"];
            return view('print',$data);    
        } 
        else 
        {
            $_SESSION["panel_heading_index"]="<h4>Wrong Username & Password</h4>";
            $data["index_name"] = $_SESSION["panel_heading_index"];
            return view('index',$data);
        }
    }
    
    public function expiry()
    {             
        session_start();
        
        $username = $_SESSION["username"];
        $password = $_SESSION["password"];
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

        $data["expiry"] = "<h4>".date(DateTime::RFC822, $unixTimestamp)."</h4>";
        return view('expiry',$data);
    }   
}
