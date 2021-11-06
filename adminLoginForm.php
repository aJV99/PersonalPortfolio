<?php
   	$host="localhost";
    $user="root";
    $password="";
    $db="abbas_portfolio";

    $a=mysqli_connect($host,$user,$password);
    mysqli_select_db($a, $db);
    session_start();

        $uname=$_POST['email'];
        $password=$_POST['password'];

        $password = md5($password);

        $result=mysqli_query($a, "SELECT * FROM tbl_login WHERE email='$uname' AND password='$password' AND id='1' LIMIT 1");

        if(mysqli_num_rows($result)==1) {
            header("Location: addPost.php");
        }
        else{
            
            $_SESSION["error"] = "<script>window.alert('You have inputted the incorrect and/or password OR You are not authorised to access this page.')</script>";
            header("Location: viewBlog.php");
        }
    
?>