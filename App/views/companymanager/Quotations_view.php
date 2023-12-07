<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- My CSS -->
    <<link rel="stylesheet" href="<?= ROOT ?>/assets/css/Companymanager/companymanagerDashboard.css" />

    <title>CompanyManager</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="<?=ROOT?>" class="brand">
            <i class="bx bxs-"></i>
            <span class="text">ConstructHub</span>
        </a>
        <ul class="side-menu top">
            <li>
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
            <li class="active">
                <a href='#'>
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
                <a href="#" class="profile">
                    <img src="img/people.png" alt="Profile" onclick="toggleMenu()" />
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

        </nav>


        <!-- MAIN -->
        <?php if ($action == 'add') : ?>
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Quotations</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Quotations/Create</a>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Create Quotation</h3>
                            <a href="<?= ROOT ?>/companymanager/quotations">
                                <button class="cancelbtn">Cancel</button>
                            </a>
                        </div>

                        <div class="container">
                            <form method='post'>

                                <div class="form-group">
                                    <label for="categoryname">Category Name</label>
                                    <input value="<?= set_value('categoryname') ?>" type="text" id="categoryname" name="categoryname" placeholder="Category">
                                    <?php if (!empty($errors['categoryname'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['categoryname'] ?></small>
                                    <?php endif; ?>
                                </div>
                                          
                                <div class="form-group">
                                    <label for="profession">Profession Name</label>
                                    <input value="<?= set_value('profession') ?>" type="text" id="profession" name="profession" placeholder="Sub profession">
                                    <?php if (!empty($errors['profession'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['profession'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Description</label>
                                    <textarea  id="description" name="description" rows="4" cols="50" placeholder="Description"><?= set_value('description') ?></textarea>
                                    <?php if (!empty($errors['description'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['description'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="rental">Estimated Price</label>
                                    <input value="<?= set_value('estimation') ?>" type="text" id="estimation" name="estimation" placeholder="Estimated Price">
                                    <?php if (!empty($errors['estimation'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['estimation'] ?></small>
                                    <?php endif; ?>
                                </div>



                                <button type="submit">Submit Quotation</button>
                            </form>
                        </div>


                    </div>
                </div>
            </main>
        <?php elseif ($action == 'edit') : ?>
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Quotations</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Quotations/Create</a>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Create Quotation</h3>
                            <a href="<?= ROOT ?>/companymanager/quotations">
                                <button class="cancelbtn">Cancel</button>
                            </a>
                        </div>

                        <div class="container">
                            <form method='post'>

                                <div class="form-group">
                                    <label for="categoryname">Category Name</label>
                                    <input value="<?= set_value('categoryname', $row->categoryname) ?>" type="text" id="categoryname" name="categoryname">

                                </div>
                                          
                                <div class="form-group">
                                    <label for="profession">Profession Name</label>
                                    <input value="<?= set_value('profession', $row->profession) ?>" type="text" id="profession" name="profession">

                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" rows="4" cols="50"><?= set_value('description', $row->description) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="estimation">Estimated Price</label>
                                    <input value="<?= set_value('estimation', $row->estimation) ?>" type="text" id="estimation" name="estimation">

                                </div>



                                <button type="submit">Submit Quotation</button>
                            </form>
                        </div>


                    </div>
                </div>
            </main>

        <?php else : ?>
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Quotations</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Quotations</a>
                            </li>
                        </ul>
                    </div>
                    <a href="<?= ROOT ?>/companymanager/quotations/add" class="btn-download">
                        <i class='bx bxs-timer'></i>
                        <span class="text">Create Quotation</span>
                    </a>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Quotation</h3>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Quotation ID</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Profession</th>
                                    <th>Description</th>
                                    <th>Estimation</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($rows)) : ?>
                            <tbody id="userList">
                                <?php foreach ($rows as $row) : ?>
                                    <tr>
                                        <td><?= esc($row->id) ?></td>
                                        <td><?= esc($row->date) ?></td>
                                        <td><?= esc($row->categoryname) ?></td>
                                        <td><?= esc($row->profession) ?></td>
                                        <td><?= esc($row->description) ?></td>
                                        <td><?= esc($row->estimation) ?></td>
                                        <td>
                                            <a href="<?= ROOT ?>/companymanager/quotations/edit/<?= $row->id ?>"><button class="Review user">Edit</button></a>
                                        </td>
                                        <td>
                                            <a href="<?= ROOT ?>/companymanager/quotations/delete/<?= $row->id ?>"><button class="Review user">Delete</button></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        <?php endif; ?>

                        </tbody>
                        </table>
                    </div>
                </div>
            </main>
        <?php endif; ?>
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