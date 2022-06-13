<?php

include "./connection.php";


$genre_name = $_GET["genre_name"];

$sth = $connection->prepare('SELECT f.name from film f, film_genre, genre g
where ID_Film=FID_Film and FID_Genre=ID_Genre and g.title=?');
$sth->execute(array($genre_name));
$res = $sth->fetchAll();

if($res) {
    foreach ($res as $row) {
        echo "<li>$row[0]</li>";
    }
} else {
    echo "<p>Not found</p>";
}

?>