<?php include('inclds/head.php'); ?>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  	<script type="text/javascript" href="bootstrap/js/bootstrap.js"></script>
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Forgot Password</title>
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
    <h1 class="h3 mb-3 font-weight-normal">Please enter One Time Password</h1>
    <label for="inputEmail" class="sr-only">OTP</label>
    <form class="form-signin" method="POST">
        <input type="text" name="email" id="inputEmail" class="form-control form-control-lg" placeholder="OTP" required autofocus>
        <button class="btn btn-primary btn-lg btn-block mt-3" type="submit" name="usubmit" value="usubmit">Submit</button>
    </form>
  </div>
</div>
</div>
</body>

<?php 
#for password validation
if(isset($_POST['usubmit']))
{
	$otp=$_POST['email'];
  if($otp==$_SESSION['fotp'])
  {
      	echo "<script>
            alert('Otp matched!');
            function pageRedirect() {
                window.location.replace('fpwdb.php');
            }      
            setTimeout('pageRedirect()', 1);
            </script>";
  }
}

include('inclds/footer.php') ?>	
