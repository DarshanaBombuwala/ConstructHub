<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= APP::$page ?> Construct HUB</title>
        <link rel="stylesheet" href="<?= ROOT ?>/assets/css/homestyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    </head>
<body>
    <section id="header">
        <a href="#"><img src="<?= ROOT ?>/assets/img/logo.jpeg" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a class="active" href="#">Home</a></li>
                <?php if (!Auth::is_admin() && !Auth::is_rmanager() && !Auth::is_professional() && !Auth::is_cmanager())  : ?>
                    <li><a href="<?= ROOT ?>/Aboutus">About Us</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                <?php endif; ?>
                <?php if (Auth::is_admin()) : ?>
                    <li><a href="<?= ROOT ?>/admin">Dashboard</a></li>
                <?php endif; ?>
                <?php if (Auth::is_rmanager()) : ?>
                    <li><a href="<?= ROOT ?>/rentalmanager">Dashboard</a></li>
                <?php endif; ?>
                <?php if (Auth::is_professional()) : ?>
                    <li><a href="<?= ROOT ?>/professional">Dashboard</a></li>
                <?php endif; ?>
                <?php if (Auth::is_cmanager()) : ?>
                    <li><a href="<?= ROOT ?>/companymanager">Dashboard</a></li>
                <?php endif; ?>


            </ul>
        </div>

        <div>

            <ul id="getstarted">
                <?php if (!Auth::logged_in()) : ?>
                    <li><a href="<?= ROOT ?>/signin">Signin</a></li>
                <?php else : ?>
                    <div>
                        Hi,<?= Auth::getFirstname() ?>
                    </div>
                    <li><a href="<?= ROOT ?>/logout">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>

    </section>

    <section id="tabs">
            
                <div class="btn-box">
                    <button class="tab-button"  onclick="openTab('professional')" class="active">Professionals</button>
                    <button class="tab-button" onclick="openTab('heavy-duty-vehicle')">Heavy Duty Vehicles</button>
                    <button class="tab-button" onclick="openTab('rental-equipment')">Rental Equipments</button>
                </div>
            
            <div id="search-container">
                <input type="search" id="search-input" placeholder="Search here..." />
                <button id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            
    </section>

    <section id="content" class="section-p1">
        <div id="professional" class="content-container">
            <a href="<?= ROOT ?>/product">
                <div class="card">
                    <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                    <div class="des">
                        <span>10 available</span>
                        <h5>Plumber</h5>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </a>
            <a href="<?= ROOT ?>/product">
                <div class="card">
                    <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                    <div class="des">
                        <span>10 available</span>
                        <h5>Plumber</h5>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </a>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/plumber_04.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/electrician_03.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/electrician_03.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>


        </div>
        <div id="heavy-duty-vehicle" class="content-container">
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/45242-JCB.webp" alt="">
                <div class="des">
                    <span>9 available</span>
                    <h5>jcb</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/45242-JCB.webp" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>excavator</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/45242-JCB.webp" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>tipper</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/45242-JCB.webp" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>tractor</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/45242-JCB.webp" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>water bowser</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/45242-JCB.webp" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>water bowser</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>


        </div>
        <div id="rental-equipment" class="content-container">
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                <div class="des">
                    <span>8 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/electrician_03.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/plumber_04.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/electrician_03.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/electrician_03.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/electrician_03.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/electrician_03.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/electrician_03.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="card">
                <img src="<?= ROOT ?>/assets/img/services/electrician_03.jpg" alt="">
                <div class="des">
                    <span>10 available</span>
                    <h5>Plumber</h5>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>

        </div>




    </section>

    <section id="pagination" class="section-p1">
        <a href="#" class="page">1</a>
        <a href="#" class="page">2</a>
        <a href="#"><i class="fa-solid fa-arrow-right next"></i></a>
    </section>

    <footer class="section-p1">
        <div class="footer-column">
            <div class="footer-logo">
                <img src="<?= ROOT ?>/assets/img/logo.jpeg">
            </div>
            <div class="footer-contact">
                <h4>Contact</h4>
                <p><strong>Address:</strong> 97,ConstructHub,Thimbirigasyaya,Colombo 7</p>
                <p><strong>Phone:</strong> 033-3333333</p>
                <p><strong>Hours:</strong> Mon-Fri 9am-5pm</p>
            </div>
            <div class="footer-social">
                <h4>Follow Us</h4>
                <!-- Social media icons go here -->
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-pinterest"></i>
            </div>
        </div>

        <div class="footer-column">
            <div class="footer-about">
                <h4>About</h4>
                <a href="#">About Us</a>
                <a href="#">Delivery Information</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Contact Us</a>

            </div>
        </div>

        <div class="footer-column">
            <div class="footer-payment">
                <h4>Secure Payment Gateways</h4>
                <!-- Payment gateway logos go here -->
                <img src="<?= ROOT ?>/assets/img/png-clipart-paypal-the-next-level-service-payment-gateway-industry-paypal-text-payment.png" alt="">

            </div>
        </div>
    </footer>



    <script src="<?= ROOT ?>/assets/js/script.js"></script>

    
</body>
</html>