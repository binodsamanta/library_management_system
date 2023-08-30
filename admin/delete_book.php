<?php
require('../connection.php');
$bookid=$_GET['book_id'];
$sql="delete from books where book_id=$bookid";
$res=mysqli_query($con,$sql);
if($res){
    ?>
    <script>
        window.location.href="manage_book.php";
    </script>
    <?php
}
?>