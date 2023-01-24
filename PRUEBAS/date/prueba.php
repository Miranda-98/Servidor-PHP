<!DOCTYPE html>
<html>
<body>

<h1>Show a Date Control</h1>

<form method="post" action="">
  <label for="birthday">Birthday:</label>
  <input type="date" id="birthday" name="birthday">
  <input type="submit">
</form>



</body>
</html>

<?php 
	echo $_POST['birthday'];
?>