<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');
    adminLogin();
    
    function displayTable($con, $tableName) {
        echo "<h2 style='text-align: center; margin-top: 20px;'>$tableName</h2>";
        $sql = "SELECT * FROM $tableName";
        $result = $con->query($sql);
    
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Hotel Room</th>
                        <th>Features</th>
                        <th>Facilities</th>
                        <th>Guests</th>
                        <th>Price (€)</th>
                        <th>Promotion</th>
                    </tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['hotelroom']}</td>
                        <td>{$row['features']}</td>
                        <td>{$row['facilities']}</td>
                        <td>{$row['guests']}</td>
                        <td>€{$row['price']}</td>
                        <td>€{$row['promotion']}</td>
                        <td>
                            <form action='edithotel.php' method='GET'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <input type='hidden' name='hotel' value='$tableName'>
                                <button type='submit' class='btn btn-outline-dark'>Edit</button>
                            </form>
                        </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align: center;'>No data available for $tableName.</p>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>Admin Panel - Rooms</title>
        <?php require('inc/links.php')?>

        <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: black;
            color: white;
        }
        td {
            text-align: center;
        }
    </style>

    </head>
    <body class="bg-light">
        <?php require('inc/header.php')?>

        <div class="container-fluid" id="main-contant">
            <dic class="row">
                <div class="col-lg-10 overflow-hidden ms-auto">
                    <?php

                        displayTable($con, "Marriott");
                        displayTable($con, "Hilton");
                        displayTable($con, "Hyatt");
                        displayTable($con, "FourSeasons");

                        $con->close();
                    ?>
                </div>
            </dic>
        </div>

        <?php require('inc/script.php')?>
    </body>

    
</html>