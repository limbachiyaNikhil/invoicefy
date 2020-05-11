<div>
	<?php
		include('inclds/connection.php');
		session_start();
		$nm=($_REQUEST["nm"] <> "") ? trim($_REQUEST["nm"]) : "";
		$q="SELECT * from cust_mast WHERE Cust_Id='{$nm}'";
		if(!mysqli_query($con,$q))
		{
			echo ("Error description: " . mysqli_error($con));
		}
		else
		{
		   	$res=mysqli_query($con,$q);
		   	$row=mysqli_fetch_assoc($res);
		   	$_SESSION["cusid"]=$row['Cust_Id'];
		}
	?>
	<label>Supplier Name</label>
	<?php
        $q1="SELECT * FROM cust_mast WHERE Client_Id='{$_SESSION['cli']}'";
        if(!mysqli_query($con,$q1))
        {
          echo ("Error description: " . mysqli_error($con));
        }
        else
        {
          	$res1=mysqli_query($con,$q1);
        }
    ?>
    <select class="custom-select d-block w-50" name="nm" id="nm" onchange="show(this);" required>
    <?php
		while($row1=mysqli_fetch_assoc($res1))
		{ 
		    if($row1["Cust_Id"]==$nm)
		    {
    ?>
	<option value='<?= $row1["Cust_Id"]?>' selected><?= $row1["Cust_Name"]?></option>
	<?php
			}
			else
			{
	?>
	<option value='<?= $row1["Cust_Id"]?>'><?= $row1["Cust_Name"]?></option>
	<?php
			}
		}
	?>
	</select>
</div>
<div>
    <label>Address</label>
    <input type="text" name="Address" class="form-control w-100" style="height: 100px;" id="Address" placeholder="Address" value='<?= $row["Address"]?>' required>
</div><br>
<div class="row">
	<div class="col-md-5 mb-3">
        <label for="State">State</label>
        <input type="text" class="form-control" name="state" id="state" placeholder="Enter your State here" value='<?= $row["State"]?>' required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="City">City</label>
        <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city here" value='<?= $row["City"]?>' required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="Pincode">Pin Code</label>
        <input type="text" class="form-control" name="Pincode" id="Pincode" placeholder="123456" value='<?= $row["Pincode"]?>' required>
    </div>
</div>
<div>
    <label for="GSTN_No">GST No.</label>
    <input type="text" class="form-control" name="GSTNNo" id="GSTNNo" placeholder="Enter your GST No. here" value='<?= $row["Gstn_No"]?>' required>
</div><br>
<div>
    <label for="Mob_No">Mobile Number</label>
    <input type="text" class="form-control" name="Mob_No" id="Mob_No" placeholder="Enter your Mobile Number here" value='<?= $row["Mob_No"]?>' required>
</div>
<hr class="mb-4">
<div>
  	<button class="btn btn-primary" type="Submit">Submit</button>
</div>