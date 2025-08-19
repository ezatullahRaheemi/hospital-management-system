<?php
require("connection.php");
$id = $_GET["patient_id"];
$sql ="DELETE FROM patient WHERE patient_id = $id";
$result = mysqli_query($conn , $sql);
if($result)
{
    header("location:patient_list.php?delete=done");
}else{
    header("location:patient_list.php?error=notdelete");

}


?>