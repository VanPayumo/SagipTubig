<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    $admin_level = $_SESSION['admin_level'];

    if ($admin_level == 2) {
        $hideme = 'display:none;';
    } else {
        $hideme = '';
    }

    ?>

<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" >Admin Panel</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>

<?php echo $admin_name; ?> <b class="caret" ></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

<li><!-- li Starts -->

<a href="index.php?user_profile=<?php echo $admin_id; ?>" >

<i class="fa fa-fw fa-user" ></i> Profile


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_products" >

<i class="fa fa-fw fa-envelope" ></i> Products

<span class="badge" ><?php echo $count_products; ?></span>


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_customers" >

<i class="fa fa-fw fa-gear" ></i> Customers

<span class="badge" ><?php echo $count_customers; ?></span>


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_p_cats" >

<i class="fa fa-fw fa-gear" ></i> Product Categories

<span class="badge" ><?php echo $count_p_categories; ?></span>


</a>

</li><!-- li Ends -->

<li class="divider"></li>

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"> </i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a style="<?php echo $hideme; ?>" href="index.php?edit_logo_title">

<i class="fa fa-fw fa-globe"></i> Edit Logo/Title

</a>

</li><!-- li Ends -->

<li><!-- Products li Starts -->

<a href="#" data-toggle="collapse" data-target="#products">

<i class="fa fa-fw fa-table"></i> Products

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="products" class="collapse">

<li style="<?php echo $hideme; ?>">
<a href="index.php?insert_product"> Insert Products </a>
</li>

<li>
<a href="index.php?view_products"> View Products </a>
</li>


</ul>

</li><!-- Products li Ends -->

<li><!-- Bundles Li Starts --->

<a href="#" data-toggle="collapse" data-target="#bundles">

<i class="fa fa-fw fa-edit"></i> Bundles

<i class="fa fa-fw fa-caret-down"></i>

</a>

<ul id="bundles" class="collapse">

<li style="<?php echo $hideme; ?>">
<a href="index.php?insert_bundle"> Insert Bundle </a>
</li>

<li>
<a href="index.php?view_bundles"> View Bundles </a>
</li>

</ul>

</li><!-- Bundles Li Ends --->


<li><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#p_cat">

<i class="fa fa-fw fa-pencil"></i> Products Categories

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="p_cat" class="collapse">

<li style="<?php echo $hideme; ?>">
<a href="index.php?insert_p_cat"> Insert Product Category </a>
</li>

<li>
<a href="index.php?view_p_cats"> View Products Categories </a>
</li>


</ul>

</li><!-- li Ends -->


<li style="<?php echo $hideme; ?>"><!-- about us li Starts -->

<a href="index.php?edit_about_us">

<i class="fa fa-fw fa-edit"></i> Edit About Us Page

</a>

</li><!-- about us li Ends -->


<li style="<?php echo $hideme; ?>"><!-- Coupons Section li Starts -->

<a href="#" data-toggle="collapse" data-target="#coupons"><!-- anchor Starts -->

<i class="fa fa-fw fa-arrows-v"></i> Coupons

<i class="fa fa-fw fa-caret-down"></i>

</a><!-- anchor Ends -->

<ul id="coupons" class="collapse"><!-- ul collapse Starts -->

<li>
<a href="index.php?insert_coupon"> Insert Coupon </a>
</li>

<li>
<a href="index.php?view_coupons"> View Coupons </a>
</li>

</ul><!-- ul collapse Ends -->

</li><!-- Coupons Section li Ends -->



<li style="<?php echo $hideme; ?>"><!-- terms li Starts -->

<a href="#" data-toggle="collapse" data-target="#terms" ><!-- anchor Starts -->

<i class="fa fa-fw fa-table"></i> Terms

<i class="fa fa-fw fa-caret-down"></i>

</a><!-- anchor Ends -->

<ul id="terms" class="collapse"><!-- ul collapse Starts -->

<li>
<a href="index.php?insert_term"> Insert Terms </a>
</li>

<li>
<a href="index.php?view_terms"> View Terms </a>
</li>

</ul><!-- ul collapse Ends -->


</li><!-- terms li Ends -->


<li style="<?php echo $hideme; ?>"><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#customer">

<i class="fa fa-fw fa-user"></i> Customers

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="customer" class="collapse">

<li>
<a href="index.php?view_customers">View Customers</a>
</li>

<li>
<a href="index.php?customer_history"> Customer Log History </a>
</li>


</ul>

</li><!-- li Ends -->

<li>

<a href="index.php?view_orders">

<i class="fa fa-fw fa-list"></i> View Orders

</a>

</li>

<li><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#pay">

<i class="fa fa-fw fa-pencil"></i> View Payments

<i class="fa fa-fw fa-caret-down"></i>

</a>

<ul id="pay" class="collapse">

<li>
<a href="index.php?view_payments"> View All Payments</a>
</li>

<li>
<a href="index.php?view_payments_day"> View Payments (Day) </a>
</li>

<li>
    <a href="index.php?view_payments_week"> View Payments (Week) </a>
</li>

<li>
    <a href="index.php?view_payments_month"> View Payments (Month) </a>
</li>

<li>
<a href="index.php?view_payments_year"> View Payments (Year) </a>
</li>


</ul>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#users">

<i class="fa fa-fw fa-gear"></i> User

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="users" class="collapse">

<li style="<?php echo $hideme; ?>">
<a href="index.php?insert_user"> Insert User </a>
</li>

<li style="<?php echo $hideme; ?>">
<a href="index.php?view_users"> View Users </a>
</li>

<li>
<a href="index.php?user_history"> User Log History </a>
</li>

<li>
<a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit Profile </a>
</li>

</ul>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php }?>