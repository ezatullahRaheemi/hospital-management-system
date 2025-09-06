<?php require("securt.php")?>
<?php require_once("header.php")?>
<?php
require("connection.php");
if(isset($_POST["name"]))
{
    $name = $_POST["name"];
    $form = $_POST["form"];
    $madein = $_POST["madein"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $date = $_POST["date"];

$medicine = " INSERT INTO medicine VALUES(NULL, '$name','$form','$madein',$quantity,$price,'$date')";
$run_medicine = mysqli_query($conn,$medicine);
}

?>

<div class="col-6 offset-3"  style="padding-bottom:50px;padding-top:30px;">
    <form action=""  class="form" style="height:400px;" method="POST">
        <h2 class="text-center" style="font-size:40px;">Add Medicine </h2>
        <div class="input-group ">
            <span class="input-group-addon">
                Name :
            </span>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="input-group mt-1">
            <span class="input-group-addon">
                Form :
            </span>
            <input type="text" name="form" class="form-control">
        </div>
        <div class="input-group mt-1">
            <span class="input-group-addon">
                Madein :
            </span>
            <input type="text" name="madein" class="form-control">
        </div>
        <div class="input-group mt-1">
            <span class="input-group-addon">
                Quantity :
            </span>
            <input type="text" name="quantity" class="form-control">
        </div>
        <div class="input-group mt-1">
            <span class="input-group-addon">
                Unit Price :
            </span>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="input-group mt-1">
            <span class="input-group-addon">
                Expire Date :
            </span>
            <input type="date" name="date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-2 offset-4">Submit</button>
    </form>
</div>





<?php require_once("footer.php")?>
