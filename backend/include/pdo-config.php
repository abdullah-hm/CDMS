<?php
//time zone
date_default_timezone_set('Asia/Colombo');
//database connection

$host     = "localhost";//Ip of database, in this case my host machine
$user     = "root";	//Username to use
$pass     = "";   //Password for that user
$dbname   = "zonecare_db";//Name of the database



try {
    $connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
    echo $e->getMessage();
}

?>