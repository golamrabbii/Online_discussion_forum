<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/popup.css" />
</head>
<body>
<div id="home">
<div class="header">
  <p>Online Discussion Forum</p>
</div>
<br>

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
  <a href="contact.php">Contact</a>
  <form action="add_question.php" method="post">
  <button class="button-add">Ask quesiton</button>
</form>
</div>
<br><br><br>

<form class="search-container">
    <input type="text" style="color:#ebebeb" id="search-bar" placeholder="What can I help you with today?">
    <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
  </form>
 
  <br><br>
  <img class=icon src="image/pic.png">
  <br><br>
  <div class="title">
  ASK FREELY<br>
  YOUR QUESTION ???
</div>
<br><br>
<div class="p1">
Discussion site where people can hold conversations in<br> the form of posted messages.
</div>
<br><br>
<button class="button-two" id="myBtn1">SIGNUP</button>

<div class="back">
<div id="myModal1" class="modal">

  <div class="modal-content">
    <div class="modal-header">
      <span class="close1">&times;</span>
      <p>SIGNUP<p>
    </div> <br><br>
    <form action="" method="post">
    <div class="modal-body">
    <div class="wrap-input100" data-validate="Please enter your name">
<input class="input100" type="text" name="name" placeholder="Full Name">
</div>
<br><br>
 <div class="wrap-input100" data-validate="Please enter your name">
<input class="input100" type="text" name="username" placeholder="Username">
</div>
<br><br>
<div class="wrap-input100" data-validate = "Please enter password">
<input class="input100" type="password" name="pass" placeholder="Password">
</div>
<br><br><br>
<button type='submit' name="signup" class="login100-form-btn">Sign up</button><br><br><br><br><br>
    </div>
    </form>
  </div>
</div>
</div>


<button class="button-one" id="myBtn2">LOGIN</button>

<div class="back">
<div id="myModal2" class="modal">

  <div class="modal-content">
    <div class="modal-header">
      <span class="close2">&times;</span>
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

<?php
		if (isset($_POST['signup'])) {
		$username = trim($_POST['username']);
        $name = trim($_POST['name']);
        $pass = trim($_POST['pass']);
        if(isset($_POST['signup'])){
        
        if(empty($username) || empty($name))
        {
            echo "<center>Sorry please input data</center>";
        }
		else{
        include "connect.php";
        $i = mysql_query("insert into user(name,user,password) values('".$name."','".$username."','".$pass."')");
        if($i==true){
        echo "<script>alert('Successfull')</script>";
        }

        }
        }
	}

    ?>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<h3>Discussion Forum</h3>

<div class="h4">
Online discussion forums, also known as World Wide Web forums, bulletin boards, or message boards, emerged in the mid-1990s and allowed Internet surfers to post and respond to messages on the Web. 
Since that time, discussion forums have become increasingly popular. 
They cover a wide variety of topics ranging from sports, health, and business, to current events, finance, and entertainment.
The idea for Web-based discussion forums stemmed from newsgroups that used the Usenet system. 
Developed in 1979, Usenet operated as a bulletin board system and was supported by UNIX machines. 
As technology advanced, discussion forums were developed to operate on the Web, rather than on a UNIX-based system. 
Along with newsgroups, discussion forums also were similar to Internet chat. Both discussion forum and chat technologies allowed Web surfers to communicate online. Discussion forums used asynchronous communication, however, which differed from chat in that it allowed its users to post and respond to messages from any computer at any time, rather than requiring all chatters to be logged on simultaneously.
</div>

<script>
var modal1 = document.getElementById('myModal1');
var modal2 = document.getElementById('myModal2');
var btn1 = document.getElementById("myBtn1");
var btn2 = document.getElementById("myBtn2");
var span1 = document.getElementsByClassName("close1")[0];
var span2 = document.getElementsByClassName("close2")[0];

btn1.onclick = function() {
  modal1.style.display = "block";
}
btn2.onclick = function() {
  modal2.style.display = "block";
}
span1.onclick = function() {
  modal1.style.display = "none";
}
span2.onclick = function() {
  modal2.style.display = "none";
}


window.addEventListener('click', function(event) {
    if (event.target == modal1) {
    modal1.style.display = "none";
  }
});

window.addEventListener('click', function(event) {
    if (event.target == modal2) {
    modal2.style.display = "none";
  }
});

</script>


</body>
</html>

