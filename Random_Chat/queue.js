

// const { queryDatabase, connectToDatabase } = require('./match');

function getTag(userID) {
    const {data} = require('./server.js');
    let result = [];

    //test with array
    for (let x in data){
        if(userID == data[x].User){
            result = [data[x].EmoTag,data[x].StatusTag];
            console.log(result);
        }
    }
    //get by sql
    // try {
    //     const EmoTag = queryDatabase(`SELECT EmotionID,StatutID FROM profile WHERE ProfileID = ${userID}`, []);
    // } catch (error) {
    //     console.error(error);
    // }
    return result;
}

async function DataUser(){
    try{
        await connectToDatabase();
        let SetUser = await queryDatabase('SELECT * FROM users', []);
        console.log(SetUser.length);

    }catch (error) {
        console.error(error);
    } 
}

function queue(){


}

async function test(){
    await getTag('A')
}

export default {test,DataUser};