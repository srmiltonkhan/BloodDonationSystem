<?php 
	require_once("db_connection.php");
		// Start Date and Time in PHP 
		date_default_timezone_set('Asia/Dhaka');
		$currentDateTime=date('m/d/Y H:i:s');
		$donation_date = date("d-M-y", strtotime($currentDateTime));
		$donation_time = date("h:i A", strtotime($currentDateTime));
	if (isset($_POST['action_hidden'])) {
		//Insert Data in DB
		if ($_POST['action_hidden'] == 'Add') {
				$query = "INSERT INTO `donation`(`donner_id`,`user_id`,`donation_patient_name`,`donation_date`,`donation_time`) VALUES (:donner_id,:user_id,:donation_patient_name,:donation_date,:donation_time)";
				$statement = $pdo_conn->prepare($query);
				$statement->execute(array(
					':donner_id'=>$_POST['donner_id'],
					':user_id'=>$_SESSION['user_id'],
					':donation_patient_name'=>$_POST['donation_patient_name'],
					':donation_date'=>$donation_date,
					':donation_time'=>$donation_time
				));
				$result = $statement->fetchAll();
				if (isset($result)) {
					echo "Donation Information has been saved successfully.";
				}
			
		}
	//Fetch Data from DB in Modal
		if ($_POST['action_hidden']=='fetch_single') {
			$query = "SELECT * FROM donation WHERE donation_id = :donation_id LIMIT 1";
			$statement = $pdo_conn->prepare($query);
			$statement->execute(
				array(':donation_id' => $_POST['donation_id'])
			);
			$result = $statement->fetchAll();
			foreach ($result as $row) {
				$output['donner_id'] = $row['donner_id'];
				$output['donation_patient_name'] = $row['donation_patient_name'];	
			}
			echo json_encode($output);
		}	
	//Update Data from Database
	  if ($_POST['action_hidden'] == 'Edit') {
      $query = "UPDATE `donation` SET `donner_id`=:donner_id,`user_id`=:user_id,`donation_patient_name`=:donation_patient_name,`donation_date`=:donation_date,`donation_time`=:donation_time WHERE `donation_id`=:donation_id";
      $statement = $pdo_conn->prepare($query);
      $statement->execute(
         array(
          ':donation_id' => $_POST['donation_id'],
          ':donner_id' => $_POST['donner_id'],
          ':user_id' => $_SESSION['user_id'],
          ':donation_patient_name' => $_POST['donation_patient_name'],
          ':donation_date'=>$donation_date, 
          ':donation_time'=>$donation_time 
       ));
	      $result = $statement->fetchAll();
	      if (isset($result)) {
        	echo "Donner Information has been edited.";
      		}
    	}
	}
?>