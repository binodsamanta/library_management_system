<?php
session_start();
include('connection.php');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    
    $sql="update users set name='$name',mobile='$mobile', address='$address' where email='$_SESSION[email]'";
    $res=mysqli_query($con,$sql);

    if($res){
        ?>
        <script>
            alert("Account Updated Successfully")
            window.location.href="User_dashboard.php";
        </script>
        <?php
    }
}
?>
