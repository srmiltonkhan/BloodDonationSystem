<?php 
	require_once("db_connection.php");
		// Start Date and Time in PHP 
		date_default_timezone_set('Asia/Dhaka');
		$currentDateTime=date('m/d/Y H:i:s');
		$registration_date = date("h:i A. d-M-y", strtotime($currentDateTime));
	if (isset($_POST['action_hidden'])) {
		//Insert Data in DB
		if ($_POST['action_hidden'] == 'Add') {
			$donner_id_num = $_POST['donner_id_num'];
			$mobile_number = $_POST['mobile_number'];
			$finder_query = "SELECT * FROM donner WHERE donner_id_num = '$donner_id_num' OR mobile_number = '$mobile_number'";
			$statement = $pdo_conn->prepare($finder_query);
			$statement->execute();
			$row_count = $statement->fetch();
			if ($row_count > 0) {
				echo "Student ID "."<span class = 'badge badge-warning'>".$_POST['donner_id_num']."</span>"." and "."<span class='badge badge-warning'>".$_POST['mobile_number']."</span>"." already exist.";	
			}else{
				$query = "INSERT INTO `donner`(`user_id`, `donner_id_num`, `donner_name`, `mobile_number`, `email_address`, `blood_group`, `department_name`, `registration_date`, `donner_present_address`, `donner_parmanent_address`) VALUES (:user_id,:donner_id_num,:donner_name,:mobile_number,:email_address,:blood_group,:department_name,:registration_date,:donner_present_address,:donner_parmanent_address)";
				$statement = $pdo_conn->prepare($query);
				$statement->execute(array(
					':user_id' => $_SESSION["user_id"],
					':donner_id_num'=>$_POST['donner_id_num'],
					':donner_name'=>$_POST['donner_name'],
					':mobile_number'=>$_POST['mobile_number'],
					':email_address'=>$_POST['email_address'],
					':blood_group'=>$_POST['blood_group'],
					':department_name'=>$_POST['department_name'],
					':registration_date'=>$registration_date,
					':donner_present_address'=>$_POST['donner_present_address'],
					':donner_parmanent_address'=>$_POST['donner_parmanent_address']
				));
				$result = $statement->fetchAll();
				if (isset($result)) {
					echo "Donner Information has been saved successfully.";
				}
			}
		}
		//Fetch Data from DB in Modal
		if ($_POST['action_hidden']=='fetch_single') {
			$query = "SELECT * FROM donner WHERE donner_id = :donner_id LIMIT 1";
			$statement = $pdo_conn->prepare($query);
			$statement->execute(
				array(':donner_id' => $_POST['donner_id'])
			);
			$result = $statement->fetchAll();
			foreach ($result as $row) {
				$output['donner_id_num'] = $row['donner_id_num'];
				$output['donner_name'] = $row['donner_name'];
				$output['mobile_number'] = $row['mobile_number'];
				$output['email_address'] = $row['email_address'];
				$output['blood_group'] = $row['blood_group'];
				$output['department_name'] = $row['department_name'];
				$output['donner_present_address'] = $row['donner_present_address'];
				$output['donner_parmanent_address'] = $row['donner_parmanent_address'];
			}
			echo json_encode($output);
		}
	//Update Data from Database
      if ($_POST['action_hidden'] == 'Edit') {
      $query = "UPDATE donner SET user_id=:user_id, donner_id_num = :donner_id_num,donner_name = :donner_name, mobile_number = :mobile_number,email_address=:email_address,blood_group = :blood_group,department_name = :department_name,registration_date =:registration_date, donner_present_address = :donner_present_address,donner_parmanent_address=:donner_parmanent_address  WHERE donner_id = :donner_id";
      $statement = $pdo_conn->prepare($query);
      $statement->execute(
         array(
          ':donner_id' => $_POST['donner_id'],
          ':user_id' => $_SESSION['user_id'],
          ':donner_id_num' => $_POST['donner_id_num'],
          ':donner_name'=>$_POST['donner_name'] , 
          ':mobile_number'=>$_POST['mobile_number'],  
          ':email_address'=>$_POST['email_address'], 
          ':blood_group'=>$_POST['blood_group'], 
          ':department_name'=>$_POST['department_name'], 
          ':registration_date'=>$registration_date,
          ':donner_present_address'=>$_POST['donner_present_address'], 
          ':donner_parmanent_address'=>$_POST['donner_parmanent_address'] 
       ));
	      $result = $statement->fetchAll();
	      if (isset($result)) {
        	echo "Donner Information has been edited.";
      		}
    	}			
	}
	?>