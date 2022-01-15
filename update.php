<?php
include_once 'connection.php';
 $id = $_POST['regid'];
 $sql = mysqli_query($conn, "SELECT * FROM reg WHERE id = $id");
 $row = mysqli_fetch_assoc($sql);
 $output = array(
     "id" => $row['id'],
     "name" => $row['name'],
     "file1" => $row['file1'],
     "file2" => $row['file2'],
     "file3" => $row['file3']
 );
 echo json_encode($output);
?>