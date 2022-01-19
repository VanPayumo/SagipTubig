<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>

<?php

    if (isset($_GET['order_refund'])) {

        $update_id = $_GET['order_refund'];

        $return = "Refunded";

        $update_customer_order = "update customer_orders set order_status='$return' where order_id='$update_id'";

        $run_customer_order = mysqli_query($con, $update_customer_order);

        $update_payments = "update payments set status='$return' where order_id='$update_id'";

        $run_payments = mysqli_query($con, $update_payments);

        $update_pending_order = "update pending_orders set order_status='$return' where order_id='$update_id'";

        $run_pending_order = mysqli_query($con, $update_pending_order);

        if ($run_pending_order) {

            echo "<script>alert('Item successfully refunded')</script>";

            echo "<script>window.open('index.php?view_orders','_self')</script>";

        } else {
            echo "<script>alert('Error. Please try again.')</script>";

            echo "<script>window.open('index.php?view_orders','_self')</script>";
        }

    }

    ?>



<?php }?>