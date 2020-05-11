<?php 
	include('inclds/head.php');
	include('inclds/head2.php');
    $q1="SELECT * FROM sales_ret_mast P INNER JOIN cust_mast S ON P.Cust_Id=S.Cust_Id WHERE P.Client_Id='{$clid}'";
    if(!mysqli_query($con,$q1))
    {
        echo("Error description: " . mysqli_error($con));
    }
    else
    {
        $res1=mysqli_query($con,$q1);
    }
    if($_POST)
    {
        $_SESSION['invn']=$_POST['invn'];
        echo "<script>
            function pageRedirect() {
                window.location.replace('invoicesr.php');
            }      
            setTimeout('pageRedirect()', 1);
            </script>";
    }
?>
<div id="main" class="container bg-light rounded bg-white shadow-sm">
    <form class="form-group p-3" method="POST" name="Salesproduct">
		<h4 class="text-primary">Sales Return Invoice Printing</h4>
        <hr class="mb-4">
        <div class="row ml-1">
            <div class="col">
                <select class="custom-select d-block w-100" name="invn" id="invn" required>
                    <?php
                        while($row1=mysqli_fetch_assoc($res1))
                        { 
                    ?>
                    <option value='<?= $row1["Srn_No"]?>'><?= $row1["Srn_No"]?>-<?= $row1["Cust_Name"]?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
            <div class="col">
                <div>
                    <button name="submit" class="subm btn btn-primary" type="Submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
<?php include("inclds/footer.php"); ?>				