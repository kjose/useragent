<!DOCTYPE html>
<html>
<head>
	<title>Iframe test</title>
</head>
<body>
	User agent : <span id="ua"></span> 
	<br/><br/>------<br/><br/>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	<script type="text/javascript">
		top.document.getElementById('ua').innerHTML = navigator.userAgent;
	</script>

	<?php
	echo '<pre>' . print_r( $_SERVER , true);
	?>
</body>
</html>