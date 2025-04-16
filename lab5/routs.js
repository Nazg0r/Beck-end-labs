const express = require("express");
const controller = require("./controller");

const router = express.Router();

router.get("/records", controller.getRecords);
router.get("/records/:id", controller.getRecord);
router.post("/records", controller.storeRecord);
router.put("/records/:id", controller.updateRecord);
router.delete("/records/:id", controller.deleteRecord);
router.get("/", controller.getHomePage);
router.get("/record", controller.getRecordsPage);

module.exports = router;
