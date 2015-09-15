<html>
    <head>
        <title>
            Title Goes Here!
        </title>
        <meta charset ="UTF-8">
        <meta viewport="width:device-width;initial-scale:1;">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap-theme.min.css"> 
    </head>
    <body style="background-image:url('../img/background.jpg');background-repeat:no-repeat;background-size:cover; ">
        <script "javascript">
          function Redirect(){
          	 <?php
          	 	session_start();
            	$_SESSION["panel_heading_index"]="<h4>Login.</h4>";
             ?>
            window.location.assign("../index.php");  
            alert("You have Successfully Logged out");
        	}
          function FileCheck(){
            if (!document.getElementById("print-file").value) {
            	alert("Please choose a file!");
            }
          }
          function Expiry(){
            window.location.assign("expiry.php");
          }
        </script>
        <input style="position:absolute; top:5; right:5;" type="button" class="btn btn-outline-inverse btn-md" value="Logout" onclick="Redirect();" />
        <input style="position:absolute; top:5; right:80;" type="button" class="btn btn-primary btn-md disabled" value="Change Password">
        <input style="position:absolute; top:5; right:225	;" type="button" class="btn btn-outline-inverse btn-md" value="Check Password Expiry" onclick="Expiry()">
        <div style="width:100%; height:300px; font-size:15;margin-top:40px; opacity:0.9; border:1px; text-align:center;">
           	<p style="font-size:60;color:black;">
           		Title Goes Here!
           		<img src ="../img/icon.png" height="80px" width="80px">
            </p>
			      <div class="col-lg-6 col-sm-8 col-sm-offset-2 col-lg-offset-3">
                <div style="margin-top:10px;" class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          <?php
                              session_start();
                              if($_SESSION["panel_heading_print"]==NULL){
                              	echo $_SESSION["panel_heading_index"];
                              } 
                              else{
                              	echo $_SESSION["panel_heading_print"];
                              	$_SESSION["panel_heading_index"]=NULL;
                              }
                         	?>
                        </div>
                    	<div class="panel-body">
                      		<form class="form-inline" action="../php/file-print.php" method="post" enctype="multipart/form-data" onsubmit="FileCheck();">
                        		<div class="form-group">
                                	<input type="file" name="print-file" id="print-file" ><br><br> 
                                	<input type="submit" class="btn btn-info btn-md" name ="submit" value="Print">
                            	</div>
                      		</form>
                    	</div>
                      <div style="margin-top:0px; "class ="container-fluid">
                          <h3>Supported File Types</h3>
                          <kbd>Images</kbd><mark>JPEG PNG </mark>
                          <kbd>Portables</kbd><mark>   PDF   </mark>
                          <!--<kbd>Text</kbd><mark>    TXT DOC DOCX </mark> -->
                          <h3>Maximum File Size 2MB</h3>  
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-sm-offset-3 col-lg-offset-4">
        	<div style="margin-top:5px;font-size:25;color:black;text-align:center" class="row">
            	<small>
              		<cite>
              			Made with &#10084 by <a href="http://delta.nitt.edu">Delta Force</a>
             		 </cite>
            	</small>
          	</div>
        </div>
    </body>
</html>