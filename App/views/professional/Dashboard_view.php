<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- My CSS -->
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/adminDashboard.css" />

    <title>Professional</title>
  </head>
  <body>
    <!-- SIDEBAR -->
    <section id="sidebar">
      <a href="#" class="brand">
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
            <a href="<?=ROOT?>/professional/leaves">
              <i class="bx bxs-category"></i>
              <span class="text">Leaves</span>
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
        <p><div>
                        Hi,<?= Auth::getFirstname() ?>
                    </div></p>
			  <div class="dropdown">
				<a href="#" class="profile">
				  <img src="img/people.png" alt="Profile" />
				</a>
				<div class="dropdown-content">
				  <a href="#">Item 1</a>
				  <a href="#">Item 2</a>
				  <a href="#">Item 3</a>
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
            <i class="bx bxs-category"></i>
            <span class="text">
              <h3>1020</h3>
              <p>Completed Tasks</p>
            </span>
          </li>
          <li>
            <i class="bx bxs-wrench"></i>
            <span class="text">
              <h3>2834</h3>
              <p>On progress</p>
            </span>
          </li>
        </ul>

        <div class="table-data">
          <div class="order">
            <div class="head">
                <h3>Completed Tasks</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>Duration</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <p>1</p>
                        </td>
                        <td>1</td>
                        <td><a href="./viewequipReserve.html"><button class="Review user">View Details</button></a></td>
                    </tr>
                    <tr>
                        <td>
                        <p>1</p>
                        </td>
                        <td>1</td>
                        <td><a href="./viewequipReserve.html"><button class="Review user">View Details</button></a></td>
                    </tr>
                    <tr>
                        <td>
                        <p>1</p>
                        </td>
                        <td>1</td>
                        <td><a href="./viewequipReserve.html"><button class="Review user">View Details</button></a></td>
                    </tr>
                    <tr>
                        <td>
                        <p>1</p>
                        </td>
                        <td>1</td>
                        <td><a href="./viewequipReserve.html"><button class="Review user">View Details</button></a></td>
                    </tr>
                    <tr>
                        <td>
                        <p>1</p>
                        </td>
                        <td>1</td>
                        <td><a href="./viewequipReserve.html"><button class="Review user">View Details</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
      </main>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="<?=ROOT?>/script.js"></script>
  </body>
</html>
