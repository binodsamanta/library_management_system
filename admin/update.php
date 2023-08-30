<?php
session_start();
include('../connection.php');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    
    $sql="update admins set name='$name',mobile='$mobile' where email='$_SESSION[email]'";
    $res=mysqli_query($con,$sql);

    if($res){
        ?>
        <script>
            alert("Account Updated Successfully")
            window.location.href="admin_dashboard.php";
        </script>
        <?php
    }
}
?>
