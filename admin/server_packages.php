<?php

    session_start();
    
    $photo = "";
    $information = "";

    $edit_state = false;
    
    $db = mysqli_connect('localhost','root','','sdf2');
    
    if(isset($_POST['save'])){
        $photo = $_POST['photo'];
        $information = $_POST['information'];
        
        $query = "INSERT INTO package VALUES ('','$photo','$information')";
        mysqli_query($db,$query);
        $_SESSION['msg'] = "Address Saved";
        header('location: add_packages.php');
    }

    if(isset($_POST['update'])){
        $photo = mysql_real_escape_string($_POST['photo']);
        $information = mysql_real_escape_string($_POST['information']);
        $id = mysql_real_escape_string($_POST['id']);
        
        mysqli_query($db, "UPDATE package SET photo='$photo', information='$information' ");
        $_SESSION['msg'] = "updated";
        header('location: add_packages.php');
    }

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM package WHERE id=$id");
        $_SESSION['msg'] = "deleted";
        header('location: add_packages.php');
    }

    $results = mysqli_query($db, "SELECT * FROM package");
?>