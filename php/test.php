<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
<?php 
	session_start();
	$result['kuchbhi'] = "kuchbhinhi";
	echo json_encode($result);
	session_destroy();
?>
</body>
</html>
