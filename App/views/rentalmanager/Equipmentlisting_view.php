<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Add new styles for the modal overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .success-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <title>Equipment Listing Form</title>
</head>

<body>
    <div class="container">
        <button onclick="openModal()">Add New Equipment</button>
        <a href="<?=ROOT?>/rentalmanager"><button>Click me</button></a>


        <!-- Modal overlay -->
        <div class="overlay" id="modalOverlay">
            <div class="modal">
                <form id="equipmentsForm" method="post">
                    <h2>Equipment Listing Form</h2>

                    <label for="equipmentType">Equipment Type:</label>
                    <select id="equipmentType" name="equipmentType" required>
                        <option value="excavator">Excavator</option>
                        <option value="bulldozer">Bulldozer</option>
                        <option value="crane">Crane</option>
                        <!-- Add more equipment types as needed -->
                    </select>

                    <label for="equipmentName">Equipment Name:</label>
                    <input type="text" id="equipmentName" name="equipmentName" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>

                    <label for="availability">Availability:</label>
                    <input type="checkbox" id="availability" name="availability" checked> Available

                    <button type="button" onclick="submitListing()">Submit</button>
                </form>
                <button onclick="closeModal()">Close</button>
            </div>
        </div>

        <!-- Listed Equipment Table -->
        <table>
            <thead>
                <tr>
                    <th>Equipment Type</th>
                    <th>Equipment Name</th>
                    <th>Description</th>
                    <th>Availability</th>
                </tr>
            </thead>
            <?php if (!empty($rows)) : ?>
                <tbody>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?= esc($row->equipmentType) ?></td>
                            <td><?= esc($row->equipmentName) ?></td>
                            <td><?= esc($row->description) ?></td>
                            <td><?= esc($row->availability) ?></td>
                            <td>
                                <a href="<?= ROOT ?>/rentalmanager/equipmentlisting/edit/<?= $row->id ?>"><button class="Review user">Edit</button></a>
                            </td>
                            <td>
                                <a href="<?= ROOT ?>/rentalmanager/equipmentlisting/delete/<?= $row->id ?>"><button class="Review user">Delete</button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            <?php endif; ?>
        </table>

        <div class="success-popup" id="successPopup">
            <p>Equipment added successfully!</p>
        </div>
    </div>

    <script>
       const ROOT = "<?= ROOT ?>";

function addRowToTable(newRowDataArray) {
    // Get the table body
    const tbody = document.querySelector('table tbody');

    // Loop through each object in the array
    newRowDataArray.forEach(newRowData => {
        // Create a new table row
        const newRow = document.createElement('tr');

        // Add td elements for each property in the newRowData
        for (const property in newRowData) {
            if (Object.prototype.hasOwnProperty.call(newRowData, property)) {
                const td = document.createElement('td');
                // Access the individual property value and set it as text content
                td.textContent = newRowData[property];
                newRow.appendChild(td);
            }
        }

        // Add Edit and Delete buttons
        const editButton = document.createElement('button');
        editButton.classList.add('Review', 'user');
        editButton.textContent = 'Edit';
        const editLink = document.createElement('a');
        editLink.href = `${ROOT}/rentalmanager/equipmentlisting/edit/${newRowData.id}`;
        editLink.appendChild(editButton);

        const deleteButton = document.createElement('button');
        deleteButton.classList.add('Review', 'user');
        deleteButton.textContent = 'Delete';
        const deleteLink = document.createElement('a');
        deleteLink.href = `${ROOT}/rentalmanager/equipmentlisting/delete/${newRowData.id}`;
        deleteLink.appendChild(deleteButton);

        const editCell = document.createElement('td');
        editCell.appendChild(editLink);

        const deleteCell = document.createElement('td');
        deleteCell.appendChild(deleteLink);

        newRow.appendChild(editCell);
        newRow.appendChild(deleteCell);

        // Append the new row to the table body
        tbody.appendChild(newRow);
    });
}



        function openModal() {
            document.getElementById('modalOverlay').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modalOverlay').style.display = 'none';
        }

        document.getElementById('equipmentsForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            submitListing();
        });

        function displaySuccessPopup() {
            const successPopup = document.getElementById('successPopup');
            successPopup.style.display = 'block';

            // Hide the success popup after a certain duration (e.g., 3 seconds)
            setTimeout(() => {
                successPopup.style.display = 'none';
            }, 3000);
        }

        function submitListing() {
            const form = document.getElementById('equipmentsForm');
            const formData = new FormData(form);


            fetch('<?= ROOT ?>/rentalmanager/equipmentlisting/add', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Success:', data);
                    const newRowData = data;

                    // Call a function to add the new row to the table
                    addRowToTable(newRowData);
                    displaySuccessPopup();
                })
                .catch((error) => {
                    console.error('Error:', error);
                    // Handle errors
                })
                .finally(() => {
                    closeModal(); // Close the modal regardless of success or failure
                });
        }
    </script>
</body>

</html>