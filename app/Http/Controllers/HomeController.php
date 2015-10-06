<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        session_start();
        if(!isset($_SESSION["panel_heading_index"]))
        {
            $data["index_name"] =  "<h4>Login.</h4>";    
        }
        else 
        {   
            $_SESSION["panel_heading"]=NULL;
            $data["index_name"] = $_SESSION["panel_heading_index"] ;
        }
        return view('index',$data);
    }
    
    public function printpage()
    {  
        session_start();
        if(!isset($_SESSION["panel_heading_print"]))
        {
            $data["print_name"]= $_SESSION["panel_heading_index"];
        } 
        else
        {
            $_SESSION["panel_heading_index"]=NULL;
            $data["print_name"] = $_SESSION["panel_heading_print"];
        }
        return view('print',$data);
    }
}