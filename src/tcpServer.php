<?php

$address = '127.0.0.1';
$port = 8380;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($socket, $address, $port);
socket_listen($socket, 5);
while (1) {
    $connection = socket_accept($socket);

    $buffer = socket_read($connection, 2048);
    $lines = explode("\r\n", $buffer);
    foreach ($lines as $key => $line) {
        if(trim($line) !== ""){
            $headers[] = $line;
        }
    }
    // var_dump($headers);
    $response = "HTTP/1.1 200 OK\r\n";
    socket_write($connection, $response, strlen($response));
    socket_close($connection);
}

socket_close($socket);

