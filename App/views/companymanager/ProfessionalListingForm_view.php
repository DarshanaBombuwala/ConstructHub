<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/dashboards-sidemenu.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/rm-eq-listings.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/popup-form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
        }

        .buy-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        .form-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #45a049;
        }
    </style>

    <title>company</title>
</head>

<body>
    <div>
        <?php
        $current = "professionalListing";
        ?>
        <?php require_once '../App/components/dashboard-sidemenu.php' ?>
    </div>

    <div id="main">
        <div class="add-btn">
            <button>
                <span class="btn-text"> Add New </span>
                <span><i class='bx bx-message-square-add'></i></span>
            </button>
        </div>
        <form class="form-container" method="POST" action="<?=ROOT?>/companymanager/listing/professional/add">
            <label class="form-label" for="name">Name:</label>
            <input class="form-input" type="text" id="name" name="name" required>

            <label class="form-label" for="availability">Availability:</label>
            <select class="form-input" id="availability" name="availability" required>
                <option value="available">Available</option>
                <option value="not-available">Not Available</option>
                <!-- Add more options as needed -->
            </select>

            <label class="form-label" for="specialities">Specialities:</label>
            <input class="form-input" type="text" id="specialities" name="specialities" required>

            <label class="form-label" for="description">Description:</label>
            <textarea class="form-textarea" id="description" name="description" rows="4" required></textarea>

            <button class="form-button" type="submit">Submit</button>
        </form>



    </div>
    <script>

    </script>
</body>

</html>