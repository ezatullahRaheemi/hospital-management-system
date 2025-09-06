<?php
require("connection.php");
if(isset($_GET["mid"]))
{
    $id = $_GET["mid"];
     $medicine = "DELETE FROM medicine WHERE medicine_id = $id";
     $run_medicine = mysqli_query($conn, $medicine);
    //  if($run_medicine)
    // {   
    //     header("location:medicine_list.php?delete=done");
    // }else{
    //      header("location:medicine_list.php?error=notdelete");


    // }

}
?>