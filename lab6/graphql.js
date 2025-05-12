import { ApolloServer } from "@apollo/server";
import { startStandaloneServer } from "@apollo/server/standalone";
import typeDefs from "./graphql-schemas.js";
import Record from "./schemas.js";

const PORT = 4000;

const resolvers = {
  Query: {
    async getRecords() {
      return Record.find();
    },

    async getRecord(_, args) {
      return Record.findById(args.id);
    },
  },

  Mutation: {
    async deleteRecord(_, args) {
      return Record.findByIdAndDelete(args.id);
    },

    async storeRecord(_, args) {
      const newRecord = args.input;
      return Record.create(newRecord);
    },

    async updateRecord(_, args) {
      const updatedRecord = args.input;
      return Record.findByIdAndUpdate(args.id, updatedRecord);
    },
  },
};

const server = new ApolloServer({
  typeDefs,
  resolvers,
});

async function startGraphqlServer() {
  const url = await startStandaloneServer(server, {
    listen: { port: PORT },
  });

  console.log("GraphQL Server running on port: " + PORT);
}

export default { startGraphqlServer };
