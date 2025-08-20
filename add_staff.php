<?php
ob_start();
 require("securt.php");?>
<?php require_once("header.php")?>
<?php
// error_reporting(0);
 require("connection.php");

 // Select for drop drown list
 $sql = "SELECT * FROM department";
 $run = mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($run);
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

   $size = $_FILES["photo"]["size"];
    $type = $_FILES["photo"]["type"];
     if($type == 'image/jpeg'|| $type == 'image/png' || $type == 'image/gif')
     {
        if($size <= 6 * 1024 * 1024)
        {
            $path = "images/".time().$_FILES["photo"]["name"];
         move_uploaded_file($_FILES["photo"]["tmp_name"] ,$path);
        }
        else{
            header("location:add_staff.php?filesize=invalid");exit; ob_end_flush();
        }
     }
     else{
        header("location:add_staff.php?filetype=invalid");

     }

     $staff = "INSERT INTO staff VALUES(NULL,'$firstname','$lastname',$byear,'$position','$education',$gender,'$phone','$email','$address','$path',$gsalary,$hdate,$stype,$department_id)";
     $result = mysqli_query($conn,$staff);
     if($result)
     {
        header("location:staff_list.php?add=done");
     }
     else{
        header("location:add_staff.php?error=notadd");

     }

}


?>

<div class="col-md-6  offset-3 pt-3 pb-3 ">
    

            <form class="forms pe-3" method ="POST" enctype="multipart/form-data">
            <h1>Add Staff</h1>
            
            <?php if(isset($_GET["error"])) { ?>
                <div class="alert alert-success">
                    could not add new staff ! Please Try Again
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
                    <input type="text"name="firstname" class="form-control">
                </div>
                
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Last Name :
                    </span>
                    <input type="text" name = "lastname" class="form-control">
                </div>
                <div class="input-group m-2 ">
                    <span class="input-group-addon">
                        Birth Year :
                    </span>
                    <input type="text" name="byear" class="form-control">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Position :
                    </span>
                    <input type="text" name="position" class="form-control">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Education :
                    </span>
                    <input type="text" name="education" class="form-control">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                    Email :
                    </span>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Address :
                    </span>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Phone :
                    </span>
                    <input type="number" name="phone" class="form-control">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        grass Salary :
                    </span>
                    <input type="number" name="gsalary" class="form-control">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        hires Date :
                    </span>
                    <input type="number" name="hdate" class="form-control">
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Staff Type :
                    </span>
                    <select  name="stype" class="form-control">
                        <option value="1">Doctor</option>
                        <option value ="2">Nurse</option>
                        <option value="3">Employee</option>

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
                        <option value="<?php echo $row["department_id"]?>"><?php echo $row["name"]?></option>
 
        <?php }while($row = mysqli_fetch_assoc($run));?>

                    </select>
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon">
                        Photo :
                    </span> 
                    <input type="file" name="photo" class="form-control">
                </div>

                <div class="input-group m-2">
                    <span class="input-group-addon ">
                        Gender :
                    </span> &nbsp;
                <label for="" ><input type="radio" name="gender" class=" form-check-input ms-3  " value="0">Male</label> 
                <label for=""><input type="radio" name="gender" class=" form-check-input ms-4"  value="1">Female</label>   

                </div>
                <button class="btn btn-primary mb-3 mt-2 offset-4" type="submit">Submit</button>


            </form>
       
</div>


<div class="clearfix"></div>



<?php require_once("footer.php")?>
