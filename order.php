<?php

include "includes/db.php";
include "includes/header.php";
include "functions/functions.php";

?>

<?php

if (isset($_GET['c_id'])) {

    $customer_id = $_GET['c_id'];

}

$ip_add = getRealUserIp();

$status = "pending";

$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";

// $run_cart = mysqli_query($con, $select_cart);

// $count = mysqli_num_rows($run_cart);
$prepare_cart = $con->prepare($select_cart);
$run_cart = $prepare_cart->execute(array());
$count = $prepare_cart->rowCount();

if ($count <= 0) {
    echo "<script>alert('Your cart is still empty!')</script>";

    echo "<script>window.open('shop.php','_self')</script>";
}

while ($row_cart = $prepare_cart->fetch(PDO::FETCH_ASSOC)) {

    $pro_id = $row_cart['p_id'];

    $pro_size = $row_cart['size'];

    $pro_qty = $row_cart['qty'];

    $sub_total = $row_cart['p_price'] * $pro_qty;

    $insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,size,order_date,order_status) values ('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";

    // $run_customer_order = mysqli_query($con, $insert_customer_order);
    $prepare_customer_order = $con->prepare($insert_customer_order);
    $run_customer_order = $prepare_customer_order->execute();

    $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,size,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";

    // $run_pending_order = mysqli_query($con, $insert_pending_order);
    $prepare_pending_order = $con->prepare($insert_pending_order);
    $run_pending_order = $prepare_pending_order->execute();

    $update_product_stock = "update products set product_stock = product_stock-$pro_qty where product_id = $pro_id";

    // $run__product_stock = mysqli_query($con, $update_product_stock);
    $prepare_product_stock = $con->prepare($update_product_stock);
    $run__product_stock = $prepare_product_stock->execute();

    $delete_cart = "delete from cart where ip_add='$ip_add'";

    // $run_delete = mysqli_query($con, $delete_cart);
    $prepare_delete = $con->prepare($delete_cart);
    $run_delete = $prepare_delete->execute();

    echo "<script>alert('Your order has been submitted,Thanks ')</script>";

    echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

}

?>
