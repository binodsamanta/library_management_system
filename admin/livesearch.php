<?php
include("../connection.php");
$input=$_POST['input'];
$sql="select * from books where book_name like '%{$input}%'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
        // echo $row['book_name']."<br>";
        echo '<option>'.$row['book_name'].'</option>';
    }
}else{
    echo "No Data Found";
}
?>