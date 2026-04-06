<?php
    session_start();
    require('inc/config.php');

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
        exit();
    }
    
    // Get the logged-in user's username
    $username = $_SESSION['username']; 
    
    // Fetch receipts for the logged-in user
    $sql = "SELECT user, room, checkin, checkout, price FROM receipt WHERE user = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);  // Use username as user in the query
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
                <h2 class="fw-bold h-font text-center">Receipt</h2>
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
                                <th>Price</th>
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
                                            <td>€{$row['price']}</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'>No receipts found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        
        </div>
    </body>
</html>