<script type="text/javascript" src="../includes/JsBarcode.all.min.js"></script>
<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Payments (Year)

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> View Payments (Year)

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form method="post" action="export_annual_payments.php"><input type="submit" class="btn btn-primary" name="export_annual_payments" value="Export CSV" /></form><br>

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-hover table-bordered table-striped"><!-- table table-hover table-bordered table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>#</th>
<th>Order ID</th>
<th>Invoice No</th>
<th>Amount Paid</th>
<th>Payment Method</th>
<!-- <th>Reference #</th> -->
<th>Payment Date</th>

</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

    $i = 0;

    $get_payments = "select * from payments where status='Paid' and YEAR(payment_date) = YEAR(NOW())";

    $run_payments = mysqli_query($con, $get_payments);

    while ($row_payments = mysqli_fetch_array($run_payments)) {

        $order_id = $row_payments['order_id'];

        $payment_id = $row_payments['payment_id'];

        $invoice_no = $row_payments['invoice_no'];

        $amount = $row_payments['amount'];

        $payment_mode = $row_payments['payment_mode'];

        $payment_date = $row_payments['payment_date'];

        $i++;

        ?>


<tr>

<td><?php echo $i; ?></td>

<td><?php echo $order_id; ?></td>

<td><?php echo "<svg id='barcode-$invoice_no' onload='createBarcode($invoice_no, $invoice_no)'></svg>"; ?></td>

<td>₱<?php echo $amount; ?></td>

<td><?php echo $payment_mode; ?></td>

<td><?php echo $payment_date; ?></td>


</tr>


<?php }?>

</tbody><!-- tbody Ends -->

</table><!-- table table-hover table-bordered table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php }?>

<script> function createBarcode(code, id){
    JsBarcode(`#barcode-${code}`, code);
    console.log(code, id);
}
</script>