<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket Client</title>
</head>
<body>
    <h1>WebSocket Client</h1>
    <div id="messages"></div>

    <!-- Form with three input fields -->
    <form id="messageForm" method="post" action="<?=ROOT?>/product/webs/form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea><br><br>
        <button type="submit">Send Message</button>
    </form>

    <script src="<?=ROOT?>/assets/js/websocket.js"></script>
    <script>
        // Send a message through the WebSocket connection
        if (webSocket && webSocket.readyState === WebSocket.OPEN) {
            console.log('her here');
            webSocket.send("Client connected!");
        } else {
            console.error('WebSocket connection not open.');
        }
    </script>
</body>
</html>


