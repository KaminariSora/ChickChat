var selectedFace = localStorage.getItem("selectedFace");
var selectedClothes = localStorage.getItem("selectedClothes");
if (!selectedFace) {
    selectedFace = 'image/Dressing.PNG';
}
document.getElementById("faceDiv").style.backgroundImage = "url('" + selectedFace + "')";
document.getElementById("clothesDiv").style.backgroundImage = "url('" + selectedClothes + "')";
console.log('data exist');

function checkStatus(button) {
    const isButtonActive = !button.querySelector('.lock');

    if(isButtonActive) {
        changeClothes(button);
    } else {
        console.log("This item is locked.");
    }
}

function changeClothes(button) {
    var clothesDiv = document.getElementById("clothesDiv");
    var allButtons = document.querySelectorAll("button[id^='clothesSelect']");
    
    clothesDiv.style.backgroundImage = "url('" + button.dataset.image + "')";
    allButtons.forEach(function (btn) {
        btn.classList.remove("selected-clothes");

    });
    button.classList.add("selected-clothes");
}

function applyClothes() {
    var selectedClothesButton = document.querySelector(".selected-clothes");
    if (!selectedClothesButton) {
        console.error("No Clothes selected.");
        var oldInformationClothes = localStorage.getItem("selectedClothes");
        if (oldInformationClothes) {
            window.location.href = 'Dressing.html';
        } else {
            console.error("No old information in local storage.");
        }
        return;
    }
    var selectedClothes = selectedClothesButton.querySelector("img").src;
    console.log(selectedClothes);
    localStorage.setItem("selectedClothes", selectedClothes);
    window.location.href = "Dressing.html";
}

shop = document.querySelector('.shop');

shop.addEventListener('click', () => {
    window.location.href = '../ChickShop/chickShop.html';
})