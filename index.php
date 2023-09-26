<?php include_once 'helpers/helper.php'; ?>
<?php 
	subview('header.php'); 
    require 'helpers/init_conn_db.php';                      
?> 	
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        font-family: 'Montserrat', sans-serif;
        background-image: url('images/bg.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        background-position: center;
    }
    .carousel-item {
        height: 350px;
    }
</style>

    <section>
        <div class="container text-center" >
            <img src="images/KQ.png" width="100px" alt="">
            <h1 class="d-inline" style="font-size: 45px; font-weight: 800;">Online Booking System</h1> 
        </div>

        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/airline-loyalty.jpg" class="d-block w-100" alt="..." >
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-warning fw-bold">Kenya Airways Rewards</h3>
                        <p class="fw-bold text-light">Signup for the Kenya Airways Loyalty Program <br> and Earn Points With Each Trip</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/seats.jpg" class="d-block w-100" alt="..." >
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-warning fw-bold">Seats</h3>
                        <p class="fw-bold">Extra Legroom, Extra Space, Extra Easy On All <br> Classes From Economy To Executive </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/transfer-aeroporti.jpg" class="d-block w-100" alt="..." >
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-warning fw-bold">Airport Transfer</h3>
                        <p class="fw-bold text-capitalize">let us know where you are arriving or where you are leaving from, <br> and we will arrange your transfer to or from the hotel! </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section>
        <div class="container-fluid p-5" style="background: whitesmoke;margin-top: 150px;">
            <div class="intro">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="intro-container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class=" d-flex flex-row align-items-end justify-content-start">
                                            <div class="intro_icon">
                                                <img src="images/flight.png" width="50px"  alt="">
                                            </div>
                                            <div class="mx-1">
                                                <div class="fw-bold" style="font-size: 20px;">Top Destinations</div>
                                                <div class="">
                                                    <p>Travel to your favourite places worldwide </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class=" d-flex flex-row align-items-end justify-content-start">
                                            <div class="intro_icon">
                                                <img src="images/wallet.png" width="50px" alt="">
                                            </div>
                                            <div class="mx-2">
                                                <div class="fw-bold" style="font-size: 20px;">Affordable Prices</div>
                                                <div class="">
                                                    <p>Visit your favorite destinations at a reasonable price</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex flex-row align-items-end justify-content-start">
                                            <div class="intro_icon">
                                                <img src="images/service.png" width="50px" alt="">
                                            </div>
                                            <div class="mx-2">
                                                <div class="fw-bold" style="font-size: 20px;">Amazing Services</div>
                                                <div class="">
                                                    <p>Great interactions begin with knowing your customers' needs.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="mt-5">
        <?php subview('footer.php'); ?>
    </footer>
