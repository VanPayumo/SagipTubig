<script type="text/javascript" src="../includes/JsBarcode.all.min.js"></script>
<center><!-- center Starts -->
    <h1>My Orders</h1>
    <p class="lead">Your orders on one place.</p>
    <p class="text-muted" >
    If you have any questions, please feel free to <a href="../contact.php" > contact us,</a> our customer service center is working for you 24/7.
    </p>
</center><!-- center Ends -->

<hr>

<div class="table-responsive" ><!-- table-responsive Starts -->
    <table  class="table table-bordered table-hover" ><!-- table table-bordered table-hover Starts -->
    <thead><!-- thead Starts -->
    <tr>
        <th>#</th>
        <th>Amount</th>
        <th>Invoice</th>
        <th>Qty</th>
        <th>Size</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead><!-- thead Ends -->

    <tbody><!--- tbody Starts --->

        <?php

        $customer_session = $_SESSION['customer_email'];
        $get_customer = "select * from customers where customer_email='$customer_session'";

        // $run_customer = mysqli_query($con, $get_customer);

        // $row_customer = mysqli_fetch_array($run_customer);
        $prepare_customer = $con->prepare($get_customer);
        $run_customer = $prepare_customer->execute(array());
        $row_customer = $prepare_customer->fetch();

        $customer_id = $row_customer['customer_id'];

        $get_orders = "select * from customer_orders where customer_id='$customer_id'";

        // $run_orders = mysqli_query($con, $get_orders);
        $prepare_orders = $con->prepare($get_orders);
        $run_orders = $prepare_orders->execute(array());

        $i = 0;

        while ($row_orders = $prepare_orders->fetch()) {

            $order_id = $row_orders['order_id'];

            $due_amount = $row_orders['due_amount'];

            $invoice_no = $row_orders['invoice_no'];

            $qty = $row_orders['qty'];

            $size = $row_orders['size'];

            $order_date = substr($row_orders['order_date'], 0, 11);

            $order_status = $row_orders['order_status'];

            $i++;

            if ($order_status == 'pending') {

                $order_status = "<b style='color:indigo;'>Shipping</b>";

            } else if ($order_status == 'Complete') {

                $order_status = "<b style='color:green;'>Received</b>";

            } else if ($order_status == 'Returned') {

                $order_status = "<b style='color:orange;'>Returned</b>";

            } else {

                $order_status = "<b style='color:red;'>Refunded</b>";

            }

            ?>

    <tr><!-- tr Starts -->
    <th><?php echo $i; ?></th>
        <td>₱<?php echo $due_amount; ?></td>
        <td><?php echo "<svg id='barcode-$invoice_no' onload='createBarcode($invoice_no, $invoice_no)'></svg>"; ?></td>
        <td><?php echo $qty; ?></td>
        <td><?php echo $size; ?></td>
        <td><?php echo $order_date; ?></td>
        <td><?php echo $order_status; ?></td>
        <td>

        <?php

            if ($order_status == "<b style='color:indigo;'>Shipping</b>") {

                echo '<a href="confirm.php?order_id=' . $order_id . '&invoice_no=' . $invoice_no . '&due_amount=' . $due_amount . '&order_date=' . $order_date . '" target="blank" class="btn btn-success btn-xs" > Received </a>';

            } else if ($order_status == "<b style='color:green;'>Received</b>") {

                echo '<a href="return.php?order_id=' . $order_id . '&invoice_no=' . $invoice_no . '&due_amount=' . $due_amount . '' . '&order_date=' . $order_date . '" target="blank" class="btn btn-warning btn-xs" > &nbsp;&nbsp;Return&nbsp;&nbsp; </a>';

            } else if ($order_status == "<b style='color:orange;'>Returned</b>") {

                echo "<b style='color:Orange;'>Returned</b>";

            } else if ($order_status == "<b style='color:red;'>Refunded</b>") {

                echo "<b style='color:red;'>Refunded</b>";

            } else {

                echo "";

            }

        ?>

        </td>

    </tr><!-- tr Ends -->

    <?php }?>

    </tbody><!--- tbody Ends --->


    </table><!-- table table-bordered table-hover Ends -->
</div><!-- table-responsive Ends -->


<script> function createBarcode(code, id){
    JsBarcode(`#barcode-${code}`, code);
}
</script>

