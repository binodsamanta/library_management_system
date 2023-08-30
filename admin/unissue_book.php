<?php
require('../connection.php');
$student_id=$_GET['stu_id'];
$sql="delete from issued_books where student_id=$student_id";
$res=mysqli_query($con,$sql);
if($res){
    ?>
    <script>
        alert("Book unissued Successfully!");
        window.location.href="view_issued_book.php";
    </script>
    <?php
}
?>