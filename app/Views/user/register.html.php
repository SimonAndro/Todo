<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?=loadAsset("css/register.css")?>">
</head>

<body>

    <form action="user-register" method="post" >
        <div class="container">
            <h1>Register</h1>
            <?php if(isset($error)): foreach($error as $e):?>
            <div class="reg-error"><p><?=$e?></p></div>
            <?php endforeach; endif; ?>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="val[email]" id="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="val[password]" id="psw" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="val[passwordRepeat]" id="psw-repeat" required>
            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="user-login">Sign in</a>.</p>
        </div>
    </form>

</body>

</html>