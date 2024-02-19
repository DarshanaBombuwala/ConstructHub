<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            z-index: 1;
            margin-top: 40px;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>

    <nav>
        <div class="dropdown">
            <a href="#">Equipments</a>
            <div class="dropdown-content">
            <a href="<?= ROOT ?>/product/fetchProducts/equipments/all">All</a>
                                <?php foreach ($data['category'] as $item) : ?>
                                    <a href="<?= ROOT ?>/product/fetchProducts/equipments/<?= $item->categoryName ?>"><?= $item->categoryName ?></a>
                                <?php endforeach; ?>
            </div>
        </div>
        <a href="<?= ROOT ?>/product/fetchProducts/professionals">Professionals</a>
        <a href="#heavy-duty-vehicles">Heavy Duty Vehicles</a>
    </nav>

    <!-- Content goes here -->

</body>

</html>
