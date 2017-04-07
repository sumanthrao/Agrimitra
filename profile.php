
<html>

<head>
 <?php
        include_once 'dbconnect.php';
        session_start();
        $var = $_SESSION['email'];
        $res = pg_query("SELECT * FROM users WHERE email='$var'");
        $row =pg_fetch_array($res, null, PGSQL_ASSOC);
 
 if(isset($_POST['btn-signup'])) {
     
		$email = $_SESSION['email'];
	    
        $phone = $_POST['phone'];
		$district = $_POST['district'];
        $state = $_POST['state'];
        $crop = $_POST['crop'];
        $pincode = $_POST['pincode'];
        $query="update users set(phone,district,state,crop_list,pincode)=('$phone','$district','$state','$crop','$pincode') where email='$email' ";       
		if(pg_query($query)){
	
    
    $_SESSION['district']=$district ;
    $_SESSION['crop']=$crop;
    ?>
    <script>alert('Successfully registered! You are being redirected to homepage.');
						setTimeout(function(){location.href="gyc.php"} , 500);</script>
			</script>
<?php
		}
		else {
	?>
			<script>alert('Error while registration.');
            location.href="profile.php"
            </script>
	<?php
		}
	} 
 
?>		
 
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
</head>

<body>
     <nav class="navbar navbar-default custom-header">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Agri<span>Mitron </span> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
               
                <ul class="nav navbar-nav navbar-right">
                <li role="presentation"><a href="#">Welcome <?php echo $row['name'] ?></a></li>
                    <li class="dropdown">
                    
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <span class="caret"></span><img src="assets/img/avatar_2x.png" class="dropdown-image"></a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            
                            <li role="presentation" class="active"><a href="logout.php">Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <ul class="nav nav-tabs nav-justified">
        <li><a href="home.php" id="one">Home </a></li>
        
    </ul>
    
    <div class="page-header">
        <h1 class="text-center bg-info">Enter details to grow crop</h1></div>
    <div class="col-md-12">
        <form class="well form-horizontal" method="post" id="contact_form">
            <fieldset>
                
                <div class="form-group">
                    <label class="col-md-4 control-label">Phone #</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">State</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <input name="state" class="form-control selectpicker">
                               
                            </input>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">District</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <input name="district"  class="form-control selectpicker">
                                
                            </input>
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-4 control-label">Pin-Code</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <input name="pincode"  class="form-control selectpicker">
                                
                            </input>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Crop</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <input name="crop"  class="form-control selectpicker">
                                
                            </input>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" name ="btn-signup" class="btn btn-warning">Lets Grow!</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>