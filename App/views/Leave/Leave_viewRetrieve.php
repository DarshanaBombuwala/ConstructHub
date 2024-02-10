<!-- 
    Array ( [0] => Array ( [requested_date] => 2023-06-19 [reason] => I have a cold ) 
        [1] => Array ( [requested_date] => 2023-09-07 [reason] => I'm running out of reasons ) 
        ) 
-->
<!DOCTYPE html>
<html>
<head>
    <title>Open PHP File on Button Click</title>
    <style>
    .selected {
        background-color: lightblue; /* Change the background color for selected rows */
        font-weight: bold; /* Add bold font for selected rows */
    }
    </style>
</head>
<body>
    <h1>this is the leave view</h1>
    <table border="1" id="selectableTable">
        <thead>
            <tr>
                <th>Requested Date</th>
                <th>Reason</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($str_data as $item): ?>
                <tr>
                <?php foreach ($item as $x => $val): ?>
                    <td><?php echo "   $val<br>   "; ?></td>
                <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <button type="button" onclick="openPhpFilegoback()">okay</button>
    <script>
        function openPhpFilegoback() {
            window.location.href = "http://localhost/MVC/Public/Leave";
        }
    </script>
    <button type="button" id="edit_btn" onclick="openPhpFileedit()" disabled>edit</button>
    <script>
        function openPhpFileedit() {
            window.location.href = "http://localhost/MVC/Public/Leave/update";
        }
    </script>
    <button type="button" id="dlt_btn" onclick="openPhpFiledelete()" disabled>delete</button>
    <script>
        function openPhpFiledelete() {
            window.location.href = "http://localhost/MVC/Public/Leave/delete";
        }
    </script>

   <script>
    // Get the table and its rows
    const table = document.getElementById('selectableTable');
    const rows = table.querySelectorAll('tbody tr');

    // Add a click event listener to each row
    rows.forEach(row => {
        row.addEventListener('click', () => {
            // Toggle the 'selected' class to visually indicate selection
            rows.forEach(r => r.classList.remove('selected'));

            // Select the clicked row
            row.classList.add('selected');
            document.getElementById("edit_btn").disabled = false;
            document.getElementById("dlt_btn").disabled = false;
            
        });
    });
    </script>
    
</body>
</html>

