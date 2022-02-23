<?php 
function fill_donner_id_list($pdo_conn){
	 $query = "SELECT * FROM donner ORDER BY donner_id_num ASC";
	 $statement = $pdo_conn->prepare($query);
	 $statement->execute();
	 $result = $statement->fetchAll();
	 $output = '';
	 foreach($result as $row){
	  $output .= '<option value="'.$row["donner_id"].'">'.$row["donner_id_num"].'</option>';
	 }
	 return $output;
}
?>