import mongoose from "mongoose";

const schema = mongoose.Schema;

const recordSchema = new schema({
  content: {
    type: String,
    required: true,
  },
  title: {
    type: String,
    required: true,
  },
  author: {
    type: String,
    required: true,
  },
});

const Record = mongoose.model("Record", recordSchema);
export default Record;
