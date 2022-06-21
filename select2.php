<?php
header('Content-Type: text/xml');
header('Cache-Control: no-cache, must-revalidate'); 
include "./connection.php";
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<root>";
    $name_actor = $_GET['name_actor']; 
    $sqlSelect = $connection->prepare('SELECT f.name from film f, film_actor, actor a
    where ID_Film=FID_Film and FID_Actor=ID_Actor and a.name=?');
    $sqlSelect->execute(array($name_actor));
    while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
      $item = $cell[0];
      echo "<row><item> $item </item></row>";
    }
    echo "</root>"
?>
