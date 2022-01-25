<div class="box"><!-- box Starts -->

<?php

$session_email = $_SESSION['customer_email'];

$select_customer = "select * from customers where customer_email='$session_email'";

// $run_customer = mysqli_query($con, $select_customer);

// $row_customer = mysqli_fetch_array($run_customer);
$prepare_customer = $con->prepare($select_customer);
$run_customer = $prepare_customer->execute();
$row_customer = $prepare_customer->fetch();

$customer_id = $row_customer['customer_id'];

?>

<h1 class="text-center">Confirm Product Checkout</h1>

<p class="lead text-center">

<a href="order.php?c_id=<?php echo $customer_id; ?>"> Submit order </a>

</p>

<center><!-- center Starts -->


<?php

$i = 0;

$ip_add = getRealUserIp();

$get_cart = "select * from cart where ip_add='$ip_add'";

// $run_cart = mysqli_query($con, $get_cart);
$prepare_cart = $con->prepare($get_cart);
$run_cart = $prepare_cart->execute(array());

while ($row_cart = $prepare_cart->fetch(PDO::FETCH_ASSOC)) {

    $pro_id = $row_cart['p_id'];

    $pro_qty = $row_cart['qty'];

    $pro_price = $row_cart['p_price'];

    $get_products = "select * from products where product_id='$pro_id'";

    // $run_products = mysqli_query($con, $get_products);

    // $row_products = mysqli_fetch_array($run_products);
    $prepare_products = $con->prepare($get_products);
    $run_products = $prepare_products->execute(array());
    $row_products = $prepare_products->fetch(PDO::FETCH_ASSOC);

    $product_title = $row_products['product_title'];

    $i++;

    ?>


<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>" >

<input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>" >

<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price; ?>" >

<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>" >


<?php }?>

<div class="hero">
<image src="images/icon.png" ></image>
<h2>#SAGIP<b>TUBIG</b> </h2>
<div>


</form><!-- form Ends -->

</center><!-- center Ends -->

</div><!-- box Ends -->
