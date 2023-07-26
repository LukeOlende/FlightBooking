<?php include_once 'header.php'; 
require '../helpers/init_conn_db.php';?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">

<style>
    body{
        background-color: #efefef;
        font-family: 'Open Sans', sans-serif;
    }
</style>

<main>
    <?php if(isset($_SESSION['adminId'])) { ?>
        <div class="container">
            <div class="main-section">
                <div class="row row-cols-1 row-cols-sm-4 g-2 mt-4">
                    <div class="col">
                        <div class="card text-bg-warning mb-3">
                            <div class="card-body">
                                <i class="fa fa-lg fa-users" aria-hidden="true"></i><br>
                                <h5 class="card-title mt-2">Total Passengers</h5>
                                <p class="card-text"><?php include 'psngrctrl.php';?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-bg-success mb-3">
                            <div class="card-body">
                                <i class="fa fa-lg fa-money" aria-hidden="true"></i><br>
                                <h5 class="card-title mt-2">Amount</h5>
                                <p class="card-text">$ <?php include 'amtctrl.php';?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-bg-danger mb-3">
                            <div class="card-body">
                                <i class="fa fa-lg fa-plane" aria-hidden="true"></i><br>
                                <h5 class="card-title mt-2">Flights</h5>
                                <p class="card-text"><?php include 'flightsctrl.php';?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-bg-primary mb-3">
                            <div class="card-body">
                                <i class="fa fa-lg fa-plane fa-rotate-180" aria-hidden="true"></i><br>
                                <h5 class="card-title mt-2">Available Airlines</h5>
                                <p class="card-text"><?php include 'airlctrl.php';?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4" id="flight">
                <div class="card-body">
                    <div class="dropdown" style="float: right;">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" 
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-filter"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#flight">Today's flights</a></li>
                            <li><a class="dropdown-item" href="#issue">Today's flight issues</a></li>
                            <li><a class="dropdown-item" href="#dep">Flights departed today</a></li>
                            <li><a class="dropdown-item" href="#arr">Flights arrived today</a></li>
                        </ul>
                    </div>
                    <p class="text-secondary">Today's Flights</p>
                    <table class="table table-sm table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Arrival</th>
                                <th scope="col">Departure</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Source</th>
                                <th scope="col">Airline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php 
                            $curr_date = (string)date('y-m-d');
                            $curr_date = '20'.$curr_date;
                            $sql = "SELECT * FROM flight WHERE DATE(departure)=?";
                            $stmt = mysqli_stmt_init($conn);
                            mysqli_stmt_prepare($stmt,$sql);
                            mysqli_stmt_bind_param($stmt,'s',$curr_date);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['status']== '') {
                                    echo '
                                    <td scope="row">
                                    <a href="pass-list.php?flight_id='.$row['flight_id'].'" style="text-decoration:underline;">
                                    '.$row['flight_id'].' </a> </td>
                                    <td>'.$row['arrival'].'</td>
                                    <td>'.$row['departure'].'</td>
                                    <td>'.$row['destination'].'</td>
                                    <td>'.$row['source'].'</td>
                                    <td>'.$row['airline'].'</td> 
                                    <th class="options">
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button" 
                                        id="dropdownMenuButton" data-toggle="dropdown" 
                                            aria-haspopup="true" aria-expanded="false">

                                        <i class="fa fa-ellipsis-v"></i> </td>
                                        </button>  
                                        <div class="dropdown-menu">
                                        <form class="px-4 py-3"  action="../includes/admin/admin.pro.php" method="post">
                                            <input type="hidden" type="number" name="flight_id" 
                                            value='.$row['flight_id'].'>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Enter time in min.</label>
                                                <input type="number" class="form-control" name="issue" 
                                                    placeholder="Eg. 120">
                                            </div>  
                                            <button type="submit" name="issue-btn" 
                                                class="btn btn-danger btn-sm">Submit issue
                                            </button>
                                            <div class="dropdown-divider"></div>
                                            <button type="submit" name="dep-btn" 
                                            class="btn btn-primary btn-sm">Departed</button>
                                        </form>
                                        </div>
                                        </div>  
                                        </th>                
                                        //</tr>
                                        ';
                                    }}
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-4" id="issue">
                <div class="card-body">
                    <div class="dropdown" style="float:right;">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" 
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-filter"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#flight">Today's flights</a></li>
                            <li><a class="dropdown-item" href="#issue">Today's flight issues</a></li>
                            <li><a class="dropdown-item" href="#dep">Flights departed today</a></li>
                            <li><a class="dropdown-item" href="#arr">Flights arrived today</a></li>
                        </ul>
                    </div>
                    <p class="text-secondary">Today's Flight Issues</p>
                    <table class="table table-sm table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Arrival</th>
                                <th scope="col">Departure</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Source</th>
                                <th scope="col">Airline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $curr_date = (string)date('y-m-d');
                                $curr_date = '20'.$curr_date;
                                $sql = "SELECT * FROM flight WHERE DATE(departure)=?";
                                $stmt = mysqli_stmt_init($conn);
                                mysqli_stmt_prepare($stmt,$sql);
                                mysqli_stmt_bind_param($stmt,'s',$curr_date);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if($row['status']=='issue') {
                                        echo '
                                        <td scope="row">
                                            <a href="pass-list.php?flight_id='.$row['flight_id'].'">
                                            '.$row['flight_id'].' </a> </td>
                                        <td>'.$row['arrival'].'</td>
                                        <td>'.$row['departure'].'</td>
                                        <td>'.$row['destination'].'</td>
                                        <td>'.$row['source'].'</td>
                                        <td>'.$row['airline'].'</td> 
                                        <th class="options">
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" 
                                            id="dropdownMenuButton" data-toggle="dropdown" 
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i> </td>
                                            </button>  
                                            <div class="dropdown-menu">
                                            <form class="px-4 py-3"  action="../includes/admin/admin.pro.php" method="post">
                                                <input type="hidden" type="number" name="flight_id" 
                                                value='.$row['flight_id'].'>  
                                                <button type="submit" name="issue-solved-btn" 
                                                class="btn btn-danger btn-sm">Issue Solved!</button>
                                            </form>
                                            </div>
                                        </div>  
                                        </th>                
                                        // </tr>
                                        ';
                                    }}
                                ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-4" id="dep">
                <div class="card-body">
                    <div class="dropdown" style="float: right;">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" 
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-filter"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#flight">Today's flights</a></li>
                            <li><a class="dropdown-item" href="#issue">Today's flight issues</a></li>
                            <li><a class="dropdown-item" href="#dep">Flights departed today</a></li>
                            <li><a class="dropdown-item" href="#arr">Flights arrived today</a></li>
                        </ul>
                    </div>
                    <p class=" text-secondary">Flights Departed Today</p>
                    <table class="table table-sm table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Arrival</th>
                                <th scope="col">Departure</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Source</th>
                                <th scope="col">Airline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                $curr_date = (string)date('y-m-d');
                                $curr_date = '20'.$curr_date;
                                $sql = "SELECT * FROM flight WHERE DATE(departure)=?";
                                $stmt = mysqli_stmt_init($conn);
                                mysqli_stmt_prepare($stmt,$sql);
                                mysqli_stmt_bind_param($stmt,'s',$curr_date);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                while($row = mysqli_fetch_assoc($result)) {
                                    if($row['status']=='dep') {
                                        echo '
                                        <td scope="row">
                                            <a href="pass_list.php?flight_id='.$row['flight_id'].'">
                                            '.$row['flight_id'].' </a> </td>
                                        <td>'.$row['arrival'].'</td>
                                        <td>'.$row['departure'].'</td>
                                        <td>'.$row['destination'].'</td>
                                        <td>'.$row['source'].'</td>
                                        <td>'.$row['airline'].'</td> 
                                        <th class="options">
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" 
                                            id="dropdownMenuButton" data-toggle="dropdown" 
                                                aria-haspopup="true" aria-expanded="false">

                                            <i class="fa fa-ellipsis-v"></i> </td>
                                            </button>  
                                            <div class="dropdown-menu">
                                            <form class="px-4 py-3"  action="../includes/admin/admin.pro.php" method="post">
                                                <input type="hidden" type="number" name="flight_id" 
                                                value='.$row['flight_id'].'>  
                                                <button type="submit" name="arr-btn" 
                                                class="btn btn-danger">Arrived</button>
                                            </form>
                                            </div>
                                        </div>  
                                        </th> 
                                        // </tr>
                                        ';
                                    }}
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-4 mb-4" id="arr">
                <div class="card-body">
                    <div class="dropdown" style="float: right;">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" 
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-filter"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#flight">Today's flights</a></li>
                            <li><a class="dropdown-item" href="#issue">Today's flight issues</a></li>
                            <li><a class="dropdown-item" href="#dep">Flights departed today</a></li>
                            <li><a class="dropdown-item" href="#arr">Flights arrived today</a></li>
                        </ul>
                    </div>
                    <p class=" text-secondary">Flights Arrived Today</p>
                    <table class="table table-sm table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Arrival</th>
                                <th scope="col">Departure</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Source</th>
                                <th scope="col">Airline</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                $curr_date = (string)date('y-m-d');
                                $curr_date = '20'.$curr_date;
                                $sql = "SELECT * FROM flight WHERE DATE(departure)=?";
                                $stmt = mysqli_stmt_init($conn);
                                mysqli_stmt_prepare($stmt,$sql);
                                mysqli_stmt_bind_param($stmt,'s',$curr_date);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                while($row = mysqli_fetch_assoc($result)) {
                                    if($row['status']=='arr') {
                                        echo '
                                        <td scope="row">
                                            <a href="pass-list.php?flight_id='.$row['flight_id'].'">
                                            '.$row['flight_id'].' </a> 
                                        </td>
                                        <td>'.$row['arrivale'].'</td>
                                        <td>'.$row['departure'].'</td>
                                        <td>'.$row['destination'].'</td>
                                        <td>'.$row['source'].'</td>
                                        <td>'.$row['airline'].'</td>                
                                        //</tr>
                                        ';
                                    }}
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } ?>
</main>
<?php include_once 'footer.php'; ?>