import express from "express";
import hbs from "hbs";
import mongoose from "mongoose";
import router from "./routs.js";
import path from "path";
import { fileURLToPath } from "url";
import graphql from "./graphql.js";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
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
  .then(async () => {
    app.listen(PORT, (error) => {
      error
        ? console.log(error)
        : console.log(`REST Server running on port: ${PORT}`);
    });

    await graphql.startGraphqlServer();
  })
  .catch((err) => console.log(err));
