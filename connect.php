<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connect</title>
</head>

<body>

	<?php
		@mysql_connect("localhost","root","") or die (mysql_error());
		@mysql_select_db ("discussion");
	?>

</body>
</html>
