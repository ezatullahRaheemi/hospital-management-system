<?php
ob_start();
error_reporting(0);
 require("securt.php");?>
<?php require_once("header.php")?>
<?php
require("connection.php");
if(isset($_POST["amount"]))
{
    $amount = $_POST["amount"];
    $currency = $_POST["currency"];
    $type = $_POST["type"];
    $date = $_POST["date"];
    $expense = "INSERT INTO expense VALUES(NULL ,$amount,'$currency','$type','$date')";
    $run_expense = mysqli_query($conn,$expense);
    if($run_expense)
    {
        header("location:expense_list.php?add=done");exit;ob_end_start();

    }else{
        header("location:add_expense.php?error=notadd");exit;ob_end_start();
        
    }

}


?>
<div class="col-md-6 offset-3 pt-5 " style="padding-bottom:80px;">
    <form action="" class="form" method="POST" style=" width:700px; height:360px;">
        <h1 class="text-center m-2">Add Expense</h1>
        <?php if($_GET["error"]){?>
            <div class="alert alert-warning">
            could has been not Added! pleas Try Again!
            </div>
            <?php }?>
        <div class="input-group mt-2">
            <span class="input-group-addon">
                Amount :
            </span>
            <input type="number"name="amount" class="form-control">
        </div>
        <div class="input-group mt-2">
            <span class="input-group-addon">
                Currency :
            </span>
            <input type="text"name="currency" class="form-control">
        </div>
        <div class="input-group mt-2">
            <span class="input-group-addon">
                Expense Type :
            </span>
            <input type="text"name="type" class="form-control">
        </div>
        <div class="input-group mt-2">
            <span class="input-group-addon">
                Date :
            </span>
            <input type="date"name="date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary offset-3 mt-3">Add Expense</button>
    </form>
</div>





<?php require_once("footer.php")?>
