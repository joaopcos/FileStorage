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

        if(empty($User) || empty($Password)){
            echo json_encode ([
                'status' => 'error',
                'message' => 'You must fill all the fields!'
            ]);
            exit();
        }elseif(mysqli_num_rows(mysqli_query($dbConnection, $querySelector)) != 1 ){
            echo json_encode ([
                'status' => 'error',
                'message' => 'Incorrect username or password!'
            ]);
            exit();
        }else{
            $_SESSION['User'] = $User;
            echo json_encode ([
                'status' => 'success'
            ]);
            
        }
        break;
    case 'logout':
        session_start();
        session_destroy();
        header('Location: index.php');
        break;
}
