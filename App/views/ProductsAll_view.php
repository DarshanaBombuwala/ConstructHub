<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>
    <style>
        /* Custom CSS for product view */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .product:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product img {
            width: 100%;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .product .product-info {
            padding: 10px;
        }
        .product h5 {
            margin: 0;
            font-size: 18px;
        }
        .product p {
            margin: 5px 0;
            font-size: 14px;
        }
        .pagination {
            text-align: center;
        }
        .pagination button {
            margin: 5px;
            padding: 5px 10px;
            border: 1px solid #007bff;
            background-color: #007bff;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .pagination button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product View</h1>
        <div id="product-list" class="product-list">
            <!-- Product items will be dynamically inserted here -->
        </div>
        <div id="pagination" class="pagination">
            <!-- Pagination buttons will be dynamically inserted here -->
        </div>
    </div>

    <!-- Include Axios Library -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Function to display products for a given page
        function displayProducts(pageNumber, products) {
            // Clear existing products
            document.getElementById('product-list').innerHTML = '';

            // Calculate start and end index for products on the current page
            const startIndex = (pageNumber - 1) * 5;
            const endIndex = Math.min(startIndex + 5, products.length);

            // Iterate through products and create HTML for each product
            for (let i = startIndex; i < endIndex; i++) {
                const product = products[i];
                const productHTML = `
                    <div class="product">
                        <img src="${product.image}" alt="${product.name}">
                        <div class="product-info">
                            <h5>${product.name}</h5>
                            <p>${product.description}</p>
                            <p>Price: $${product.price}</p>
                        </div>
                    </div>
                `;
                // Append product HTML to the product list container
                document.getElementById('product-list').innerHTML += productHTML;
            }
        }

        // Function to display pagination buttons
        function displayPaginationButtons(totalPages) {
            // Clear existing pagination buttons
            document.getElementById('pagination').innerHTML = '';

            // Add pagination buttons
            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.onclick = () => fetchProducts(i);
                document.getElementById('pagination').appendChild(button);
            }
        }

        // Function to fetch products using Axios
        async function fetchProducts(pageNumber = 1) {
            try {
                const response = await axios.get('your-api-endpoint-url');
                const products = response.data;

                // Calculate total number of pages based on number of products
                const totalPages = Math.ceil(products.length / 5);

                // Display products and pagination for the specified page
                displayProducts(pageNumber, products);
                displayPaginationButtons(totalPages);
            } catch (error) {
                console.error('Error fetching products:', error);
            }
        }

        // Call the fetchProducts function when the page loads
        window.onload = fetchProducts;
    </script>
</body>
</html>
