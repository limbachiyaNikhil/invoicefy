<?php
		include('AdminHead.php');
		$q1="SELECT COUNT(Client_Id) FROM client_Mast";
		$q2="SELECT * FROM gst_rate";
		if(!mysqli_query($con,$q1))
		{
			echo ("Error description: " . mysqli_error($con));
		}
		else
		{
       		$res=mysqli_query($con,$q1);
       		$row=mysqli_fetch_array($res);
       		if(!mysqli_query($con,$q2))
			{
				echo ("Error description: " . mysqli_error($con));
			}
			else
			{
	       		$res2=mysqli_query($con,$q2);
			}
        }

    ?>
<div class="container-fluid">
	<div class="row text-center">
		<div class="card text-white bg-primary mt-3 ml-3 mr-3 mb-3" style="max-width: 18rem;">
			  <div class="card-header">Total Clients</div>
			  <div class="card-body">
			    <h1 class="card-title"><?=$row[0]?></h1>
			  </div>
		</div>
		<div class="card mt-3 ml-3 mb-3" style="max-width: 18rem;">
			  <div class="card-header">Add GST Percentage</div>
			  <div class="card-body">
			  	<form method="POST">
			    	<input type="text" class="form-control" name="gst" placeholder="Add GST%">
					<button class="btn btn-primary mt-2" name="addgst">Submit</button>
				</form>
			  </div>
		</div>
		
		<div class="card mt-3 ml-3 mb-3" style="max-width: 18rem;">
			  <div class="card-header">Added GST Percentage</div>
			  <div class="card-body">
			  	<table class="table">
			  		<thead class="thead-light">
			    		<th scope="col">Sr No</th>
				    	<th scope="col">Gst Rate</th>
				  	</thead>
				  	<tbody>
			  	<?php
			  		while($row2=mysqli_fetch_array($res2))
			  		{
			  	?>
			  			<tr>
			  				<td><label class="form"><?= $row2["Sr_No"]?></label></td>
	  		        		<td><label class="form"><?= $row2["Gst_Rate"]?></label></td>
	  		        	</tr>
	  		    <?php
			  		} 
			  	?>
			  		</tbody>
			  	</table>
			  </div>
		</div>
	</div>
		<hr class="mb-4">
		<h4 class="font-weight-bold">Client Details</h4>
		<div class="table-responsive rounded shadow-sm bg-white mb-3">
		<table class="table text-center" width="100%">
		  	<thead class="thead bg-primary text-white">
		  		<th scope="col">Client Id</th>
			    <th scope="col">Name</th>
			    <th scope="col">E-mail</th>
			    <th scope="col">Company Name</th>
			    <th scope="col">Address</th>
			    <th scope="col">City</th>
			    <th scope="col">State</th>
			    <th scope="col">Pincode</th>
			    <th scope="col">GSTN No.</th>
			    <th scope="col">Mobile No.</th>
			    <th scope="col">Password</th>
			    <th scope="col">Sub Date</th>
			    <th scope="col">Exp Date</th>			    
		  	</thead>
		  	<tbody>
		  		<?php
		  			$q="SELECT * FROM client_Mast";
					if(!mysqli_query($con,$q))
					{
						echo ("Error description: " . mysqli_error($con));
					}
					else
					{
        				$res=mysqli_query($con,$q);
        			}		        			
		  			while($row=mysqli_fetch_assoc($res))
					{
				?>
				<tr>
		  			<td><label class="form"><?= $row["Client_Id"]?></label></td>
	  		        <td><label class="form"><?= $row["C_Name"]?></label></td>
			      	<td><label class="form"><?= $row["C_Mail_Id"]?></label></td>
			      	<td><label class="form"><?= $row["Comp_Name"]?></label></td>
			      	<td><label class="form"><?= $row["C_Address"]?></label></td>
			      	<td><label class="form"><?= $row["C_City"]?></label></td>
			      	<td><label class="form"><?= $row["C_State"]?></label></td>
			      	<td><label class="form"><?= $row["C_Pincode"]?></label></td>
			      	<td><label class="form"><?= $row["C_Gstn_No"]?></label></td>
			      	<td><label class="form"><?= $row["C_Mob_No"]?></label></td>
			      	<td><label class="form"><?= $row["C_Password"]?></label></td>
			      	<td><label class="form"><?= $row["C_Subscription_Dt"]?></label></td>
			      	<td><label class="form"><?= $row["C_Expiry_Dt"]?></label></td>
		   		</tr>
				<?php
					}
				?>
		  	</tbody>
		</table>
	</div>
</div>
<?php
	if(isset($_POST['addgst']))
  {
    $gstrt=$_POST['gst'];
    $q1="SELECT * FROM gst_rate";
    if(!mysqli_query($con,$q1))
    {
      echo ("Error description: " . mysqli_error($con));
    }
    else
    {
      $res1=mysqli_query($con,$q1);
      $cnt=1;
      $i=mysqli_num_rows($res1);
      $cnt+=$i;
      $dup=0;
      while($row1=mysqli_fetch_assoc($res1))
      {
        if($gstrt==$row1['Gst_Rate'])
        {
          echo "<script> alert('Gst Rate Already Added!!') </script>";
          echo '<script>
                    function pageRedirect()
                    {
                        window.location.replace("index.php");
                    }      
                    setTimeout("pageRedirect()", 1);
                  </script>';
          $dup=1;
        }
      }
      if($dup==0)
      {
        $q2="INSERT into gst_rate VALUES(".$cnt.",".$gstrt.")";
        if(!mysqli_query($con,$q2))
        {
          echo("Error description: " . mysqli_error($con));
        }
        else
        {
          echo "<script>alert('Gst Rate Added');</script>";
        }
      }
    }
  }
	include('AdminFooter.php');
?>