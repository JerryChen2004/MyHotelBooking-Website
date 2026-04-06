<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>My Hotel Booking - About Us</title>
        <?php require('inc/links.php')?>
 
        
        <style>
            .box:hover{
                border-top-color: var(--teal) !important;
                transform: scale(1.03);
                transition: all 0.3s;
            }
        </style>
    </head>

    <body>
        <!-- Header -->
        <?php require('inc/header.php')?>
        
        <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">About Us</h2>
            <hr>
            <p class="text-center mt-3">
            At My Hotel Booking, we are dedicated to making hotel reservations seamless and stress-free.
            <br>
            Our platform connects travelers with top accommodations worldwide, offering real-time availability, secure payments, and an easy booking experience.
            <br>
            Whether you're planning a getaway or managing hotel reservations, we provide a reliable and user-friendly solution tailored to your needs.
            </p>

            <div class="container">
                <div class="row jusitfy-content-start align-items-center">
                    <div class="col-lg-6 col-md-5 mb-4 order-1">
                        <h3 class="mb-3"> Welcome to My Hotel Booking</h3>
                        <p>
                            Your trusted hotel reservation platform designed to make booking accommodations simple, fast, and hassle-free. We connect travelers with a wide range of hotels, ensuring real-time availability, secure payments, and a seamless booking experience. Whether you're planning a business trip, a family vacation, or a weekend getaway, we provide the best options to suit your needs.                      
                        </p>
                    </div>
                </div>
                <div class="row justify-content-end align-items-center">
                    <div class="col-lg-6 col-md-5 mb-4 order-1">
                        <h3 class="mb-3"> Our Goal</h3>
                            <p>
                            Our mission is to make travel more accessible by offering an intuitive platform that helps users find, compare, and book hotels effortlessly. With a focus on convenience, security, and customer satisfaction, My Hotel Booking is your go-to solution for stress-free hotel reservations.
                            </p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                            <img src="images/about/room.svg" width="70px">
                            <h4 class="mt3">Mutiple Rooms</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                            <img src="images/about/customer.svg" width="70px">
                            <h4 class="mt3">100+ Customers</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                            <img src="images/about/review.svg" width="70px">
                            <h4 class="mt3">Good Reviews</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                            <img src="images/about/staff.svg" width="70px">
                            <h4 class="mt3">Profressional Staffs</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>   

        <!-- Footer -->   
        <?php require('inc/footer.php')?>

    </body>
</html>