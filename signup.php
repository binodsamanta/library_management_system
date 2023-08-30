<?php
$email_err="";
$name_err="";
$mobile_err="";
include('connection.php');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];

    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $name_err = "Only letters and white space allowed";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    }
    if(!preg_match('/^[0-9]{10}$/', $mobile)) {
        $mobile_err = "Invalid mobile no!";
    }
    if(empty($email_err) && empty($name_err) && empty($mobile_err)){
        $sql="select * from users where email='$email'";
        $res= mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0){
            $email_err="This Email is already exists, Please use another one";
        }else{
            $sql = "insert into users(name,email,password,mobile,address) values('$name','$email','$password','$mobile','$address')";
            $res= mysqli_query($con,$sql);
            if($res){
            ?>
            <script>
                alert("Registration successful... You may login now.");
                window.location.href="signup.php";
            </script>
            <?php
            }
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
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
            <h3>User Registration Form</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <P class="error-msg"><?php echo $name_err?></P>
                    <input type="text" name="name" class="form-control " required>
                </div>
                <div class="form-group">
                    <label for="name">Email ID:</label>
                    <P class="error-msg"><?php echo $email_err?></P>
                    <input type="text" name="email" class="form-control " required>
                </div>
                <div class="form-group">
                    <label for="name">Password:</label>
                    <input type="password" name="password" class="form-control " required>
                </div>
                <div class="form-group">
                    <label for="name">Mobile Number:</label>
                    <P class="error-msg"><?php echo $mobile_err?></P>
                    <input type="text" name="mobile" class="form-control " required>
                </div>
                <div class="form-group">
                    <label for="name">Address:</label>
                    <textarea name="address" id="" cols="40" rows="4" class="form-control" required></textarea>
                </div>
                
                <button class="btn btn-primary my-3" type="submit" name="submit">Register</button>
                <p>Already have an account?<a href="index.php">Sing in</a></p>
                
            </form>
        </div>
    </div>
</body>
</html>

