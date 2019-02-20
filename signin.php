<?php
   session_start();
	 if(isset($_POST['signin'])){

	 if(!empty($_POST['user']) && !empty($_POST['password'])){
	 			$user = $_POST['user'];
	 			$password = $_POST['password'];

	 			$con=@mysql_connect("localhost", "root", "") or die(@mysql_error());
	 			$db=@mysql_select_db('discussion') or die(@mysql_error());

	 			$query= @mysql_query("SELECT * from user where user='".$user."' and password='".$password."'");

	 			$numrows=@mysql_num_rows($query);

	 			if($numrows !=0)
	 			{
	 				while($row=@mysql_fetch_assoc($query))
	 				{
	 					$dbuser=$row['user'];
	 					$dbpassword=$row['password'];
	 				}
	 				if($user == $dbuser && $password == $dbpassword)
	 				{

	 					
						$_SESSION['user']=$user;
						header("Location: home.php");

	 			}
	 		}
	 			else{
	 			echo "<script>alert('Invalid username or password')</script>";
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	 						}
	 			}

	 			else {
	 						echo "<script>alert('All fields are required.')</script>";
              echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	 					}

	 		}
			?>
