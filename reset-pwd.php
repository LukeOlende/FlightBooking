<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>

<style>
    h2{
        font-size:38px !important;
        margin-top:20px;
    }
    .login-form {
    	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    	border-radius: 10px;
        background-color: whitesmoke;
    }
    input::placeholder{
        color: black;
    }
</style>

    <main>
        <div class="container">
            <div class="login-form m-5 p-3" >
                <h2 class="text-center text-secondary mb-4">Reset Password</h2>
                <div class="alert text-center alert-info mb-0" style="margin-left: 60px;"
                role="alert">
                    An email will be sent to you with instructions on how to reset your password
                </div>
                <form action="includes/reset-request.inc.php" method="post">
                    <div class="container mt-5">
                        <div>
                            <label for="user_email" class="form-label fw-bold">Email Address:</label>
                            <input type="text" name="user_email" placeholder="Enter Your Registered Email Address"
                            class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button name="reset-req-submit" class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <?php 
        if(isset($_GET['err']) || isset($_GET['mail'])) {
            if ($_GET['err'] === 'invalidemail') {
                echo '<script>alert("Invalid email");</script>';
            } elseif ($_GET['err'] === 'sqlerr') {
                echo '<script>alert("An error occured");</script>';
            } elseif ($_GET['mail'] === 'success') {
                echo '<script>alert("Email has been succesfully sent to you");</script>';
            } elseif ($_GET['err'] === 'mailerr') {
                echo '<script>alert("An error occured");</script>'; 
            }
        }
        ?>
    </main>