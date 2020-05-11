<?php
	include("inclds/connection.php");
	session_start();
	$clid=$_SESSION['cli'];
	$invno=$_SESSION['invn'];
	$indt=$_SESSION['indt'];
    $spnm=$_SESSION['spnm'];
    $oinvn=$_SESSION['oinvn'];
    $tota=$_SESSION['totamt'];
	$q1="SELECT * FROM sales_ret_det_temp";
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
        	$q2="INSERT into sales_ret_mast VALUES('{$invno}','{$indt}','{$oinvn}','{$_SESSION['custid']}','{$clid}',{$tota})";
        	if(!mysqli_query($con,$q2))
        	{
        		echo("Error description: " . mysqli_error($con));
        	}
      		else
      		{
      			while($row1=mysqli_fetch_assoc($res1))
      			{
      				$q3="INSERT into sales_ret_det VALUES('".$row1['Srn_No']."','".$row1['Pr_Id']."',".$row1['Pr_Qty'].",".$row1['Amt'].",".$row1['Disc'].",".$row1['Gst_Rate'].",".$row1['Total_Amt'].")";
      				if(!mysqli_query($con,$q3))
		        	{
		        		echo("Error description: " . mysqli_error($con));
		        	}
		      		else
		      		{
		      			$q7="UPDATE prod_mast set Pr_Stk=Pr_Stk+".$row1['Pr_Qty']." WHERE Pr_Id='".$row1['Pr_Id']."'";
		      			if(!mysqli_query($con,$q7))
			        	{
			        		echo("Error description: " . mysqli_error($con));
			        	}
			        	else
			        	{
			        		$q10="UPDATE sales_det SET C_Qty=C_Qty-{$row1['Pr_Qty']} WHERE Inv_No='{$oinvn}' AND Pr_Id='{$row1['Pr_Id']}'";
			        		if(!mysqli_query($con,$q10))
				        	{
				        		echo("Error description: " . mysqli_error($con));
				        	}
				        	else
				        	{
				        		$q4="DELETE FROM sales_ret_det_temp WHERE Srn_No='{$invno}'";
				        		if(!mysqli_query($con,$q4))
					        	{
					        		echo("Error description: " . mysqli_error($con));
					        	}
					        	else
					        	{
					        		echo '<script>
							    			function pageRedirect()
							    			{
							        			window.location.replace("invoicesr.php");
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
	}
?>