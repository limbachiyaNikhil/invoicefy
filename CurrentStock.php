<?php 
	include('inclds/head.php');
	include('inclds/head2.php');
    $q1="SELECT * FROM prod_mast P INNER JOIN cat_mast C ON P.Cat_Id=C.Cat_Id WHERE P.Client_Id='{$clid}'";
    if(!mysqli_query($con,$q1))
    {
        echo ("Error description: " . mysqli_error($con));
    }
    else
    {
        $res1=mysqli_query($con,$q1);
        $q2="SELECT * FROM client_mast WHERE Client_Id='{$clid}'";
        if(!mysqli_query($con,$q1))
        {
            echo ("Error description: " . mysqli_error($con));
        }
        else
        {
            $res2=mysqli_query($con,$q2);
            $row2=mysqli_fetch_assoc($res2);
        }
    }
?>
<div id="main" class="container bg-light rounded bg-white shadow-sm mb-2">
    <div class="table-responsive-sm text-center">
        <table id="tblCustomers" class="table table-striped text-center" border="2">
            <thead>
                <tr>
                    <th class="center" colspan="9"><?=$row2['Comp_Name']?></th>
                </tr>
                <tr>
                    <th class="center" colspan="9">Current Stock Report</th>
                </tr>
                <tr>
                    <th class="center">Sr No</th>
                    <th class="right">Product Id</th>
                    <th class="center">Product Name</th>
                    <th class="center">Product Desc</th>
                    <th class="center">Product Rate</th>
                    <th class="center">Current Qty</th>
                    <th class="center">Stock Amount(Base)</th>
                    <th class="center">Gst Rate</th>
                    <th class="center">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sr=1;
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                ?>
                <tr>
                    <td><?= $sr?></td>
                    <td><?= $row1['Pr_Id']?></td>
                    <td><?= $row1['Pr_Name']?></td>
                    <td><?= $row1['Pr_Desc']?></td>
                    <td><?= $row1['Pr_Rate']?></td>
                    <td><?= $row1['Pr_Stk']?></td>
                    <td><?= $row1['Pr_Stk']*$row1['Pr_Rate']?></td>
                    <td><?= $row1['Gst_Rate']?></td>
                    <td><?= $row1['Pr_Stk']*$row1['Pr_Rate']*(1+$row1['Gst_Rate']/100)?></td>
                </tr>
                <?php
                        $sr++;
                    }
                ?>
            </tbody>
        </table>
        <div>
            <input class="subm btn btn-primary mx-sm-3 m-3" type="button" id="btnExport" value="Download Excel" onclick="Export()" />
        </div>
        <script type="text/javascript" src="inclds/jquery.min.js"></script>
        <script src="inclds/table2excel.js" type="text/javascript"></script>
        <script type="text/javascript">
            function Export() {
                $("#tblCustomers").table2excel({
                    filename: "Current Stock.xls"
                });
            }
        </script>
    </div>
</div>
<?php include("inclds/footer.php"); ?>