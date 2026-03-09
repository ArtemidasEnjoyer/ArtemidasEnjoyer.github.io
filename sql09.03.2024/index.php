<?php
if(!isset($_COOKIE['visitCounter'])) {
    setcookie("visitCounter", 2, time()+120);
} 
if(isset($_COOKIE['visitCounter'])){
    setcookie("visitCounter",  $_COOKIE['visitCounter'] + 1, time()+120);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pliki coockies</title>
    <?php 
    if (isset($_COOKIE['Tryb'])) {
        echo "<link rel='stylesheet' href='".$_COOKIE['Tryb']."'>";
        setcookie("Tryb", $_COOKIE['Tryb'], time()+180);
    } else {
        echo "<link rel='stylesheet' href='dark.css'>";
    }
    ?>
</head>
<body>
    <header>
    <?php

        if(isset($_COOKIE['visitCounter']) && $_COOKIE['visitCounter'] != 0) {
            echo "<h1> Witam po raz ".$_COOKIE['visitCounter']." na mojej stronie</h1>";
        } else {
            echo "<h1>Witam pierwszy raz na mojej stronie</h1>";
        }
    ?>
    </header>
    <section>
        <form action="" method="post">
            <input type="submit" name="jasny" value="Jasny">
            <input type="submit" name="ciemny" value="Ciemny">
        </form>
    </section>
    <?php 
    if(isset($_POST['jasny'])) {
        setcookie("Tryb", "light.css", time()+180);
        header("Location: index.php");
        setcookie("visitCounter",  $_COOKIE['visitCounter'] - 1, time()+120);
        }
    if(isset($_POST['ciemny'])) {
        setcookie("Tryb", "dark.css", time()+180);
        header("Location: index.php");
        setcookie("visitCounter",  $_COOKIE['visitCounter'] - 1, time()+120);
        }
    ?>
</body>
</html>