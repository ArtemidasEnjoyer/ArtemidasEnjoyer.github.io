<?php
$connection = mysqli_connect('localhost', 'root', '', 'uczniowie');
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dzienik Elektroniczny</title>
</head>

<body>
    <header>
        <h1>E-Dziennik</h1>
    </header>
    <main>
        <section>
            <button id="openForm">Rozwiń formularz</button>
            <div id="hiddenForm">
            <form action="" method="post" id="form">
                <label for="idStudent">Numer ucznia</label> <br>
                <input type="number" name="idStudent"> <br>
                <label for="markStudent">Ocena ucznia</label> <br>
                <input type="number" name="markStudent"> <br>
                <input type="submit" value="Dodaj" name="submit"> <br>
            </form>
            </div>
            <?php
            if (isset($_POST['submit']) && !empty($_POST['idStudent']) && !empty($_POST['markStudent'])) {
                    $idStudent = $_POST['idStudent'];
                    $markStudent = $_POST['markStudent'];

                $insert = "INSERT INTO oceny (id_ucznia,ocena) VALUES (".$idStudent.",".$markStudent.");";
                $resultInsert = mysqli_query($connection,$insert);
                header("Location: index.php");
            }
            ?>
        </section>
        <section id="studentTable">
            <table>
                <tr>
                    <th>IMIE</th>
                    <th>NAZWISKO</th>
                    <th>ŚREDNIA</th>
                </tr>
                <?php
                $zapytanie = "  SELECT uczniowie.imie,uczniowie.nazwisko,ROUND(AVG(oceny.ocena), 2)
                            FROM uczniowie
                            JOIN oceny ON oceny.id_ucznia = uczniowie.id_ucznia
                            GROUP BY uczniowie.id_ucznia
                            ORDER BY uczniowie.imie,uczniowie.nazwisko;";
                $result = mysqli_query($connection, $zapytanie);
                while ($row = mysqli_fetch_row($result)) {
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </section>
    </main>
    <footer>
        <p>Zrobiona przez mnie</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>

<?php
mysqli_close($connection);
?>