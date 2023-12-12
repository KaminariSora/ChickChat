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
});

closeMessage.addEventListener('click', () => {
    messageContainer.classList.remove('active');
});



const random = document.querySelector('.random');

random.addEventListener('click', () => {

    window.location.href = "http://localhost:" + 3000 + "/1";



});