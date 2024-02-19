<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>
    <style>
        /* Styles for product cards */
        .product {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }
        .product h2 {
            margin-top: 0;
        }
        .pagination {
            margin-top: 20px;
        }
        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
        }
        .pagination a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Product View</h1>

    <?php
    // Sample array of products
   

    // Number of products per page
    $productsPerPage = 5;

    // Get total number of products
    $totalProducts = count($data['rows']);

    // Calculate total number of pages
    $totalPages = ceil($totalProducts / $productsPerPage);

    // Get current page number
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate start and end indices for products on the current page
    $startIndex = ($page - 1) * $productsPerPage;
    $endIndex = min($startIndex + $productsPerPage, $totalProducts);

    // Retrieve products for the current page
    $currentProducts = array_slice($data['rows'], $startIndex, $productsPerPage);
    $type = rtrim($data['type'], 's');
    // Display products for the current page
    foreach ($currentProducts as $product) {
       
        echo '<a href="' . ROOT . '/product/productview/'.$data['type'].'/' . $product->{$type.'TypeId'} . '">';
        echo '<div class="product">';
        echo '<h2>' . $product->name . '</h2>';
        echo '<p>Category: ' . $product->category . '</p>';
        echo '<p>Description: ' . $product->description . '</p>';
        echo '<p>Price: $' . $product->price . '</p>';
        echo '</div>';
        echo '</a>';
    }

    // Display pagination links
    echo '<div class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }
    echo '</div>';
    ?>

</div>

</body>
</html>
