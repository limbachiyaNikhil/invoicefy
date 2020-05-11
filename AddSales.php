<?php 
	include('inclds/head.php');
	include('inclds/head2.php');
	$q1="SELECT * FROM sales_mast WHERE Client_Id='".$clid."'";
	$q2="DELETE FROM sales_det_temp";
    if(!mysqli_query($con,$q2))
	{
		echo ("Error description: " . mysqli_error($con));
	}
	else
	{
		$_SESSION['totamt']=0;
		if(!mysqli_query($con,$q1))
		{
			echo ("Error description: " . mysqli_error($con));
		}
		else
		{
			$q4="SELECT * FROM bill_series WHERE Client_id='".$clid."'";
			if(!mysqli_query($con,$q4))
			{
				echo ("Error description: " . mysqli_error($con));
			}
			else
			{
				$res4=mysqli_query($con,$q4);
				$row4=mysqli_fetch_assoc($res4);
				$pre=$row4["S_Prefix"];
				$res1=mysqli_query($con,$q1);
				$cnt=1;
		    	$i=mysqli_num_rows($res1);
		  		$cnt+=$i;
		  		$str=$clid."-".$pre.strval($cnt);
		  		$prev=$clid."-".$pre.strval($i);
			}
		}
	}
	if(isset($_POST['submit']))
  	{
  		$q5="SELECT * FROM sales_mast WHERE Inv_No='".$prev."'";
  		if(!mysqli_query($con,$q5))
		{
			echo ("Error description: " . mysqli_error($con));
		}
		else
		{
			$res5=mysqli_query($con,$q5);
			$row5=mysqli_fetch_assoc($res5);
			$dt=$row5['Inv_Date'];
			$dt1=$_POST['InvDt'];
			$cur=date('Y-m-d',time());
			if($dt1<$dt OR $dt1>$cur)
			{
				echo "<script> alert('Please Enter proper Date!! Date is either greater than current date or transaction exists in future date') </script>";
			}
			else
			{
				$_SESSION['invn']=$str;
		       	$_SESSION['indt']=$_POST['InvDt'];
		       	$_SESSION['spnm']=$_POST['spnm'];
			   	echo '<script>
			    			function pageRedirect()
			    			{
			        			window.location.replace("Sales.php");
			    			}      
			    			setTimeout("pageRedirect()", 1);
							</script>';
			}
		}       		 
	}
?>
<div id="main" class="container bg-light rounded bg-white shadow-sm">
	<form class="form-group p-3" method="POST" name="SMaster">
		<h4 class="text-primary">Sales</h4>
		<hr class="mb-4">
		<div class="row ml-1">
			<div class="col">
				<div class="form-group">
					<label class="form">Invoice No.</label>
					<input type="text" name="InvNo" class="form-control mx-sm-3 w-75" placeholder="Enter Invoice no" disabled value="<?= $str?>">
					<label class="form">Invoice Date</label>
					<input type="Date" name="InvDt" class="w-50 form-control mx-sm-3" required>
				</div>
			</div>
			<div class="m-1 col border">
				<label class="form">Select Customer name</label>
				<select class="custom-select d-block w-50 mx-sm-3" name="spnm" id="spnm" required>
					<?php
          				$q3="SELECT * FROM cust_mast WHERE Client_id='".$clid."'";
          				$res2=mysqli_query($con,$q3);
          				while($row=mysqli_fetch_array($res2)){ 
        			?>
        				<option value="<?= $row[0]?>"><?= $row[2]?></option>
        			<?php 
        				}
        			?>
            	</select>
            	<div>
					<button name="submit" class="subm btn btn-primary mx-sm-3 m-3" type="Submit">Submit</button>
				</div> 	
			</div>
		</div>
	</form>
</div>
<?php include('inclds/footer.php');?>