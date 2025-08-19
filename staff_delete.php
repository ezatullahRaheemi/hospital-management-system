<?php
require("securt.php");
require("connection.php");
$id = $_GET["sid"];
$sql ="DELETE FROM staff WHERE staff_id = $id";
$result = mysqli_query($conn , $sql);
if($result)
{
    header("location:staff_list.php?delete=done");
}else{
    header("location:staff_list.php?error=notdelete");

}


?>