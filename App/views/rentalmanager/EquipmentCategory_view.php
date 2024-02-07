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
        <div>
            <!-- Button styled like a link -->
            <a href="<?= ROOT ?>/rentalmanager/category/create" class="button-link">Your Button Text</a>
        </div>
</div>

</body>

</html>