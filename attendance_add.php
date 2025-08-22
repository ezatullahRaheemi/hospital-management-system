<?php
error_reporting(0);
ob_start();

 require("securt.php");
?>
<?php require_once("header.php")?>
<?php
require("connection.php");
//select data from database for drop down list
$sql = "SELECT staff_id, first_name , last_name  , position FROM staff";
$result = mysqli_query($conn,$sql);
$row_staff = mysqli_fetch_assoc($result);

// insert data in attendance
if(isset($_POST["hour"]))
{
    $staff = $_POST["staff_id"];
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    $hour = $_POST["hour"];
    
    
    $attendance = "INSERT INTO attendance VALUES($staff,$year,$month,$day,$hour)";
    $run = mysqli_query($conn,$attendance);
    if($run)
    {
        header("location:attendance_list.php?add=done");exit;
        ob_end_flush();
    }else{
        header("location:attendance_add.php?error=notadd");exit;
        ob_end_flush();

    }

}

?>


<div class="col p-2 m-2 ">
    <form class="form offset-3 mb-5" style=" width:700px"  action="" method="POST">
        <h1 class="mt-0">Add Absent</h1>
        <?php if($_GET["error"]){?>
            <div class="alert alert-warning">
                could has been not Added! pleas Try Again!
            </div>
        <?php } ?>

        <div class="input-group m-1">
                <span class="input-group-addon" >
                    Staff :
                </span>

            <select name="staff_id" id="" class="form-control">
                <?php do{ ?>
                <option value="<?php echo $row_staff["staff_id"]?> "> <?php echo $row_staff["first_name"];?>  <?php echo $row_staff["last_name"]?> (<?php echo $row_staff["position"]  ?>)</option>
                <?php } while($row_staff = mysqli_fetch_assoc($result)) ?>
            </select>
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
                 Year :
            </span>
            <input type="text" name="year" class="form-control">
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
                 Month :
            </span>
            <input type="text" name="month" class="form-control">
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
             Day :
            </span>
            <input type="text" name="day" class="form-control">
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
                 Hour :
            </span>
            <input type="text" name="hour" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary offset-3 mt-1">Add Absent</button>
        
    </form>
</div>




<?php require_once("footer.php")?>
