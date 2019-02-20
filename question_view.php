<?php
session_start();
?>
<!DOCTYPE>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/popup.css" />
<style>
.search{
position:relative;
  width: 430px;
  display: block;
  float:right;
  right:-20px;
  top:-45px;
}
.backk{
position: relative;
width:100%;
top: -210px;
 background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
}
</style>
</head>

<body>
<div id="home">
<div class="header">
  <p>Online Discussion Forum</p>
</div>
<br><br>
<div class="navbar">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="home.php">Questions</a>
  <div class="dropdown">
    <button class="dropbtn">Category 
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
 <a href="contact.php">Contacts</a>   
</div>
 <form action="add_question.php" method="post">
  <button class="button-add">Ask quesiton</button>
</form>
<button class="button-login" id="myBtn">Login</button>

<div class="backk">
<div id="myModal" class="modal">

  <div class="modal-content">
    <div class="modal-header">
      <span class="close1">&times;</span>
      <p>LOGIN<p>
    </div> <br><br>
    <form action="signin.php" method="post">
    <div class="modal-body">
 <div class="wrap-input100" data-validate="Please enter username">
<input class="input100" type="text" name="user" placeholder="Username">
</div>
<br><br>
<div class="wrap-input100" data-validate = "Please enter password">
<input class="input100" type="password" name="password" placeholder="Password">
</div>
<br><br><br>
<button type='submit' name='signin' class="login100-form-btn">Login</button><br><br><br><br><br>
    </div>
    </form>
 </div>
</div>
</div>

<a href="logout.php"><button class="button-logout">Logout</button></a>

<form class="search">
    <input type="text" style="color:#ebebeb" id="search-bar" placeholder="How can I help you?">
    <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
  </form>
<br><br><br>
<?php
$question=$_GET['txtid'];

include "connect.php";

$i=mysql_query("select * from discuss where question='".$question."' LIMIT 1");
$j=mysql_query("select postedon,postedby,answer from discuss where question='".$question."'");
while($t=mysql_fetch_array($i))
{		
?>
<div class="row">
<div class="name"><?php echo $t[0];?></div>
<div class="time"><?php echo $t[1]; ?></div>
<div class="question"><?php echo $t[2];?></div>
<image class="like" src="image/like.jpeg">
<?php echo $t[3];?>&nbsp;&nbsp;
<image class="comment" src="image/comment.png">
<?php echo $t[4];?><br><br>
<div class="name">
<?php echo $t[4];?>
 Answers
</div><br><br>
<?php
$name=$t[0];
$time=$t[1];
$vote=$t[3];
$comment=$t[4];
}
while($p=mysql_fetch_array($j))
{
?>
<div class="name"><?php echo $p[1]; ?></div>
<div class="time"><?php echo $p[0];?></div>
<div class="question"><?php echo $p[2];?></div><br><br>
<?php
}
?>
<form action="" method="post">
<textarea name="ans" placeholder="Submit your answer" class="common"></textarea>
<button class="button-submit" type="submit" name="add" >Submit</button>
</form>

<?php

date_default_timezone_set('Asia/Dhaka');
$postedon= date('h:i a d,F,Y');



include"connect.php";

if (isset($_POST['add'])) {

$a = mysql_query("select name from user where user= '".$_SESSION['user']."'");
$x = mysql_fetch_array($a);
$postedby = $x['name'];

$answer = trim($_POST['ans']);

if(!isset($_SESSION['user']))
{
	echo "<script>alert('Login to submit answer')</script>";
}
else
{
if(!$answer){echo "<script>alert('Invalid Input')</script>";}

else
{
$comment=$comment+1;
$i = mysql_query("insert into discuss(name,time,question,vote,comment,postedon,postedby,answer) values('".$name."','".$time."','".$question."','".$vote."','".$comment."','".$postedon."','".$postedby."','".$answer."')");
        if($i==true){
        echo "<script>alert('Successfull')</script>";
        }

}

}

}
    ?>

<script>
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close1")[0];


btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}

window.addEventListener('click', function(event) {
    if (event.target == modal) {
    modal.style.display = "none";
  }
});

</script>





</body>
</html>