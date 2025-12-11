<?php
    $connect = mysqli_connect("localhost","root","","egzamin6");
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Organizer</title>
        <link rel="stylesheet" href="styl6.css">
    </head>

    <body>
        <header class="lewy">
            <h2>MÓJ ORGANIZER</h2>
        </header>
        <header class="srodkowy">
            <form action="" method="post">
                <label for="wydarzenie">Wpis wydarzenia: </label><input type="text" name="wydarzenie">
                <input type="submit" name="submit" value="ZAPISZ">
            </form>
            <?php

            if(isset($_POST["submit"])) {
                $wydarzenie = $_POST['wydarzenie'];
                $zapytanie_atkualizajace = "UPDATE zadania SET wpis = '$wydarzenie' WHERE dataZadania = '2020-08-27';";
                mysqli_query($connect,$zapytanie_atkualizajace);
            }
            ?>
        </header>
        <header class="prawy">
            <img src="logo2.png" alt="Mój organizer">
        </header>
        <main>
            <?php
            $zapytanie1 = "SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac = 'sierpien';";
            $wynik = mysqli_query($connect,$zapytanie1);
            while($w = mysqli_fetch_row($wynik)) {
                echo "
                    <section>
                    <h6>$w[0],$w[1]</h6>
                    <p>$w[2]</p>
                    </section>
                     ";
            }
            ?>
        </main>
        <footer>
            <?php
            $zapytanie2 = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-08-01';";
            $wynik = mysqli_query($connect,$zapytanie2);
            $w = mysqli_fetch_row($wynik);
            echo "
                <h1>miesiąc: $w[0], rok: $w[1]<h1>
                ";
            mysqli_close($connect);
            ?>

            <p>Stronę wykonał: najlepszy uczeń</p>
        </footer>
    </body>
</html>
