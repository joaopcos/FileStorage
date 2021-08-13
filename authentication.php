<?php
header('Content-Type: application/json');

include_once('config.php');

error_reporting(0);
session_start();

switch($_GET['function']){
    case 'login':
        $User = mysqli_real_escape_string($dbConnection, trim($_POST['User']));
        $Password = mysqli_real_escape_string($dbConnection, trim(md5($_POST['Password'])));
        $querySelector = "SELECT * FROM users WHERE USER_ID = '$User' AND PASSWORD = '$Password'";
        $responseArray['status'] = null;

        if(empty($User) || empty($Password)){
            $responseArray['status'] = 'empty_fields';
            echo json_encode ($responseArray);
            exit();
        }elseif(mysqli_num_rows(mysqli_query($dbConnection, $querySelector)) != 1 ){
            $responseArray['status'] = 'user_or_password_incorrect';
            echo json_encode ($responseArray);
            exit();
        }else{
            $_SESSION['User'] = $User;
            $responseArray['status'] = 'success';
            echo json_encode ($responseArray);
        }
        break;
    case 'logout':
        session_start();
        session_destroy();
        header('Location: index.php');
        break;
}
