<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Latest Flatpickr CDN links -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>


    <title>Product View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        .product-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .product-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .product-image {
            height: 200px;
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-details {
            padding: 16px;
        }

        h2,
        p {
            margin: 0;
        }

        .quotation-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            /* Green background color */
            color: white;
            /* White text color */
            text-decoration: none;
            border-radius: 5px;
        }

        .quotation-button:hover {
            background-color: #45a049;
            /* Darker green on hover */
        }

        .flatpickr-disabled {
            color: red;
            /* Adjust other styles for disabled dates */
        }
    </style>
</head>

<body>


    <header>
        <h1>Product View Page</h1>
    </header>
    <div>
        <button>
            <a href="<?= ROOT ?>/product">Product</a>
        </button>
        <a href="your_quotation_page.html" class="quotation-button">Request Quotation</a>
    </div>
    <form method="post" action="<?= ROOT ?>/product/reservationdetails">
        <input type="hidden" id="equipmentTypeId" name="equipmentTypeId" value="<?= esc($row[0]->equipmentTypeId); ?>">
        <div class="product-container">
            <div class="product-card">
                <div class="product-image">
                </div>
                <div class="product-details">
                    <h2><?php echo esc($row[0]->name); ?></h2>
                    <p><?php echo esc($row[0]->description); ?></p>
                    <p>Price: <?= esc($row[0]->equipmentType); ?></p>
                </div>
                <div>
                    <label for="startDate">Start Date:</label>
                    <input type="text" id="startDate" name="startDate" required>

                    <label for="endDate">End Date:</label>
                    <input type="text" id="endDate" name="endDate" required>

                    <label for="quantity">Quantity:</label>
                    <div>
                        <button type="button" id="decreaseQuantity">-</button>
                        <input type="text" id="quantity" name="quantity" value="1" min="1" readonly>
                        <button type="button" id="increaseQuantity">+</button>
                    </div>
                </div>
                <div id="reservedDatesContainer"></div>
                <button type="submit" id="submit">Submit</button>
            </div>
        </div>
    </form>


    <script>
     document.addEventListener('DOMContentLoaded', function () {
    let startDatePicker;
    let endDatePicker;
    let startDateSelected = false;
    let endDateSelected = false;
    let minAvailableNumber; // Variable to store the minimum available number
    let reservedData; // Global variable to store reserved data

    // Fetch reserved dates from the server
    fetch('<?= ROOT ?>/product/reservedDays') // Adjust the endpoint accordingly
        .then(response => response.json())
        .then(data => {
            reservedData = data; // Set reservedData as a global variable
            const expectedCount = reservedData.expectedCount || 0;
            for (const dateStr in reservedData) {
                if (dateStr !== 'expectedCount' && reservedData[dateStr] === undefined) {
                    reservedData[dateStr] = expectedCount;
                }
            }

            startDatePicker = flatpickr("#startDate", {
                dateFormat: "Y-m-d",
                minDate: "today",
                disable: getDisabledDates(reservedData),
                onChange: function (selectedDates, dateStr, instance) {
                    startDateSelected = true;
                    endDatePicker.set("minDate", dateStr);
                    endDatePicker.enable();
                    updateAvailabilityMessage();
                }
            });

            endDatePicker = flatpickr("#endDate", {
                dateFormat: "Y-m-d",
                disable: getDisabledDates(reservedData),
                onChange: function (selectedDates, dateStr, instance) {
                    endDateSelected = true;
                    if (startDateSelected) {
                        const start = startDatePicker.selectedDates[0];
                        const end = endDatePicker.selectedDates[0];

                        if (end < start) {
                            alert("End date cannot be before the start date. Please choose valid dates.");
                            endDatePicker.setDate(start);
                            return;
                        }

                        const disabledDates = getDisabledDatesBetween(start, end, reservedData);

                        if (disabledDates.length > 0) {
                            // Some dates between the selected start and end dates are disabled
                            alert("Some dates between the selected start and end dates are disabled. Please choose valid dates.");

                            // Clear the end date
                            endDatePicker.clear();
                            return;
                        }
                    }
                    updateAvailabilityMessage();
                }
            });
            endDatePicker.disable();
        })
        .catch(error => {
            console.error('Error fetching reserved dates:', error);
        });

    function updateAvailabilityMessage() {
        const start = startDatePicker.selectedDates[0];
        const end = endDatePicker.selectedDates[0];

        if (start && end) {
            if (start.getTime() === end.getTime() && reservedData[start.toISOString().split('T')[0]] !== 0) {
                minAvailableNumber = reservedData[start.toISOString().split('T')[0]]; // Set minAvailableNumber
            } else {
                const availableNumbers = getAvailableNumbersBetweenDates(start, end);
                minAvailableNumber = Math.min(...availableNumbers);
            }

            const productContainer = document.querySelector('.product-container');
            const messageElement = document.createElement('p');
            messageElement.textContent = `Available Equipments: ${minAvailableNumber}`;

            const existingMessageElement = productContainer.querySelector('.available-equipment-message');
            if (existingMessageElement) {
                productContainer.removeChild(existingMessageElement);
            }

            messageElement.classList.add('available-equipment-message');
            productContainer.appendChild(messageElement);

            updateQuantityInput(minAvailableNumber);
        }
    }

    function getDisabledDates() {
        const disabledDates = [];

        for (const [date, count] of Object.entries(reservedData)) {
            if (count === 0 && date !== 'expectedCount') {
                disabledDates.push(date);
            }
        }

        return disabledDates;
    }

    function getDisabledDatesBetween(startDate, endDate) {
        const disabledDates = [];

        const currentDate = new Date(startDate);

        while (currentDate <= endDate) {
            const dateStr = currentDate.toISOString().split('T')[0];
            if (reservedData[dateStr] === 0) {
                disabledDates.push(dateStr);
            }
            currentDate.setDate(currentDate.getDate() + 1);
        }

        return disabledDates;
    }

    function getAvailableNumbersBetweenDates(startDate, endDate) {
        const availableNumbers = [];
        const currentDate = new Date(startDate);

        while (currentDate <= endDate) {
            const dateStr = currentDate.toISOString().split('T')[0];
            const count = reservedData[dateStr] !== undefined ? reservedData[dateStr] : reservedData.expectedCount || 0;
            availableNumbers.push(count);
            currentDate.setDate(currentDate.getDate() + 1);
        }

        return availableNumbers;
    }

    function updateQuantityInput(value) {
        const quantityInput = document.getElementById('quantity');
        quantityInput.value = value;
        quantityInput.max = value;
    }
});













        /*function sendDatesToServer(startDate, endDate, quantity) {
            const apiUrl = '<?= ROOT ?>/product/reservationdetails'; // Replace with your actual API endpoint

            fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        startDate: startDate,
                        endDate: endDate,
                        quantity: quantity
                    })
                })
                .then(response => {
                    // Check if the request was successful (status code in the range 200-299)
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    // No need to parse the response body if you don't need the data
                    // Do any other handling you need here
                })
                .catch(error => {
                    console.error('Error sending request:', error);
                });
        }*/

        document.addEventListener('DOMContentLoaded', function() {
    // Get the quantity input and buttons
    const quantityInput = document.getElementById('quantity');
    const increaseQuantityBtn = document.getElementById('increaseQuantity');
    const decreaseQuantityBtn = document.getElementById('decreaseQuantity');

    // Set initial value to 1
    quantityInput.value = 1;

    // Event listener for increasing quantity
    increaseQuantityBtn.addEventListener('click', function() {
        const currentQuantity = parseInt(quantityInput.value, 10);
        const maxAvailableCount = parseInt(quantityInput.max, 10);

        // Check if the new value is less than or equal to the maximum available count
        if (currentQuantity < maxAvailableCount) {
            quantityInput.value = currentQuantity + 1;
        }
    });

    // Event listener for decreasing quantity (with minimum value set to 1)
    decreaseQuantityBtn.addEventListener('click', function() {
        const currentQuantity = parseInt(quantityInput.value, 10);

        // Check if the new value is greater than the minimum value (1)
        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    });
});


    </script>
</body>

</html>