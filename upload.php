<?php
include_once('config.php');

function uploadFile(){
    if(isset($_FILES['file'])){
        $filePath = "files/";
        $fileName = $_FILES['file']['name'];
        $fileTemp = $_FILES['file']['tmp_name'];
        $fileError = $_FILES['file']['error'];
        $GLOBALS['fileNewName'] = uniqid()."_".$fileName;

        if(move_uploaded_file($fileTemp, $filePath.$GLOBALS['fileNewName'])){
            echo json_encode ([
                'status' => 'success',
                'message' => 'Upload task success!'
            ]);
        }else{
            echo json_encode([
                'status' => 'error',
                'message' => 'Upload task error!'
            ]);
        }
    }else{
       echo json_encode([
           'status' => 'error',
           'message' => 'You must select a file to upload!'
       ]);
    }
}

uploadFile();