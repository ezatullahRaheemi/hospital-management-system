
<?php
// error_reporting(0);
// require("securt.php");
if(!isset($_SESSION))
{
 session_start();

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet"type="text/css" href="css/style.css">
  <link rel="stylesheet" href="fontawesome-web/css/all.min.css">

  <script  type="text/javascript" src="js/jquery.min.js"></script>
  <script  type="text/javascript" src="js/bootstrap.min.js"></script>
  <script  type="text/javascript" src="js/script.js"></script>


  <title>Hospital MIS</title>
</head>
<body>
  <div class="container-fluid">
      <div  class=" header">
        <img class="logo" src="images/images.png"  alt="">
        <h1>Hospital Management System</h1>
  </div>
 
  <div class=" menu1">
  
    <nav class="navbar navbar-expand-sm  ">
        <div class="container-fluid">
    

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
            if(isset($_SESSION['staff_id']))
            { 
              ?>
            <ul class="navbar-nav me-auto offset-2  mb-2 mb-sm-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Patient
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="add_patient.php">Register New Patient</a></li>
                  <li><a class="dropdown-item" href="patient_list.php">Patient List</a></li>
                  <li><a class="dropdown-item" href="#">Diagnosis</a></li>
                  <li><a class="dropdown-item" href="#">Patient Admit</a></li>
                  <li><a class="dropdown-item" href="#">Oppointment</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" ho href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Pharmacy
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Add New Medicine</a></li>
                  <li><a class="dropdown-item" href="#">Medicine List</a></li>
                  <li><a class="dropdown-item" href="#">Patient Medicine</a></li>
                  <li><a class="dropdown-item" href="#">Shortage Medicine </a></li>
                  
                </ul>
              </li>

              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Laborator
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Add New Test</a></li>
                  <li><a class="dropdown-item" href="#">Lab Test</a></li>
                  <li><a class="dropdown-item" href="#">Patient Tests</a></li>
                  <li><a class="dropdown-item" href="#">Blood Bank </a></li>
                  
                </ul>
              </li>

              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Finance
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Add New Income</a></li>
                  <li><a class="dropdown-item" href="#">Income List</a></li>
                  <li><a class="dropdown-item" href="#">Add New Expense</a></li>
                  <li><a class="dropdown-item" href="#">Expense List  </a></li>
                  
                </ul>
              </li>


              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Staff
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="add_staff.php">Add New Staff</a></li>
                  <li><a class="dropdown-item" href="staff_list.php">Staff List</a></li>
                  <li><a class="dropdown-item" href="attendance_list.php">Staff Attendance </a></li>
                  <li><a class="dropdown-item" href="#">Staff Salary </a></li>
                  <li><a class="dropdown-item" href="#">Staff Schedule </a></li>
                </ul>
              </li>

                 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Management
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="add_department.php">Department</a></li>
                  <li><a class="dropdown-item" href="#">Room Management</a></li>
                  <li><a class="dropdown-item" href="#">Equipment </a></li>
                  <li><a class="dropdown-item" href="#">User Account </a></li>
                 </ul>
              </li>

              <li class="nav-item">
                <a href="logout.php" class="nav-link btn btn-outline-primary" aria-disabled="true">Logout</a>
              </li>
            </ul>
             <?php  
             }else 
            { 
              ?>
                
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  " aria-current="page" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-success " aria-current="page" href="login.php">Log In</a>
              </li>
            </ul>
            <?php 
          }
          ?>
        
        
          </div>
        </div>
      </nav>
      
     </div>

      <div class=" content">
        