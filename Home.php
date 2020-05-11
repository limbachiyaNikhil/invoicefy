<?php
	include("inclds/head.php");
	include("inclds/head2.php");
	$q1="SELECT * FROM client_mast WHERE Client_Id='{$clid}'";
	$q2="SELECT count(Cust_Id) FROM cust_mast WHERE Client_Id='{$clid}'";
	$q3="SELECT count(Supp_Id) FROM supp_mast WHERE Client_Id='{$clid}'";
	$q4="SELECT count(Cat_Id) FROM cat_mast WHERE Client_Id='{$clid}'";
	$q5="SELECT count(Pr_Id) FROM prod_mast WHERE Client_Id='{$clid}'";
	$q6="SELECT count(Inv_No),sum(Final_Amt) FROM sales_mast WHERE Client_Id='{$clid}'";
	$q7="SELECT count(Inv_No),sum(Final_Amt) FROM purchase_mast WHERE Client_Id='{$clid}'";
	$q8="SELECT count(Srn_No),sum(Final_Amt) FROM sales_ret_mast WHERE Client_Id='{$clid}'";
	$q9="SELECT count(Prn_No),sum(Final_Amt) FROM purchase_ret_mast WHERE Client_Id='{$clid}'";
	$s=0;
	$p=0;
	$sr=0;
	$pr=0;
	if(!mysqli_query($con,$q1))
	{
		echo ("Error description: " . mysqli_error($con));
	}
	else
	{
	   	$res1=mysqli_query($con,$q1);
	   	$row1=mysqli_fetch_assoc($res1);
  		if(!mysqli_query($con,$q2))
		{
			echo ("Error description: " . mysqli_error($con));
		}
		else
		{
			$res2=mysqli_query($con,$q2);
	   		$row2=mysqli_fetch_array($res2);
	   		if(!mysqli_query($con,$q3))
			{
				echo ("Error description: " . mysqli_error($con));
			}
			else
			{
				$res3=mysqli_query($con,$q3);
	   			$row3=mysqli_fetch_array($res3);
	   			if(!mysqli_query($con,$q4))
				{
					echo ("Error description: " . mysqli_error($con));
				}
				else
				{
					$res4=mysqli_query($con,$q4);
			   		$row4=mysqli_fetch_array($res4);
			   		if(!mysqli_query($con,$q5))
					{
						echo ("Error description: " . mysqli_error($con));
					}
					else
					{
						$res5=mysqli_query($con,$q5);
				   		$row5=mysqli_fetch_array($res5);
				   		if(!mysqli_query($con,$q6))
						{
							echo ("Error description: " . mysqli_error($con));
						}
						else
						{
							$res6=mysqli_query($con,$q6);
					   		$row6=mysqli_fetch_array($res6);
					   		$s+=$row6['1'];
					   		if(!mysqli_query($con,$q7))
							{
								echo ("Error description: " . mysqli_error($con));
							}
							else
							{
								$res7=mysqli_query($con,$q7);
						   		$row7=mysqli_fetch_array($res7);
						   		$p+=$row7['1'];
						   		if(!mysqli_query($con,$q8))
								{
									echo ("Error description: " . mysqli_error($con));
								}
								else
								{
									$res8=mysqli_query($con,$q8);
							   		$row8=mysqli_fetch_array($res8);
							   		$sr+=$row8['1'];
							   		if(!mysqli_query($con,$q9))
									{
										echo ("Error description: " . mysqli_error($con));
									}
									else
									{
										$res9=mysqli_query($con,$q9);
								   		$row9=mysqli_fetch_array($res9);
								   		$pr+=$row9['1'];
								   	}
								}
							}
						}
					}
				}
			}
		}
	}
?>
<div id="main" class="container mb-4 bg-light"> 
    <h3 class="mt-4 mb-3">Dashboard</h3>

<style type="text/css">
	.cd{
		border-width: 1px 1px 1px 5px;
		border-left-color: rgb(240, 173, 78);
	}
	.cd1{
		border-width: 1px 1px 5px 1px;
		border-bottom-color: rgb(66,139,202);
	}
	.cd2{
		border-width: 1px 1px 1px 5px;
		border-left-color: rgb(91,192,222);
	}
	.cd3{
		border-width: 1px 1px 1px 5px;
		border-left-color: rgb(92,184,92);
	}
	.fas{
		padding-bottom: 3px;
	}

</style>

<div class="cd2 card rounded shadow-sm mb-4">
  <div class="card-body">
  	  <h4 class="card-title"><span style="font-size:1.5rem"><i class="fas fa-address-card"></i></span> User Profile</h4>
  	  <hr class="mb-2">
  	  <div class="row">
  	  	<div class="col">
  	  		<p><span style="font-size:1.5rem"><i class="fas fa-user"></i></span>&nbsp;&nbsp;<?= $row1['C_Name']?></p>
        	<p><span style="font-size:1.5rem"><i class="fas fa-city"></i></span>&nbsp;&nbsp;<?= $row1['Comp_Name']?></p>
  	  	</div>
  	  	<div class="col">
  	  		<p><span style="font-size:1.5rem"><i class="fas fa-phone-square-alt"></i></span>&nbsp;&nbsp;<?= $row1['C_Mob_No']?></p>
        	<p><span style="font-size:1.5rem"><i class="fas fa-at"></i></span>&nbsp;&nbsp;<?= $row1['C_Mail_Id']?></p>
  	  	</div>
  	  </div>
  	  <hr class="mb-2">
  	  <p>GSTIN Number &#x2022 <?= $row1['C_Gstn_No']?></p>
  </div>
</div>


		<div class="card-deck text-center mb-4">
			<div class="cd card rounded shadow-sm">
			  <div class="card-body">
			  	<span style="font-size: 3rem"><i class="fas fa-users"></i></span>
			    <h5 class="card-title">Total Customers </h5>
			    <p class="card-text h3"><?=$row2['0']?></p>
			  </div>
			</div>
			<div class="cd card rounded shadow-sm">
			  <div class="card-body">
			  	<span style="font-size: 3rem"><i class="fas fa-people-carry"></i></span>
			    <h5 class="card-title">Total Suppliers</h5>
			    <p class="card-text h3"><?=$row3['0']?></p>
			  </div>
			</div>
			<div class="cd card rounded shadow-sm">
			  <div class="card-body">
			  	<span style="font-size: 3rem"><i class="fas fa-clipboard-list"></i></span>
			    <h5 class="card-title">Total Categories</h5>
			    <p class="card-text h3"><?=$row4['0']?></p>
			  </div>
			</div>
			<div class="cd card rounded shadow-sm">
			  <div class="card-body">
			  	<span style="font-size: 3rem"><i class="fas fa-box"></i></span>
			    <h5 class="card-title">Total Products</h5>
			    <p class="card-text h3"><?=$row5['0']?></p>
			  </div>
			</div>
		</div>

<div class="cd1 card rounded shadow-sm text-center mb-4">
  <div class="card-body">
    <div class="row">
    	<div class="col">
    		<span style="font-size: 3rem"><i class="fas fa-rupee-sign"></i></span>
    		<h5 class="card-title">Total Sales Value</h5>
    		<h1 class="card-title"><?=$s?></h1>
    	</div>
     	<div class="col">
     		<span style="font-size: 3rem"><i class="fas fa-rupee-sign"></i></span>
    		<h5 class="card-title">Total Purchase Value</h5>
    		<h1 class="card-title"><?=$p?></h1>
    	</div>
       	<div class="col">
       		<span style="font-size: 3rem"><i class="fas fa-rupee-sign"></i></span>
    		<h5 class="card-title">Total Sales Return Value</h5>
    		<h1 class="card-title"><?=$sr?></h1>
    	</div>
    	<div class="col">
    		<span style="font-size: 3rem"><i class="fas fa-rupee-sign"></i></span>
    		<h5 class="card-title">Total Purchase Return Value</h5>
    		<h1 class="card-title"><?=$pr?></h1>
    	</div>
    </div>
  </div>
</div>

<div class="card-deck">
	<div class="col-8">
		    <div class="cd3 card text-center rounded shadow-sm">
		      <div class="card-body">
		      	<span style="font-size: 3rem"><i class="fas fa-file-invoice"></i></span>
		        <h5 class="card-title">Generated Invoices</h5>
		        <hr class="mb-2">
		        <div class="row">
		        	<div class="col">
			    		<h5 class="card-title">Sales</h5>
			    		<h1 class="card-title"><?=$row6['0']?></h1>        		
		        	</div>
		        	<div class="col">
			    		<h5 class="card-title">Purchase</h5>
			    		<h1 class="card-title"><?=$row7['0']?></h1>        		
		        	</div>
		           	<div class="col">
			    		<h5 class="card-title">Sales Return</h5>
			    		<h1 class="card-title"><?=$row8['0']?></h1>        		
		        	</div>
		           	<div class="col">
			    		<h5 class="card-title">Purchase Return</h5>
			    		<h1 class="card-title"><?=$row9['0']?></h1>        		
		        	</div>
		        </div>
		      </div>
		    </div>
		    </div>
		    <div class="col-4">
		    <div class="card rounded text-center shadow-sm bg-primary text-center">
		    	<img src="images/india.svg" class="card-img-top img-fluid container" style="height: 35% ; width:35%;" alt="image not found">
		      <div class="card-body">
		        <h5 class="text-white">Goods & Service Tax Portal</h5>
		        <a href="https://services.gst.gov.in/services/login" class="btn btn-light" target="_blank">Log-In</a>
		      </div>
		</div>
		</div>
</div>
		<div class="table-responsive mt-3">
		  <p class="h4">Manage Suppliers</p>		
		  <table class="table rounded bg-white shadow-sm">
		    <thead class="bg-primary text-white">
		    	<th>Name</th>
		    	<th>Address</th>
		    	<th>City</th>
		    	<th>State</th>
		    	<th>Pincode</th>
		    	<th>GSTN No.</th>
		    	<th>Mobile No.</th>
		    </thead> 
		    <tbody>
<?php
	$q10="SELECT * FROM supp_mast WHERE Client_Id='{$clid}' ";
	if (!mysqli_query($con,$q10)){
		echo("Error description: ".mysqli_error($con));
	}
	else{
		$res10 = mysqli_query($con,$q10);
		while ($row10 = mysqli_fetch_assoc($res10)) 
		{
			?>
			<tr>
				<td><label class="form"><?=$row10['Supp_Name']?></label></td>
				<td><label class="form"><?=$row10['Address']?></label></td>
				<td><label class="form"><?=$row10['City']?></label></td>
				<td><label class="form"><?=$row10['State']?></label></td>
				<td><label class="form"><?=$row10['Pincode']?></label></td>
				<td><label class="form"><?=$row10['Gstn_No']?></label></td>
				<td><label class="form"><?=$row10['Mob_No']?></label></td>
			</tr>
			<?php
						}
					}
			?>
			</tbody>
		</table>
	</div>
</div>
<?php
	include('inclds/footer.php');
?>