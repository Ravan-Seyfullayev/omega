<?php
    require('connection.php');
    session_start();   

    $username =  $_SESSION['name'];
    $sqlFindId = "SELECT id FROM users WHERE name = '$username'";
    $queryFindId = mysqli_query($conn,  $sqlFindId);
    if (mysqli_num_rows($queryFindId ) == 1) {
        while($rowFindId = mysqli_fetch_array($queryFindId)){
          $idOfUser = $rowFindId["id"];
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <div class="navbar">
        <ul>
            <div class="navbarIl"><input type="input" placeholder="Search...  "><button id="searchButton">Search</button></div>
            
            <img src="svgs/menu.svg" alt="" id="hamburgerMenu">
            <div id="navbarIlForLi" class="navbarIl">
                <li class="menuIl"><a href="explore.php">Explore</a></li>
                <li class="menuIl"><a href="rankup.php">Rank Up</a></li>
                <li class="menuIl"><a href="books.php">Books</a></li>
                <li class="profileIl"><a href="profile.php?user=<?php  echo  $idOfUser?>"><img src="img/logo.png" id="profilePic"></a></li>
                <li class="profileIl"><a href="addQuestion.php"><img src="svgs/add.svg" alt="" id="addIcon"></a></li>
            </div>
        </ul>     
    </div>
    <script src="js/exploreHamburger.js"></script>
</body>
</html> 