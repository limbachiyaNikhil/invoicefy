<?php 
    include('inclds/head.php');
    include('inclds/head2.php');
    $q1="SELECT * FROM client_mast WHERE Client_Id='{$clid}'";
    if(!mysqli_query($con,$q1))
    {
        echo ("Error description: " . mysqli_error($con));
    }
    else
    {
        $res1=mysqli_query($con,$q1);
        $row1=mysqli_fetch_assoc($res1);
        $q2="SELECT * FROM sales_mast S INNER JOIN cust_mast C ON S.Cust_Id=C.Cust_Id WHERE S.Inv_No='{$_SESSION['invn']}'";
        if(!mysqli_query($con,$q2))
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
<div id="invoice" class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div id="main" class="card">
        <div class="card-header p-4">
            <a class="pt-2 h3 font-weight-bold" data-abc="true">TAX INVOICE</a>
            <div class="float-right">
                <h3 class="mb-0">Invoice no. <?= $_SESSION['invn']?></h3>
                Date: <?= $row2['Inv_Date']?>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h5 class="mb-3">From:</h5>
                    <h3 class="text-dark mb-1"><?= $row1['Comp_Name']?></h3>
                    <div><?= $row1['C_Address']?></div>
                    <div><?= $row1['C_City']?>,<?= $row1['C_State']?>,<?= $row1['C_Pincode']?></div>
                    <div>Email: <?= $row1['C_Mail_Id']?></div>
                    <div>Phone: <?= $row1['C_Mob_No']?></div>
                    <h5 class="text-dark mb-1">Gstn No: <?= $row1['C_Gstn_No']?></h5>
                </div>
                <div class="col-sm-6 ">
                    <h5 class="mb-3">To:</h5>
                    <h3 class="text-dark mb-1"><?= $row2['Cust_Name']?></h3>
                    <div><?= $row2['Address']?></div>
                    <div><?= $row2['City']?>,<?= $row2['State']?>,<?= $row2['Pincode']?></div>
                    <div>Phone: <?= $row2['Mob_No']?></div>
                    <h5 class="text-dark mb-1">Gstn No: <?= $row2['Gstn_No']?></h5>
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped" border="2">
                    <thead>
                        <tr>
                            <th class="center">Sr</th>
                            <th class="right">Product</th>
                            <th class="center">Qty</th>
                            <th class="center">Unit Price</th>
                            <th class="center">Total Amt</th>
                            <th class="center">Disc</th>
                            <th class="center">Taxable</th>
                            <th class="center" colspan="2">CGST</th>
                            <th class="center" colspan="2">SGST</th>
                            <th class="center">Total</th>
                        </tr>
                        <tr>
                            <th class="center"></th>
                            <th class="right"></th>
                            <th class="center"></th>
                            <th class="center"></th>
                            <th class="center">Base</th>
                            <th class="center"></th>
                            <th class="center">Amount</th>
                            <th class="center">%</th>
                            <th class="center">Amt</th>
                            <th class="center">%</th>
                            <th class="center">Amt</th>
                            <th class="center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $q3="SELECT * FROM sales_det S INNER JOIN prod_mast P ON S.Pr_Id=P.Pr_Id WHERE S.Inv_No='{$_SESSION['invn']}'";
                            if(!mysqli_query($con,$q3))
                            {
                                echo ("Error description: " . mysqli_error($con));
                            }
                            else
                            {
                                $sr=1;
                                $gst=0;
                                $res3=mysqli_query($con,$q3);
                                while($row3=mysqli_fetch_assoc($res3))
                                {
                        ?>
                        <tr>
                            <td class="center"><?= $sr?></td>
                            <td class="left"><?= $row3['Pr_Name']?></td>
                            <td class="left"><?= $row3['Pr_Qty']?></td>
                            <td class="right"><?= $row3['Amt']/$row3['Pr_Qty']?></td>
                            <td class="center"><?= $row3['Amt']?></td>
                            <td class="right"><?= $row3['Disc']?></td>
                            <td class="right"><?= $row3['Amt']-$row3['Disc']?></td>
                            <td class="right"><?= $row3['Gst_Rate']/2?></td>
                            <td class="right"><?= ($row3['Amt']-$row3['Disc'])*$row3['Gst_Rate']/200?></td>
                            <td class="right"><?= $row3['Gst_Rate']/2?></td>
                            <td class="right"><?= ($row3['Amt']-$row3['Disc'])*$row3['Gst_Rate']/200?></td>
                            <td class="right"><?= $row3['Total_Amt']?></td>
                        </tr>
                        <?php
                                    $sr++;
                                    $gst+=($row3['Amt']-$row3['Disc'])*$row3['Gst_Rate']/200;
                                }
                            }
                        ?>
                        <tr>
                            <?php
                                $q4="SELECT sum(Pr_Qty),sum(Amt-Disc),sum(Total_Amt) FROM sales_det WHERE Inv_No='{$_SESSION['invn']}'";
                                $res4=mysqli_query($con,$q4);
                                $row4=mysqli_fetch_array($res4);
                            ?>
                            <td class="center"></td>
                            <td class="left">Grand Total</td>
                            <td class="left"><?= $row4[0]?></td>
                            <td class="right"></td>
                            <td class="center"></td>
                            <td class="right"></td>
                            <td class="right"><?= $row4[1]?></td>
                            <td class="right"></td>
                            <td class="right"><?=$gst?></td>
                            <td class="right"></td>
                            <td class="right"><?=$gst?></td>
                            <td class="right"><?= $row4[2]?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Total</strong> </td>
                                <td class="right">
                                    <strong class="text-dark"><?=$row4[2]?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <hr class="mb-4">
        <div class="col">
                <div class="row">
                    <p class="text-left">Unless otherwise started, tax on the invoice is not payable under reverse charge.<br>Supplies under Reverse Charge to be mentioned seperately.</p><br>
                    <p class="text-left">
                        <b>Terms & Conditions:</b>
                        Goods recieved in good condition as per order.
                    </p>
                </div>
                <br>
                <br>
                    <p class="text-right font-italic">Signature of supplier/authorised representative</p><br>
            </div>
        <hr class="mb-4">
        <div>
        <button id="printInvoice" class="btn btn-primary" type="Submit" name="printInvoice">Print</button>
        </div>
        </div>
        <div class="card-footer bg-white">
            <p class="mb-0">Generated with <b>invoicefy</b>, A GST Billing website.</p>
        </div>
    </div>
</div>
<?php
    include('inclds/footer.php');
?>