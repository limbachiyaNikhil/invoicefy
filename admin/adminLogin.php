<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
   	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>invoicefy</title>
</head>
<body>
<div class="container border">
<form method="POST">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Admin Log-In
</button>

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
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control w-70" id="exampleInputEmail1" placeholder="Enter email">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control w-70" id="exampleInputPassword1" placeholder="Password">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Log-In</button>
      </div>
    </div>
  </div>
</div>

</form>
</div>
</body>
</html>