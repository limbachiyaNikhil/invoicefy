<?php
	include("inclds/head.php");
	include("inclds/head2.php");
?>
		<script>
			function show(sel) {
				var nm = sel.options[sel.selectedIndex].value;  
				$("#mcust").html( "" );
				if (nm.length > 0 )
				{ 
					$.ajax({
						type: "POST",
						url: "fetch_cust.php",
						data: "nm="+nm,
						cache: false,
						beforeSend: function () { 
						},
						success: function(html) {    
							$("#mcust").html( html );
						}
					});
				} 
			}
		</script>

<div id="main" class="container rounded shadow-sm bg-white">
	<h4 class="text-primary pt-3">Manage Customer</h4>
    <hr class="mb-3">
<div>
    <div id="mcust" class="form-group">  
		      			<?php
							$q1="SELECT * FROM cust_mast WHERE Client_Id='{$clid}'";
							if(!mysqli_query($con,$q))
							{
								echo ("Error description: " . mysqli_error($con));
							}
							else
							{
		        				$res1=mysqli_query($con,$q1);
		        			}
		        		?>
		        		<label>Name</label>
		      			<select class="custom-select d-block w-50" name="nm" id="nm" onchange="show(this);" required>
		      				<option value='#'>Select Customer</option>
		        		<?php
		          			while($row1=mysqli_fetch_assoc($res1))
		          			{ 
		        		?>
		        		<option value='<?= $row1["Cust_Id"]?>'><?= $row1["Cust_Name"]?></option>
		        		<?php
		        		 	}
		        		?>
		      			</select>  
		    	</div>

		    <form class="form-group" method="POST">
		    	<div class="container">
					<button class="btn btn-primary mb-3" type="Submit">Update Details</button>
				</div>
		    		<?php
					if($_POST)
					{
						$cuid = $_POST['cuid'];
						$cname = $_POST['cname'];
						$add = $_POST['add'];
						$city = $_POST['city'];
						$state = $_POST['state'];
						$pin = $_POST['pin'];
						$gst = $_POST['gst'];
						$mob = $_POST['mob'];

					    $q="UPDATE cust_mast set Cust_Name='".$cname."',Address='".$add."',City='".$city."',State='".$state."',Pincode=".$pin.",Gstn_No='".$gst."',Mob_No=".$mob." WHERE Cust_Id='".$cuid."'";
					    
				   		if(!mysqli_query($con,$q))
				   		{
					        echo("Error description: " . mysqli_error($con));
					    }
					    else
					    {
					    	echo "Details Updated!";
						}
					
					}
					  
				?>
				</div>	    
		</form>
</div>
<?php
	include('inclds/footer.php');
?>