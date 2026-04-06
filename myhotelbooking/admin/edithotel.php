<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');
    adminLogin();
    
    // Get ID and Hotel Name
    if (isset($_GET['id']) && isset($_GET['hotel'])) {
        $id = intval($_GET['id']);
        $hotel = $_GET['hotel'];

        $sql = "SELECT * FROM $hotel WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            echo "<script>alert('Room not found!'); window.location='rooms.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Invalid request!'); window.location='rooms.php';</script>";
        exit();
    }

    // Handle Update
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $features = $_POST['features'];
        $facilities = $_POST['facilities'];
        $guests = $_POST['guests'];
        $price = $_POST['price'];
        $promotion = $_POST['promotion'];

        $update_sql = "UPDATE $hotel SET features=?, facilities=?, guests=?, price=?, promotion=? WHERE id=?";
        $stmt = $con->prepare($update_sql);
        $stmt->bind_param("sssddi", $features, $facilities, $guests, $price, $promotion, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Room updated successfully!'); window.location='rooms.php';</script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
    }

    $con->close();
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Room</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
                text-align: center;
            }
            form {
                background: white;
                padding: 20px;
                width: 300px;
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
            button {
                width: 100%;
                padding: 10px;
                background: #007bff;
                border: none;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }
            button:hover {
                background: #0056b3;
            }
        </style>
    </head>
    <body>

    <h2>Edit Room in <?= htmlspecialchars($hotel) ?></h2>

        <form method="POST">


            <label>Features:</label>
            <input type="text" name="features" value="<?= htmlspecialchars($row['features']) ?>" required>

            <label>Facilities:</label>
            <input type="text" name="facilities" value="<?= htmlspecialchars($row['facilities']) ?>" required>

            <label>Guests:</label>
            <input type="text" name="guests" value="<?= htmlspecialchars($row['guests']) ?>" required>

            <label>Price:</label>
            <input type="text" name="price" value="<?= htmlspecialchars($row['price']) ?>" required>

            <label>Promotion:</label>
            <input type="text" name="promotion" value="<?= htmlspecialchars($row['promotion']) ?>">

            <button type="submit">Update</button>
        </form>

    </body>
</html>