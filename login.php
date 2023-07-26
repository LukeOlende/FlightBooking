<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<?php
// if(isset($_GET['pwd'])) {
//     if($_GET['pwd']=='updated') {
//         echo "<script>alert('Your password has been reset!!');</script>";
//     }
// }    
?>
<!-- Login Section -->
<div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="bg-light col-md-6 p-4" style="border-radius: 20px;">
                <h2 class="text-secondary text-center mb-4 fw-bold fs-1">LOG-IN PANEL</h2>
                <form class="m-3" action="includes/login.inc.php" method="post" 
                autocomplete="off">
                    <div class="row justify-content-center">
                        <div class="col-10 mb-2 mt-3">
                            <label for="user_id" class="form-label fw-bold">Username / Email:</label>
                            <input type="text" class="form-control shadow-none" name="user_id" id="user_id" required>
                        </div>
                        <div class="col-10 mb-2">
                            <label for="user_pass" class="form-label fw-bold">Password:</label>
                            <input type="password" class="form-control shadow-none" name="user_pass" id="user_pass" required>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-10">
                            <a href="reset-pwd.php" id="reset-pass" class="float-end text-decoration-none">Reset Password</a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col ms-5 mt-3">
                            <a class="btn btn-info" href="register.php" role="button"
                            style="width: 120px;">Register</a>
                        </div>
                        <div class="col ms-5 mt-3">
                            <button class="btn btn-success" name="login_btn" type="submit"
                            style="width: 120px;">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

