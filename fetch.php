<html>
<head>
<title>Weather</title>
    <meta charset="utf-8">

    <script src="http://code.jquery.com/jquery-1.7.min.js" ></script>
    <script src="http://code.jquery.com/ui/1.7.0/jquery-ui.js" ></script>

<script>



function getWeather(callback) {
    var weather = "http://api.openweathermap.org/data/2.5/forecast?q=";
    var val = "konandur";
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
    document.write('weather data received');
    document.write('<br>');
    document.write(data.list[0].weather[0].description);
    document.write('<br>');
    document.write(data.list[0].dt_txt);
    document.write('<br>');
    document.write(data.list[1].weather[0].description);
    document.write('<br>');
    document.write(data.list[1].dt_txt);
    document.write('<br>');
    document.write(data.list[2].weather[0].description);
    document.write('<br>');
    document.write(data.list[2].dt_txt);
    document.write('<br>');
    document.write(data.list[0].main.temp);
    document.write('<br>');
    document.write(data.list[0].dt_txt);
    document.write('<br>');
});
</script>
</body>
</html>