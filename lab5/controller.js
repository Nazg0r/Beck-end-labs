const Record = require("./schemas.js");

const getRecords = async (req, res) => {
  try {
    const records = await Record.find();
    return res.status(200).json(records);
  } catch (error) {
    res.status(500).json({ error: err.message });
  }
};

const getRecord = async (req, res) => {
  try {
    const id = req.params.id;
    const record = await Record.findById(id);
    return res.status(200).json(record);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
};

const storeRecord = async (req, res) => {
  try {
    const record = await Record.create(req.body);
    res.status(201).json(record);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

const updateRecord = async (req, res) => {
  try {
    const id = req.params.id;
    const record = await Record.findByIdAndUpdate(id, req.body);

    if (!record) {
      return res.status(404).json({ message: "No records found" });
    }

    const updatedRecord = await Record.findById(id);
    return res.status(200).json(updatedRecord);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
};

const deleteRecord = async (req, res) => {
  try {
    const id = req.params.id;
    const record = await Record.findByIdAndDelete(id);
    if (!record) {
      return res.status(404).json({ message: "No records found" });
    }

    return res.status(200).json({ message: "Record deleted successfully" });
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
};

const getHomePage = (req, res) => {
  res.render("index.hbs");
};

const getRecordsPage = (req, res) => {
  res.render("records.hbs");
};

module.exports = {
  storeRecord,
  getRecord,
  getRecords,
  updateRecord,
  deleteRecord,
  getHomePage,
  getRecordsPage,
};
