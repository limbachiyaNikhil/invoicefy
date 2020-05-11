<?php 
	include('inclds/connection.php');
	session_start();
	$clid=$_SESSION['cli'];
	$pr_id=($_REQUEST["pr_id"] <> "") ? trim($_REQUEST["pr_id"]) : "";
	$q5="SELECT * from prod_mast P INNER JOIN cat_mast C ON P.Cat_Id=C.Cat_Id WHERE P.Pr_Id='".$pr_id."'";
	if(!mysqli_query($con,$q5))
	{
		echo ("Error description: " . mysqli_error($con));
	}
	else
	{
	   	$res5=mysqli_query($con,$q5);
	   	$row5=mysqli_fetch_assoc($res5);
	}
?>
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
	<?php
		while($row4=mysqli_fetch_assoc($res4))
		{ 
		    if($row4["Pr_Id"]==$pr_id)
		    {
    ?>
	<option value='<?= $row4["Pr_Id"]?>' selected><?= $row4["Pr_Name"]?></option>
	<?php
			}
			else
			{
	?>
	<option value='<?= $row4["Pr_Id"]?>'><?= $row4["Pr_Name"]?></option>
	<?php 
			}
		}
	?>
	</select>
</td>
<td><input type="text" name="qty" class="form-control" value="1" placeholder="Quantity"></td>
<td><input type="text" name="rate2" class="form-control" placeholder="Rate" value='<?=$row5["Pr_Rate"]?>' readonly></td>
<td><input type="text" name="disc" class="form-control" value="0" placeholder="Discount"></td>
<td><input type="text" name="cgstp" class="form-control" placeholder="CGST %" value='<?= $row5["Gst_Rate"]/2?>' readonly></td>
<td><input type="text" name="cgsta" class="form-control" placeholder="CGST" value="<?=$row5["Pr_Rate"]*$row5["Gst_Rate"]/200?>" readonly></td>
<td><input type="text" name="sgstp" class="form-control" placeholder="SGST %" value="<?= $row5["Gst_Rate"]/2?>" readonly></td>
<td><input type="text" name="sgsta" class="form-control" placeholder="SGST" value="<?=$row5["Pr_Rate"]*$row5["Gst_Rate"]/200?>" readonly></td>
<td><button name="addl" class="btn btn-primary" type="Submit">Add</button></td>