<?php
    include "./connection.php";
    $user_date = $_GET["user_date"];
    $sth = $connection->prepare('SELECT name from film where date BETWEEN ? and CURRENT_DATE');

    $sth->execute(array($user_date)); 
    $cell = $sth->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($cell[0]);
    ?>
