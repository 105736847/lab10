

<?php
    session_start();
    if($_SESSION['username']){
    echo "Hi," . $_SESSION['username'] . ". Your gmail is " . $_SESSION['email']; 
    echo '<button><a href="update_profile.php">Edit</a></button>';
    }
?>