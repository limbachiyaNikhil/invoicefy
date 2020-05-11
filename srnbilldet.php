<?php 
	include('inclds/connection.php');
	session_start();
	$clid=$_SESSION['cli'];
	$inv_no=($_REQUEST["inv_no"] <> "") ? trim($_REQUEST["inv_no"]) : "";
	$q5="SELECT * from sales_mast S INNER JOIN cust_mast C ON S.Cust_Id=C.Cust_Id WHERE S.Inv_No='".$inv_no."'";
	if(!mysqli_query($con,$q5))
	{
		echo ("Error description: " . mysqli_error($con));
	}
	else
	{
	   	$res5=mysqli_query($con,$q5);
	   	$row5=mysqli_fetch_assoc($res5);
	   	$_SESSION['custid']=$row5['Cust_Id'];
	   	$_SESSION['oinvdt']=$row5['Inv_Date'];
	}
?>
<div class="row ml-1">
	<div class="col">
		<div class="form-group">
			<label class="form">Invoice Date</label>
			<input type="date" name="InvDt" class="form-control mx-sm-3 w-75" placeholder="Enter Invoice no" readonly value="<?= $row5['Inv_Date']?>">
		</div>
		<div class="form-group">
			<label class="form">Bill Total Value</label>
			<input type="text" name="CustNmb" class="w-50 form-control mx-sm-3" value="<?= $row5['Final_Amt']?>" readonly>
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label class="form">Customer Name</label>
			<input type="text" name="CustNmb" class="w-50 form-control mx-sm-3" value="<?= $row5['Cust_Name']?>" readonly>
		</div>
		<div>
			<button name="submit" class="subm btn btn-primary mx-sm-3 m-3" type="Submit">Submit</button>
		</div>
	</div>
</div>
