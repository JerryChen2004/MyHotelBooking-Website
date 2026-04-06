<?php
    session_start();
    require('inc/config.php');

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
        exit();
    }
    
    $username = $_SESSION['username'];


    $move_sql = "INSERT INTO cancelbooking (id, user, room, checkin, checkout, cancelledon)
                SELECT id, user, room, checkin, checkout, NOW()
                FROM booking WHERE status = 'Cancel'";
    $con->query($move_sql);


    $delete_sql = "DELETE FROM booking WHERE status = 'Cancel'";
    $con->query($delete_sql);


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancel_booking'])) {
        $booking_id = intval($_POST['booking_id']);

        $cancel_sql = "UPDATE booking SET status = 'Cancel' WHERE id = ? AND user = ?";
        $cancel_stmt = $con->prepare($cancel_sql);
        $cancel_stmt->bind_param("is", $booking_id, $username);
        $cancel_stmt->execute();

        echo "<script>alert('Booking canceled successfully!'); window.location.href='userbookingstatus.php';</script>";
        exit();
    }


    $sql = "SELECT id, user, room, checkin, checkout, status FROM booking WHERE user = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
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
                max-height: 400px; 
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

    <body>

        <!-- Header -->
        <?php require('inc/header.php')?>
        

        <div class="my-5 px-4">
                <h2 class="fw-bold h-font text-center">Booking Status</h2>
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
                            <th>Status</th>
                            <th>Action</th>
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
                                        <td>{$row['status']}</td>
                                        <td>";
                                        if ($row['status'] == 'Cancel') {
                                            echo "Canceled";
                                        } elseif ($row['status'] == 'Check In') {
                                            echo "Checked In";
                                        } else {
                                            echo "<form method='POST'>
                                                    <input type='hidden' name='booking_id' value='{$row['id']}'>
                                                    <button type='submit' name='cancel_booking' class='btn btn-danger btn-sm'>Cancel</button>
                                                  </form>";
                                        }
                            echo "</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No bookings found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        
        </div>
    </body>
</html>