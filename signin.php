<?php
    include('connection.php');
    session_start();
    $error = "";
if(isset($_POST['button'])){
    if($_POST['name'] == "" || $_POST['password'] == "") {
        $error = "Please Fill all inputs";
    }
    $username = $_POST['name'];
    $password = $_POST['password'];
    $sqlGetData = "SELECT * FROM users WHERE name = '$username'";
    $queryGetData =  mysqli_query($conn,$sqlGetData);
    if(mysqli_num_rows($queryGetData) > 0){
            while($row = mysqli_fetch_array($queryGetData)) {
                if(password_verify($password, $row['password'])) {
                    $_SESSION['name'] = $username;
                    header('Location: explore.php');
                }
                else {
                        $error = "Your Password or Name is uncorrect!";
                }
            }
    }
    else {
        $error = "Your Password or Name is uncorrect!";
    }
}   
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omega | Sign In </title>
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
    <div class="signIn">
        <h1>Login</h1>
        <form action="" method="POST">
            <p><?php echo $error?></p>
            <input type="text" name="name" placeholder="Name">
            <input type="password" name="password" placeholder="Password">
            <br>
            <button name="button">Login In</button> 
            <p style="margin-top:30px;">Haven't Signed up?: <a href="signup.php">Sign up!</a></p>
        </form>
    </div>
</body>
</html>
