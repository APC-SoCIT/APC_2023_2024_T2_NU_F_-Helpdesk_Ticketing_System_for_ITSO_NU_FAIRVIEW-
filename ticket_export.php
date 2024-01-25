<?php

include('dbcon.php');



$result = mysqli_query($connection, "SELECT * FROM tickets ORDER BY id ASC");

if ($result->num_rows > 0) {
    $delimiter = ",";
    $filename = "ticket_report" . date('Y-m-d') . ".csv";

    $f = fopen('php://memory', 'w');

    $fields = array('ID', 'Date Created', 'Customer Id', 'Subject', 'Description', 'Status');
    fputcsv($f, $fields, $delimiter);

    while ($row = mysqli_fetch_assoc($result)) {
        $lineData = array($row['id'], $row['date_created'], $row['customer_id'], $row['subject'], $row['description'], $row['status']);
        fputcsv($f, $lineData, $delimiter);
    }

    fseek($f, 0);

    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    fpassthru($f);
    exit;
} else {
    echo "No data to export.";
}

?>
