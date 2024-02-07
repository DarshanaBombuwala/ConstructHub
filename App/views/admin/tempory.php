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

    <title>Users</title>
  </head>
  <body>
    <!-- SIDEBAR -->
    <section id="sidebar">
      <a href="<?=ROOT?>" class="brand">
        <i class="bx bxs-screw"></i>
        <span class="text">ConstructHub</span>
      </a>
      <ul class="side-menu top">
        <li class="active">
          <a href="<?=ROOT?>/admin/dashboard">
            <i class="bx bxs-dashboard"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
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
			  <p>Tony Stark</p>
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
      <?php if ($action == 'add') : ?>
    <?php elseif ($action == 'edit') : ?>
        <?php else : ?>
      <main>
        <div class="head-title">
          <div class="left">
            <h1>Users</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard/Users</a>
              </li>
            </ul>
          </div>
          <a href="#" class="btn-download">
            <i class='bx bxs-plus-square' ></i>
            <span class="text">Add User</span>
          </a>
        </div>

       

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>All Users</h3>
            </div>
            <table>
              <thead>
                <tr>
                  <th>User Name</th>
                  <th>User ID</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="img/people.png" />
                    <p>John Doe</p>
                  </td>
                  <td>1</td>
                  <td>User</td>
                  <td><a href='./edit.html'><button class="Review user">Edit</button></a></td>
                  <td><button class="Review user">Remove</button></td>
                </tr>
                <tr>
                  <td>
                    <img src="img/people.png" />
                    <p>John Doe</p>
                  </td>
                  <td>2</td>
                  <td>Admin</td>
                  <td><button class="Review user">Edit</button></td>
                  <td><button class="Review user">Remove</button></td>
                </tr>
                <tr>
                  <td>
                    <img src="img/people.png" />
                    <p>John Doe</p>
                  </td>
                  <td>3</td>
                  <td>Professional</td>
                  <td><button class="Review user">Edit</button></td>
                  <td><button class="Review user">Remove</button></td>
                </tr>
                <tr>
                  <td>
                    <img src="img/people.png" />
                    <p>John Doe</p>
                  </td>
                  <td>4</td>
                  <td>User</td>
                  <td><button class="Review user">Edit</button></td>
                  <td><button class="Review user">Remove</button></td>
                </tr>
                <tr>
                  <td>
                    <img src="img/people.png" />
                    <p>John Doe</p>
                  </td>
                  <td>5</td>
                  <td>Manager</td>
                  <td><button class="Review user">Edit</button></td>
                  <td><button class="Review user">Remove</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
      <?php endif; ?>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="script.js"></script>
  </body>
</html>
