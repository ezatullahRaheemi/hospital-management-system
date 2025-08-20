<?php
ob_start();
 require("securt.php");?>
<?php require_once("header.php")?>
<?php
// error_reporting(0);
 require("connection.php");
 //select staff for update
 $id = $_GET["sid"];
 $staff = "SELECT * FROM staff WHERE staff_id = $id";
 $run_staff = mysqli_query($conn,$staff);
 $row_staff = mysqli_fetch_assoc($run_staff);

 // Select for drop drown list
 $sql = "SELECT * FROM department";
 $run = mysqli_query($conn,$sql);
 $row_department = mysqli_fetch_assoc($run);

 // insert query 
 if(isset($_POST["firstname"]))
{
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $byear =$_POST["byear"];
    $position = $_POST["position"];
    $education = $_POST["education"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    // $photo = $_POST["photo"];
    $gsalary = $_POST["gsalary"];
    $hdate = $_POST["hdate"];
    $stype= $_POST["stype"];
    $department_id = $_POST["department_id"];

            // check the photo update
            if($_FILES["photo"]["name"] !="")
            {
                    // Insert file
                    $size = $_FILES["photo"]["size"];
                    $type = $_FILES["photo"]["type"];
                    if($type == 'image/jpeg'|| $type == 'image/png' || $type == 'image/gif')
                    {
                        if($size <= 6 * 1024 * 1024)
                        {
                            $path = "images/".time().$_FILES["photo"]["name"];
                         move_uploaded_file($_FILES["photo"]["tmp_name"] ,$path);
                         // use for exist photo in database
                         unlink($row_staff["photo"]);
                        }
                        else{
                            header("location:add_staff.php?filesize=invalid");exit; ob_end_flush();
                        }
                    }
                    else{
                        header("location:add_staff.php?filetype=invalid");
                    }
            }else{
                $path = $row_staff["photo"];
            }
                

     $staff = "UPDATE staff SET first_name='$firstname', last_name='$lastname', birth_year=$byear, position='$position', education='$education', gender=$gender, phone='$phone', email='$email', address='$address', photo='$path', grass_salary=$gsalary, hires_data='$hdate', staff_type=$stype, department_id=$department_id WHERE staff_id=$id";
     $result = mysqli_query($conn,$staff);
     if($result)
     {
        header("location:staff_list.php?update=done");
     }
     else{
        header("location:update_staff.php?error=notupdate&sid=$id");

     }
 }
?>

<div class="col-md-6  offset-3 pt-3  ">
            <form class="forms pb-3" method ="POST" enctype="multipart/form-data">
            <h1>Update Staff</h1>
            
            <?php if(isset($_GET["error"])) { ?>
                <div class="alert alert-success">
                    could not update  staff ! Please Try Again
                </div>
                <?php }?>

            <?php if(isset($_GET["filetype"])) { ?>
                <div class="alert alert-danger">
                    Invalid file type!(Please Choose jpeg,png ,gif )
                </div>

                <?php }?>
                <?php if(isset($_GET["filesize"])) { ?>
                <div class="alert alert-danger">
                    Invalid file type!(Please Choose file smaller than 6 MB  )
                </div>

                <?php }?>

                <div class="input-group m-2">
                    <span class="input-group-addon">
                        First Name :
                    </span>
                    <input  type="text"name="firstname" class="form-control"
                    value="<?php echo $row_staff["first_name"];?>" >
                </div>
                
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Last Name :
                    </span>
                    <input type="text" name = "lastname" class="form-control"
                    value="<?php echo $row_staff["last_name"];?>">
                </div>
                <div class="input-group m-2 ">
                    <span class="input-group-addon">
                        Birth Year :
                    </span>
                    <input type="text" name="byear" class="form-control"
                    value="<?php echo $row_staff["birth_year"];?>">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Position :
                    </span>
                    <input type="text" name="position" class="form-control" 
                    value="<?php echo $row_staff["position"];?>">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Education :
                    </span>
                    <input type="text" name="education" class="form-control"
                    value="<?php echo $row_staff["education"];?>">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                    Email :
                    </span>
                    <input type="email" name="email" class="form-control"
                    value="<?php echo $row_staff["email"];?>">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Address :
                    </span>
                    <input type="text" name="address" class="form-control"
                    value="<?php echo $row_staff["address"];?>">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Phone :
                    </span>
                    <input type="number" name="phone" class="form-control"
                    value="<?php echo $row_staff["phone"];?>">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        grass Salary :
                    </span>
                    <input type="number" name="gsalary" class="form-control"
                    value="<?php echo $row_staff["grass_salary"];?>">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        hires Date :
                    </span>
                    <input type="number" name="hdate" class="form-control"
                    value="<?php echo $row_staff["hires_data"];?>">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Staff Type :
                    </span>
                    <select  name="stype" class="form-control">
                        <option <?php if($row_staff["staff_type"]==1) echo "selected"?> value="1">Doctor</option>
                        <option <?php if($row_staff["staff_type"]==2)  echo "selected"?> value ="2">Nurse</option>
                        <option <?php if($row_staff["staff_type"]==3) echo "selected"?> value="3">Employee</option>

                    </select><br>
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Department :
                    </span>
                    <select  name="department_id" class="form-control">
                        <?php 
                        do{
                            ?>
                        <option <?php if($row_staff["department_id"] == $row_department["department_id"]) echo "selected";?> value="<?php echo $row_department["department_id"]?>">
                            <?php echo $row_department["name"]?>
                        </option>
 
        <?php }while($row_department = mysqli_fetch_assoc($run));?>

                    </select>
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Photo :
                    </span> 
                    <input type="file" name="photo" class="form-control">
                    <span class="input-group-addon" style="width:45px;">
                        <img src="<?php echo $row_staff["photo"]?>" width=24px;>
                    </span> 
                </div>

                <div class="input-group m-2">
                    <span class="input-group-addon ">
                        Gender :
                    </span> &nbsp;
                <label for="" ><input  type="radio" name="gender" class=" form-check-input ms-3  "
                <?php if($row_staff["gender"]==0) echo "checked"?> value="0">Male</label> 
                <label for=""><input type="radio" name="gender" class=" form-check-input ms-4" 
                <?php if($row_staff["gender"]==1) echo "checked"?> value="1">Female</label>   

                </div>
                <button class="btn btn-primary mb-3 mt-2 offset-4" type="submit">Update</button>


            </form>
       
</div>


<div class="clearfix"></div>



<?php require_once("footer.php")?>
