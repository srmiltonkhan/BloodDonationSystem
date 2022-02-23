<?php
include_once("db_connection.php");
if($_REQUEST['donner_id']) {
	$query = "SELECT donner_name FROM donner WHERE donner_id='".$_REQUEST['donner_id']."'";
	$statement = $pdo_conn->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$data = array();
	foreach($result as $rows) {
		$data = $rows;
	}
	echo json_encode($data);
} else {
	echo 0;	
}
?>