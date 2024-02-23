
    <div class="pad-x" id="login-container">
        <div class="page-title">
            <h1 class="heading">mayi<span class="highlight">help</span>you.io</h1>
        </div>
        <div class="form-box">
            <h3>Sign-Up</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-element">
                    <label class="form-label" for="userName">Full Name</label>
                    <input class="form-input" type="text" name="userName" id="userName"
                        placeholder="First Middle Last Name"
                        value="<?php if (isset($_POST['sign_up'])) echo $user_name; ?>" required />
                </div>
                <div class="form-element">
                    <label class="form-label" for="userMobile">Mobile No.</label>
                    <input class="form-input" type="number" name="userMobile" id="userMobile"
                        placeholder="Mobile Number" value="<?php if (isset($_POST['sign_up'])) echo $user_mobile; ?>"
                        required />
                </div>
                <div class="form-element">
                    <label class="form-label" for="userEmail">E-mail</label>
                    <input class="form-input" type="email" name="userEmail" id="userEmail"
                        placeholder="example123@gmail.com"
                        value="<?php if (isset($_POST['sign_up'])) echo $user_email; ?>" required />
                </div>
                <div class="form-element">
                    <label class="form-label" for="userPassword">Password</label>
                    <input class="form-input" type="password" name="userPassword" id="userPassword"
                        placeholder="Password" value="<?php if (isset($_POST['sign_up'])) echo $user_pass; ?>"
                        required />
                </div>
                <div class="form-element">
                    <label class="form-label" for="userConPassword">Confirm Password</label>
                    <input class="form-input" type="password" name="userConPassword" id="userConPassword"
                        placeholder="Confirm Password"
                        value="<?php if (isset($_POST['sign_up'])) echo $user_con_pass; ?>" required />
                   
                </div>

                <div class="form-element">
                    <label class="form-label" for="city">City</label>
                    <input class="form-input" type="text" name="city" id="city" placeholder="Your city"
                        value="<?php if (isset($_POST['sign_up'])) echo $city; ?>" required />
                </div>
                <div class="form-element">
                    <input class="form-input button submit-btn" type="submit" value="Sign Up" name="sign_up"
                        id="sign_up">
                </div>

                <hr class="form-line">
                <div class="sign-link">
                    <span>You have already account?</span>
                    <a href="_userLogin.php">Login</a>
                </div>
            </form>
        </div>
    </div>
    