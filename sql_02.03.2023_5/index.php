<?php
$connection = mysqli_connect("localhost","root","","cwiczenia");
if(!$connection) {
    die."brak polączenia".mysqli_error($connection);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cwiczenia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <?php 
             if(isset($_GET['usun'])) {
                $request = "DELETE FROM osoby WHERE id_osoby = ".$_GET['usun'];
                mysqli_query($connection,$request);
                header('Location: index.php');
            };
            if (isset($_POST['submit'])) {
                $request = "INSERT INTO osoby  VALUES ('','".$_POST['imie']."','".$_POST['nazwisko']."','".$_POST['data_urodzenia']."')";
                mysqli_query($connection,$request);                    
                header("Location: index.php");
            }

            ?>
    <header>
        <h1>Wszystkie osoby z tabeli osoby</h1>
    </header>
    <main>
        <section>
            <form action="index.php" method="post">
                <input type="text" name="imie">
                <input type="text" name="nazwisko">
                <input type="date" name="data_urodzenia">
                <input type="submit" value="Dodaj" name="submit">
            </form>
        </section>
        <section>
            <table>
            <tr>
                <th>ID</th>
                <th>IMIE</th>
                <th>NAZWISKO</th>
                <th>DATA URODZENIA</th>
                <th>USUN</th>
            </tr>
            <?php 
            $request = "SELECT * FROM osoby;";
            $result  = mysqli_query($connection,$request);

            while ($row = mysqli_fetch_row($result)) {
                echo "
                <tr>
                    <td>".$row[0]."</td>
                    <td>".$row[1]."</td>
                    <td>".$row[2]."</td>
                    <td>".$row[3]."</td>
                    <td><a href='index.php?usun=".$row[0]."'>usuń</td>
                </tr>
                ";
            }
            ?>

            </table>
        </section>
    </main>
    <footer>
        Zrobione przez: Mnie
    </footer>
</body>
</html>
<?php
mysqli_close($connection);
?>