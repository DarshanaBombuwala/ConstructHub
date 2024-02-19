<?php

/*use PDO;
use PDOException;
use MyApp\Reservation;

// Include the file where Reservation class is defined

try {
    // Establish a connection to the database
    $pdo = new PDO('mysql:unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock;dbname=constructhub_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the database successfully!";
} catch (PDOException $e) {
    // Handle database connection error
    echo "Error connecting to the database: " . $e->getMessage();
    exit; // Exit the script if there's a database connection error
}

// Create WebSocket server connection
$wsConnection = new Reservation();

// Start monitoring database updates
monitorDatabaseUpdates($pdo, $wsConnection);

// Function to monitor updates in the SQL table and send data to WebSocket clients
function monitorDatabaseUpdates(PDO $pdo, Reservation $wsConnection) {
    while (true) {
        try {
            // Query the SQL table for updates
            $stmt = $pdo->query('SELECT * FROM equipmentReservation');
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Convert data to JSON format
            $jsonData = json_encode($data);

            // Send data to WebSocket server
            $wsConnection->sendDataToAllClients($jsonData);

            // Wait for a short interval before checking for updates again
            sleep(1); // Adjust as needed
        } catch (PDOException $e) {
            // Handle database query error
            echo "Error querying the database: " . $e->getMessage();
            // You might want to implement a retry mechanism or other error handling strategy here
        } catch (Exception $e) {
            // Handle other exceptions
            echo "An error occurred: " . $e->getMessage();
            // Implement appropriate error handling strategy
        }
    }
}




