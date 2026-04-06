<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>My Hotel Booking - Home</title>
        <?php require('inc/links.php')?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
        
        <style>
        </style>
    </head>

    <body>
        <!-- Header -->
        <?php require('inc/header.php')?>
        
        <!-- Swiper -->
        <div class="container-fluid px-lg-4 mt-4">
            <div class="swiper mySwiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="images/carousel/1.png" class="w-100 d-block" style="height: 500px;">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/carousel/2.png" class="w-100 d-block" style="height: 500px;">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/carousel/3.png" class="w-100 d-block" style="height: 500px;">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/carousel/4.png" class="w-100 d-block" style="height: 500px;">
                    </div>
                </div>
            </div>
        </div>
          
        <div class="container ">

            <div class="col-lg-12 text-center mt-5 ">
                <a href="rooms.php"><button tyoe="submit" class="btn text-white shadoe-none custom-bg">Start Booking</button></a>
            </div>
            </div>
        </div>
        <hr>

        <!-- Our Rooms -->
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Our Rooms</h2>
        <div class="container">
            <div class="row">
                <!-- Room 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <img src="images/rooms/marriott1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5>Marriott Room 1</h5>
                            <h6 class="mb-4">€50 per night</h6>
                            <div class="hotel mb-4">
                                <h6 class="mb-1">Hotel</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Marriott
                                </span>
                            </div>
                            <div class="feature mb-4">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   1 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   1 King Size Bed
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   1 Bathroom
                                </span>
                            </div>
                            <div class="facilities mb-4">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   TV
                                </span>                           
                            </div>
                            <div class="guests mb-4">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Children
                                    </span>
                            </div>
                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-evenly">
                                <a href="marriott.php" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                            </div>
                        </div>  
                    </div>
                </div>
                <!-- Room 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <img src="images/rooms/hilton1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5>Hilton Room 1</h5>
                            <h6 class="mb-4">€50 per night</h6>
                            <div class="hotel mb-4">
                                <h6 class="mb-1">Hotel</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Hilton
                                </span>
                            </div>
                            <div class="feature mb-4">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   1 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   1 King Size Bed
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   1 Bathroom
                                </span>
                            </div>
                            <div class="facilities mb-4">
                                    <h6 class="mb-1">Facilities</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Wifi
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    AC
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    TV
                                    </span>
                            </div>
                            <div class="guests mb-4">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Children
                                    </span>
                            </div>
                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-evenly">
                                <a href="hilton.php" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                            </div>
                        </div>  
                    </div>
                </div>
                <!-- Room 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <img src="images/rooms/hyatt1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5>Hyatt Rooms 1</h5>
                            <h6 class="mb-4">€50 per night</h6>
                            <div class="hotel mb-4">
                                <h6 class="mb-1">Hotel</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Hyatt
                                </span>
                            </div>
                            <div class="feature mb-4">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   1 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   1 King Size Bed
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                   1 Bathroom
                                </span>
                            </div>
                            <div class="facilities mb-4">
                                    <h6 class="mb-1">Facilities</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Wifi
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    AC
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    TV
                                    </span>
                            </div>
                            <div class="guests mb-4">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Children
                                    </span>
                            </div>
                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-evenly">
                                <a href="hyatt.php" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                            </div>
                        </div>  
                    </div>
                </div>
                
                <div class="col-lg-12 text-center mt-5">
                    <a href="rooms.php" class="btn btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms</a>
                </div>
            </div>
        </div>
        <hr>

        <!-- Facilities -->
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Our Facilities</h2>
        <div class="container">
            <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
                <div class="col-lg-2 col=md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/features/wifi.svg" width="80px">
                    <h5 class="mt-3">Wifi</h5>
                </div>
                <div class="col-lg-2 col=md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/features/ac.svg" width="80px">
                    <h5 class="mt-3">AC</h5>
                </div>
                <div class="col-lg-2 col=md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/features/sanitizer.svg" width="80px">
                    <h5 class="mt-3">Hand Sanitizer</h5>
                </div>
                <div class="col-lg-2 col=md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/features/tv.svg" width="80px">
                    <h5 class="mt-3">TV</h5>
                </div>
                <div class="col-lg-12 text-center mt-5">
                    <a href="facilities.php" class="btn btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities</a>
                </div>
            </div>
        </div>
        <hr>

        <!-- Testimonials -->
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Testimonials</h2>
        <div class="container">
            <div class="swiper swiper-testimonials">
                <div class="swiper-wrapper">
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center p-4">
                            <img src="images/features/star.svg" width="30px">
                            <h6 class="m-0 ms-2">Random User</h6>
                        </div>
                        <p>
                            I loved my stay here! The rooms were spacious and well-maintained. The concierge was very helpful in booking local tours. Would definitely come back!
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center p-4">
                            <img src="images/features/star.svg" width="30px">
                            <h6 class="m-0 ms-2">Random User</h6>
                        </div>
                        <p>
                            I loved my stay here! The rooms were spacious and well-maintained. The concierge was very helpful in booking local tours. Would definitely come back!
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center p-4">
                            <img src="images/features/star.svg" width="30px">
                            <h6 class="m-0 ms-2">Random User</h6>
                        </div>
                        <p>
                            I loved my stay here! The rooms were spacious and well-maintained. The concierge was very helpful in booking local tours. Would definitely come back!
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center p-4">
                            <img src="images/features/star.svg" width="30px">
                            <h6 class="m-0 ms-2">Random User</h6>
                        </div>
                        <p>
                            I loved my stay here! The rooms were spacious and well-maintained. The concierge was very helpful in booking local tours. Would definitely come back!
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
         
        <!-- Footer -->   
        <?php require('inc/footer.php')?>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        
        <!-- Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper-container", {
                spaceBetween: 30,
                effect: "fade",
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,  
                },
            });
        </script>

        <script>
            var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
            });
        </script>

    </body>
</html>