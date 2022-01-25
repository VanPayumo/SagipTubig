
<div class="ncontainer" ><!-- box Starts -->

<div class="nbox-header" ><!-- box-header Starts -->

<center>

<h1>Login</h1>

</center>

<p class="text-muted" >

</p>




</div><!-- box-header Ends -->

<form action="checkout.php" method="post" ><!--form Starts -->

<div class="nform-group" ><!-- form-group Starts -->

<label>Email</label>

<input type="text" class="nform-control" name="c_email" required >

</div><!-- form-group Ends -->

<div class="nform-group" ><!-- form-group Starts -->

<label>Password</label>

<input type="password" class="nform-control" name="c_pass" required >

<h5 align="center">




</h5>

</div><!-- form-group Ends -->
<br><br>

<div class="text-center" ><!-- text-center Starts -->

<button name="login" value="Login" class="btn nbtn-primary" >

<i class="fa fa-sign-in" ></i> LOGIN


</button>

</div><!-- text-center Ends -->


</form><!--form Ends -->

<center><!-- center Starts -->

<a href="customer_register.php" >

<h5>👉New ? Register Here👈</h5>

</a>


</center><!-- center Ends -->

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div><!-- box Ends -->

<?php

if (isset($_POST['login'])) {

    $customer_email = $_POST['c_email'];

    $customer_pass = $_POST['c_pass'];

    // $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

    // $run_customer = mysqli_query($con, $select_customer);

    // $row_customer = mysqli_fetch_array($run_customer);

    $select_customer = "select * from customers where customer_email=:customer_email AND customer_pass=:customer_pass";
    $prepare_customer = $con->prepare($select_customer);
    $run_customer = $prepare_customer->execute(array(":customer_email" => $customer_email, ":customer_pass" => $customer_pass));
    $row_customer = $prepare_customer->fetch(PDO::FETCH_ASSOC);

    $customer_id = $row_customer['customer_id'];

    $get_ip = getRealUserIp();

    // $check_customer = mysqli_num_rows($run_customer);
    $check_customer = $prepare_customer->rowCount();

    // $select_cart = "select * from cart where ip_add='$get_ip'";

    // $run_cart = mysqli_query($con, $select_cart);

    // $check_cart = mysqli_num_rows($run_cart);

    $select_cart = "select * from cart where ip_add=:get_ip";
    $prepare_cart = $con->prepare($select_cart);
    $run_cart = $prepare_cart->execute(array(":get_ip" => $get_ip));

    if ($check_customer == 0) {

        echo "<script>alert('password or email is wrong')</script>";

        exit();

    }

    if ($check_customer == 1 and $check_cart == 0) {

        $_SESSION['customer_email'] = $customer_email;

        $_SESSION['customer_id'] = $customer_id;

        $insert_log_history = "INSERT INTO customer_log_history (cid, c_email, log_time, activity) VALUES ($customer_id, '$customer_email', NOW(), 'Logged in')";

        // $run_insert_log = mysqli_query($con, $insert_log_history);
        $prepare_insert_log = $con->prepare($insert_log_history);
        $run_insert_log = $prepare_insert_log->execute();

        echo "<script>alert('You are Logged In')</script>";

        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

    } else {

        $_SESSION['customer_email'] = $customer_email;

        $_SESSION['customer_id'] = $customer_id;

        $insert_log_history = "INSERT INTO customer_log_history (cid, c_email, log_time, activity) VALUES ($customer_id, '$customer_email', NOW(), 'Logged in')";

        // $run_insert_log = mysqli_query($con, $insert_log_history);
        $prepare_insert_log = $con->prepare($insert_log_history);
        $run_insert_log = $prepare_insert_log->execute();

        echo "<script>alert('You are Logged In')</script>";

        echo "<script>window.open('checkout.php','_self')</script>";

    }

}

?>