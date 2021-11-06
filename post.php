<?php
	$blogid = $_GET['a'];

	@$con=mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "abbas_portfolio");
	$sql = mysqli_query($con, "SELECT * FROM tbl_blog WHERE id= '$blogid'");

	if(!$sql) {
		echo mysqli_error($con);
	}

    $r = mysqli_fetch_array($sql)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $r['title']; ?> - Abbas Alibhai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="icon.png" />
    <link rel="stylesheet" href="reset.css" type="text/css" />
    <link rel="stylesheet" href="postStyle.css" type="text/css" />
    <!-- Icon Library  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- LOGO AND NAV -->
    <header>
        <hgroup>
            <nav class="nav">
                <ul class="logo">
                    <label class="navlogo" href="#">Abbas <span style="color:#007ACC;">Alibhai</span></label>
                </ul>
                <ul class="navigation">
                    <li><a class="navlink" href="index.html#Home">Home</a></li>
                    <li><a class="navlink" href="index.html#AboutMe">About Me</a></li>
                    <li><a class="navlink" href="index.html#Skills">Skills</a></li>
                    <li><a class="navlink" href="experience.html#Experience">Experience</a></li>
                    <li><a class="navlink" href="experience.html#Education">Education</a></li>
                    <li><a class="navlink" href="experience.html#Projects">Projects</a></li>
                    <li><a class="navlink" href="login.php">Blog</a></li>
                    <li><a class="navlink" href="index.html#Contacts">Contact</a></li>
                </ul>
            </nav>
        </hgroup>
    </header>

    <!-- RETURN TO TOP BUTTON -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">↑</button>
    <script>
        // Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <?php 
        session_start();
        if(isset($_SESSION["error2"])){
            echo $_SESSION["error2"];
            UNSET($_SESSION["error2"]);
        }
        
        if(isset($_SESSION["success"])){
            echo $_SESSION["success"];
            UNSET($_SESSION["success"]);
        }
    ?>

    <!-- BUTTON CARD -->
    <div class="colright">
        <div>
            <div class="card-container">
                <h6>Welcome!</h6>
                <h3>
                    <?php 
                        echo $_SESSION["fname"] . " " . $_SESSION["lname"];
                    ?>
                </h3>
                <p>You are logged in</p>
                <a class="small" href="adminLogin.html">Add New Post</a><br>
                <a class="small" href="logout.php">Log out</a>
                <br><br><br>
            </div>
        </div>
    </div>

    <!-- BLOG SECTION -->
    <section class="blog">
        <h2 class="headtext">Abbas Alibhai's <span style="color:#007ACC;">Blog</span></h2>
        <table class="blogtable">
            <tr>
                <td class="colleft">
                    <div class="card">
                        <h2><?php echo $r['title']; ?></h2>
                        <small>Date: <?php echo $r['date']; ?></small>
                        <hr>
                        <p><?php echo $r['content']; ?></p>
                    </div>
                    <br>
                </td>
            </tr>

            <?php
	            $sql2 = mysqli_query($con, "SELECT * FROM tbl_comment WHERE blogId= '$blogid' ORDER BY id DESC");

	            if(!$sql2) {
	            	echo mysqli_error($con);
	            }
            ?>

            <!-- COMMENT SECTION -->
            <tr class="colleft">
                <td>
                    <div class="comment">
                        <h2>Comments:</h2>
                        <hr><br>
                        <form method="POST" action="addComment.php" autocomplete="off">
                            <h3>Add a comment</h3>
                            <br>
                            <textarea name='comment' rows="3" placeholder="Message" class="message" required></textarea>
                            <input name='blogid' type="number" style="display:none;" value="<?php echo $r['id']; ?>">
                            <br><br>
                            <input name='submit' type="submit" class="button" value=" Submit ">
                            <br>
                        </form>
                        <?php
                            while ($r2 = mysqli_fetch_array($sql2))
                            {
                                $temp = $r2['userId'];
                                $sqlname = mysqli_query($con, "SELECT firstName, lastName FROM tbl_login WHERE id='$temp' ");
                                $rname = mysqli_fetch_array($sqlname);
                        ?>
                        <hr>
                        <br>
                        <h3><?php echo $rname['firstName'] . " " . $rname['lastName']; ?></h3>
                        <small>Date: <?php echo $r2['date']; ?></small>
                        <br>
                        <p><?php echo $r2['comment']; ?></p>
                        <br>
                        <a href="deleteComment.php?b=<?php echo $r2['id']; ?>" onclick="return confirm('Are you sure you would like to delete this comment?')">Delete Comment</a>
                        <?php
                            }
                        ?>
                        
                    </div>
                </td>
            </tr>
        </table>
    </section>

    <!-- FOOTER -->
    <footer>
        <small>Copyright &copy; 2021 Abbas Alibhai. All Rights Reserved</small>
    </footer>


</body>

</html>