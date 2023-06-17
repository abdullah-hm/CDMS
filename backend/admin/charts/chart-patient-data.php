<?php

//data.php
include_once('../../include/pdo-config.php');



	$query = "select District, count(pid) as Count from patient group by District";

	$result = $connect->query($query);

	$data = array();

	foreach($result as $row)
	{
		$data[] = array(
			'District'		=>	$row["District"],
			'Count'			=>	$row["Count"],
			'color'			=>	'#' . rand(100000, 999999) . ''
		);
	}

	echo json_encode($data);


?>