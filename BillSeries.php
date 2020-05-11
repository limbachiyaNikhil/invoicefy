<?php 
	include('inclds/head.php');
	include('inclds/head2.php');
	$q2="SELECT * FROM bill_series where Client_id='".$clid."'";
	if(!$res1=mysqli_query($con,$q2))
    {
    	echo("Error description: " . mysqli_error($con));
    }
    else
    {
    	$i=mysqli_num_rows($res1);
    	if($i>0)
    	{
	       	echo '<script> alert("Bill Series Already Added");
	    			function pageRedirect()
	    			{
	        			window.location.replace("Home.php");
	    			}      
	    			setTimeout("pageRedirect()", 1);
					</script>';
		}
    }
	if($_POST)
  	{
    	$p=$_POST['purchase'];
    	$pr=$_POST['purchaseret'];
    	$s=$_POST['sales'];
    	$sr=$_POST['salesret'];
   		$q1="INSERT into bill_series values('".$clid."','".$p."','".$pr."','".$s."','".$sr."')";
   		if(!mysqli_query($con,$q1))
      	{
        	echo("Error description: " . mysqli_error($con));
      	}
      	else
      	{
        	echo '<script>alert("Your Registration is Successfully completed!");
              function pageRedirect()
            {
                window.location.replace("Home.php");
            }      
            setTimeout("pageRedirect()", 1);
              </script>';
      	}
   	}
?>
<div id="main" class="container bg-light  rounded bg-white shadow-sm">
	<form class="form-group p-3" method="POST">
		<h4 class="text-primary">Generate your Bill Series</h4>
		<p class="font-weight-light">Here you can manually make your Invoice Number</p>
		<hr class="mb-4">
		<div class="row ml-1">
			<div class="col">
				<label class="font-weight-bold">Purchase</label>
				<div class="form-group form-inline">
					<input type="text" class="form-control mx-sm-3" value="<?= $clid?>" placeholder="Client Id" readonly>
					<p class="font-weight-bold">-</p>
					<input type="text" class="form-control mx-sm-3" name="purchase" placeholder="ABCXYZ">
			  	</div>
			</div>
			<div class="col">
				<label class="font-weight-bold">Purchase Return</label>
					<div class="form-group form-inline">
						<input type="text" class="form-control mx-sm-3" value="<?= $clid?>" placeholder="Client Id" readonly>
						<p class="font-weight-bold">-</p>
						<input type="text" class="form-control mx-sm-3" name="purchaseret" placeholder="ABCXYZ">
			  		</div>
			</div>
		</div>
		<hr class="mb-4">
		<div class="row ml-1">
			<div class="col">
				<label class="font-weight-bold">Sales</label>
					<div class="form-group form-inline">
						<input type="text" class="form-control mx-sm-3" value="<?= $clid?>" placeholder="Client Id" readonly>
						<p class="font-weight-bold">-</p>
						<input type="text" class="form-control mx-sm-3" name="sales" placeholder="ABCXYZ">
			  		</div>
			</div>
			<div class="col">
				<label class="font-weight-bold">Sales Return</label>
					<div class="form-group form-inline">
						<input type="text" class="form-control mx-sm-3" value="<?= $clid?>" placeholder="Client Id" readonly>
						<p class="font-weight-bold">-</p>
						<input type="text" class="form-control mx-sm-3" name="salesret" placeholder="ABCXYZ">
			  		</div>
			</div>
		</div>
		<hr class="mb-4">
		<div>
			<button class="btn btn-primary" type="Submit">Submit</button>
		</div> 
	</form>
</div>
<?php
  	include('inclds/footer.php');
?>