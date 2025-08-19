<?php
require("securt.php");
 require_once("header.php");?>
<?php

require_once("connection.php");
$condition = "";
 if(isset($_GET['search'])){
    $search = $_GET['search'];
    $condition ="WHERE name LIKE '%$search%' OR patient_id ='$search'";

 }


$patient = "SELECT * FROM patient $condition";
$run_patient =mysqli_query($conn,$patient);
$row_patient = mysqli_fetch_assoc($run_patient);
// for search
$totalRows_patient = mysqli_num_rows($run_patient);


?>
<div class="container">
    <div class="row">
   
        <div class="col">
        
            <table class="table mt-3 table-striped " >
                <h1 class="offset-5">Patient List</h1><br>

                <form class="form" action=""method="get">
                    <div class="input-group">
                        <input type="search"name="search" class="form-control">
                        <span class="input-group-btn ">
                        <button type="submit" class="btn btn-primary"><span class="fa fa-search pe-2 "></span>Search</button>
                        </span>

                    </div>
                </form>
                <?php 
            //condition for search 
         if($totalRows_patient > 0){ ?>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Registration Date</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                <?php if(isset($_GET["delete"])){  ?>
                <div class="alert alert-success">
                    Successfully deleted
                </div>
                <?php } ?>

                <?php if(isset($_GET["edit"])){  ?>
                <div class="alert alert-success">
                    Successfully Update!
                </div>
                <?php } ?>
                <?php

                do{
                ?>
                <tr>
                    <td><?php echo $row_patient["patient_id"]?></td>
                    <td><?php echo $row_patient["name"]?></td>
                    <td><?php echo $row_patient["gender"]==0 ? "Male" : "Female"?></td>
                    <td><?php echo date("Y")-$row_patient["birth_year"]?></td>
                    <td><?php echo $row_patient["reg_date"]?></td>
                    <td>
                        <a href="patient_update.php?patient_id=<?php echo $row_patient["patient_id"];?>">
                            <span class="fa fa-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a class="delete" href="delete_patient.php?patient_id=<?php echo $row_patient["patient_id"]?>">
                            <span class="fa fa-trash" style="color:red;"></span>
                        </a>
                    </td>
                </tr>
                <?php 
                }
                while($row_patient = mysqli_fetch_assoc($run_patient));

                ?>

    <?php }else{ ?>
            <div class="alert alert-warning mt-3 text-center">
               <h3> There is no patient!</h3>
            </div>
            <?php } ?>
   
            </table>

        </div>
       
    </div>
</div>




<?php require_once("footer.php")?>
