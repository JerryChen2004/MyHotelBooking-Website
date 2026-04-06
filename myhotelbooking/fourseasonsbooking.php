<?php
    session_start();
    require('inc/config.php');

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
        exit();
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Get and sanitize the ID

        // Fetch room details from database
        $sql = "SELECT * FROM fourseasons WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $room = $result->fetch_assoc(); 
        } else {
            echo "<script>alert('Room not found!'); window.history.back();</script>";
            exit();
        }
        $unavailable_sql = "SELECT checkin, checkout FROM booking WHERE room = ? AND status NOT IN ('Cancel', 'Check Out')";
        $unavailable_stmt = $con->prepare($unavailable_sql);
        $unavailable_stmt->bind_param("s", $room['hotelroom']);
        $unavailable_stmt->execute();
        $unavailable_result = $unavailable_stmt->get_result();

        $unavailable_dates = [];
        while ($row = $unavailable_result->fetch_assoc()) {
            $start_date = strtotime($row['checkin']);
            $end_date = strtotime($row['checkout']);

            for ($date = $start_date; $date <= $end_date; $date += 86400) {
                $unavailable_dates[] = date('Y-m-d', $date);
            }
        }
    } else {
        echo "<script>alert('No room selected!'); window.history.back();</script>";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>My Hotel Booking - Booking Rooms</title>
        <?php require('inc/links.php')?>
        
        <style>
        .container {
            background: white;
            padding: 20px;
            width: 350px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
    </head>

    <body>
        <!-- Header -->
        <?php require('inc/header.php')?>
        
        <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">Booking Hotel Room</h2>
            <hr>
        </div>  

        <div class="row-no-gap text-center">
            <div class="container my-5">
            <h2>Booking Details</h2>
                <p><strong>Hotel Room:</strong> <?php echo $room['hotelroom']; ?></p>
                <p><strong>Features:</strong> <?php echo $room['features']; ?></p>
                <p><strong>Facilities:</strong> <?php echo $room['facilities']; ?></p>
                <p><strong>Guests:</strong> <?php echo $room['guests']; ?></p>
                <p><strong>Price per Night:</strong> 
                    <?php 
                        if ($room['promotion'] > 0.00) {
                            echo '<span class="promo-price">€' . number_format($room['promotion'], 2) . '</span>';
                        } else {
                            echo '€' . number_format($room['price'], 2);
                        }
                    ?>
                </p>


                <h4 class="mt-4">Unavailable Dates:</h4>
                <div class="unavailable-date">
                    <?php
                        if (empty($unavailable_dates)) {
                            echo "No unavailable dates";
                        } else {
                            $formatted_dates = [];
                            foreach ($unavailable_result as $row) {
                                $formatted_dates[] = $row['checkin'] . " - " . $row['checkout'];
                            }
                            echo implode(" | ", $formatted_dates);
                        }
                    ?>
                </div>
            </div>

            <div class="container my-5">
                <!-- Booking Form -->
                <form method="POST" action="processfourseasonsbooking.php">
                    <input type="hidden" name="room_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="price_per_night" value="<?php echo $room['price']; ?>">

                    <div class="row">
                        <div class="col-md-6">  
                            <label for="checkin" class="form-label">Check-in Date</label>
                            <input type="date" class="form-control" id="checkin" name="checkin" required>
                        </div>
                        <div class="col-md-6">
                            <label for="checkout" class="form-label">Check-out Date</label>
                            <input type="date" class="form-control" id="checkout" name="checkout" required>
                        </div>
                    </div>

                    <div class="mt-3 text-center">
                        <h4>Your Total Price:</h4>
                        <p><strong>Price per Night:</strong> 
                            <?php 
                                if ($room['promotion'] > 0.00) {
                                    echo '<p><strong>Price per Night: €<span id="pricePerNight">' . number_format($room['promotion'], 2) . '</span></strong></p>';
                                } else {
                                    echo '<p><strong>Price per Night: €<span id="pricePerNight">' . number_format($room['price'], 2) . '</span></strong></p>';
                                }
                            ?>
                        </p>
                        <p><strong>Total Nights: <span id="totalNights">0</span></strong></p>
                        <p><strong>Total Price: €<span id="totalPrice">0.00</span></strong></p>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" name="book_room" class="btn btn-outline-dark custom-bg">Book Room</button>
                    </div>
                </form>


        </div>
        <!-- Footer -->   
        <?php require('inc/footer.php')?>

        <script>
            const unavailableDates = <?php echo json_encode($unavailable_dates); ?>;

            function disableUnavailableDates(inputId) {
                const input = document.getElementById(inputId);
                input.addEventListener("input", function() {
                    if (unavailableDates.includes(input.value)) {
                        alert("Selected date is unavailable. Please choose another date.");
                        input.value = "";
                    }
                });
            }
            disableUnavailableDates("checkin");
            disableUnavailableDates("checkout");


            function calculatePrice() {
                const checkin = document.getElementById('checkin').value;
                const checkout = document.getElementById('checkout').value;
                const pricePerNight = parseFloat(document.getElementById('pricePerNight').innerText);

                if (checkin && checkout) {
                    const date1 = new Date(checkin);
                    const date2 = new Date(checkout);

                    // Calculate the difference in days
                    const timeDiff = date2.getTime() - date1.getTime();
                    const nights = timeDiff / (1000 * 3600 * 24);

                    if (nights >= 1) {
                        const totalPrice = pricePerNight * nights;


                        document.getElementById('totalNights').innerText = nights;
                        document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
                    } else {
                        document.getElementById('totalNights').innerText = 0;
                        document.getElementById('totalPrice').innerText = '0.00';
                    }
                }
            }

            document.getElementById('checkin').addEventListener('change', calculatePrice);
            document.getElementById('checkout').addEventListener('change', calculatePrice);
        </script>

    </body>
</html>