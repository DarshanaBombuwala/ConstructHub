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
                <a href="<?= ROOT ?>/professional/dashboard">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href='#'>
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

        <?php if ($action == 'add') : ?>
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Leaves</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Leaves/New</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Request Leave</h3>
                            <a href="<?= ROOT ?>/professional/leaves">
                                <button class="cancelbtn">Cancel</button>
                            </a>
                        </div>
                        <div class="container">
                            <form method="post">

                                <div class="form-group">
                                    <label for="startdate">Start Date</label>
                                    <input value="<?= set_value('startdate') ?>" type="date" id="startdate" name="startdate" placeholder="Startdate">
                                    <?php if (!empty($errors['startdate'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['startdate'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="enddate">End Date</label>
                                    <input value="<?= set_value('enddate') ?>" type="date" id="enddate" name="enddate" placeholder="Enddate">
                                    <?php if (!empty($errors['enddate'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['enddate'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input value="<?= set_value('duration') ?>" type="text" id="duration" name="duration" placeholder="Duration">
                                    <?php if (!empty($errors['duration'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['duration'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="leavetype">Leave Type</label>
                                    <input value="<?= set_value('leavetype') ?>" type="text" id="leavetype" name="leavetype" placeholder="Leave Type">
                                    <?php if (!empty($errors['leavetype'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['leavetype'] ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <input value="<?= set_value('reason') ?>" type="text" id="reason" name="reason" placeholder="Reason">
                                    <?php if (!empty($errors['reason'])) : ?>
                                        <small class="invalid" style="color: red;"><?= $errors['reason'] ?></small>
                                    <?php endif; ?>
                                </div>

                                <button type="submit">Submit Request</button>
                            </form>
                        </div>


                    </div>
                </div>
            </main>
        <?php elseif ($action == 'edit') : ?>

            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Leaves</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Leaves/Edit</a>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Edit Leave Request</h3>
                            <a href="<?= ROOT ?>/professional/leaves">
                                <button class="cancelbtn">Cancel</button>
                            </a>
                        </div>
                        <div class="container">
                            <form method='post'>
                                <div class="form-group">
                                    <label for="startdate">Start Date</label>
                                    <input value="<?= set_value('status', $row->startdate) ?>" type="date" id="startdate" name="startdate" >
                                </div>
                                <div class="form-group">
                                <label for="enddate">End Date</label>
                                    <input value="<?= set_value('enddate',$row->enddate) ?>" type="date" id="enddate" name="enddate" >
                                </div>
                                <div class="form-group">
                                <label for="duration">Duration</label>
                                    <input value="<?= set_value('duration',$row->duration) ?>" type="text" id="duration" name="duration" >
                                </div>
                                <div class="form-group">
                                <label for="leavetype">Leave Type</label>
                                    <input value="<?= set_value('leavetype',$row->leavetype) ?>" type="text" id="leavetype" name="leavetype" >
                                </div>
            
                                <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <input value="<?= set_value('leavetype',$row->reason) ?>" type="text" id="reason" name="reason">
                                </div>

                                <button type="submit">Save Changes</button>


                            </form>

                        </div>


                    </div>

                </div>
            </main>
        <?php else : ?>
            <!-- MAIN -->
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Leaves</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard/Leaves</a>
                            </li>
                        </ul>
                    </div>
                    <a href="<?= ROOT ?>/professional/leaves/add" class="btn-download">
                        <i class='bx bxs-plus-square'></i>
                        <span class="text">New Request</span>
                    </a>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>All Leaves</h3>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Leave ID</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Leave Type</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($rows)) : ?>
                            <tbody id="userList">
                                <?php foreach ($rows as $row) : ?>
                                    <tr>
                                        <td><?= esc($row->id) ?></td>
                                        <td><?= esc($row->startdate) ?></td>
                                        <td><?= esc($row->enddate) ?></td>
                                        <td><?= esc($row->status) ?></td>
                                        <td><?= esc($row->leavetype) ?></td>
                                        <td><?= esc($row->duration) ?></td>
                                        <td>
                                            <a href="<?= ROOT ?>/professional/leaves/edit/<?= $row->id ?>"><button class="Review user">Edit</button></a>
                                        </td>
                                        <td>
                                            <a href="<?= ROOT ?>/professional/leaves/delete/<?= $row->id ?>"><button class="Review user">Delete</button></a>
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
</body>

</html>