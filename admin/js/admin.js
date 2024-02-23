/*change page according to the employee or admin*/

const input = document.getElementById("employee-check");
const heading = document.getElementById("admin-heading");
const image = document.getElementById("admin-img");
input.addEventListener("click", (Event) => {
    if (input.checked == true) {
        heading.innerHTML = "Employee Login"
        image.setAttribute("src", "../img/icons/employee.png");
    } else {
        heading.innerHTML = "Admin Login"
        image.setAttribute("src", "../img/icons/adminDark.png");
    }
})
/*adminLogin.php script end here*/