<?php
$polaczenie = mysqli_connect("localhost","root","","wyprawy");
// if($polaczenie) {
//     die."bląd połączenia ".mysqli_error($polaczenie);
// }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biuro turystyczne</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="wczasy.html">Wczasy</a></li>
            <li><a href="wycieczki.html">Wyceczki</a></li>
            <li><a href="allinclusive.html">All inclusive</a></li>
        </ul>
    </nav>
    <main>
    <aside>
        <h3>Twój cel wyprawy</h3>
        <form action="" method="post">
            <label for="miejsce_wycieczki">Miejsce wycieczki</label><br>
            <select name="miejsce_wycieczki" id="miejsce_wycieczki">
                <?php
                    $zapytanie = "SELECT miejsca.nazwa FROM miejsca ORDER BY miejsca.nazwa ASC;";
                    $wynik = mysqli_query($polaczenie, $zapytanie);
                    while ($wiersz = mysqli_fetch_row($wynik)) {
                        echo "<option>$wiersz[0]<option>";
                    }
                    ?>
            </select>
            <label for="ilosc_doroslych">Ile dorosłych</label><br>
            <input type="number" name="ilosc_doroslych" id="ilosc_doroslych"><br>
            <label for="ilosc_dzieci">Ile dzieci</label><br>
            <input type="number" name="ilosc_dzieci" id="ilosc_dzieci"><br>
            <label for="termin">Termin</label><br>
            <input type="date" name="termin" id="termin"><br>
            <input type="submit" value="Symulacja ceny" name="symulacja_ceny">
        </form> <br>
        <h4>Kosz wycieczki</h4> <br>
        <?php
            if (isset($_POST['symulacja_ceny'])) {
                $zapytanie = "SELECT miejsca.cena FROM miejsca WHERE miejsca.nazwa = '".$_POST['miejsce_wycieczki']."';";
                $wynik = mysqli_query($polaczenie,$zapytanie);
                $wiersz = mysqli_fetch_row($wynik);
                $cena = $_POST['ilosc_doroslych'] * $wiersz[0] + $_POST['ilosc_dzieci'] * $wiersz[0] * 0.5;
                echo "<p>W dniu ".$_POST['termin']." </p> <br>";
                echo "<p>$cena złotych</p><br>";
            }
        ?>
    </aside>
    <section>
        <h3>Wycieczki</h3>
        <?php
        $zapytanie = "SELECT miejsca.nazwa,miejsca.cena,miejsca.link_obraz FROM miejsca WHERE miejsca.link_obraz LIKE '0%';";
        $wynik = mysqli_query($polaczenie,$zapytanie);

        while ($wiersz = mysqli_fetch_row($wynik)) {
            echo "
            <div class='wycieczka'>
                <img src='$wiersz[2]' alt='zdjęcie z wycieczki'>
                <h2>$wiersz[0]</h2>
                <p>$wiersz[1]</p>
            </div>
            ";
        }
        ?>
    </section>
    </main>
    <footer>
        <p>Autor: Nalepszy Uczen</p>
    </footer>
</body>
</html>
<?php
mysqli_close($polaczenie);
?>