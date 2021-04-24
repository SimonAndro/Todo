<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=loadAsset("css/login.css")?>">
</head>

<body>

    <div class="login-layout">
        <h2>Login Form</h2>

        <form action="user-login" method="post">
            <div class="imgcontainer">
                <img src="<?=loadAsset("media/img_login_avatar.png")?>" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
                <div class="rem-reg">
                    <label class="">
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                    <a href="user-register" class="reg-btn">Create Account</a>
                </div>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>

</body>

</html>