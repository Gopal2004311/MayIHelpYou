
<?
/*user Registration form validation start here*/
if (isset($_POST['Sign-Up'])) {

    error_reporting(0);

    $userName = trim($_POST['userName']);
    $userEmail = trim($_POST['userEmail']);
    $userMobile = trim($_POST['userMobile']);
    $userPassword = trim($_POST['userPassword']);
    $userConPassword = trim($_POST['userConPassword']);
    $userPinCode = trim($_POST['pin-code']);

    if (!preg_match(userNamePattern, $userName) || empty($userName)) {
        $userNameError = "*Please! Enter valid user name*";
    } else if (!preg_match(emailPattern, $userEmail) || empty($userEmail)) {
        $userEmailError = "*Please! Enter valid Email*";
    } else if (!preg_match(mobilePattern, $userMobile) || empty($userMobile)) {
        $userMobileError = "*Please! Enter valid mobile number*";
    } else if (!preg_match(passwordPattern, $userPassword) || empty($userPassword)) {
        $userPasswordError = "*password length must have 5 to 10 numbers or characters*";
    } else if (empty($userConPassword) || strcmp($userPassword, $userConPassword) != 0) {
        $confirmPasswordError = "*Confirm password are not match with original password*";
    } else if (!preg_match(pinCodePattern, $userPinCode) || empty($userPinCode)) {
        $pinCodeError = "*Invalid pin code*";
    } else {
        //   echo "<script>alert('Registration Successful!');</script>";
        header("location:_userLogin.php");
    }
}
/*user registration form validation ends here*/

/*user login validation start here*/
if (isset($_POST['login'])) {
    error_reporting(0);
    $loginEmail = trim($_POST['email']);
    $loginPassword = trim($_POST['password']);

    if (!preg_match(emailPattern, $loginEmail) || empty($loginEmail)) {
        $emailError = "*please! Enter valid email*";
    } else if (!preg_match(passwordPattern, $loginPassword) || empty($loginPassword)) {
        $passwordError = "*password length must have 5 to 10 numbers or characters*";
    } else {
        header("location:index.php");
    }
}
/*user login validation ends here*/

/*user forget password validation*/
if (isset($_POST['forget'])) {
    error_reporting(0);

    $emailForget = trim($_POST['userEmail']);
    $passwordForget = trim($_POST['newPassword']);

    if (!preg_match(emailPattern, $emailForget) || empty($emailForget)) {
        $emailForgetError = "*Please! Enter valid email*";
    } else if (!preg_match(passwordPattern, $passwordForget) || empty($passwordForget)) {
        $passwordForgetError = "*Please! Enter valid password number*";
    } else {
        header("location:_userLogin.php");
    }
}
/*user forget password validation ends here*/

/*user contact form validation start here */
if (isset($_POST['contact-form'])) {
    $contactUser = trim($_POST['user-name']);
    $contactEmail = trim($_POST['email']);
    $contactMessage = trim($_POST['msg']);

    if (!preg_match(userNamePattern, $contactUser) || empty($contactUser)) {
        $contactUserNameError = "**Please! Enter valid user name**";
    } else if (!preg_match(emailPattern, $contactEmail) || empty($contactEmail)) {
        $contactEmailError = "**Please! Enter valid Email address**";
    } else if (strlen($contactMessage) < 50 || strlen($contactMessage) > 200 || empty($contactMessage)) {
        $contactMessageError = "**Message length should in between 50 to 200**";
    } else {
        echo "<script>alert('Message Submitted!');</script>";
    }
}
/*Contact form validation ends here*/
