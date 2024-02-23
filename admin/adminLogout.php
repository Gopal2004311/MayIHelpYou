<?php 

session_start();

echo"<script>
        location.href='_adminLogin.php'
    </script>";
if(isset($_SESSION['adminEmail']))
{
    session_unset();
    echo"<script>
        location.href='_adminLogin.php'
    </script>";
}

?>