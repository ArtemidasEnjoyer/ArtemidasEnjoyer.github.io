<?php
$connection = mysqli_connect("localhost","root","","szachy");

if (!$connection) {
    die("Bląd połączebua z bazą danych, nie jesteś godny na tą stronę".mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2><i>Koło szachowe gambit piona</i></h2>
    </header>
    <aside>
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="">kwerenda1</a></li>
            <li><a href="">kwerenda2</a></li>
            <li><a href="">kwerenda3</a></li>
            <li><a href="">kwerenda4</a></li>
        </ul>
        <img src="logo.png" alt="Logo koło">
    </aside>
    <main>
        <h3>Najlepsi gracze naszego koła</h3>
        <table>
            <tr>
                <th>Pozycja</th>
                <th>Pseudonim</th>
                <th>Tytuł</th>
                <th>Ranking</th>
                <th>Klasa</th>
            </tr>
            <?php
                $request = "SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC;"; 
                $result = mysqli_query($connection,$request);
                $numb = 1;

                if ($result) {
                    while ($res = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$numb."</td>";
                        echo "<td>".$res['pseudonim']."</td>";
                        echo "<td>".$res['tytul']."</td>";
                        echo "<td>".$res['ranking']."</td>";
                        echo "<td>".$res['klasa']."</td>";
                        echo "</tr>";
                        $numb++;
                    }
                }


            ?>
        </table>
        <form method="post" action="szachy.php">
            <button type="submit">Losuj nową parę gracze</button>
            
        </form>
        <?php
            $request2 = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
            $result2 = mysqli_query($connection,$request2);
            echo "<h4>";
                if ($result2) {
                    while ($res2 = mysqli_fetch_assoc($result2)) {
                        echo "{$res2['pseudonim']} {$res2['klasa']} ";
                    }
                }
            echo "</h4>";
        ?>
        <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
    </main>
    <footer>
        <p>Stronę wykonał: 16</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($connection);
?>