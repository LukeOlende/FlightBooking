<?php include_once 'helpers/helper.php'; ?>
<?php 
	subview('header.php'); 
    require 'helpers/init_conn_db.php';                      
?> 	
	<style>
        body{
            /* background: linear-gradient(to left, #2c3e50, #bdc3c7); */
            background-image: url('images/bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            background-position: center;
        }
        button{
            font-family: 'Montserrat', sans-serif;
        }
        .card-header{
            font-weight: bold;
            font-size: 20px;
            justify-content: space-between;
        }
        .form-select:focus{
            outline: none !important;
        }
        a{
            text-decoration: none;
        }
        .intro{width:100%;background:#fff;z-index:1}
        .intro-container{width:100%;border-bottom:solid 2px #e4e6e8;padding:65px 0;}
        .intro_icon{width:70px;height:70px}
        .intro_icon img{max-width:100%}
    </style>

    <?php
        if(isset($_GET['error'])) {
            if($_GET['error'] === 'sameval') {
                echo '<script>alert("Select different value for departure city and arrival city")</script>';
            } else if($_GET['error'] === 'seldep') {
                    echo '<script>alert("Select Departure city")</script>';
            } else if($_GET['error'] === 'selarr') {
                echo"<script>alert('Select Arrival city')</script>";
            }
        }
    ?> 

    <section class="container-fluid ">
        <div class="">
            <h1 class="text-center text-dark fw-bold mt-5" style="font-size: 45px;">
                <img src="images/KQ.png" alt="" height="90px" width="90px">
                FLIGHT BOOKING</h1>
        </div>
        <div class="card col-md-7 mx-auto mt-3 mb-3 border-0 pb-3">
            <div class="card-header text-bg-secondary p-2">
                <ul class="nav nav-tabs card-header-tabs justify-content-center" data-bs-tabs="tabs">
                    <li class="nav-item text-uppercase me-5">
                        <a href="#round-trip" class="nav-link active text-dark" data-bs-toggle="tab">Round Trip</a>
                    </li>
                    <li class="nav-item text-uppercase ms-5">
                        <a href="#oneway" class="nav-link text-dark" data-bs-toggle="tab">Oneway</a>
                    </li>
                </ul>
            </div>
            <div class="card-body text-bg-light">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="round-trip">
                        <form action="book-flight.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="type" value="round">
                                    <label class="fs-5 fw-bold" for="from">From:</label>
                                        <?php 
                                            $sql = 'SELECT * FROM cities ';
                                            $stmt = mysqli_stmt_init($conn);
                                            mysqli_stmt_prepare($stmt,$sql);         
                                            mysqli_stmt_execute($stmt);          
                                            $result = mysqli_stmt_get_result($stmt);
                                            echo '<select class="form-select border-dark shadow-none" name="dep_city" id="w3_country1">
                                            <option value="0" selected disabled >Depature</option>';
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value='. $row['city']  .'>'. 
                                                    $row['city'] .'</option>';
                                                }
                                            ?>
                                        </select>
                                </div>
                                <div class="col">
                                    <label class="fs-5 fw-bold" for="from">To:</label>
                                        <?php 
                                            $sql = 'SELECT * FROM cities ';
                                            $stmt = mysqli_stmt_init($conn);
                                            mysqli_stmt_prepare($stmt,$sql);         
                                            mysqli_stmt_execute($stmt);          
                                            $result = mysqli_stmt_get_result($stmt);
                                            echo '<select class="form-select border-dark shadow-none" name="arr_city" id="w3_country1">
                                            <option value="0" selected disabled >Arrival</option>';
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value='. $row['city']  .'>'. 
                                                    $row['city'] .'</option>';
                                                }
                                            ?>
                                        </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <label for="depart" class="fs-5 fw-bold">Depart:</label>
                                    <input type="date" name="dep_date" class="form-control border-dark shadow-none"
                                    onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="return" class="fs-5 fw-bold">Return:</label>
                                    <input type="date" name="ret_date" class="form-control border-dark shadow-none" 
                                    onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required>
                                </div>
                                <div class="col">
                                    <label class="fs-5 fw-bold" for="class">Class:</label>
                                    <select class="form-select border-dark shadow-none" id="w3_country1"
                                    name="f_class" onchange="change_country(this.value)" required>
                                        <option value="E">Economy</option>
                                        <option value="B">Business</option>
                                        <option value="F">First</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3 mt-2">
                                    <label for="passengers" class="fs-5 fw-bold">Passenger(s):</label>
                                    <input type="number" name="passengers"  id="passengers" class="form-control border-dark shadow-none" required>
                                </div>
                                <div class="col mt-4 pt-2">
                                    <button type="submit" name="search_btn" class="btn btn-success p-2 float-end">Search Flights</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="oneway">
                        <form action="book-flight.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="type" value="one">
                                    <label class="fs-5 fw-bold" for="from">From:</label>
                                        <?php 
                                            $sql = 'SELECT * FROM cities ';
                                            $stmt = mysqli_stmt_init($conn);
                                            mysqli_stmt_prepare($stmt,$sql);         
                                            mysqli_stmt_execute($stmt);          
                                            $result = mysqli_stmt_get_result($stmt);
                                            echo '<select class="form-select border-dark shadow-none" name="dep_city" id="w3_country1">
                                            <option value="0" selected disabled >Depature</option>';
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value='. $row['city']  .'>'. 
                                                    $row['city'] .'</option>';
                                                }
                                            ?>
                                        </select>
                                </div>
                                <div class="col">
                                    <label class="fs-5 fw-bold" for="from">To:</label>
                                            <?php 
                                            $sql = 'SELECT * FROM cities ';
                                            $stmt = mysqli_stmt_init($conn);
                                            mysqli_stmt_prepare($stmt,$sql);         
                                            mysqli_stmt_execute($stmt);          
                                            $result = mysqli_stmt_get_result($stmt);
                                            echo '<select class="form-select border-dark shadow-none" name="arr_city" id="w3_country1">
                                            <option value="0" selected disabled >Arrival</option>';
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value='. $row['city']  .'>'. 
                                                    $row['city'] .'</option>';
                                                }
                                            ?>
                                        </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <label for="depart" class="fs-5 fw-bold">Depart:</label>
                                    <input type="date" name="dep_date" class="form-control border-dark shadow-none"
                                    onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required>
                                </div>
                                <div class="col-sm-2"> </div>
                                <div class="col">
                                    <label class="fs-5 fw-bold" for="class">Class:</label>
                                    <select class="form-select border-dark shadow-none" id="w3_country1"
                                    name="f_class" onchange="change_country(this.value)" required>
                                        <option value="E">Economy</option>
                                        <option value="B">Business</option>
                                        <option value="F">First</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3 mt-2">
                                    <label for="passengers" class="fs-5 fw-bold">Passenger(s):</label>
                                    <input type="number" name="passengers"  id="passengers" class="form-control border-dark shadow-none" required>
                                </div>
                                <div class="col mt-4 pt-2">
                                    <button type="submit" name="search_btn" class="btn btn-success p-2 float-end">Search Flights</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              
            </div>
        </div>
    </section>

    <footer class="mt-5">
        <?php subview('footer.php'); ?>
    </footer>

