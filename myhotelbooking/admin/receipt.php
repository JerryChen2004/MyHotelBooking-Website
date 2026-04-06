<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');
    adminLogin();

    $sql = "SELECT * FROM receipt";
    $result = $con->query($sql);
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
                max-height: 600px; 
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

        <div class="container-fluid" id="main-contant">
            <dic class="row">
                <div class="col-lg-10 overflow-hidden ms-auto p-5">
                <div class="scrollable-table">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>User</th>
                                    <th>Room</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>Price (€)</th>
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
                                                <td>€" . number_format($row['price'], 2) . "</td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>No receipts found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </dic>
        </div>

        <?php require('inc/script.php')?>
    </body>
</html>
