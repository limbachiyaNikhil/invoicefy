<?php 
  include('inclds/head.php');
  include('inclds/head2.php');
?>
<head>
  <script>
    function show(sel) {
      var nm = sel.options[sel.selectedIndex].value;  
      $("#mcust").html( "" );
      if (nm.length > 0 )
      { 
        $.ajax({
          type: "POST",
          url: "fetch_supp.php",
          data: "nm="+nm,
          cache: false,
          beforeSend: function () { 
          },
          success: function(html) {    
            $("#msupp").html( html );
          }
        });
      } 
    }
  </script>
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
    <div id="msupp" class="form-group">
      <div>
      <?php
        $q1="SELECT * FROM supp_mast WHERE Client_Id='{$clid}'";
        if(!mysqli_query($con,$q1))
        {
          echo ("Error description: " . mysqli_error($con));
        }
        else
        {
          $res1=mysqli_query($con,$q1);
        }
      ?>
      <label for="name">Supplier name</label>
      <select class="custom-select d-block w-50" name="nm" id="nm" onchange="show(this);" required>
        <option value='#'>Select Supplier</option>
        <?php
          while($row1=mysqli_fetch_assoc($res1))
          { 
        ?>
        <option value='<?= $row1["Supp_Id"]?>'><?= $row1["Supp_Name"]?></option>
        <?php
          }
        ?>
      </select>
    </div><br>
    </div>
  </form>
</div>
<?php
  if($_POST)
  {
    $add=$_POST['Address'];
    $st=$_POST['state'];
    $ct=$_POST['city'];
    $pc=$_POST['Pincode'];
    $gsn=$_POST['GSTNNo'];
    $mbn=$_POST['Mob_No'];
    $q2="UPDATE supp_mast SET Address='".$add."',City='".$ct."',State='".$st."',Pincode=".$pc.",Gstn_No='".$gsn."',Mob_No=".$mbn." WHERE Supp_Id='{$_SESSION["supid"]}'";
    if(!mysqli_query($con,$q2))
    {
      echo("Error description: " . mysqli_error($con));
    }
    else
    {
      echo "<script>alert('Supplier Updated');</script>";
    }
  }
  include('inclds/footer.php');
?>