<?php
$polaczenie = mysqli_connect('localhost','root','','szkolenie');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szkolenie i kursy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>SZKOLENIA</h1>
    </header>
    <main>
        <section class="lewy">
            <table>
                <tr>
                    <th>Kurs</th>
                    <th>Nazwa</th>
                    <th>Cena</th>
                </tr>
                <?php
                    $zapytanie = 
                    "
                    SELECT kursy.kod,kursy.nazwa,kursy.cena
                    FROM kursy 
                    ORDER BY kursy.cena ASC;
                    ";
                    $wynik = mysqli_query($polaczenie,$zapytanie);

                    while ($wiersz = mysqli_fetch_row($wynik)) {
                        echo "<tr>";
                            echo "<td><img src='$wiersz[0].jpg' alt='$wiersz[1]'></td>";
                            echo "<td>$wiersz[1]</td>";
                            echo "<td>$wiersz[2]</td>";
                        echo "</tr>";
                    }
                    
                ?>
            </table>
        </section>
        <section class="prawy">
            <h2>Zapisy na kursy</h2>
            <form method="post">
                <label for="imie">Imię</label>
                <input type="text" name="imie">
                <label for="nazwisko">Nazwisko</label>
                <input type="text" name="nazwisko">
                <label for="wiek">Wiek</label>
                <input type="number" name="wiek">
                <label for="rodajKursu">Rodzaj kursu</label>
                <select name="rodzajKursu">
                    <?php
                        $zapytanie =
                        "
                        SELECT kursy.nazwa
                        FROM kursy;
                        ";
                        $wynik = mysqli_query($polaczenie,$zapytanie);

                        while ($wiersz = mysqli_fetch_row($wynik)) {
                            echo "<option value='$wiersz[0]'>";
                            echo "$wiersz[0]";
                            echo "</option>";
                        }
                    ?>
                </select>
                <input type="submit" name="dodaj" value="Dodaj Dane">
            </form>
            <?php
                if(isset($_POST['dodaj'])) {
                    if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['wiek'])) {
                        $imie = $_POST['imie'];
                        $nazwisko = $_POST['nazwisko'];
                        $wiek = $_POST['wiek'];

                        $zapytanie = 
                        "
                        INSERT INTO uczestnicy (imie,nazwisko,wiek)
                        VALUES ('$imie','$nazwisko','$wiek');
                        ";
                        mysqli_query($polaczenie,$zapytanie);
                        echo "<p>Dane uczestnika $imie $nazwisko zostały dodane</p>";
                        
                    }
                    else {
                            echo "<p>Wprowadź wyszystkie dane</p>";
                    }
                    
                }
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: najlepszy uczeń</p>
    </footer>
</body>
</html>
<?php
mysqli_close($polaczenie);
?>