<?php 
	include('inclds/head.php');
	include('inclds/head2.php');
    $fdt=$_SESSION['fdt'];
    $tdt=$_SESSION['tdt'];
    $q1="SELECT P.Pr_Id,Pr_Name,Pr_Desc,Pr_Rate,sum(Pr_Qty) as SalesQ,sum(Amt) as SalesA,sum(Disc) as SalesD,Gst_Rate,sum(Total_Amt) as SalesT FROM sales_det S INNER JOIN prod_mast P ON S.Pr_Id=P.Pr_id WHERE Inv_No IN (SELECT Inv_No FROM sales_mast WHERE Client_Id='{$clid}' AND Inv_date>='{$fdt}' AND Inv_date<='{$tdt}') GROUP BY P.Pr_Id ORDER BY P.Pr_Id";
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
                    <th class="center" colspan="11"><?=$row2['Comp_Name']?></th>
                </tr>
                <tr>
                    <th class="center" colspan="11">ProductWise Sales Report</th>
                </tr>
                <tr>
                    <th class="center" colspan="11">From : <?= $fdt?>  To : <?=$tdt?></th>
                </tr>
                <tr>
                    <th class="center">Sr No</th>
                    <th class="right">Product Id</th>
                    <th class="center">Product Name</th>
                    <th class="center">Product Desc</th>
                    <th class="center">Product Rate</th>
                    <th class="center">Sales Qty</th>
                    <th class="center">Sales Amount(Base)</th>
                    <th class="center">Discount</th>
                    <th class="center">Gst Rate</th>
                    <th class="center">Gst Amount</th>
                    <th class="center">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sr=1;
                    $tqty=0;
                    $tbamt=0;
                    $tdis=0;
                    $tamt=0;
                    $tgamt=0;
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                ?>
                <tr>
                    <td><?= $sr?></td>
                    <td><?= $row1['Pr_Id']?></td>
                    <td><?= $row1['Pr_Name']?></td>
                    <td><?= $row1['Pr_Desc']?></td>
                    <td><?= $row1['Pr_Rate']?></td>
                    <td><?= $row1['SalesQ']?></td>
                    <td><?= $row1['SalesA']?></td>
                    <td><?= $row1['SalesD']?></td>
                    <td><?= $row1['Gst_Rate']?></td>
                    <td><?= ($row1['SalesT']/(1+$row1['Gst_Rate']/100))*$row1['Gst_Rate']/100?></td>
                    <td><?= $row1['SalesT']?></td>
                </tr>
                <?php
                        $sr++;
                        $tqty+=$row1['SalesQ'];
                        $tbamt+=$row1['SalesA'];
                        $tdis+=$row1['SalesD'];
                        $tgamt+=($row1['SalesT']/(1+$row1['Gst_Rate']/100))*$row1['Gst_Rate']/100;
                        $tamt+=$row1['SalesT'];
                    }
                ?>
                <tr>
                    <th class="center"></th>
                    <th class="right"></th>
                    <th class="center">Total</th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"><?=$tqty?></th>
                    <th class="center"><?=$tbamt?></th>
                    <th class="center"><?=$tdis?></th>
                    <th class="center"> </th>
                    <th class="center"><?=$tgamt?></th>
                    <th class="center"><?=$tamt?></th>
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
                    filename: "Productwise Sales.xls"
                });
            }
        </script>
    </div>
</div>
<?php include("inclds/footer.php"); ?>