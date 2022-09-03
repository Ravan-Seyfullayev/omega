<?php
    $error = '';
    include('navbar.php');
    include('connection.php'); 
    $algebraQuestionsArray = mysqli_query($conn,"SELECT id FROM questions WHERE type = 'Algebra'");
    $calculusQuestionsArray =  mysqli_query($conn,"SELECT id FROM questions WHERE type = 'Calculus'");
    $trigonometryQuestionsArray =  mysqli_query($conn,"SELECT id FROM questions WHERE type = 'Trigonometry'");
    while($rowAlgebra = mysqli_fetch_array($algebraQuestionsArray)){
        ($ids_array) $algebraArray[] = $rowAlgebra['id'];
    }
    while($rowCalculus = mysqli_fetch_array($calculusQuestionsArray)) {
        $calculusArray[] = $rowCalculus['id'];
    }
    while($rowTrigonometry = mysqli_fetch_array($trigonometryQuestionsArray)) {
        $TrigonometryArray[] = $rowTrigonometry['id'];
    }
    $userName =  $_SESSION['name'];
    $sqlFindId = "SELECT id FROM users WHERE name = '$userName'";
    $queryFindId = mysqli_query($conn, $sqlFindId);
    if (mysqli_num_rows($queryFindId) ==  1) {
        while($rowData = mysqli_fetch_array($queryFindId)){
          $userId = $rowData["id"];
        }
    } 
    $sqlGetAnsweredOne = "SELECT * FROM answeredquestions WHERE nameID = '$userId'";
    $queryGetAnsweredOne = mysqli_query($conn, $sqlGetAnsweredOne);

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
           $error = "No Questions Left";
        }
        else {
            $randomNumberFromArray = array_rand($resultArray );
        $resultNumber = $resultArray[$randomNumberFromArray];
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omega | Rank Up</title>
    <link rel="stylesheet" href="css/rankup.css">
   
</head>
<body>
    <div class="">
        <div class="questions">
            <div class="themeBox">
                <img src="svgs/rankupalg.svg" alt="">
                <button id="algebraButton"><a href="">Algebra</a></button>
            </div>
            <div class="themeBox">
                <img src="svgs/rankupcalc.svg" alt="">
                <button ><a href="">Calculus</a></button>
            </div>
            <div class="themeBox">
                <img src="svgs/rankuptrio.svg" alt="">
                <button ><a href="">Triogonometry</a></button>
            </div>
        </div>

    </div>
</body>
</html>