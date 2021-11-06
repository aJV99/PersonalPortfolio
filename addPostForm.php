<?php
    @$con=mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "abbas_portfolio");
    session_start();

    if(isset($_POST['submit'])) {
        $da = date("Y-m-d H:i:s");
        $ti = $_POST['title'];
        $po = $_POST['post'];

        unset($_SESSION["heading"]);
        unset($_SESSION["content"]);

        $sql = mysqli_query($con, "INSERT INTO tbl_blog (date,title,content) VALUES ('$da','$ti','$po')");

        if(!$sql) {
            echo mysqli_error($con);
        }
        else {
            echo "<script>window.location.href='viewBlog.php'</script>";
        }
    }

    if(isset($_POST['preview'])) {
        $dapreview = date("Y-m-d H:i:s");
        $tipreview = $_POST['title'];
        $popreview = $_POST['post'];

        $_SESSION["date"] = $dapreview;
        $_SESSION["heading"] = $tipreview;
        $_SESSION["content"] = $popreview;
        header("Location: postPreview.php");
    }
?>