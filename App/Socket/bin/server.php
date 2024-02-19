<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Reservation;

// Set the include path to autoload Composer dependencies
require __DIR__ . '/../vendor/autoload.php';

$reservation = new MyApp\Reservation();

// Create WebSocket server connection
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Reservation()
        )
    ),
    8080
);

$server->run();

