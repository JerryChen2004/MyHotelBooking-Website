<?php
    session_start();
    require('inc/config.php');

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
        exit();
    }
    
    $username = $_SESSION['username'];

    $sql = "SELECT id, user, room, checkin, checkout, cancelledon FROM cancelbooking WHERE user = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $sql_checkout = "SELECT id, user, room, checkin, checkout, checkouton FROM bookingcheckout WHERE user = ?";
    $stmt_checkout = $con->prepare($sql_checkout);
    $stmt_checkout->bind_param("s", $username);
    $stmt_checkout->execute();
    $result_checkout = $stmt_checkout->get_result();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>My Hotel Booking - Profile</title>
        <?php require('inc/links.php')?>

        <style>
            body { 
                text-align: center; 
            }
            .button-container { 
                margin-top: 20px; 
            }
            button { 
                padding: 10px 15px; 
                cursor: pointer; 
            }
            .btn-login { 
                background-color: 
                blue; color: white; 
                border: none; 
            }
            .btn-profile { 
                background-color: 
                green; color: white; 
                border: none; 
            }

            .scrollable-table {
                max-height: 200px; /* Set a height limit for the table body */
                overflow-y: auto;  /* Enable vertical scrolling */
                display: block;
            }
            .table tbody {
                max-height: 200px; /* Set the height of the table body */
                overflow-y: scroll;
            }
            thead {
                color: white;
                position: sticky;
                top: 0;
                z-index: 1; /* Keeps the header on top of the body */
            }

        </style>

    </head>

    <body>

        <!-- Header -->
        <?php require('inc/header.php')?>
        

        <div class="my-5 px-4">
                <h2 class="fw-bold h-font text-center">Booking History</h2>
                <hr>
            </div> 
        
        
        <div class="row">
        <?php require('inc/userpanel.php')?>
            <div class="profile-container col-lg-10 overflow-hidden ms-auto p-1">
                <div class="scrollable-table">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
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
                                            <td>{$row['room']}</td>
                                            <td>{$row['checkin']}</td>
                                            <td>{$row['checkout']}</td>
                                            <td>{$row['cancelledon']}</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>No canceled bookings found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="pt-5">            
                    <div class="scrollable-table">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
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

    </body>
</html>