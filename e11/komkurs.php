<?php

$poloczenie = mysqli_connect("localhost","root","","konkurs");
if (!$poloczenie) {
    die("Błąd połączenia z bazą dannych".mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOŁY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <main>
        <h3>Komkursowe nagrody</h3>        
        <button type="submit">Losuj nowe nagrody</button>
        <table>
            <tr>
                <th>Nr</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Wartosc</th>
            </tr>
            <?php

            $zapytanie = "SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5";
            $wynik = mysqli_query($poloczenie,$zapytanie);
            $nr = 1;

            if ($wynik) {
                while ($wyn = mysqli_fetch_assoc($wynik)) {
                    echo "<tr>";
                    echo "<td>".$nr."</td>";
                    echo "<td>".$wyn['nazwa']."</td>";
                    echo "<td>".$wyn['opis']."</td>";
                    echo "<td>".$wyn['cena']."</td>";
                    echo "</tr>";
                    $nr++;
                }
            }

            ?>
        </table>
    </main>
    <aside>
        <img src="puchar.png" alt="Puchar dla wolontariusza">
        <h4>Polecane linki</h4>
        <ul>
            <li> <a href="">Kwerenda1</a> </li>
            <li> <a href="">Kwerenda2</a> </li>
            <li> <a href="">Kwerenda3</a> </li>
            <li> <a href="">Kwerenda4</a> </li>
        </ul>
 
    </aside>

    <footer>
        <p>Numer zdającego: 16</p>
    </footer>

    
</body>
</html>
<?php

mysqli_close($poloczenie);

?>