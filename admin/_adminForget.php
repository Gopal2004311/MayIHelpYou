<?php

require "../partials/_dbConnect.php";
error_reporting(0);
session_start();

if (isset($_POST['admin_login'])&&!isset($_POST['employee-check-forget'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    $sql = $conn->prepare("SELECT admin_id, admin_email, admin_password FROM admin 
                WHERE admin_email = ? AND admin_password = ?");

    $sql->bind_param("ss", $email, $password);
    $sql->execute();

    $result = $sql->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['adminEmail'] = $row['admin_email'];

        header("location: adminDashboard.php");
    } else {
        echo "<script>alert('! Invalid Email or Password');</script>";
    }

    $sql->close();
}else if(isset($_POST['admin_login'])&& isset($_POST['employee-check-forget'])){
     $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql=$conn->prepare("SELECT * FROM employee WHERE employee_email=? AND employee_password=?");
    $sql->bind_param("ss",$email,$password);
    $sql->execute();

    $result=$sql->get_result();

    if($result->num_rows==1)
    {
        $row=$result->fetch_assoc();
        $_SESSION['Employee_id']=$row['employee_id'];
        $_SESSION['Employee_email']=$row['employee_email'];
        header("location:adminDashboard.php");
    }else{
        echo"<script>alert('! Invalid Employee,Please Check Details');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/admin.js" defer></script>
</head>

<body>
    <div class="pad-x" id="login-container">
        <div class="page-title">
            <h1 class="heading">mayi<span class="highlight">help</span>you.io</h1>
        </div>
        <div class="form-box">
            <div class="form-heading">
                <img src="../img/icons/adminDark.png" alt="Admin-img" id="forget-img" class="admin-img">
                <h3 id="forget-heading">Forget Password</h3>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-element">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-input" type="email" name="email" id="email" value="<?php if (isset($_POST['login'])) echo $user_email; ?>" placeholder="E-mail" required />
                </div>
                <div class="form-element">
                    <label class="form-label" for="password">New Password</label>
                    <input class="form-input" type="password" name="password" id="password" placeholder="Password" value="<?php if (isset($_POST['login'])) echo ""; ?>" required />
                </div>
                <div class="form-element">
                    <input class="form-input button submit-btn" type="submit" value="Forget" name="admin_login" id="login">
                    <div class="links">
                        <input type="checkbox" name="employee-check-forget" id="employee-check-forget" onclick="forget()" value="employee-check-forget"><span>Are you Employee?</span>
                        <a href="_adminLogin.php" class="forgot-pass">Login</a>
                    </div>
                </div>
            </form>
            <hr class="form-line">
            <div class="sign-link">
                <span>Go to home page ?</span>
                <a href="../index.php">Home</a>
            </div>
        </div>
    </div>
</body>

</html>