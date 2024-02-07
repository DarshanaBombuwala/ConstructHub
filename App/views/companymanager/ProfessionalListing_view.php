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
    </style>

    <title>company</title>
</head>

<body>
<div>
        <?php
        $current = "professionalListing";
        ?>
    <?php require_once '../App/components/dashboard-sidemenu.php'?> 
    </div>
   
    <div id="main">
    <div class="add-btn">
    <a href="<?=ROOT?>/companymanager/listing/professional/add">
        <button>
            <span class="btn-text"> Add New </span>
            <span><i class='bx bx-message-square-add'></i></span>
        </button>
    </a>
</div>

        <div class="product-card">
            <div class="product-info">
                <div class="product-title">Product Name</div>
                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                <div class="product-price">$19.99</div>
                <a href="#" class="buy-button">Buy Now</a>
            </div>
        </div>

       
    </div>
   
    <script>
    </script>
</body>

</html>