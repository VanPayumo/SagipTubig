<?php
// Export all payments
if (isset($_POST["export_orders"])) {

    $connect = mysqli_connect("localhost", "root", "", "sagiptubig");
    header('Content-TypeL text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=all_orders.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('order_id', 'customer_id', 'amount', 'invoice_no', 'quantity', 'size', 'order_date', 'order_status'));
    $query = "select * from customer_orders";
    $result = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    fclose($output);
}
