<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
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

        .order-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .order-details {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 16px;
            margin-right: 20px;
        }

        .delivery-form {
            width: 300px;
            padding: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        h2,
        p {
            margin: 0;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Order Details Page</h1>
    </header>
    <div>
        <button>
            <a href="<?= ROOT ?>/product">Product</a>
        </button>
    </div>

    <div class="order-container">
        <div class="order-details">
            <h2>Order Summary</h2>
            <p>Start Date: <span id="startDateDisplay"><?=$reservation_details['startDate']?></span></p>
            <p>End Date: <span id="endDateDisplay"><?=$reservation_details['endDate']?></span></p>
            <p>Total Cost: <span id="totalCostDisplay"></span></p>
            <p>Quantity: <span id="quantityDisplay"><?=$reservation_details['quantity']?></span></p>
        </div>

        <div class="delivery-form">
            <h2>Delivery Information</h2>
            <form id="deliveryForm" method="post" action="<?= ROOT ?>/reservation/equipment">
                <input type="hidden" id="startDate" name="startDate" value="<?= esc($reservation_details['startDate']); ?>">
                <input type="hidden" id="endDate" name="endDate" value="<?= esc($reservation_details['endDate']); ?>">
                <input type="hidden" id="quantity" name="quantity" value="<?= esc($reservation_details['quantity']); ?>">
                <input type="hidden" id="equipmentTypeId" name="equipmentTypeId" value="<?= esc($reservation_details['equipmentTypeId']); ?>">

                <label for="deliveryType">Delivery Type:</label>
                <select id="deliveryType" name="deliveryType" required>
                    <option value="standard">Pickup</option>
                    <option value="express">Delivery</option>
                </select>

                <label for="deliveryAddress">Delivery Address:</label>
                <input type="text" id="deliveryAddress" name="deliveryAddress" >

                <label for="additionalDetails">Additional Details:</label>
                <textarea id="additionalDetails" name="additionalDetails"></textarea>

                <button type="submit">Place Order</button>
            </form>
        </div>
    </div>


</body>

</html>