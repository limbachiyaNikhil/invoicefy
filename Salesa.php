<?php
	include("inclds/connection.php");
	session_start();
	$clid=$_SESSION['cli'];
	$invno=$_SESSION['invn'];
	$indt=$_SESSION['indt'];
    $spnm=$_SESSION['spnm'];
    $tota=$_SESSION['totamt'];
	$q1="SELECT * FROM sales_det_temp";
	if(!mysqli_query($con,$q1))
	{
		echo("Error description: " . mysqli_error($con));
	}
	else
	{
		$res1=mysqli_query($con,$q1);
		if(mysqli_num_rows($res1)==0)
		{
			echo "<script> alert('No Items Added !!') </script>";
        	echo '<script>
	    			function pageRedirect()
	    			{
	        			window.location.replace("Home.php");
	    			}      
	    			setTimeout("pageRedirect()", 1);
					</script>';
		}
		else
		{
        	$q2="INSERT into sales_mast VALUES('".$invno."','".$indt."','".$spnm."','".$clid."',".$tota.")";
        	if(!mysqli_query($con,$q2))
        	{
        		echo("Error description: " . mysqli_error($con));
        	}
      		else
      		{
      			while($row1=mysqli_fetch_assoc($res1))
      			{
      				$q3="INSERT into sales_det VALUES('".$row1['Inv_No']."','".$row1['Pr_Id']."',".$row1['Pr_Qty'].",".$row1['C_Qty'].",".$row1['Amt'].",".$row1['Disc'].",".$row1['Gst_Rate'].",".$row1['Total_Amt'].")";
      				if(!mysqli_query($con,$q3))
		        	{
		        		echo("Error description: " . mysqli_error($con));
		        	}
		      		else
		      		{
		      			$q7="UPDATE prod_mast set Pr_Stk=Pr_Stk-".$row1['Pr_Qty']." WHERE Pr_Id='".$row1['Pr_Id']."'";
		      			if(!mysqli_query($con,$q7))
			        	{
			        		echo("Error description: " . mysqli_error($con));
			        	}
			        	else
			        	{
			        		$q4="DELETE FROM sales_det_temp WHERE Pr_Id='".$row1['Pr_Id']."'";
			        		if(!mysqli_query($con,$q4))
				        	{
				        		echo("Error description: " . mysqli_error($con));
				        	}
				        	else
				        	{
				        		echo '<script>
						    			function pageRedirect()
						    			{
						        			window.location.replace("invoices.php");
						    			}      
						    			setTimeout("pageRedirect()", 1);
										</script>';
							}
			        	}
		      		}
      			}
      		}
		}
	}
?>