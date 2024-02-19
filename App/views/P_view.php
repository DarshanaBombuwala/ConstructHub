<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Product Card/Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/pstyle.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/requestquotation.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <style>
    .flatpickr-calendar {
      background: white;
      border: 1px solid #ddd;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .flatpickr-day.today {
      background-color: yellow;
    }

    .flatpickr-day.today:hover {
      background-color: green;
    }


    .flatpickr-disabled {
      color: black !important;
      cursor: not-allowed !important;
      background-color: red !important;
    }
  </style>
</head>

<body>
  <div class="backdrop" id="backdrop"></div>
  <div class="card-wrapper">
    <div class="card">
      <!-- card left -->
      <div class="product-imgs">
        <div class="img-display">
          <div class="img-showcase">
            <img src="shoes_images/shoe_1.jpg" alt="shoe image">
            <img src="shoes_images/shoe_2.jpg" alt="shoe image">
            <img src="shoes_images/shoe_3.jpg" alt="shoe image">
            <img src="shoes_images/shoe_4.jpg" alt="shoe image">
          </div>
        </div>
        <div class="img-select">
          <div class="img-item">
            <a href="#" data-id="1">
              <img src="shoes_images/shoe_1.jpg" alt="shoe image">
            </a>
          </div>
          <div class="img-item">
            <a href="#" data-id="2">
              <img src="shoes_images/shoe_2.jpg" alt="shoe image">
            </a>
          </div>
          <div class="img-item">
            <a href="#" data-id="3">
              <img src="shoes_images/shoe_3.jpg" alt="shoe image">
            </a>
          </div>
          <div class="img-item">
            <a href="#" data-id="4">
              <img src="shoes_images/shoe_4.jpg" alt="shoe image">
            </a>
          </div>
        </div>
      </div>
      <!-- card right -->
      <div class="product-content">
        <h2 class="product-title"><?php echo esc($row[0]->name); ?></h2>
        <div class="product-rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <span>4.7(21)</span>
        </div>

        <div class="product-price">
          <p class="new-price">New Price: <span>$249.00 (5%)</span></p>
        </div>

        <div class="product-detail">
          <h2>about this item: </h2>
          <p> <?php echo esc($row[0]->description); ?></p>


        </div>
        <div class="product-detail">
          <h2>Our Specialties </h2>
          <p> <?php echo esc($row[0]->specialities); ?></p>
          <ul>
            <li>Availablity: <span>in stock</span></li>
          </ul>
        </div>



        <div class="basic-info">

          <form>
            <label for="startDate">Start Date:</label>
            <input type="text" id="startDate" name="startDate" placeholder="yyyy-mm-dd 📅" required>

            <label for="endDate">End Date:</label>
            <input type="text" id="endDate" name="endDate" placeholder="yyyy-mm-dd 📅" required>

            <label class="availability-msg" style="display: block; color: red;" for="quantity">
              <span style="color: #ff9100;">Select Start date and End Date</span>
            </label>

            <div class="purchase-info">
              <label for="quantity">Quantity:</label>
              <input type="number" id="quantity" name="quantity" min="1" value="1">
              <button type="submit" class="btn reservation-btn" id='reserveButton' disabled>Reserve</button>
            </div>

            <!--<button type = "button" class = "btn">
              Add to Cart <i class = "fas fa-shopping-cart"></i>
            </button>
            <button type = "button" class = "btn">
              Request Quotation <i class = "fas fa-shopping-cart"></i>
            </button>-->
          </form>

        </div>
        <div class="purchase-info">
          <?php
          $type = rtrim($data['type'], 's');
          ?>
          <button class="btn reservation-btn" onclick="togglePopup()">
            <a href="<?= ROOT ?>/product/requestQuotation/create/<?php echo esc($data['type'] . '/' . esc($row[0]->{$type . 'TypeId'})); ?>">
              Request Quotation
            </a>
          </button>

          <button class="btn add-to-cart-btn">Add to cart</button>
        </div>


      </div>
    </div>
  </div>


  <script>
var loggedIn = <?php echo Auth::logged_in(); ?>;


</script>
  <script src="<?= ROOT ?>/assets/js/p.js">  </script>
 
</body>

</html>