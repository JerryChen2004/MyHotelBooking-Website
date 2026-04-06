<?php
    session_start();
    require('inc/config.php');

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
        exit();
    }
    $username = $_SESSION['username'];


    $sql = "SELECT id, user, hotel, rating, comment FROM review";
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
        <title>My Hotel Booking - Review</title>
        <?php require('inc/links.php')?>
        
        <style>
            .card{

            }

            .scrollable-table {
                max-height: 500px; 
                overflow-y: auto; 
                overflow-y: scroll;
                display: block;
            }
        </style>
    </head>

    <body>
        <!-- Header -->
        <?php require('inc/header.php')?>
        
        <div class="my-5 px-4">
                <h2 class="fw-bold h-font">Reviews</h2>
                <hr>
            
        </div>  

        <div class="container my-5">  
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center ">
                    <h3 class="mt-5 p-2">All Reviews</h3>
                    <div class="d-flex justify-content-end p-3">
                        <a href="writereview.php" class="btn btn-outline-dark rounded-0 fw-bold shadow-none">Write Review</a>
                    </div>
                        <div class="scrollable-table">
                            <div class="list-group">
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<div class='list-group-item p-3'>
                                                <h5 class='mb-1'>{$row['hotel']} (Rating: {$row['rating']}/5)</h5>
                                                <p class='mb-1'>{$row['comment']}</p>
                                                <small>By: {$row['user']}</small>
                                            </div>";
                                    }
                                } else {
                                    echo "<p>No reviews yet.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->   
        <?php require('inc/footer.php')?>

    </body>
</html>