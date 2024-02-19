<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table with Action Buttons and File Upload</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .edit-btn,
        .delete-btn,
        .view-btn,
        .pdf-btn,
        .upload-pdf-btn {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .view-btn,
        .pdf-btn,
        .upload-pdf-btn {
            background-color: #337ab7;
            color: white;
        }
    </style>
</head>

<body>

    <h2>Dynamic Table with Action Buttons and File Upload</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Estimation</th>
                <th>Category</th>
                <th>Profession</th>
                <th>Date</th>
                <th>Status</th>
                <th>Upload Quotation (PDF)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['quotation'] as $quotation) : ?>
                <tr>
                    <td><?php echo $quotation->id; ?></td>
                    <td><?php echo $quotation->description; ?></td>
                    <td><?php echo $quotation->estimation; ?></td>
                    <td><?php echo $quotation->categoryname; ?></td>
                    <td><?php echo $quotation->profession; ?></td>
                    <td><?php echo $quotation->date; ?></td>
                    <td><?php echo $quotation->status; ?></td>
                    <td>
                        <input type="file" name="quotation_file" accept=".pdf" style="display: none;">
                        <button class="upload-pdf-btn" data-id="<?php echo $quotation->id; ?>">Upload</button>
                        <button class="edit-btn" data-id="<?php echo $quotation->id; ?>">Edit</button>
                        <button class="delete-btn" data-id="<?php echo $quotation->id; ?>">Delete</button>
                        <button class="view-btn" data-id="<?php echo $quotation->id; ?>">View</button>
                    </td>
                    <td class="action-buttons">

                        <button class="delete-btn" data-id="<?php echo $quotation->id; ?>">Delete</button>
                        <button class="view-btn" data-id="<?php echo $quotation->id; ?>">View</button>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const viewButtons = document.querySelectorAll('.view-btn');
            const pdfButtons = document.querySelectorAll('.pdf-btn');
            const uploadPdfButtons = document.querySelectorAll('.upload-pdf-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const quotationId = this.getAttribute('data-id');
                    deleteRecord(quotationId);
                });
            });

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const quotationId = this.getAttribute('data-id');
                    viewRecord(quotationId);
                });
            });

            pdfButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const quotationId = this.getAttribute('data-id');
                    viewPDF(quotationId);
                });
            });

            uploadPdfButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const quotationId = this.getAttribute('data-id');
                    const fileInput = this.previousElementSibling;
                    fileInput.click(); // Programmatically click on the file input
                    fileInput.addEventListener('change', function() {
                        const selectedFile = fileInput.files[0];
                        uploadPDF(quotationId, selectedFile);
                    });
                });
            });
        });

        function deleteRecord(quotationId) {
            axios.post('backend.php', {
                    action: 'delete_record',
                    quotation_id: quotationId
                })
                .then(response => {
                    if (response.data.success) {
                        alert('Record deleted successfully');
                        // Refresh or update the table as needed
                    } else {
                        alert('Error deleting record');
                    }
                })
                .catch(error => {
                    console.error('Error deleting record:', error);
                    alert('Error deleting record');
                });
        }

        function viewRecord(quotationId) {
            // Implement logic to view the entire record, such as opening it in a new page
            // You can handle this based on your requirements
        }

        function viewPDF(quotationId) {
            // Implement logic to view the PDF file, such as opening it in a new tab or downloading
            // You can handle this based on your requirements
        }

        function uploadPDF(quotationId, file) {
            // Implement logic to upload the PDF file associated with the quotation ID
            // You can handle this based on your requirements
            // Here you can use FormData to send the file to the backend via axios
        }
    </script>
</body>

</html>
