<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "hadabimadb");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$nic = mysqli_real_escape_string($link, $_REQUEST['nic']);
$post = mysqli_real_escape_string($link, $_REQUEST['post']);



// attempt insert query execution
$sql = "INSERT INTO administration (Name,ID_no,Post) VALUES ('$name','$nic','$post')";
if(mysqli_query($link, $sql)){
  $res ="Records added successfully.";
}

 
// close connection
mysqli_close($link);
header("Location: http://localhost/hadabima%20system/production/administrator.html");
exit;
?>