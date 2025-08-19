<?php require_once("header.php")?>
<?php

require("connection.php");
if(isset($_POST["name"])){
$name = $_POST["name"];
$sql ="INSERT INTO department(name)values('$name')";
$result = mysqli_query($conn,$sql); 
}

?>

<div class="container ">
    <div class="row">
        <div class="col-6 offset-3">
            <form action=""method="POST" class="form" style="margin-top:80px;">
                <h1 class="text-center">Add department</h1>
                
                <div class="form-group"><br><br><br><br>
                <label for="">Department :</label>
                <input type="text"name="name" class="form-control" placeholder="Write Department Name">
                </div>
                <button  class="btn btn-primary mt-3" type="submit"> Submit</button>
            </form>
        </div>
    </div>
</div>


<?php require_once("footer.php")?>
