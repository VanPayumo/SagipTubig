<?php

$db = mysqli_connect("localhost", "root", "", "sagiptubig");

/// IP address code starts /////
function getRealUserIp()
{
    switch (true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default:return $_SERVER['REMOTE_ADDR'];
    }
}
/// IP address code Ends /////

// items function Starts ///

function items()
{

    global $db;

    $ip_add = getRealUserIp();

    $get_items = "select * from cart where ip_add='$ip_add'";

    $run_items = mysqli_query($db, $get_items);

    $count_items = mysqli_num_rows($run_items);

    echo $count_items;

}

// items function Ends ///

// total_price function Starts //

function total_price()
{

    global $db;

    $ip_add = getRealUserIp();

    $total = 0;

    $select_cart = "select * from cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($db, $select_cart);

    while ($record = mysqli_fetch_array($run_cart)) {

        $pro_id = $record['p_id'];

        $pro_qty = $record['qty'];

        $sub_total = $record['p_price'] * $pro_qty;

        $total += $sub_total;

    }

    echo "$" . $total;

}

// total_price function Ends //

// getPro function Starts //

function getPro()
{

    global $db;

    $get_products = "select * from products order by 1 DESC LIMIT 0,8";

    $run_products = mysqli_query($db, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {

        $pro_id = $row_products['product_id'];

        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price'];

        $pro_img1 = $row_products['product_img1'];

        $pro_label = $row_products['product_label'];

        $pro_stock = $row_products['product_stock'];

        $status = $row_products['status'];

        $pro_psp_price = $row_products['product_psp_price'];

        $pro_url = $row_products['product_url'];

        if ($status == "bundle") {

            $product_psp_price = "";

            $product_price = "$$pro_price ($$pro_psp_price Bundle)";

        } else if ($pro_label == "Sale" or $pro_label == "Gift") {

            $product_price = "<del> $$pro_price </del>";

            $product_psp_price = "| $$pro_psp_price";

        } else {

            $product_psp_price = "";

            $product_price = "$$pro_price";

        }

        if ($pro_label == "") {

        } else {

            $product_label = "

";

        }

        echo "

<div class='col-md-4 col-sm-6 single' >

<div style='background-color:#E0E0E0;' class='product' >

<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<hr>

<h3><a href='$pro_url' >$pro_title</a></h3>";

        if ($pro_stock <= 0) {
            echo "<p style='font-weight:bold;' class='price' > Out of stock </p>

            <p class='buttons' >

            <a href='$pro_url' style='color:#577BC1;' class='btn btn-default'>View Details</a>

            <a style='background-color:#577BC1; border-color:#577BC1;' class='btn btn-danger' disabled>

            <i class='fa fa-shopping-cart'></i> Add To Cart";
        } else {
            echo "<p style='font-weight:bold;' class='price' > $product_price $product_psp_price </p>

            <p class='buttons' >

            <a href='$pro_url' style='color:#577BC1;' class='btn btn-default' >View Details</a>

            <a style='background-color:#577BC1; border-color:#577BC1;' href='$pro_url' class='btn btn-danger'>

            <i class='fa fa-shopping-cart'></i> Add To Cart";
        }

        echo "

</a>


</p>

</div>

$product_label


</div>

</div>

";

    }

}

// getPro function Ends //

/// getProducts Function Starts ///

function getProducts()
{

/// getProducts function Code Starts ///

    global $db;

    $aWhere = array();

/// Products Categories Code Starts ///

    if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {

        foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {

            if ((int) $sVal != 0) {

                $aWhere[] = 'p_cat_id=' . (int) $sVal;

            }

        }

    }

/// Products Categories Code Ends ///

    $per_page = 6;

    if (isset($_GET['page'])) {

        $page = $_GET['page'];

    } else {

        $page = 1;

    }

    $start_from = ($page - 1) * $per_page;

    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";

    $sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' or ', $aWhere) : '') . $sLimit;

    $get_products = "select * from products  " . $sWhere;

    $run_products = mysqli_query($db, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {

        $pro_id = $row_products['product_id'];

        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price'];

        $pro_img1 = $row_products['product_img1'];

        $pro_label = $row_products['product_label'];

        $pro_stock = $row_products['product_stock'];

        $status = $row_products['status'];

        $pro_psp_price = $row_products['product_psp_price'];

        $pro_url = $row_products['product_url'];

        if ($status == "bundle") {

            $product_psp_price = "";

            $product_price = "$$pro_price ($$pro_psp_price Bundle)";

        } else if ($pro_label == "Sale" or $pro_label == "Gift") {

            $product_price = "<del> $$pro_price </del>";

            $product_psp_price = "| $$pro_psp_price";

        } else {

            $product_psp_price = "";

            $product_price = "$$pro_price";

        }

        if ($pro_label == "") {

        } else {

            $product_label = "

";

        }

        echo "

<div class='col-md-4 col-sm-6 center-responsive' >

<div style='background-color:#E0E0E0;' class='product' >

<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<hr>

<h3><a href='$pro_url' >$pro_title</a></h3>";

        if ($pro_stock <= 0) {
            echo "<p style='font-weight:bold;' class='price' > Out of stock </p>

    <p class='buttons' >

    <a href='$pro_url' style='color:#577BC1;' class='btn btn-default'>View Details</a>

    <a style='background-color:#577BC1; border-color:#577BC1;' class='btn btn-danger' disabled>

    <i class='fa fa-shopping-cart'></i> Add To Cart";
        } else {
            echo "<p style='font-weight:bold;' class='price' > $product_price $product_psp_price </p>

    <p class='buttons' >

    <a href='$pro_url' style='color:#577BC1;' class='btn btn-default' >View Details</a>

    <a style='background-color:#577BC1; border-color:#577BC1;' href='$pro_url' class='btn btn-danger'>

    <i class='fa fa-shopping-cart'></i> Add To Cart";
        }

        echo "

</a>


</p>

</div>

$product_label


</div>

</div>

";

    }
/// getProducts function Code Ends ///

}

/// getProducts Function Ends ///

/// getPaginator Function Starts ///

function getPaginator()
{

/// getPaginator Function Code Starts ///

    $per_page = 6;

    global $db;

    $aWhere = array();

    $aPath = '';

/// Products Categories Code Starts ///

    if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {

        foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {

            if ((int) $sVal != 0) {

                $aWhere[] = 'p_cat_id=' . (int) $sVal;

                $aPath .= 'p_cat[]=' . (int) $sVal . '&';

            }

        }

    }

/// Products Categories Code Ends ///

    $sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' or ', $aWhere) : '');

    $query = "select * from products " . $sWhere;

    $result = mysqli_query($db, $query);

    $total_records = mysqli_num_rows($result);

    $total_pages = ceil($total_records / $per_page);

    echo "<li><a href='shop.php?page=1";

    if (!empty($aPath)) {echo "&" . $aPath;}

    echo "' >" . 'First Page' . "</a></li>";

    for ($i = 1; $i <= $total_pages; $i++) {

        echo "<li><a href='shop.php?page=" . $i . (!empty($aPath) ? '&' . $aPath : '') . "' >" . $i . "</a></li>";

    }
    ;

    echo "<li><a href='shop.php?page=$total_pages";

    if (!empty($aPath)) {echo "&" . $aPath;}

    echo "' >" . 'Last Page' . "</a></li>";

/// getPaginator Function Code Ends ///

}

/// getPaginator Function Ends ///
