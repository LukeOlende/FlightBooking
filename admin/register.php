<?php include_once 'header.php'; 
 //require '../helpers/init_conn_db.php';?>

<style>
    body{
        background: #485563;
        background: linear-gradient(to left, #29323c, #485563);
    }
    label{
        font-weight: 600;
    }
</style>

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

    <main>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 bg-light p-4">
                    <h1 class="text-secondary text-center mt-2 mb-4 fw-bold">ADMIN REGISTRATION</h1>
                    <div class="register-form ">
                        <form class="m-3" method="POST" action="../includes/admin/register.pro.php" 
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
                                    <button name="signup_submit" type="submit" class="btn btn-success mt-5 w-25"
                                    style="font-size: 20px;">
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