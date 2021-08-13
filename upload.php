<?php
include_once('config.php');

function uploadFile(){
    if(isset($_FILES['archive'])){
        $filePath = "archives/";
        $fileName = $_FILES['archive']['name'];
        $fileTemp = $_FILES['archive']['tmp_name'];
        $GLOBALS['fileNewName'] = uniqid()."_".$fileName;

        if(move_uploaded_file($fileTemp, $filePath.$GLOBALS['fileNewName'])){
            echo 'Upload task success!';
        }else{
            echo 'Upload task error!';
        }
    }else{
       echo 'You must select a file to upload!';
    }
}

uploadFile();