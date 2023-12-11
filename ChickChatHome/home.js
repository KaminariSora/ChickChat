var selectedFace = localStorage.getItem("selectedFace");
var selectedClothes = localStorage.getItem("selectedClothes");
if (!selectedFace) {
    selectedFace = 'image/Dressing.PNG';
}
document.getElementById("faceDiv").style.backgroundImage = "url('" + selectedFace + "')";
document.getElementById("clothesDiv").style.backgroundImage = "url('" + selectedClothes + "')";

const closeMessage = document.querySelector('.mark');
const mail = document.querySelector('.mail');
const messageContainer = document.querySelector('.message-container');

mail.addEventListener('click', () => {
    messageContainer.classList.add('active');
})

closeMessage.addEventListener('click', () => {
    messageContainer.classList.remove('active');
})

const random = document.querySelector('.random');

let UserID = null;

random.addEventListener('click', () => {
    UserID = Data;
    console.log(getUserID());

})

function getUserID(){
    if(UserID !== null) {
        console.log(UserID);
        return UserID;
    } else {
        console.log('No event data available yet.');
    }
}

module.exports = {getUserID};