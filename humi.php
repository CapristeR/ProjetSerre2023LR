<?php
	// Define MySQL connection data
	$MYSQL['host'] = "localhost";
	$MYSQL['user'] = "id20161381_lj";
	$MYSQL['password'] = "LJserre2023$";
	$MYSQL['database'] = "id20161381_serre2023lr";

	// Connect to MySQL database
	$mysqli = mysqli_connect($MYSQL['host'],$MYSQL['user'],$MYSQL['password'],$MYSQL['database']);

	// Make SQL request
	$result = $mysqli->query("SELECT humidity FROM Mesures ORDER BY humidity ASC");

	// Loop through the result and populate an array
	$valeurs = Array();
    while ($valeurs[] = $result->fetch_assoc()){}
    array_pop($valeurs);

	// Return the result and close MySQL connection
    $mysqli->close();
    header('Content-type: application/json');

	echo json_encode($valeurs);
?>
