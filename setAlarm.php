<?php
ini_set('display_errors', 1);

require_once 'config/db_connect.php';

$headers = apache_request_headers();

$postData = file_get_contents("php://input");

$request = json_decode($postData);

if (isset($postData) && !empty($postData)) {
  $alarm = mysqli_real_escape_string($conn, trim($request->alarm));

  $sql = "UPDATE `tbl_time` SET `alarm_status` = $alarm WHERE `time_id` = 1";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    echo json_encode(array(
      'time_id' => 1,
      'alarm_status' => $alarm,
      'msg' => 'success'
    ), JSON_UNESCAPED_UNICODE);
    http_response_code(200);
  } else {
    echo json_encode(array('msg' => 'error'), JSON_UNESCAPED_UNICODE);
    http_response_code(501);
  }
}
