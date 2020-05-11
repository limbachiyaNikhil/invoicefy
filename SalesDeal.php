<?php 
	include('inclds/head.php');
	include('inclds/head2.php');
    $fdt=$_SESSION['fdt'];
    $tdt=$_SESSION['tdt'];
    $q1="SELECT S.Cust_Id,Cust_Name,Address,City,State,Pincode,Gstn_No,Mob_No,sum(Final_Amt) as SalesT FROM sales_mast P INNER JOIN cust_mast S ON S.Cust_Id=P.Cust_Id WHERE S.Client_id='{$clid}' AND Inv_date>='{$fdt}' AND Inv_date<='{$tdt}' GROUP BY S.Cust_Id ORDER BY S.Cust_Id";
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
<div id="main" class="container mb-2 rounded bg-white shadow-sm">
    <div class="table-responsive-sm text-center">
        <table  id="tblCustomers"class="table table-striped text-center" border="2">
            <thead>
                <tr>
                    <th class="center" colspan="10"><?=$row2['Comp_Name']?></th>
                </tr>
                <tr>
                    <th class="center" colspan="10">Dealer Sales Report</th>
                </tr>
                <tr>
                    <th class="center" colspan="10">From : <?= $fdt?>  To : <?=$tdt?></th>
                </tr>
                <tr>
                    <th class="center">Sr No</th>
                    <th class="right">Dealer Id</th>
                    <th class="center">Dealer Name</th>
                    <th class="center">Address</th>
                    <th class="center">City</th>
                    <th class="center">State</th>
                    <th class="center">Pincode</th>
                    <th class="center">Gstn_No</th>
                    <th class="center">Mob_No</th>
                    <th class="center">Total Sales Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sr=1;
                    $tot=0;
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                ?>
                <tr>
                    <td><?= $sr?></td>
                    <td><?= $row1['Cust_Id']?></td>
                    <td><?= $row1['Cust_Name']?></td>
                    <td><?= $row1['Address']?></td>
                    <td><?= $row1['City']?></td>
                    <td><?= $row1['State']?></td>
                    <td><?= $row1['Pincode']?></td>
                    <td><?= $row1['Gstn_No']?></td>
                    <td><?= $row1['Mob_No']?></td>
                    <td><?= $row1['SalesT']?></td>
                </tr>
                <?php
                        $sr++;
                        $tot+=$row1['SalesT'];
                    }
                ?>
                <tr>
                    <th class="center"></th>
                    <th class="right"></th>
                    <th class="center">Total</th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"><?= $tot?></th>
                </tr>
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
                    filename: "Dealerwise Sales.xls"
                });
            }
        </script>
    </div>
</div>
<?php include("inclds/footer.php"); ?>