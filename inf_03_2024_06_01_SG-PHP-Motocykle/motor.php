<?php 
$polaczenie=mysqli_connect("localhost","root","","motor");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Motocykle</title>
</head>
<body>
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    
    <section class="lewy">
        <h2>Gdzie pojechać?</h2>
        <dl>
        <?php
        $zapytanie2="SELECT wycieczki.nazwa,wycieczki.opis,wycieczki.poczatek,zdjecia.zrodlo FROM wycieczki JOIN zdjecia ON zdjecia.id = wycieczki.zdjecia_id;"; 
        $wynik=mysqli_query($polaczenie,$zapytanie2);

        while($w=mysqli_fetch_row($wynik)){
            echo "<dt>".$w[0].", rozpoczyna się w ".$w[2]." <a href='".$w[3].".jpg'>zobacz zdjęcie</a>"."</dt>";
            echo "<dd>".$w[1]."</dd>";
        }
        ?>
        </dl>
    </section>
    <section class="prawy-gorny">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section class="prawy-dolny">
        <h2>Statystyki</h2>
        <p>     Wpisanych wycieczek:
            <?php
            $zapytanie3="SELECT COUNT(wycieczki.id) AS 'ilosc_wycieczek' FROM wycieczki;";
            $wynik=mysqli_query($polaczenie,$zapytanie3);

            echo mysqli_fetch_row($wynik)[0];
            ?>
        </p>
        <p>Użytkowników forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </section>
    
    <footer>
        <p>Stronę wykonał: Najlepszy uczeń</p>
    </footer>   
    
</body>
</html>
<?php
mysqli_close($polaczenie)
?>