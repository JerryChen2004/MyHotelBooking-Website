<?php
    session_start();
    require('inc/config.php');

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('You must be logged in to book a room!'); window.location.href='login.php';</script>";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_room'])) {
        $username = $_SESSION['username'];
        $room_id = intval($_POST['room_id']);
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];

        $sql = "SELECT hotelroom, price, promotion FROM marriott WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $room_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows != 1) {
            echo "<script>alert('Invalid room selection!'); window.history.back();</script>";
            exit();
        }

        $room_data = $result->fetch_assoc();
        $hotelroom = $room_data['hotelroom'];
        $regular_price = floatval($room_data['price']);
        $promotion_price = floatval($room_data['promotion']);


        $effective_price = ($promotion_price > 0.00) ? $promotion_price : $regular_price;

        $checkin_date = new DateTime($checkin);
        $checkout_date = new DateTime($checkout);
        $interval = $checkin_date->diff($checkout_date);
        $total_nights = $interval->days;
        $total_price = $total_nights * $effective_price;

        if ($total_nights < 1) {
            echo "<script>alert('Invalid date selection!'); window.history.back();</script>";
            exit();
        }

        $sql_receipt = "INSERT INTO receipt (user, room, checkin, checkout, price) VALUES (?, ?, ?, ?, ?)";
        $stmt_receipt = $con->prepare($sql_receipt);
        $stmt_receipt->bind_param("ssssd", $username, $hotelroom, $checkin, $checkout, $total_price);
        $stmt_receipt->execute();

        $sql_booking = "INSERT INTO booking (user, room, checkin, checkout, status) VALUES (?, ?, ?, ?, 'Not Check In')";
        $stmt_booking = $con->prepare($sql_booking);
        $stmt_booking->bind_param("ssss", $username, $hotelroom, $checkin, $checkout);
        $stmt_booking->execute();

        echo "<script>alert('Room booked successfully!'); window.location.href='userreceipt.php';</script>";
    } else {
        echo "<script>alert('Invalid request!'); window.history.back();</script>";
    }
?>