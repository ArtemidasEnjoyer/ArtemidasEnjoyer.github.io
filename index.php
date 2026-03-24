<?php
$polaczenie = mysqli_connect('localhost', 'root', '', 'sklep');
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurtownia szkolna</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Hurtownia z najlepszymi cenami</h1>
    </header>
    <main>
        <section class="lewy">
            <h2>Nasze ceny</h2>
            <table>
                <?php
                $zapytanie1 =
                    "
                SELECT nazwa,cena
                    FROM towary
                    LIMIT 4;
                ";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);

                while ($wiersz = mysqli_fetch_row($wynik1)) {
                    echo "
                    <tr>
                        <td>$wiersz[0]</td>
                        <td>$wiersz[1]</td>
                    </tr>
                    ";
                }
                ?>
            </table>
        </section>
        <section class="srod">
            <h2>Koszt zakupów</h2>
            <form action="" method="post">
                <div>
                    <label for="artykul">wybierz artykul </label>
                    <select name="artykul" id="">
                        <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                        <option value="Zeszyt 32 kartki">Zeszy 32 kartek</option>
                        <option value="Cyrkiel">Cyrkiel</option>
                        <option value="Linkjka 30 cm">linijka 30 cm</option>
                    </select>
                </div>
                <div>
                    <label for="liczbaSztuk">liczba sztuk</label>
                    <input type="number" name="liczbaSztuk">
                </div>
                <div>
                    <input type="submit" name="oblicz" value="OBLICZ">
                </div>
            </form>
            <?php
            if (!empty($_POST["oblicz"])) {
                $nazwa = $_POST['artykul'];
                $liczbaSztuk = $_POST['liczbaSztuk'];
                $zapytanie2 =
                    "
                    SELECT cena
                        FROM towary
                        WHERE nazwa = '$nazwa';
                    ";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                $wiersz = mysqli_fetch_row($wynik2);
                $cena = $wiersz[0];
                $wartosc = $cena * $liczbaSztuk;
                echo "
                    <div> 
                        wartość zakupów: $wartosc
                    <div>
                     ";
            }
            ?>
        </section>
        <section class="prawy">
            <h2>Kontakt</h2>
            <img src="zakupy.png" alt="hurtownia">
            <p>e-mail: <a href="mail:hurt@poczta2.pl"">hurt@poczta2.pl</a></p>
        </section>
    </main>
    <footer>
        <h4>Witrynę wykonał: 00000000000</h4>
    </footer>
</body>
</html>
<?php
mysqli_close($polaczenie);
?>