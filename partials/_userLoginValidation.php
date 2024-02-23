<?php
require "./partials/_regularExp.php";
if (isset($_POST['login'])) {
    $loginEmail = $_POST['email'];
    $loginPassword = $_POST['password'];

    if (!preg_match(emailPattern, $loginEmail)) {
        $emailError = "*Enter valid Email address*";
    } else
    if (!preg_match(passwordPattern, $loginPassword)) {
        $passwordError = "*Password length min 5 char and max 15 char*";
    } else
    if (!userExist($loginEmail) && $emailError == "" && $passwordError == "") {
        echo "<script>alert('Login successful!');location.href='../index.php'</script>";
    }
}
