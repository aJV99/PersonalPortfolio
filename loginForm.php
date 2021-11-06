<?php
   	$host="localhost";
    $user="root";
    $password="";
    $db="abbas_portfolio";

    $a=mysqli_connect($host,$user,$password);
    mysqli_select_db($a, $db);

    if(isset($_POST['email'])) {

        $uname=$_POST['email'];
        $password=$_POST['password'];

        $password = md5($password);

        $result=mysqli_query($a, "SELECT * FROM tbl_login WHERE email='$uname' AND password='$password' LIMIT 1");
        

        if(mysqli_num_rows($result)==1) {
            session_start();
            $row = mysqli_fetch_array($result);
            $_SESSION["id"] = $row['id'];
            $_SESSION["fname"] = $row['firstName'];
            $_SESSION["lname"] = $row['lastName'];
            $_SESSION["login"] = true;
            header("Location: viewBlog.php");
        }
        else {
            echo "<script>window.location.href='login.php?c=fail';</script>";
        }
    }
?>