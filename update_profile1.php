<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login1.php");
        exit();
    }
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if ($conn) {
        $username = $_SESSION['username'];
        $new_email = trim($_POST['new_email']);

        if ($new_email) {
            $query = "UPDATE user SET email = '$new_email' WHERE username = '$username'";
            $change = mysqli_query($conn, $query);

            if ($change){
                $_SESSION['email'] = $new_email;
                echo "Email updated successfully!";
            } else {
                echo "fail";
            }
        }
    mysqli_close($conn);
    }
    header("Location: profile.php"); 
    exit();
?>