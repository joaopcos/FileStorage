<?php
header('Content-Type: application/json');

error_reporting(0);
session_cache_limiter('private_no_expire');
session_start();

$responseArray['status'] = null;
$dbConnection = mysqli_connect("localhost", "root", "", "file_storage");
$User = mysqli_real_escape_string($dbConnection, trim($_POST['User']));
$Password = mysqli_real_escape_string($dbConnection, trim(md5($_POST['Password'])));
$querySelector = "SELECT * FROM users WHERE USER_ID = '$User' AND PASSWORD = '$Password'";

if(empty($User) || empty($Password)){
    $responseArray['status'] = 'empty_fields';
    echo json_encode ($responseArray);
    exit();
}elseif(mysqli_num_rows(mysqli_query($dbConnection, $querySelector)) != 1 ){
    $responseArray['status'] = 'user_or_password_incorrect';
    echo json_encode ($responseArray);
    exit();
}else{
    $_SESSION['user'] = $User;
    $responseArray['status'] = 'success';
    echo json_encode ($responseArray);
}