<?php
include_once 'helpers/helper.php';
subview('header.php');
require 'helpers/init_conn_db.php';
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
  h2.brand { font-size: 27px !important; }
  p.head { text-transform: uppercase; font-family: arial; font-size: 17px; margin-bottom: 10px; color: grey; }
  .help-content {
    margin: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
  h2.help-title {
    font-size: 30px !important;
    margin-bottom: 20px;
  }
  p.help-text {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 15px;
  }
  
</style>

<main>
  <div class="container">
  <h3>Welcome Kenya Airways Help Desk</h2>
      <p class="help-text">Our online help desk is here to provide you with information and guidance on how to use our flight booking system effectively. Whether you're booking a flight, managing your bookings, or exploring our services, we're here to assist you every step of the way.</p>

    <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          How to Book a Flight
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <strong>Booking a flight with us is simple. Follow these steps:</strong>
        <ol>
          <li>Select your departure and arrival cities from the dropdown menus.</li>
          <li>Pick your departure and return dates.</li>
          <li>Choose your preferred class: Economy, Business, or First.</li>
          <li>Specify the number of passengers travelling.</li>
          <li>Click the "Search Flights" button to find available flights.</li>
        </ol>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Managing Your Tickets
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <strong>Once you've booked a ticket, you can manage it in the Tickets section of your account. Here's what you can do:</strong>
        <ul>
          <li>Cancel a ticket if your plans change.</li>
          <li>Print your e-ticket for boarding.</li>
        </ul>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Our Commitment
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <strong >We are committed to providing you with the best flight booking experience. If you have any questions or need further assistance, 
          please don't hesitate to <a href="contact.php">contact us</a>. We're here to make your journey enjoyable and hassle-free.</strong>
        </div>
      </div>
    </div>
  </div>
  </div>
</main>
<footer class="mt-5">
  <?php subview('footer.php'); ?>
</footer>

<?php
// Close the database connection
mysqli_close($conn);
?>
