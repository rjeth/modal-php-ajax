<?php
include_once 'connection.php';
if (isset($_POST['upload'])) {

    $uploadLocation = "uploads/";
    $file1 = $_FILES['file1']['name'];
    $file2 = $_FILES['file2']['name'];
    $file3 = $_FILES['file3']['name'];

 //   if (isset($_FILES['file1']) || isset($_FILES['file2']) || isset($_FILES['file3'])) {
        $file1size = $_FILES['file1']['size'];
        $file1tmp = $_FILES['file1']['tmp_name'];
        $uploadfile1To = $uploadLocation . $file1;
        $moveMain = move_uploaded_file($file1tmp, $uploadfile1To);

        $file2size = $_FILES['file2']['size'];
        $file2tmp = $_FILES['file2']['tmp_name'];
        $uploadfile2To = $uploadLocation . $file2;
        $moveSecond = move_uploaded_file($file2tmp, $uploadfile2To);

        $file3size = $_FILES['file3']['size'];
        $file3tmp = $_FILES['file3']['tmp_name'];
        $uploadfile3To = $uploadLocation . $file3;
        $movepdf = move_uploaded_file($file3tmp, $uploadfile3To);
   // }
        $fname = $_REQUEST['fname'];
        $sql = "INSERT INTO reg(name , file1 , file2 , file3 ) 
        VALUES('$fname','$uploadfile1To' , '$uploadfile2To' , '$uploadfile3To' )";
   
        //$new_size = $file_size1 / 1024;
    //$new_file_name = strtolower($file1 , $file2 , $file3);
    //$final_file = str_replace(' ', '-', $new_file_name);
    
    if(mysqli_query($conn, $sql)){
        echo "File sucessfully upload";
    }
    else{
        echo "Error: " . $sql . "
        " . mysqli_error($conn);
        echo "File sucessfully upload";
        echo $uploadfile1To;
    }
    mysqli_close($conn);
}
