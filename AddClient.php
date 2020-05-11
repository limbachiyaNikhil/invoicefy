<?php 
  include('inclds/head.php');
 ?>
<head>
<script>
  function validateForm()
  {
    if(document.forms["Registration"]["Name"].value=="")
    {
      alert('Please enter your Name');
      return false;
    }
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Registration.email.value))
    {
      if(/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9]{1}[0-9,A-Z]{2}$/.test(Registration.GSTNNo.value))
      {
        if(/^[789]{1}[0-9]{9}$/.test(Registration.Mob_No1.value))
        {
          var password1 = document.forms["Registration"]["password"].value; 
          var password2 = document.forms["Registration"]["cpassword"].value;
          if(password1 == password2)
          {
            if(/^[1-9]{1}[0-9]{5}$/.test(Registration.Pincode.value))
            {
              return true;
            }
            else
            {
              alert("Pincode Invalid!!");
              return false;              
            }
          }
          else
          {
            alert("Password and Confirm Password Mismatch!!");
            return false;
          }
        }
        else
        {
          alert("You have entered an invalid Mobile Number");
          return false;
        }
      }
      else
      {
        alert("You have entered an invalid GSTN Number !");
        return false;
      }
    }
    else
    {
      alert("You have entered an invalid email address!")
      return false;
    }
  }
</script>
</head>
<div id="main" class="container bg-light mt-3 rounded bg-white shadow-sm">
  <form class="form-group p-3 needs-validation" name="Registration" method="post" onsubmit="return validateForm()">
    <div class="text-center">
      <img src="inclds/logo1.png" class="rounded mt-3" height="72" width="72" alt="Logo">
      <h3 class="text-primary mt-3">Registration</h3>
      <p class="lead">Free, GST Billing & unlimited invoice generation</p>
    </div>
    <hr class="mb-4">
    <div class="mb-2">
      <label for="Name">Name</label>
      <input type="text" class="form-control" name="Name" id="Name" placeholder="Enter your name here" required>
    </div>
    <div class="mt-3">
      <label for="CName">Company Name</label>
      <input type="text" class="form-control" name="CName" id="CName" placeholder="Enter your Company name here" required>
    </div>
    <div class="mt-3">
			<label for="email">Email address</label>
  		<input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
    </div>
 		<div class="mt-3">
      <label for="address">Address</label>
      <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
    </div>
    <div class="row mt-3">
      <div class="col-md-5 mb-3">
        <label for="State">State</label>
     	  <input type="text" class="form-control" name="state" id="state" placeholder="Enter your State here" required>
      </div>
      <div class="col-md-4 mb-3">
        <label for="City">City</label>
       	<input type="text" class="form-control" name="city" id="city" placeholder="Enter your city here" value="" required>
      </div>
      <div class="col-md-3 mb-3">
        <label for="Pincode">Pin Code</label>
        <input type="text" class="form-control" name="Pincode" id="Pincode" placeholder="123456" required>
      </div>
    </div>
    <div class="mt-3">
     	<label for="GSTN_No">GST No.</label>
     	<input type="text" class="form-control" name="GSTNNo" id="GSTNNo" placeholder="Enter your GST No. here" value="" required>
    </div>
    <div class="mt-3">
      <label for="Mob_No1">Mobile Number</label>
     	<input type="text" class="form-control" name="Mob_No1" id="Mob_No1" placeholder="Enter your Mobile Number here" value="" required>
    </div>
    <div class="form-row mt-3">
  		<div class="form-group col-md-6">
				<label for="Password">Password</label>
   			<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
   		</div>
     	<div class="form-group col-md-6">
  			<label for="inputPassword4">Confirm Password</label>
   			<input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
 		  </div>
    </div>
    <hr class="mb-4">
    <h4 class="mb-3">Plan Selection</h4>
    <div class="d-block my-3">
      <div class="form-row">
        <div class="form-group col-md-4">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="freetrial" value="2" name="Subscriptionplan" class="custom-control-input">
            <label class="custom-control-label" for="freetrial">2 Months Free Trial</label>
          </div>
        </div>
        <div class="form-group col-md-4">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="1yrs" value="12" name="Subscriptionplan" class="custom-control-input" disabled="true">
            <label class="custom-control-label" for="1yrs">1 Years @ Rs.11553/- Incl Gst</label>
          </div>
        </div>
        <div class="form-group col-md-4">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="3yrs" value="36" name="Subscriptionplan" class="custom-control-input" disabled="true">
            <label class="custom-control-label" for="3yrs">3 Years @ Rs.28786/- Incl Gst</label>
          </div>
        </div>
      </div>
    </div>
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Continue to checkout</button>
  </form>
  <div class="text-center mb-2">
    <label for="login">Already registerd!  </label>
    <a class="btn btn-outline-primary mb-2" name='login' href='login.php'>Log In</a>
  </div>
</div>
<?php 
  if($_POST)
  {
    include("inclds/connection.php");
    $q1="SELECT * FROM client_mast";
    if(!mysqli_query($con,$q1))
    {
      echo ("Error description: " . mysqli_error($con));
    }
    else
    {
      $res1=mysqli_query($con,$q1);
      $cnt=1;
      $str='A';
      $i=mysqli_num_rows($res1);
      $cnt+=$i;
      if ($cnt > 9)
      {
        $str = "A0".strval($cnt);
      }
      else
      {
        $str = "A00".strval($cnt);
      }
      $nm=$_POST['Name'];
      $cnm=$_POST['CName'];
      $eml=$_POST['email'];
      $add=$_POST['address'];
      $st=$_POST['state'];
      $ct=$_POST['city'];
      $pc=$_POST['Pincode'];
      $gsn=$_POST['GSTNNo'];
      $mb_no=$_POST['Mob_No1'];
      $pass=$_POST['password'];
      $mon=$_POST['Subscriptionplan'];
      $sub='2020-01-05';
      $exp='2020-03-05';
      if($mon==2)
      {
        $sub=date('Y-m-d',time());
        $exp = date('Y-m-d', time() + 86400 * 60);
      }
      elseif($mon==12)
      {
        $sub=date('Y-m-d',time());
        $exp = date('Y-m-d', time() + 86400 * 365);
      }
      elseif($mon==36)
      {
        $sub=date('Y-m-d',time());
        $exp = date('Y-m-d', time() + 86400 * 365 * 3);
      }
      $q="INSERT into client_mast VALUES('".$str."','".$eml."','".$nm."','".$cnm."','".$add."','".$ct."','".$st."',".$pc.",'".$gsn."',".$mb_no.",'".$pass."','".$sub."','".date('Y-m-d', time() + 86400 * 60)."')";
      if(!mysqli_query($con,$q))
      {
        echo("Error description: " . mysqli_error($con));
      }
      else
      {
        echo '<script>alert("Your Registration is Successfully completed!");
              function pageRedirect()
            {
                window.location.replace("login.php");
            }      
            setTimeout("pageRedirect()", 1);
              </script>';
      }
    }
  }
  include('inclds/footer.php');
?>