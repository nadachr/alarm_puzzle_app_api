<?php 
ini_set('display_errors', 1);

		
require_once 'config/db_connect.php';
$headers = apache_request_headers();

$sql = "SELECT * FROM tbl_time WHERE time_id = '1'";
$result = mysqli_query($conn, $sql);

if($result->num_rows > 0){
  $row = $result->fetch_assoc();
  // echo $row['time_set'];
  echo json_encode(array('time'=>$row['time_set'], 'alarm'=>$row['alarm_status']), JSON_UNESCAPED_UNICODE);
  http_response_code(200);
} else echo json_encode(array('msg'=>'null'), JSON_UNESCAPED_UNICODE);
?>