<?php
    session_start();
    @$con=mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "abbas_portfolio");

    if(isset($_POST['submit'])) {

        $da = date("Y-m-d H:i:s");
        $co = $_POST['comment'];
        $bid = $_POST['blogid'];
        $uid = $_SESSION["id"];

        $sql = mysqli_query($con, "INSERT INTO tbl_comment (blogId,userId,date,comment) VALUES ('$bid','$uid','$da','$co')");

        if(!$sql) {
            echo mysqli_error($con);
        }
        else {
            echo "<script>window.location.href='post.php?a=$bid'</script>";
        }
    }
?>