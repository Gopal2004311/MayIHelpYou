    <section id="task-container">
            <?php  
    $conn=new mysqli("localhost","root","","sample",3306);
    $sql=$conn->prepare("SELECT * FROM employee_task");
    $sql->execute();
    $result=$sql->get_result()
    ?>
        <div class="task-header">
            <?php if(!isset($_GET['task'])) {?>
            <h2>Employee task !!</h2>
            <?php }?>
        </div>
        <div class="task-content">
            <?php if(isset($_GET['task'])&& $_GET['task']=="employee registration")
            {
                require "_adminForget.php";
            }else if(isset($_GET['task'])&& $_GET['task']=="payroll")
            {
                require "_employeeRegistration.php";
            }else
            {
            while($row = $result->fetch_assoc())
            {?><div class="task-element">
                <div class="header">
                    <img src="../img/icons/employee.png" alt="employee">
                    <span><?php echo$row['task_name']; ?></span>
                </div>
                <div class="bg-img"></div>
                <div class="link">
                    <button><a href="adminDashboard.php?task=<?php echo$row['task_name']; ?>">click to perform</a></button>
                </div>
            </div>
            <?php }}//else if(isset($_GET['task'])) require "_adminForget.php";?> 
        </div>
    </section>