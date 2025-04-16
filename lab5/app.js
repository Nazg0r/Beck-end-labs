const express = require("express");
const hbs = require("hbs");
const mongoose = require("mongoose");
const router = require("./routs");
const path = require("path");

const PORT = 3000;
const app = express();
const connectionString =
  "mongodb+srv://admin:KhjQwXoPb93sBY3l@cluster0.lxofgug.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";

hbs.registerPartials(__dirname + "/views/partials");
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

app.use(express.json());
app.use(express.static("public"));
app.use("/", router);

mongoose
  .connect(connectionString)
  .then((res) => console.log(`MongoDB Connected successfully`))
  .then(() =>
    app.listen(PORT, (error) => {
      error
        ? console.log(error)
        : console.log(`Server running on port: ${PORT}`);
    }),
  )
  .catch((err) => console.log(err));
