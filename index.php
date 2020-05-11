<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>invoicefy, A GST Billing website</title>
  <link rel = "icon" href ="inclds/logo1.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <script src="https://kit.fontawesome.com/19dc89b9d8.js" crossorigin="anonymous"></script>
  <script>
  function validateForm()
  {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(supporta.eml.value))
    {
      return true;
    }
    else
    {
      alert("You have entered an invalid email address!");
      return false;
    }
  }
</script>
</head>
<style type="text/css">
  .nav-item a{
    font-size: 1.2rem;
  }
  .navbar-brand a{
    font-size: 1.4rem;
    font-weight: bold;
  }
  section{
    font-size: 1.2rem;
  }
  html body{
    width: 100%;
    margin: 0px;
    padding: 0px;
    overflow-x: hidden;
  }
  header{
    padding: 100px 0;
  }
  section
  {
    padding: 100px 0;
  }
</style>
<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top p-3" id="mainNav">
  <div class="container-fluid">
    <img src="inclds/logo1.png" alt="Logo" height="35" width="35">
      <a class="navbar-brand js-scroll-trigger font-weight-bold ml-2" href="#page-top">invoicefy</a>
      <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#pricing">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="AboutGST.php">About GST</a>
          </li>
          <li>
            <?php
            include('inclds/connection.php');
            session_start();
            if(!isset($_SESSION['cli']))
            {
              echo "<a class='btn btn-outline-primary ml-2' name='alogin' href='login.php'>Log In</a></t>";
              echo "<a class='btn btn-outline-primary ml-2' name='areg' href='AddClient.php'>Sign up</a>";
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
                  echo "<a class='btn btn-outline-primary ml-2' name='Name' href='#'>".$nm."</a>";
                  echo "<a class='btn btn-outline-primary ml-2' name='Logout' href='logout.php'>Logout</a>";
                }
              }
            }
          ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div>
<?php
  if(isset($_SESSION['cli']))
  {
    echo "<br><br><br>";
    include('inclds/head2.php');
  }
?>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/webimage.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/webimage2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/invoicefy.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Welcome to invoicefy!</h1>
      <p class="lead">invoicefy is the website that containes the GST Billing, invoices, Billing support, Stock maintanance etc.
With invoicefy you can able to generate various types of reports that are usefull to you at GST Billing and other financial works.</p>
    </div>
</header>

  <section id="features" class="bg-light">
    <div class="mx-auto container">
          <div class="py-5 text-center container">
            <h3>Features at a Glance</h3>
            <p class="lead">
invoicefy comes with a fully-featured suite of invoicing and GST billing tools for your business. Take the tour to see why you'll love it as much as we do.</p> 
          </div>
        <div class="card-deck">
            <div class="card rounded shadow-sm">
              <img src="images/responsive.svg" class="card-img-top" style="align-self: center; height: 50% ; width:50%;" alt="...">
              <div class="card-body">
                <h5 class="card-title">User friendly & Effective design</h5>
                <p class="card-text">Inovicefy brings you the most iffective and user friendly design with responsive and eye helthy colors. User lkes to interect with the website.</p>
              </div>
            </div>
            <div class="card rounded shadow-sm">
              <img src="images/invoice.svg" class="card-img-top" style="align-self: center; height: 50% ; width:50%;" alt="...">
              <div class="card-body">
                <h5 class="card-title">Effortless Invoicing</h5>
                <p class="card-text">Create professional and elegant looking estimates and invoices in any language or currency in a matter of seconds, and easily deliver them to your clients.</p>
              </div>
            </div>
            <div class="card rounded shadow-sm">
              <img src="images/seo.svg" class="card-img-top" style="align-self: center; height: 50% ; width:50%;" alt="...">
              <div class="card-body">
                <h5 class="card-title">Your Inventory In One Place</h5>
                <p class="card-text">Stay on track with your inventory with dynamically generated reports, monthly and yearly statements, income and expenditure summaries and accounts receivable and payable.</p>
              </div>
            </div>
          </div>
        </div>
  </section>

  <section id="pricing">
    <div class="container">
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h3>Packages</h3>
        <p class="lead">invoicefy is the free websites for the customers, dealers, resellers and manymore who are found of to start their own business, invoicefy provides the free invoicing and GST Billing for those users.</p>
      </div>
      <div class="card-deck  mb-3 text-center">
    <div class="card border-primary mb-4 shadow-sm">
      <div class="card-header ">
        <h4 class="my-0 font-weight-normal">Free</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">2 Months Free Trial</h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Email support</li>
          <li>Help center access</li>
        </ul>
        <input type="button" class="btn btn-lg btn-block btn-outline-primary Redirect" onclick="window.location='AddClient.php'" value="Sign up for free"/>
      </div>
    </div>
    <div class="card mb-4 border-primary shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Pro</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">₹11553 <small class="text-muted">/ year</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <input type="button" class="btn btn-lg btn-block btn-primary" onclick="window.location='AddClient.php'" value="Get started"/>
      </div>
    </div>
    <div class="card mb-4 border-primary shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Enterprise</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">₹28786 <small class="text-muted">/ 3 Years</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Phone and email support</li>
          <li>Help center access</li>
        </ul>
        <input type="button" class="btn btn-lg btn-block btn-primary" onclick="window.location='AddClient.php'" value="Sign Up" />
      </div>
    </div>
    </div>
  </section>

  <section id="about" class="bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-white text-center">
            <h3>About Developers</h3>
          </div>
          <div class="row">
            <div class="col text-center text-white">
              <img src="images/nikhil.jpeg" class="card-img rounded-circle" style="height: 250px; width: 250px" alt="Nikhil Limbachiya">
              <h4 class="font-weight-bold">Mr. Nikhil Limbachiya</h4>
              <p class="card-text">Website Designer<br>Instagram : @mr.younick</p>
            </div>
            <div class="col text-center text-white">
              <img src="images/burhan.jpg" class="card-img rounded-circle" style="height: 250px; width: 250px" alt="Nikhil Limbachiya">
              <h4 class="font-weight-bold">Mr. Burhanuddin Lokhandwala</h4>
              <p class="card-text">Website Planner & Programmer<br>Instagram : @burhanuddinlokhandwala</p>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="bg-light">
    <form class="form-group needs-validation" name="supporta"  method="POST" onsubmit="return validateForm()">
    <div class="container">
    <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="block-heading-1">
              <span>Get In Touch</span>
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-5">
            <form action="#" method="post">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" name="nm" placeholder="Name" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" name="eml" placeholder="Email address" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea id="dsc" class="form-control" name="dsc" placeholder="Write your message." cols="30" rows="10" required></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 ml-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-4 ml-auto">
            <h2 class="text-black">For more information, call us on!<br>+91 7567228092</h2>
          </div>
        </div>
      </div>
    </form>
  </section>
  <?php
    if($_POST)
    {
      include("inclds/connection.php");
      $nm=$_POST['nm'];
      $eml=$_POST['eml'];
      $dsc=$_POST['dsc'];
      $q1="SELECT * FROM support";
      if(!mysqli_query($con,$q1))
      {
        echo ("Error description: " . mysqli_error($con));
      }
      else
      {
      $res1=mysqli_query($con,$q1);
      $cnt=1;
      $i=mysqli_num_rows($res1);
      $cnt+=$i;
      if ($cnt > 9)
      {
        $str = $str."S0".strval($cnt);
      }
      else
      {
        $str = $str."S00".strval($cnt);
      }
      $q2="INSERT into support VALUES('".$str."','".$nm."','".$eml."','".$dsc."')";
      if(!mysqli_query($con,$q2))
      {
        echo("Error description: " . mysqli_error($con));
      }
      else
      {
        echo "<script> alert('Question will be answered in few days on your E-mail Id') </script>";
      }
    }
  }
  ?>

  <!-- Footer -->
 <div class="bottom">
<style type="text/css">
  .text-muted{
    font-size: larger;
  }
</style>
<footer class="footer mt-auto py-4 bg-dark">
  <div class="container text-center">
    <span class="text-muted">Made with&nbsp;<span style="font-size: 1rem"><i class="fas fa-heart"></i></span>&nbsp;&&nbsp;<span style="font-size: 1rem"><i class="fas fa-coffee"></i></span>&nbsp;by Burhanuddin & Nikhil.</span><br>
    <span class="text-center text-muted"><span style="font-size: 1rem"><i class="fas fa-copyright"></i></span>&nbsp;invoicefy 2019-20</span>
  </div>
</footer>
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="bootstrap/js/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="bootstrap/js/scrolling-nav.js"></script>
  
</body>

</html>
