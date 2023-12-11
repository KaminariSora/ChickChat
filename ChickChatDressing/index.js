const express = require('express');
const { createServer } = require('node:http');
const { join } = require('node:path');
const { Server } = require('socket.io');

const app = express();
const server = createServer(app);
const io = new Server(server);

app.use(express.static('public'));

app.get('/', (req, res) => {
  res.sendFile(join(__dirname, 'index.html'));
});

io.on('connection', function (socket) {
  //  socket.join("room-"+roomno);
  //  //Send this event to everyone in the room.
  //  io.sockets.in("room-"+roomno).emit('connectToRoom', "You are in room no. "+roomno);
  let currentRoom = null;

  socket.on('chat message', (msg, roomID) => {
    if (currentRoom == roomID) {

      io.to("room-" + roomID).emit('chat message', msg);
      console.log('message: ' + msg + ' RoomID: ' + roomID + ' in if');

    } else {
      socket.join("room-" + roomID);
      io.to("room-" + roomID).emit('chat message', msg);
      console.log('message: ' + msg + ' RoomID: ' + roomID + ' in else');
      currentRoom = roomID;
    }

  });
})

server.listen(3001, () => {
  console.log('server running at http://localhost:3001');
});