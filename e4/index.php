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
        <form method="POST" action="zamow.php">
            <label for="wyb_model">Model: </label>
            <select name="wyb_model" class="kontrolki">
                <?php
                    $zapytanie1 = "SELECT model FROM produkt;";
                    $wynik1 = mysqli_query($polacz,$zapytanie1);
                    while($w1 = mysqli_fetch_assoc($wynik1)) {
                        echo "<option>".$w1['model']."</option>";
                    }
                ?>
            </select>
            <label for="wyb_rozmiar">Rozmiar: </label>
            <select name="wyb_rozmiar" class="kontrolki">
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
            </select>
            <label for="">Liczba par: </label>
            <input type="number" name="liczba_par" class="kontrolki">
            <input type="submit" name="submit" value="Zamów" class="kontrolki">
        </form>
        <?php
        $zapytanie2 = "SELECT buty.model, buty.nazwa, buty.cena, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model;";
        $wynik2 = mysqli_query($polacz,$zapytanie2);

        while($w = mysqli_fetch_row($wynik2)) {
            echo "
            <article class='buty'>
                <img src='$w[3]' alt='but męski'>
                <h2>$w[1]</h2>
                <h5>Model: $w[0]</h5>
                <h4>Cena: $w[2]</h4>
            </article>
            ";
        }
        ?>
    </section>
    <footer>
        <p>Autor strony: 0000000000</p>
    </footer>
</body>
</html>

<?php
mysqli_close($polacz);
?>