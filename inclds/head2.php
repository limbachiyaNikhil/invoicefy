<?php
	include('inclds/Sessionchk.php');
?>
<style type="text/css">
	.dropdown:hover>.dropdown-menu{
		display: block;
	}
	.nav-link{
		font-size: 1.2rem;
	}
	.dropdown-menu a{
		padding-top: auto;
		padding-bottom: auto;
		font-size: 1.2rem;
	}
</style>



<div class="p-2 mb-3 bg-white shadow-sm">
		<ul class="nav justify-content-center">
	    	<li class="nav-item active list-inline-item">
	        	<a class="nav-link" href="Home.php">Dashboard</a>
	      	</li>
	      	<li class="nav-item dropdown list-inline-item">
	        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Masters</a>
	        	<div id="menu" class="dropdown-menu blockquote text-primary" aria-labelledby="navbarDropdown">
	          		<a class="dropdown-item text-primary" href="AddCategory.php">Category Master</a>
	          		<a class="dropdown-item text-primary" href="AddProduct.php">Product Master</a>
	          		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item text-primary" href="SupplierMaster.php">Supplier Master</a>
	          		<a class="dropdown-item text-primary" href="CustomerMaster.php">Customer Master</a>
	          		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item text-primary" href="BillSeries.php">Bill Series Settings</a>
	        	</div>
	      	</li>
	      	<li class="nav-item list-inline-item dropdown">
	        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transactions</a>
	        	<div class="dropdown-menu blockquote" aria-labelledby="navbarDropdown">
	          		<a class="dropdown-item text-primary" href="AddPurchase.php">Purchase</a>
	          		<a class="dropdown-item text-primary" href="AddPurchaseReturn.php">Purchase Return</a>
	          		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item text-primary" href="AddSales.php">Sales</a>
	          		<a class="dropdown-item text-primary" href="AddSalesReturn.php">Sales Return</a>
	        	</div>
	      	</li>
	      	<li class="nav-item dropdown list-inline-item">
	        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bill Printing</a>
	        	<div class="dropdown-menu blockquote" aria-labelledby="navbarDropdown">
	          		<a class="dropdown-item text-primary" href="PurchaseInv.php">Purchase Invoice</a>
	          		<a class="dropdown-item text-primary" href="PurchaseRetInv.php">Purchase Return Invoice</a>
	          		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item text-primary" href="SalesInv.php">Sales Invoice</a>
	          		<a class="dropdown-item text-primary" href="SalesRetInv.php">Sales Return Invoice</a>
	        	</div>
	      	</li>
	      	<li class="nav-item dropdown list-inline-item">
	        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sales Report</a>
	        	<div class="dropdown-menu blockquote" aria-labelledby="navbarDropdown">
	        		<a class="dropdown-item text-primary" href="ConSalesReport.php">Consolidated Sales Transaction Report</a>
	        		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item text-primary" href="SalesProductwise.php">Productwise Sales</a>
	          		<a class="dropdown-item text-primary" href="SalesDealerwise.php">Dealerwise Sales</a>
	          		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item text-primary" href="SalesRetProductwise.php">Productwise Sales Return</a>
	          		<a class="dropdown-item text-primary" href="SalesRetDealerwise.php">Dealerwise Sales Return</a>	
	        	</div>
	      	</li>
	      	<li class="nav-item dropdown list-inline-item">
	        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Purchase Report</a>
	        	<div class="dropdown-menu blockquote" aria-labelledby="navbarDropdown">
	        		<a class="dropdown-item text-primary" href="ConPurchaseReport.php">Consolidated Purchase Transaction Report</a>
	        		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item text-primary" href="PurchaseProductwise.php">Productwise Purchase</a>
	          		<a class="dropdown-item text-primary" href="PurchaseSupplierwise.php">Supplierwise Purchase</a>
	          		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item text-primary" href="PurchaseRetProductwise.php">Productwise Purchase Return</a>
	          		<a class="dropdown-item text-primary" href="PurchaseRetSupplierwise.php">Supplierwise Purchase Return</a>
	        	</div>
	      	</li>
	      	<li class="nav-item list-inline-item">
	      		<a class="nav-link" href="CurrentStock.php" id="navbarDropdown4" role="button">Current Stock</a>
	      	</li>
	    </ul>
</div>