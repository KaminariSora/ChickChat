var selectedFace = localStorage.getItem("selectedFace");
var selectedClothes = localStorage.getItem("selectedClothes");
if (!selectedFace) {
    selectedFace = 'image/Dressing.PNG';
}
document.getElementById("faceDiv").style.backgroundImage = "url('" + selectedFace + "')";
document.getElementById("clothesDiv").style.backgroundImage = "url('" + selectedClothes + "')";
console.log('data exist');

function checkStatus (button) {
    const isButtonActive = !button.querySelector('.lock');

    if(isButtonActive) {
        changeFace(button);
    } else {
        console.log("This item is locked.");
    }
}

function changeFace(button) {
    var faceDiv = document.getElementById("faceDiv");
    var allButtons = document.querySelectorAll("button[id^='faceSelect']");
    
    faceDiv.style.backgroundImage = "url('" + button.dataset.image + "')";
    allButtons.forEach(function (btn) {
        btn.classList.remove("selected-face");
    });
    button.classList.add("selected-face");
}

function applyFace() {
    var selectedFaceButton = document.querySelector(".selected-face");
    if (!selectedFaceButton) {
        console.error("No face selected. Using old information.");
        var oldSelectedFace = localStorage.getItem("selectedFace");
        if (oldSelectedFace) {
            window.location.href = "Dressing.php";
        } else {
            console.error("No old information in local storage.");
        }
        return;
    }
    var selectedFace = selectedFaceButton.querySelector("img").src;
    console.log(selectedFace);
    localStorage.setItem("selectedFace", selectedFace);
    window.location.href = "Dressing.html";
}

shop = document.querySelector('.shop');

shop.addEventListener('click', () => {
    window.location.href = '../ChickShop/chickShop.html';
})