<?php
define('TITLE', "Login");

session_start();

require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';
require '../assets/includes/auth_functions.php';
require '../assets/includes/security_functions.php';

if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();
check_logged_out();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo APP_DESCRIPTION;  ?>">
    <meta name="author" content="<?php echo APP_OWNER;  ?>">
    <title><?php echo TITLE . ' | ' . APP_NAME; ?></title>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome-5.12.0/css/all.min.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="stylesheet" href="custom.css" >
    <script src="../assets/vendor/js/jquery-3.4.1.min.js"></script>
</head>

<body style="background-image: url(../assets/images/VideoPage.png);background-size: cover;background-repeat: no-repeat;">
<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form class="form-auth" action="includes/login.inc.php" method="post">
                    <?php insert_csrf_token(); ?>
                    <div class="text-center">
                        <img class="mb-1" src="../assets/images/logo.png" alt="" width="130" height="130">
                    </div>
                    <h6 class="h3 mb-3 font-weight-normal text-muted text-center">Login to your Account</h6>
                    <div class="text-center mb-3">
                        <small class="text-success font-weight-bold">
                            <?php
                            if (isset($_SESSION['STATUS']['loginstatus']))
                                echo $_SESSION['STATUS']['loginstatus'];

                            ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                        <sub class="text-danger">
                            <?php
                            if (isset($_SESSION['ERRORS']['nouser']))
                                echo $_SESSION['ERRORS']['nouser'];
                            ?>
                        </sub>
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        <sub class="text-danger">
                            <?php
                            if (isset($_SESSION['ERRORS']['wrongpassword']))
                                echo $_SESSION['ERRORS']['wrongpassword'];
                            ?>
                        </sub>
                    </div>
                    <div class="col-auto my-1 mb-4">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="rememberme" name="rememberme">
                            <label class="custom-control-label" for="rememberme">Remember me</label>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="loginsubmit" name="loginsubmit">Login</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="col-sm-3">
    </div>
</div>
</body>
<?php

include '../assets/layouts/footer.php'

?>