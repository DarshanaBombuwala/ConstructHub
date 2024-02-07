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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Companymanager/companymanagerDashboard.css" />

    <title>AdminHub</title>
  </head>
  <body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="<?=ROOT?>" class="brand">
          <i class="bx bxs-"></i>
          <span class="text">ConstructHub</span>
        </a>
        <ul class="side-menu top">
          <li class="active">
            <a href="index.html">
              <i class="bx bxs-dashboard"></i>
              <span class="text">Dashboard</span>
            </a>
          </li>
          <li>
            <a href='./users.html'>
              <i class="bx bxs-user"></i>
              <span class="text">Users</span>
            </a>
          </li>
          <li>
              <a href='./Listings.html'>
                <i class="bx bxs-wrench"></i>
                <span class="text">Listing</span>
              </a>
            </li>
            <li>
              <a href='./payments.html'>
                <i class="bx bxs-bank"></i>
                <span class="text">Payments</span>
              </a>
            </li>
            <li>
                <a href='./leaveRequests.html'>
                  <i class="bx bxs-user"></i>
                  <span class="text">Leave requests</span>
                </a>
              </li>
              <li>
                <a href='./users.html'>
                  <i class="bx bxs-user"></i>
                  <span class="text">Reviews and Feedbacks</span>
                </a>
              </li>
              <li>
                <a href="<?= ROOT ?>/companymanager/quotations">
                  <i class="bx bxs-message-add"></i>
                  <span class="text">Quotations</span>
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
            <img src="i<?= ROOT ?>/assets/img/services/7790133.jpg" alt="Profile" onclick="toggleMenu()"/>
          </a>
          
          <div class="submenu-wrap" id="subMenu">
            <div class="sub-menu">
              <div class="user-info">
                
                
                <img src="img/people.png">
                <h3>Luwin</h3>
                <hr>
  
                <a href="#" class="sub-menu-link">
                  <i class="bx bxs-edit"></i>
                  <p>Edit Profile</p>
                  <span>></span>
                </a>
  
  
                <a href="#" class="sub-menu-link">
                  <i class="bx bxs-log-out-circle"></i>
                  <p>Logout</p>
                  <span>></span>
                </a>
  
              </div>
              
          </div>
        </div>
        </div>
        
      </nav>
      

      <!-- MAIN -->
      <main>
        <div class="head-title">
          <div class="left">
            <h1>Equipments</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard/EquipmentListing</a>
              </li>
            </ul>
          </div>
          <a href="./addListing.html" class="btn-download">
            <i class='bx bxs-plus-square' ></i>
            <span class="text">Add Listing</span>
          </a>
        </div>

       

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Ongoing Work</h3>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Employee ID</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="img/people.png" />
                    <p>heavy</p>
                  </td>
                  <td>1</td>
                  <td>Reserved</td>
                  <td><a href='./editequipmentlisting.html'><button class="Review user">Details</button></a></td>
        
                </tr>
                <tr>
                    <td>
                      <img src="img/people.png" />
                      <p>pro</p>
                    </td>
                    <td>1</td>
                    <td>Available</td>
                    <td><a href='./editequipmentlisting.html'><button class="Review user">Details</button></a></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="img/people.png" />
                      <p>pro</p>
                    </td>
                    <td>1</td>
                    <td>Available</td>
                    <td><a href='./editequipmentlisting.html'><button class="Review user">Details</button></a></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="img/people.png" />
                      <p>Drill</p>
                    </td>
                    <td>1</td>
                    <td>Available</td>
                    <td><a href='./editequipmentlisting.html'><button class="Review user">Details</button></a></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="img/people.png" />
                      <p>Drill</p>
                    </td>
                    <td>1</td>
                    <td>Available</td>
                    <td><a href='./editequipmentlisting.html'><button class="Review user">Details</button></a></td>
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
    <script>
      let subMenu = document.getElementById("subMenu");

      function toggleMenu() {
        subMenu.classList.toggle("open-menu");
        
      }
    </script>
  </body>
</html>