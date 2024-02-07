<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cards without Image</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .productCard {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .productDetails {
            padding: 16px;
        }

        h2,
        p {
            margin: 0;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            gap: 8px;
        }

        .pagination a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .pagination a:hover {
            background-color: #0056b3;
        }

        .pagination .active {
            background-color: #0056b3;
        }

        .pagination .disabled {
            pointer-events: none;
            background-color: #ddd;
            color: #666;
        }
    </style>
</head>

<body>
    <a href="<?= ROOT ?>">Home</a>
    <div class="tabs">
    <button class="tab-btn" onclick="loadTab('equipments')">Equipments</button>
    <button class="tab-btn" onclick="loadTab('vehicles')">Vehicles</button>
    <button class="tab-btn" onclick="loadTab('professionals')">Professionals</button>
</div>

    <div id="productsContainer">
        <!-- Product cards will be inserted here dynamically using JavaScript -->
    </div>

    <div class="pagination" id="paginationContainer">
        <!-- Pagination links will be inserted here dynamically using JavaScript -->
    </div>

    <script>
        const productsContainer = document.getElementById('productsContainer');
        const paginationContainer = document.getElementById('paginationContainer');
        const productsPerPage = 5;
        let allProducts = [];
        let currentPage = 1;

        function loadAllProducts() {
            fetch(`<?= ROOT ?>/product/fetchProduct`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    allProducts = data;
                    loadProducts(currentPage);
                    displayPagination(Math.ceil(allProducts.length / productsPerPage), currentPage);
                })
                .catch(error => {
                    console.error('Error loading all products:', error);
                });
        }

        function loadProducts(page) {
            const startIndex = (page - 1) * productsPerPage;
            const endIndex = startIndex + productsPerPage;
            const currentProducts = allProducts.slice(startIndex, endIndex);
            displayProducts(currentProducts);
        }

        function displayProducts(products) {
            productsContainer.innerHTML = '';
            products.forEach(product => {
                const productCard = `
                    <a href="<?= ROOT ?>/product/productview/${product.equipmentTypeId}">
                        <div class="productCard">
                            <div class="productDetails">
                                <h2>${product.category}</h2>
                                <p>${product.description}</p>
                                <p>Price: $${product.name}</p>
                            </div>
                        </div>
                    </a>`;
                productsContainer.insertAdjacentHTML('beforeend', productCard);
            });
        }

        function displayPagination(totalPages, currentPage) {
            paginationContainer.innerHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                const pageLink = `<a href="#" data-page="${i}" ${i === currentPage ? 'class="active"' : ''}>${i}</a>`;
                paginationContainer.insertAdjacentHTML('beforeend', pageLink);
            }

            // Add "Previous" arrow
            if (currentPage > 1) {
                const prevArrow = `<a href="#" data-page="${currentPage - 1}">&lt; Previous</a>`;
                paginationContainer.insertAdjacentHTML('afterbegin', prevArrow);
            } else {
                const prevDisabled = `<span class="disabled">&lt; Previous</span>`;
                paginationContainer.insertAdjacentHTML('afterbegin', prevDisabled);
            }

            // Add "Next" arrow
            if (currentPage < totalPages) {
                const nextArrow = `<a href="#" data-page="${currentPage + 1}">Next &gt;</a>`;
                paginationContainer.insertAdjacentHTML('beforeend', nextArrow);
            } else {
                const nextDisabled = `<span class="disabled">Next &gt;</span>`;
                paginationContainer.insertAdjacentHTML('beforeend', nextDisabled);
            }
        }

        paginationContainer.addEventListener('click', function (event) {
            if (event.target.tagName === 'A') {
                event.preventDefault();
                const page = parseInt(event.target.dataset.page, 10);
                loadProducts(page);
                currentPage = page;
                displayPagination(Math.ceil(allProducts.length / productsPerPage), currentPage);
            }
        });

        // Initial load of all products
        loadAllProducts();
    </script>
</body>

</html>


