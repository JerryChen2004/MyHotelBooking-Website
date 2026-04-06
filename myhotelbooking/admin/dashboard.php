<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');
    adminLogin();
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>Admin Panel - Dashboard</title>
        <?php require('inc/links.php')?>

        <style>
        </style>
    </head>

    <body class="bg-light">
        <?php require('inc/header.php')?>

        <div class="container-fluid mt-5" id="main-contant">
            <div class="row">
                <div class="col-lg-10 overflow-hidden ms-auto p-5">
                    <div class="row">
                        <div class="col-md-6">
                        <h3 class="mb-4 text-center">Booking Report</h3>
                            <div class="row">
                                <?php
                                $booking_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM booking"))['total'];
                                $checkout_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM bookingcheckout"))['total'];
                                $cancel_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM cancelbooking"))['total'];
                                ?>

                                <div class="col-md-12 mb-3">
                                    <div class="card text-center shadow">
                                        <div class="card-body">
                                            <h5 class="card-title">Current Bookings</h5>
                                            <p class="card-text fs-4"><?php echo $booking_count; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="card text-center shadow">
                                        <div class="card-body">
                                            <h5 class="card-title">Check Out</h5>
                                            <p class="card-text fs-4"><?php echo $checkout_count; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="card text-center shadow">
                                        <div class="card-body">
                                            <h5 class="card-title">Cancelled</h5>
                                            <p class="card-text fs-4"><?php echo $cancel_count; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <h3 class="mb-4 text-center">Hotel Report</h3>
                            <div class="row">
                            <?php
                                $hotels = ['Marriott', 'Hilton', 'Hyatt', 'Four Seasons'];

                                $hotel_stats = [];
                                $total_bookings = 0;


                                foreach ($hotels as $hotel) {
                                    $query = "SELECT COUNT(*) AS booking_count, SUM(price) AS total_price 
                                            FROM receipt 
                                            WHERE room LIKE '%$hotel%'";
                                    $result = mysqli_fetch_assoc(mysqli_query($con, $query));

                                    $hotel_booking_count = $result['booking_count'] ?? 0;
                                    $hotel_total_price = $result['total_price'] ?? 0;

                                    $hotel_stats[$hotel] = [
                                        'booking_count' => $hotel_booking_count,
                                        'total_price' => $hotel_total_price
                                    ];

                                    $total_bookings += $hotel_booking_count;
                                }

                                $highest_booking_hotel = '';
                                $highest_booking_count = 0;

                                foreach ($hotel_stats as $hotel => $stats) {
                                    if ($stats['booking_count'] > $highest_booking_count) {
                                        $highest_booking_count = $stats['booking_count'];
                                        $highest_booking_hotel = $hotel;
                                    }
                                }

                                foreach ($hotel_stats as $hotel => $stats) {
                                    $percentage = ($total_bookings > 0) ? ($stats['booking_count'] / $total_bookings) * 100 : 0;
                                    $percentage = round($percentage, 2);
                                ?>
                                    <div class="col-md-12 mb-3">
                                        <div class="card text-center shadow">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $hotel; ?></h5>
                                                <p class="card-text fs-5">Bookings: <?php echo $stats['booking_count']; ?> (<?php echo $percentage; ?>%)</p>
                                                <p class="card-text fs-5">Total Revenue: $<?php echo number_format($stats['total_price'], 2); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>              

        <?php require('inc/script.php')?>
    </body>
</html>
