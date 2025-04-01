const data = require("./data.js");
const logic = require("./logic.js");

async function getCitiesWeather() {
  const citiesWeather = [];
  for (let cityGeo of data.citiesGeo) {
    const response = await fetch(
      `https://api.openweathermap.org/data/2.5/weather?lat=${cityGeo.lat}&lon=${cityGeo.lon}&appid=${data.KEY}`,
    );
    const cityWeather = await response.json();

    citiesWeather.push({
      city: cityGeo.city,
      name: cityGeo.uaName,
      temp: logic.kelvinToCelsius(cityWeather.main.temp),
      feels_like: logic.kelvinToCelsius(cityWeather.main.feels_like),
      weather: logic.getWeatherType(cityWeather.weather),
    });
  }

  return citiesWeather;
}

async function getCityWeather(city) {
  const cityGeo = data.citiesGeo.find((geo) => geo.city === city);
  const response = await fetch(
    `https://api.openweathermap.org/data/2.5/weather?lat=${cityGeo.lat}&lon=${cityGeo.lon}&appid=${data.KEY}`,
  );
  const cityWeather = await response.json();

  return {
    city: cityGeo.city,
    name: cityGeo.uaName,
    temp: logic.kelvinToCelsius(cityWeather.main.temp),
    feels_like: logic.kelvinToCelsius(cityWeather.main.feels_like),
    weather: logic.getWeatherType(cityWeather.weather),
    pressure: cityWeather.main.pressure,
    humidity: cityWeather.main.humidity,
    wind: cityWeather.wind.speed,
  };
}

module.exports = { getCitiesWeather, getCityWeather };
