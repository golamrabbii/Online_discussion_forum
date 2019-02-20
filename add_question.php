<?php
session_start();
?>
<!DOCTYPE>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/add_question.css" />

<style>

</style>


</head>
<body>

<div id="home">
<div class="header">
  <p>Online Discussion Forum</p>
</div>
<br><br>

<div class="navbar">
  <a href="index.php">home</a>
  <a href="about.php">about</a>
  <a href="home.php">question</a>
  <div class="dropdown">
    <button class="dropbtn">category 
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
  <a href="contact.php">contact</a>
  <a href="#news"></a>  
</div>
  <br><br>
 
  <div class="form" >
<div style='float:left'>
<div class="addform" >
 <img class=icn src="image/pic.png">
<br><br>
<div class="p1">
Ask your question
</div>
<div class="add">
<br><br><br>
<form action="" method='post'>
  <div class="wrap-input" data-validate="Please enter username">
<select class="input" name="category">
<option value="" disabled selected>Choose category</option>
<option name="myoption1" value="myoption1">Daily life</option>
<option name="myoption2" value="myoption2">Social networking</option>
<option name="myoption3" value="myoption3">Technology</option>
</select>
</div><br>
<textarea name="question" placeholder="Ask your quesiton" class="text_area"></textarea>

<br><br>
  <button type='submit' name='submit' class="login-form-btn">Submit</button>
</form>
</div>
</div>
</div>
<br><br><br>


<?php

date_default_timezone_set('Asia/Dhaka');
$time= date('h:i a d,F,Y');



include"connect.php";

if (isset($_POST['submit'])) {

$a = mysql_query("select name from user where user= '".$_SESSION['user']."'");
$x = mysql_fetch_array($a);
$name = $x['name'];

$question = trim($_POST['question']);
$tag=trim($_POST['category']);

if(!isset($_SESSION['user']))
{
	echo "<script>alert('Login to submit answer')</script>";
}
else
{
if(!$question||!$tag){echo "<script>alert('Invalid Input')</script>";}

else
{
$i = mysql_query("insert into discuss(name,time,tag,question) values('".$name."','".$time."','".$tag."','".$question."')");
        if($i==true){
        echo "<script>alert('Successfull')</script>";
        }

}

}

}
    ?>







</body>



</html>