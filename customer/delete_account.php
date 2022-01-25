
<center>

<h1>Confirm Deletion of Account.</h1>
<form action="" method="post">
    <input class="btn btn-danger" type="submit" name="yes" value="Confirm">
    <input class="btn btn-primary" type="submit" name="no" value="Cancel">
</form>

</center>

<?php

$c_email = $_SESSION['customer_email'];

if (isset($_POST['yes'])) {

    $delete_customer = "delete from customers where customer_email='$c_email'";

// $run_delete = mysqli_query($con,$delete_customer);
    $prepare_delete = $con->prepare($delete_customer);
    $run_delete = $prepare_delete->execute();

    if ($run_delete) {

        $customer_id = $_SESSION['customer_id'];

        $insert_log_history = "INSERT INTO customer_log_history (cid, c_email, log_time, activity) VALUES ($customer_id, '$c_email', NOW(), 'Deactivated')";
        $prepare_insert_log = $con->prepare($insert_log_history);
        $run_insert_log = $prepare_insert_log->execute();

        session_destroy();

        echo "<script>alert('Your Account Has Been Deleted! Good By')</script>";

        echo "<script>window.open('../index.php','_self')</script>";

    }

}

if (isset($_POST['no'])) {

    echo "<script>window.open('my_account.php?my_orders','_self')</script>";

}

?>