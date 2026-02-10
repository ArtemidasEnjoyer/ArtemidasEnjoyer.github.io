<?php 
$connect = mysqli_connect("localhost", "root", "", "sklep");
if (!$connect) {
    die("blad polaczenia z baza dannych".mysqli_error());
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <section id="formularz">
        <form action="" method="post">
            <label for="produkt">PRODUKT</label> 
            <input type="text" name="produkt"> 
            <label for="cena">CENA</label> 
            <input type="number" name="cena">  
            <label for="ilosc">ILOŚĆ</label>
            <input type="number" name="ilosc"> 
            <input type="submit" name="dodaj" value="DODAJ">
        </form>
        
        </section>
        <section id="listazakupow">
            <h1>LISTA ZAKUPÓW</h1>
            <ol id="lista_prodoktow" type="I">
            <?php
            if (isset($_POST['dodaj'])) {
                $nazwaProduktu = $_POST['produkt'];
                $cenaProduktu = $_POST['cena'];
                $iloscProduktu = $_POST['ilosc'];
                $query = "INSERT INTO produkty (nazwa, cena, ilosc) VALUES ('$nazwaProduktu','$cenaProduktu','$iloscProduktu');";
                mysqli_query($connect, $query);
                
                $query = "SELECT * FROM produkty;";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_row($result)) {
                    echo "<li> Produkt: ".$row[1]."<br><hr> cena: ".$row[2]." -- ilość: ".$row[3]."<li>";
                }

                };
            ?>
            </ol>


        </section>
    </main>
</body>
</html>
<?php
mysqli_close($connect);
?>