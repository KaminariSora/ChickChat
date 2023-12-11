const socket = io('http://localhost:3000')
const messageContainer = document.getElementById('message-container')
const roomContainer = document.getElementById('room-container')
const messageForm = document.getElementById('send-container')
const messageInput = document.getElementById('message-input')
let currentUserName;

if (messageForm != null) {
    const name = prompt('What is your name?');
    currentUserName = name;
    // appendMessage('You joined');
    console.log('You joined')
    socket.emit('new-user', roomName, name);

    messageForm.addEventListener('submit', e => {
        e.preventDefault();
        const message = messageInput.value;
        appendMessage(`${message}`);
        socket.emit('send-chat-message', roomName, message);
        messageInput.value = '';
    })

}

socket.on('room-created', room => {
    const roomElement = document.createElement('div');
    roomElement.innerText = room;
    const roomLink = document.createElement('a');
    roomLink.href = `/${room}`;
    roomLink.innerText = 'join';
    roomContainer.append(roomElement);
    roomContainer.append(roomLink);
})

socket.on('chat-message', data => {
    // appendMessage(`${data.name}: ${data.message}`);
    if (data.name !== currentUserName) {
        // console.log("Another person sent to you");
        appendMessage(data.message, data.name);
    }

});


socket.on('user-connected', name => {
    // appendMessage(`${name} connected`);
    console.log(`${name} connected`)
})

socket.on('user-disconnected', name => {
    // appendMessage(`${name} disconnected`);
    console.log(`${name} disconnected`)
})


function appendMessage(message, senderName) {
    // if (senderName === null)
    // console.log("senderName: " + senderName + "\nUser: " + currentUserName);
    if (senderName === undefined) { //เราส่ง
        const div1 = document.createElement('div');
        div1.classList.add('flex', 'w-4/6', 'lg:w-full', 'mt-2', 'space-x-3', 'max-w-2xl', 'ml-auto', 'justify-end', 'mr-5');
        const div2 = document.createElement('div');
        div2.classList.add('flex-shrink-0', 'h-10', 'w-10', 'rounded-full', 'bg-gray-300', 'cursor-pointer');
        const div3 = document.createElement('div');
        div3.classList.add('bg-white', 'p-2', 'rounded-l-2xl');
        const p = document.createElement('p')
        p.classList.add('text-start')
        p.innerText = message;
        div3.appendChild(p)
        div1.append(div3)
        div1.append(div2)
        messageContainer.append(div1);
    } else {
        const div1 = document.createElement('div');
        div1.classList.add('flex', 'w-4/6', 'lg:w-full', 'mt-2', 'space-x-3', 'max-w-2xl');
        const div2 = document.createElement('div');
        div2.classList.add('flex-shrink-0', 'h-10', 'w-10', 'rounded-full', 'bg-gray-300', 'cursor-pointer');
        const div3 = document.createElement('div');
        div3.classList.add('bg-white', 'p-2', 'rounded-r-2xl');
        const p = document.createElement('p')
        p.classList.add('text-start')
        p.innerText = message;
        div3.appendChild(p)
        div1.append(div2)
        div1.append(div3)
        messageContainer.append(div1);
    }
}

function stickerMessage() {
    
}