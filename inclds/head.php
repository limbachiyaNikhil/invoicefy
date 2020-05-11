<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
      <script src="https://kit.fontawesome.com/19dc89b9d8.js" crossorigin="anonymous"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>Invoicefy</title>
      <link rel = "icon" href ="inclds/logo1.png" type="image/png">
    </head>

  <style type="text/css">
        html body{
          width: 100%;
          margin: 0px;
          padding: 0px;
          overflow-x: hidden;
        }
        .navbar-brand{
          font-size: 1.4rem;
          font-weight: bold;
        }

        #main{
          font-size: 1.1rem;
        }
        .fn a{
          font-size: 1.1rem;
        }



    </style>
    
<!-- Script for printing the bills through popup in "Bill Printing"-->
    <script>
      $(document).ready(function(){
       $('#printInvoice').click(function(){
              Popup($('#invoice')[0].outerHTML);
              function Popup(data) 
              {
                  window.print();
                  return true;
              }
          });
      });
    </script>

    <body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top p-2" id="mainNav">
  <div class="container-fluid">
    <img src="inclds/logo1.png" alt="Logo" height="35" width="35">
      <a class="navbar-brand font-weight-bold ml-2" href="#">invoicefy</a>
      <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php#features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php#pricing">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php#contact">Support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.phpAboutGST.php">About GST</a>
          </li>
          <li>
          <?php
            include('connection.php');
            session_start();
            if(!isset($_SESSION['cli']))
            {
              echo "<a class='btn btn-outline-primary' name='alogin' href='login.php'>Log In</a></t>";
              echo "<a class='btn btn-outline-primary ml-3' name='areg' href='AddClient.php'>Sign up</a>";
            }
            else
            {
              $q="SELECT * from client_mast where Client_Id='".$_SESSION['cli']."'";
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
                  $nm=$row[2];
                  echo "<a class='btn btn-outline-primary' name='Name' href='#'>".$nm."</a>";
                  echo "<a class='btn btn-outline-primary ml-3' name='Logout' href='logout.php'>Logout</a>";
                }
              }
            }
          ?>
        </li>
        </ul>
      </div>
    </div>
</nav>