<!DOCTYPE html>
<html>

<head>
<?php
 session_start();
        include_once 'dbconnect.php';
       

?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriMitron</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer-1.css">
</head>

<body>
    <nav class="navbar navbar-default custom-header">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">AgriMitron </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links"></ul>
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
    <ul class="nav nav-tabs nav-stacked nav-justified">
        <li><a href="gyc.php">Home </a></li>
        <li><a href="#">About us</a></li>
        <li><a href="majorcrops.php">Major Crops</a></li>
        <li><a href="gyc.php">Analysis Report</a></li>
        
        <li><a href="weather.php">Weather Updates</a></li>
        
    </ul>
    <div class="col-md-12">
        <div class="thumbnail"><img>
            <div class="caption">
            <h1>Analysis of your Crop conditions </h1>
                <h4>Ideal Crop-<?php
                $district=$_SESSION['district'];     
                $query="select crop_name from crop where soil_type ilike '%'||(select soil_type from kar_crops where district ilike '%$district')||'%';
";
                $res=pg_query($query);
                $row=pg_fetch_row($res, null, PGSQL_ASSOC);
                 echo $row['crop_name'];?>  
                 <br> Your current crop - <?php echo $_SESSION['crop'];?> </h4>
                 <h4>
                 <hr>
                 Ideal conditions - <br>
                 <?php
                 $crop=$_SESSION['crop'];
                 $query="select climatic_conditions from crop where crop_name ilike '%$crop%'";

                $res=pg_query($query);
                $row=pg_fetch_row($res, null, PGSQL_ASSOC);
                 ?>
                 <ul> <?php $row = explode(":",$row['climatic_conditions']);
                foreach($row as $f){
                  ?>
                   <li><?php echo $f; ?></li><br><?php }?>
                </ul>
                </h4>
                <h4 id="new">
                Prevailing Conditions -
                </h4>
                
                 <hr>
                 
                  <br><h4>
                  
                  Ideal Average rainfall - 
                 
                 <?php
                 $crop=$_SESSION['crop'];
                 
                 $query="select (annual/12) as average from rainfall where district ilike '%$district%'";

                $res=pg_query($query);
                $row=pg_fetch_row($res, null, PGSQL_ASSOC);
                 echo $row['average'];?>
                
                
                 </h4>
            </div>
        </div>
    </div>
    <div class="col-md-9"></div>
    <div class="col-md-12">
        <footer>
            <div class="row">
                <div class="col-md-4 col-sm-6 footer-navigation">
                    <h3><a href="#">AgriMitron </a></h3>
                    <p class="company-name">AgriMitron© 2017</p>
                </div>
                <div class="col-md-4 col-sm-6 footer-contacts">
                    <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                        <p><span class="new-line-span">Pes University,Blore</span></p>
                    </div>
                    <div><i class="fa fa-envelope footer-contacts-icon"></i>
                        <p> <a href="#" target="_blank">codeninja@gmailcom</a></p>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-4 footer-about">
                    <h4>About our website</h4>
                    <p>We help you grow crops and day to day weather update to notify you if your crops are in danger .</p>
                    <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<script><?php  $pin=$_SESSION['district'] ; ?>

var val = '<?php echo $pin ?>';



function getWeather(callback) {
    var weather = "http://api.openweathermap.org/data/2.5/forecast?q=";
    
    var val = "<?php echo $pin ?>";
    var second= "&appid=645f46ab1cba32cd253058835ce3632f";
    var res=weather.concat(val);
    var final=res.concat(second);

   //document.write("<h1>hey</h1>") ;
   //document.write(final);





    
    $.ajax({
      dataType: "jsonp",
      url: final,
      success: callback
    });
}

// get data:
getWeather(function (data) {
    console.log('weather data received');
    console.log(data.list[0].weather[0].description); 
    console.log(data.list[0].weather[0].main);  
});

getWeather(function (data) {
   

    //data['list'][j]['dt_txt'];
      
      var para = document.createElement("h4");
    var node = document.createTextNode("Rainfall conditions - " + data['list'][0]['weather'][0]['description']);
    para.appendChild(node);
    var element = document.getElementById("new");
    element.appendChild(para);
     var para = document.createElement("h4");
    var node = document.createTextNode("temperature condition - " +data.list[0].main.temp );
    para.appendChild(node);
    var element = document.getElementById("new");
    element.appendChild(para);
        
        });
                </script>
                 
</html>