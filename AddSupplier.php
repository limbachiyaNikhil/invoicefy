<?php 
  include('inclds/head.php');
  include('inclds/head2.php');
?>
<head>
  <script>
    function validateForm()
    {
      if(/^[789]{1}[0-9]{9}$/.test(Supplier.Mob_No.value))
      {
        if(/^[1-9]{1}[0-9]{5}$/.test(Supplier.Pincode.value))
        {
          if(document.forms["Supplier"]["GSTNNo"].value=="")
          {
            alert("GSTNNo was not mentioned !");
            return true;
          }
          else
          {
            if(/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9]{1}[0-9,A-Z]{2}$/.test(Supplier.GSTNNo.value))
            {
              return true;
            }
            else
            {
              alert("You have entered an invalid GSTN Number !");
              return false;            
            }
          }
        }
        else
        {
          alert("You have entered an invalid Pincode");
          return false;
        }
      } 
      else
      {
        alert("You have entered an invalid Mobile Number");
        return false;
      }
    }
  </script>
</head>
<div id="main" class="container bg-light rounded bg-white shadow-sm">	
	<form class="form-group p-3 needs-validation" method="POST" name="Supplier" onsubmit="return validateForm()">
		<h4 class="text-primary">Supplier Master</h4>
    <hr class="mb-4">
    <div>
      <label for="name">Supplier name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
    </div><br>
    <div>
      <label>Address</label>
      <input type="text" name="Address" class="form-control w-100" style="height: 100px;" id="Address" placeholder="Address" required>
    </div><br>
    <div class="row">
      <div class="col-md-5 mb-3">
        <label for="State">State</label>
        <input type="text" class="form-control" name="state" id="state" placeholder="Enter your State here" required>
      </div>
      <div class="col-md-4 mb-3">
        <label for="City">City</label>
        <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city here" required>
      </div>
      <div class="col-md-3 mb-3">
        <label for="Pincode">Pin Code</label>
        <input type="text" class="form-control" name="Pincode" id="Pincode" placeholder="123456" required>
      </div>
    </div>
    <div>
      <label for="GSTN_No">GST No.</label>
      <input type="text" class="form-control" name="GSTNNo" id="GSTNNo" placeholder="Enter your GST No. here" value="" required>
    </div><br>
    <div>
      <label for="Mob_No">Mobile Number</label>
      <input type="text" class="form-control" name="Mob_No" id="Mob_No" placeholder="Enter your Mobile Number here" value="" required>
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
    $q1="SELECT * FROM supp_mast WHERE Client_Id='".$clid."'";
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
        $str =$str."S0".strval($cnt);
      }
      else
      {
        $str =$str."S00".strval($cnt);
      }
      $nm=$_POST['name'];
      $add=$_POST['Address'];
      $st=$_POST['state'];
      $ct=$_POST['city'];
      $pc=$_POST['Pincode'];
      $gsn=$_POST['GSTNNo'];
      $mbn=$_POST['Mob_No'];
      $q2="INSERT into supp_mast VALUES('".$str."','".$clid."','".$nm."','".$add."','".$ct."','".$st."',".$pc.",'".$gsn."',".$mbn.")";
      if(!mysqli_query($con,$q2))
      {
        echo("Error description: " . mysqli_error($con));
      }
      else
      {
        echo "<script>alert('Supplier added');</script>";
      }
    }
  }

  include('inclds/footer.php');
?>