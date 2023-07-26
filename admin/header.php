<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Booking</title>

    <link rel="icon" href="../images/take-off.png" type="image/x-icon">
    <!--  Text Font    -->
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <!--  Font-Awesome Icons    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  Bootstrap    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
      crossorigin="anonymous">

    <style>
        body{
        font-family: 'Open Sans', sans-serif;
        /* background-color: #3a3a3a; */
      }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <a class="navbar-brand text-light ms-3" href="index.php"><h4>ADMIN PANEL</h4></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
            aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <!-- Appears When Admin Logs in -->
        <?php if(isset($_SESSION['adminId'])) { ?>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-light">
                        <h5 class="ms-2">Dashboard</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="flight.php" class="nav-link text-light">
                        <h5 class="ms-2">Add Flight</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="all-flights.php" class="nav-link text-light">
                        <h5 class="ms-2">List Flights</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="list-airlines.php" class="nav-link text-light">
                        <h5 class="ms-2">Manage Airline</h5>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                    <div class="dropdown mt-2">
                        <button class="btn bg-transparent text-white fs-5" type="button" 
                        data-bs-toggle="modal" data-bs-target="#airlineModal">
                            <i class="fa fa-plus text-white"></i> Airline
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="airlineModal" tabindex="-1" aria-labelledby="airlineModalLabel" 
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="../includes/admin/airline.pro.php" method="post">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="airlineModalLabel">Add Airline</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" name="airline" placeholder="Airline Name">
                                        <input type="number" class="form-control mt-3" name="seats" placeholder="Total Seats">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="air-btn" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item mt-2 border-light">
                    <a href="#" class="nav-link">
                        <i class="fa fa-user text-light"></i>
                        <span class="text-light fs-5">
                          <?php echo  $_SESSION['adminUname']; ?>
                        </span>
                    </a>
                </li>
            </ul>
            <form action="../includes/logout.inc.php" method="post">
                <button class="btn btn-outline-light m-2" type="submit">Logout</button>
            </form>
        </div>
        <?php } ?>
        
    </nav>

