<?php
$link = mysqli_connect("localhost", "root", "", "hadabimadb");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}




	//add connection php file inside single comments
	//$username = mysqli_real_escape_string($link,$_POST['name']); //name of the  username label
	//$password = mysqli_real_escape_string($link,$_POST['pass']); //name of the password label
 $username=$_POST["name"];
 $password=$_POST["pass"];
	$sql = "SELECT Password FROM administration WHERE UserName='$username'";
	$result = mysqli_query($link, $sql);
	$re = mysql_fetch_array($result)


		if($result==$password){
		 //header("Location: ../index.html?login=loginsuccess");
			echo "hello";
		}
	
		else{
			header("Location: ../login.html");
	exit();
}