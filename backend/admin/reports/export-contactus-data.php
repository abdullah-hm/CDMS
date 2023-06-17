<?php

include_once('../../include/config.php');
 
// Fetch records from database
$query = mysqli_query($con, "select * from contactus");
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "contactus-data-" . date('d-m-Y') . ".csv";
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'Full Name', 'Mobile No', 'Message', 'Status', 'Received DateTime');
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['fname'], $row['contactno'],$row['message'], $row['status'], $row['receiveddate']);
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>