<?php
require_once ('config.php');

function execute($sql) {
	//save data into table
	// open connnection to database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	mysqli_query($conn, $sql);

	//close connnection
	mysqli_close($conn);
}

function executeResult($sql) {
	//save data into table
	// open connnection to database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result, 1)) {
            $data[] = $row;
    }

	//close connnection
	mysqli_close($conn);

	return $data;
}

function executeSingleResult($sql) {
	//save data into table
	// open connnection to database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($conn, $sql);
	$row    = mysqli_fetch_array($result, 1);

	//close connnection
	mysqli_close($conn);

	return $row;
}