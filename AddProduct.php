<?php 
  include('inclds/head.php');
  include('inclds/head2.php');
?>
<head>
  <script>
    function validateForm()
    {
      if(is_numeric(AddProduct.prate.value))
      {
        if(is_numeric(AddProduct.pqty.value))
        {
          return true;
        }
        else
        {
          alert("Please Enter Proper Quantity!!");
          return false;
        }
      }
      else
      {
        alert("Please Enter Proper Rate!!");
      }
    }
  </script>
</head>
<div id="main" class="container bg-light rounded bg-white shadow-sm">	
	<form class="form-group p-3 " method="POST" name="AddProduct" onsubmit="return validateForm()">
		<h4 class="text-primary">Add Products</h4>
    <hr class="mb-4">
    <div>
      <label>Add product name</label>
      <input type="text" name="Pname" class="form-control" id="productname" placeholder="Enter Product name">
    </div><br>
    <div class="w-50">
      <label>Select Category</label>
      <select class="custom-select d-block w-100" name="cat_id" id="cat_id" required>
        <?php
          $q3="SELECT * from cat_mast where Client_id='".$clid."'";
          $res2=mysqli_query($con,$q3);
          while($row=mysqli_fetch_array($res2)){ 
        ?>
        <option value=<?php echo $row[0]?>><?php echo $row[1]?></option>
        <?php }?>
      </select>
    </div><br>
    <div>
  	  <label>Add product description</label>
  	  <input type="text" name="pdesc" class="form-control w-100" style="height: 100px;" id="productdesc" placeholder="Enter Product description">
    </div><br>
    <div>
      <label>Add product rate</label>
      <input type="text" name="prate" class="form-control" id="productrate" placeholder="Enter Product rate">
    </div><br>
    <div>
      <label>Opening Stock</label>
      <input type="text" name="pqty" class="form-control" id="productqty" placeholder="Enter Opening Stock" required>
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
    $pnm=$_POST['Pname'];
    $pd=$_POST['pdesc'];
    $ci=$_POST['cat_id'];
    $pr=$_POST['prate'];
    $qty=$_POST['pqty'];
    $q1="SELECT * FROM prod_mast WHERE Client_id='{$clid}'";
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
        $str = $str."P0".strval($cnt);
      }
      else
      {
        $str = $str."P00".strval($cnt);
      }
      $dup=0;
      while($row1=mysqli_fetch_assoc($res1))
      {
        if($pnm==$row1['Pr_Name'])
        {
          echo "<script> alert('Product Already Added!!') </script>";
          echo '<script>
                    function pageRedirect()
                    {
                        window.location.replace("AddProduct.php");
                    }      
                    setTimeout("pageRedirect()", 1);
                  </script>';
          $dup=1;
        }
      }
      if($dup==0)
      {
        $q2="INSERT into prod_mast VALUES('".$str."','".$ci."','".$pnm."','".$pd."','".$pr."',".$qty.",'".$clid."')";
        if(!mysqli_query($con,$q2))
        {
          echo("Error description: " . mysqli_error($con));
        }
        else
        {
          echo "<script>alert('Product added');</script>";
        }
      }
    }
  }
	include('inclds/footer.php');
?>