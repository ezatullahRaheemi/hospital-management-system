<?php require("securt.php")?>
<?php 
error_reporting(0);
require_once("header.php");?>

<?php
require("connection.php");

    if(isset($_GET["month"]))
    {
        $year = $_GET["year"];
        $month = $_GET["month"];
    }else{
        $year = date('Y');
        $month = date('m');
    }
    $year = $_GET["year"];
    $month = $_GET["month"];

    // this code for search
     $condition = "";
     if(isset($_GET["search"]))
     {
        $search = $_GET["search"];
        $condition = "WHERE first_name like'%$search%' OR last_name like'%$search%' OR staff.staff_id like'$search'";
     }

     // select for salary
    $sql ="SELECT *, (SELECT net_salary FROM salary WHERE staff_id = staff.staff_id) AS net_salary FROM staff $condition ";
     $run_salary = mysqli_query($conn , $sql);
    $row_salary = mysqli_fetch_assoc($run_salary);
    $totalrow_salary =mysqli_num_rows($run_salary);

   
?>

    <h1 class="mt-2 ms-3 ms-3">Staff Salary</h1>

        <!-- <a  href="add_salary.php" class="btn  btn-info offset-11 p-1 mb-0  print"><span class="fa fa-plus"></span>   Pay Salary</a> -->
         <a href="#" class="btn  btn-info offset-11 p-1 mb-1 mt-0"><span class="fa fa-print"></span>  Print</a>
        
<div class=" table-responsive">
  <div class=" pt-2 p-2 ">
        <table class="table table-striped ">
            <div class="row ">
                <form class="">
                    <div class="col-3 input-group m-1  ">
                        <span class="input-group-addon">
                            Month :
                        </span>
                        <select style="width:200px;" name="month" id="" class="me-1 ">
                            <option <?php if($row_attendance["absent_month"]==1) echo "selected"?> value="1">January</option>
                            <option <?php if($row_attendance["absent_month"] ==2 ) echo "selected"?> value="2">February</option>
                            <option <?php if($row_attendance["absent_month"] ==3 ) echo "selected"?> value="3">March</option>
                            <option <?php if($row_attendance["absent_month"] ==4 ) echo "selected"?> value="4">April</option>
                            <option <?php if($row_attendance["absent_month"] ==5 ) echo "selected"?> value="5">May</option>
                            <option <?php if($row_attendance["absent_month"] ==6 ) echo "selected"?> value="6">June</option>
                            <option <?php if($row_attendance["absent_month"] ==7 ) echo "selected"?> value="7">July</option>
                            <option <?php if($row_attendance["absent_month"] ==8 ) echo "selected"?> value="8">August</option>
                            <option <?php if($row_attendance["absent_month"] ==9 ) echo "selected"?> value="9">September</option>
                            <option <?php if($row_attendance["absent_month"] ==10 ) echo "selected"?> value="10">October</option>
                            <option <?php if($row_attendance["absent_month"] ==11 ) echo "selected"?> value="11">November</option>
                            <option <?php if($row_attendance["absent_month"] ==12 ) echo "selected"?> value="12">December</option>
                        </select>

                        <span class="input-group-addon">
                            Year :
                        </span>
                        <input type="text" class="form-control" name="year" >
                        <span class="input-group-btn me-3" >
                            <input type="submit" value="Show" class="btn btn-primary">
                        </span>
                        
                        <input   type="search" name="search" class="form-control"placeholder="Search By ID /First Name/ Last Name !">
                        <span class="">
                        <button class="btn btn-primary me-1"> <span class="fa fa-search"></span> Search</button> 
                        </span>
                       
                    </div>
                </form>
            </div>
        
            
            <?php if($_GET["add"]){?>
                    <div class="alert alert-success">
                        <h4>Could has been Staff Salary!</h4> 
                    </div>
                <?php } ?>

                <?php if($_GET["update"]){?>
                    <div class="alert alert-success">
                        <h4>Could has been Salary Update!</h4> 
                    </div>
                <?php } ?>

                    <?php if($_GET["delete"]){?>
                        <div class="alert alert-success">
                                <h4>Could has been Salary successfully deleted!</h4> 
                        </div>
                    <?php } ?>

                    <?php if($_GET["error"]){?>
                        <div class="alert alert-danger">
                                <h4>Could not has been salary deleted!</h4> 
                        </div>
                    <?php } ?>

                <?php if($totalrow_salary>0){?>

            <tr>
                <th>Staff ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Photo</th>
                <th>Position</th>
                <th>Net Salary</th>
                <!-- <th>Edit</th>
                <th>Delete</th> -->
            </tr>

                <?php do { ?>
            <tr>
                <td><?php echo $row_salary["first_name"]?></td>
                <td><?php echo $row_salary["staff_id"]?></td>
                <td><?php echo $row_salary["last_name"]?></td>
                <td> <img width="45px;" height="45px" src="<?php echo $row_salary["photo"]?>" alt=""></td>
                <td><?php echo $row_salary["position"]?></td>
                <td>
                <?php if($row_salary["net_salary"]== ""){ ?>
                  <a href="add_salary.php?sid=<?php echo $row_salary['staff_id']?>&month=$month&year=$year" class="btn btn-primary">Pay Salary</a>
                  <?php }else{ ?>
                         <?php echo $row_salary["net_salary"];?>
                    <?php } ?>
                </td>
                <!-- <td > 
                    <a href="attendance_update.php?sid=<?php echo $row_salary["staff_id"]?>&year=<?php echo $row_attendance["absent_year"]?>&month=<?php echo $row_attendance["absent_month"]?>&day=<?php echo $row_attendance["absent_day"]?>">
                    <span class="fa fa-edit"></span>
                    </a>
                </td>

                <td>
                    <a href="delete_attendance.php?sid=<?php echo $row_salary["staff_id"]?>&year=<?php echo $row_attendance["absent_year"]?>&month=<?php echo $row_attendance["absent_month"]?>&day=<?php echo $row_attendance["absent_day"]?>">
                        <span class="fa fa-trash"></span>
                    </a>
                </td> -->
            </tr>

                <?php }while($row_salary = mysqli_fetch_assoc($run_salary)); ?>
                <?php } else{?>
                    <div class="alert alert-warning mt-2 text-center ">
                    <h2>There is no Salary</h2> 
    
                <?php }?>
        </table>
    
    </div>

</div>



<?php require_once("footer.php")?>
