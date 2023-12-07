<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/usersStyle.css" />

    <title>Users</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="<?= ROOT ?>" class="brand">
            <i class="bx bxs-screw"></i>
            <span class="text">ConstructHub</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="<?= ROOT ?>/admin/dashboard">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
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
        <?php if ($action == 'add') : ?>
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Users</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Users/Add</a>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Add User</h3>
                            <a href="<?= ROOT ?>/admin/users">
                                <button class="cancelbtn">Cancel</button>
                            </a>
                        </div>
                        <div class="container">
                            <form method="post">

                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input value="<?= set_value('firstname') ?>" type="text" id="firstname" name="firstname" placeholder="Firstname">
                                    <?php if (!empty($errors['firstname'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['firstname'] ?></small>
                                    <?php endif; ?>

                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input value="<?= set_value('lastname') ?>" type="text" id="lastname" name="lastname" placeholder="Lastname">
                                    <?php if (!empty($errors['lastname'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['lastname'] ?></small>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="<?= set_value('email') ?>" type="text" id="email" name="email" placeholder="Email">
                                    <?php if (!empty($errors['email'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['email'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input value="<?= set_value('role') ?>" type="text" id="role" name="role" placeholder="Role">
                                    <?php if (!empty($errors['role'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['role'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input value="<?= set_value('password') ?>" type="text" id="password" name="password" placeholder="password">
                                    <?php if (!empty($errors['password'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['password'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <button type="submit">Add User</button>
                            </form>
                        </div>


                    </div>
                </div>
            </main>
        <?php elseif ($action == 'edit') : ?>
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Users</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Users/Edit</a>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Edit User Details</h3>
                            <a href="<?= ROOT ?>/admin/users">
                                <button class="cancelbtn">Cancel</button>
                            </a>
                        </div>
                        <?php if (!empty($row)) : ?>
                            <div class="container">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" id="firstname" name="firstname" value="<?= set_value('firstname', $row->firstname) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label> 
                                        <input type="text" id="lastname" name="lastname" value="<?= set_value('lastname', $row->lastname) ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" value="<?= set_value('email', $row->email) ?>">
                                    </div>

                                    <button type="submit">Save Changes</button>
                                </form>
                            </div>

                    </div>
                <?php else : ?>
                    <div class="container">No Data</div>
                <?php endif; ?>


                </div>
                </div>
            </main>



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
                    <a href="<?= ROOT ?>/admin/users/add" class="btn-download">
                        <i class='bx bxs-plus-square'></i>
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
                                    <th>User ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <?php if (!empty($rows)) : ?>
                                <tbody id="userList">
                                    <?php foreach ($rows as $row) : ?>
                                        <tr>
                                            <td><?= esc($row->id) ?></td>
                                            <td><?= esc($row->firstname) ?></td>
                                            <td><?= esc($row->lastname) ?></td>
                                            <td><?= esc($row->role) ?></td>
                                            <td>
                                                <a href="<?= ROOT ?>/admin/users/edit/<?= $row->id ?>"><button class="Review user">Edit</button></a>
                                            </td>
                                            <td>
                                                <a href="<?= ROOT ?>/admin/users/delete/<?= $row->id ?>"><button class="Review user">Delete</button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                                    
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </main>
        <?php endif; ?>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="<?=ROOT?>/script.js"></script>
</body>

</html>