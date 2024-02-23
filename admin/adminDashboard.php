<?php

// session_start();

// if (!isset($_SESSION['adminEmail']) || !isset($_SESSION['admin_id'])) {
//     echo "<script> alert('!Unknown User, Please Login'); 
//             location.href = '_adminLogin.php';
//         </script>";
// } else {
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="./js/admin.js" defer></script>
</head>
<body>
    <?php require "_adminNavbar.php"?>
    <div class="dashboard">
    <section id="admin-dashboard">
        <div class="dashboard-heading">
           <img src="../img/icons/dashboard.png" id="dashboard-icon" class="icon" alt=""> <span>Dashboard</span>
        </div>
        <div class="dashboard-search">
            <input type="text" name="search" id="search" placeholder="Search content.."><img src="../img/icons/search-interface-symbol.png" class="icon" alt="">
        </div>
        <div class="dashboard-content">
            <div class="admin-profile">
                <img src="../img/icons/adminDark.png" class="icon" alt=""><span><a href="adminDashboard.php">Profile</a></span>
            </div>
            <div class="employee">
                <a href="adminDashboard.php?link=<?php echo'Employee';?>">
                <img src="../img/icons/employee.png" class="icon" alt="">
                <span>Employee</span>
                <img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
                </a>
            </div>
             <div class="employee">
                <a href="adminDashboard.php?link=<?php echo"user";?>">
                    <img src="../img/icons/user (2).png" class="icon" alt="">
                    <span>User</span>
                    <img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
            </a>
            </div>
            <div class="employee">
                <a href="adminDashboard.php?link=<?php echo"categories";?>">
                    <img src="../img/icons/employee.png" class="icon" alt="">
                    <span>Categories</span>
                    <img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
            </a>
            </div>
            <div class="employee">
                <a href="adminDashboard.php?link=<?php echo"service";?>">
                <img src="../img/icons/employee.png" class="icon" alt="">
                <span>Service</span>
                <img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
                </a>
            </div>
             <div class="employee">
               <a href="adminDashboard.php?link=<?php echo"order";?>"> 
                 <img src="../img/icons/employee.png" class="icon" alt="">
                 <span>Order</span>
                 <img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
               </a>
            </div>
            <div class="employee">
               <a href="adminDashboard.php?link=<?php echo"contact";?>">
                <img src="../img/icons/employee.png" class="icon" alt="">
                <span>Contact details</span>
                <img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
               </a>
            </div>
             <div class="employee">
               <a href="adminDashboard.php?link=<?php echo"views";?>">
                <img src="../img/icons/employee.png" class="icon" alt="">
                <span>Views</span>
                <img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
                </a>
            </div>
            <div class="logout">
                <a href="#">
                    <img src="../img/icons/logout.png" class="icon" alt="">
                    <span>Log-out</span>
                </a>
            </div>
        </div>
    </section>
    <section id="main">
       <?php 
       
       if(isset($_GET['link'])&& $_GET['link']=="Employee" || isset($_GET['task'])&& $_GET['task']=="payroll" ||isset($_GET['task'])&& $_GET['task']=="employee registration")
       {
         require "_employeeTask.php";
       }else if(isset($_GET['link'])&& $_GET['link']=="user")
       {
            require "_adminLogin.php";
       }else if(isset($_GET['link'])&& $_GET['link']=="order")
       {
            require "_adminForget.php";
       }else if(isset($_GET['link'])&& $_GET['link']=="service")
       {
            require "../_userLogin.php";
       }
       
       ?>
    </section>
    </div>
    <!-- footer include here -->
</body>
</html>
   <?php
// }
