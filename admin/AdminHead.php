<?php
	include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
   	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
   	<script src="https://kit.fontawesome.com/19dc89b9d8.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>invoicefy, Admin</title>
</head>
<body class="bg-light">
<style type="text/css">
	html body{
		width: 100%;
		margin: 0px;
		padding: 0px;
		overflow-x: hidden;
	}
	a{
		font-size: larger;
	}
	table{
		font-size: large;
	}
	#main{
		font-size: large;
	}

</style>
<header>
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
	  <h4 class="my-0 mr-md-auto font-weight-bold">invoicefy</h4>
	  <nav class="my-2 my-md-0 mr-md-3">
	    <a class="p-2 text-dark" href="index.php">Home</a>
	    <a class="p-2 text-dark" href="AdminUpdate.php">Update client details</a>
	    <a class="p-2 text-dark" href="AdminAddGst.php">Add GST Percentage</a>
	    <a class="p-2 text-dark" href="AdminViewComments.php">View Supports/Comments</a>
	  </nav>
	  <a class="btn btn-outline-primary" href="../logout.php">Logout</a>
	</div>
</header>
