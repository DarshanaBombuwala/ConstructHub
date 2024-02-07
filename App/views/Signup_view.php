<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signupStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Registration Form</title>
</head>

<body>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <div class="container">
        <div class="login-link">
            <div class="logo">

            </div>
            <p class="side-heading">Already a member? </p>
            <p class="bg-text">Please login with your personal info</p>
            <a href="<?= ROOT ?>/signin" class="loginbtn">Login</a>

        </div>
        <form action="submit" method="post" class="signup-form-container">
            <p class="big-heading">Create Account</p>
            <div class="progress-bar">
                <div class="stage">
                    <p class="tool-tip">Personal Info</p>
                    <p class="stageno stageno-1">1</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Contact Info</p>
                    <p class="stageno stageno-2">2</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Personal Info</p>
                    <p class="stageno stageno-3">3</p>
                </div>

            </div>
            <div class="signup-form-content">
                <div class="stage1-content">
                    <div class="button-container">
                        <div class="err-wrap">
                            <div class="text-fields fname">
                                <label for="firstname"><i class="bx bx-user"></i></label>
                                <input type="text" name=firstname id="firstname" placeholder="Enter your first name">

                            </div>
                            <label class="err-msg">This is an example</label>
                        </div>
                        <div class="err-wrap">
                            <div class="text-fields lname">
                                <label for="firstname"><i class="bx bx-user"></i></label>
                                <input type="text" name="lastname" id="ladtttname" placeholder="Enter your last name">

                            </div>
                            <label class="err-msg">This is an example</label>
                        </div>

                    </div>
                    <div class="button-container">

                        <div class="err-wrap">
                            <div class="text-fields email">
                                <label for="email"><i class="bx bx-envelope"></i></label>
                                <input type="text" name="email" id="email" placeholder="Enter your Email">

                            </div>
                            <label class="err-msg email">This is an example</label>
                        </div>

                        <div class="err-wrap">
                            <div class="text-fields username">
                                <label for="email"><i class="bx bx-user"></i></label>
                                <input type="text" name="userName" id="userName" placeholder="Enter your User Name">

                            </div>
                            <label class="err-msg email">This is an example</label>
                        </div>




                    </div>

                    <div class="button-container">
                        <div class="err-wrap">
                            <div class="text-fields pw">
                                <label for="password"><i class="bx bxs-key"></i></label>
                                <input type="text" name="password" id="password" placeholder="Enter  Password">

                            </div>
                            <label class="err-msg email">This is an example</label>
                        </div>




                        <div class="err-wrap">
                            <div class="text-fields rpw">
                                <label for="Cpassword"><i class="bx bxs-key"></i></label>
                                <input type="text" name="Cpassword" id="Cpassword" placeholder="Confirm  Password">

                            </div>
                            <label class="err-msg email">This is an example</label>
                        </div>


                    </div>

                    <div class="pagination-btns">
                        <input type="button" value="Next" class="nextPage stagebtn1b" onclick="stage1to2()">

                    </div>
                </div>

                <div class="stage2-content">
                    <div class="button-container">

                        <div class="err-wrap">
                            <div class="text-fields address">
                                <label for="address"><i class="bx bx-home"></i></label>
                                <input type="text" name="address" id="address" placeholder="Enter your Address">

                            </div>
                            <label class="err-msg email">This is an example</label>
                        </div>
                        <div class="err-wrap">
                        <div class="text-fields pnb">
                        <label for="phoneNumber"><i class="bx bx-phone"></i></label>
                            <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number">

                            </div>
                            <label class="err-msg email">This is an example</label>
                        </div>

                        

                    </div>
                    
                    <div class="pagination-btns">
                        <input type="button" value="Previous" class="previousPage stagebtn2a" onclick="stage2to1()">
                        <input type="button" value="Next" class="nextPage stagebtn2b" onclick="stage2to3()">

                    </div>

                </div>

                <div class="stage3-content">
                    <div class="button-container">
                        <div class="text-fields address">
                            <label for="address"><i class="bx bx-home"></i></label>
                            <input type="text" name="address" id="address" placeholder="Enter your ">
                            <lable class="err-msg"></lable>
                        </div>

                    </div>

                    <div class="tc-container">
                        <lable for="tc" class="tc">
                            <input type="checkbox" name="tc" id="tc" required>
                            By submiting your details,you agree to the <a href="#"> terms and conditions.</a>
                        </lable>
                    </div>
                    <div class="pagination-btns">
                        <input type="button" value="Previous" class="previousPage stagebtn3a" onclick="stage3to2()">
                        <input type="submit" value="Submit" class="nextPage stagebtn3b">

                    </div>

                </div>
        </form>
    </div>
</body>
<script>
    let signupContent = document.querySelector(".signup-form-container"),
        stagebtn1b = document.querySelector(".stagebtn1b"),
        stagebtn2a = document.querySelector(".stagebtn2a"),
        stagebtn2b = document.querySelector(".stagebtn2b"),
        stagebtn3a = document.querySelector(".stagebtn3a"),
        stagebtn3b = document.querySelector(".stagebtn3b"),
        signupContent1 = document.querySelector(".stage1-content"),
        signupContent2 = document.querySelector(".stage2-content"),
        signupContent3 = document.querySelector(".stage3-content");

    signupContent2.style.display = "none"
    signupContent3.style.display = "none"

    function stage1to2() {
        signupContent1.style.display = "none"
        signupContent3.style.display = "none"
        signupContent2.style.display = "block"
        document.querySelector(".stageno-1").innerText = "✔️"
        document.querySelector(".stageno-1").style.backgroundColor = "#52ec61"
        document.querySelector(".stageno-1").style.color = "#fff"

    }

    function stage2to1() {
        signupContent1.style.display = "block"
        signupContent3.style.display = "none"
        signupContent2.style.display = "none"


    }

    function stage2to3() {
        signupContent1.style.display = "none"
        signupContent3.style.display = "block"
        signupContent2.style.display = "none"
        document.querySelector(".stageno-2").innerText = "✔️"
        document.querySelector(".stageno-2").style.backgroundColor = "#52ec61"
        document.querySelector(".stageno-2").style.color = "#fff"

    }

    function stage3to2() {
        signupContent1.style.display = "none"
        signupContent3.style.display = "none"
        signupContent2.style.display = "block"

    }
</script>

</html>