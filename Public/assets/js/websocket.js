// WebSocket connection
const webSocket = new WebSocket('ws://localhost:8080'); // Change URL to your WebSocket server

// Event handler for when the connection is opened
webSocket.onopen = function(event) {
    console.log('WebSocket connection opened.');
    webSocket.send("client connected");
    
};

// Event handler for when a message is received from the server
webSocket.onmessage = function(event) {
    console.log('here');
    const messagesDiv = document.getElementById('messages');
    const data = JSON.parse(event.data); // Parse JSON data
    const message = data.message; // Access the 'message' property
    
    messagesDiv.innerHTML += '<p>' + message + '</p>'; // Display the message
    
    // Log the received message to the console
    console.log('Received message:', message);
};

// Event handler for errors
webSocket.onerror = function(event) {
    console.error('WebSocket error:', event);
};

// Event handler for when the connection is closed
/*webSocket.onclose = function(event) {
    console.log('WebSocket connection closed:', event.code, event.reason);
};*/

// Store the WebSocket object in sessionStorage or localStorage
 //sessionStorage.setItem('webSocket', JSON.stringify(webSocket));
