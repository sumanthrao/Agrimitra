<<?php 
include_once 'dbconnect.php';
session_start();
if (isset($_GET['dis'])) {

    $district= $_GET['dis'];
    
    $res = pg_query("SELECT monsoon FROM kar_crops WHERE district ilike '%$district' ");
    $row = pg_fetch_array($res,null,PGSQL_ASSOC);
}
if (isset($_SESSION['email']))
{
        $var = $_SESSION['email'];
        $res = pg_query("SELECT * FROM users WHERE email='$var'");
        $row =pg_fetch_array($res, null, PGSQL_ASSOC);
}

    
?>


<!DOCTYPE html>
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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">AgriMitron </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
               
                <ul class="nav navbar-nav navbar-right">
                <li role="presentation"><a href="#">Welcome <?php echo $row['name'] ?></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <span class="caret"></span><img src="assets/img/avatar_2x.png" class="dropdown-image"></a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">

                            <li role="presentation" class="active"><a href="#">Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <ul class="nav nav-tabs nav-justified">
        <li><a href="home.php" id="one">Home </a></li>
        <li><a href="#"  id="two">About us</a></li>
        <li><a href="majorcrops.php"  id="three">Major crops</a></li>
         <li><a href="weather.php"  id="four" >Get weather updates</a></li>
        <li><a href="profile.php" id="five">Grow your crop</a></li>
    </ul>
    <div class="col-md-3" style="float:left;">
        <div class="thumbnail"><img src="assets/img/avatar_2x.png">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Name:&nbsp&nbsp<?php echo $row['name'];?><br/>State:&nbsp&nbsp<?php echo $row['state'];?><br/>District:&nbsp&nbsp<?php echo $row['district'];?><br/>CropList:&nbsp&nbsp<?php echo $row['crop_list'];?><br/></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <p class="lead bg-success">STATE : <span> KARNATAKA </span>  <span id="status"></span></p><img id ="img" src="assets/img/karnataka.svg" usemap="FPMap0" width="515" height="598"></div>

        <map name="FPMap0">
            <area  id ="CHIKMAGALUR" href="##" alt="CHIKMAGALUR" shape="polygon" coords="159,434,169,415,188,400,219,395,235,386,260,416,244,426,234,440,220,440,210,447,209,463,194,471,182,449,167,448">
            <area  id ="BELLARY" href="##" alt="BELLARY" shape="polygon" coords="204,302,224,284,249,277,286,260,301,245,319,224,327,241,317,254,328,270,324,296,298,293,288,299,285,318,275,336,253,324,244,304,226,308,210,318">
            <area  id ="DAVANGERE" href="##" alt="DAVANGERE" shape="polygon" coords="182,369,202,351,218,329,215,315,220,304,235,305,252,321,276,331,267,342,246,353,236,363,235,387,223,397,215,371,202,374">
            <area  id ="TUMKUR" href="##" alt="TUMKUR" shape="polygon" coords="319,481,303,462,276,456,261,437,264,414,293,394,306,376,311,367,312,361,324,351,340,348,349,348,359,360,350,373,352,385,335,381,318,377,317,383,312,395,325,396,330,387,353,396,347,408,345,422,332,431,325,446,313,463">
            <area  id ="KOPPAL" href="##" alt="KOPPAL" shape="polygon" coords="216,219,230,226,236,212,242,221,264,223,276,238,296,252,271,268,252,281,226,287,217,256,222,240,231,235,220,225">
            <area  id ="BAGALKOT" href="##" alt="BAGALKOT" shape="polygon" coords="151,171,172,154,189,149,188,176,212,178,237,190,255,204,258,221,241,225,237,213,230,223,216,221,215,230,193,228,183,208,169,202,153,184,153,181">
            <area href="##" alt="UTTARAKANNADA" shape="polygon" coords="89,252,112,266,129,263,139,274,140,290,153,289,156,321,151,337,145,353,133,360,121,367,116,390,102,367,89,335,75,307,92,294,90,268">
            <area  id ="HAVERI" href="##" alt="HAVERI" shape="polygon" coords="153,324,156,301,155,283,172,284,193,294,208,301,212,318,217,333,210,337,198,354,183,351,167,332">
            <area  id ="BIDAR" href="##" alt="BIDAR" shape="polygon" coords="289,75,295,59,308,48,312,34,322,34,333,17,344,8,352,20,366,24,363,40,371,49,365,59,361,69,353,78,347,82,328,76,316,74,309,82,301,80">
            <area  id ="BIJAPUR" href="##" alt="BIJAPUR" shape="polygon" coords="175,136,193,131,205,135,197,93,221,99,237,105,261,118,269,136,264,147,267,169,261,179,258,202,238,196,215,185,189,179,187,157,182,150">
            <area  id ="CHITRADURGA" href="##" alt="CHITRADURGA" shape="polygon" coords="237,388,232,367,240,352,265,343,282,324,290,310,290,295,305,297,300,328,311,338,310,354,311,372,298,387,292,404,268,413,258,415,245,401">
            <area  id ="GULBARGA" href="##" alt="GULBARGA" shape="polygon" coords="237,103,265,102,261,81,277,66,292,76,313,77,327,77,355,82,374,89,356,101,348,117,356,125,357,143,354,161,337,177,315,170,296,180,276,191,260,198,254,189,262,176,266,155,264,144,266,128,259,121,242,112">
            <area  id ="BELGAUM" href="##" alt="BELGAUM" shape="polygon" coords="76,238,97,229,105,204,109,193,93,187,89,170,108,158,129,152,148,135,167,143,175,131,181,150,168,162,151,170,150,185,172,200,184,207,188,225,176,231,168,242,147,242,134,253,123,266,100,257,88,254">
            <area  id ="SHIMOGA" href="##" alt="SHIMOGA" shape="polygon" coords="119,381,116,365,124,355,143,357,141,336,157,325,174,337,196,357,186,370,214,371,221,393,201,400,188,400,175,413,160,422,148,404,134,390">
            <area  id ="DHARWAD" href="##" alt="DHARWAD" shape="polygon" coords="127,259,147,241,177,238,194,241,186,267,185,289,168,285,148,291,137,287,130,271">
            <area  id ="GADAG" href="##" alt="GADAG" shape="polygon" coords="173,238,173,226,184,225,203,228,216,228,218,222,235,235,224,236,217,256,225,273,227,285,220,294,206,301,185,293,181,274,188,258,192,247,187,240,179,241">
            <area  id ="RAICHUR" href="##" alt="RAICHUR" shape="polygon" coords="254,201,281,185,311,168,335,180,363,185,356,200,357,221,329,219,313,229,296,253,278,241,267,232,257,220,256,211">
            <area  id ="UDUPI" href="##" alt="UDUPI" shape="polygon" coords="118,383,134,389,149,404,160,424,158,434,167,450,144,451,126,455,122,426,117,401">
            <area  id ="CHIKKABALLAPUR" href="##" alt="CHIKKABALLAPUR" shape="polygon" coords="345,409,367,397,383,385,392,381,407,389,407,407,416,413,421,421,410,429,390,430,378,429,363,426,345,417">
            <area  id ="HASSAN" href="##" alt="HASSAN" shape="polygon" coords="195,467,208,459,213,441,234,441,244,425,265,415,262,438,278,456,284,463,272,478,264,473,259,493,248,494,237,504,227,496,225,476,219,486,203,488,208,474">
            <area  id ="DAKSHINAKANNADA" href="##" alt="DAKSHINAKANNADA" shape="polygon" coords="133,451,156,449,177,446,196,462,203,478,204,495,193,505,177,509,158,495,147,486,131,471,130,463">
            <area  id ="RAMANAGARA" href="##" alt="RAMANAGARA" shape="polygon" coords="338,520,329,504,320,486,326,473,322,453,331,445,342,458,350,479,362,488,366,503,366,515,354,524">
            <area  id ="MANDYA" href="##" alt="MANDYA" shape="polygon" coords="259,494,260,471,271,479,286,458,300,459,307,479,319,483,326,500,338,511,340,519,324,526,315,528,308,511,295,518,278,515,267,504">
            <area  id ="MYSORE" href="##" alt="MYSORE" shape="polygon" coords="241,552,248,539,230,519,229,497,241,499,256,491,281,512,294,515,310,510,320,528,314,536,302,530,305,542,284,547,274,554,262,566,249,558">
            <area  id ="CHAMARAJANNAGAR" href="##" alt="CHAMARAJANNAGAR" shape="polygon" coords="268,564,287,546,307,536,332,522,352,521,374,531,380,535,371,545,358,559,346,565,325,566,309,568,302,577,280,579,267,572">
            <area  id ="KODAGU" href="##" alt="KODAGU(COORG)" shape="polygon" coords="182,502,203,500,205,489,221,489,226,473,231,499,229,515,247,533,244,547,222,553,194,535,186,517">
            <area  id ="BANGALORE" href="##" alt="BANGALORE(URBAN)" shape="polygon" coords="361,483,348,463,354,444,363,439,375,448,380,464,384,478,375,491">
            <area  id ="BANGALORE" href="##" alt="BANGALORE(RURAL)" shape="polygon" coords="342,463,333,446,336,429,348,420,365,430,383,433,392,434,393,450,381,467,376,452,364,446,350,450">
            <area  id ="KOLAR" href="##" alt="KOLAR" shape="polygon" coords="387,462,395,438,413,426,421,423,422,409,430,412,430,433,448,435,442,457,419,482,403,473,397,467">
        </map>

        <div class="col-md-3" style="float: left;">
            <div class="thumbnail"><img id="dis" src="assets/img/avatar_2x.png">
                <div class="caption">
                    <h3>Crops grown in <span id="status1"></span></h3>
                    <?php
                    if (isset($_GET['dis'])) {

                        $district= $_GET['dis'];
                        $row=pg_fetch_row($res,null,PGSQL_ASSOC);
                        echo $row['monsoon'];
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <footer>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 footer-navigation">
                            <h3><a href="#">Company<span>logo </span></a></h3>
                            <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">Pricing</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Faq</a><strong> · </strong><a href="#">Contact</a></p>
                            <p
                            class="company-name">Company Name © 2015 </p>
                        </div>
                        <div class="col-md-4 col-sm-6 footer-contacts">
                            <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                                <p><span class="new-line-span">21 Revolution Street</span> Paris, France</p>
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
            <script>
                $(document).ready(function(){
                    $("#CHIKMAGALUR").click(function(){
                        
                        


                        alert($("#CHIKMAGALUR").attr("id"))
                        $("#dis").attr("src", "kardis/chikmagalur.png");
                        $("#status").html(" DISTRICT : CHIKMAGALUR");
                        $("#status1").html("chikmagalur");
                        $('#status').show();


                    });


                    $("#BELLARY").click(function(){
                        alert($("#BELLARY").attr("id"))
                        $("#dis").attr("src", "kardis/bellary.png");
                        $("#status").html(" DISTRICT : BELLARY");
                        $("#status1").html("bellary");
                        $('#status').show();
                       


                    });

                    $("#DAVANGERE").click(function(){
                        alert($("#DAVANGERE").attr("id"))
                        $("#dis").attr("src", "kardis/davanagere.png");
                        $("#status").html(" DISTRICT : DAVANGERE");
                        $("#status1").html("davangere");


                        $('#status').show();

                    });


                    $("#TUMKUR").click(function(){
                        alert($("#TUMKUR").attr("id"))
                        $("#dis").attr("src", "kardis/tumkur.png");

                        $("#status").html(" DISTRICT : TUMKUR");
                        $("#status1").html("tumkur");


                        $('#status').show();
                    });



                    $("#KOPPAL").click(function(){
                        alert($("#KOPPAL").attr("id"))
                        $("#dis").attr("src", "kardis/koppal.png");
                        $("#status").html(" DISTRICT : KOPPAL");
                        $("#status1").html("koppal");


                        $('#status').show();

                    });


                    $("#BAGALKOT").click(function(){
                        alert($("#BAGALKOT").attr("id"))
                        $("#dis").attr("src", "kardis/bagalkot.png");

                        $("#status").html(" DISTRICT : BAGALKOT");
                        $("#status1").html("bagalkot");


                        $('#status').show();
                    });





                    $("#HAVERI").click(function(){
                        alert($("#HAVERI").attr("id"))
                        $("#dis").attr("src", "kardis/haveri.png");
                        $("#status").html(" DISTRICT : HAVERI");
                        $("#status1").html("haveri");


                        $('#status').show();


                    });


                    $("#BIDAR").click(function(){
                        alert($("#BIDAR").attr("id"))
                        $("#dis").attr("src", "kardis/bidar.png");
                        $("#status").html(" DISTRICT : BIDAR");
                        $("#status1").html("bidar");


                        $('#status').show();
                    });


                    $("#BIJAPUR").click(function(){
                        alert($("#BIJAPUR").attr("id"))
                        $("#dis").attr("src", "kardis/bijapur.png");
                        $("#status").html(" DISTRICT : BIJAPUR");
                        $("#status1").html("bijapur");


                        $('#status').show();
                    });


                    $("#CHITRADURGA").click(function(){
                        alert($("#CHITRADURGA").attr("id"))
                        $("#dis").attr("src", "kardis/chitradurga.png");
                        $("#status").html(" DISTRICT : CHITRADURGA");
                        $("#status1").html("chitradurga");


                        $('#status').show();
                    });



                    $("#GULBARGA").click(function(){
                        alert($("#GULBARGA").attr("id"))
                        $("#dis").attr("src", "kardis/gulbarga.png");
                        $("#status").html(" DISTRICT : GULBARGA");
                        $("#status1").html("gulbarga");


                        $('#status').show();
                    });



                    $("#BELGAUM").click(function(){
                        alert($("#BELGAUM").attr("id"))
                        $("#dis").attr("src", "kardis/belgaum.png");
                        $("#status").html(" DISTRICT : BELGAUM");
                        $("#status1").html("belgaum");


                        $('#status').show();
                    });



                    $("#SHIMOGA").click(function(){
                        alert($("#SHIMOGA").attr("id"))
                        $("#dis").attr("src", "kardis/shimoga.png");
                        $("#status").html(" DISTRICT : SHIMOGA");
                        $("#status1").html("shimoga");


                        $('#status').show();
                    });


                    $("#DHARWAD").click(function(){
                        alert($("#DHARWAD").attr("id"))
                        $("#dis").attr("src", "kardis/dharwad.png");
                        $("#status").html(" DISTRICT : DHARWAD");
                        $("#status1").html("dharwad");


                        $('#status').show();
                    });


                    $("#GADAG").click(function(){
                        alert($("#GADAG").attr("id"))
                        $("#dis").attr("src", "kardis/gadag.png");
                        $("#status").html(" DISTRICT : GADAG");
                        $("#status1").html("gadag");


                        $('#status').show();
                    });



                    $("#RAICHUR").click(function(){
                        alert($("#RAICHUR").attr("id"))
                        $("#dis").attr("src", "kardis/raichur.png");
                        $("#status").html(" DISTRICT : RAICHUR");
                        $("#status1").html("raichur");


                        $('#status').show();
                    });


                    $("#UDUPI").click(function(){
                        alert($("#UDUPI").attr("id"))
                        $("#dis").attr("src", "kardis/udupi.png");
                        $("#status").html(" DISTRICT : UDUPI");
                        $("#status1").html("udupi");


                        $('#status').show();
                    });


                    $("#CHIKKABALLAPUR").click(function(){
                        alert($("#CHIKKABALLAPUR").attr("id"))
                        $("#dis").attr("src", "kardis/chikkaballapur.png");
                        $("#status").html(" DISTRICT : CHIKKABALLAPUR");
                        $("#status1").html("chikkaballapur");


                        $('#status').show();
                    });


                    $("#HASSAN").click(function(){
                        alert($("#HASSAN").attr("id"))
                        $("#dis").attr("src", "kardis/hassan.png");
                        $("#status").html(" DISTRICT : HASSAN");
                        $("#status1").html("hassan");


                        $('#status').show();
                    });



                    $("#DAKSHINAKANNADA").click(function(){
                        alert($("#DAKSHINAKANNADA").attr("id"))
                        $("#dis").attr("src", "kardis/dakshinakannada.png");
                        $("#status").html(" DISTRICT : DAKSHINAKANNADA");
                        $("#status1").html("dakshinakannada");


                        $('#status').show();
                    });


                    $("#RAMANAGARA").click(function(){
                        alert($("#RAMANAGARA").attr("id"))
                        $("#dis").attr("src", "kardis/ramanagara.png");
                        $("#status").html(" DISTRICT : RAMANAGARA");
                        $("#status1").html("ramanagara");


                        $('#status').show();
                    });


                    $("#MANDYA").click(function(){
                        alert($("#MANDYA").attr("id"))
                        $("#dis").attr("src", "kardis/mandya.png");
                        $("#status").html(" DISTRICT : MANDYA");
                        $("#status1").html("mandya");


                        $('#status').show();
                    });


                    $("#MYSORE").click(function(){
                        alert($("#MYSORE").attr("id"))
                        $("#dis").attr("src", "kardis/mysore.png");
                        $("#status").html(" DISTRICT : MYSORE");
                        $("#status1").html("mysore");


                        $('#status').show();
                    });


                    $("#CHAMARAJANNAGAR").click(function(){
                        alert($("#CHAMARAJANNAGAR").attr("id"))
                        $("#dis").attr("src", "kardis/chamarajannagar.png");
                        $("#status").html(" DISTRICT : CHAMARAJANNAGAR");
                        $("#status1").html("chamarajannagar");


                        $('#status').show();
                    });


                    $("#KODAGU").click(function(){
                        alert($("#KODAGU").attr("id"))
                        $("#dis").attr("src", "kardis/kodagu.png");
                        $("#status").html(" DISTRICT : KODAGU");
                        $("#status1").html("kodagu");


                        $('#status').show();
                    });


                    $("#BANGALORE").click(function(){
                        alert($("#BANGALORE").attr("id"))
                        $("#dis").attr("src", "kardis/bangalore.png");
                        $("#status").html(" DISTRICT : BANGALORE");
                        $("#status1").html("bangalore");


                        $('#status').show();
                    });



                    $("#KOLAR").click(function(){
                        alert($("#KOLAR").attr("id"))
                        $("#dis").attr("src", "kardis/kolar.png");
                        $("#status").html(" DISTRICT : KOLAR");
                        $("#status1").html("kolar");


                        $('#status').show();
                    });
                });

            </script>
        </body>

        </html>