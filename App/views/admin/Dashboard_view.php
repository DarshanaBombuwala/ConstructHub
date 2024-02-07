<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Boxicons -->
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/c7689b66ad.js" crossorigin="anonymous"></script>
  <!-- My CSS -->
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Admin/adminDashboards.css" />

  <title>AdminDashboard</title>
</head>

<body>
  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="<?= ROOT ?>" class="brand">
      <i class="bx bxs-"></i>
      <span class="text">ConstructHub</span>
    </a>
    <ul class="side-menu top">
      <li class="active">
        <a href="#">
          <i class="bx bxs-dashboard"></i>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="<?= ROOT ?>/admin/users">
          <i class="bx bxs-user"></i>
          <span class="text">Users</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- SIDEBAR -->

  <!-- CONTENT -->
  <section id="content">

    <nav>
      <i class="bx bx-menu"></i>
      <div class='notification-wrapper'>
        <a href="#" class="notification">
          <i class="bx bxs-bell"></i>
          <span class="num">8</span>
        </a>
        <p>
        <div>
          Hi,<?= Auth::getFirstname() ?>
        </div>
        </p>
        <div class="dropdown">
          <a href="#" class="profile">
            <img src="img/people.png" alt="Profile" />
          </a>
          <div class="dropdown-content">
            <div class="dd-menu">
              <div class="dd-top">
                <ul>
                  <li class="signin">
                    <a href="#">Sign in</a>
                  </li>
                  <li class="signup">
                    <span>New Customer?</span>
                    <a href="#">start here.</a>
                  </li>
                </ul>
              </div>
              <div class="dd-option">
                <div class="dd-left">
                  <ul>
                    <li>
                      <i class="fa-solid fa-user"></i>
                    </li>
                    <li>
                      <i class="fa-solid fa-gear"></i>
                    </li>
                    <li>
                      <i class="fa-solid fa-clock-rotate-left"></i>
                    </li>
                    <li>
                      <i class="fa-solid fa-credit-card"></i>
                    </li>
                    <li>
                      <i class="fa-solid fa-clock"></i>
                    </li>
                    <li>
                      <i class="fa-solid fa-right-to-bracket"></i>
                    </li>
                  </ul>
                </div>
                <div class="dd-right">
                  <ul>
                    <li>Profile</li>
                    <li>Dashboard</li>
                    <li>History</li>
                    <li>Payments</li>
                    <li>Ongoing</li>
                    <li>Logout</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </nav>


    <!-- MAIN -->
    <main>
      <div class="head-title">
        <div class="left">
          <h1>Dashboard</h1>
          <ul class="breadcrumb">
            <li>
              <a href="#">Dashboard</a>
            </li>
          </ul>
        </div>
      </div>

      <ul class="box-info">
        <li>
          <i class="bx bxs-user"></i>
          <span class="text">
            <h3>1020</h3>
            <p>Total Users</p>
          </span>
        </li>
        <li>
          <i class="bx bxs-group"></i>
          <span class="text">
            <h3>2834</h3>
            <p>Visitors</p>
          </span>
        </li>
      </ul>

      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Recent Customers</h3>
          </div>
          <table>
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>User Id</th>
                <th>Date Registered</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img src="img/people.png" />
                  <p>John Doe</p>
                </td>
                <td>10</td>
                <td>01-10-2021</td>
                <td><button class="Review user" id="openPopupBtn">Review</button></td>
              </tr>
              <tr>
                <td>
                  <img src="img/people.png" />
                  <p>John Doe</p>
                </td>
                <td>10</td>
                <td>01-10-2021</td>
                <td><button class="Review user" id="openPopupBtn">Review</button></td>
              </tr>
              <tr>
                <td>
                  <img src="img/people.png" />
                  <p>John Doe</p>
                </td>
                <td>10</td>
                <td>01-10-2021</td>
                <td><button class="Review user" id="openPopupBtn">Review</button></td>
              </tr>
              <tr>
                <td>
                  <img src="img/people.png" />
                  <p>John Doe</p>
                </td>
                <td>10</td>
                <td>01-10-2021</td>
                <td><button class="Review user" id="openPopupBtn">Review</button></td>
              </tr>
              <tr>
                <td>
                  <img src="img/people.png" />
                  <p>John Doe</p>
                </td>
                <td>10</td>
                <td>01-10-2021</td>
                <td><button class="Review user" id="openPopupBtn">Review</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div id="popupContainer" class="popup-container">
        <div class="popup-content">
          <span id="closePopupBtn" class="close-popup-btn">&times;</span>
          <h2>Your Popup Content Goes Here</h2>
          <p>This is a simple popup window.</p>
        </div>
      </div>
    </main>
    <!-- MAIN -->
  </section>
  <!-- CONTENT -->
  <script src="<?= ROOT ?>/script.js"></script>
</body>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const openPopupBtn = document.getElementById('openPopupBtn');
    const closePopupBtn = document.getElementById('closePopupBtn');
    const popupContainer = document.getElementById('popupContainer');

    openPopupBtn.addEventListener('click', function() {
      popupContainer.style.display = 'flex';
    });

    closePopupBtn.addEventListener('click', function() {
      popupContainer.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
      if (event.target === popupContainer) {
        popupContainer.style.display = 'none';
      }
    });
  });
</script>

</html>