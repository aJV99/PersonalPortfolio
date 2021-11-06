<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog Post - Abbas Alibhai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="icon.png" />
    <link rel="stylesheet" href="reset.css" type="text/css" />
    <link rel="stylesheet" href="addPostStyle.css" type="text/css" />
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

    <!-- BLOG SECTION -->
    <section class="blog">
        <h2 class="headtext">Abbas Alibhai's <span style="color:#007ACC;">Blog</span></h2>
        <table class="blogtable">
            <tr>
                <td class="colleft">
                    <div class="card">
                        <form id="myForm" method="POST" action="addPostForm.php" autocomplete="off">
                            <input id="inpTitle" name='title' placeholder="Title" type="text" required class="h2" value="<?php
                                if (isset($_SESSION["heading"])) {
                                    echo $_SESSION["heading"];
                                }
                            ?>
"><br> 
                            <p style="font-weight: none; color: red;">Please use "&lt;br&gt;&lt;br&gt;" to indicate a new paragraph and "&amp;#39;" to indicate an apostrophe.</p>
                            <hr>
                            <textarea id="inpContent" name='post' rows="50" placeholder="Blog Entry" class="entry" required><?php
                                if (isset($_SESSION["content"])) {
                                    echo $_SESSION["content"];
                                }
                            ?>
</textarea>
                            <br><br>
                            <input id="btnSubmit" name='submit' type="submit" class="button" value=" Submit ">
                            <input type="submit" name='preview' class="button button3" value="Preview">
                            <input type="button" onclick="clearForm()" class="button button2" value=" Clear ">
                            <br>
                            <br>
                        </form>
                    </div>
                    <br>
                </td>

                <script>
                    var submit = document.getElementById("btnSubmit");
                    var title = document.getElementById("inpTitle");
                    var content = document.getElementById("inpContent");

                    function clearForm() {
                        if (window.confirm("Are you sure you want to clear the form?")) {
                            
                            title.value = "";
                            content.value = "";
                            
                        } 
                        else {

                        }
                    }

                    submit.addEventListener('click',function(event){
                            if((title.value.length == 0) && (content.value.length == 0)) {
                                event.preventDefault();
                                displayWarningTitle("Please fill out the above field.");
                                displayWarningContent("Please fill out the above field.");
                            }
                            else if(title.value.length == 0) {
                                event.preventDefault();
                                displayWarningTitle("Please fill out the above field.");
                                var elementExists = document.getElementById("warn2");
                                if (elementExists != null) {
                                    elementExists.parentNode.removeChild(elementExists);
                                    content.className = "entry";
                                }
                            }
                            else if(content.value.length == 0) {
                                event.preventDefault();
                                displayWarningContent("Please fill out the above field.");
                                var elementExists2 = document.getElementById("warn1");
                                if (elementExists2 != null) {
                                    elementExists2.parentNode.removeChild(elementExists2);
                                    title.className = "h2";
                                }
                            }
                            else {
                                window.confirm("Are you sure you want to submit the form?")
                                // go ahead
                            }
                        },false);

                    var warningBox = document.createElement("DIV");
                    warningBox.className = "warning";
                    warningBox.id = "warn1";

                    var warningBox2 = document.createElement("DIV");
                    warningBox.className = "warning";
                    warningBox2.className = "warning";
                    warningBox2.id = "warn2";
                    function displayWarningTitle(msg) {
                        warningBox.innerHTML = msg;
                        title.parentNode.insertBefore(warningBox, title.nextSibling);
                        title.className = "h2warn";
                    }

                    function displayWarningContent(msg) {
                        warningBox2.innerHTML = msg;
                        content.parentNode.insertBefore(warningBox2, content.nextSibling);
                        content.className = "entrywarn";
                    }
                </script>

                <!-- BUTTON CARD -->
                <td rowspan="1" class="colright">
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