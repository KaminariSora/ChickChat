const mysql = require('mysql');


const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    database: 'chickchat_db',
    port: '3306'
});

function connectToDatabase() {
    return new Promise((resolve, reject) => {
        connection.connect((err) => {
            if (err) {
                reject(err);
            } else {
                console.log('MySQL successfully connected!');
                resolve();
            }
        });
    });
}

function queryDatabase(sqlQuery, params) {
    return new Promise((resolve, reject) => {
        connection.query(sqlQuery, params, (err, results, fields) => {
            if (err) {
                reject(err);
            } else {
                resolve(results);
            }
        });
    });
}

let count = 0;

async function countEmotions(Emo1, Emo2) {
    let results = [];
    try {
        const emotionResults = await queryDatabase('SELECT * FROM emotiontag', []);

        //Check output
        // console.log(emotionResults);

        //input value in result[]
        for (let x in emotionResults) {
            results[x] = emotionResults[x].EmotionID;
            // console.log(results[x]);
        }

        //logic count
        if (Emo1 == results[0] && (Emo2 == results[0] || Emo2 == results[1] || Emo2 == results[2] || Emo2 == results[3] || Emo2 == results[4])) {
            count++;
        }
        else if (Emo1 == results[1] && (Emo2 == results[0] || Emo2 == results[4])) {
            count++;
        }
        else if (Emo1 == results[2] && (Emo2 == results[0] || Emo2 == results[2] || Emo2 == results[3] || Emo2 == results[4])) {
            count++;
        }
        else if (Emo1 == results[3] && (Emo2 == results[0] || Emo2 == results[2] || Emo2 == results[4])) {
            count++;
        }
        else if (Emo1 == results[4] && (Emo2 == results[0] || Emo2 == results[1] || Emo2 == results[2] || Emo2 == results[3])) {
            count++;
        }

    } catch (error) {
        console.error(error);
    }
}

async function countStatus(Status1, Status2) {
    let results = [];
    try {
        const statusResults = await queryDatabase('SELECT * FROM statustag', []);

        //Check output
        // console.log(statusResults);

        //input value in result[]
        for (let x in statusResults) {
            results[x] = statusResults[x].StatusID
            // console.log(results[x]);
        }

        //logic count
        if (Status1 == results[0] && (Status2 == results[0] || Status2 == results[1] || Status2 == results[2] || Status2 == results[4])) {
            count++;
        }
        else if (Status1 == results[1] && (Status2 == results[0] || Status2 == results[1] || Status2 == results[2] || Status2 == results[3] || Status2 == results[4])) {
            count++;
        }
        else if (Status1 == results[2] && (Status2 == results[0] || Status2 == results[1] || Status2 == results[2] || Status2 == results[4])) {
            count++;
        }
        else if (Status1 == results[3] && (Status2 == results[1] || Status2 == results[2] || Status2 == results[3])) {
            count++;
        }
        else if (Status1 == results[4] && (Status2 == results[0] || Status2 == results[1] || Status2 == results[2] || Status2 == results[4])) {
            count++;
        }

    } catch (error) {
        console.error(error);
    }
}

async function Match(Emo1, Status1, Emo2, Status2) {
    let result;
    count = 0;
    try {
        await countEmotions(Emo1, Emo2);
        await countStatus(Status1, Status2);
        await getData();

        if (count == 2) {
            result = 1;
            // result = 'Match!!!';
        }
        else {
            result = 0;
            // result = 'Not Match!!!';
        }
        console.log('Count :', count);

    } catch (error) {
        console.error(error);
    }
    return result;
}



async function getTag(userID) {
    try {
        const Tag = await queryDatabase(`SELECT EmotionID,StatusID FROM profile WHERE ProfileID = ${userID}`, []);

        return Tag;
        // console.log(Tag);


    } catch (error) {
        console.error(error);
    }
}

module.exports = { getTag, Match, connectToDatabase, connection };

// async function main() {

//     try {
//         console.log(data);
//         await connectToDatabase();
//     } catch (error) {
//         console.error(error);
//     }

// }

// main();
