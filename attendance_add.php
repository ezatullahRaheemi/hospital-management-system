<?php require("securt.php")?>
<?php require_once("header.php")?>
<?php
require("connection.php");
$sql = "SELECT staff_id, first_name , last_name  , position FROM staff";
$result = mysqli_query($conn,$sql);
$row_staff = mysqli_fetch_assoc($result);



?>


<div class="col p-2 m-2 ">
    <form class="form offset-3 mb-5" style=" width:700px" action=""method>
        <h1 class="mt-0">Add Absent</h1>

        <div class="input-group m-1">
                <span class="input-group-addon" >
                    Staff :
                </span>

            <select name="staff_id" id="" class="form-control">
                <?php do{ ?>
                <option value="<?php echo $row_staff["staff_id"]?> "> <?php echo $row_staff["first_name"];?> </option>
                <?php } while($row_staff = mysqli_fetch_assoc($result)) ?>
            </select>

        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
                 Year :
            </span>
            <input type="text" class="form-control">
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
                 Month :
            </span>
            <input type="text" class="form-control">
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
             Day :
            </span>
            <input type="text" class="form-control">
        </div>

        <div class="input-group m-1">
            <span class="input-group-addon">
                 Hour :
            </span>
            <input type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary offset-3 mt-1">Add Absent</button>
        
    </form>
</div>




<?php require_once("footer.php")?>
