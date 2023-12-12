const socket = io('http://localhost:3000')
const messageContainer = document.getElementById('message-container')
const roomContainer = document.getElementById('room-container')
const messageForm = document.getElementById('send-container')
const messageInput = document.getElementById('message-input')
let currentUserName;
const stickerButtons = document.querySelectorAll('.sticker-box .stk');

function scrollToBottom() {
    const messageContainer = document.getElementById('message-container');
    messageContainer.scrollTop = messageContainer.scrollHeight;
}

if (messageForm != null) {
    const name = prompt('What is your name?');
    currentUserName = name;
    // appendMessage('You joined');
    console.log('You joined')
    socket.emit('new-user', roomName, name);

    messageForm.addEventListener('submit', e => {
        e.preventDefault();
        const message = messageInput.value;
        socket.emit('send-chat-message', roomName, message);
        appendMessage(message, currentUserName);
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

    // console.log("Another person sent to you");
    appendMessage(data.message, data.name);


});

socket.on('chat-sticker', data => {
    // appendMessage(`${data.name}: ${data.message}`);

    // console.log("Another person sent to you");
    appendSticker(data.imageSrc, data.name);


});


socket.on('user-connected', name => {
    // appendMessage(`${name} connected`);
    console.log(`${name} connected`)
})

socket.on('user-disconnected', name => {
    // appendMessage(`${name} disconnected`);
    console.log(`${name} disconnected`)
})

stickerButtons.forEach(button => {
    button.addEventListener('click', function() {
        const imageElement = this.querySelector('img');
        if (imageElement) {
            const imageSrc = imageElement.src;
            console.log(imageSrc);
            socket.emit('send-chat-sticker', roomName, imageSrc);
            appendSticker(imageSrc, currentUserName);
        }
    });
});


function appendMessage(message, senderName) {
    console.log("senderName " + senderName);
    console.log("currentUserName " + currentUserName);
    if (senderName == currentUserName) { //เราส่ง
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
        console.log("Someone sent message to you");
    }
    scrollToBottom()
}

function appendSticker(imageSrc, senderName) {
    console.log("senderName " + senderName);
    console.log("currentUserName " + currentUserName);
    if (senderName !== currentUserName) {
        const div1 = document.createElement('div');
        div1.classList.add('flex', 'w-4/6', 'lg:w-full', 'mt-2', 'space-x-3', 'max-w-2xl');
        const div2 = document.createElement('div');
        div2.classList.add('flex-shrink-0', 'h-10', 'w-10', 'rounded-full', 'bg-gray-300', 'cursor-pointer');
        const div3 = document.createElement('div');
        div3.classList.add('bg-white', 'p-2', 'rounded-r-2xl');
        const img = document.createElement('img');
        img.classList.add('sticker-size');
        img.src = imageSrc;
        div3.appendChild(img);
        div1.append(div2);
        div1.append(div3);
        messageContainer.append(div1);

    } else { //เราส่ง
        const div1 = document.createElement('div');
        div1.classList.add('flex', 'w-4/6', 'lg:w-full', 'mt-2', 'space-x-3', 'max-w-2xl', 'ml-auto', 'justify-end', 'mr-5');
        const div2 = document.createElement('div');
        div2.classList.add('flex-shrink-0', 'h-10', 'w-10', 'rounded-full', 'bg-gray-300', 'cursor-pointer');
        const div3 = document.createElement('div');
        div3.classList.add('bg-white', 'p-2', 'rounded-l-2xl');

        const img = document.createElement('img');
        img.classList.add('sticker-size');
        img.src = imageSrc;
        div3.appendChild(img);
        div1.append(div3);
        div1.append(div2);
        messageContainer.append(div1);
        console.log("Someone sent sticker to you");
    }


    scrollToBottom()
}