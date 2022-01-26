<?php
// Export all payments
if (isset($_POST["export_weekly_payments"])) {

    $connect = mysqli_connect("localhost", "root", "", "sagiptubig");
    header('Content-TypeL text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=weekly_payments.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('order_id', 'payment_id', 'invoice_no', 'amount', 'payment_mode', 'payment_date', 'status'));
    $query = "select * from payments where status='Paid' and WEEKOFYEAR(payment_date) = WEEKOFYEAR(NOW())";
    $result = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    fclose($output);
}
