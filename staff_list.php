<?php require("securt.php")?>
<?php require_once("header.php");?>

<?php
require("connection.php");

$sql = "SELECT * FROM staff";
$result = mysqli_query($conn,$sql);
$row_staff = mysqli_fetch_assoc($result);

?>
<?php 
         error_reporting(0);

        if($_GET["update"]){
        ?>
        <div class="alert alert-success">
            Staff Has Been   Successfully Updated!
        </div>
        <?php  }?>

<div class="table-responsive">
    <table class="table table-striped ">
        <h1 class="offset-5">Staff List</h1>
        
        <tr>
            <th>S/N</th>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Photo</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
                
        
        <?php $s=1; do{?>
        <tr>
            <td><?php echo $s++;?></td>
            <td><?php echo $row_staff["staff_id"] ?></td>
            <td><?php echo $row_staff["first_name"] ?></td>
            <td><?php echo $row_staff["last_name"] ?></td>
            <td><img src="<?php echo $row_staff["photo"] ?>" width="50px;" class="img-rounded"></td>
            <td><?php echo $row_staff["position"] ?></td>
            <td><?php echo $row_staff["grass_salary"] ?></td>
          <td>
            <a href="update_staff.php?sid=<?php echo $row_staff["staff_id"]  ?>">
                <span class="fa fa-edit"></span>
            </a>
        </td>
        <td>
            <a class="delete" href="staff_delete.php?sid=<?php echo $row_staff["staff_id"];?>">
                <span class="fa fa-trash"></span>
            </a>
        </td>



        </tr>
        <?php }while($row_staff = mysqli_fetch_assoc($result))?>

    </table>
</div>



<?php require_once("footer.php")?>
