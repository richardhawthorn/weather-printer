<?

//these weather conditions are those returned by the weather api, we're mapping them to images here
$weatherConditions = array(
	"01d" => "sun",
	"01n" => "moon",
	"02d" => "cloud sun",
	"02n" => "cloud moon",
	"03d" => "cloud",
	"03n" => "cloud",
	"04d" => "cloud",
	"04n" => "cloud",
	"09d" => "rain",
	"09n" => "rain",
	"10d" => "showers sun",
	"10n" => "showers moon",
	"11d" => "lightning",
	"11n" => "lightning",
	"13d" => "snow",
	"13n" => "snow",
	"50d" => "haze",
	"50n" => "haze"
);

//grab the weather report from the api
$weatherForcast = 'http://api.openweathermap.org/data/2.5/forecast?q=Cambridge,ma';
$weatherForcast = file_get_contents($weatherForcast);
$weatherForcast = json_decode($weatherForcast);
$weatherForcast = objectToArray($weatherForcast);

//loop through the weather conditions
$item_loop = 0;
foreach ($weatherForcast['list'] as $forcastId => $forcastData){
	
	$forcastDesc = $forcastData['weather'][0]['main'];
	$forcastDescLong = $forcastData['weather'][0]['description'];
	$forcastIcon = $forcastData['weather'][0]['icon'];
	$forcastTemp = round($forcastData['main']['temp'] - 273.15);
	$forcastTempMin = round($forcastData['main']['temp_min'] - 273.15);
	$forcastTempMax = round($forcastData['main']['temp_max'] - 273.15);
	$forcastTempHumidity = $forcastData['main']['humidity'];
	$forcastWindSpeed = round($forcastData['wind']['speed']);
	$forcastStamp = $forcastData['dt'];
	$forcastStamp = date("ga",$forcastStamp);
	?>
	<div class="weatherBox">
		<span class="fs1 climacon <? echo $weatherConditions[$forcastIcon]; ?>" aria-hidden="true"></span><br/>
		<? echo $forcastStamp; ?><br/>
		<? echo $forcastTemp; ?>C<br/>
		<? echo $forcastWindSpeed; ?> Mph<br/>
	</div>
	<?
	$item_loop++;
	//break at 8 results (8 x 3 hour intervals = 24h)
	if ($item_loop == 8){
		break;
	}
}
?>

<div class="clearLeft"> </div>