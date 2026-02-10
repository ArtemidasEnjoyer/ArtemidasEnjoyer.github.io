document.getElementById("dodaj").addEventListener("click", function(){
    const produkt = document.getElementById("produkt").value;
    const cena = document.getElementById("cena").value;
    const ilosc = document.getElementById("ilosc").value;
    console.log(produkt, cena, ilosc);

    const lista_produktow = document.getElementById("lista_prodoktow");
    const li = document.createElement("li");
    li.innerHTML =  "produkt:  " + produkt + " <br><hr> cena: " + cena + "zł  -- ilość: " + ilosc;
    lista_produktow.appendChild(li);
    


})