<?php require("securt.php")?>
<?php require_once("header.php")?>
<?php
error_reporting(0);
require("connection.php");
//select for search
 $search = $_GET['search'];
if(!empty($_GET['search']))
{
$income_p = "SELECT p.patient_id,p.name,income_type,amount,income_date FROM patient p  INNER JOIN income i ON p.patient_id = i.patient_id WHERE  p.patient_id like $search ";
$run_income_p = mysqli_query($conn,$income_p);
$row_income = mysqli_fetch_assoc($run_income_p);

}else{
    
$income_p = "SELECT income.patient_id,name,income_type,amount,income_date FROM patient as patient INNER JOIN income as income ON patient.patient_id = income.patient_id ";
$run_income_p = mysqli_query($conn,$income_p);
$row_income = mysqli_fetch_assoc($run_income_p);

}
?>

 <div class="col col-md-12  p-2">
    <table class="table table-striped">
        <h2 class="text-center mt-2" style="font-size:40px;">Income list</h2>
        
            <?php if($_GET["add"]){?>
                <div class="alert alert-warning "style="padding-top:35px;">
                    <h3>New Income Successfully Added !</h3>
                </div>
            <?php }?>
        <div class="mb-2">
            <form action="" >
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search By : ID !">
                    <span>
                        <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span>Search</button>
                    </span>
                </div>
            </form>
        </div>
        <tr>
            <th>ID</th>
            <th>Patient Name</th>
            <th>Income Type</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <?php do{?>
            <tr>
                <td><?php echo $row_income["patient_id"]?></td>
                <td><?php echo $row_income["name"]?></td>
                <td><?php echo $row_income["income_type"]?></td>
                <td><?php echo $row_income["amount"]?></td>
                <td><?php echo $row_income["income_date"]?></td>
                <td>
                    <a href="update_income.php"> <span class="fa fa-edit"></span></a>
                </td>
                <td>
                    <a href="delete_income.php"> <span class="fa fa-trash" style="color:red"></span></a>
                </td>
            </tr>
        <?php }while($row_income = mysqli_fetch_assoc($run_income_p));?>
    </table>
 </div>



<?php require_once("footer.php")?>
