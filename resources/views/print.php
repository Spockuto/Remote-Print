<html>
    <head>
        <title>
            Remote Print
        </title>
        <meta charset ="UTF-8">
        <meta name="viewport"content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap-theme.min.css"> 
    </head>
    <body>
        <script "javascript">
            function Redirect(){
                <?php   
                    $_SESSION["panel_heading_index"]="<h4>Login.</h4>";?>
                window.location.assign("/");  
                alert("You have Successfully Logged out");
            }
            function FileCheck(){
                if (!document.getElementById("print-file").value) {
            	alert("Please choose a file!");    
                window.location.assign("/print");
                }
            }
            function Expiry(){
                window.location.assign("/expiry");
            }
        </script>
        <input style="position:absolute; top:5; right:5;" type="button" class="btn btn-outline-inverse btn-md" value="Logout" onclick="Redirect();" />
        <input style="position:absolute; top:5; right:80	;" type="button" class="btn btn-outline-inverse btn-md" value="Check Password Expiry" onclick="Expiry()">
        <div style="width:100%; height:300px; font-size:15;margin-top:40px; opacity:0.9; border:1px; text-align:center;">
           	<p style="font-size:30;color:black;">
           		Remote Print
           		<img src ="icon.png" height="80px" width="80px">
            </p>
			<div class="col-lg-6 col-sm-6 col-sm-offset-3 col-lg-offset-3">
                <div style="margin-top:10px;" class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?php 
                                if(!isset($print_name)){
                                    echo $_SESSION["panel_heading_print"];
                                }

                                else {
                                    echo $print_name;
                                }
                             ?>
                        </div>
                    	<div class="panel-body">
                      		<form class="form-inline" action="file-print" method="post" enctype="multipart/form-data" onsubmit="FileCheck();">
                        		<div class="form-group">
                                	<input type="file" name="print-file" id="print-file" ><br><br> 
                                	<input type="submit" class="btn btn-info btn-md" name ="submit" value="Print">
                            	</div>
                      		</form>
                    	</div>
                        <div style="margin-top:0px; "class ="container-fluid">
                            <h4>Supported File Types</h4>
                            <kbd>Images</kbd><mark>JPEG PNG </mark>
                            <kbd>Portables</kbd><mark>   PDF   </mark>
                            <h4>Maximum File Size 50MB</h4>  
                        </div><br><br>
                        <div style="margin-top:0px;font-size:25;color:black;text-align:center" class="row">
                            <small>
                                <cite>
                                    Made with &#10084 by <a href="http://delta.nitt.edu">Delta Force</a>
                                </cite> 
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>