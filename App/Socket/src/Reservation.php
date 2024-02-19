<?php

namespace MyApp;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use PDO;
use PDOException;

class Reservation implements MessageComponentInterface
{
    protected $clients; // Storage for connected WebSocket clients
    protected $wsConnection; // Variable to hold WebSocket connection object
    protected $categoryClients; // Storage for client category mappings

    public function __construct()
    {
        $this->clients = new \SplObjectStorage; // Initialize storage for connected clients
        $this->categoryClients = []; // Initialize storage for client category mappings
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Attach the connection to the clients storage
        $this->clients->attach($conn);
       // $this->wsConnection = $conn; // Assign the WebSocket connection object
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        echo "Received message: " . $msg . "\n";
        if ($msg === 'newReservation') {
            try {
                // Establish a connection to the database
                $pdo = new PDO('mysql:unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock;dbname=constructhub_db', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected to the database successfully!";
    
                // Query the database to retrieve data
                $stmt = $pdo->query('SELECT * FROM tempory');
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Retrieve clients with the same category ID
                $catClients = $this->getClientsByCategoryId(8);
                
                echo "Received message: " . var_dump($catClients) . "\n";

                // Encode the retrieved data into JSON format
                $jsonData = json_encode($data);
    
                // Send the JSON data to all connected clients through the WebSocket connection
                $this->sendDataToAllClients($jsonData);
            } catch (PDOException $e) {
                // Handle database connection error
                echo "Error connecting to the database: " . $e->getMessage();
            }
        } else {
            // Store the received category ID for the client
            $categoryId = intval($msg);

            $this->categoryClients[$from->resourceId] = $categoryId;
            echo "message: " . var_dump($this->categoryClients) . "\n";
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // Detach the connection when it's closed
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // Handle errors that occur during WebSocket communication
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    public function sendDataToAllClients($data)
    {
        // Send data to each connected client
        foreach ($this->clients as $client) {
            $client->send($data);
        }
    }

    public function getClientsByCategoryId($categoryId)
{
    // Retrieve clients with the same category ID
    $clientsWithSameCategory = [];

    // Iterate over the categoryClients array
    foreach ($this->categoryClients as $resourceId => $clientCategory) {
        // Check if the client's category ID matches the given category ID
        if ($clientCategory === $categoryId) {
            // If it matches, add the resource ID to the result array
            $clientsWithSameCategory[] = $resourceId;
        }
    }

    return $clientsWithSameCategory;
}
}
