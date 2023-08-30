<?php
    function get_user_count(){
        require('../connection.php');
        $sql="select count(*) as user_count from users";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);
        $user_count =$row['user_count'];
        return($user_count);
    }

    function get_book_count(){
        require('../connection.php');
        $sql="select count(*) as book_count from books";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);
        $book_count =$row['book_count'];
        return($book_count);
    }
    function get_category_count(){
        require('../connection.php');
        $sql="select count(*) as cat_count from category";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);
        $cat_count =$row['cat_count'];
        return($cat_count);
    }
    function get_author_count(){
        require('../connection.php');
        $sql="select count(*) as author_count from authors";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);
        $author_count =$row['author_count'];
        return($author_count);
    }
    function get_issued_book_count(){
        require('../connection.php');
        $sql="select count(*) as issued_book_count from issued_books";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);
        $issued_book_count =$row['issued_book_count'];
        return($issued_book_count);
    }
?>