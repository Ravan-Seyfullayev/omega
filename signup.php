<?php
    $error = "";
    session_start();
      require('connection.php');

    if(isset($_POST['button'])) {
        $select = $_POST['select'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeat-password'];
        if($password != $repeatPassword) {
            $error = "Passwords are not same!";
        }
        elseif(empty($name)){
            $error = "Name is not required";
        }
        elseif(empty($email)){
            $error = "Email is not required";
        }
        elseif(empty($password)){
            $error = "Password is not required";
        }
        elseif(strlen($password) < 8) {
            $error = "Password is too short!(minimum 8 characters)";
        }
        if($error == "") {
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (roles, name, email, password) VALUES ('$select', '$name', '$email', '$password')";
        if(!mysqli_query($conn,$sql)) {
            $error = "Something Went Wrong!";   
        }
        else {
            $_SESSION['name'] = $name;
            $_SESSION['email']= $email;
            header("Location: index.php"); 
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
   
</head>
<body>
   <h1></h1>
    <div class="signUp">
        <div class="block">
            <div class="inputs">
                <form action="" method="POST">
                    <!-- Inputs -->
                    <h1>Sign Up</h1>
                    <p><?php echo $error; ?></p>
                    <select name="select" id="">

                        <option value="Teacher">Teacher</option>
                        <option value="Student">Student</option>
                    </select>
                        <input type="text" placeholder="Name" name="name">
                        <input type="text" placeholder="E-Mail" name="email">  
                        <input type="password" placeholder="Password" name="password">
                        <input type="password" placeholder="Repeat-Password" name="repeat-password"> 
                        <a href="signin.php">Sign In</a>
                
            </div>
        </div>
        <div class="block">
            <img src="svgs/signUp.svg" alt="">
        </div>
        <div class="block">
            <button name="button">Sign Up</button>
        </div>
        </form>
    </div>
</body>
</html>
