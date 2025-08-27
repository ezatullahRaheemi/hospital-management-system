<?php require("securt.php")?>
<?php require_once("header.php");?>
<script type="text/javascript"  src="js/script.js"> </script>

<?php
require("connection.php");
// select for search
 $condition="";
 if(isset($_GET['search']))
 {
    $search = $_GET["search"];
    $condition = "WHERE first_name like'%$search%' OR last_name like'%$search%' OR  staff_id like'$search'";
 }
// select for table
$sql = "SELECT * FROM staff $condition";
$result = mysqli_query($conn,$sql);
$row_staff = mysqli_fetch_assoc($result);
// for search
 $totalrows_staff = mysqli_num_rows($result); 

?>
<?php 
         error_reporting(0);

        if($_GET["update"]){
        ?>
        <div class="alert alert-success">
            <h5 class="text-center">Staff Has Been   Successfully Updated!</h5>
        </div>
        <?php  }?>

<div class="table-responsive p-2">
    <table class="table table-striped ">
        <h1 class="offset-5">Staff List</h1>
        <form action="">
            <div class="input-group">
                <input type="search"  name="search" class="form-control"placeholder="Search By ID /First Name/ Last Name !">
                <span>
                    <button class="btn btn-primary" type="submit"> <span class="fa fa-search"></span> Search</button>
                </span>
            </div>
        </form>
        <?php if($totalrows_staff > 0){ ?>      

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
            <td><img src="<?php echo $row_staff["photo"] ?>" width="50px;"height="50px" class="img-circle"></td>
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
         <?php } else{?>
           <div class="alert alert-warning mt-3 text-center">
           <h2>  There is no Staff!</h2>
           </div> 
         <?php } ?>
    </table>

</div>



<?php require_once("footer.php")?>
