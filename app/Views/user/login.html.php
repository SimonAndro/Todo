<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=loadAsset("css/login.css")?>">
</head>

<body>

    <div class="login-layout">
        <h2>  ToDo Login</h2>
        <?php if(isset($message)): ?>
        <div class="login-msg"> <p><?=$message?> </p></div>
        <?php endif ?>
        <?php if(isset($error)): foreach($error as $e):?>
            <div class="log-error"><p><?=$e?></p></div>
            <?php endforeach; endif; ?>
        <form action="user-login" method="post">
            <div class="imgcontainer">
                <img src="<?=loadAsset("media/img_login_avatar.png")?>" alt="Avatar" class="avatar">
            </div>
            
            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Username" name="val[email]" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="val[password]" required>

                <button type="submit">Login</button>
                <div class="rem-reg">
                    <label class="">
                        <input type="checkbox" checked="false" name="val[remember]"> Remember me
                    </label>
                    <a href="user-register" class="reg-btn">Create Account</a>
                </div>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="other-login" onclick="javascript:void(0);">Login With MoshiChat</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>

</body>

</html>