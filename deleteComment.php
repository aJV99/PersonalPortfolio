<?php
    $commentid = $_GET['b'];
    session_start();

    @$con=mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "abbas_portfolio");

    $sqlcheck = mysqli_query($con, "SELECT * FROM tbl_comment WHERE id= '$commentid'");
    $rcheck = mysqli_fetch_array($sqlcheck);
    $blogid = $rcheck['blogId'];
    
    if(($_SESSION["id"] == $rcheck['userId']) || ($_SESSION["id"] == 1)) {
        $sql = mysqli_query($con, "DELETE FROM tbl_comment WHERE id= '$commentid'");
        if($sql) {
            $_SESSION["success"] = "<script>window.alert('That comment is now deleted.')</script>";
            echo "<script>window.location.href='post.php?a=$blogid'</script>";
        }	
        else {
            echo mysqli_error($con);
        }
    }
    else {
        $_SESSION["error2"] = "<script>window.alert('You are not authorised to delete this comment.')</script>";
        echo "<script>window.location.href='post.php?a=$blogid'</script>";
    }
?>