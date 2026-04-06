<?php
    session_start();
    require('inc/config.php');

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
        exit();
    }

    $sql = "SELECT id, hotelroom, features, facilities, guests, price, promotion FROM hyatt";
    $result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>My Hotel Booking - Hyatt Rooms</title>
        <?php require('inc/links.php')?>
        
        <style>
        </style>
    </head>

    <body>
        <!-- Header -->
        <?php require('inc/header.php')?>
        
        <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">Hyatt Hotel Rooms</h2>
            <p class="text-center ">
                Marriott Hotel rooms offer a blend of comfort and sophistication, featuring modern decor, plush bedding, and advanced amenities. 
                Rooms are designed to cater to both business and leisure travelers, with spacious layouts, high-speed internet, and luxurious bathroom features, ensuring a relaxing and convenient stay.
            </p>
            <hr>
        </div>  

        <div class="container">
            <div class="row">
                    <div class="card mb-4 border-0 shadow"> 
                        <?php
                            // Check if there are rows returned
                            if ($result->num_rows > 0) {
                                // Output data for each row
                                while($row = $result->fetch_assoc()) {
                                    echo '<div class="row g-0 p-3 align-items-center">';
                                        echo '<div class="col-md-5 mb-lg-0 mb-md-0 mb-3">';
                                            echo  '<img src="images/rooms/hyatt1.jpg" class="img-fluid rounded-start">';
                                        echo '</div>';
                                        echo '<div class="room-container col-md-5 px-lg-3 px-0">';
                                                echo '<h5 class="mb-3">' . $row['hotelroom'] . '</h5>';
                                                echo '<p class="room-info"><strong>Features:</strong> ' . $row['features'] . '</p>';
                                                echo '<p class="room-info"><strong>Facilities:</strong> ' . $row['facilities'] . '</p>';
                                                echo '<p class="room-info"><strong>Guests:</strong> ' . $row['guests'] . '</p>';    
                                        echo '</div>';

                                        echo'<div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">';
                                            if ($row['promotion'] > 0.00) {
                                                echo '<p class="room-price"><strong>Original Price:</strong> <span class="discount-price">€' . number_format($row['price'], 2) . '</span></p>';
                                                echo '<p class="room-price"><strong>Promo Price:</strong> <span class="promo-price">€' . number_format($row['promotion'], 2) . '</span></p>';
                                            } else {
                                                echo '<p class="room-price"><strong>Price:</strong> €' . number_format($row['price'], 2) . '</p>';
                                            }
                                            echo '<a href="hyattbooking.php?id='. $row['id'] .'" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            }
                        ?>  
                    </div> 
            </div> 

        </div>

        <!-- Footer -->   
        <?php require('inc/footer.php')?>

    </body>
</html>