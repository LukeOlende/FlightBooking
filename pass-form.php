<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<style>
    body{
        font-family: 'Montserrat', sans-serif;
        background-image: url('images/bg.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        background-position: center;
    }
    .main-col {
        background-color: whitesmoke;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);   
    }
    .pass-form {
        background-color: white;
        border: 2px dotted black;
    }
    input {
        border :0px !important;
        border-bottom: 2px solid #424242 !important;
        color :#424242 !important;
        border-radius: 0px !important; 
        margin-bottom: 10px;
    }
    label {
        font-weight: bold;
        text-transform: uppercase;
    }
</style>

<?php 
    if (isset($_GET['error'])) {
        if ($_GET['error'] === 'invdate') {
            echo '<script>alert("Invalid date of birth")</script>';
        } elseif ($_GET['error'] === 'moblen') {
            echo '<script>alert("Invalid contact info")</script>';
        } elseif ($_GET['error'] === 'sqlerror') {
            echo"<script>alert('Database error')</script>";
        }
    }
?>
<?php 
    if (isset($_SESSION['userId']) && isset($_POST['book-btn'])) {
        $flight_id = $_POST['flight_id'];
        $passengers = $_POST['passengers'];
        $price = $_POST['price'];
        $class = $_POST['class'];
        $type = $_POST['type'];
        $ret_date = $_POST['ret_date'];
?>

    <main>
        <div class="container mb-5">
            <div class="col-md-12 p-3 mt-4 main-col">
                <h2 class="text-center text-secondary text-uppercase">Passenger Details</h2>
                <form action="includes/pass_detail.inc.php" method="post">
                    <input type="hidden" name="type" value=<?php echo $type; ?>>
                    <input type="hidden" name="ret_date" value=<?php echo $ret_date; ?>>
                    <input type="hidden" name="class" value=<?php echo $class; ?>>
                    <input type="hidden" name="passengers" value=<?php echo $passengers; ?>>
                    <input type="hidden" name="price" value=<?php echo $price; ?>>
                    <input type="hidden" name="flight_id" value=<?php echo $flight_id; ?>>
                <?php for($i=1;$i<=$passengers;$i++) {
                    echo '
                    <div class="pass-form mt-4 p-4">
                        <div class="row">
                            <div class="col-md">
                                <div>
                                    <label for="firstname'.$i.'" class="form-label">First Name: </label>
                                    <input type="text" name="firstname[]" id="firstname'.$i.'" class="form-control shadow-none"
                                    required style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md">
                                <div>
                                    <label for="midname'.$i.'" class="form-label">Middle Name: </label>
                                    <input type="text" name="midname[]" id="midname'.$i.'" class="form-control shadow-none"
                                    style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md">
                                <div>
                                    <label for="lastname'.$i.'" class="form-label">Last Name: </label>
                                    <input type="text" name="lastname[]" id="lastname'.$i.'" class="form-control shadow-none"
                                    required style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div>
                                    <label for="mobile'.$i.'" class="form-label">Contact No: </label>
                                    <input type="number" name="mobile[]" min="0" id="mobile'.$i.'"
                                    class="form-control shadow-none" required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div>
                                    <label for="dob" class="form-label">DOB: </label>
                                    <input type="date" name="date[]" min="0" id="date"
                                    class="form-control shadow-none" required>
                                </div>
                            </div>
                        </div>
                    </div>'; } ?>
                    <div class="col text-center mt-5">
                        <button name="pass_btn" class="btn btn-success w-25" type="submit">
                            Proceed
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

<?php } ?>
