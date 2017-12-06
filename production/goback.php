<?php
$link = mysqli_connect("localhost", "root", "", "hadabimadb");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();

if (isset($_POST['submit'])){

	include_once ''; //add connection php file inside single comments
	$username = mysqli_real_escape_string($link,$_POST['name']); //name of the  username label
	$password = mysqli_real_escape_string($link,$_POST['pass']); //name of the password label

	//Error handling
	if(empty($username)||empty($password)){
		header("Location: ../login.html?signup=empty");
	exit();
	}else{
		$query = "SELECT * FROM administration WHERE UserName='$username';";
		$result = mysqli_query($connection,$query);
		$resultRows = mysqli_num_rows($result);
		if($resultRows<1){
		header("Location: ../login.html?login=wrongusername");
	    exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
		    $ISmatch = password_verify($password,$row['Password']);
					if($ISmatch==false){
		header("Location: ../login.html?login=wrongpassword");
	    exit();
		}elseif($ISmatch==true){
			$_SESSION['u_name'] = $row['UserName'];
			$_SESSION['u_password'] = $row['Password'];
			header("Location: ../index.html?login=loginsuccess");
	    exit();
		}
			}
		}
	}
}else{
	header("Location: ../login.html");
	exit();
}