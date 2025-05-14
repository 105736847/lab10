
<?php
    session_start();
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if($conn){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $query = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        if($user){
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            header("Location: profile.php");
            exit();
        }else{  
            $_SESSION['error'] = "Wrong Password or Username";
            header("Location: login1.php");
        }
    }else{
        echo "<p> Not Conneted</p>";
    }
mysqli_close($conn);
?>


