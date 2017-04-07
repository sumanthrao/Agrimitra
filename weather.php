<!DOCTYPE html>
<?php session_start() ; include_once 'dbconnect.php'; $pin=$_SESSION['district'];
$var = $_SESSION['email'];
        $res = pg_query("SELECT * FROM users WHERE email='$var'");
        $row =pg_fetch_array($res, null, PGSQL_ASSOC); ?>
<html>

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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Agri<span>Mitra </span> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links">
                    
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li role="presentation"><a href="#">Welcome guest  </a></li>
                    <li class="dropdown">
                    
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <span class="caret"></span><img src="assets/img/avatar_2x.png" class="dropdown-image"></a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li role="presentation"><a href="#">Settings </a></li>
                            <li role="presentation"><a href="#">Payments </a></li>
                            <li role="presentation" class="active"><a href="logout.php">Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <ul class="nav nav-tabs nav-justified">
        <li><a href="home.php">Home </a></li>
        <li><a href="#">About us</a></li>
            <li><a href="weather.php">Get weather updates</a></li>
        <li><a href="majorcrops.php">Major crops</a></li>
        <li><a href="gyc.php">Analysis Report</a></li>
        
    </ul>
    <div class="col-md-3" style="float:left;">
        <div class="thumbnail"><img src="assets/img/avatar_2x.png">
            <div class="caption">
                <h3>Your Profile</h3>
                <p>Name:&nbsp&nbsp<?php echo $row['name'];?><br/>State:&nbsp&nbsp<?php echo $row['state'];?><br/>District:&nbsp&nbsp<?php echo $row['district'];?><br/>CropList:&nbsp&nbsp<?php echo $row['crop_list'];?><br/></p>
            </div>
        </div>
    </div>


<meta charset="utf-8">

    <script src="http://code.jquery.com/jquery-1.7.min.js" ></script>
    <script src="http://code.jquery.com/ui/1.7.0/jquery-ui.js" ></script>




    <div class="col-md-9">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr >
                        <th>Date</th>
                        <th>Rainfall forecast</th>
                        <th>Temperature forecast</th>
                        <th>Humidity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id='one'>
                    
                    </tr>
                    <tr id='two'>
                        
                    </tr>
                    <tr id='three'>
                        
                    </tr>
                    <tr id='four'>
                       
                    </tr>
                    <tr id='five'>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>






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
    //data['list'][j]['weather'][0]['description'];
//data.list[0].main.temp
   
    var para = document.createElement("td");
    var node = document.createTextNode(data['list'][0]['dt_txt']);
    para.appendChild(node);
    var element = document.getElementById("one");
    element.appendChild(para);

     var para = document.createElement("td");
    var node = document.createTextNode(data['list'][0]['weather'][0]['description']);
    para.appendChild(node);
    var element = document.getElementById("one");
    element.appendChild(para);
    var para = document.createElement("td");
    var node = document.createTextNode(data['list'][0]['main']['temp']);
    para.appendChild(node);
    var element = document.getElementById("one");
    element.appendChild(para);

     var para = document.createElement("td");
    var node = document.createTextNode(data['list'][0]['main']['humidity']);
    para.appendChild(node);
    var element = document.getElementById("one");
    element.appendChild(para);

        

    var para = document.createElement("td");
    var node = document.createTextNode(data['list'][8]['dt_txt']);
    para.appendChild(node);
    var element = document.getElementById("two");
    element.appendChild(para);
    
     var para = document.createElement("td");
    var node = document.createTextNode(data['list'][8]['weather'][0]['description']);
    para.appendChild(node);
    var element = document.getElementById("two");
    element.appendChild(para);
      var para = document.createElement("td");
    var node = document.createTextNode(data['list'][8]['main']['temp']);
    para.appendChild(node);
    var element = document.getElementById("two");
    element.appendChild(para);
     var para = document.createElement("td");
    var node = document.createTextNode(data['list'][8]['main']['humidity']);
    para.appendChild(node);
    var element = document.getElementById("two");
    element.appendChild(para);
    
        


    var para = document.createElement("td");
    var node = document.createTextNode(data['list'][16]['dt_txt']);
    para.appendChild(node);
    var element = document.getElementById("three");
    element.appendChild(para);
    
     var para = document.createElement("td");
    var node = document.createTextNode(data['list'][16]['weather'][0]['description']);
    para.appendChild(node);
    var element = document.getElementById("three");
    element.appendChild(para);
      var para = document.createElement("td");
    var node = document.createTextNode(data['list'][16]['main']['temp']);
    para.appendChild(node);
    var element = document.getElementById("three");
    element.appendChild(para);
     var para = document.createElement("td");
    var node = document.createTextNode(data['list'][16]['main']['humidity']);
    para.appendChild(node);
    var element = document.getElementById("three");
    element.appendChild(para);
    
        


    var para = document.createElement("td");
    var node = document.createTextNode(data['list'][24]['dt_txt']);
    para.appendChild(node);
    var element = document.getElementById("four");
    element.appendChild(para);
    
     var para = document.createElement("td");
    var node = document.createTextNode(data['list'][24]['weather'][0]['description']);
    para.appendChild(node);
    var element = document.getElementById("four");
    element.appendChild(para);
      var para = document.createElement("td");
    var node = document.createTextNode(data['list'][24]['main']['temp']);
    para.appendChild(node);
    var element = document.getElementById("four");
    element.appendChild(para);
      var para = document.createElement("td");
    var node = document.createTextNode(data['list'][24]['main']['humidity']);
    para.appendChild(node);
    var element = document.getElementById("four");
    element.appendChild(para);
        


    var para = document.createElement("td");
    var node = document.createTextNode(data['list'][32]['dt_txt']);
    para.appendChild(node);
    var element = document.getElementById("five");
    element.appendChild(para);
    
     var para = document.createElement("td");
    var node = document.createTextNode(data['list'][32]['weather'][0]['description']);
    para.appendChild(node);
    var element = document.getElementById("five");
    element.appendChild(para);
      var para = document.createElement("td");
    var node = document.createTextNode(data['list'][32]['main']['temp']);
    para.appendChild(node);
    var element = document.getElementById("five");
    element.appendChild(para);
        var para = document.createElement("td");
    var node = document.createTextNode(data['list'][32]['main']['humidity']);
    para.appendChild(node);
    var element = document.getElementById("five");
    element.appendChild(para);   



});



</script>


    <div class="col-md-12">
        <footer>
            <div class="row">
                <div class="col-md-4 col-sm-6 footer-navigation">
                    <h3><a href="#">Agri<span>mitra </span></a></h3>
                    <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">Pricing</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Faq</a><strong> · </strong><a href="#">Contact</a></p>
                    <p
                    class="company-name">Agri Mitra </p>
                </div>
                <div class="col-md-4 col-sm-6 footer-contacts">
                    <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                        <p><span class="new-line-span"></span> </p>
                    </div>
                    <div><i class="fa fa-phone footer-contacts-icon"></i>
                        <p class="footer-center-info email text-left"> +1 555 123456</p>
                    </div>
                    <div><i class="fa fa-envelope footer-contacts-icon"></i>
                        <p> <a href="#" target="_blank">support@company.com</a></p>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-4 footer-about">
                    <h4>About the company</h4>
                    <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
                    </p>
                    <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

