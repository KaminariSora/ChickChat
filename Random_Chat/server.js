const express = require('express');
const { createServer } = require('node:http');
const { join } = require('node:path');
const { Server } = require('socket.io');
const mysql = require('mysql');


const app = express();
const server = createServer(app);
const io = new Server(server);

app.use(express.static('public'));
app.use(express.json());

app.get('/', (req, res) => {
    res.sendFile(join(__dirname, 'index.html'));
});

//socket.io
let data = []; //data ไม่หายจนกว่าจะปิด server หรือ refresh

module.exports = {data};

const {getTag,Match, connectToDatabase, connection} = require('./match.js')
// const {getUserID} = require('../ChickChatHome/home.js');

io.on('connection', async (socket) => {
    console.log('data :',data);

    // Send the current data to the newly connected user
    socket.emit('updateData', data);
    
    // Listen for new chat messages
    socket.on('User', async (User) => {
        data.push(User);
        console.log('data :',data);
        // Broadcast the updated data to all connected clients
        io.emit('updateData', data);

        //เงื่อนไขการเริ่มจับคู่
        if(data.length > 1){
           console.log(data[0]);
           
            let Tag1 = await getTag(data[0]);
            console.log(Tag1);
            let Emo1 = Tag1[0].EmotionID;
            let Status1 = Tag1[0].StatusID;
            for(let i = 1; i < data.length; i++){
                let Tag2 = await getTag(data[i]);
                let Emo2 = Tag2[0].EmotionID;
            let Status2 = Tag2[0].StatusID;
            let result = await Match(Emo1,Status1,Emo2,Status2);
            console.log('result :',result);
            if(result == 1){
                console.log('user :',data[0],' & user :',data[i]);
                data.splice(i, 1);
                data.splice(0, 1);
                io.emit('updateData', data);
                console.log('splice_data :',data);
            }
            console.log('data :',data);
            }
        }
    });
});


server.listen(3000, () => {
    console.log('server running at http://localhost:3000')
});

