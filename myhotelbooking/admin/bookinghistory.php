<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');
    adminLogin();

    $sql = "SELECT id, user, room, checkin, checkout, cancelledon FROM cancelbooking";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $sql_checkout = "SELECT id, user, room, checkin, checkout, checkouton FROM bookingcheckout";
    $stmt_checkout = $con->prepare($sql_checkout);
    $stmt_checkout->execute();
    $result_checkout = $stmt_checkout->get_result();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Booking History</title>
        <?php require('inc/links.php') ?>

        <style>
            .scrollable-table {
                max-height: 200px; 
                overflow-y: auto; 
                display: block;
            }
            .table tbody {
                max-height: 200px; 
                overflow-y: scroll;
            }
            thead {
                color: white;
                position: sticky;
                top: 0;
                z-index: 1;
            }
        </style>
    </head>
    <body class="bg-light">
        <?php require('inc/header.php') ?>

        <div class="container my-5" id="main-contant">
            <div class="col-lg-10 overflow-hidden ms-auto"> 
                <h3 class="mb-4 text-center">Cancelled Bookings</h3>
                <div class="scrollable-table">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>User</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Cancelled On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>{$row['user']}</td>
                                                <td>{$row['room']}</td>
                                                <td>{$row['checkin']}</td>
                                                <td>{$row['checkout']}</td>
                                                <td>{$row['cancelledon']}</td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>No cancelled bookings found.</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="pt-5">            
                    <h4 class="text-center mb-3">Checkout Bookings</h4>
                    <div class="scrollable-table">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>User</th>
                                    <th>Room</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>Checked-out On</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($result_checkout->num_rows > 0) {
                                        while ($row = $result_checkout->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>{$row['user']}</td>
                                                    <td>{$row['room']}</td>
                                                    <td>{$row['checkin']}</td>
                                                    <td>{$row['checkout']}</td>
                                                    <td>{$row['checkouton']}</td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' class='text-center'>No checkout bookings found.</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>    

            </div>
        </div>

        <?php require('inc/script.php') ?>
    </body>
</html>
