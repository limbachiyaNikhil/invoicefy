<?php include('inclds/head.php'); ?>
	<script>
		function login_val()
		{
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Login.email.value))
    		{
    			return true;
    		}
    		else
    		{
    			alert("Please enter valid E-Mail address!");
    			return false;
    		}
		}
	</script>
<style type="text/css">
  label{
    font-size: 1.2rem;
  }
html,body {
  height: 100%;
  background-color: #f5f5f5;
}
.fm {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  
}
.gm {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

</style>
<body class="text-center">
<div class="fm">
<div class="gm mx-auto my-auto text-center" style="max-width: 20rem;">
    <img src="inclds/logo1.png" class="rounded mt-3" height="72" width="72" alt="Logo">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <form class="form-signin" method="POST" onsubmit="return login_val()">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="mt-2 form-control form-control-lg" placeholder="Password" required>
        <hr class="mb-4">
      <button class="btn btn-primary btn-lg btn-block mt-3" type="submit" name="usubmit" value="usubmit">Sign in</button>
    </form>
        <form method="POST">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-block btn-lg mt-2" data-toggle="modal" data-target="#exampleModal">Admin Log-In</button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Admin Log-In</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <label for="aemail">User Id</label>
                <input class="form-control w-70" name="aemail" id="aemail" placeholder="Enter email">
                <label for="apass">Password</label>
                <input type="password" class="form-control w-70" name="apass" id="apass" placeholder="Password">
            </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" name="asubmit" value="Log-In">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-3 mb-4">
        <a href="../invoicefy/fpwd.php">Forgot Password!</a>
      </div>
      </form>
</div>
</div>
</body>

<?php 
#for password validation
if(isset($_POST['usubmit']))
{
	include('inclds/connection.php');
	$eml=$_POST['email'];
	$pass=$_POST['password'];
	$q="SELECT * FROM client_mast where C_Mail_Id='".$eml."' and C_Password='".$pass."'";
	if(!mysqli_query($con,$q))
    {
      echo("Error description: " . mysqli_error($con));
    }
    else
    {
      $res=mysqli_query($con,$q);
      $row=mysqli_fetch_row($res);
      if(is_array($row) && count($row)>0)
      {
      	echo "Login Successfull !!";
      	$_SESSION['cli']=$row[0];
      	echo "<script>
            function pageRedirect() {
                window.location.replace('Home.php');
            }      
            setTimeout('pageRedirect()', 1);
            </script>";
      }
    }
}
elseif (isset($_POST['asubmit'])) 
{
  include('inclds/connection.php');
  $uid=$_POST['aemail'];
  $pass=$_POST['apass'];
  $q1="SELECT * FROM admistrator where User_Id='".$uid."' and Password='".$pass."'";
  if(!mysqli_query($con,$q1))
  {
    echo("Error description: " . mysqli_error($con));
  }
  else
  {
    $res1=mysqli_query($con,$q1);
    $row1=mysqli_fetch_row($res1);
    if(is_array($row1) && count($row1)>0)
    {
      echo "Login Successfull !!";
      $_SESSION['adm']=$row1[0];
      echo "<script>
            function pageRedirect() {
                window.location.replace('admin/index.php');
            }      
            setTimeout('pageRedirect()', 1);
            </script>";
    }
  }
}
include('inclds/footer.php') ?>	
