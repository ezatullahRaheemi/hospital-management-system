<?php
require("connection.php");
$id = $_GET["sid"];
$year = $_GET["year"];
$month = $_GET["month"];
$day = $_GET["day"];
$sql ="DELETE FROM attendance WHERE staff_id = $id AND absent_year =$year AND absent_month = $month AND absent_day=$day";
$result = mysqli_query($conn , $sql);
if($result)
{
    header("location:attendance_list.php?delete=done");
}else{
    header("location:attendance_list.php?error=notdelete");

}


?>