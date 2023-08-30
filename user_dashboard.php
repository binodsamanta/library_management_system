<?php
session_start();
include('connection.php');
if(!isset($_SESSION['email'])){
    header("location: index.php");
}

$sql="select * from users where email='$_SESSION[email]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$studentid=$row['id'];

 function get_user_issue_book_count(){
 include('connection.php');
 $sql="select count(*) as book_count from issued_books where student_id=$GLOBALS[studentid]";
 $res=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($res);
 $book_count=$row['book_count'];
 return($book_count);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="user_dashboard.php" class="navbar-brand">Library Management System</a>
            </div>
            <div id="user_data">
                <p>Welcome: <?php echo $row['name']?></p>
                <p>Email: <?php echo $row['email']?></p>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Profile
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view_profile.php">View Profile</a></li>
                        <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <br>
    <span><marquee behavior="" direction=""><h2>This is a library management system</h2></marquee></span>
    <br><br>
    <div class="row">
        <div class="col-md-3 mx-4">
            <div class="card bg-light" style="width: 300px">
                <div class="card-header">Issued Books:</div>
                <div class="card-body">
                    <p class="card-text"> No of Issued Books:<?php echo get_user_issue_book_count();?></p>
                    <a href="view_issued_book.php" class="btn btn-success" target="_blank">View Issued Books</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>