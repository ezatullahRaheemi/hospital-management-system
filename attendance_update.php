<?php
error_reporting(0);
ob_start();

 require("securt.php");
?>
<?php require_once("header.php")?>
<?php
require("connection.php");
// select data for update
$id = $_GET["sid"];
$year = $_GET["year"];
$month = $_GET["month"];
$day = $_GET["day"];
$attendance = "SELECT * FROM attendance WHERE staff_id  =$id AND absent_year = $year AND  absent_month= $month AND absent_day = $day";
$result1 = mysqli_query($conn ,$attendance);
$row_attendance = mysqli_fetch_assoc($result1);

//select data from database for drop down list
$staff = "SELECT staff_id, first_name , last_name  , position FROM staff";
$result = mysqli_query($conn,$staff);
$row_staff = mysqli_fetch_assoc($result);

// update data in attendance
if(isset($_POST["hour"]))
{
    $staff = $_POST["staff_id"];
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    $hour = $_POST["hour"];
    
    
    $attendance = "UPDATE attendance SET  absent_year = $year, absent_month = $month, absent_day = $day, sbsent_houre = $hour WHERE staff_id = $id";
    $run = mysqli_query($conn,$attendance);
    if($run)
    {
        header("location:attendance_list.php?update=done");exit;
        ob_end_flush();
    }else{
        header("location:attendance_update.php?error=noedite");exit;
        ob_end_flush();

    }

}

?>


<div class="col p-2 m-2 ">
    <form class="form offset-3 mb-5" style=" width:700px"  action="" method="POST">
        <h1 class="mt-0">Update Absent</h1>
        <?php if($_GET["error"]){?>
            <div class="alert alert-warning">
                could  not has been  Updated! pleas Try Again!
            </div>
        <?php } ?>

        <div class="input-group m-1">
                <span class="input-group-addon" >
                    Staff :
                </span>

            <select name="staff_id" id=""  class="form-control">
                <?php do{ ?>
                <option <?php if($row_staff["staff_id"] == $row_attendance["staff_id"]) echo 'selected'?> value="<?php echo $row_staff["staff_id"]?> "> <?php echo $row_staff["first_name"];?>  <?php echo $row_staff["last_name"]?> (<?php echo $row_staff["position"]  ?>)</option>
                <?php } while($row_staff = mysqli_fetch_assoc($result)) ?>
            </select>
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
                 Year :
            </span>
            <input type="text" name="year" class="form-control"
            value="<?php echo $row_attendance["absent_year"]?>">
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
                 Month :
            </span>
            <input type="text" name="month" class="form-control"
            value="<?php echo $row_attendance["absent_month"]?>">
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
             Day :
            </span>
            <input type="text" name="day" class="form-control" 
            value="<?php echo $row_attendance["absent_day"]?>">
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
                 Hour :
            </span>
            <input type="text" name="hour" class="form-control"
            value="<?php echo $row_attendance["sbsent_houre"]?>">
        </div>

        <button type="submit" class="btn btn-primary offset-3 mt-1">Edit Absent</button>
        
    </form>
</div>




<?php require_once("footer.php")?>
