<!-- Navbar start here -->
<?php
session_start();
?>
<header class="pad-x">
    <div class="logo-section">
        <a href="index.php">
            <img src="../img/original_logo.png" alt="mayIHelpYou" class="my-logo">
        </a>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="<?php if(isset($_SESSION['adminId'])&&isset($_SESSION['adminEmail'])||isset($_SESSION['employeeId'])&&isset($_SESSION['employeeEmail']))  
             echo 'adminDashboard.php';else echo'_adminLogin.php'; ?>" class="navbar-link active-link">Home</a></li>
            <li><a href="#" class="navbar-link">Services</a></li>
            <li><a href="#" class="navbar-link">Contacts</a></li>
            <li><a href="#" class="navbar-link">Privacy & Policy</a></li>
            <li><a href="#" class="navbar-link">Help</a></li>
            <li><a href="#" class="navbar-link">Privacy & Policy</a></li>
            <li><a href="#" class="navbar-link">Help</a></li>
        </ul>
    </nav>
    <div class="login-section"> 
        <?php if(isset($_SESSION['adminId'])&&isset($_SESSION['adminEmail'])||isset($_SESSION['employeeId'])&&isset($_SESSION['employeeEmail'])): ?>   
            <a href="#" class="link button account">
                <img src="../img/icons/adminDark.png" class="user-icon" alt="">
                <span>My Profile</span>
            </a>
            <a href="adminLogout.php" class="button btn-red">Log out</a>
        <?php else:?>
            <img src="../img/icons/home.png" class="user-icon" alt="">
        <?php endif;?>
    </div>
</header>
<!-- Navbar end here -->