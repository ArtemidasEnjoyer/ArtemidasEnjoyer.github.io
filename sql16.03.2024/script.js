const form = document.getElementById("form");
const openButton = document.getElementById("openForm");
form.style.display = "none";

openButton.addEventListener("click", function() {
    if (form.style.display === "none") {
    form.style.display = "block"
    openButton.textContent = "Zwiń formularz"
    } else {
        form.style.display = "none";
        openButton.textContent = "Rozwiń formularz";
    }
    
})