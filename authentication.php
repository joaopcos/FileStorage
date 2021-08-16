<?php
header('Content-Type: application/json');

session_start();

switch($_GET['function']){
    case 'login':
        $User = 'admin';
        $Password = md5('123');
    
        if(empty($_POST['User']) || empty(md5($_POST['Password']))){
            echo json_encode ([
                'status' => 'error',
                'message' => 'You must fill all the fields!'
            ]);
            exit();
        }elseif($_POST['User'] != $User || md5($_POST['Password']) != $Password){
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
