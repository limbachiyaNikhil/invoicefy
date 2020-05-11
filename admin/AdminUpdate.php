<?php
	include('AdminHead.php');
?>
		<script>
			function show(sel) {
				var nm = sel.options[sel.selectedIndex].value;  
				$("#rate1").html( "" );
				if (nm.length > 0 )
				{ 
					$.ajax({
						type: "POST",
						url: "fetch.php",
						data: "nm="+nm,
						cache: false,
						beforeSend: function () { 
						},
						success: function(html) {    
							$("#rate1").html( html );
						}
					});
				} 
			}
		</script>
<div id="main" class="container-fluid">
	<div>
		<h3 class="text-primary">Update Details</h3>
		<hr class="mb-3">
	</div>
	<div class="container rounded bg-white shadow-sm">
		    	<div id="rate1" class="form-group">  
		      			<?php
							$q4="SELECT * FROM client_mast";
							if(!mysqli_query($con,$q4))
							{
								echo ("Error description: " . mysqli_error($con));
							}
							else
							{
		        				$res4=mysqli_query($con,$q4);
		        			}
		        		?>
		        		<label class="mt-3">Name</label>
		      			<select class="custom-select d-block w-50" name="nm" id="nm" onchange="show(this);" required>
		      				<option value='#'>Select Client</option>
		        		<?php
		          			while($row4=mysqli_fetch_assoc($res4))
		          			{ 
		        		?>
		        		<option value='<?= $row4["Client_Id"]?>'><?= $row4["C_Name"]?></option>
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
						$cid=$_POST["nm"];
						$ml = $_POST["mail"];
						$cname = $_POST['cname'];
						$add = $_POST['add'];
						$city = $_POST['city'];
						$state = $_POST['state'];
						$pin = $_POST['pin'];
						$gst = $_POST['gst'];
						$mob = $_POST['mob'];
						$pass = $_POST['pass'];
						$sd = $_POST['sd'];
						$ed = $_POST['ed'];

					    $q="UPDATE client_mast set C_Mail_Id='".$ml."',Comp_Name='".$cname."',C_Address='".$add."',C_City='".$city."',C_State='".$state."',C_Pincode=".$pin.",C_Gstn_No='".$gst."',C_Mob_No=".$mob.",C_Password='".$pass."',C_Subscription_Dt='".$sd."',C_Expiry_Dt='".$ed."' WHERE Client_Id='".$cid."'";
					    
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
</div>
<?php
	include('AdminFooter.php');
?>
