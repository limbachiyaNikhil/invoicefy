<?php
	include("inclds/head.php");
?>
<div class="container">
	<div class="card text-center rounded shadow-sm mt-5 mb-5">
	  <div class="card-body">
	    <h5 class="card-title">Your plan is expired!</h5>
	    <p class="card-text">Kindly renew your plan and to be continue with our services, check it out...</p>
	    <input type="button" class="btn btn-outline-primary Redirect" onclick="window.location='AddClient.php'" value="Renew your Plan"/>
	    <input type="button" class="ml-3 btn btn-outline-primary Redirect" onclick="window.location='index.php'" value="Go to Home page"/>
	  </div>
	</div>
</div>
<?php
	include("inclds/footer.php");
?>