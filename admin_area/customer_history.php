<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>


<div class="row"><!--  1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard"></i> Dashboard / View Customers

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Customer Log History

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>E-Mail</th>
<th>Date & Time</th>
<th>Action</th>



</tr>

</thead>

<tbody><!--- tbody Starts --->

<?php

    $get_logs = "select * from customer_log_history";

    $run_logs = mysqli_query($con, $get_logs);

    $i = 0;

    while ($row_logs = mysqli_fetch_array($run_logs)) {

        $c_email = $row_logs['c_email'];

        $log_date = $row_logs['log_time'];

        $c_action = $row_logs['activity'];

        ?>

<tr><!-- tr Starts -->



<th><?php echo $c_email ?></th>

<td><?php echo $log_date ?></td>

<td><b style='color:green;'><?php echo $c_action ?></b></td>

</tr><!-- tr Ends -->

<?php }?>

</tbody><!--- tbody Ends --->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->




<?php }?>