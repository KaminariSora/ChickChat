document.addEventListener('DOMContentLoaded', function () {
    const socket = io('http://localhost:3000');
    const messageContainer = document.getElementById('message-container');
    const roomContainer = document.getElementById('room-container');
    const messageForm = document.getElementById('send-container');
    const messageInput = document.getElementById('message-input');
    let currentUserName;
    const app = document.querySelector('.app');
    const stickerButtons = document.querySelectorAll('.sticker-box .stk');

    stickerButtons.forEach(button => {
        button.addEventListener('click', function () {
            const imageSrc = this.querySelector('img').src; // Get the image source
            console.log(imageSrc);
            sendMessage('image', imageSrc); // Assuming you have a function to send messages
        });
    });

    messageForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const message = messageInput.value;
        console.log('message:', message);
        sendMessage('text', message);
        messageInput.value = '';
    });

    function sendMessage(type, content) {
        socket.emit('send-chat-message', roomName, {
            type: type,
            content: content,
            name: currentUserName
        });
        appendMessage(content, type, name)
    }

    if (messageForm != null) {
        const name = prompt('What is your name?');
        currentUserName = name;
        console.log('You joined');
        socket.emit('new-user', roomName, name);
    }

    socket.on('room-created', room => {
        const roomElement = document.createElement('div');
        roomElement.innerText = room;
        const roomLink = document.createElement('a');
        roomLink.href = `/${room}`;
        roomLink.innerText = 'join';
        roomContainer.append(roomElement);
        roomContainer.append(roomLink);
    });

    socket.on('chat-message', data => {
        if (data.name !== currentUserName) {
            appendMessage(data.content, data.type, data.name);
        }
        appendMessage(data.content, data.type, data.name);
    });

    socket.on('user-connected', name => {
        console.log(`${name} connected`);
    });

    socket.on('user-disconnected', name => {
        console.log(`${name} disconnected`);
    });

    appendMessage('This is dumpmy data', 'text');

    function appendMessage(content, messageType, senderName) {

        if (undefined !== senderName) {
            const div1 = document.createElement('div');
            div1.classList.add('flex', 'w-4/6', 'lg:w-full', 'mt-2', 'space-x-3', 'max-w-2xl', 'ml-auto', 'justify-end', 'mr-5');
            const div2 = document.createElement('div');
            div2.classList.add('flex-shrink-0', 'h-10', 'w-10', 'rounded-full', 'bg-gray-300', 'cursor-pointer');
            const div3 = document.createElement('div');
            div3.classList.add('bg-white', 'p-2', 'rounded-l-2xl');
            console.log(content);

            if (messageType === 'image') {
                const img = document.createElement('img');
                console.log("My img:", img)
                img.classList.add('sticker-size');
                img.src = content;
                div3.appendChild(img);
            } else {
                const p = document.createElement('p');
                p.classList.add('text-end');
                p.innerText = content;
                div3.appendChild(p);
            }
            // div1.append(div2);
            div1.append(div3);
            messageContainer.append(div1);
        } else {
            const div1 = document.createElement('div');
            div1.classList.add('flex', 'w-4/6', 'lg:w-full', 'mt-2', 'space-x-3', 'max-w-2xl');
            const div2 = document.createElement('div');
            div2.classList.add('flex-shrink-0', 'h-10', 'w-10', 'rounded-full', 'bg-gray-300', 'cursor-pointer');
            const div3 = document.createElement('div');
            div3.classList.add('bg-white', 'p-2', 'rounded-l-2xl');
            if (messageType === 'image') {
                const img = document.createElement('img');
                console.log("My img:", img)
                img.classList.add('sticker-size');
                img.src = content;
                div3.appendChild(img);
            } else {
                const p = document.createElement('p');
                p.classList.add('text-end');
                p.innerText = content;
                div3.appendChild(p);
            }
            div1.append(div2);
            div1.append(div3);
            messageContainer.append(div1);
        }
        
        setTimeout(() => {
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }, 0);
    }
});
