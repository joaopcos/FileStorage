<?php
error_reporting('0');
switch($_GET['function']){
    case 'get-files':
        $fileDirectory = "files/";
        $fileArray = array_slice(scandir("$fileDirectory"), 3);
        $fileSizeArray = array();

        foreach($fileArray as $File){
            $fileSizeArray[$File] = filesize($fileDirectory.$File);
        }

        foreach($fileSizeArray as $File => $fileSize){
                $filesResponseArray[] = array(
                    'fileName' => $File,
                    'fileSize' => $fileSize
                );
        }

        echo json_encode($filesResponseArray);
        break;
    case 'remove':
        echo json_encode([
            'status' => 'success'
        ]);
        unlink('files/'.$_POST['fileToRemove']);
        break;
}
