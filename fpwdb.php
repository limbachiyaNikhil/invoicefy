<?php include('inclds/head.php'); ?>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  	<script type="text/javascript" href="bootstrap/js/bootstrap.js"></script>
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Forgot Password</title>
  <script>
  function validateForm()
  {
    var password1 = document.forms["Registration"]["password"].value; 
    var password2 = document.forms["Registration"]["cpassword"].value;
    if(password1 == password2)
    {
      return true;
    }
    else
    {
      alert("Password and Confirm Password Mismatch!!");
      return false;
    }
  }
</script>
</head>
<style type="text/css">
  .center{
    text-align: center;
  }
  .card{
    display: inline-block;
  }
</style>

<body class="text-center">
  <div class="center mb-5 mt-5">
    <div class="card" style="width: 25rem;">
      <img src="inclds/logo1.png" class="rounded mt-3" height="72" width="72" alt="Logo">
      <div class="card-body">
	     <form class="form-signin" method="POST" onsubmit="return validateForm()">
          <h1 class="h3 mb-3 font-weight-normal">Please Enter New Password</h1>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="mt-2 form-control form-control-lg" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Confirm Password</label>
        <input type="password" name="cpassword" id="inputPassword" class="mt-2 form-control form-control-lg" placeholder="Confirm Password" required>
        
        <hr class="mb-4">

        <button class="btn btn-primary btn-block btn-lg" type="submit" name="usubmit" value="usubmit">Submit</button>
       </form>
      </div>
    </div>
  </div>
</body>

<?php 
#for password validation
if(isset($_POST['usubmit']))
{
  include("inclds/connection.php");
	$pwd=$_POST['password'];
  $eml=$_SESSION['feml'];
  $q1="UPDATE client_mast SET C_Password='{$pwd}' where C_Mail_Id='{$eml}'";
  if(!mysqli_query($con,$q1))
  {
    echo("Error description: " . mysqli_error($con));
  }
  else
  {  	echo "<script>
            alert('Password Changed!');
            function pageRedirect() {
                window.location.replace('login.php');
            }      
            setTimeout('pageRedirect()', 1);
            </script>";
  }
}

include('inclds/footer.php') ?>	
