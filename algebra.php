
<?php
    include('connection.php');  
    session_start();
    $notification  = '';
    $userName =  $_SESSION['name'];
    $sqlFindId = "SELECT id FROM users WHERE name = '$userName'";
    $queryFindId = mysqli_query($conn, $sqlFindId);
    if (mysqli_num_rows($queryFindId) ==  1) {
        while($rowData = mysqli_fetch_array($queryFindId)){
          $userId = $rowData["id"];
        }
    } 
    $allQuestionsArray = mysqli_query($conn,"SELECT id FROM questions");
    $sqlGetAnsweredOne = "SELECT * FROM answeredquestions WHERE nameID = '$userId'";
    $queryGetAnsweredOne = mysqli_query($conn, $sqlGetAnsweredOne);
    while($row = mysqli_fetch_array($allQuestionsArray))
    {
        $ids_array[] = $row['id'];
    }
    if (mysqli_num_rows($queryGetAnsweredOne ) > 0) {
        while($rowGetAnsweredOne = mysqli_fetch_array($queryGetAnsweredOne)){
          $answeredOneID = $rowGetAnsweredOne["questionID"];
          $answeredOne_array[] =  $answeredOneID;
        }
        $resultArray = array_diff($ids_array, $answeredOne_array);
    }
    if(empty($answeredOne_array)) {
        $randomNumberFromArray = array_rand($ids_array);
        $resultNumber = $ids_array[$randomNumberFromArray];
    } else {        
        if(empty($resultArray)) {
          header('Location: rankup.php');
        }
        else {
            $randomNumberFromArray = array_rand($resultArray );
        $resultNumber = $resultArray[$randomNumberFromArray];
        } 
    }  
            $id = $_GET['question'];
            $sql2 = "SELECT * FROM questions WHERE id = '$id'";
            $query = mysqli_query($conn, $sql2);
            $nums = mysqli_num_rows($query);
            
            while($res= mysqli_fetch_array($query)) {
              ?>
              <div class="question">

                <form action="" method="POST">
                    
                    <h2>  \(<?php echo $res['question']; ?> \)  </h2>
                    <h3><b>Author: </b><?php echo $res['author']; ?></h3>
                    <div class="eachQuestion">
                        <input type="radio" name="answer" value="A"><label><?php echo $res['variantA']; ?></label>
                    </div>
                    <div class="eachQuestion">
                        <input type="radio" name="answer" value="B"><label><?php echo $res['variantB']; ?></label>
                    </div>
                    <div class="eachQuestion">
                        <input type="radio" name="answer" value="C"><label><?php echo $res['variantC']; ?></label>
                    </div>
                    <div class="eachQuestion">
                        <input type="radio" name="answer" value="D"><label><?php echo $res['variantD']; ?></label>
                    </div>
                    <button class="Twobutton" name="submit">Submit</button>
                    <button class="Twobutton" name="nextButton"><a href="algebra.php?question=<?php echo $resultNumber?>">Next</a></button>
                    </form>
              </div>
              <?php
            
            if(isset($_POST['submit'])) {
                $answer = $_POST['answer'];
                $userName =  $_SESSION['name'];
                $sqlFindId = "SELECT id FROM users WHERE name = '$userName'";
                $queryFindId = mysqli_query($conn, $sqlFindId);
                if (mysqli_num_rows($queryFindId) ==  1) {
                    while($rowData = mysqli_fetch_array($queryFindId)){
                      $questionId = $rowData["id"];
                      $sqlAnsweredQuestions = "INSERT INTO answeredquestions (nameID, questionID) VALUES ('$questionId','$id')";  
                      $queryAnsweredQuestions  = mysqli_query($conn, $sqlAnsweredQuestions);
                    }
                }
                if($answer == $res['trueAnswer']) {
                    echo "<script>alert('Correct!')</script>";
                    $sqlTrueAnswer = "UPDATE answeredquestions  SET answer = TRUE WHERE nameID = '$userId' AND questionID ='$id'";
                    $queryTrueAnswer  = mysqli_query($conn, $sqlTrueAnswer);
                }
                else {
                    echo "<script>alert('Wrong!')</script>";

                } 
               
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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <link rel="stylesheet" href="css/algebra.css">
</head>
<body>

        
</body>
</html>