
<center><!-- center Starts -->

<h1> Log History </h1>

<!-- <p class="lead"> Audit Trail </p> -->

<p class="text-muted" >

A table containing all the times you've logged in.


</p>


</center><!-- center Ends -->

<hr>

<div class="table-responsive" ><!-- table-responsive Starts -->

<table  class="table table-bordered table-hover" ><!-- table table-bordered table-hover Starts -->

<thead><!-- thead Starts -->

<tr>

<th>E-Mail</th>
<th>Date & Time</th>
<th>Action</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!--- tbody Starts --->

<?php

$customer_id = $_SESSION['customer_id'];

$customer_session = $_SESSION['customer_email'];

$get_logs = "select * from customer_log_history where cid='$customer_id'";

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


</table><!-- table table-bordered table-hover Ends -->

</div><!-- table-responsive Ends -->



