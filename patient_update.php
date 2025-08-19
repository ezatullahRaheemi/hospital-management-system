<?php
ob_start();
require_once("header.php");?>
<?php require_once("connection.php");?>
<?php

//select data from database
$id = $_GET["patient_id"];
$sql1 = "SELECT * FROM patient WHERE patient_id = $id";
$result1 = mysqli_query($conn,$sql1);
$row_patient = mysqli_fetch_assoc($result1);
//update date
if(isset($_POST["name"]))
{
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $year = $_POST["year"];
    $nic = $_POST["nic"];
    $job = $_POST["job"];
    

    $sql = "UPDATE patient SET name = '$name', gender = '$gender', phone = '$phone', address = '$address', birth_year = '$year', nic = '$nic', job = '$job'WHERE patient_id = $id";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        header("location:patient_list.php") ;exit;
        ob_end_flush();
    }else{
        header("location:patient_list.php");

    }


}
?>
  
<div class="container">
    <div class="row ">
        <div class="col-md-8 offset-2 " style="margin-top:0px;">
            <form class="form form2"action="" method="POST" >
            
                <br>
                <h2 style="text-align:center" >Add Patient</h2>
                    <div class="form-group ">
                    <label  >
                         Name: 
                    </label><br>
                  
                    <input type="text" name="name" class="form-control"
                    value="<?php echo $row_patient["name"]?>">
                    </div>
                    
                    <div class="form-group mb-1">
                        <label for="" >Phone:</label> 
                        <input type="number" name="phone" class="form-control"
                        value="<?php echo $row_patient["phone"]?>">
                    </div >
                    <div class="form-group mb-1">
                        <label for="">Address:</label> 
                          <input type="text" name="address" class="form-control"
                        value="<?php echo $row_patient["address"]?>">
                    </div >
                    <div >
                        <label for="" >Birth Year:</label> 
                        <input type="text" name="year" class="form-control"
                        value="<?php echo $row_patient["birth_year"]?>">
                    </div >
                    <div class="form-group mb-1">
                        <label for="">NIC:</label> 
                        <input type="number"  name="nic" class="form-control"
                        value="<?php echo $row_patient["nic"]?>">
                    </div>
                    <div class="form-group mb-1">
                        <label for="">Job:</label> 
                        <input type="text"  name="job" class="form-control"
                        value="<?php echo $row_patient["job"]?>">
                    </div>
                    <div class="form-group mb-1">
                        <label for="" class="form-check-label">Gender:</label>
                        <label><input <?php if($row_patient["gender"] == 0) echo"checked"?> 
                        type="radio" name="gender"class=" form-check-input ms-4"value="0"></label>
                        <label for="" class="form-check-label">Male</label> 
                        <label><input <?php if($row_patient["gender"] == 1) echo "checked"?> 
                        type="radio" name="gender"class=" form-check-input ms-3"  value="1"></label>
                        <label for="" class="form-check-label ">Female</label> 
                    </div >


                    <div class="btn1">
                    <button type="submit" value="" class="btn btn-success mb-5 ">Submit</button>
                    </div>
               
                     
            </form>

        </div>
    </div>
</div>




<?php require_once("footer.php")?>
