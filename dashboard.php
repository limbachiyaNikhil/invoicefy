<?php include('inclds/head.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Dashboard<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Masters
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="AddCategory.php">Category Master</a>
          <a class="dropdown-item" href="AddProduct.php">Product Master</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Supplier Master</a>
          <a class="dropdown-item" href="#">Customer Master</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Transactions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Purchase</a>
          <a class="dropdown-item" href="#">Purchase Return</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Sales</a>
          <a class="dropdown-item" href="#">Sales Return</a>
        </div>
      </li>
    </ul>
  </div>
</nav>