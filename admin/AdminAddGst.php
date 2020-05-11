<?php
	include('AdminHead.php');
?>
<div class="container-fluid" id="main">
		<h3 class="text-primary">Add GST values</h3>
		<hr class="mb-3">
    <div class="rounded container shadow-sm bg-white mb-3">
			<form method="POST">
        <label class="mt-3">Add GST Percentage</label>
				<input type="text" class="form-control" name="gst" placeholder="Add GST%">
				<button class="btn btn-primary mt-2 mb-3">Submit</button>
			</form>
    </div>
</div>

<?php
	if($_POST)
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
                        window.location.replace("AdminAddGst.php");
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