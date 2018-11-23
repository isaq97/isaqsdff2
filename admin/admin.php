<?php
 $ID = filter_input(INPUT_POST, 'ID');
 $Head = filter_input(INPUT_POST, 'Head');
 $Body=filter_input(INPUT_POST, 'Body');

 if (!empty($ID)){
if (!empty($Head)){
 if (!empty($Body)){ 
$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "1234";
$dbname = "php";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


  $sql = "INSERT INTO heading (ID,Head,Body )
  values ('$ID','$Head','$Body')";
  if ($conn->query($sql)){
    echo "New record is inserted sucessfully";
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
  $conn->close();

}
}

 }
 
?>

