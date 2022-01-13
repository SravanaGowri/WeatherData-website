<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
 

        <title>Weather</title>
        <style>
            body{
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                background-image: url(1.png);
                color: black;
                font-family: poppin, 'Times New Roman', Times, serif;
                font-size: large;
                background-size: cover;
                background-attachment: fixed;
            }
            .container{
                text-align: center;
                justify-content: center;
                align-items: center;
                width: 100%;
            }
            h1{
                font-weight: 700;
                margin-top: 200px;
            }
            input{
                width: 350px;
                padding: 5px;
            }
            
        </style>
    </head>
    <body>
        <div class="container">
        <h1>Search Global Weather</h1>
        <form action="" method="GET">
            <p><h4><label for="city">Enter your city name </label></h4></p>
            <p><input type="text" name="city" id="city" placeholder="City Name"></p>
            <button type="submit" name="submit" class="btn btn-success" > Submit Now</button>
            <br><br><br>
            <div class="output mt-3">
                <?php
                    if(array_key_exists('submit',$_GET)){
                    if (!$_GET['city']){
                    $error = "Sorry, Your Input field is empty ";
                    echo '<div class="alert alert-danger" role="alert">
                    '.$error.'
                    </div>';
                    }
                    if ($_GET['city']){
                    $apiData = @file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&APPID=f6aae058d1e8d05f2522ca8a29ba9dff");
                    $weatherArray = json_decode($apiData, true);
                    if (@$weatherArray['cod']==200){
                    $tempCelsius = $weatherArray['main']['temp'] - 273;
                    $weather ="<b>".$weatherArray['name']."  , ".$weatherArray['sys']['country']." : ".intval($tempCelsius)."&deg;C</b><br>";
                    $weather .="<b>Weather Condition : </b>" .$weatherArray['weather']['0']['description']."<br>";
                    $weather .="<b>Atmospheric Pressure : </b>" .$weatherArray['main']['pressure']." hpa<br>";
                    $weather .="<b>Wind Speed : </b>" .$weatherArray['wind']['speed']."meter/sec<br>";
                    $weather .="<b>Cloudness : </b>" .$weatherArray['clouds']['all']."% <br>";
                    date_default_timezone_set('Asia/Karachi');
                    $sunrise = $weatherArray['sys']['sunrise'];
                    $weather .= "<b>Sunrise : </b>".date("g:i a", $sunrise)."<br>";
                    $weather .= "<b>Current Time : </b>" .date("F j , Y, g:i a");
    
                    if ($weather){
                    echo '<div class="alert alert-success" role="alert">
                    '.$weather.'
                    </div>';
                    exit;
                    }
                    }
                    $weatherArray = json_decode($apiData, false);
                    $error = "Sorry, Your Input cannot be processed. Enter a valid City name ";
                    echo '<div class="alert alert-danger" role="alert">
                    '.$error.'
                    </div>';
                    }
                }
                    
                ?>
            </div>
        </form>
        </div>
    </body>
</html>