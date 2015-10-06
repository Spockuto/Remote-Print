<html>
    <head>
        <title>
            Welcome!
        </title>
        <meta charset ="UTF-8">
        <meta name="viewport"content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" media="all" href="bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" media="all" href="bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="bootstrap/dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" media="all" href="bootstrap/dist/css/bootstrap-theme.min.css">
    </head>
    <body>
    	<script "javascript">
    		function UserValidation(){
				  var username;
				  username = document.forms["auth"]["username"].value;

				  if(isNaN(username)||username<100000000||username>1000000000){
					 alert("Enter a Valid Roll Number");
                      return false;
				  }
				  else{
                      return true;
				  }
        	}
      	</script>
        <div style="width:100%; height:300px; font-size:15;margin-top:50px; opacity:1.0; border:1px; text-align:center;">
           	<p style="font-size:30;color:black;"id="mass">
           		Remote Print
           		<img src ="icon.png" height="80px" width="80px">
            </p>
	        <div class="col-lg-4 col-sm-4 col-sm-offset-4 col-lg-offset-4">
	            <div style="margin-top:80px;" class="row">
	                <div class="panel panel-primary">
	                    <div class="panel-heading">
	                        <?php echo $index_name;	?>
	                    </div>
	                    <div class="panel-body">
	                      	<form name="auth" class="form-inline" action="auth" method="post" onsubmit="return UserValidation()">
	                        	<div class="form-group">
	                        		<label for="un">
	                        			Username
	                        		</label> 
	                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                              	<input type="text"  class="form-control" id="un" name="username" placeholder="Roll Number" required><br><br>
	                              	<label for="pw">
	                              		Password
	                              	</label>
	                              	<input type="password" class= "form-control" id="pw" name="password" placeholder="Octa Password" required><br><br>
	                                <input type="submit" class="btn btn-info btn-md" name ="submit" value="Submit"><br><br>
	                                <div style="margin-top:0px;font-size:25;color:black;text-align:center" class="row">
	                                	<small>
	              							<cite>
	                							Made with &#10084 by <a href="http://delta.nitt.edu">Delta Force</a>
	                						</cite> 
	                					</small>
	                				</div>
	                			</div>
	                      	</form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
    </body>
</html>
