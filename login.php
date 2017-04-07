<!DOCTYPE html>
<html>
<?php
	session_start();
	include_once 'dbconnect.php';

	if(isset($_SESSION['user'])!="") {
	?>
		<script>alert("You are already logged in. Redirecting to home page");
		setTimeout(function(){location.href="index.php"} , 500);</script>
	<?php
		
	}

	if(isset($_POST['btn-login'])) {

		$email = ($_POST['email']);
		$upass = ($_POST['pass']);
		$res = pg_query("SELECT * FROM users WHERE email='$email'");
		$row =pg_fetch_array($res, null, PGSQL_ASSOC);
		
		if($row['password'] == md5($upass)) {
			$_SESSION['user'] = $row['id'];
            	$_SESSION['email'] = $row['email'];
            ?>
            <script>
            alert("You have succesfully logged in");
		setTimeout(function(){location.href="home.php"} , 500);</script>
			
            </script>
		<?php
        }
		else {
			?>
			<script>alert('Wrong details');</script>
			<?php
		}
	}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">AGRIMITRON </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="signup.php">SIGNUP </a></li>
                </ul>
           
            </div>
        </div>
    </nav>
    <div class="login-card"><img src="assets/img/avatar_2x.png" class="profile-img-card">
        <p class="profile-name-card"> </p>
        <form  class="form-signin" method=post><span class="reauth-email"> </span>
        
            <input class="form-control" type="email" name="email" required="" placeholder="Email address" autofocus="" id="inputEmail">
            <input class="form-control" type="password" name="pass" required="" placeholder="Password" id="inputPassword">
            <div class="checkbox">
                <div class="checkbox">
                    <label>
                        <input type="checkbox">Remember me</label>
                </div>
            </div>
            <button class="btn btn-primary btn-block btn-lg btn-signin" name="btn-login" type="submit">logiN </button>
        </form><a href="#" class="forgot-password">Forgot your password?</a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>