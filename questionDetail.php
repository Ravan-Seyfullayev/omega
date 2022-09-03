<?php
    require('connection.php');
    session_start();
    $username = $_SESSION['name'];
    $idOfquestion = $_GET['question'];
    $falseAnswer = 0;
    $trueAnswer = 0;
      $sqlSelectAnswers = "SELECT answer FROM answeredquestions WHERE questionID = '$idOfquestion'";
      $querySelectAnswers = mysqli_query($conn, $sqlSelectAnswers);
      while($rowSelectAnswers = mysqli_fetch_array($querySelectAnswers)){
        if($rowSelectAnswers['answer'] == FALSE) {
            $falseAnswer ++;
        }
        elseif($rowSelectAnswers['answer'] == TRUE ) {
            $trueAnswer ++;
        }
      }

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/questionDetail.css">
</head>
<body>
    <div class="mainData">
    <h1>Table Of Users</h1>
        <table id="table">
            <thead>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Answer</th>
            </thead>
            <tbody>
        <?php
            $sqlSelectAllAnsweredOnes = "SELECT * FROM answeredquestions WHERE questionID = '$idOfquestion'";
            $querySelectAllAnsweredOnes = mysqli_query($conn, $sqlSelectAllAnsweredOnes);
            if (mysqli_num_rows($querySelectAllAnsweredOnes) >  0) {
                while($rowSelectAllAnsweredOnes = mysqli_fetch_array($querySelectAllAnsweredOnes)){
                    $idOfUser = $rowSelectAllAnsweredOnes['nameID'];
                    $answerOfUser  = $rowSelectAllAnsweredOnes['answer'];
                    if($answerOfUser) {
                        $answerOfUser = "Correct &#10004;";
                    }
                    elseif(!$answerOfUser) {
                        $answerOfUser = "Wrong 	&#10005;";
                    }
                    $sqlFindUsername = "SELECT * FROM users WHERE id = '$idOfUser'";
                    $queryFindUsername = mysqli_query($conn,   $sqlFindUsername);
                    if (mysqli_num_rows( $queryFindUsername ) > 0) {
                        while($rowFindUsername = mysqli_fetch_array($queryFindUsername)){
                        $userId = $rowFindUsername['id'];
                        $finalUsername= $rowFindUsername["name"];
                        $email = $rowFindUsername['email'];
                        $role = $rowFindUsername['roles'];
                        echo "<tr><td data-label= 'Id'>" . $userId . "</td><td data-label= 'Username' >" . $finalUsername . "</td ><td data-label = 'Email'  >" . $email ."</td ><td data-label='Role' >" . $role . "</td><td data-label= 'Answer'>". $answerOfUser ."</td></tr>";
                    }
                } 
            }
        } 
        ?>
        </tbody>
        </table>
    <h1>% Of Answers</h1>
    <canvas id="RatioAnswer" width="300" height="300"></canvas>
    <script>
    var ctx = document.getElementById('RatioAnswer').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['True Answers', 'Wrong Answers'],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo $trueAnswer;?>, <?php echo $falseAnswer;?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 99, 132, 0.8)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
                    responsive: false
        }
    });
</script>
</div>

    
</body>
</html>
