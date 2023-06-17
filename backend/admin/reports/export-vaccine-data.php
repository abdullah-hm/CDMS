<?php

include_once('../../include/config.php');
 
// Fetch records from database
$query = mysqli_query($con, "select * from vaccinetype");
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "vaccine-data-" . date('d-m-Y') . ".csv";
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'Vaccine Name', 'Country', 'Status', 'Registered DateTime');
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['VacName'], $row['Country'],$row['Status'], $row['RegDate']);
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