var selectedFace = localStorage.getItem("selectedFace");
var faceDiv = document.getElementById("faceDiv");
var selectedClothes = localStorage.getItem("selectedClothes");
var clothesDiv = document.getElementById("clothesDiv");

if (!selectedFace) {
    selectedFace = 'image/Dressing.PNG';
}

console.log("Information :", selectedFace);
faceDiv.style.backgroundImage = "url('" + selectedFace + "')";
clothesDiv.style.backgroundImage = "url('" + selectedClothes + "')";

