<?php
header('Content-Type: application/json');

session_cache_limiter('private_no_expire');
session_start();

$dbConnection = mysqli_connect("localhost", "root", "", "file_storage");
$User = $_POST['User'];
$Password = $_POST['Password'];
$querySelector = "SELECT * FROM users WHERE USER_ID = '$User' AND PASSWORD = '$Password'";

if(empty($User) || empty($Password)){
    echo json_encode('<p>You must fill all the fields!</p>');
    exit();
}elseif(mysqli_num_rows(mysqli_query($dbConnection, $querySelector)) != 1 ){
    echo json_encode('<p>User or password is incorrect!</p>');
    exit();
}else{
    $_SESSION['user'] = $User;
    
}
?>