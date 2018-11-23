<?php

    session_start();
    
    $visit_from = "";
    $visit_to = "";
    $start_date = "";
    $return_date = "";
    $adult = "";
    $child = "";

    $edit_state = false;
    
    $db = mysqli_connect('localhost','root','','sdf2');
    
    if(isset($_POST['save'])){
        $visit_from = $_POST['visit_from'];
        $visit_to = $_POST['visit_to'];
        $start_date = $_POST['start_date'];
        $return_date = $_POST['return_date'];
        $adult = $_POST['adult'];
        $child = $_POST['child'];

        
        $query = "INSERT INTO hotels VALUES ('','$visit_from','$visit_to','$start_date','$return_date','$adult','$child')";
        mysqli_query($db,$query);
        $_SESSION['msg'] = "Saved";
        header('location: add_hotels.php');
    }

    if(isset($_POST['update'])){
        //$id = mysql_real_escape_string($_POST['id']);
        $visit_from = mysql_real_escape_string($_POST['visit_from']);
        $visit_to = mysql_real_escape_string($_POST['visit_to']);
        $start_date = mysql_real_escape_string($_POST['start_date']);
        $return_date = mysql_real_escape_string($_POST['return_date']);
        $adult = mysql_real_escape_string($_POST['adult']);
        $child = mysql_real_escape_string($_POST['child']);

        
        mysqli_query($db, "UPDATE hotels SET visit_from='$visit_from', visit_to='$visit_to', start_date='$start_date', return_date='$return_date', adult='$adult', child='$child'");
        $_SESSION['msg'] = "Updated";
        header('location: add_hotels.php');
    }

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM products WHERE id=$id");
        $_SESSION['msg'] = "Deleted";
        header('location: add_hotels.php');
    }

    $results = mysqli_query($db, "SELECT * FROM hotels");
?>