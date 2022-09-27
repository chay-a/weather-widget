<?php

/**
 * Plugin Name: cnalpsWeather
 */

class CNAlpsWeather
{

    public function __construct()
    {
        add_shortcode('cnalps_weather_msg', [$this, 'cnalpsweather_shortcode']);
    }

    public function cnalpsweather_shortcode()
    {
        print '<div class="cnalps-weather-widget">
        <div class="weather-title">Météo à Crest</div>
    </div>
    ';
    }
}

$cnalpsweather_value = new CNAlpsWeather;