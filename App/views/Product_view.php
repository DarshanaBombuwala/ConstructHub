<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construct HUB</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/homestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    

</head>
<body>
    <section id="header">
        <a href="#"><img src="<?= ROOT ?>/assets/img/logo.jpeg" class="logo" alt=""></a> 
        <div>
            <ul id="navbar">
                <li><a class="active" href="<?= ROOT ?>">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
               
                  
            </ul>
        </div>
        <div>
            <ul id="getstarted">
                <li><a href="login.html">Signin</a></li>
                </li> 
            </ul>
        </div>
    </section>

    <section id="service-details">
        <div class="single-service-img">
            <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" width="100%" id="main-img" alt="">
            <div class="small-img-grp">
                <div class="small-img-col">
                    <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?= ROOT ?>/assets/img/services/7790133.jpg" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>
        <div class="single-service-details">
            <h6>Home/Professionals</h6>
            <h2>Plumber</h2>
            <h4>Description</h4>
            <p>A plumber is a skilled tradesperson who specializes in installing and maintaining systems used for drinking water,
                 sewage, and drainage in residential, commercial, and industrial buildings. Plumbers are responsible for ensuring 
                 that water supply and wastewater systems function properly.</p>
            <h4>Our specialties include:</h4>
            <ul>
                <li>Emergency plumbing repairs</li>
                <li>Leak detection and repair</li>
                <li>Drain cleaning and unclogging</li>
                <li>Fixture installation and repair</li>
                <li>Water heater installation and maintenance</li>
            </ul>
           
            

            <form class="date-picker">
                    <label for="datePicker">Choose a Date:</label>
                    <input type="date" id="datePicker" name="selectedDate">
            </form>
           
            <button>Request Quotation</button>
            <button>Add To Cart</button>

        </div>
    </section>

    <section class="feedback-section">
        <h1>Customer Feedbacks</h1>
        <div class="feedback-card">
            <div class="user-info">
                <img src="/img/services/7790133.jpg" alt="User 1">
                <h3>User 1</h3>
            </div>
            <p>"Excellent service! Highly recommended."</p>
        </div>
        <div class="feedback-card">
            <div class="user-info">
                <img src="/img/services/7790133.jpg" alt="User 2">
                <h3>User 2</h3>
            </div>
            <p>"The team was very professional and efficient."</p>
        </div>
        <div class="feedback-card">
            <div class="user-info">
                <img src="/img/services/7790133.jpg" alt="User 2">
                <h3>User 3</h3>
            </div>
            <p>"The team was very professional and efficient."</p>
        </div>
        <div class="feedback-card">
            <div class="user-info">
                <img src="/img/services/7790133.jpg" alt="User 2">
                <h3>User 4</h3>
            </div>
            <p>"The team was very professional and efficient."</p>
        </div>
        
    </section>

    <footer class="section-p1">
        <div class="footer-column">
            <div class="footer-logo">
                <img src="/img/logo.jpeg">
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
                <img src="/img/png-clipart-paypal-the-next-level-service-payment-gateway-industry-paypal-text-payment.png" alt="">
                
            </div>
        </div>
    </footer>
    

    

    <script src="script.js"></script>
    
    
</body>
</html>