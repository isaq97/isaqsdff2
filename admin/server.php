<?php

    session_start();
    
    $icon = "";
    $header = "";
    $body = "";
    $details = "";

    $edit_state = false;
    
    $db = mysqli_connect('localhost','root','','sdf2');
    
    if(isset($_POST['save'])){
        $icon = $_POST['icon'];
        $header = $_POST['header'];
        $body = $_POST['body'];
        $details = $_POST['details'];
        
        $query = "INSERT INTO info VALUES ('','$icon','$header','$body','$details')";
        mysqli_query($db,$query);
        $_SESSION['msg'] = "Address Saved";
        header('location: add_booking.php');
    }

    if(isset($_POST['update'])){
        $name = mysql_real_escape_string($_POST['icon']);
        $header = mysql_real_escape_string($_POST['header']);
        $body = mysql_real_escape_string($_POST['body']);
        $details = mysql_real_escape_string($_POST['details']);

        $id = mysql_real_escape_string($_POST['id']);
        
        mysqli_query($db, "UPDATE info SET icon='$icon', Header='$header', Body='$body', Details=$details");
        $_SESSION['msg'] = "Address updated";
        header('location: add_booking.php');
    }

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION['msg'] = "Address deleted";
        header('location: add_booking.php');
    }

    $results = mysqli_query($db, "SELECT * FROM info");
?>