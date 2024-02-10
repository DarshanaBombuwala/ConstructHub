<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signinStyle.css">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="login">
            <div class="content">
                <img src="<?= ROOT ?>/Images/signup1.svg" alt="Login Image">
            </div>

            <div class="loginform">
                <h1>Login</h1>
                <form method="post">
                    <div class="tbox">
                        <i class="fa fa-envelope"></i>

                        <input value="<?= set_value('email') ?>" type="email" id="email" name="email" placeholder="Email">
                        <?php if (!empty($errors['email'])) : ?>
                            <small class="invalid"><?= $errors['email'] ?></small>
                        <?php endif; ?>

                    </div>

                    <div class="tbox">
                        <i class="fa fa-lock"></i>

                        <input value="<?= set_value('password') ?>" type="password" id="password" name="password" placeholder="password">
                        <?php if (!empty($errors['password'])) : ?>
                            <small class="invalid"><?= $errors['password'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div>
                        <input class="sbtn" type="submit" value="Login">
                        <a class="register-link" href="<?= ROOT ?>/signup">Don't have an account? Signup</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>