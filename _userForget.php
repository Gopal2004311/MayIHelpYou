
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Registration</title>
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="css/style.css">
     <!-- Javascript Files -->
    <script src="js/app.js" defer></script>
    <script src="js/textAnimation.js" defer></script>
</head>

<body>
    <?php require "_userNavbar.php";?>

    <!-- User Registration Form  start here -->
    <div class="pad-x" id="login-container">
        <div class="page-title">
            <h1 class="heading">mayi<span class="highlight">help</span>you.io</h1>
        </div>
        <div class="form-box">
            <h3>Forget-Password</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-element">
                    <label class="form-label" for="userEmail">E-mail</label>
                    <input class="form-input" type="text" name="userEmail" id="userEmail"
                        placeholder="example123@gmail.com" value="<?php if (isset($emailForget)) {echo $emailForget;}?>"/>
                        <small class="form-error">
                        <?php
if (isset($emailForgetError)) {
    echo $emailForgetError;
}

?>
                        </small>
                </div>
                <div class="form-element">
                    <label class="form-label" for="newPassword">New Password</label>
                    <input class="form-input" type="password" name="newPassword" id="newPassword"
                        placeholder="New Password" value="<?php if (isset($passwordForget)) {echo $passwordForget;}?>"/>
                          <small class="form-error">
                            <?php
if (isset($passwordForgetError)) {
    echo $passwordForgetError;
}
?>
                        </small>
                </div>
                <div class="form-element">
                    <input class="form-input button" type="submit" value="Forget" name="forget" id="login">
                </div>
            </form>
        </div>
    </div>
    <!-- User Registration Form  start here -->

</body>

</html>