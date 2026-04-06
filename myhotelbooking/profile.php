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


        $update_sql = "UPDATE user SET password='$new_password', phone='$new_phone' WHERE username='$username'";
        if ($con->query($update_sql)) {

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
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>My Hotel Booking - Profile</title>
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
            }
            .btn-login { 
                background-color: 
                blue; color: white; 
                border: none; 
            }
            .btn-profile { 
                background-color: 
                green; color: white; 
                border: none; 
            }
        </style>

    </head>

    <body>

        <!-- Header -->
        <?php require('inc/header.php')?>
        

        <div class="my-5 px-4">
                <h2 class="fw-bold h-font text-center">Profile</h2>
                <hr>
            </div> 
        
        
        <div class="row">
        <?php require('inc/userpanel.php')?>

        <div class="profile-container col-lg-10 overflow-hidden ms-auto p-5 ">
            <h3>Username: <?php echo $user['username']; ?></h3>
            <h4>Password: <?php echo $user['password']; ?></h4>
            <h4>Phone: <?php echo $user['phone']; ?></h4>
            
            <a href="editprofile.php"><button>Edit Profile</button></a>
        </div>

        
        </div>
    </body>
</html>