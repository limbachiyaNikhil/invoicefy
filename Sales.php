<script>
function showrate(sel) {
	var pr_id = sel.options[sel.selectedIndex].value;  
	$("#rate1").html( "" );
	if (pr_id.length > 0 )
	{ 
		$.ajax({
			type: "POST",
			url: "fetch_rates.php",
			data: "pr_id="+pr_id,
			cache: false,
			beforeSend: function () { 
				//$('#rate').html('<img src="loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#rate1").html( html );
			}
		});
	} 
}
</script>
<?php 
	include('inclds/head.php');
	include('inclds/head2.php');
	$invno=$_SESSION['invn'];
	$indt=$_SESSION['indt'];
    $spnm=$_SESSION['spnm'];

		$q2="SELECT * FROM cust_mast WHERE Cust_Id='".$spnm."'";
		if(!mysqli_query($con,$q2))
		{
			echo ("Error description: " . mysqli_error($con));
		}
		else
		{	
			$res2=mysqli_query($con,$q2);
			$row2=mysqli_fetch_array($res2);
			$q3="SELECT * FROM prod_mast P INNER JOIN sales_det_temp N ON P.Pr_Id=N.Pr_Id WHERE Inv_No='".$invno."'";
			if(!mysqli_query($con,$q3))
			{
				echo ("Error description: " . mysqli_error($con));
			}
			else
			{
				$res3=mysqli_query($con,$q3);
			}
		}
	
	if($_POST)
	{
		$prid=$_POST['pr'];
	    $qty=(int)$_POST['qty'];
	    $disc=((int)$_POST['disc'])*((int)$_POST['qty']);
	    $gstr=(int)$_POST['cgstp']*2;
	    $r=$_POST['rate2'];
	    $amt=$r*$qty;
	    $tamt=($amt-$disc)*(1+($gstr/100));
	    //new product insert
	    $q6="INSERT into sales_det_temp VALUES('".$invno."','".$prid."',".$qty.",".$qty.",".$amt.",".$disc.",".$gstr.",".$tamt.")";
	    //stock Check
	    $q8="SELECT Pr_Stk from prod_mast WHERE Pr_id='".$prid."'";
	    if(!mysqli_query($con,$q8))
	    {
	    	echo("Error description: " . mysqli_error($con));
	    }
	    else
	    {
	    	$res8=mysqli_query($con,$q8);
	    	$row8=mysqli_fetch_assoc($res8);
	    	if($qty<=$row8["Pr_Stk"])
	    	{
	    		if(!mysqli_query($con,$q6))
	      		{
			        echo("Error description: " . mysqli_error($con));
			    }
			    else
			    {
			    	$_SESSION['totamt']+=$tamt;
			    	include("inclds/Refreshpage.php");
			    }	
	    	}
	    	else
	    	{
	    		echo "<script> alert('Out of Stock!!') </script>";
	    		
	    	}
	    } 
	}
?>
<div id="main" class="container bg-light rounded bg-white shadow-sm">
	<form class="form-group p-3" method="POST" name="SalesF1">
		<h4 class="text-primary">Sales</h4>
		<hr class="mb-4">
		<div class="row ml-1">
			<div class="col">
				<div class="form-group">
					<label class="form">Invoice No.</label>
					<input type="text" name="Invno" class="form-control mx-sm-3 w-75" placeholder="Enter Invoice no" value="<?php echo $invno;?>" disabled>
					<label class="form">Invoice Date</label>
					<input type="Date" class="w-50 form-control mx-sm-3" disabled value="<?php echo $indt;?>">
				</div>
			</div>
			<div class="m-1 col border">
				<label class="form">Customer name</label>
				<input type="text" class="w-50 form-control mx-sm-3" disabled value="<?php echo $row2[2];?>">
			</div>
		</div>
	</form>
	<form class="form-group p-3" method="POST" name="SalesF2"> 
		<hr class="mb-4">
		<label class="form">Enter Product Details</label>
		<table class="table">
		  	<thead class="thead-light">
				<th scope="col">Name</th>
			    <th scope="col">Quantity</th>
			    <th scope="col">Rate</th>
			    <th scope="col">Discount</th>
			    <th scope="col">CGST(%)</th>
			    <th scope="col">CGST(Amount)</th>
			    <th scope="col">SGST(%)</th>
			    <th scope="col">SGST(Amount)</th>
			    <th scope="col">Submit</th>
		  	</thead>
		  	<tbody>
		    	<tr id="rate1">
		      		<td>  
		      			<?php
							$q4="SELECT * FROM prod_mast WHERE Client_id='".$clid."'";
							if(!mysqli_query($con,$q4))
							{
								echo ("Error description: " . mysqli_error($con));
							}
							else
							{
		        				$res4=mysqli_query($con,$q4);
		        			}
		        		?>
		      			<select class="custom-select d-block w-100" name="pr" id="pr" onchange="showrate(this);" required>
		      				<option value=''>Select Product</option>
		        		<?php
		          			while($row4=mysqli_fetch_assoc($res4))
		          			{ 
		        		?>
		        		<option value='<?= $row4["Pr_Id"]?>'><?= $row4["Pr_Name"]?></option>
		        		<?php
		        		 	}
		        		?>
		      			</select>
		      		</td>  
		    	</tr>		    
		  	</tbody>
		</table>
	</form>
	<form class="form-group p-3" method="POST" name="SalesF3"> 
		<hr class="mb-4">
		<label class="form">Submited Product Details</label>
		<table class="table">
		  	<thead class="thead-light">
			    <th scope="col">Name</th>
			    <th scope="col">Quantity</th>
			    <th scope="col">Rate</th>
			    <th scope="col">Discount</th>
			    <th scope="col">CGST(%)</th>
			    <th scope="col">CGST(Amount)</th>
			    <th scope="col">SGST(%)</th>
			    <th scope="col">SGST(Amount)</th>
			    <th scope="col">Total</th>
		  	</thead>
		  	<tbody>
		  		<?php
		  			while($row3=mysqli_fetch_assoc($res3))
					{
				?>
				<tr>
		  			<td><label class="form"><?= $row3["Pr_Name"]?></label></td>
	  		        <td><label class="form"><?= $row3["Pr_Qty"]?></label></td>
			      	<td><label class="form"><?= $row3["Pr_Rate"]?></label></td>			<td><label class="form"><?= $row3["Disc"]?></label></td>
				    <td><label class="form"><?= $row3["Gst_Rate"]/2?></label></td>
				  	<td><label class="form"><?= (($row3["Pr_Rate"]*$row3["Pr_Qty"])-$row3["Disc"])*$row3["Gst_Rate"]/200?></label></td>
				    <td><label class="form"><?= $row3["Gst_Rate"]/2?></td>
				   	<td><label class="form"><?= (($row3["Pr_Rate"]*$row3["Pr_Qty"])-$row3["Disc"])*$row3["Gst_Rate"]/200?></td>
			     	<td><label class="form"><?= $row3["Total_Amt"]?></td>
		   		</tr>
				<?php
					}
				?>
		  	</tbody>
		</table>
		<hr class="mb-4">
		<div class="align-right">
			<a href="Salesa.php">Submit & Print Bill</a>
		</div>
	</form>
</div>
<?php
  	include('inclds/footer.php');
?>