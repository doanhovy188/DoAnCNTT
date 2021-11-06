<?php
require_once ('connection.php');

function execute($sql) {
	//save data into table
	// open connection to database
	if(isset($conn)){
        //insert, update, delete
        mysqli_query($conn, $sql);
    }
	//close connection
	//mysqli_close($con);
}

function executeResult($sql) {
	//save data into table
	// open connection to database
	//$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if(isset($conn)){
        //insert, update, delete
        $result = mysqli_query($conn, $sql);
        $data   = [];
        while ($row = mysqli_fetch_array($result, 1)) {
            $data[] = $row;
            return $data;
        }
	//close connection
	//mysqli_close($con);
    }else echo "Error executing";
}

function executeSingleResult($sql) {
	//save data into table
	// open connection to database
	//$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
    if(isset($conn)) {
        $result = mysqli_query($conn, $sql);
        $row    = mysqli_fetch_array($result, 1);
    
        //close connection
        //mysqli_close($con);
        return $row;
    }
}