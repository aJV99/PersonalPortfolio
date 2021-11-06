<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog - Abbas Alibhai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="icon.png" />
    <link rel="stylesheet" href="reset.css" type="text/css" />
    <link rel="stylesheet" href="blogStyle.css" type="text/css" />
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
        if(isset($_SESSION["error"])){
            echo $_SESSION["error"];
            UNSET($_SESSION["error"]);
        }
    ?>

    <!-- BLOG SECTION -->
    <section class="blog">
        <h2 class="headtext">Abbas Alibhai's <span style="color:#007ACC;">Blog</span></h2>
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
        <?php
			@$con=mysqli_connect("localhost", "root", "");
            mysqli_select_db($con, "abbas_portfolio");
			$s = mysqli_query($con, "SELECT * FROM tbl_blog");
			if($s === FALSE) { 
                die(mysqli_error($con)); 
			}
		?>
        <table class="blogtable" id="blogTable">
        <?php
			while ($r = mysqli_fetch_array($s)) 
		    {
                $data[] = array('date' => $r['date'], 'title' => $r['title'], 'content' => $r['content'], 'id' => $r['id']);
            }

            $date  = array_column($data, 'date');
            $title = array_column($data, 'title');
            $content = array_column($data, 'content');

            array_multisort($date, SORT_DESC, $title, SORT_ASC, $content, SORT_ASC, $data);

            for ($i = 0; $i < count($data); $i++) {
        ?>
            <tr>
                <td class="colleft">
                    <div class="card">
                        <h2><?php echo $data[$i]['title']; ?></h2>
                        <small>Date: <?php echo $data[$i]['date']; ?></small>
                        <hr>
                        <p><?php echo substr($data[$i]['content'], 0, 350) . "..."; ?></p>
                        <a href="post.php?a=<?php echo $data[$i]['id']; ?>">Read more</a>
                    </div>
                    <br>
                </td>
            </tr>
            <?php } ?>
        </table> 
        
        <!-- <script>
                var table, rows, switching, i, x, y, shouldSwitch;
                table = document.getElementById("blogTable");
                switching = true;
                /*Make a loop that will continue until
                no switching has been done:*/
                while (switching) {
                    //start by saying: no switching is done:
                    switching = false;
                    rows = table.rows;
                    /*Loop through all table rows (except the
                    first, which contains table headers):*/
                    for (i = 0; i < (rows.length); i++) {
                        //start by saying there should be no switching:
                        shouldSwitch = false;
                        /*Get the two elements you want to compare,
                        one from current row and one from the next:*/
                        x = rows[i + 1].getElementsByTagName("td")[0];
                        y = rows[i].getElementsByTagName("td")[0];
                        //check if the two rows should switch place:
                            var datetime1 = new Date(x.innerHTML);
                            var datetime2 = new Date(y.innerHTML);
                        if (datetime1 > datetime2) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                    if (shouldSwitch) {
                        /*If a switch has been marked, make the switch
                        and mark that a switch has been done:*/
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                    }
                }
        </script> -->
    </section>

    <!-- FOOTER -->
    <footer>
        <small>Copyright &copy; 2021 Abbas Alibhai. All Rights Reserved</small>
    </footer>


</body>

</html>