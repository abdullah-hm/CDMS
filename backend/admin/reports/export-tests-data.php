<?php

include_once('../../include/config.php');
 
// Fetch records from database
$query = mysqli_query($con, "select testrecord.id,testrecord.OrderNumber,patient.FullName,patient.MobileNo,testrecord.TestType,testrecord.TestTimeSlot,testrecord.RegistrationDate,testrecord.id as testid from testrecord
join patient on patient.MobileNo=testrecord.PatientMobileNumber
    ");
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "tests-data-" . date('d-m-Y')  . ".csv";
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'Order Number', 'Full Name', 'Mobile No', 'Test Type', 'Test Time Slot');
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['OrderNumber'], $row['FullName'],$row['MobileNo'], $row['TestType'], $row['TestTimeSlot']);
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