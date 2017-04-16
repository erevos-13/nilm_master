<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>View My Blog</title>
</head>
<body>
<h1>My Blog</h1>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
setInterval(function(){
$("#refresh").load('find_data.php')
}, 5000);
});
</script>


<div id="refresh"></div>
</body>
</html>