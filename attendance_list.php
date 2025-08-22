<?php require("securt.php")?>
<?php 
error_reporting(0);
require_once("header.php");?>
<?php
require("connection.php");
$sql =" SELECT staff.staff_id,first_name,last_name,position,absent_year,absent_month,absent_day,sbsent_houre FROM staff INNER JOIN attendance on staff.staff_id = attendance.staff_id";
$run_attendance = mysqli_query($conn , $sql);
$row_attendance = mysqli_fetch_assoc($run_attendance);


?>

<div class=" pt-2 p-2 ">
    <table class="table table-striped ">
       
    <h1 class="m-0 ms-3">Staff Attendance</h1>
   
    <a href="attendance_add.php" class="btn btn-info offset-11 p-1 mb-2 mt-0"> <span class="fa fa-plus"></span> Add Absent</a>
    <a href="attendance_add.php" class="btn btn-info offset-11 p-1 mb-2 mt-0"> <span class="fa fa-print"></span> Print</a>
   <div class="row justify-content-between">
       <form class="">
       <div class="col-3  input-group">

            <input type="search" class="form-control">
            <span class="">
            <a href="" class="btn btn-primary"> <span class="fa fa-search"></span> Search</a> 
            </span>
            </div>

          
                

                <div class="col-3 input-group ">
                    <span class="input-group-addon">
                        Month :
                    </span>
                    <select style="width:200px;" name="" id="" class=" form-control">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>

                    
                <div>

                <div class="input-group" >
                    <span class="input-group-addon">
                        Year :
                    </span>
                    <input type="text" class="form-control" >
                </div>
       </form>
    </div>
    
    <?php if($_GET["add"]){?>
            <div class="alert alert-success">
               <h4>could has been staff Absented!!</h4> 
            </div>
        <?php } ?>
    <tr>
    <th>Staff ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Position</th>
    <th>Absent Year</th>
    <th>Absent Month</th>
    <th>Absent Day</th>
    <th>Absent Hour</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    <?php do { ?>
    <tr>
        <td><?php echo $row_attendance["staff_id"]?></td>
        <td><?php echo $row_attendance["first_name"]?></td>
        <td><?php echo $row_attendance["last_name"]?></td>
        <td><?php echo $row_attendance["position"]?></td>
        <td><?php echo $row_attendance["absent_year"]?></td>
        <td><?php echo $row_attendance["absent_month"]?></td>
        <td><?php echo $row_attendance["absent_day"]?></td>
        <td><?php echo $row_attendance["sbsent_houre"]?></td>
        <td > <span class="fa fa-edit"></span></td>
        <td > <span class="fa fa-trash"></span></td>

    </tr>
    <?php }while($row_attendance = mysqli_fetch_assoc($run_attendance)) ?>
    </table>
    
</div>







<?php require_once("footer.php")?>
