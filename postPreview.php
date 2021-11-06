<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Preview Blog Post - Abbas Alibhai</title>
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
    ?>

    <!-- BUTTON CARD -->
    <div class="colright">
        <div>
            <div class="card-container">
                <h6>Welcome!</h6>
                <h3>
                    You are in PREVIEW MODE
                </h3>
                <p>You are logged in</p>
                <a class="small disabled" disabled>Add New Post</a><br>
                <a class="small disabled" disabled>Log out</a><br>
                <a class="small" href="addPost.php">Go Back</a>
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
                        <h2><?php echo $_SESSION["heading"]; ?></h2>
                        <small>Date: <?php echo $_SESSION["date"];; ?></small>
                        <hr>
                        <p><?php echo $_SESSION["content"]; ?></p>
                    </div>
                    <br>
                </td>
            </tr>

            <!-- COMMENT SECTION -->
            <tr class="colleft">
                <td>
                    <div class="comment">
                        <h2>Comments:</h2>
                        <hr><br>
                        <form method="POST" autocomplete="off">
                            <h3>Add a comment</h3>
                            <br>
                            <textarea name='comment' rows="3" placeholder="Message" class="message" required></textarea>
                            <input name='blogid' type="number" style="display:none;">
                            <br><br>
                            <input name='submit' type="submit" class="button disabled" value=" Submit " disabled>
                            <br>
                        </form>
                        <hr>
                        <br>
                        <h3>John Doe</h3>
                        <small>Date: Sample Date</small>
                        <br>
                        <p>Sample Comment</p>
                        <br>                        
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