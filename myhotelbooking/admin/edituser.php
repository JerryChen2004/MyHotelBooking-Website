<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');
    session_start();


    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $con->query($sql);
    $user = $result->fetch_assoc();


    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = intval($_GET['id']);

        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id); 
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            echo "<script>alert('User not found!'); window.location='user.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Invalid request!'); window.location='user.php';</script>";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_password = $_POST['password']; 
        $new_phone = $_POST['phone'];

        $update_sql = "UPDATE user SET password=?, phone=? WHERE id=?";
        $stmt = $con->prepare($update_sql);
        $stmt->bind_param("ssi", $new_password, $new_phone, $id);

        if ($stmt->execute()) {
            echo "<script>alert('User updated successfully!'); window.location='users.php';</script>";
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
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
                width: 90%;
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

    <h2>Edit User</h2>

        <form method="POST">

            <label>Password:</label>
            <input type="text" name="password" value="<?= isset($row['password']) ? htmlspecialchars($row['password']) : '' ?>" required>

            <label>Phone:</label>
            <input type="text" name="phone" value="<?= isset($row['phone']) ? htmlspecialchars($row['phone']) : '' ?>" required>

            <button type="submit">Update</button>
        </form>

    </body> 
</html>