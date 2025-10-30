<?php

$conn = mysqli_connect("localhost", "root", "", "mieszalnia");
if (!$conn) {
    die("błąd połączenia: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="fav.png" sizes="32x32">
</head>
<body>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">
    </header>
    <form action="" method="post">
        <label>Data odbioru od: <input type="date" name="data_od"></label>
        <label>Do: <input type="date" name="data_do"></label>
        <input type="submit" value="Wyszukaj" name="submit">
    </form>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Kolor</th>
                <th>Pojemność [ml]</th>
                <th>Data odbioru</th>
            </tr>
            <?php
            if (isset($_POST['submit'])) {
                $zapytanie = "SELECT k.nazwisko, k.imie, z.id, z.kod_koloru, z.pojemnosc, z.data_odbioru FROM klienci k JOIN zamowienia z ON k.id = z.id_klienta WHERE z.data_odbioru BETWEEN '$_POST[data_od]' AND '$_POST[data_do]' ORDER BY z.data_odbioru ASC;";
            } else {
                $zapytanie = "SELECT k.nazwisko, k.imie, z.id, z.kod_koloru, z.pojemnosc, z.data_odbioru FROM klienci k JOIN zamowienia z ON k.id = z.id_klienta ORDER BY z.data_odbioru ASC;";
            };

            $wynik = mysqli_query($conn, $zapytanie);
            while ($w = mysqli_fetch_assoc($wynik)) {
                echo "<tr>";
                echo "<td>".$w['id']."</td>";
                echo "<td>".$w['nazwisko']."</td>";
                echo "<td>".$w['imie']."</td>";
                echo "<td style='background-color: #".$w['kod_koloru']."'> #".$w['kod_koloru']."</td>";
                echo "<td>".$w['pojemnosc']."</td>";
                echo "<td>".$w['data_odbioru']."</td>";
                echo "</tr>";
            }


            ?>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: Najlepszy uczeń</p>
    </footer>
</body>
</html>
<?php
mysqli_close($conn);
?>