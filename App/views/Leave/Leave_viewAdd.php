<h1>leave add</h1>

<!DOCTYPE html>
<html>
<head>
    <title>Leave Request Form</title>
</head>
<body>
    <h1>Leave Request Form</h1>
    
    <form action="http://localhost/MVC/Public/Leave/add" method="POST">
        <label for="emp_id">Employee ID:</label>
        <input type="text" id="emp_id" name="emp_id" required><br><br>
        
        <label for="requested_date">Requested Date:</label>
        <input type="date" id="requested_date" name="requested_date" required><br><br>
        
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>
        
        <label for="reason">Reason for Leave:</label><br>
        <textarea id="reason" name="reason" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <button type="button" onclick="openPhpFilegoback()">cancel</button>
    <script>
        function openPhpFilegoback() {
            window.location.href = "http://localhost/MVC/Public/Leave";
        }
    </script>


</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Leave Request Form</title>
</head>
<body>
    <h1>Leave Request Form</h1>

    <button type="button" onclick="showPrompt()">Enter Leave Request</button>

    
    <script>
        function showPrompt() {
            // Prompt the user for employee information
            const emp_id = prompt("Enter Employee ID:");
            const requested_date = prompt("Enter Requested Date (YYYY-MM-DD):");
            const first_name = prompt("Enter First Name:");
            const last_name = prompt("Enter Last Name:");
            const reason = prompt("Enter Reason for Leave:");

            // Check if the user canceled the prompt
            if (emp_id === null || requested_date === null || first_name === null || last_name === null || reason === null) {
                alert("Leave request canceled.");
                return;
            }

            // Create a form and auto-submit it with the collected data
            const form = document.createElement("form");
            form.method = "post";
            form.action = "http://localhost/MVC/Public/Leave/add";

            // Create hidden input fields for each piece of data
            const hiddenFields = [
                { name: "emp_id", value: emp_id },
                { name: "requested_date", value: requested_date },
                { name: "first_name", value: first_name },
                { name: "last_name", value: last_name },
                { name: "reason", value: reason },
            ];

            hiddenFields.forEach((field) => {
                const input = document.createElement("input");
                input.type = "hidden";
                input.name = field.name;
                input.value = field.value;
                form.appendChild(input);
            });

            // Append the form to the body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html> -->
