<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/dashboards-sidemenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Hello</title>
</head>

<body>
    <div>
        <?php
        $current = "EquipmentCategory";
        ?>
        <?php require_once '../App/components/dashboard-sidemenu.php' ?>
    </div>
    <div id='main'>
    <div class="form-container">
        <h2>Add Equipment</h2>
        <form action="<?=ROOT?>/rentalmanager/category/create" method="post">
            <!-- Equipment Category Name -->
            <label for="categoryName">Category Name:</label>
            <input type="text" id="categoryName" name="categoryName" required>

            <!-- Availability -->
            <label for="availability">Availability:</label>
            <select id="availability" name="availability" required>
                <option value="available">Available</option>
                <option value="not_available">Not Available</option>
                <option value="not_available">Disable</option>
            </select>

            <!-- Add any other fields you need for your form -->

            <!-- Submit Button -->
            <button type="submit">Add Equipment</button>
        </form>
    </div>
</div>

</body>

</html>