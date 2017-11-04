<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
<?php 
	session_start();
	echo var_dump($_SESSION);
	session_destroy();
?>
</body>
</html>
