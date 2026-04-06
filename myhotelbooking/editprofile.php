<?php
    session_start();
    require('inc/config.php');

    if (!isset($_SESSION['username'])) {
        header("Location: login.php"); 
        exit();
    }

    $username = $_SESSION['username'];

    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = $con->query($sql);
    $user = $result->fetch_assoc(); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_username = $_POST['username'];
        $new_password = $_POST['password'];
        $new_phone = $_POST['phone'];

        if (empty($new_password)) {
            // If no password entered, keep the old password
            $update_sql = "UPDATE user SET phone='$new_phone' WHERE username='$username'";
        } else {
            // If password is entered, update it
            $update_sql = "UPDATE user SET password='$new_password', phone='$new_phone' WHERE username='$username'";
        }

        $update_sql = "UPDATE user SET password='$new_password', phone='$new_phone' WHERE username='$username'";
        if ($con->query($update_sql)) {
            // Update session if username was changed
            if ($new_username != $username) {
                $_SESSION['username'] = $new_username;
            }

            header("Location: profile.php");
            exit();
        } else {
            echo "Error: " . $con->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - My Hotel Booking</title>
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
            margin: 10px;
        }
        .btn-update { 
            background-color: blue; color: white; border: none; 
        }
        .btn-return { 
            background-color: green; color: white; border: none; 
        }
        .profile-container {
            position: center; 
            border: 2px solid; 
            padding: 20px; 
            max-width: 800px; 
            width: 100%; 
            margin: 0 auto;
        }
        .profile-form input {
            padding: 10px;
            margin: 10px;
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <?php require('inc/header.php')?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Edit Profile</h2>
        <hr>
    </div> 

    <div class="row">

        <div class="profile-container">
            <h2>Edit your profile, <?php echo $user['username']; ?>!</h2>
            <form action="editprofile.php" method="POST" class="profile-form">
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password(leave blank to keep current)">
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
                </div>
                <button type="submit" class="btn-update">Update Profile</button>
            </form>
            <a href="profile.php"><button class="btn-return">Back to Profile</button></a>
        </div>

    </div>
</body>
</html>