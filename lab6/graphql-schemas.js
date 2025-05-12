const typeDefs = `#graphlq 
    type Record {
    _id: ID!
    content: String!
    title: String!
    author: String!
    }
    
    type Query {
    getRecords: [Record!]!
    getRecord(id: ID!): Record!
    }
    
    type Mutation {
    deleteRecord(id: ID!): Record!
    storeRecord(input: storeRecordInput!): Record!
    updateRecord(id: ID!, input: updateRecordInput!): Record!
    }
    
    input storeRecordInput {
    content: String!
    title: String!
    author: String!
    }
    
    input updateRecordInput {
    content: String
    title: String
    author: String
    }
`;
export default typeDefs;
