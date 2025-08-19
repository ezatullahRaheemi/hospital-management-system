<?php 
ob_start();
require_once("header.php");
?>
<?php require_once("connection.php");?>
<?php
if(isset($_POST["name"]))
{
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $year = $_POST["year"];
    $nic = $_POST["nic"];
    $job = $_POST["job"];
    $reg_date = date("Y-m-d");

    $sql = "INSERT INTO patient(name,gender,phone,address,birth_year,nic,job,reg_date)
    VALUES('$name','$gender','$phone','$address','$year','$nic','$job','$reg_date')";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("location:patient_list.php") ;exit;
        ob_end_flush();
    }else{
        header("location:patient_list.php?");

    }
}
   



?>

<div class="container">
    <div class="row ">
        <div class="col-md-8 offset-2 " style="margin-top:0px;">
            <form class="form form2" method="POST" >
            
                <br>
                <h2 style="text-align:center" >Add Patient</h2>
                    <div class="form-group ">
                    <label  >
                         Name: 
                    </label><br>
                  
                    <input type="text" name="name" class="form-control">
                    </div>
                    
                    <div class="form-group mb-1">
                        <label for="" >Phone:</label> 
                        <input type="number" name="phone" class="form-control">
                    </div >
                    <div class="form-group mb-1">
                        <label for="">Address:</label> 
                        <input type="text" name="address" class="form-control">
                    </div >
                    <div >
                        <label for="" >Birth Year:</label> 
                        <input type="text" name="year" class="form-control">
                    </div >
                    <div class="form-group mb-1">
                        <label for="">NIC:</label> 
                        <input type="number"  name="nic" class="form-control">
                    </div>
                    <div class="form-group mb-1">
                        <label for="">Job:</label> 
                        <input type="text"  name="job" class="form-control">
                    </div>
                    <div class="form-group mb-1">
                        <label for="" class="form-check-label">Gender:</label>
                        <label><input type="radio" name="gender"class=" form-check-input ms-4"value="0"></label>
                        <label for="" class="form-check-label">Male</label> 
                        <label><input type="radio" name="gender"class=" form-check-input ms-3"  value="1"></label>
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
