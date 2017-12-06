<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "hadabimadb");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$index = mysqli_real_escape_string($link, $_REQUEST['index']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$tp = mysqli_real_escape_string($link, $_REQUEST['tp']);
$nic = mysqli_real_escape_string($link, $_REQUEST['nic']);
$size = mysqli_real_escape_string($link, $_REQUEST['size']);
$unit = mysqli_real_escape_string($link, $_REQUEST['unit']);
$acNO = mysqli_real_escape_string($link, $_REQUEST['acNo']);
$bankName = mysqli_real_escape_string($link, $_REQUEST['bankName']);
$branch = mysqli_real_escape_string($link, $_REQUEST['branch']);
$gn = mysqli_real_escape_string($link, $_REQUEST['gn']);

// attempt insert query execution
$sql = "INSERT INTO farmer (Index_no,Name,Address,Gender,TP_no,ID_no,LandSizeType,Land_size,Account_no,Bank_name,Branch,GN_ID) VALUES ('$index','$name','$address','$gender','$tp','$nic','$unit','$size','$acNO','$bankName','$branch','$gn')";
if(mysqli_query($link, $sql)){
  $res ="Records added successfully.";
}

$sql = "select * from farmer";

  $result = mysqli_query($link, $sql);
  $r = [];
  //$row = mysqli_fetch_assoc($result);
  while ($row =$result->fetch_assoc()) {
    $r[] = $row;
  }
 
// close connection
mysqli_close($link);
header("Location: http://localhost/hadabima%20system/production/farmer_registration.html");
exit;
?>