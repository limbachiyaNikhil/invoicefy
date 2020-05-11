<?php 
	include('inclds/head.php');
	include('inclds/head2.php');
    if($_POST)
    {
        $_SESSION['fdt']=$_POST['FDt'];
        $_SESSION['tdt']=$_POST['TDt'];
        echo "<script>
            function pageRedirect() {
                window.location.replace('ConSales.php');
            }      
            setTimeout('pageRedirect()', 1);
            </script>";
    }
?>
<div id="main" class="container bg-light rounded bg-white shadow-sm">
    <form class="form-group p-3" method="POST" name="Salesproduct">
		<h4 class="text-primary">Sales Transaction Report</h4>
        <hr class="mb-4">
        <div class="row ml-1">
            <div class="col">
                <div class="form-group">
                    <label class="form">From Date</label>
                    <input type="Date" name="FDt" class="ml-1 form-control" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="form">To Date</label>
                    <input type="Date" name="TDt" class="ml-1 form-control" required>
                </div>
            </div>
            <div class="col">
                <div class="mt-4">
                    <button name="submit" class="subm btn btn-primary" type="Submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
<?php include('inclds/footer.php');?>
				