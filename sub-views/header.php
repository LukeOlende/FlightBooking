<?php 
    session_start(); 
?>
<!doctype html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Booking</title>

    <link rel="icon" href="images/take-off.png" type="image/x-icon">

    <!--  Text Font  -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <!--  Font-Awesome Icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
      crossorigin="anonymous">

    <style>
        body{
        font-family: 'Montserrat', sans-serif;
        background: #2c3e50;
      }
    </style>

</head>
<body>
<nav class="navbar mb-3 navbar-expand-lg bg-secondary bg-transparent">

    <button class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-2">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">
              <h5 class="text-light">Home</h5>
            </a>
          </li>

          <!--Links Appear Once User Logs In -->
          <?php if(isset($_SESSION['userId'])) { ?>
            <li class="nav-item">
            <a class="nav-link" href="my_flights.php">
              <h5 class="text-light">My Flights</h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ticket.php">
              <h5 class="text-light">Tickets</h5>
            </a>
          </li>
          <?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="feedback.php">
              <h5 class="text-light">Feedback</h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <h5 class="text-light">About Us</h5>
            </a>
          </li>
        <?php 
          if(isset($_SESSION['userId'])) {
            echo '
            <div class="d-flex" style="margin-left: 400px;">
              <li class="nav-item d-flex">
                <span class="navbar-brand mb-0 text-light">
                  <i class="me-1 ms-1 fa fa-user text-light"></i>'.$_SESSION['userUid'].'
                </span>
              </li>
              <li class="nav-item">
                <form action="includes/logout.inc.php" class="d-flex" method="POST">
                  <button class="btn btn-secondary ms-3" type="submit">
                    Logout
                  </button>             
                </form>
              </li>
            </div>
            </ul>
            ';
          } else {
            echo '
            <div class="dropdown d-flex" style="margin-left:700px">
              <button class="btn btn-secondary dropdown-toggle" type="button" 
              data-bs-toggle="dropdown">
              Log in</button>
                <ul class="dropdown-menu w-75">
                  <li><a class="dropdown-item" href="login.php">Passenger</a></li>
                  <li><a class="dropdown-item" href="admin/login.php">Administator</a></li>
                </ul>
            </div>';
          }
        ?>
  </div>
</nav>

