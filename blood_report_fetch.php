<?php
//blood_report_fetch.php
include('db_connection.php');
$column = array('donation.donation_id, donner.donner_id_num, donner.donner_name, donner.mobile_number, donner.blood_group,donation.donation_patient_name,donner.department_name, donation.donation_date,user_details.user_name');
$query = "SELECT * FROM donation INNER JOIN donner ON donner.donner_id = donation.donner_id INNER JOIN user_details ON user_details.user_id = donation.user_id";
if(isset($_POST['search']['value'])){
 $query .= '
 WHERE donation.donation_id LIKE "%'.$_POST["search"]["value"].'%"  
 OR donner.donner_id_num LIKE "%'.$_POST["search"]["value"].'%"  
 OR donner.donner_name LIKE "%'.$_POST["search"]["value"].'%"  
 OR donner.blood_group LIKE "%'.$_POST["search"]["value"].'%"  
 OR donation.donation_patient_name LIKE "%'.$_POST["search"]["value"].'%"  
 OR donation.donation_date LIKE "%'.$_POST["search"]["value"].'%"  
 OR user_details.user_name LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}
if(isset($_POST['order'])){
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else{
 $query .= 'ORDER BY donation.donation_id DESC';
}
$query1 = '';
if($_POST['length'] != -1){
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $pdo_conn->prepare($query);
$statement->execute();
$number_filter_row = $statement->rowCount();
$statement = $pdo_conn->prepare($query . $query1);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach($result as $row){
 $sub_array = array();
 $sub_array[] = $row['donation_id'];
 $sub_array[] = $row['donner_id_num'];
 $sub_array[] = $row['donner_name'];
 $sub_array[] = $row['mobile_number'];
 $sub_array[] = $row['blood_group'];
 $sub_array[] = $row['department_name'];
 $sub_array[] = $row['donation_patient_name'];
 $sub_array[] = $row['donation_date'].':<span class="ml-1">'.$row['donation_time'].'</span>';
 $sub_array[] = $row['user_name'];
 $sub_array[] = '<div class="text-center"><button type="button" name="view" id="'.$row["donation_id"].'" class="btn btn-info btn-sm view mr-2"><i class="fas fa-eye"></i></button>'.'<button type="button" name="update" id="'.$row["donation_id"].'" class="btn btn-primary btn-sm update mr-2"><i class="fas fa-edit"></i></button></div>';
 $data[] = $sub_array;
}
function count_all_data($pdo_conn){
 $query = "SELECT * FROM donation";
 $statement = $pdo_conn->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}
$output = array(
 'draw'    => intval($_POST['draw']),
 'recordsTotal'  => count_all_data($pdo_conn),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data
);
echo json_encode($output);
?>