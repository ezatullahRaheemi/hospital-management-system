<?php 
include("connection.php");
error_reporting(0);

?>
<?php require_once("header.php");?>
<?php
 if(isset($_POST["username"]))
 {
   $username= $_POST["username"];
   $password = $_POST["password"];

 $sql = "SELECT * FROM users  WHERE username = '$username' AND password ='$password'";
 $result = mysqli_query($conn , $sql);
 if(mysqli_num_rows($result) == 1 )
 {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["staff_id"] = $row["staff_id"];
    header("location:home.php");
 }else{
    header("location:login.php?login=failed");
 } 
}

?>

 <div class="container">
    <div class="row ">
        <div class="col-md-6 offset-3 " style="margin-top:60px; margin-bottom:55px;">
            <form class="form" method="POST" >
                <h2 style="text-align:center" >Login</h2>
                <?php if(isset($_GET["logout"])){ ?>
                   
                   <div class="alert alert-success p-2">
                        You are successful loged out! 
                   </div>
                   <?php } ?>

                   <?php if(isset($_GET["login"])){ ?>
                    
                    <div class="alert alert-danger p-2">
                         Incorrect Username or password! 
                    </div>
                    <?php } ?>

                    <div class="form-group ">
                    <label for="" class="form-label">  Username:</label>
                    <input type="text" name="username" class="form-control">
                    </div>
                    
                    <div class="form-group mb-2">
                        <label for="" class="form-label">Password:</label> 
                        <input type="password" name="password" class="form-control">
                    </div >

                    <div class="btn1">
                    <button type="submit" value="" class="btn btn-success  ">Submit</button>
                    </div>
                     
            </form>

        </div>
    </div>
</div>



<?php require_once("footer.php");?>
