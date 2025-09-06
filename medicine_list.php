<?php require("securt.php")?>
<?php require_once("header.php")?>
<?php 
require("connection.php");
$condition = "";
if(isset($_GET["search"]))
{
    $search = $_GET["search"];
    $condition = "where name like'%$search%'OR medicine like $search";
}
 $medicine = "SELECT * FROM medicine $condition";
 $run_medicine = mysqli_query($conn,$medicine);
 $row_medicine = mysqli_fetch_assoc($run_medicine);

?>


<div class="table-responsive p-2">
    <table class="table table-striped ">
    <h2 class="text-center pt-3 " style="font-size:40px;"> Medicines List</h2>

    <form action="">
            <div class="input-group">
                <input type="search"  name="search" class="form-control"placeholder="Search By ID /Medicine Name !">
                <span>
                    <button class="btn btn-primary" type="submit"> <span class="fa fa-search"></span> Search</button>
                </span>
            </div>
        </form>
        <tr>
            <th>ID</th>
            <th>Medicine Name</th>
            <th>Form</th>
            <th>madein</th>
            <th>Quantity </th>
            <th> Unit price</th>
            <th> Expire Date</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <?php do{?>
        <tr>
            <td><?php echo $row_medicine["medicine_id"]?></td>
            <td><?php echo $row_medicine["name"]?></td>
            <td><?php echo $row_medicine["form"]?></td>
            <td><?php echo $row_medicine["madein"]?></td>
            <td><?php echo $row_medicine["quantity"]?></td>
            <td><?php echo $row_medicine["unitprice"]?></td>
            <td><?php echo $row_medicine["exp_date"]?></td>
            <td>
                <a href="update_medicine.php?mid=<?php echo $row_medicine["medicine_id"]?>"><span class="fa fa-edit"></span></a>
            </td>
            <td>
                <a href="delete_medicine.php?mid=<?php echo $row_medicine["medicine_id"]?>""><span class="fa fa-trash"></span></a>
            </td>
        </tr>
        <?php }while($row_medicine=mysqli_fetch_assoc($run_medicine))?>

    </table>
</div>




<?php require_once("footer.php")?>
