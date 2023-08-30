<?php
session_start();
require('functions.php');
require('../connection.php');
if(!isset($_SESSION['email'])){
    header("location: index.php");
}

$sql="select * from admins where email='$_SESSION[email]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="admin_dashboard.php" class="navbar-brand">Library Management System</a>
            </div>
            <div id="user_data">
                <p>Welcome: <?php echo $row['name']?></p>
                <p>Email: <?php echo $row['email']?></p>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Profile
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view_profile.php">View Profile</a></li>
                        <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item"><a href="admin_dashboard.php" class="nav-link">Dashboard</a></li>
                <li class="nav-item">
                    <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Book
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="add_book.php">Add New Book</a></li>
                        <li><a class="dropdown-item" href="manage_book.php">Manage Books</a></li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="add_category.php">Add New Category</a></li>
                        <li><a class="dropdown-item" href="manage_category.php">Manage Category</a></li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Author
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="add_author.php">Add New Author</a></li>
                        <li><a class="dropdown-item" href="manage_author.php">Manage Authors</a></li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item"><a href="admin_dashboard.php" class="nav-link">Issue Book</a></li>
            </ul>
        </div>
    </nav>
    <span><marquee behavior="" direction=""><h2>This is a library management system</h2></marquee></span>
    <br><br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="" method="post">
                <?php
                    $bookid=$_GET['book_id'];
                    $sql="select * from books where book_id=$bookid";
                    $res=mysqli_query($con,$sql);
                    $row=mysqli_fetch_assoc($res);
                ?>
                <div class="form-group my-3">
                    <label>Book Name</label>
                    <input type="text" name="book_name" class="form-control" value="<?php echo $row['book_name']?>">
                </div>
                <div class="form-group my-3">
                    <label>Author Id</label>
                    <input type="text" name="author_id" class="form-control" value="<?php echo $row['author_id']?>">
                </div>
                <div class="form-group my-3">
                    <label>Category Id</label>
                    <input type="text" name="cat_id" class="form-control" value="<?php echo $row['cat_id']?>">
                </div>
                <div class="form-group my-3">
                    <label>Book No</label>
                    <input type="text" name="book_no" class="form-control" value="<?php echo $row['book_no']?>">
                </div>
                <div class="form-group my-3">
                    <label>Book Price</label>
                    <input type="text" name="book_price" class="form-control" value="<?php echo $row['book_price']?>">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Update</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</body>
</html>

<?php
$bookid=$_GET['book_id'];
if(isset($_POST['submit'])){
    $book_name=$_POST['book_name'];
    $author_id=$_POST['author_id'];
    $cat_id=$_POST['cat_id'];
    $book_no=$_POST['book_no'];
    $book_price=$_POST['book_price'];

    $sql="update books set book_name='$book_name',author_id=$author_id,cat_id=$cat_id,book_no=$book_no,book_price=$book_price where book_id=$bookid";
    $res=mysqli_query($con,$sql);
    if($res){
        ?>
        <script>
            alert("Book details updated Successfully!");
            window.location.href="manage_book.php";
        </script>
        <?php
    }
}
?>