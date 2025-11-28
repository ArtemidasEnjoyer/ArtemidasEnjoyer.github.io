<?php
$polacz = mysqli_connect("localhost","root","","obuwie");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>
    <section>
        <h2>Zamówienie</h2>
        <?php
        $zapytanie3 = "SELECT buty.nazwa, buty.cena, produkt.kolor,produkt.material, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model
                       WHERE produkt.model = '".$_POST['wyb_model']."';";
        $wynik3 = mysqli_query($polacz,$zapytanie3);
        $w3 = mysqli_fetch_row($wynik3);
        $wartosc = $w3[1] * intval($_POST['liczba_par']);

        echo "
        <img src='$w3[4]' alt='but męski'>
        <h2>$w3[0]</h2>
        <p>cena za ".$_POST['liczba_par']." par: $wartosc zł</p>
        <p>Szczegóły produktu: $w3[2], $w3[3]</p>
        <p>Rozmiar: ".$_POST['wyb_rozmiar']."</p>
        ";
        ?>
        <a href="index.php">Strona główna</a>
    </section>
    <footer>
        <p>Autor strony: 0000000000</p>
    </footer>
</body>
</html>
<?php
mysqli_close($polacz);
?>