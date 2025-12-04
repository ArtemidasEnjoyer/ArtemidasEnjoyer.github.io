<?php
$polacz = mysqli_connect("localhost","root","","hodowla");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="./styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <main>
        <nav>
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Creseted</a>
        </nav>
        <section>
            <img src="peruwianka.jpg" alt="Świnka morska rasy peruwianka">
            <?php
            $zapytanie2 = "SELECT DISTINCT swinki.data_ur,swinki.miot,rasy.rasa FROM swinki JOIN rasy ON swinki.rasy_id = rasy.id WHERE rasy.id = 1";
            $wynik2 = mysqli_query($polacz, $zapytanie2);
            $w = mysqli_fetch_row($wynik2);
                echo "
                    <h2>Rasa: $w[2]</h2>
                    <p>Data urodzenia: $w[0]</p>
                    <p>Oznaczenie miotu: $w[1]</p>
                ";
            
            ?>
            <hr>
            <h2>Świnki w tym momencie</h2>
            <?php
            $zapytanie3 = "SELECT swinki.imie,swinki.cena,swinki.opis FROM swinki WHERE swinki.rasy_id = 1;";
            $wynik3 = mysqli_query($polacz, $zapytanie3);
            while ($w = mysqli_fetch_row($wynik3)){    
            echo "
                    <h3>$w[0] - $w[1]</h3>
                    <p>$w[2]</p>
                ";
            }
            ?>
        </section>
    </main>
    <aside>
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
            $zapytanie4 = "SELECT rasy.rasa FROM rasy;";
            $wynik4 = mysqli_query($polacz, $zapytanie4);
            while ($w = mysqli_fetch_row($wynik4)) {
                echo "
                <li>$w[0]</li>
                ";
            }
            ?>
        </ol>
    </aside>
    <footer>
        <p>Stronę wykonał: 000000000000</p>
    </footer>
</body>
</html>
<?php
mysqli_close($polacz)
?>