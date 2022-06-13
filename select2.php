<?php

include "./connection.php";


$name_actor = $_GET["name_actor"];
// $name = "Лоретта Дивайн"

$sth = $connection->prepare('SELECT f.name from film f, film_actor, actor a
where ID_Film=FID_Film and FID_Actor=ID_Actor and a.name=?');
$sth->execute(array($name_actor));
$res = $sth->fetchAll();

if($res) {
    foreach ($res as $row) {
        echo "<li>$row[0]</li>";
    }
} else {
    echo "<p>Not found</p>";
}

?>