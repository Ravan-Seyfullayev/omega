<?php
 require('connection.php');
 session_start();
 $id = $_GET['user'];
 if(empty($id)) {
   header('Location: rankup.php');
 }
 $sqlFindUsername = "SELECT * FROM users WHERE id = '$id'";
 $queryFindUsername = mysqli_query($conn,   $sqlFindUsername);
 if (mysqli_num_rows( $queryFindUsername ) == 1) {
     while($rowFindUsername = mysqli_fetch_array($queryFindUsername)){
       $username= $rowFindUsername["name"];
       $email = $rowFindUsername['email'];
       $role = $rowFindUsername['roles'];
     }
 } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omega | Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
    <div class="mainData">
        <img src="img/logo.png" alt="">
        <h1><?php echo $username ?> (<?php echo $role ?>)</h1>
        <h3 id="email"><?php echo $email ?></h3>
  
    </div>

    <div class="questionsFromProfile">
    <?php
    $sqlGetQuestions = "SELECT * FROM questions WHERE author = '$username'";
    $queryGetQuestions = mysqli_query($conn, $sqlGetQuestions);
    if (mysqli_num_rows($queryGetQuestions) >  0) {
        while($rowGetQuestions = mysqli_fetch_array($queryGetQuestions)){
          ?>
          <div class="eachQuestion">
            <p><b>Question:</b> \( <?php echo $rowGetQuestions['question'] ?> \) </p>
            <?php if($_SESSION['name'] == $username) {
              ?>
              <button><a href="questionDetail.php?question=<?php echo $rowGetQuestions['id']?>">See Details</a></button>
              <?php
            }?>
          
          </div>
          <?php
        }
    } 
?>
    </div>
</body>
</html>