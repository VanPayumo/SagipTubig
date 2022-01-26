<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>

<?php

    if (isset($_GET['delete_bundle'])) { // Delete bundle product from admin page

        $delete_id = $_GET['delete_bundle'];

        $delete_pro = "update products set status='product' where product_id='$delete_id'";

        $run_delete = mysqli_query($con, $delete_pro);

        if ($run_delete) {

            echo "<script>alert('One Bundle Has been deleted')</script>";

            echo "<script>window.open('index.php?view_bundles','_self')</script>";

        }

    }

    ?>

<?php }?>