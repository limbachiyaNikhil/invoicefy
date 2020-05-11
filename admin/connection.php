<?php 
	$host='localhost';
	$dbnm='invoicefy';
	$usnm='root';
	$pwd='';
	$con=mysqli_connect($host,$usnm,$pwd);
	mysqli_select_db($con,$dbnm);
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
?>