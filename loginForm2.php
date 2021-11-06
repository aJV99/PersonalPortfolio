<?php
    @$con=mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "abbas_portfolio");

    if(isset($_POST['submit'])) {
        $fi = $_POST['FirstName'];
        $la = $_POST['LastName'];
        $em = $_POST['Email'];
        $pa = $_POST['Password'];

        $pa = md5($pa);

        $sql = mysqli_query($con, "INSERT INTO tbl_login (firstName,lastName,email,password) VALUES ('$fi','$la','$em','$pa')");

        if(!$sql) {
            echo mysqli_error($con);
        }
        else {
            echo "<script>window.location.href='login.php?c=yes';</script>";
        }
    }
?>