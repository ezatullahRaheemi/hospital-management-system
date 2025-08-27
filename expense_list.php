<?php require("securt.php")?>
<?php require_once("header.php")?>
<?php
error_reporting(0);
 require("connection.php");
 $condition= "";
 if(isset($_GET['search']))
  {
    $search =$_GET['search'];
    $condition = "WHERE expense_type like'%$search%' OR expense_id like'$search'";
 }

 $expense = "SELECT * FROM expense $condition";
 $run_expense = mysqli_query($conn, $expense);
 $row_expense = mysqli_fetch_assoc($run_expense);
 $totalrow_expense = mysqli_num_rows($run_expense);


?>
 
  <div class="table-responsive p-2 " >
    <table class="table table-striped ">
        <h1 >Expenses List</h1>
        <div class="mb-2">
        <form action="" >
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search By : ID / Expense Type !">
                    <span>
                        <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span>Search</button>
                    </span>
                </div>
            </form>
            </div>
        <?php if($_GET["add"]){?>
                    <div class="alert alert-success "style="margin-top:80px;">
                        could has been Expense Added!
                    </div>
            <?php }?>
        <?php if($totalrow_expense >0){?>

        <tr>
            <th>ID</th>
            <th>Amount</th>
            
            <th>Expense Type</th>
            <th>Date</th>
        </tr>
        <?php do{ ?>
        <tr>
            <td><?php echo $row_expense["expense_id"]?></td>
            <td><?php echo $row_expense["amount"]?> <?php echo $row_expense["currency"]?></td>
            <td><?php echo $row_expense["expense_type"]?></td>
            <td><?php echo $row_expense["expense_date"]?></td>
        </tr>
 
    <?php }while($row_expense = mysqli_fetch_assoc($run_expense));?>
    <?php } else{?>
           <div class="alert alert-warning mt-3 text-center">
           <h2>  There is no Expense!</h2>
           </div> 
         <?php } ?>
    </table>
  </div>



<?php require_once("footer.php")?>
