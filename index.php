<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omega</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Poppins:wght@300&family=Rubik+Beastly&display=swap" rel="stylesheet">
</head>
<body>
    
        <div class="header">
            <div class="navbarWithLogo">
                <div class="navbar">
                    <img src="svgs/menu.svg" alt="" id="menu">
                    <ul id="ul">
                        
                        <li><a href="<?php  if(empty($_SESSION['name']))
                        { 
                            echo 'signin.php'; 
                        } else { 
                            echo 'index.php';
                            }      ?>">Home</a></li>
                        <li><a href="<?php  if(empty($_SESSION['name']))
                        { 
                            echo 'signin.php'; 
                        } else { 
                            echo 'explore.php';
                            }      ?>">Explore</a></li>
                        <li><a href="<?php  if(empty($_SESSION['name']))
                        { 
                            echo 'signin.php'; 
                        } else { 
                            echo 'rankup.php';
                            }      ?>">Rank Up</a></li>
                        <?php
                        if(empty($_SESSION['name'])) {
                            ?>
                        <li><a href="signin.php" id="signIn">Sign In</a><a href="signup.php">/ Sign Up </a></li>
                        <?php
                        }
                        else {
                            ?>
                                  <li><a href="#" id="signIn"><?php  echo $_SESSION['name']?></a>
                                  
                            <?php

                        }
                        ?>
                        

                    </ul>
                </div>
                <img src="img/omega.svg" alt="" id="logo" draggable="false" >
            </div>  
            <div class="header_content">
                <div class="header_container">
                    <h1>Omega</h1>
                    <h3>Try to learn Math</h3>
                    <button id="signUpBtn"><a href="signup.php">Get Started	&#8594; </a></button>
                </div>
                <div class="header_container">
                    <img src="img/undraw_mathematics_4otb.svg" alt="" id="adviad" draggable="false">

                </div>
            </div>

        </div>

    <div class="boxes">
        <div class="box">
            <h2>Statistics</h2>
            <img src="svgs/statistics.svg" alt="">
            <br>
            <button><a href="https://en.wikipedia.org/wiki/Statistics" style="text-decoration:none; color:black">Learn More &#8594;</a></button>
        </div>
        <div class="box">
            <h2>Calculus</h2>
            <img src="svgs/calculusI.svg" alt="">
            <br>
            <button><a href="https://en.wikipedia.org/wiki/Calculus" style="text-decoration:none; color:black">Learn More &#8594;</a></button>
        </div>
        <div class="box">
            <h2>Algebra</h2>
            <img src="svgs/algebraI.svg" alt="">
            <br>
            <button><a href="https://en.wikipedia.org/wiki/Algebra" style="text-decoration:none; color:black">Learn More &#8594;</a></button>
        </div>
        <div class="box">
            <h2>Geometry</h2>
            <img src="svgs/geometryI.svg" alt="">
            <br>
            <button><a href="https://en.wikipedia.org/wiki/Geometry" style="text-decoration:none; color:black">Learn More &#8594;</a></button>
        </div>
    </div>
    <div>
    </div>
    <div class="practise">
        <div class="practiseText">
           <h1>Practise</h1>     
           <h4>With Help of Tests Practise your Math.</h4>  
        </div>
        <div class="practiseImage">
        <iframe width="500" height="280" src="https://www.youtube.com/embed/M3DZ09KlIPE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <div class="words">
        <h1>Features</h1>
        <div class="wordsBoxes">
            <div class="wordsBox">
                <h2>Easy Answer</h2>
                <h3>Answer questions and check if they are true.</h3>
            </div>
            <div class="wordsBox">
                <h2>Practise Math</h2>
                <h3>Practise Math with the help of our Books and </h3>
            </div>
            <div class="wordsBox">
                <h2>Bid with Intelligence</h2>
                <h3>Leverage Bid Multipliers and Dynamic Budget Allocation to maximize the impact and effectiveness of your campaigns.</h3>
            </div>
            <div class="wordsBox">
                <h2>Bid with Intelligence</h2>
                <h3>Leverage Bid Multipliers and Dynamic Budget Allocation to maximize the impact and effectiveness of your campaigns.</h3>
            </div>
            <div class="wordsBox">
                <h2>Bid with Intelligence</h2>
                <h3>Leverage Bid Multipliers and Dynamic Budget Allocation to maximize the impact and effectiveness of your campaigns.</h3>
            </div>
            <div class="wordsBox">
                <h2>Bid with Intelligence</h2>
                <h3>Leverage Bid Multipliers and Dynamic Budget Allocation to maximize the impact and effectiveness of your campaigns.</h3>
            </div>
            <div class="wordsBox">
                <h2>Bid with Intelligence</h2>
                <h3>Leverage Bid Multipliers and Dynamic Budget Allocation to maximize the impact and effectiveness of your campaigns.</h3>
            </div>
            <div class="wordsBox">
                <h2>Bid with Intelligence</h2>
                <h3>Leverage Bid Multipliers and Dynamic Budget Allocation to maximize the impact and effectiveness of your campaigns.</h3>
            </div>
        </div>
    </div>
    <div class="swiper">
        <div class="swiperBlock">
            <h1>Math Channels</h1>
            <iframe src="swiper.html" frameborder="0" width="600px" height="300px"></iframe>
        </div>
    </div>
    <div class="countingNumbers">
            <div class="countingNumbersBox">
                <h2>Users</h2>
                <p>3</p>
            </div>
            <div class="countingNumbersBox" >
                <h2>Questions</h2>
                <p>14</p>
            </div>
            <div class="countingNumbersBox">
                <h2>Teachers</h2>
                <p>3</p>
            </div>
    </div>
    <div class="footer">
            <div class="footer_words">
                <div class="footer_logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/69/Aleph.svg" alt="">
                </div>
                <div class="footer_copyright">
                    <i class="fas fa-copyright"></i>
                    <h2 >Aleph One Inc.</h2>
                </div>
            </div>
            <div class="footer_social">
                <h2>Social Networks</h2>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-telegram"></i>
            </div>


    </div>
    <script src="js/hamburger.js"></script>
</body>
</html>




