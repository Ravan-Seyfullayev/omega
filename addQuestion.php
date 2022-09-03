<?php
  require('connection.php');
  session_start();
  $notification = '';
  if(empty($_SESSION['name'])) {
    header('Location: index.php');
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./mathquill/mathquill.css"/>
    <link rel="stylesheet" href="css/addQuestion.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./mathquill/mathquill.js"></script>
    <script src="//unpkg.com/mathlive/dist/mathlive.min.js"></script>
    
</head>
<body>
<script src="//unpkg.com/mathlive/dist/mathlive.min.js"></script>

<form action="" method="POST" id="form">
<math-field  style="
    font-size: 20px; 
    width: 400px;
    height: 50px;
    padding: 4px; 
    border-radius: 8px;
    border: 1px solid rgba(0, 0, 0, .3); 
    box-shadow: 0 0 8px rgba(0, 0, 0, .2);
" virtual-keyboard-mode=manual math-mode-space=\;   id="math-field" >
  </math-field>
  <br>
<input type="radio" name="radioButton" value="A" class="variantsRadio"><input type="text" name="variantA" class="variantsText">
<br>
<input type="radio" name="radioButton" value="B" class="variantsRadio"><input type="text" name="variantB" class="variantsText">
<br>
<input type="radio" name="radioButton" value="C" class="variantsRadio"><input type="text" name="variantC" class="variantsText" >
<br>
<input type="radio" name="radioButton" value="D" class="variantsRadio"><input type="text" name="variantD" class="variantsText">
<br>
<input type="text" id="inputA" name="input" style="visibility:hidden;">

<input type="number" name="point" id="numberSelector" placeholder="Score"> 
 <br>
<select name="type" id="type" >  <!-- Selects -->
  <option value="Algebra">Algebra</option>
  <option value="Calculus">Calculus</option>
  <option value="Geometry">Geometry</option>
  <option value="Pre-Algebra">Pre-Algebra</option>
  <option value="Pre-Calculus">Pre-Calulus</option>
</select>
<br>
<button name="btn" type="submit" id="btn"  onclick="addAttribute()" >Submit</button>

</form>


<?php   
if(isset($_POST['btn'])) {  // Variantlar
  $input = $_POST['input'];
  $trueAnswer = $_POST['radioButton'];
  $variantA = $_POST['variantA'];
  $variantB = $_POST['variantB'];
  $variantC = $_POST['variantC'];
  $variantD = $_POST['variantD'];
  $type = $_POST['type'];
  $point = $_POST['point'];
  $author = $_SESSION['name']; 
  $sql="INSERT INTO questions (question, author, variantA, variantB, variantC, variantD, trueAnswer,type,point) VALUES ('$input','$author','$variantA','$variantB', '$variantC', '$variantD', '$trueAnswer','$type','$point')";
  if(!mysqli_query($conn,$sql)) {
    $notification = "There was an error while posting your question!";
  }
  else {
    $notification = "Your Answer was posted!";
  }
}
  ?>


  
<style>
  #math-field {
    border: 2px solid black; 
    width: 500px;
  }

</style>
<script>
// Backslash duzelden
var mathFieldSpan = document.getElementById('math-field');
function addAttribute() {
  var b = mathFieldSpan.value.split('\\').join('\\\\');
  document.getElementById("inputA").value = b;   
}


var latexSpan = document.getElementById('latex');

var MQ = MathQuill.getInterface(2);
var mathField = MQ.MathField(mathFieldSpan, {
  handlers: {
    edit: function() { 
      latexSpan.textContent = mathField.latex(); 
    }
  }
});</script>


</body>
</html>

