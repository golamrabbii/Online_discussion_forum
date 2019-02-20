<!DOCTYPE>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/index.css" />

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
  <a href="home.php">Question</a>
  <div class="dropdown">
    <button class="dropbtn">Category 
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
  <a href="contact.php">Contact</a> 
   <form action="add_question.php" method="post">
  <button class="button-add">Ask quesiton</button>
</form>
</div>
<br><br>

<form class="search-container">
    <input type="text" style="color:#ebebeb" id="search-bar" placeholder="What can I help you with today?">
    <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
  </form>

<h1><u>Our User Questions</u></h1>
<br><br><br><br><br><br><br><br><br><br>
<?php
include "connect.php";

$a=mysql_query("select name,time,question,vote,comment from discuss");

while($t=mysql_fetch_array($a))
{		
?>
<div class="row">
<div class="name"><?php echo $t[0];?></div>
<div class="time"><?php echo $t[1]; ?></div>
<div class="question"><?php echo $t[2];?></div>

<image class="like" src="image/like.jpeg">
<?php echo $t[3];?>&nbsp;&nbsp;
<image class="comment" src="image/comment.png">
<?php echo $t[4];?>&nbsp;
<a href="question_view.php? txtid=<?php echo $t[2];?>">
<image class="open" src="image/open.png">
</a>
</div>

<?php
}
?>





</body>












</html>