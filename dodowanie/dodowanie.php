<?php

$polaczczenie = mysqli_connect('localhost','root','','os1');

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodowanie</title>
</head>
<body>
    <p>Dodaj osobę do bazy danych</p>
    <form action="" method="post">
        Nazwisko: <input type="text" name="nazwisko"><br>
        Imię: <input type="text" name="imie"><br>
        Funkcja: <input type="text" name="funkcja"><br>
        Email: <input type="email" name="mail"><br>
        <input type="submit" name="zapisz" value="zapisz do bazy">
    </form>

    <?php
    if (isset($_POST['zapisz'])) {
        $nazwisko = $_POST['nazwisko'];
        $imie = $_POST['imie'];
        $funkcja = $_POST['funkcja'];
        $mail = $_POST['mail'];
    }
    $zapytanie = "INSERT INTO osoby (nazwisko, imie, funkcja, email) VALUES ('$nazwisko', '$imie', '$funkcja', '$mail')";
    if(mysqli_query($polaczczenie, $zapytanie)) {
        echo "Osoba dodana";
        echo $zapytanie;
    }
    
    ?>
</body>
</html>

<?php
mysqli_close($polaczczenie);
?>