<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .data-item {
            margin-bottom: 10px;
        }

        .data-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Displaying Data</h2>
        <div class="data-item">
            <span class="data-label">Name:</span>
            <span id="name"><?php echo $data['name']; ?></span>
        </div>
        <div class="data-item">
            <span class="data-label">Email:</span>
            <span id="email"><?php echo $data['email']; ?></span>
        </div>
        <div class="data-item">
            <span class="data-label">Message:</span>
            <span id="message"><?php echo $data['message']; ?></span>
        </div>
    </div>
    <div id="messages"></div>

    <script>
        // Send a message through the WebSocket connection
        const storedWebSocket = sessionStorage.getItem('webSocket');
        const webSocket = storedWebSocket ? JSON.parse(storedWebSocket) : null;

        // Check if the WebSocket object exists and is open
        if (webSocket && webSocket.readyState === WebSocket.OPEN) {
            // You can now use the WebSocket object
            webSocket.send("Message from another file!");
        } else {
            console.error('WebSocket connection not open.');
        }
    </script>
</body>

</html>