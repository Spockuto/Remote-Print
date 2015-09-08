<html>
    <head>
        <title>
            Welcome!
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
            window.location = "../index.html";  
            alert("You have been Successfully Logged out");
          }
        </script>
        <div style="width:100%; height:300px; font-size:15;margin-top:50px; opacity:0.9; border:1px; text-align:center;">
           	<p style="font-size:60">
           		Title Goes Here!
           		<img src ="../img/icon.png" height="80px" width="80px">
            </p>
			<div class="col-lg-4 col-sm-8 col-sm-offset-2 col-lg-offset-4">
                <div style="margin-top:80px;" class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                          <?php include "../php/user.php"; ?>
                        </div>
                    	<div class="panel-body">
                      		<form class="form-inline" action="../php/file-print.php" method="post">
                        		<div class="form-group">
                                <input type="file" name="file">
                                <br><br> 
                                <input type="submit" class="btn btn-info btn-md" name ="submit" value="Print">
                                <input type="button" class="btn btn-danger btn-md" value="Logout" onclick="Redirect();" />
                            </div>
                      		</form>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
        <footer class="footer" style="display:inline-block;position:relative;">
            <div class="container">
            	<div style="margin-top:60px;font-size:25;">
              		<small>
              			<cite>
              				<br>Made with &#10084 by Delta
              			</cite>
              		</small>
              	</div>
            </div>
        </footer>
    </body>
</html>
