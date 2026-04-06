<?php
    session_start();
    require('inc/config.php');

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
        exit();
    }
    $username = $_SESSION['username'];


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_review'])) {
        $hotel = $_POST['hotel'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];


        $insert_sql = "INSERT INTO review (user, hotel, rating, comment) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($insert_sql);
        $stmt->bind_param("ssis", $username, $hotel, $rating, $comment);
        $stmt->execute();

        echo "<script>alert('Review submitted successfully!'); window.location.href='review.php';</script>";
        exit();
    }
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
            
        </style>
    </head>

    <body>
        <!-- Header -->
        <?php require('inc/header.php')?>
        
        <div class="my-5 px-4">
            <h2 class="fw-bold h-font">Write Review</h2>
            <hr>
        </div>  

        <div class="container my-5">
            
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center ">
                    <h2 class="text-center">Write a Review</h2>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="hotel" class="form-label">Hotel</label>
                            <select name="hotel" class="form-select" required>
                                <option value="">Select Hotel</option>
                                <option value="Marriott">Marriott</option>
                                <option value="Hilton">Hilton</option>
                                <option value="Hyatt">Hyatt</option>
                                <option value="Four Seasons">Four Seasons</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select name="rating" class="form-select" required>
                                <option value="">Select Rating</option>
                                <option value="1">1 - Poor</option>
                                <option value="2">2 - Fair</option>
                                <option value="3">3 - Good</option>
                                <option value="4">4 - Very Good</option>
                                <option value="5">5 - Excellent</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea name="comment" class="form-control" rows="4" required></textarea>
                        </div>

                        <button type="submit" name="submit_review" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->   
        <?php require('inc/footer.php')?>

    </body>
</html>