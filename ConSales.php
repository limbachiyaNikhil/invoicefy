<?php 
	include('inclds/head.php');
	include('inclds/head2.php');
    $fdt=$_SESSION['fdt'];
    $tdt=$_SESSION['tdt'];
    $q1="SELECT * FROM sales_det S INNER JOIN prod_mast P ON S.Pr_Id=P.Pr_id WHERE Inv_No IN (SELECT Inv_No FROM sales_mast WHERE Client_Id='{$clid}' AND Inv_date>='{$fdt}' AND Inv_date<='{$tdt}')";
    $q3="SELECT * FROM sales_ret_det S INNER JOIN prod_mast P ON S.Pr_Id=P.Pr_id WHERE Srn_No IN (SELECT Srn_No FROM sales_ret_mast WHERE Client_Id='{$clid}' AND Srn_Date>='{$fdt}' AND Srn_Date<='{$tdt}')";
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
            if(!mysqli_query($con,$q3))
            {
                echo ("Error description: " . mysqli_error($con));
            }
            else
            {
                $res3=mysqli_query($con,$q3);
            }
        }
    }
?>
<style type="text/css">
    table{
 width:100px;
 max-width:100px;
 overflow-x:scroll;
 font-size: large;
}
</style>
<div class="bg-light">
    <div class="text-center container-fluid">
        <div class="table-responsive">
        <table width="100%" id="tblCustomers" class="table table-striped text-center mt-1" border="2">
            <thead>
                <tr>
                    <th class="center" colspan="20"><?=$row2['Comp_Name']?></th>
                </tr>
                <tr>
                    <th class="center" colspan="20">Sale Transaction Report</th>
                </tr>
                <tr>
                    <th class="center" colspan="20">From : <?= $fdt?>  To : <?=$tdt?></th>
                </tr>
                <tr>
                    <th class="center">Sr No</th>
                    <th class="right">Invoice No</th>
                    <th class="right">Dealer Id</th>
                    <th class="center">Dealer Name</th>
                    <th class="center">Address</th>
                    <th class="center">City</th>
                    <th class="center">State</th>
                    <th class="center">Pincode</th>
                    <th class="center">Gstn No</th>
                    <th class="center">Mobile No</th>
                    <th class="right">Product Id</th>
                    <th class="center">Product Name</th>
                    <th class="center">Product Description</th>
                    <th class="center">Product Rate</th>
                    <th class="center">Sales Quantity</th>
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
                    $tdisc=0;
                    $tamt=0;
                    $tgamt=0;
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                        $q4="SELECT * FROM cust_mast WHERE Cust_Id=(SELECT Cust_Id FROM sales_mast WHERE Inv_No='{$row1['Inv_No']}')";
                        if(!mysqli_query($con,$q4))
                        {
                            echo ("Error description: " . mysqli_error($con));
                        }
                        else
                        {
                            $res4=mysqli_query($con,$q4);
                            $row4=mysqli_fetch_assoc($res4);
                        }
                ?>
                <tr>
                    <td><?= $sr?></td>
                    <td><?= $row1['Inv_No']?></td>
                    <td><?= $row4['Cust_Id']?></td>
                    <td><?= $row4['Cust_Name']?></td>
                    <td><?= $row4['Address']?></td>
                    <td><?= $row4['City']?></td>
                    <td><?= $row4['State']?></td>
                    <td><?= $row4['Pincode']?></td>
                    <td><?= $row4['Gstn_No']?></td>
                    <td><?= $row4['Mob_No']?></td>
                    <td><?= $row1['Pr_Id']?></td>
                    <td><?= $row1['Pr_Name']?></td>
                    <td><?= $row1['Pr_Desc']?></td>
                    <td><?= $row1['Pr_Rate']?></td>
                    <td><?= $row1['Pr_Qty']?></td>
                    <td><?= $row1['Amt']?></td>
                    <td><?= $row1['Disc']?></td>
                    <td><?= $row1['Gst_Rate']?></td>
                    <td><?= ($row1['Total_Amt']/(1+$row1['Gst_Rate']/100))*$row1['Gst_Rate']/100?></td>
                    <td><?= $row1['Total_Amt']?></td>
                </tr>
                <?php
                        $sr++;
                        $tqty+=$row1['Pr_Qty'];
                        $tbamt+=$row1['Amt'];
                        $tdisc+=$row1['Disc'];
                        $tgamt+=($row1['Total_Amt']/(1+$row1['Gst_Rate']/100))*$row1['Gst_Rate']/100;
                        $tamt+=$row1['Total_Amt'];
                    }
                ?>
                <?php
                    while($row3=mysqli_fetch_assoc($res3))
                    {
                        $q5="SELECT * FROM cust_mast WHERE Cust_Id=(SELECT Cust_Id FROM sales_ret_mast WHERE Srn_No='{$row3['Srn_No']}')";
                        if(!mysqli_query($con,$q5))
                        {
                            echo ("Error description: " . mysqli_error($con));
                        }
                        else
                        {
                            $res5=mysqli_query($con,$q5);
                            $row5=mysqli_fetch_assoc($res5);
                        }
                ?>
                <tr>
                    <td><?= $sr?></td>
                    <td><?= $row3['Srn_No']?></td>
                    <td><?= $row5['Cust_Id']?></td>
                    <td><?= $row5['Cust_Name']?></td>
                    <td><?= $row5['Address']?></td>
                    <td><?= $row5['City']?></td>
                    <td><?= $row5['State']?></td>
                    <td><?= $row5['Pincode']?></td>
                    <td><?= $row5['Gstn_No']?></td>
                    <td><?= $row5['Mob_No']?></td>
                    <td><?= $row3['Pr_Id']?></td>
                    <td><?= $row3['Pr_Name']?></td>
                    <td><?= $row3['Pr_Desc']?></td>
                    <td>-<?= $row3['Pr_Rate']?></td>
                    <td>-<?= $row3['Pr_Qty']?></td>
                    <td>-<?= $row3['Amt']?></td>
                    <td>-<?= $row3['Disc']?></td>
                    <td><?= $row3['Gst_Rate']?></td>
                    <td>-<?= ($row3['Total_Amt']/(1+$row3['Gst_Rate']/100))*$row3['Gst_Rate']/100?></td>
                    <td>-<?= $row3['Total_Amt']?></td>
                </tr>
                <?php
                        $sr++;
                        $tqty-=$row3['Pr_Qty'];
                        $tbamt-=$row3['Amt'];
                        $tdisc-=$row3['Disc'];
                        $tgamt-=($row3['Total_Amt']/(1+$row3['Gst_Rate']/100))*$row3['Gst_Rate']/100;
                        $tamt-=$row3['Total_Amt'];
                    }
                ?>
                <th class="center"></th>
                    <th class="right"></th>
                    <th class="right"></th>
                    <th class="center">Total</th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="right"></th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"></th>
                    <th class="center"><?=$tqty?></th>
                    <th class="center"><?=$tbamt?></th>
                    <th class="center"><?=$tdisc?></th>
                    <th class="center"></th>
                    <th class="center"><?=$tgamt?></th>
                    <th class="center"><?=$tamt?></th>
            </tbody>
        </table>
        </div>
        <div>
            <input class="subm btn btn-primary mx-sm-3 m-3" type="button" id="btnExport" value="Download Excel" onclick="Export()" />
        </div>
        
        <script type="text/javascript" src="inclds/jquery.min.js"></script>
        <script src="inclds/table2excel.js" type="text/javascript"></script>
        <script type="text/javascript">
            function Export() {
                $("#tblCustomers").table2excel({
                    filename: "Consolidated Sales Transaction.xls"
                });
            }
        </script>
    </div>
</div>
<?php include("inclds/footer.php"); ?>
