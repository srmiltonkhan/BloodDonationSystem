<?php
	include("db_connection.php");
//View Student Information
  if($_POST['action_view'] == 'donation_info_view'){
  $query = "SELECT * FROM donation
    INNER JOIN donner ON donner.donner_id = donation.donner_id
  	INNER JOIN user_details ON user_details.user_id = donation.user_id
   WHERE donation.donation_id = '".$_POST["donation_id"]."'";
  $statement = $pdo_conn->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '
  <div class="table-responsive">
   <table class="table table-boredered table-sm">
  ';
  foreach($result as $row){
    $user_image = '';
    if ($row['user_image'] !='') {        
      $user_image = '<img src = "img/user_image/'.$row["user_image"].'" class = "rounded-circle" width="30" height="30"/>';
    }else{
      $user_image = '<img src = "img/user_image/default_image.jpg" class = "rounded-circle" width="30" height="30"/>';
    }
   $output .= '
   <tr>
    <td>Donner ID</td>
    <td>'.$row["donner_id_num"].'</td>
   </tr>
   <tr>
    <td>Donner Name</td>
    <td>'.$row["donner_name"].'</td>
   </tr>
   <tr>
    <td>Blood Group</td>
    <td>'.$row["blood_group"].'</td>
   </tr>
  <tr>
    <td>Donation Patient Name</td>
    <td>'.$row["donation_patient_name"].'</td>
   </tr>
    <tr>
    <td>Mobile Number</td>
    <td>'.$row["mobile_number"].'</td>
   </tr>  
  <tr>
    <td>Email Address</td>
    <td>'.$row["email_address"].'</td>
   </tr>    
   <tr>
    <td>Registration Date</td>
    <td>'.$row["registration_date"].'</td>
   </tr> 
  <tr>
    <td>Present Address</td>
    <td>'.$row["donner_present_address"].'</td>
   </tr> 
    <tr>
    <td>Parmanent Address</td>
    <td>'.$row["donner_parmanent_address"].'</td>
   </tr> 
   <tr>
    <td>Entered By</td>
    <td>'.$row["user_name"].'&ensp;'.$user_image.'</td>
   </tr>      
   ';
  }
  $output .= '
   </table>
  </div>
  ';
  echo $output;
 }    	 			
?>