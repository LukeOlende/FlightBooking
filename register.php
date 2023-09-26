<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>

<?php
if(isset($_GET['error'])) {
    if($_GET['error'] === 'invalidemail') {
        echo '<script>alert("Invalid email")</script>';
    } else if($_GET['error'] === 'pwdnotmatch') {
        echo '<script>alert("Passwords do not match")</script>';
    } else if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Database error')</script>";
    } else if($_GET['error'] === 'usernameexists') {
        echo"<script>alert('Username already exists')</script>";
    } else if($_GET['error'] === 'emailexists') {
        echo"<script>alert('Email already exists')</script>";
    }
}
?>

<style>
    body{
        font-family: 'Montserrat', sans-serif;
        background-image: url('images/bg.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        background-position: center;
    }
    label{font-weight: 600;}
</style>

    <main>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 bg-light p-4">
                    <h1 class="text-secondary text-center text-uppercase mt-2 mb-4 fw-bold">Passenger Registration</h1>
                    <div class="register-form ">
                        <form class="m-3" method="POST" action="includes/register.inc.php" 
                        autocomplete="off">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-1">
                                            <label for="username">Username:</label>
                                            <input type="text" class="form-control shadow-none" name="username" id="username" required />                                
                                        </div>  
                                    </div>
                                    <div class="col-md">
                                        <div class="mb-1">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control shadow-none" name="email" id="email" required>                                         
                                        </div>                                     
                                    </div>                        
                                </div>
                                <div class="row mt-3">             
                                    <div class="col-md">
                                        <div class="mt-2">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control shadow-none"
                                            name="password" id="password"            
                                            required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                            title="Must contain at least one number and one uppercase and lowercase letter,
                                            and at least 8 or more characters" />                                        
                                        </div>                                     
                                    </div>          
                                    <div class="col-md">
                                        <div class="mt-2">
                                            <label for="password_repeat">Confirm password:</label>
                                            <input type="password" class="form-control shadow-none" 
                                            name="password_repeat" id="password_repeat" required>
                                        </div>                                     
                                    </div>                                                                                                  
                                </div>
                                <div class="text-center">
                                    <button name="signup_btn" type="submit" class="btn btn-success fs-4 mt-5">
                                        Sign Up  
                                    </button>                            
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </main>