<?php 
    session_start();
    if (isset($_SESSION['login'])) {
        header("Location: viewBlog.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login or Sign Up - Abbas Alibhai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="icon.png" />
    <link rel="stylesheet" href="reset.css" type="text/css" />
    <link rel="stylesheet" href="loginStyle.css" type="text/css" />

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
    
    <section>
        <table>
            <tr>

                <!-- LOGIN SECTION -->
                <td class="colleft">
                    <div class="overlay">
                        <form method="POST" action="loginForm.php" autocomplete="off">
                            <div class="con">
                                <header class="head-form">
                                    <br><br>
                                    <h2>Log In</h2><br>
                                    <p>Login to comment on posts</p>
                                </header>
                                <br>
                                <div class="field-set">
                                    <input class="form-input" name='email' type="email" placeholder="E-Mail" required>
                                    <br><br>
                                    <input class="form-input" name='password' type="password" placeholder="Password" required>
                                    <br><br>
                                    <input type="submit" class="submit" value=" Log In ">
                                </div>
                            </div>
                        </form>
                    </div>
                </td>
                <td class="colmiddle"></td>

                <!-- SIGN UP SECTION -->
                <td class="colright">
                    <div class="overlay">
                        <form method="POST" action="loginForm2.php" autocomplete="off">
                            <div class="con">
                                <header class="head-form">
                                    <br>
                                    <h2>Sign Up</h2><br>
                                    <p>Sign up to create an account</p>
                                </header>
                                <div class="inputs">
                                    <input class="form-input2" name='FirstName' type="text" placeholder="First Name" required>
                                    <br>
                                    <input class="form-input2" name='LastName' type="text" placeholder="Last Name" required>
                                    <br>
                                    <input class="form-input2" name='Email' type="email" placeholder="E-Mail" required>
                                    <br>
                                    <input class="form-input3" name='Password' type="password" placeholder="Password" required>
                                    <br>
                                    <input type="submit" class="submit" name='submit' value=" Sign Up ">
                                </div>
                            </div>
                        </form>
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

<?php
    if (isset($_GET['c'])){
        if ($_GET['c'] == 'fail') {
            echo "<script>window.alert('You have inputted the incorrect email and/or password.');</script>";
        }

        if ($_GET['c'] == 'yes') {
            echo "<script>window.alert('You're account has been made. Log in to view the blog');</script>";
        }
    }
?>