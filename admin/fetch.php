<div>
	<?php 
		include('connection.php');
		$nm=($_REQUEST["nm"] <> "") ? trim($_REQUEST["nm"]) : "";
		$q="SELECT * from client_mast WHERE Client_Id='{$nm}'";
		if(!mysqli_query($con,$q))
		{
			echo ("Error description: " . mysqli_error($con));
		}
		else
		{
		   	$res=mysqli_query($con,$q);
		   	$row=mysqli_fetch_assoc($res);
		}
	?>
	<label>Name</label>
	<select class="custom-select d-block w-50" name="nm" id="nm" onchange="show(this);" required>
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
		while($row4=mysqli_fetch_assoc($res4))
		{ 
		    if($row4["Client_Id"]==$nm)
		    {
    ?>
	<option value='<?= $row4["Client_Id"]?>' selected><?= $row4["C_Name"]?></option>
	<?php
			}
			else
			{
	?>
	<option value='<?= $row4["Client_Id"]?>'><?= $row4["C_Name"]?></option>
	<?php 
			}
		}
	?>
	</select>
</div>
<div class="form-group">
<div class="row">
	<div class="col">
		<label>E-mail</label>		    
		<input type="text" name="mail" class="form-control w-50" value="<?=$row['C_Mail_Id']?>">
	</div>
	<div class="col">
		<label>Company Name</label>
		<input type="text" name="cname" class="form-control w-50" value="<?=$row['Comp_Name']?>">
	</div> 
</div>
<div class="row">
	<div class="col">
		<label>Address</label>
		<input type="text" name="add" class="form-control w-50" value="<?=$row['C_Address']?>">
	</div>
	<div class="col">
		<label>City</label>
		<input type="text" name="city" class="form-control w-50" value="<?=$row['C_City']?>">
	</div> 
</div>		   	
<div class="row">
	<div class="col">
		<label>State</label>
		<input type="text" name="state" class="form-control w-50" value="<?=$row['C_State']?>">
	</div>
	<div class="col">
		<label>Pincode</label>
		<input type="text" name="pin" class="form-control w-50" value="<?=$row['C_Pincode']?>">
	</div> 
</div>
<div class="row">
	<div class="col">
		<label>GSTN No.</label>
		<input type="text" name="gst" class="form-control w-50" value="<?=$row['C_Gstn_No']?>">
	</div>
	<div class="col">
		<label>Mobile No.</label>
		<input type="text" name="mob" class="form-control w-50" value="<?=$row['C_Mob_No']?>">
	</div> 
</div>
<div class="row">
	<div class="col">
		<label>Password</label>
		<input type="text" name="pass" class="form-control w-50" value="<?=$row['C_Password']?>">
	</div>
	<div class="col">
		<label>Sub Date</label>
		<input type="text" name="sd" class="form-control w-50" value="<?=$row['C_Subscription_Dt']?>">	
	</div> 
	<div class="col">
		<label>Exp Date</label>
		<input type="text" name="ed" class="form-control w-50" value="<?=$row['C_Expiry_Dt']?>">
	</div>
</div>
</div>	