<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php');    ?>
<style>
    body{
        font-family: 'Montserrat', sans-serif;
        background-image: url('images/bg.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        background-position: center;
    }
    h5{
        color: whitesmoke;
        font-size: 20px;
    }
    label{
        font-weight: bold;
    }
    </style>

    <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] === 'invalidemail') {
                echo '<script>alert("Invalid email")</script>';
            } elseif ($_GET['error'] === 'sqlerror') {
                echo"<script>alert('Database error')</script>";
            } elseif ($_GET['error'] === 'success') {
                echo"<script>alert('Thank you for your Feedback')</script>";
            }
        }
    ?>

    <!-- Main Section -->
    <main>
        <div class="container mb-4">
            <h2 class="text-dark text-center text-uppercase">
                <img src="images/feedback.png" width="65px" alt=""> Feedback</h2>
            <div class="row justify-content-center">
                <div class="col-md-6 bg-light p-3 rounded-3">
                    <form action="includes/feedback.inc.php" method="post">
                        <div class="row justify-content-center">
                            <div class="col-md-11 ">
                                <div class="form-group">
                                    <label for="user_id" class="form-label">Email:</label>
                                    <input type="email" class="form-control border-dark shadow-none" 
                                    id="user_id" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-11 mt-4">
                                <div class="form-group">
                                    <label for="#">What was your first impression when you entered 
                                        the website?</label>     
                                    <textarea class="form-control border-dark shadow-none" name="1"                
                                    rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-11 mt-4">
                                <div class="form-group">
                                    <select class="form-select border-dark shadow-none" name="2" required>
                                        <option selected disabled>How did you first hear about us?</option>
                                        <option value="1">Search Engine</option>
                                        <option value="2">Social Media</option>
                                        <option value="3">Family/Relative/Friend</option>
                                        <option value="4">Word of Mouth</option>
                                        <option value="5">Television</option>
                                        <option value="6">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-11 mt-4">
                                <div class="form-group">
                                    <label for="">Message:</label>
                                    <textarea class="form-control border-dark shadow-none" name="3" placeholder="Enter your comments..."               
                                    rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button name="feed_btn" class="btn btn-primary mt-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<footer>
  <?php subview('footer.php'); ?>
</footer>