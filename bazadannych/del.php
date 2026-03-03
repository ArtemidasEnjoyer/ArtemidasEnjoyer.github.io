<?php
if (isset($_GET['usun']) && is_numeric($_GET['usun'])) {
    $id = $_GET['usun'];
    $request = "DELETE FROM produkty WHERE produkty.id = $id;";
    $connection = mysqli_connect('localhost','root','','sklep');
    mysqli_query($connection,$request);
    header("Location: index.php");    
    mysqli_close($connection);
}
?>