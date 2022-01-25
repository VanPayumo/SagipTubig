<?php

session_start();

include "includes/db.php";
include "includes/header.php";
include "functions/functions.php";
include "includes/main.php";

?>

<?php

$product_id = @$_GET['pro_id'];

// $get_product = "select * from products where product_url='$product_id'";

// $run_product = mysqli_query($con, $get_product);

// $check_product = mysqli_num_rows($run_product);

$get_product = "select * from products where product_url = :product_id";

$prepare_product = $con->prepare($get_product);
$run_product = $prepare_product->execute(array(":product_id" => $product_id));

$check_product = $prepare_product->rowCount();

if ($check_product == 0) {

    echo "<script> window.open('index.php','_self') </script>";

} else {

    // $row_product = mysqli_fetch_array($run_product);
    while ($row_product = $prepare_product->fetch(PDO::FETCH_ASSOC)) {

        $p_cat_id = $row_product['p_cat_id'];

        $pro_id = $row_product['product_id'];

        $pro_title = $row_product['product_title'];

        $pro_price = $row_product['product_price'];

        $pro_stock = $row_product['product_stock'];

        $pro_desc = $row_product['product_desc'];

        $pro_img1 = $row_product['product_img1'];

        $pro_img2 = $row_product['product_img2'];

        $pro_img3 = $row_product['product_img3'];

        $pro_label = $row_product['product_label'];

        $pro_psp_price = $row_product['product_psp_price'];

        $pro_features = $row_product['product_features'];

        $status = $row_product['status'];

        $pro_url = $row_product['product_url'];

        // $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

        // $run_p_cat = mysqli_query($con, $get_p_cat);

        // $row_p_cat = mysqli_fetch_array($run_p_cat);

        $get_p_cat = "select * from product_categories where p_cat_id=:p_cat_id";

        $prepare_p_cat = $con->prepare($get_p_cat);
        $run_p_cat = $prepare_p_cat->execute(array(":p_cat_id" => $p_cat_id));
        $row_p_cat = $prepare_p_cat->fetch(PDO::FETCH_ASSOC);

        $p_cat_title = $row_p_cat['p_cat_title'];
    }
    ?>

  <main>
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">Product </span>View
      </div>
      <p class="nero__text">
      </p>
    </div>
  </main>

<div id="content" ><!-- content Starts -->
<div class="container" id="ncontainer" ><!-- container Starts -->





<div class="col-md-12"><!-- col-md-12 Starts -->

<div class="row" id="productMain"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div id="mainImage"><!-- mainImage Starts -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">

<ol class="carousel-indicators"><!-- carousel-indicators Starts -->

<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>

</ol><!-- carousel-indicators Ends -->

<div class="carousel-inner"><!-- carousel-inner Starts -->

<div class="item active">
<center>
<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
</center>
</div>

<div class="item">
<center>
<img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
</center>
</div>

<div class="item">
<center>
<img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
</center>
</div>

</div><!-- carousel-inner Ends -->

<a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-left"> </span>

<span class="sr-only"> Previous </span>

</a><!-- left carousel-control Ends -->

<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-right"> </span>

<span class="sr-only"> Next </span>

</a><!-- right carousel-control Ends -->

</div>

</div><!-- mainImage Ends -->



</div><!-- col-sm-6 Ends -->


<div class="col-sm-6" ><!-- col-sm-6 Starts -->

<div class="box" ><!-- box Starts -->

<h1 class="text-center" > <?php echo $pro_title; ?> </h1>

<?php

    if (isset($_POST['add_cart'])) {

        $ip_add = getRealUserIp();

        $p_id = $pro_id;

        $product_qty = $_POST['product_qty'];

        $product_size = $_POST['product_size'];

        // $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

        // $run_check = mysqli_query($con, $check_product);

        $check_product = "select * from cart where ip_add=:ip_add AND p_id=:p_id";
        $prepare_check_product = $con->prepare($check_product);
        $run_check_product = $prepare_check_product->execute(array(":ip_add" => $ip_add, ":p_id" => $p_id));
        $run_check = $prepare_check_product->rowCount();

        // $check_bundle = "select * from cart where ip_add='$ip_add' AND p_bundle='bundle'";

        // $run_bundle_check = mysqli_query($con, $check_bundle);

        $check_bundle = "select * from cart where ip_add=:ip_add AND p_bundle='bundle'";
        $prepare_bundle_check = $con->prepare($check_bundle);
        $run_check_bundle = $prepare_bundle_check->execute(array(":ip_add" => $ip_add));
        $run_bundle_check = $prepare_bundle_check->rowCount();

        if ($run_check > 0) {

            // $get_price = "select * from products where product_id='$p_id'";

            // $run_price = mysqli_query($con, $get_price);

            // $row_price = mysqli_fetch_array($run_price);

            $get_price = "select * from products where product_id=:p_id";
            $prepare_price = $con->prepare($get_price);
            $run_price = $prepare_price->execute(array(":p_id" => $p_id));
            $row_price = $prepare_price->fetch(PDO::FETCH_ASSOC);

            $pro_psp_price = $row_price['product_psp_price'];

            $pro_bundle = $row_price['status'];

            if ($run_bundle_check > 1 and $pro_bundle == "bundle") {

                $query = "update cart set qty = $product_qty, p_price = $pro_psp_price , size = ' $product_size ' where ip_add='$ip_add' AND p_id='$p_id'";

                // $run_query = mysqli_query($con, $query);

                $prepare_query = $con->prepare($query);
                $run_query = $prepare_query->execute();

                echo "<script>alert('Bundle Price updated in cart')</script>";

            } else {

                echo "<script>alert('This Product is already added in cart')</script>";

                echo "<script>window.open('$pro_url','_self')</script>";

            }

        } else {

            // $get_price = "select * from products where product_id='$p_id'";

            // $run_price = mysqli_query($con, $get_price);

            // $row_price = mysqli_fetch_array($run_price);

            $get_price = "select * from products where product_id=:p_id";
            $prepare_price = $con->prepare($get_price);
            $run_price = $prepare_price->execute(array(":p_id" => $p_id));
            $row_price = $prepare_price->fetch(PDO::FETCH_ASSOC);

            $pro_price = $row_price['product_price'];

            $pro_stock = $row_price['product_stock'];

            $pro_psp_price = $row_price['product_psp_price'];

            $pro_label = $row_price['product_label'];

            $pro_bundle = $row_price['status'];

            if ($run_bundle_check >= 1 and $pro_bundle == "bundle") {

                $product_price = $pro_psp_price;
                $pro_stock = $pro_stock;

                echo "<script>alert('Bundle item Successfully added to cart')</script>";
                echo "<script>window.open(shop.php,'_self')</script>";

            } else if ($pro_bundle == "bundle" and ($pro_label == "Sale" or $pro_label == "Gift")) {

                $product_price = $pro_price;
                $pro_stock = $pro_stock;

                echo "<script>alert('Item Successfully added to cart')</script>";
                echo "<script>window.open(shop.php,'_self')</script>";

            } else if ($pro_label == "Sale" or $pro_label == "Gift") {

                $product_price = $pro_psp_price;
                $pro_stock = $pro_stock;

                echo "<script>alert('Promo item Successfully added to cart')</script>";
                echo "<script>window.open(shop.php,'_self')</script>";

            } else {

                $product_price = $pro_price;
                $pro_stock = $pro_stock;

                echo "<script>alert('Item Successfully added to cart')</script>";
                echo "<script>window.open(shop.php,'_self')</script>";

            }

            $query = "insert into cart (p_id,ip_add,qty,p_price,size,p_bundle) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size','$pro_bundle')";

            $prepare_query = $con->prepare($query);
            $run_query = $prepare_query->execute();

            // $run_query = mysqli_query($con, $query);

            echo "<script>window.open('$pro_url','_self')</script>";

        }

    }

    ?>

<form action="" method="post" class="form-horizontal" ><!-- form-horizontal Starts -->

<?php

    if ($status == "product") {

        ?>

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-5 control-label" >Product Quantity </label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<?php
if ($pro_stock <= 0) {
            echo '<select name="product_qty" class="form-control" disabled>';
        } else {
            echo '<select name="product_qty" class="form-control" required>';
        }
        ?>



<option hidden="" disabled="disabled" selected="selected" value="">Select quantity</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>


</select>

</div><!-- col-md-7 Ends -->

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-5 control-label" >Product Size</label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<?php
if ($pro_stock <= 0) {
            echo '<select name="product_size" class="form-control" disabled>';
        } else {
            echo '<select name="product_size" class="form-control" required>';
        }
        ?>

<option hidden="" disabled="disabled" selected="selected" value="">Select a Size</option>
<option>Small</option>
<option>Medium</option>
<option>Large</option>


</select>

</div><!-- col-md-7 Ends -->


</div><!-- form-group Ends -->

<?php } else {?>


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-5 control-label" >Bundle Quantity </label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<?php if ($pro_stock <= 0) {
        echo '<select name="product_qty" class="form-control" disabled>';
    } else {
        echo '<select name="product_qty" class="form-control" required>';
    }

        ?>



<option hidden="" disabled="disabled" selected="selected" value="">Select quantity</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>


</select>

</div><!-- col-md-7 Ends -->

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-5 control-label" >Bundle Size</label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<?php if ($pro_stock <= 0) {
            echo '<select name="product_size" class="form-control" disabled>';
        } else {
            echo '<select name="product_size" class="form-control" required>';
        }

        ?>

<option hidden="" disabled="disabled" selected="selected" value="">Select a Size</option>
<option>Small</option>
<option>Medium</option>
<option>Large</option>


</select>

</div><!-- col-md-7 Ends -->


</div><!-- form-group Ends -->


<?php }?>


<?php

    if ($status == "bundle") {

        if ($pro_label == "New" or $pro_label == "Sale") {

            echo "

<p class='price'>

Regular Price : <del> ₱$pro_price </del><br>

Bundle sale Price : ₱$pro_psp_price

</p>

";

        } else {

            echo "

<p class='price'>

Product Price : ₱$pro_price

</p>

";

        }

    } else {

        if ($pro_stock <= 0) {
            echo " <p class='price'> Out of Stock </p>";
        } else if ($pro_label == "Sale" or $pro_label == "Gift") {

            echo "

<p class='price'>

Product Price : <del> ₱$pro_price </del><br>

Product sale Price : ₱$pro_psp_price

</p>

";

        } else {

            echo "

<p class='price'>

Product Price : ₱$pro_price

</p>

";

        }

    }

    ?>

<p class="text-center buttons" ><!-- text-center buttons Starts -->


<button class="btn btn-warning" type="submit" name="add_wishlist">

<i class="fa fa-heart" ></i> Add to Wishlist

</button>

<?php
if ($pro_stock <= 0) {
        echo '<button class="btn btn-button" type="submit" name="add_cart" disabled>';
    } else {
        echo '<button class="btn btn-button" type="submit" name="add_cart">';
    }
    ?>

<i class="fa fa-shopping-cart"></i> Add to Cart

</button>


<?php

    if (isset($_POST['add_wishlist'])) {

        if (!isset($_SESSION['customer_email'])) {

            echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";

            echo "<script>window.open('checkout.php','_self')</script>";

        } else {

            $customer_session = $_SESSION['customer_email'];

            // $get_customer = "select * from customers where customer_email='$customer_session'";

            // $run_customer = mysqli_query($con, $get_customer);

            // $row_customer = mysqli_fetch_array($run_customer);

            $get_customer = "select * from customers where customer_email=:customer_session";
            $prepare_customer = $con->prepare($get_customer);
            $run_customer = $prepare_customer->execute(array(":customer_session" => $customer_session));
            $row_customer = $prepare_customer->fetch(PDO::FETCH_ASSOC);

            $customer_id = $row_customer['customer_id'];

            $select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

            // $run_wishlist = mysqli_query($con, $select_wishlist);

            // $check_wishlist = mysqli_num_rows($run_wishlist);

            $prepare_wishlist_select = $con->prepare($select_wishlist);
            $run_wishlist_select = $prepare_wishlist_select->execute(array());
            $check_wishlist = $prepare_wishlist_select->rowCount();

            if ($check_wishlist == 1) {

                echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";

                echo "<script>window.open('$pro_url','_self')</script>";

            } else {

                $insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

                // $run_wishlist = mysqli_query($con, $insert_wishlist);

                $prepare_wishlist = $con->prepare($insert_wishlist);
                $run_wishlist = $prepare_wishlist->execute(array());

                if ($run_wishlist) {

                    echo "<script> alert('Product Has Inserted Into Wishlist') </script>";

                    echo "<script>window.open('$pro_url','_self')</script>";

                }

            }

        }

    }

    ?>

</p><!-- text-center buttons Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- box Ends -->


<div class="row" id="thumbs" ><!-- row Starts -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->


</div><!-- row Ends -->


</div><!-- col-sm-6 Ends -->


</div><!-- row Ends -->

<div class="box" id="details"><!-- box Starts -->

<a class="btn btn-info tab" style="margin-bottom:10px;" href="#description" data-toggle="tab"><!-- btn btn-primary tab Starts -->

<?php

    if ($status == "product") {

        echo "Product Description";

    } else {

        echo "Bundle Description";

    }

    ?>

</a><!-- btn btn-primary tab Ends -->

<a class="btn btn-info tab" style="margin-bottom:10px;" href="#features" data-toggle="tab"><!-- btn btn-primary tab Starts -->

Features

</a><!-- btn btn-primary tab Ends -->

<hr style="margin-top:0px;">

<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active" style="margin-top:7px;" ><!-- description tab-pane fade in active Starts -->

<?php echo $pro_desc; ?>

</div><!-- description tab-pane fade in active Ends -->

<div id="features" class="tab-pane fade in" style="margin-top:7px;" ><!-- features tab-pane fade in  Starts -->

<?php echo $pro_features; ?>

</div><!-- features tab-pane fade in  Ends -->


</div><!-- tab-content Ends -->

</div><!-- box Ends -->

<div id="row same-height-row"><!-- row same-height-row Starts -->

<?php

    if ($status == "product") {

        ?>

</div><!-- box same-height Ends -->


<?php }?>

</div><!-- row same-height-row Ends -->

</div><!-- col-md-12 Ends -->


</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

    include "includes/footer.php";

    ?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php }?>
