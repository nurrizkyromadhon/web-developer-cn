<?php
include '../config.php';

$project_name = $_POST['project_name'];
$client = $_POST['client'];
$project_leader_name = $_POST['project_leader_name'];
$project_leader_email = $_POST['project_leader_email'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$progress = $_POST['progress'];

//Taking the files from input
$file = $_FILES['uploadfile'];
//Getting the file name of the uploaded file
$fileName = $_FILES['uploadfile']['name'];
//Getting the Temporary file name of the uploaded file
$fileTempName = $_FILES['uploadfile']['tmp_name'];
//Getting the file size of the uploaded file
$fileSize = $_FILES['uploadfile']['size'];
//getting the no. of error in uploading the file
$fileError = $_FILES['uploadfile']['error'];
//Getting the file type of the uploaded file
$fileType = $_FILES['uploadfile']['type'];

//Getting the file ext
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

//Array of Allowed file type
$allowedExt = array("jpg", "jpeg", "png", "pdf");

//Checking, Is file extentation is in allowed extentation array
if (in_array($fileActualExt, $allowedExt)) {
    //Checking, Is there any file error
    if ($fileError == 0) {
        //Checking,The file size is bellow than the allowed file size
        if ($fileSize < 50000000) {
            //Creating a unique name for file
            $fileNemeNew = uniqid('', true) . "." . $fileActualExt;
            //File destination
            $fileDestination = './../src/images/' . $fileName;
            //function to move temp location to permanent location
            move_uploaded_file($fileTempName, $fileDestination);
            //Message after success
            echo "File Uploaded successfully";
        } else {
            //Message,If file size greater than allowed size
            echo "File Size Limit beyond acceptance";
        }
    } else {
        //Message, If there is some error
        echo "Something Went Wrong Please try again!";
    }
} else {
    //Message,If this is not a valid file type
    echo "You can't upload this extention of file";
}
$query = "INSERT INTO project_monitoring set project_name='$project_name',client='$client',project_leader_name='$project_leader_name',project_leader_email='$project_leader_email',project_leader_image='$fileName',start_date='$start_date', end_date='$end_date', progress='$progress'";
mysqli_query($koneksi, $query);
header('location:../home.php');
