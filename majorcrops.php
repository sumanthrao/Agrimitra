
<html>


<title> Major Crops </title>
 <?php
 include_once 'dbconnect.php'; 
 session_start();
?>		
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriMitron</title>
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

<?php
    for($i=0;$i<10;$i++){
    $res = pg_query("SELECT * FROM crop where id=".($i+1));
    $row =pg_fetch_array($res, null, PGSQL_ASSOC);
	?>
    <table border="black">
	<tr >
		<td style="padding:10px;"><?php echo $row["id"];?></td>
		<td style="padding:10px;"><?php echo $row["crop_name"];?></td>
		<td style="padding:10px;"><?php echo $row["characteristics"];?></td>
		<td style="padding:10px;"><?php echo $row["soil_type"];?></td>
		<td style="padding:10px;"><?php echo $row["climatic_conditions"];?></td>
		<td style="padding:10px;"><?php echo $row["states"];?></td>
	</tr>
	<?php } ?>
     </table>
</body>

</html>
