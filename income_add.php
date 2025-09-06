<?php
 ob_start();
 require("securt.php");?>
<?php require_once("header.php")?>
<?php 
error_reporting(0);
 require("connection.php");
 //select for drop down list
 $patient = "SELECT * FROM patient";
 $run_patient = mysqli_query($conn ,$patient);
 $row_patient = mysqli_fetch_assoc($run_patient);

 if(isset($_POST["type"]))
 {
    $patient_id = $_POST["patient_id"];
    $type = $_POST["type"];
    $amount = $_POST["amount"];
    $date = $_POST["date"];
    $income = "INSERT INTO income VALUEs(NULL,$patient_id,'$type',$amount,'$date')";
    $run_income = mysqli_query($conn , $income);
    if($run_income)
    {
        header("location:income_list.php?add=done");exit;ob_end_start();
    }else{
        header("location:income_list.php?error=notadd");exit;ob_end_start();

    }
 }


?>


<div class="col col-md-6 offset-3 mt-3" style="padding-bottom:80px; padding-top:50px;">
    <form action="" class="form" method="POST">
        <h2 class="text-center" style="font-size:40px;">Add Income</h2>
        <?php if($_GET["error"]){?>
            <div class="alert alert-warning">
               could not add new staff ! Please Try Again
            </div>
        <?php }?>
        <div class="input-group mt-1">
        <span class="input-group-addon">
                Patient :
            </span>
            <select name="patient_id" id="" class="form-control">
                <?php do{?>
                <option value="<?php echo $row_patient["patient_id"]?>"><?php echo $row_patient["name"]?></option>
                <?php }while($row_patient = mysqli_fetch_assoc($run_patient));?>
            </select>
        </div>
        <div class="input-group mt-1">
            <span class="input-group-addon">
                Income Type:
            </span>
            <input type="text" name="type" class="form-control" placeholder="Write Type!">
        </div>
        <div class="input-group mt-1">
            <span class="input-group-addon">
                Amount :
            </span>
            <input type="text" name="amount" class="form-control" placeholder="Write Amount!">
        </div>
        <div class="input-group mt-1">
            <span class="input-group-addon">
                Income Date :
            </span>
            <input type="date" name="date"class="form-control">
        </div>
        <button type="submit" class="btn btn-primary  mt-3 offset-4">Submit</button>
    </form>
</div>






<?php require_once("footer.php")?>
