<?php 
$polacz = mysqli_connect("localhost","root","","przewozy");
if (!$polacz) {
    die."błąd połączenia".mysqli_error($polacz);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma Przewozowa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Firma przewozowa Półdarmo</h1>
    </header>
    <nav>
        <a href="kwerenda1.png">kwerenda1</a>
        <a href="kwerenda2.png">kwerenda2</a>
        <a href="kwerenda3.png">kwerenda3</a>
        <a href="kwerenda4.png">kwerenda4</a>
    </nav>
    <main>
        <section>
            <h2>Zadania do wykonania</h2>
            <table>
                <tr>
                    <th>Zadanie do wykonania</th>
                    <th>Data realizacji</th>
                    <th>Akcja</th>
                </tr>
                <?php 
                #skrypt 1
                $zapytanie = "SELECT id_zadania,zadanie,data FROM zadania;";
                $wynik = mysqli_query($polacz, $zapytanie);

                while($w = mysqli_fetch_row($wynik)) {
                    echo "
                    <tr>
                        <td>'".$w[1]."'</td>
                        <td>'".$w[2]."'</td>
                        <td><a href='przewozy.php?usun=".$w[0]."'>usuń</a></td>
                    </tr>
                    ";
                }
                if(isset($_GET['usun'])) {
                    $id_zadanie = $_GET['usun'];
                    $zapytanie_usun = "DELETE FROM zadania WHERE id_zadania = '".$id_zadanie."';";

                    mysqli_query($polacz, $zapytanie_usun);
                }
                
                ?>
            </table>
                
                <form action="" method="POST">
                    <label for="">Zadanie do wykonania</label>
                    <input type="text" name="zadanie"> <br>
                    <label for="">Data realizacja</label>
                    <input type="date" name="date">
                    <input type="submit" name="dodaj" value="Dodaj">
                </form>
                <?php
                if(isset($_POST['dodaj'])) {
                    $zadanie = $_POST['zadanie'];
                    $data = $_POST['date'];
                    
                    $zapytanie_dodaj = "INSERT INTO zadania (zadanie,data,osoba_id) VALUES ('".$zadanie."','".$data."','1');";
                    mysqli_query($polacz, $zapytanie_dodaj);
                }
                ?>
        </section>
        <aside>
            <img src="auto.png" alt="auto firmowe">
            <h3>Nasza specjalność</h3>
            <ol>
                <li>Przeprowadzki</li>
                <li>Przewóz mebli</li>
                <li>Przesyłki gabarytowe</li>
                <li>Wynajem pojazdów</li>
                <li>Zakupy towarów</li>
            </ol>
        </aside>
    </main>
    <footer>
        <p>Stronę wykonał: najlepszy uczeń</p>
    </footer>
</body>
</html>
<?php
mysqli_close($polacz);
?>