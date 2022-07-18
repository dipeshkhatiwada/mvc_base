<!DOCTYPE html>
<html>
<head>
	<title>hello</title>
</head>
<body>
	<?php
	echo $salt=uniqid();
	echo '<br>';
	echo $pass='ram';
	echo '<br>';
	echo $pass=sha1($salt.$pass);
	?>
	<form>
		<label>Name</label>
		<input type="text" name="name">
		<br/>
		<label>Username</label>
		<input type="text" name="username">
		<br/>
	</form>
</body>
</html>