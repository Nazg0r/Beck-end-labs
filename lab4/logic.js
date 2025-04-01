const ABSOLUTE_ZERO = 273.15;

function kelvinToCelsius(tempKelvin) {
  return Math.round(tempKelvin - ABSOLUTE_ZERO);
}

function getWeatherType(weather) {
  if (weather[0].main === "Rain") return "rainy";
  if (weather[0].main === "Clouds") return "cloudy";
  return "sunny";
}

module.exports = { kelvinToCelsius, getWeatherType };
