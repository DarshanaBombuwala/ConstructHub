<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consruct Hub</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home2style.css">

    
    

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>
<body>
    
    <section id="Home">

        <!-- nav class -->
        <?php
        require "../App/components/navbar2.php";
        ?>

        <!-- end of nav class -->

        <div class="mainnav">
            <ul>   
                <li class="mainthree"><a href="#Professionals">Professionals</a></li>
                <li class="mainthree"><a href="#Vehicles">Heavy Duty Vehicles</a></li>
                <li class="mainthree"><a href="#rental">Rental Equipments</a></li>
            </ul>
            
            <div id="search-container">
                <input type="search" id="search-input" placeholder="Search here..." />
                <button id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            
        </div>


        <div class="main">

            <div class="men_text">
                <h1>Building <span>Tomorrow</span><br> with <br><span>Tech & Expertise <span></h1>
            </div>

            <div class="main_image">
                <img src="<?= ROOT ?>/assets/images/homeimg/worker6.png">
                
            </div>

        </div>
        

        <p>
            <br><br><br><br>
        Our main goal is to use the best of technology and our skills to create a better future. 
        Every job we do aims to make the world more innovative, sustainable, and strong.<br>
          By working together and understanding our work well, we aim to make places that are inspiring and long-lasting.
           In short, we're not just making buildings; 
           we're shaping a brighter future where technology and skill come together for everyone's benefit.<br>
        </p>

        <!-- <div class="main_btn">
            <a href="#">Order Now</a>
            <i class="fa-solid fa-angle-right"></i>
        </div> -->

    </section>



    <!--About-->
    
    <div class="about" id="About">
        
        <div class="about_main">
            <div class="image">
                <img src="<?= ROOT ?>/assets/images/homeimg/worker3.png">
            </div>

            <div class="about_text">
                <h1><span>About</span>Us</h1>
                <h3>Why Choose us?</h3>
                <p>
                Choose us because we care about your needs.<br>
                 We use the latest tools and have a lot of experience.<br>
                  Our team works together well and always aims to do the best job. <br>
                  We listen to you and make sure you're happy with our work.<br>
                   With us, you get quality and trustworthiness every step of the way.<br>
                </p>
            </div>

        </div>

    </div>



    <!--Professionals-->


    <div class="blankspace"></br></div>
    <div class="displayItem" id="Professionals">
        
        
        <h1>Our Trending <span>Professionals</span></h1>
        <div class="fornext">
            <div class="displayItem_box" id="professionalsBox">
                <!-- ... -->
                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional1.jpeg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Plumber</h2>
                        <p>
                        install, maintain, and repair plumbing systems, including pipes, fixtures, and water heaters and more
                        </p>
                        <h3>1500 RS per hour</br></h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional2.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Carpenter</h2>
                        <p>
                        work with wood, constructing and repairing structures like furniture, cabinets, doors, and frameworks.
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

            
                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional4.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Mason</h2>
                        <p>
                        work with bricks, stones, and concrete blocks to build walls, pathways, and other building structures
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional5.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Painter</h2>
                        <p>
                        skilled in painting interior and exterior surfaces, including walls, ceilings, and other structures.
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional6.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Electrician</h2>
                        <p>
                        specialize in installing, maintaining, and repairing electrical systems in homes, buildings, and other structures
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional2.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Carpenter</h2>
                        <p>
                        work with wood, constructing and repairing structures like furniture, cabinets, doors, and frameworks.
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

            
                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional4.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Mason</h2>
                        <p>
                        work with bricks, stones, and concrete blocks to build walls, pathways, and other building structures
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional5.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Painter</h2>
                        <p>
                        skilled in painting interior and exterior surfaces, including walls, ceilings, and other structures.
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional2.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Carpenter</h2>
                        <p>
                        work with wood, constructing and repairing structures like furniture, cabinets, doors, and frameworks.
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

            
                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional4.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Mason</h2>
                        <p>
                        work with bricks, stones, and concrete blocks to build walls, pathways, and other building structures
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional5.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Painter</h2>
                        <p>
                        skilled in painting interior and exterior surfaces, including walls, ceilings, and other structures.
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional2.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Carpenter</h2>
                        <p>
                        work with wood, constructing and repairing structures like furniture, cabinets, doors, and frameworks.
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

            
                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional4.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Mason</h2>
                        <p>
                        work with bricks, stones, and concrete blocks to build walls, pathways, and other building structures
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional5.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Painter</h2>
                        <p>
                        skilled in painting interior and exterior surfaces, including walls, ceilings, and other structures.
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

                <!-- ... -->
                
            
            </div> 
            <button id="nextButton" onclick="slideCards()"><i class="fa-solid fa-arrow-right"></i></button>
        </div> 
        <button class="seemore">See More</button>
    </div>




    <!--Vehicles-->

    <div class="displayItem" id="Vehicles">
        <h1>Our Trending <span>Heavy Duty Vehicles</span></h1>
        <div class="fornext">

            <div class="displayItem_box">

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional6.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Electrician</h2>
                        <p>
                        specialize in installing, maintaining, and repairing electrical systems in homes, buildings, and other structures
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

            </div>
            

        </div>
        <button class="seemore">See More</button>

        

    </div>




    <!--rental-->

    <div class="displayItem" id="rental">
        <h1>Our Trending <span>Rental Equipments</span></h1>

        <div class="fornext">

            <div class="displayItem_box">

                <div class="displayItem_card">
                    <div class="displayItem_image">
                        <img src="<?= ROOT ?>/assets/images/homeimg/professional6.jpg">
                    </div>
                    <div class="displayItem_info">
                        <h2>Electrician</h2>
                        <p>
                        specialize in installing, maintaining, and repairing electrical systems in homes, buildings, and other structures
                        </p>
                        <h3>1500 RS per hour</h3>
                        
                        <a href="#" class="displayItem_btn">Order Now</a>
                        <a href="#" class="displayItem_btn">Add to Cart</a>
                    </div>
                </div> 

            </div>
            

        </div>
        <button class="seemore">See More</button>

    </div>



    <!--contact-->

    <div class="contact" id="contact">
        
        
        <div class="contact_main">

            <div class="contact_image">
                <img src="<?= ROOT ?>/assets/images/homeimg/worker1.png">
            </div>

            
            <div class="contact_form">
                <form action="#">
                <h1><span>Contact</span>Us</h1>

                    <div class="input">
                        <p>Name</p>
                        <input type="text" placeholder="your name">
                    </div>

                    <div class="input">
                        <p>Email</p>
                        <input type="email" placeholder="your email">
                    </div>

                    <!-- <div class="input">
                        <p>Number</p>
                        <input placeholder="your phone number">
                    </div>

                    <div class="input">
                        <p>Address</p>
                        <input placeholder="your address">
                    </div>

                    -->
                    <div class="input">
                        <p>Message</p>
                        <input placeholder="Your Message">
                    </div>


                    <a href="#" class="contact_btn">Submit </a>

                </form>
            </div>

        </div>

    </div>


   

    <?php
    require "../App/components/footer.php";
    ?>

    <script>
        let currentIndex = 0;
        const cardWidth = document.querySelector('.displayItem_card').offsetWidth;
        const cardsContainer = document.getElementById('professionalsBox');
        const nextButton = document.getElementById('nextButton');

        function updateButtonState() {
            nextButton.disabled = currentIndex === cardsContainer.scrollWidth - cardsContainer.offsetWidth;
        }

        function slideCards() {
            currentIndex += cardWidth;
            cardsContainer.scrollTo({ left: currentIndex, behavior: 'smooth' });
            updateButtonState();
        }

        // Initially update button state
        updateButtonState();

    </script>



    
</body>
</html>