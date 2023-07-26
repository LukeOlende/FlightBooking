<?php include_once 'header.php'; ?>
<style>
    body{
        background: #485563;
        background: linear-gradient(to left, #29323c, #485563);
    }
    input {
        background-color: whitesmoke !important;    
    }
    div.form-out{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
        background-color: whitesmoke !important;
    }
</style>

<main>
    <?php 
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'invalidcred') {
            echo '<script>alert("Invalid Credentials")</script>';
        } else if($_GET['error'] === 'wrongpwd') {
            echo '<script>alert("Wrong Password")</script>';
        } else if($_GET['error'] === 'sqlerror') {
            echo"<script>alert('Database error')</script>";
        }
    }
    ?>
    <div class="container mt-0">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="bg-light form-out col-md-6 mt-5">
                <h2 class="text-secondary text-center mt-3">ADMIN LOGIN</h2>
                <form action="../includes/admin/login.pro.php" method="post" class="m-4">
                    <div class="form-row">
                        <div class="col-10 mb-2 mx-auto">
                            <div>
                                <label for="user_id" class="form-label fw-bold">Username / Email:</label>
                                <input type="text" name="user_id" id="user_id" 
                                class="form-select shadow-none" required>
                            </div>
                        </div>
                        <div class="col-10 mb-2 mx-auto">
                            <div>
                                <label for="user_pass" class="form-label fw-bold">Password:</label>
                                <input type="password" name="user_pass" id="user_pass" 
                                class="form-select shadow-none" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col ms-5 mt-5">
                            <a class="btn btn-info" href="register.php" role="button">
                                Register
                            </a>
                        </div>
                        <div class="col ms-5 mt-5">
                            <button class="btn btn-success" name="login-btn" type="submit">
                                 Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</main>

<?php include_once 'footer.php'; ?>

