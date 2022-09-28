// const divPlugin = document.querySelector('.widget_cnalps-weather');
// console.log(php_params.city);
// console.log('bonjour');
// if (divPlugin) {
//     fetch('https://www.weatherwp.com/api/common/publicWeatherForLocation.php?city=$city&country=$country&language=french')
//         .then(response => response.json())
//         .then(response => {
//             let html = '<p class=\"weather-title\"> La météo à ' + response.status_message + ' :</p> <img src=\" ' + response.icon + '\"> <p>' + response.temp + ' °C</p><p>' + response.description + '</p>';
//             divPlugin.innerHTML = html;
//         });
// }


( ( ) => {
    const divPlugin = document.querySelector('.widget_cnalps-weather');
    const city = document.querySelector('#city');
    const country = document.querySelector('#country');
    if (divPlugin) {
        fetch('https://www.weatherwp.com/api/common/publicWeatherForLocation.php?city='+city.innerHTML+'&country='+country.innerHTML+'&language=french')
            .then(response => response.json())
            .then(response => {
                let html = '<p class=\"weather-title\"> La météo à ' + response.status_message + ' :</p> <img src=\" ' + response.icon + '\"> <p>' + response.temp + ' °C</p><p>' + response.description + '</p>';
                divPlugin.innerHTML = html;
            });
    }
} )();