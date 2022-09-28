
const divPlugin = document.querySelector('.cnalps-weather-widget');
if (divPlugin) {
    fetch('https://www.weatherwp.com/api/common/publicWeatherForLocation.php?city=' + divPlugin.getAttribute('data-city') + '&country=' + divPlugin.getAttribute('data-country') + '&language=french')
        .then(response => response.json())
        .then(response => {
            let html = '<p class=\"weather-title\"> La météo à ' + response.status_message + ' :</p> <img src=\" ' + response.icon + '\"> <p>' + response.temp + ' °C</p><p>' + response.description + '</p>';
            divPlugin.innerHTML = html;
        });
}
