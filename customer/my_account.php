<?php

session_start();

if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('../checkout.php','_self')</script>";

} else {

    include "includes/db.php";
    include "../includes/header.php";
    include "includes/barcode128.php";
    include "functions/functions.php";
    include "includes/main.php";

    ?>
  <main >
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">My </span>Account
      </div>
      <p class="nero__text">
      </p>
    </div>
  </main>

<div id="content" ><!-- content Starts -->
<div class="container"><!-- container Starts -->



<div class="col-md-12" ><!-- col-md-12 Starts -->

<?php

    $c_email = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$c_email'";

    $run_customer = mysqli_query($con, $get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_confirm_code = $row_customer['customer_confirm_code'];

    $c_name = $row_customer['customer_name'];

    if (!empty($customer_confirm_code)) {

        ?>


<?php }?>

</div><!-- col-md-12 Ends -->

<div class="col-md-3"><!-- col-md-3 Starts -->

<?php include "includes/sidebar.php";?>

</div><!-- col-md-3 Ends -->

<div class="col-md-9" ><!--- col-md-9 Starts -->

<div class="box"  ><!-- box Starts -->

<?php

    if (isset($_GET[$customer_confirm_code])) {

        $update_customer = "update customers set customer_confirm_code='' where customer_confirm_code='$customer_confirm_code'";

        $run_confirm = mysqli_query($con, $update_customer);

        echo "<script>window.open('my_account.php?my_orders','_self')</script>";

    }

    if (isset($_GET['my_orders'])) {

        include "my_orders.php";

    }

    if (isset($_GET['pay_offline'])) {

        include "pay_offline.php";

    }

    if (isset($_GET['edit_account'])) {

        include "edit_account.php";

    }

    if (isset($_GET['change_pass'])) {

        include "change_pass.php";

    }

    if (isset($_GET['log_history'])) {

        include "log_history.php";

    }

    if (isset($_GET['delete_account'])) {

        include "delete_account.php";

    }

    if (isset($_GET['my_wishlist'])) {

        include "my_wishlist.php";

    }

    if (isset($_GET['delete_wishlist'])) {

        include "delete_wishlist.php";

    }

    ?>

</div><!-- box Ends -->


</div><!--- col-md-9 Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->

<br><br><br>

<?php

    include "../includes/footer.php";

    ?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php }?>
