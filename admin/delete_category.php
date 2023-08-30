<?php
require('../connection.php');
$catid=$_GET['cat_id'];
$sql="delete from category where cat_id=$catid";
$res=mysqli_query($con,$sql);
if($res){
    ?>
    <script>
        window.location.href="manage_category.php";
    </script>
    <?php
}
?>