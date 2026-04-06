<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');
    session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];


    $sql = "DELETE FROM user WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('User deleted successfully!'); window.location='user.php';</script>";
    } else {
        echo "Error deleting record: " . $con->error;
    }
} else {
    echo "<script>alert('Invalid request!'); window.location='user.php';</script>";
}

$con->close();
?>