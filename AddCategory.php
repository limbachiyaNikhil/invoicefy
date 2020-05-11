<?php 
  include('inclds/head.php');
  include('inclds/head2.php');
?>
<div id="main" class="container rounded bg-white shadow-sm">	
	<form class="form-group p-3" method="POST">
		<h4 class="text-primary">Category</h4>
    <hr class="mb-4">
  <div>
    <label for="formGroupExampleInput">Add category name</label>
    <input type="text" name="cname" class="form-control" id="formGroupExampleInput" placeholder="Name">
  </div><br>
  <div class="w-50">
    <label>Select GST Rate</label>
    <p class="font-weight-light">Rates are fixed as per govt. lists</p>
            <select class="custom-select d-block w-100" name="grate" id="gst_rate" required>
              <?php
                $q3="SELECT * from gst_rate";
                $res3=mysqli_query($con,$q3);
                while($row3=mysqli_fetch_array($res3)){ 
              ?>
              <option value=<?php echo $row3[1]?>><?php echo $row3[1]?></option>
              <?php }?>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
    </div>
    <hr class="mb-4">
    <div>
	<button class="btn btn-primary" type="Submit">Submit</button>
	</div>

</form>
</div>
<?php
  if($_POST)
  {
    $cnm=$_POST['cname'];
    $gr=$_POST['grate'];
    $q1="SELECT * FROM cat_mast WHERE Client_Id='{$clid}'";
    if(!mysqli_query($con,$q1))
    {
      echo ("Error description: " . mysqli_error($con));
    }
    else
    {
      $res1=mysqli_query($con,$q1);
      $cnt=1;
      $str=$clid."-";
      $i=mysqli_num_rows($res1);
      $cnt+=$i;
      if ($cnt > 9)
      {
        $str = $str."B0".strval($cnt);
      }
      else
      {
        $str = $str."B00".strval($cnt);
      }
      $dup=0;
      while($row1=mysqli_fetch_assoc($res1))
      {
        if($cnm==$row1['Cat_Name'])
        {
          echo "<script> alert('Category Already Added!!') </script>";
          echo '<script>
                    function pageRedirect()
                    {
                        window.location.replace("AddCategory.php");
                    }      
                    setTimeout("pageRedirect()", 1);
                  </script>';
          $dup=1;
        }
      }
      if($dup==0)
      {
        $q2="INSERT into cat_mast VALUES('".$str."','".$cnm."','".$gr."','".$clid."')";
        if(!mysqli_query($con,$q2))
        {
          echo("Error description: " . mysqli_error($con));
        }
        else
        {
          echo "<script>alert('Category added');</script>";
        }
      }
    }
  }
  include('inclds/footer.php');
?>