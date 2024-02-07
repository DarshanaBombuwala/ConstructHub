<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/usersStyle.css" />

    <title>AdminHub</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="<?= ROOT ?>" class="brand">
            <i class="bx bxs-"></i>
            <span class="text">ConstructHub</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="<?= ROOT ?>/rentalmanager/dashboard">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href='#'>
                    <i class="bx bxs-wrench"></i>
                    <span class="text">Equipments</span>
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/rentalmanager/equipmentlisting">
                    <i class="bx bxs-wrench"></i>
                    <span class="text">Equipment Listing</span>
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/rentalmanager/extracharges">
                    <i class="bx bxs-category"></i>
                    <span class="text">Extra Charges & Refunds</span>
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/rentalmanager/reservations">
                    <i class="bx bxs-category"></i>
                    <span class="text">Reservations</span>
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


        <?php if ($action == 'add') : ?>
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Equipment Listing</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Equipments/Add</a>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Add Equipment</h3>
                            <a href="<?= ROOT ?>/rentalmanager/equipments">
                                <button class="cancelbtn">Cancel</button>
                            </a>
                        </div>
                        <div class="container">
                            <form method="post">

                                <div class="form-group">
                                    <label for="model">Model</label>
                                    <input value="<?= set_value('model') ?>" type="text" id="model" name="model" placeholder="Model">
                                    <?php if (!empty($errors['model'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['model'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="serialnumber">Serial Number</label>
                                    <input value="<?= set_value('serialnumber') ?>" type="text" id="serialnumber" name="serialnumber" placeholder="Serial Number">
                                    <?php if (!empty($errors['serialnumber'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['serialnumber'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category ID</label>
                                    <input value="<?= set_value('category') ?>" type="text" id="categoryid" name="category" placeholder="Category">
                                    <?php if (!empty($errors['category'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['category'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <button type="submit">Add Equipment</button>
                            </form>
                        </div>


                    </div>
                </div>
            </main>
        <?php elseif ($action == 'edit') : ?>
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Equipments</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Equipments/Edit</a>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Edit Equipment Details</h3>
                            <a href="<?= ROOT ?>/rentalmanager/equipments">
                                <button class="cancelbtn">Cancel</button>
                            </a>
                        </div>
                        <div class="container">
                            <form method='post'>

                                <div class="form-group">
                                    <label for="specialremarks">Special Remarks</label>
                                    <textarea id="specialremarks" name="specialremarks" rows="4" cols="50" value="<?= set_value('specialremarks', $row->specialremarks) ?>">

                        </textarea>
                                </div>


                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" id="status" name="status" value="<?= set_value('status', $row->status) ?>">
                                </div>

                                <button type="submit">Save Changes</button>


                            </form>

                        </div>


                    </div>
                    
                </div>
            </main>
        <?php else : ?>

            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Equipments</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Equipments</a>
                            </li>
                        </ul>
                    </div>
                    <a href="<?= ROOT ?>/rentalmanager/equipments/add" class="btn-download">
                        <i class='bx bxs-plus-square'></i>
                        <span class="text">Add Equipment</span>
                    </a>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>All Equipments</h3>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Model</th>
                                    <th>Equipment ID</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
                                    <th>Special Remarks</th>
                                </tr>
                            </thead>
                            <?php if (!empty($rows)) : ?>
                                <tbody id="userList">
                                    <?php foreach ($rows as $row) : ?>
                                        <tr>
                                            <td><?= esc($row->category) ?></td>
                                            <td><?= esc($row->model) ?></td>
                                            <td><?= esc($row->id) ?></td>
                                            <td><?= esc($row->status) ?></td>
                                            <td><?= esc($row->date) ?></td>
                                            <td><?= esc($row->specialremarks) ?></td>
                                            <td>
                                                <a href="<?= ROOT ?>/rentalmanager/equipments/edit/<?= $row->id ?>"><button class="Review user">Edit</button></a>
                                            </td>
                                            <td>
                                                <a href="<?= ROOT ?>/rentalmanager/equipments/delete/<?= $row->id ?>"><button class="Review user">Delete</button></a>
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