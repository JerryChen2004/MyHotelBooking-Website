<?php
    session_start();
    require('inc/config.php');


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        if ($password == $row['password']) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('No user found with this username and phone number!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>My Hotel Booking - Login</title>
        <?php require('inc/links.php')?>

        <style>
            body { font-family: Arial, sans-serif; text-align: center; }
            .form-container { width: 30%; margin: auto; padding: 20px; border: 1px solid #ddd; }
            input { width: 90%; padding: 10px; margin: 10px 0; }
            button { padding: 10px 15px; background: green; color: white; border: none; cursor: pointer; }
        </style>

    </head>

    <body>

       <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">Login</h2>
            <hr>
        </div>  
        <div class="form-container mb-3">
            <form method="POST">
                <h5>Username</h5>
                <input type="text" name="username" placeholder="Username" required>
                <br>
                <h5>Password</h5>
                <input type="password" name="password" placeholder="Password" required>
                <br>
                <button type="submit">Login</button>
                
            </form>
        </div>

        <div>
            <a href="register.php"><h6>No account? Register Now</h6></a>

        </div>
                

    </body>
</html>