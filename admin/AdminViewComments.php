<?php
	include('AdminHead.php');
?>
<div class="container-fluid">
<div>
		<h3 class="text-primary">Supports & Comments Details</h3>
		<hr class="mb-3">
</div>
<div class="table table-responsive rounded shadow-sm bg-white">
<table class="table">
	<thead class="bg-primary text-white">
		<th>Support Id</th>
		<th>Name</th>
		<th>E-Mail</th>
		<th>Description</th>
	</thead>
	<tbody>
			<?php
					$q="SELECT * FROM support";
					if(!mysqli_query($con,$q))
					{
						echo ("Error description: " . mysqli_error($con));
					}
					else
					{
						$res=mysqli_query($con,$q);
						while ($row=mysqli_fetch_assoc($res)) 
						{
			?>
			<tr>
				<td><label class="form"><?=$row['Sup_Id']?></label></td>
				<td><label class="form"><?=$row['Name']?></label></td>
				<td><label class="form"><?=$row['Email_Id']?></label></td>
				<td><label class="form"><?=$row['Description']?></label></td>
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
	include('AdminFooter.php');
?>