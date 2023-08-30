<?php
require('../connection.php');
$authorid=$_GET['author_id'];
$sql="delete from authors where author_id=$authorid";
$res=mysqli_query($con,$sql);
if($res){
    ?>
    <script>
        window.location.href="manage_author.php";
    </script>
    <?php
}
?>