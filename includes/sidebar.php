<?php
$aMan = array();

$aPCat = array();

$aCat = array();

/// Products Categories Code Starts ///

if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {

    foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {

        if ((int) $sVal != 0) {

            $aPCat[(int) $sVal] = (int) $sVal;

        }

    }

}

/// Products Categories Code Ends ///

?>

<div class="npanel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

<div class="npanel-heading"><!-- npanel-heading Starts -->

<h3 class="npanel-title"><!-- npanel-title Starts -->

Products Categories

<div class="pull-right"><!-- pull-right Starts -->

</div><!-- pull-right Ends -->

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="npanel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->

<div class="npanel-body"><!-- npanel-body Starts -->

<div class="input-group"><!-- input-group Starts -->

<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Filter Product Categories">

<a class="input-group-addon"> <i class="fa fa-search"></i> </a>

</div><!-- input-group Ends -->

</div><!-- npanel-body Ends -->

<div class="npanel-body"><!-- npanel-body scroll-menu Starts -->

<ul class="navi category-menu" id="dev-p-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->

<?php

$get_p_cats = "select * from product_categories";

$run_p_cats = mysqli_query($con, $get_p_cats);

while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

    $p_cat_id = $row_p_cats['p_cat_id'];

    $p_cat_title = $row_p_cats['p_cat_title'];

    $p_cat_image = $row_p_cats['p_cat_image'];

    if ($p_cat_image == "") {

    } else {

        $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20'> &nbsp;";

    }

    echo "

<li>

<a>
<label class='container'>

<input ";

    if (isset($aPCat[$p_cat_id])) {echo "checked='checked'";}

    echo "  type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat' >

<span class='checkmark' style='font-weight:bold; pointer-events:none;'>

$p_cat_image
$p_cat_title

</span>
</label>

</a>

</li>

";

}

?>

</ul><!-- nav nav-pills nav-stacked category-menu Ends -->

</div><!-- panel-body scroll-menu Ends -->

</div><!-- panel-collapse collapse-data Ends -->

</div><!--- panel panel-default sidebar-menu Ends -->
