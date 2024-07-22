<?php
include('../includes/db.php');
include('../templates/header.php');
$ROOT = '/kfms/';

// API keys and URLs
$weather_api_key = '7169fa020d30957abbc8d193d4a893cb';
$weather_api_url = "http://api.openweathermap.org/data/2.5/weather?q=Kisii&appid=".$weather_api_key."&units=metric";
// $commodity_api_key = 'YOUR_COMMODITY_API_KEY';
// $commodity_api_url = "https://commodities-api.com/api/latest?access_key=".$commodity_api_key."&base=KES&symbols=WHEAT,CORN,SOY";

// Fetch weather data
$weather_data = file_get_contents($weather_api_url);
if ($weather_data === FALSE) {
    die('Error fetching weather data.');
}
$weather = json_decode($weather_data, true);

// Fetch market data
// $market_data = file_get_contents($market_api_url);
$market_data = '{"prices": [{"commodity": "Maize", "price": "30 KES/kg"}, {"commodity": "Beans", "price": "80 KES/kg"}, {"commodity": "Wheat", "price": "45 KES/kg"}]}';
// if ($market_data === FALSE) {
//     die('Error fetching market data.');
// }
$market = json_decode($market_data, true);
?>
<h2 class="w-full text-3xl font-bold py-3 px-4">Weather and Market Information</h2>
<!-- <hr> -->
<div class="max-w-7xl mx-auto px-4 py-3 border !border-gray-200 rounded-lg">
    <h3 class="w-full text-2xl font-bold py-3 px-4">Weather in Kisii</h3>
    <div class="weather-board w-96 min-h-80 border rounded-sm shadow-md bg-gray-400 bg-blend-multiply flex items-center justify-center flex-col gap-2">
        <?php if (isset($weather['main']['temp']) && isset($weather['weather'][0]['description'])): ?>
            <div class="bg-gray-700/60 w-fit rounded-lg p-4">
                <p class="text-white font-semibold text-xl">Temperature: <?php echo $weather['main']['temp']; ?> °C</p>
                <p class="text-white font-semibold text-xl">Humidity: <?php echo $weather['main']['humidity']; ?> g/m<sup>3</sup></p>
                <p class="text-white font-semibold text-xl">Wind Speed: <?php echo $weather['wind']['speed']; ?> Km/ph</p>
                <p class="text-white font-semibold text-xl">Condition: <?php echo ucfirst($weather['weather'][0]['description']); ?></p>

            </div>
        <?php else: ?>
            <p>Weather data is not available.</p>
        <?php endif; ?>
    </div>


    <h3 class="w-full text-2xl font-bold py-3 px-4">Market Prices</h3>


    <div class="relative overflow-x-auto">
        <table class="w-full max-w-4xl text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Commodity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($market['prices'] as $item) { ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-2.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $item['commodity'];?>
                    </th>
                    <td class="px-6 py-2.5">
                        <?php echo $item['price'];?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

</div>

<?php include('../templates/footer.php'); ?>
