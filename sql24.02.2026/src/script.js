const suwak = document.getElementById("rangeImg");
const obrazek = document.getElementById("przyroda");
const kolor = document.getElementById("kolor");
const czarnoBialy = document.getElementById("czarnoBialy");


suwak.addEventListener("change", function() {
    console.log(suwak.value);
    obrazek.style.opacity = suwak.value + "%";
})
kolor.addEventListener("click", function(){
    console.log(kolor.value);
    obrazek.style.filter = "grayscale(0%)";
})
czarnoBialy.addEventListener("click", function() {
    console.log(czarnoBialy.value);
    obrazek.style.filter = "grayscale(100%)";
})

const brestImg = document.getElementById("brest")
const napis = document.getElementById("przyciskSep")
napis.value = "Sepia"

document.getElementById("przyciskSep").addEventListener("click", function() {
    console.log("sepia")
    if (napis.value === "Sepia") {
        napis.value = "Normalny"
        brestImg.style.filter = "sepia(100%)"
    } else {
        napis.value = "Sepia"
        brestImg.style.filter = "sepia(0%)"
    }
})

const kotImg = document.getElementById("kot");
const pion = document.getElementById("pion");
const poziom = document.getElementById("poziom");

pion.addEventListener("click", function(){
    
})