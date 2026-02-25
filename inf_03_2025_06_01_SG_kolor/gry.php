<?php
$connect = mysqli_connect("localhost","root","","gry");
if (!$connect) {
    die("bląd polączenia z bazą danych".mysqli_error($connect));
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Gry komputerowe</title>
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <section class="blok-lewy">
        <h3>Top 5 gier w tym miesiącu</h3>
        <ul>
            <?php
            $query3 = "SELECT nazwa,punkty FROM gry ORDER BY punkty DESC LIMIT 5;";
            $result = mysqli_query($connect,$query3);

            while($row = mysqli_fetch_row($result)) {
                echo "
                <li>$row[0] <div class='punkty'>$row[1]</div></li>
                ";
            }
            ?>
        </ul>
        <h3>Nasz sklep</h3>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>Stronę wykonaL</h3>
        <p>Najlepszy uczeń</p>
    </section>
    <section class="blok-srod">
        <?php
        $query1 = "SELECT id,nazwa,zdjecie FROM gry;";
        $result = mysqli_query($connect,$query1);

        while ($row = mysqli_fetch_row($result)) {
            echo "
                <div class='gry'>
                <img src='$row[2]' alt='$row[1]' title='$row[0]'>
                <p>$row[2]</p>
                <div>
            ";
        }
        ?>
    </section>
    <section class="blok-prawy">
        <h3>Dodaj nową grę</h3>
        <form method="POST">
            <label for="nazwa">nazwa</label>  <br>
            <input type="text" name="nazwa" class="nazwa"> <br>
            <label for="opis">opis</label> <br>
            <input type="text" name="opis" class="opis"> <br>
            <label for="zdjecie">zdjęcie</label> <br> 
            <input type="text" name="zdjecie" class="zdjecie"> <br>
            <label for="cena">cena</label> <br>
            <input type="number" name="cena" class="cena"> <br>
            <input type="submit" name="DODAJ" class="DODAJ" value="DODAJ">
        </form>
        <?php
        if(isset($_POST['nazwa'])) {
            $query4 = "INSERT INTO gry (nazwa,opis,punkty,cena,zdjecie)
                       VALUES ('".$_POST['nazwa']."','".$_POST['opis']."','0','".$_POST['cena']."','".$_POST['zdjecie']."');";
            mysqli_query($connect,$query4);
        }
        ?>
    </section>
    <footer>
        <form method="POST">
            <input type="number" name="opis" class="opis">
            <input type="submit" value="Pokaż opis" name="dodaj_opis" class="dodaj_opis">
        </form>
        <?php
        if (is_numeric($_POST['opis'])) {
            $query2 = "SELECT nazwa,LEFT(opis, 100),punkty,cena FROM gry WHERE gry.id = '".$_POST['opis']."';";
            $res = mysqli_fetch_row(mysqli_query($connect,$query2));

            echo "
            <h2>$res[0], $res[2] punktów, $res[3] zł</h2>
            <p>$res[1]</p>
            "; 
        } else {
            $query2 = "SELECT nazwa,LEFT(opis, 100),punkty,cena FROM gry WHERE gry.id = '1';";
            $res = mysqli_fetch_row(mysqli_query($connect,$query2));

            echo "
            <h2>$res[0], $res[2] punktów, $res[3] zł</h2>
            <p>$res[1]</p>
            "; 
        }
        

        ?>
    </footer>
</body>
</html>
<?php
mysqli_close($connect);
?>