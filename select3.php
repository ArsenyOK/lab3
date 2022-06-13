<?php

include "./connection.php";


$user_date = $_GET["user_date"];
// $name = "Лоретта Дивайн"

$sth = $connection->prepare('SELECT name from film where date BETWEEN ? and CURRENT_DATE');
$sth->execute(array($user_date));
$res = $sth->fetchAll();

if($res) {
    foreach ($res as $row) {
        echo "<li>$row[0]</li>";
    }
} else {
    echo "<p>Not found</p>";
}

?>