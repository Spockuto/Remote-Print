<html>
    <head>
        <title>
            Instructions
        </title>
        <meta charset ="UTF-8">
        <meta name="viewport"content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" media="all" href="../bootstrap/dist/css/bootstrap-theme.min.css"> 
    </head>
    <body>
        <script type="text/javascript">
            function back(){
                window.location.assign("/print");
            }
        </script>
        
        <div style="width:100%; height:300px; font-size:15;margin-top:10px; opacity:0.9; border:1px; text-align:center;">
            <p style="font-size:60;color:black;">
                Instructions
            </p>  
            <input type="button" style="position:absolute; top:5; right:5;" class="btn btn-outline-inverse btn-sm" name ="back" value="BACK" onclick=back();>
            <div class="col-lg-6 col-sm-6 col-sm-offset-3 col-lg-offset-3">
                <div style="margin-top:5px;" class="row">
                    <div class="panel panel-warning ">
                        <div class="panel-heading">
                            <?php 
                                echo '<p class="lead">Your Password will Expire On</p>';
                                echo $expiry;
                            ?> 
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item active">
                                    Password Reset Insrtuctions
                                </li>
                                <li class="list-group-item">
                                    The password will expire on the <kbd>EXACT DATE AND TIME</kbd>.Students are asked to plan accordingly as many facilities depend on your<mark>Octa password</mark>
                                </li>
                                <li class="list-group-item">
                                    The password requires a minimum of <mark>7 characters with atleast one uppercase , one lowercase and a number</mark>
                                </li>
                            </ul> 
                            <ul class="list-group">
                                <li class="list-group-item active">
                                    To Reset a Password
                                </li>
                                <li class="list-group-item">
                                    Try Logging in with your expired credentials in an Octa computer.You will be asked to reset your password
                                </li>
                                <li class="list-group-item">
                                    Contact Octagon Staff. They will get the job done for you
                                </li> 
                            </ul>       		
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-sm-offset-3 col-lg-offset-4">
                <div style="margin-top:0px;font-size:25;color:black;text-align:center" class="row" >
                    <small>
                        <cite>
                            Made with &#10084 by <a href="http://delta.nitt.edu">Delta Force</a>
                        </cite>
                    </small>
                </div>
            </div>
        </div>
    </body>
</html>