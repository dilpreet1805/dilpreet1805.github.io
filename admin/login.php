<?php 

    include_once('../config.php');

    $select_login = mysqli_query($con,"SELECT * FROM `login`");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <title>Sreemari Cancer Centre</title>

        <link rel="icon" href="img/core-img/favicon.ico">

        <link rel="stylesheet" href="../css/core-style.css">
        <!-- <link rel="stylesheet" href="style.css"> -->

        <link rel="stylesheet" href="../css/responsive.css">
    </head>

    <body>

        <section class="medica-contact-area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12 login-area">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 col-md-6 col-md-3 col-sm-6 offset-sm-3 col-6 offset-3 logo-container">
                                <img src="../images/logo.png">
                            </div>
                        </div>
                        <form id="loginForm">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                </div>
                                <div class="col-12">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn medica-btn btn-3 mt-3" id="loginSubmit">Login</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-area">
                                    <p><span class="link" id="forgotPasswordLink">Forgot Password ?</span> Or <span class="link" id="signUpLink">Sign-up</span></p>
                                </div>
                            </div>
                        </form>
                        <form id="confirmOtp">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="form-control" name="username" id="otpUsername" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter Security Code" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn medica-btn btn-3 mt-3" id="otpSubmit">Confirm</button>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-12 text-area">
                                    <p><span class="link" id="resendLink">Resend OTP</span></p>
                                </div>
                            </div>
                        </form>
                        <form id="signUpForm">
                            <div class="row">
                                <?php 
                                    if(mysqli_num_rows($select_login) <= 0)
                                    {
                                ?>

                                <div class="col-12">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                </div>

                                <?php 
                                    }
                                ?>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="username" id="newusername" placeholder="Username" required>
                                </div>
                                <div class="col-12">
                                    <input type="password" class="form-control" name="password" id="newpassword" placeholder="Password" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn medica-btn btn-3 mt-3" id="signupSubmit">Signup</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-area">
                                    <p><span class="link" id="loginLink">Already have an account ? Login</span></p>
                                </div>
                            </div>
                        </form>
                        <form id="forgotPassword">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="form-control" name="username" id="forgotusername" placeholder="Enter Username" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn medica-btn btn-3 mt-3" id="forgotPasswordSubmit">Submit</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-area">
                                    <p><span class="link" id="cancelLink">Cancel</span></p>
                                </div>
                            </div>
                        </form>
                        <form id="changePassword">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="form-control" name="username" id="changeusername" placeholder="Enter Username" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="new_password" id="newPassword" placeholder="Enter New Password" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="otp" id="securityCode" placeholder="Enter Security Code" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn medica-btn btn-3 mt-3" id="changePasswordSubmit">Confirm</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-area">
                                    <p><span class="link" id="resendOTPLink">Resend OTP</span></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script src="../js/jquery/jquery-2.2.4.min.js"></script>

        <script src="../js/popper.min.js"></script>

        <script src="../js/bootstrap.min.js"></script>

        <script src="../js/plugins.js"></script>

        <script src="../js/active.js"></script>

        <script src="../js/admin.js"></script>

        <script src="../js/form.js"></script>

    </body>
</html>