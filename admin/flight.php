<?php include_once 'header.php'; ?>
<?php include_once 'footer.php'; ?>
<?php require '../helpers/init_conn_db.php'; ?>

<?php if(isset($_SESSION['adminId'])) { ?>

<style>
    body{
        background-color: #efefef;
    }
    .form-out {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
        background-color: whitesmoke !important;
    }
    input{
        border: 0 !important;
        border-bottom: 2px solid #5c5c5c !important;
        border-radius: 0px !important;
        background-color: whitesmoke !important;   
    }
    ::placeholder{
        font-weight: bold;
    }
</style>

<main>
    <div class="container">
        <div class="row">
            <?php 
            if(isset($_GET['error'])) {
                if($_GET['error'] === 'destless') {
                    echo "<script>alert('Destination date/time is less than source.');</script>";
                } else if($_GET['error'] === 'sqlerr') {
                  echo "<script>alert('Database error');</script>";
                } else if($_GET['error'] === 'same') {
                  echo "<script>alert('Same city specified in source and destination');</script>";
                }
            }
            ?>
            <div class="bg-light form-out col-md-12 p-4 mt-3">
                <h2 class="text-secondary text-center mb-5" 
                style="font-size: 35px;">ADD FLIGHT DETAILS</h2>
                <form action="../includes/admin/flight.pro.php"  method="post">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <h5 class="mb-0">DEPARTURE</h5>
                        </div>
                        <div class="col">
                            <input type="date" name="source_date" class="form-control shadow-none" required>
                        </div>
                        <div class="col">
                            <input type="time" name="source_time" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <h5 class="mb-0">ARRIVAL</h5>
                        </div>
                        <div class="col">
                            <input type="date" name = "dest_date" class="form-control shadow-none" required>
                        </div>
                        <div class="col">
                            <input type="time" name = "dest_time" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col">
                            <?php 
                            $sql = 'SELECT * FROM cities ';
                            $stmt = mysqli_stmt_init($conn);
                            mysqli_stmt_prepare($stmt,$sql);         
                            mysqli_stmt_execute($stmt);          
                            $result = mysqli_stmt_get_result($stmt);
                            echo '
                            <select class="form-select shadow-none mt-4 mb-2" name="dep_city" style="border: 0px; border-bottom: 
                            2px solid #5c5c5c; background-color: whitesmoke; font-weight: bold;">
                            <option selected>From</option>';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value='. $row['city']  .'>'. 
                                $row['city'] .'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col">
                            <?php 
                            $sql = 'SELECT * FROM cities ';
                            $stmt = mysqli_stmt_init($conn);
                            mysqli_stmt_prepare($stmt,$sql);         
                            mysqli_stmt_execute($stmt);          
                            $result = mysqli_stmt_get_result($stmt);
                            echo '
                            <select class="form-select shadow-none mt-4 mb-2" name="arr_city" style="border: 0px; border-bottom: 
                            2px solid #5c5c5c; background-color: whitesmoke; font-weight: bold;">
                            <option selected>To</option>';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value='. $row['city']  .'>'. 
                                  $row['city'] .'</option>';
                            }
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mt-5">
                            <input type="text" name="dura" id="dura" class="form-control shadow-none" 
                            placeholder="Duration" required>
                        </div>
                        <div class="col-md-4 mt-5">
                            <input type="number" name="price" id="price" class="form-control shadow-none" 
                            placeholder="Price" required style="border: 0px; border-bottom: 
                            2px solid #5c5c5c;">
                        </div>
                        <div class="col-md-4 mt-3">
                            <?php 
                            $sql = 'SELECT * FROM airline ';
                            $stmt = mysqli_stmt_init($conn);
                            mysqli_stmt_prepare($stmt,$sql);         
                            mysqli_stmt_execute($stmt);          
                            $result = mysqli_stmt_get_result($stmt);
                            echo '
                            <select class="col-md-4 form-select fw-bold shadow-none mt-4 pt-3" 
                            name="airline_name" style="border: 0px; 
                            border-bottom: 2px solid #5c5c5c; background-color: whitesmoke;">
                            <option selected>Select Airline</option>';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value='. $row['airline_id']  .'>'. 
                                $row['name'] .'</option>';
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" name="flight-btn" class="btn btn-success w-50">
                            <i class="fa fa-md fa-arrow-right"></i> Proceed
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php } ?>