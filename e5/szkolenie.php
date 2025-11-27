<?php
$polacz = mysqli_connect("localhost",'root','','firma');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <header>
            <img src="baner.jpg" alt="Szkolenie">
        </header>
        <nav>
            <ul>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="szkolenie.php">Szkolenie</a></li>
            </ul>
        </nav>
        <section>
            <?php

                $zapytanie = "SELECT Data,Temat
                              FROM szkolenia
                              ORDER BY Data;";
                $wynik = mysqli_query($polacz, $zapytanie);
                while ($w = mysqli_fetch_assoc($wynik)) {
                    echo "<p>".$w['Data']." ".$w['Temat']."</p>";
                };

            ?>
        </section>
        <footer>
            <h2>Firma szkoleniowa ul. Główna 1, 23-456 Warszawa</h2>
            <p>Autor: Nalepszy uczeń</p>
        </footer>
    </main>
    
    
</body>
</html>
<?php
mysqli_close($polacz);

?>