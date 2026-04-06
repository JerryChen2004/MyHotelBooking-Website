<?php
    session_start();
    require('inc/config.php');

     // Fetch reviews for Marriott
     $sql = "SELECT id, user, hotel, rating, comment FROM review WHERE hotel = 'Marriott'";
     $stmt = $con->prepare($sql);
     $stmt->execute();
     $result = $stmt->get_result();
 

     $avg_sql = "SELECT hotel, ROUND(AVG(rating),1) AS avg_rating FROM review 
                 WHERE hotel IN ('Marriott', 'Hilton', 'Hyatt', 'Four Seasons') 
                 GROUP BY hotel";
     $avg_stmt = $con->prepare($avg_sql);
     $avg_stmt->execute();
     $avg_result = $avg_stmt->get_result();

     $average_ratings = [];
     while ($row = $avg_result->fetch_assoc()) {
         $average_ratings[$row['hotel']] = $row['avg_rating'];
     }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>My Hotel Booking - Hotels</title>
        <?php require('inc/links.php')?>
        
        <style>
            
        </style>
    </head>

    <body>
        <!-- Header -->
        <?php require('inc/header.php')?>
        
        <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">Our Hotels</h2>
            <hr>
        </div>  

                <div>
                    <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center ">
                                <!-- Image -->
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="images/hotels/marriotthotel.jpg" class="img-fluid rounded-start">
                                </div>
                                <!-- Detail -->
                                <div class="col-md-5 px-lg-3 px-0">
                                    <h5 class="mb-3">Marriott hotel</h5>
                                    <p>
                                        Marriott Hotels is a globally recognized luxury hotel brand known for its exceptional service, modern amenities, and stylish accommodations. 
                                        Catering to business and leisure travelers alike, Marriott offers premium dining, state-of-the-art facilities, and a commitment to comfort and hospitality in prime locations worldwide.
                                    </p>
                                    <h3>
                                        Rating: <?php echo $average_ratings['Marriott'] ?? '0'; ?>/5
                                    </h3>
                                </div>

                                <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                    <a href="marriott.php" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book This Hotel</a>
                                    <a href="marriottreview.php" class="btn btn-outline-dark rounded-0 fw-bold shadow-none">Review</a>
                                </div>
                            </div>
                    </div>
                    <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center ">
                                <!-- Image -->
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="images/hotels/hiltonhotel.jpg" class="img-fluid rounded-start">
                                </div>
                                <!-- Detail -->
                                <div class="col-md-5 px-lg-3 px-0">
                                    <h5 class="mb-3">Hilton Hotel</h5>
                                    <p>
                                        Hilton Hotels is a world-renowned hospitality brand offering upscale accommodations, exceptional service, and modern amenities. 
                                        With a strong presence in key destinations, Hilton caters to both business and leisure travelers, providing luxurious stays, fine dining, and state-of-the-art facilities for a memorable experience.
                                    </p>
                                    <h3>
                                        Rating: <?php echo $average_ratings['Hilton'] ?? '0'; ?>/5
                                    </h3>
                                </div>
                                <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                    <a href="hilton.php" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book This Hotel</a>
                                    <a href="hiltonreview.php" class="btn btn-outline-dark rounded-0 fw-bold shadow-none">Review</a>
                                </div>
                            </div>
                    </div>
                    <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center ">
                                <!-- Image -->
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="images/hotels/hyatthotel.jpg" class="img-fluid rounded-start">
                                </div>
                                <!-- Detail -->
                                <div class="col-md-5 px-lg-3 px-0">
                                    <h5 class="mb-3">Hyatt Hotel</h5>
                                    <p>
                                        Hyatt Hotels is a globally recognized hospitality brand known for its elegant accommodations, exceptional service, and modern amenities. 
                                        Catering to both business and leisure travelers, Hyatt offers luxurious stays, world-class dining, and innovative experiences in prime locations worldwide.
                                    </p>
                                    <h3>
                                        Rating: <?php echo $average_ratings['Hyatt'] ?? '0'; ?>/5
                                    </h3>
                                </div>
                                <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                    <a href="hyatt.php" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book This Hotel</a>
                                    <a href="hyattreview.php" class="btn btn-outline-dark rounded-0 fw-bold shadow-none">Review</a>
                                </div>
                            </div>
                    </div>
                    
                    <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center ">
                                <!-- Image -->
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="images/hotels/fourseasonshotel.jpg" class="img-fluid rounded-start">
                                </div>
                                <!-- Detail -->
                                <div class="col-md-5 px-lg-3 px-0">
                                    <h5 class="mb-3">Four Seasons Hotel</h5>
                                    <p>
                                        Four Seasons Hotels is a world-renowned luxury hospitality brand known for its exceptional service, elegant accommodations, and personalized experiences. 
                                        Offering world-class dining, spa facilities, and stunning locations, Four Seasons provides an unparalleled level of comfort and sophistication for discerning travelers.
                                    </p>
                                    <h3>
                                        Rating: <?php echo $average_ratings['Four Seasons'] ?? '0'; ?>/5
                                    </h3>
                                </div>
                                <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                    <a href="fourseasons.php" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book This Hotel</a>
                                    <a href="fourseasonsreview.php" class="btn btn-outline-dark rounded-0 fw-bold shadow-none">Review</a>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->   
        <?php require('inc/footer.php')?>

    </body>
</html>