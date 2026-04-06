<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');
    adminLogin();


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
        $booking_id = intval($_POST['booking_id']);
        $new_status = $_POST['status'];

        $valid_statuses = ['Check In', 'Check Out', 'Cancel'];
        if (in_array($new_status, $valid_statuses)) {
            $update_sql = "UPDATE booking SET status = ? WHERE id = ?";
            $update_stmt = $con->prepare($update_sql);
            $update_stmt->bind_param("si", $new_status, $booking_id);
            $update_stmt->execute();
        }

        if ($new_status == 'Check Out') {
            $move_sql = "INSERT INTO bookingcheckout (id, user, room, checkin, checkout, checkouton)
                        SELECT id, user, room, checkin, checkout, NOW() FROM booking WHERE status = 'Check Out'";
            $con->query($move_sql);
        
            $delete_sql = "DELETE FROM booking WHERE status = 'Check Out'";
            $con->query($delete_sql);
        }

        if ($new_status == 'Cancel') {
            $move_sql = "INSERT INTO cancelbooking (id, user, room, checkin, checkout, cancelledon)
                        SELECT id, user, room, checkin, checkout, NOW() FROM booking WHERE status = 'Cancel'";
            $con->query($move_sql);

            $delete_sql = "DELETE FROM booking WHERE status = 'Cancel'";
            $con->query($delete_sql);
        }

        echo "<script>alert('Booking status updated successfully!'); window.location.href='bookingstatus.php';</script>";
        exit();
    }

    // Fetch current bookings
    $sql = "SELECT id, user, room, checkin, checkout, status FROM booking";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>Admin Panel - Booking status</title>
        <?php require('inc/links.php')?>

        <style>
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
    <body class="bg-light">
        <?php require('inc/header.php')?>

        <div class="container-fluid mt-5" id="main-contant">
                <div class="col-lg-10 overflow-hidden ms-auto"> 
                    <div class="scrollable-table">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>User</th>
                                    <th>Room</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>Status</th>
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
                                                    <td>{$row['status']}</td>
                                                    <td>
                                                        <form method='POST'>
                                                            <input type='hidden' name='booking_id' value='{$row['id']}'>
                                                            <select name='status' class='form-select' required>
                                                                <option value='Check In'>Check In</option>
                                                                <option value='Check Out'>Check Out</option>
                                                                <option value='Cancel'>Cancel</option>
                                                            </select>
                                                            <button type='submit' name='update_status' class='btn btn-primary btn-sm mt-1'>Update</button>
                                                        </form>
                                                    </td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>No bookings found</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

        <?php require('inc/script.php')?>
    </body>
</html>
