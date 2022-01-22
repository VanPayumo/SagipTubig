<?php

session_start();

if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('../checkout.php','_self')</script>";

} else {

    include "includes/db.php";
    include "../includes/header.php";
    include "functions/functions.php";
    include "includes/main.php";

    if (isset($_GET['order_id'])) {

        $order_id = $_GET['order_id'];
        $invoice_no = $_GET['invoice_no'];
        $due_amount = $_GET['due_amount'];
        $order_date = $_GET['order_date'];

    }

    ?>



<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->


<div class="col-md-3"><!-- col-md-3 Starts -->

<?php include "includes/sidebar.php";?>

</div><!-- col-md-3 Ends -->

<div class="col-md-9"><!-- col-md-9 Starts -->

<div class="box"><!-- box Starts -->

<h1 align="center"> Return Product </h1>


<form action="return.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"><!--- form Starts -->

<div class="form-group"><!-- form-group Starts -->

<label>Invoice No:</label>

<input type="text" class="form-control" name="invoice_no" value="<?php echo $invoice_no ?>">

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label>Total Amount:</label>

<input type="text" class="form-control" name="amount_sent" value="<?php echo $due_amount ?>">

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label>Select Payment Mode:</label>

<select name="payment_mode" class="form-control" required><!-- select Starts -->

<option hidden="" disabled="disabled" value="">Select Payment Mode (other payment modes coming soon) </option>
<option selected="selected">Cash On Delivery (COD)</option>

</select><!-- select Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

</div><!-- form-group Ends -->


</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label>Order Date:</label>

<input type="text" class="form-control" name="date" value="<?php echo $order_date ?>">

</div><!-- form-group Ends -->

<div class="text-center"><!-- text-center Starts -->

<button type="submit" name="confirm_return" class="btn btn-danger btn-lg">

<i class="fa fa-user-md"></i> Confirm Return

</button>

</div><!-- text-center Ends -->

</form><!--- form Ends -->

<?php

    if (isset($_POST['confirm_return'])) {

        $update_id = $_GET['update_id'];

        $invoice_no = $_POST['invoice_no'];

        $amount = $_POST['amount_sent'];

        $payment_mode = $_POST['payment_mode'];

        $return = "Returned";

        $insert_return = "insert into returns (invoice_no,amount,payment_mode,return_date) values ('$invoice_no','$amount','$payment_mode', CURRENT_TIMESTAMP)";

        $run_return = mysqli_query($con, $insert_return);

        $update_customer_order = "update customer_orders set order_status='$return' where order_id='$update_id'";

        $run_customer_order = mysqli_query($con, $update_customer_order);

        $update_payments = "update payments set status='$return' where order_id='$update_id'";

        $run_payments = mysqli_query($con, $update_payments);

        $update_pending_order = "update pending_orders set order_status='$return' where order_id='$update_id'";

        $run_pending_order = mysqli_query($con, $update_pending_order);

        if ($run_pending_order) {

            echo "<script>alert('Your return order has been received, refund will be completed within 24 hours')</script>";

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";

        } else {
            echo "<script>alert('Error. Please try again.')</script>";

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        }

    }

    ?>


</div><!-- box Ends -->

</div><!-- col-md-9 Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->


<br><br><br><br><br><br><br><br><br>
<?php include "../includes/footer.php";?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php }?>
