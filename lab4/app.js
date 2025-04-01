const requests = require("./requests.js");
const express = require("express");
const hbs = require("hbs");
const path = require("path");

const app = express();
const PORT = 3000;

hbs.registerPartials(__dirname + "/Views/Partials");
app.set("view engine", "hbs");
app.use(
  express.static(path.join(__dirname, "Views"), {
    setHeaders: (res, path) => {
      if (path.endsWith(".css")) {
        res.setHeader("Content-Type", "text/css");
      }
    },
  }),
);

app.get("/", async (req, res) => {
  const citiesWeather = await requests.getCitiesWeather();
  res.render("index.hbs", { citiesWeather });
});

app.get("/weather", async (req, res) => {
  const cityWeather = await requests.getCityWeather("Kyiv");
  res.render("weather.hbs", { cityWeather });
});

app.get("/weather/:city", async (req, res) => {
  const city = req.params.city;
  const cityWeather = await requests.getCityWeather(city);
  res.render("weather.hbs", { cityWeather });
});

app.listen(PORT, () => {
  console.log("Server started on port 3000");
});
