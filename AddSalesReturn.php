<script>
	function showbilldet(sel) {
		var inv_no = sel.options[sel.selectedIndex].value;  
		$("#billdet").html( "" );
		if (inv_no.length > 0 )
		{ 
			$.ajax({
				type: "POST",
				url: "srnbilldet.php",
				data: "inv_no="+inv_no,
				cache: false,
				beforeSend: function () { 
					//$('#rate').html('<img src="loader.gif" alt="" width="24" height="24">');
				},
				success: function(html) {    
					$("#billdet").html( html );
				}
			});
		} 
	}
</script>
<?php 
	include('inclds/head.php');
	include('inclds/head2.php');
	$q1="SELECT * FROM sales_ret_mast WHERE Client_Id='".$clid."'";
	$q2="DELETE FROM sales_ret_det_temp";
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
				$pre=$row4["Sr_Prefix"];
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
  		$onivdt=$_SESSION['oinvdt'];
  		$q6="SELECT * FROM sales_ret_mast WHERE Srn_No='".$prev."'";
  		if(!mysqli_query($con,$q6))
		{
			echo ("Error description: " . mysqli_error($con));
		}
		else
		{
			$res6=mysqli_query($con,$q6);
			$row6=mysqli_fetch_assoc($res6);
			$dt=$row6['Srn_Date'];
			$dt1=$_POST['SrnDt'];
			$cur=date('Y-m-d',time());
			if($dt1<$dt OR $dt1>$cur OR $dt1<$onivdt)
			{
				echo "<script> alert('Please Enter proper Date!! Date is either greater than current date or Date is less than Original Invoice Date or transaction exists in future date') </script>";
			}
			else
			{
		        $_SESSION['indt']=$_POST['SrnDt'];
			    $_SESSION['oinvn']=$_POST['invno'];
		        $_SESSION['invn']=$str;
			       	echo "<script>
		    				function pageRedirect() {
		        				window.location.replace('SalesReturn.php');
		    				}      
		    				setTimeout('pageRedirect()', 1);
						</script>";
			}
	   	}
	}
?>
<div id="main" class="container bg-light rounded bg-white shadow-sm">
	<form class="form-group p-3" method="POST" name="SRMaster">
		<h4 class="text-primary">Sales Return</h4>
		<hr class="mb-4">
		<div class="row ml-1">
			<div class="col">
				<div class="form-group">
					<label class="form">SRN No.</label>
					<input type="text" name="InvNo" class="form-control mx-sm-3 w-75" placeholder="Enter Invoice no" readonly value="<?= $str?>">
					<label class="form">SRN Date</label>
					<input type="Date" name="SrnDt" class="w-50 form-control mx-sm-3" required>
				</div>
			</div>
			<div class="m-1 col border">
				<label class="form">Select Orginal Invoice No.</label>
				<select class="custom-select d-block w-50 mx-sm-3" name="invno" onchange="showbilldet(this);" id="invno" required>
					<option value="#">Select Original Bill</option>
					<?php
          				$q3="SELECT * FROM sales_mast WHERE Client_id='".$clid."'";
          				$res2=mysqli_query($con,$q3);
          				while($row2=mysqli_fetch_assoc($res2)){ 
        			?>
        				<option value="<?= $row2['Inv_No']?>"><?= $row2["Inv_No"]?></option>
        			<?php 
        				}
        			?>
            	</select>
            	<hr class="mb-4">
            	<div id="billdet">

            	</div>	
			</div>
		</div>
	</form>
</div>
<?php include('inclds/footer.php');?>