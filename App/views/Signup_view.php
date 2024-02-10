<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signinStyle.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="login">
          <div class="content">
            <img src="<?= ROOT ?>/Images/signin.svg">
          </div>
    
          <div class="loginform">
            <h1>Register</h1>
            <form  method ="post">
                <div class="tbox">
                    <i class="fa fa-user"></i>
                    <input type="text" name="firstname" placeholder="First Name" >
                    <?php if(!empty($errors['firstname'])):?>
                    <small class="invalid"><?=$errors['firstname']?></small>
                <?php endif;?>
                </div>
                <div class="tbox">
                    <i class="fa fa-user"></i>
                    <input type="text" name="lastname" placeholder="Last Name" >
                    <?php if(!empty($errors['lastname'])):?>
                    <small class="invalid"><?=$errors['lastname']?></small>
                <?php endif;?>
                </div>
                
                
                <div class="tbox">
                    <i class="fa fa-envelope"></i>
                    <input type="text" name="email" placeholder="Email" >
                    <?php if(!empty($errors['email'])):?>
                    <small class="invalid"><?=$errors['email']?></small>
                <?php endif;?>
                </div>
                
                <div class="tbox">
                    <i class="fa fa-lock"></i>
                    <input type="text" name="password" placeholder="Password" >
                    <?php if(!empty($errors['password'])):?>
                    <small class="invalid"><?=$errors['password']?></small>
                    <?php endif;?>
                </div>
                
                
                <div>
                    <input class="sbtn" type="submit" value="Register">
                    <a class="register-link" href="<?= ROOT ?>/signin">Have an account? Login</a>
                </div>
                
              </div>
           </form>
          </div>
        </div>
      </div>
</body>
</html>
  
  