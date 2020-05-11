<?php
	include("connection.php");
	if(!isset($_SESSION['cli']))
	{
		include("Redirectlogin.php");
	}
	else
	{
		$clid=$_SESSION['cli'];
		$q1="SELECT * FROM client_mast WHERE Client_Id='".$clid."'";
		if(!mysqli_query($con,$q1))
    	{
      		echo ("Error description: " . mysqli_error($con));
    	}
    	else
    	{
    		$res1=mysqli_query($con,$q1);
    		$row=mysqli_fetch_assoc($res1);
    		$exp=$row['C_Expiry_Dt'];
    		$cur=date('Y-m-d',time());
			if($cur>=$exp)
			{
				header("location:PlanExp.php");
			}
    	}
	}
?>