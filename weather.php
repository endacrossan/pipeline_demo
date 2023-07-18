<?php
// create curl resource
$ch = curl_init();

// set url
// Kaplan headquarters coords: 51.5023884,-0.0920616
curl_setopt($ch, CURLOPT_URL,'https://api.openweathermap.org/data/2.5/weather?lat=51.5023884&lon=-0.0920616&appid=6b4ed080e25fd745c31c8a0f5d48958f&units=imperial');



//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);
      
$decoded_json = json_decode($output, true); 

$main_weather = $decoded_json['weather'][0]['main'];  
$visibility = $decoded_json['visibility'];  
$description = $decoded_json['weather'][0]['description'];  
$cloud_coverage = $decoded_json['clouds']['all'];
$current_temp = $decoded_json['main']['temp'];  
$current_temp = ($current_temp-32)*0.555556;
$current_temp=round($current_temp, 1); 
$pressure = $decoded_json['main']['pressure'];  
$humidity = $decoded_json['main']['humidity'];
$wind_speed = $decoded_json['wind']['speed'];
$wind_direction = $decoded_json['wind']['deg'];
$wind_gusts = $decoded_json['wind']['gust'];
$sunrise = $decoded_json['sys']['sunrise'];  
$sunset = $decoded_json['sys']['sunset'];  
$timezone = $decoded_json['timezone'];

echo "Weather update for Kaplan London.<br><br>";

echo "<strong>Current Weather: </strong>$main_weather; $description <br>";
echo "<strong>Cloud Coverage: </strong>$cloud_coverage%<br>";
echo "<strong>Current Temperature: </strong>$current_temp &#8451 <br>";
echo "<strong>Wind Speed: </strong>$wind_speed mph <br>";
echo "<strong>Wind Direction: </strong>$wind_direction degrees<br>";
echo "<strong>Wind Gusts: </strong>$wind_gusts mph<br>";
echo "<strong>Pressure: </strong>$pressure <br>";
echo "<strong>Humidity: </strong>$humidity <br>";
echo "<strong>Sunrise: </strong>";
$time = $sunrise;

echo  date("H:i:s", $time);

echo "<br><strong>Sunset: </strong>";
$time = $sunset;

echo  date("H:i:s", $time);

echo "<br><br><br><strong>Weather update for Kaplan, London office <br><br>";

echo '<a href="index.php">Home</a>';



//Closes a cURL session and frees all resources. 
curl_close($ch);     
?>

