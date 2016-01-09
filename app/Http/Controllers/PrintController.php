<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Log;

class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        session_start();

        $username = $_SESSION["username"];
        $password = $_SESSION["password"];
        $_SESSION["panel_heading_print"]="";
        date_default_timezone_set('Asia/Kolkata');
        $filename = $_FILES["print-file"]["name"];
        $path = storage_path(); 
        $target_dir = $path."/app/Upload/";
        $filename = preg_replace('/\s+/', '_', basename($filename));
        $target_file = $target_dir . $filename;

        if(move_uploaded_file($_FILES['print-file']['tmp_name'], $target_file)) 
        {
            $ext =  pathinfo($filename, PATHINFO_EXTENSION);
            $file = basename($filename,'.'. $ext);  
            $ext = '.'.strtolower($ext);
            
            if($ext == '.pdf')
            {
                $path = storage_path();
                $path =$path."/app/print.sh";
                $cmd = sprintf("bash %s %s %s%s.pcl",$path,$target_file,$target_dir,$file);
            }
            
            elseif($ext == '.jpg' || $ext == '.png')
            {
                $cmd = sprintf("convert %s %s%s.pcl",$target_file,$target_dir,$file);   
            }
            
            else
            {
                $_SESSION["panel_heading_print"]="<h4>Error. File Type not Supported</h4>";
                return view('print');
            }
        
            shell_exec($cmd);
            $target_file = sprintf("%s%s.pcl",$target_dir,$file);
        
            $cmd=sprintf("chmod 777 %s",$target_file);
            shell_exec($cmd);
        
            $cmd = sprintf(' smbclient //octa.edu/A4 %s -U %s -W octa.edu -I 10.0.0.38 -c "print %s; exit;"',$password,$username,$target_file);
            $output = shell_exec($cmd);
            $date = date('d-m-Y H:i');
            if($output==NULL)
            {
                $_SESSION["panel_heading_print"]="<h4>File sent to Printer</h4>";
                Log::info('File Successfully Printed', array('Username' => $username , 'filename' => $target_file , 'time' => $date));
                return view('print');
            }
        
            else 
            {
                $_SESSION["panel_heading_print"]= "<h4>Something Went Wrong. Try Again.</h4>";
                Log::info('File not Printed', array('Username' => $username , 'filename' => $target_file , 'time' => $date));
                return view('print');
            }
        } 
    
        elseif($_FILES["print-file"]["name"]==NULL)
        {
            $_SESSION["panel_heading_print"]=sprintf("<h4>Welcome! %s </h4>",$username);
            return view('print');
        }
    }
}