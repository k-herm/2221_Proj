<?php

function connectToDatabase() {
    $user = 'root';
    $pwd = 'root';
    $server = 'localhost';
    $dbName = 'prison';

    $conn = new mysqli($server, $user, $pwd, $dbName);
    if ($conn->connect_error) {
        die("Connection failed" . $conn->connect_error);
    } else {
        return $conn;
    }
}

//use this function after $conn->query()
function clearConnection($mysql) {
    while($mysql->more_results()) {
        $mysql->next_result();
        $mysql->use_result();
    }
}

?>
