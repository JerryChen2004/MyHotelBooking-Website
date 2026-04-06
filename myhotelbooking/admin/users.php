<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');
    adminLogin();
    
    $sql = "SELECT * FROM user";
    $result = $con->query($sql);
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
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
 
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['username']}</td>
                                        <td>{$row['password']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>
                                            <form style='display:inline;' action='edituser.php' method='GET'>
                                                <input type='hidden' name='id' value='{$row['id']}'>
                                                <button class='edit-btn' type='submit'>Edit</button>
                                            </form>
                                            <form style='display:inline;' action='deleteuser.php' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this user?\")'>
                                                <input type='hidden' name='id' value='{$row['id']}'>
                                                <button class='delete-btn' type='submit'>Delete</button>
                                            </form>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No users found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                </div>
            </dic>
        </div>

        <?php require('inc/script.php')?>
    </body>

    
</html>