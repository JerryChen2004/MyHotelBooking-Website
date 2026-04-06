<?php
    require('inc/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        $sql = "INSERT INTO user (`username`, `password`, `phone`) VALUES ('$username', '$password', '$phone')";
        
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>"; 
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
        <title>My Hotel Booking - Register</title>
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
            <h2 class="fw-bold h-font text-center">Register</h2>
            <hr>
        </div>  

        <div class="form-container">
            <form method="POST">    
                <h5>Username</h5>
                <input type="text" name="username" placeholder="Username" required>

                <h5>Password</h5>
                <input type="password" name="password" placeholder="Password" required>
                
                <h5>Phone</h5>
                <input type="text" name="phone" placeholder="Phone Number" required>

                <button type="submit">Sign Up</button>
            </form>
        </div>
    </body>
</html>