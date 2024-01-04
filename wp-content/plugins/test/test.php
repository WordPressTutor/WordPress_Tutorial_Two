<?php
/*
Plugin Name: Weather Check
Description: Display current weather using OpenWeatherMap API.
Version: 1.0
Author: Your Name
*/

function get_weather($atts) {
    // You can customize these parameters as needed
    $api_key = 'YOUR_API_KEY';
    $city = 'New York';
    $units = 'metric'; // or 'imperial' for Fahrenheit

    $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&units=$units&appid=$api_key";
    $response = wp_remote_get($url);

    if (is_array($response) && !is_wp_error($response)) {
        $data = json_decode($response['body']);

        if ($data) {
            $temperature = $data->main->temp;
            $weather = $data->weather[0]->description;

            // Display the weather information
            $output = "Current weather in $city: $temperature&deg;C, $weather";
            return $output;
        }
    }

    return 'Could not fetch weather data.';
}

add_shortcode('weather', 'get_weather');
