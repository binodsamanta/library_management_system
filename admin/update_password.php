<?php
session_start();
include('../connection.php');
if(isset($_POST['submit'])){
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    
    $sql="select * from admins where email='$_SESSION[email]'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    
    if($old_password==$row['password']){
        $sql="update admins set password='$new_password' where email='$_SESSION[email]'";
        $res=mysqli_query($con,$sql);

        if($res){
            ?>
            <script>
                alert("Password Updated Successfully")
                window.location.href="admin_dashboard.php";
            </script>
            <?php
        }
    }else{
        ?>
            <script>
                alert("Wrong current password");
                window.location.href="change_password.php";
            </script>
        <?php
    }
}
?>
