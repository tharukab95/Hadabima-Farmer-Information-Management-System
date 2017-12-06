<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "hadabimadb");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$latitude = "";
$longitude = "";
$res = "Failed adding record";
if(isset($_POST['submit_address']))
{
  $address =$_POST['name']; // Google HQ
  $prepAddr = str_replace(' ','+',$address);
  $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?key=AIzaSyBkQodUnFgdXAuiSxGgM72dZBkZN884d0Y&address='.$prepAddr.'&sensor=false');
  $output= json_decode($geocode);
  //var_dump($output);
  $latitude = $output->results[0]->geometry->location->lat;
  $longitude = $output->results[0]->geometry->location->lng;
	
  
}

// Escape user inputs for security
$GN_name = mysqli_real_escape_string($link, $_REQUEST['name']);
$divisional_id = mysqli_real_escape_string($link, $_REQUEST['options']);

// attempt insert query execution
$sql = "INSERT INTO gn_division (GN_name,divisional_id,latitude,longitude) VALUES ('$GN_name','$divisional_id','$latitude','$longitude')";
if(mysqli_query($link, $sql)){
  $res ="Records added successfully.";
}


// close connection
mysqli_close($link);
header("Location: http://localhost/hadabima%20system/production/division.php");
exit;
?>