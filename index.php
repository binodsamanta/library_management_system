<?php
session_start();
$msg="";
include('connection.php');
if(isset($_POST['submit'])){
    $emil=$_POST['email'];
    $password=$_POST['password'];

    $sql = "select * from users where email='$emil' and password='$password'";
    $res= mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);

    if(mysqli_num_rows($res)>0){
        $_SESSION['email']=$row['email'];
        header("location: user_dashboard.php");
    }else{
        $msg="Invalid Credentials! Please enter valid login details";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="signup.php" class="navbar-brand">Library Management System</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="admin/index.php">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <span><marquee behavior="" direction=""><h2>This is a library management system</h2></marquee></span>
    <br><br>
    <div class="row">
        <div class="col-md-4" id="side_bar">
            <h5>Library Timing</h5>
            <ul>
                <li>Openning Timing: 8:00 AM</li>
                <li>Closing Timing: 8:00 PM</li>
                <li>(Sunday off)</li>
            </ul>
            <h5>What we provide</h5>
            <ul>
                <li>Full furniture</li>
                <li>Free Wi-fi</li>
                <li>News Papers</li>
                <li>Discussion Room</li>
                <li>RO Water</li>
                <li>Peacefull Environment</li>
            </ul>
        </div>
        <div class="col-md-8" id="main_content">
            <h3>User Login Form</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Email ID:</label>
                    <input type="text" name="email" class="form-control " required>
                </div>
                <div class="form-group">
                    <label for="name">Password:</label>
                    <input type="password" name="password" class="form-control " required>
                </div>
                <button class="btn btn-primary my-3" type="submit" name="submit">Login</button>
                <p>Don't have an account?<a href="signup.php">Register here</a></p>
                <div class="error-msg">
                    <p><?php echo $msg?></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>