<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/c7689b66ad.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/navbar2.css">
    <title>Document</title>
</head>
<body>

<nav class="navbar">
    <div class="logo">
        <a href="#">ConstructHub</a>
    </div>

    <div class="nav-middle" id="myTopnav">
        <ul>
            <li><a class="active glow" href="#Home" onclick="myFunction()">Home </a></li>
            <?php if (!Auth::is_admin() && !Auth::is_rmanager() && !Auth::is_professional() && !Auth::is_cmanager())  : ?>
                <li><a href="#About" class="glow" onclick="myFunction()">About Us </a></li>
                <li><a href="#contact" class="glow" onclick="myFunction()">Contact Us </a></li>
            <?php endif; ?>
            <?php if (Auth::is_admin()) : ?>
                <li><a class="glow" href="<?= ROOT ?>/admin">Dashboard</a></li>
            <?php endif; ?>
            <?php if (Auth::is_rmanager()) : ?>
                <li><a class="glow" href="<?= ROOT ?>/rentalmanager">Dashboard</a></li>
            <?php endif; ?>
            <?php if (Auth::is_professional()) : ?>
                <li><a class="glow" href="<?= ROOT ?>/professional">Dashboard</a></li>
            <?php endif; ?>
            <?php if (Auth::is_cmanager()) : ?>
                <li><a class="glow" href="<?= ROOT ?>/companymanager">Dashboard</a></li>
            <?php endif; ?>
        </ul>

    </div>

    <div class="nav-right">
        <ul>
            <li class="greet">Hello </li>
            <li data-tooltip="drop down" class="nr-li li_main" id="dropdownMenuBtn">
                
                <i class="fa-solid fa-caret-down" id="dropdownIcon"></i>
                <div class="dd-menu" id="dropdownMenu">
                    <div class="dd-top">
                        <ul id="getstarted">
                            <?php if (!Auth::logged_in()) : ?>
                                <li><a href="<?= ROOT ?>/signin">Signin</a></li>
                            <?php else : ?>
                                <li>
                                    <div>
                                        Hi, <?= ucfirst(Auth::getFirstname()) ?>
                                    </div>
                                </li>
                                <li><a href="<?= ROOT ?>/logout">Logout</a></li>
                            <?php endif; ?>
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
            </li>
            <li data-tooltip="My Cart" class="nr-li li-border">
                <i class="fa-solid fa-cart-shopping"></i>
            </li>
            <li>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
    var li_main = document.querySelector(".li_main");
    var dropdownMenu = document.getElementById("dropdownMenu"); 
    var dropdownIcon = document.getElementById("dropdownIcon");

    li_main.addEventListener("click", function () {
        // Toggle the 'hover' class on each click
        this.classList.toggle("hover");

        // Toggle the icon based on the presence of "hover" class
        dropdownIcon.classList.toggle("fa-solid fa-caret-up");

        // Toggle the 'show' class on the dropdown menu to display/hide it
        dropdownMenu.classList.toggle("show");
    });
</script>

<script>
    function myFunction() {
        if (window.innerWidth < 650) {
            var x = document.getElementById("myTopnav");
            if (x.className === "nav-middle") {
                x.className += " responsive";
            } else {
                x.className = "nav-middle";
            }
        }
    }
</script>




</body>
</html>
