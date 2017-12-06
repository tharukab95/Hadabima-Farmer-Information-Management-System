<?php 
	$link = mysqli_connect("localhost", "root", "", "hadabimadb");

	if($link === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$sql = "select * from gn_division";

	$result = mysqli_query($link, $sql);
	$r = [];
	//$row = mysqli_fetch_assoc($result);
	while ($row =$result->fetch_assoc()) {
		$r[] = $row;
	}

	// Free result set
	mysqli_free_result($result);
	header('Content-Type: application/json');
	echo json_encode($r);
 ?>