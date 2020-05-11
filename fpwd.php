<?php include('inclds/head.php'); ?>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  	<script type="text/javascript" href="bootstrap/js/bootstrap.js"></script>
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Forgot Password</title>
</head>
<?php

  
// Function to generate OTP 
function generateNumericOTP($n) { 
      
    // Take a generator string which consist of 
    // all numeric digits 
    $generator = "1357902468"; 
  
    // Iterate for n-times and pick a single character 
    // from generator and append it to $result 
      
    // Login for generating a random character from generator 
    //     ---generate a random number 
    //     ---take modulus of same with length of generator (say i) 
    //     ---append the character at place (i) from generator to result 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
} 

  ?>

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
    <h1 class="h3 mb-3 font-weight-normal">Please enter your E-mail Id</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <form class="form-signin" method="POST">
        <input type="email" name="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required autofocus>

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
	include('inclds/connection.php');
	$eml=$_POST['email'];
	$q="SELECT * FROM client_mast where C_Mail_Id='".$eml."'";
	if(!mysqli_query($con,$q))
    {
      echo("Error description: " . mysqli_error($con));
    }
    else
    {
      $res=mysqli_query($con,$q);
      $row=mysqli_fetch_assoc($res);
      if(is_array($row) && count($row)>0)
      {
        $mob=$row['C_Mob_No'];
        $otp=generateNumericOTP(5);
                $field = array(
            "sender_id" => "FSTSMS",
            "language" => "english",
            "route" => "qt",
            "numbers" => $mob,
            "message" => "25060",
            "variables" => "{#AA#}",
            "variables_values" => $otp
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($field),
          CURLOPT_HTTPHEADER => array(
            "authorization: N9hE4QTdSvWFXomIsZbl8kK1gA3ye2Ra56pDVwU07tcLjCnzfYZ4yXCSloV8PMa25Y6iugv7TdfOhncD",
            "cache-control: no-cache",
            "accept: */*",
            "content-type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
      	$_SESSION['feml']=$eml;
        $_SESSION['fotp']=$otp;
      	echo "<script>
            alert('Otp Sent to your mobile No.');
            function pageRedirect() {
                window.location.replace('fpwda.php');
            }      
            setTimeout('pageRedirect()', 1);
            </script>";
      }
    }
}

include('inclds/footer.php') ?>	
