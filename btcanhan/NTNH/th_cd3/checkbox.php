<html>
<body>
<form method="post" action="checkbox.php">
	<input type="checkbox" name="chk1" value="en +av" 
		<?php if(isset($_POST['chk1'])&& $_POST['chk1']=='en +av') echo 'checked'; else echo ""?>/>English <br> 
	<input type="checkbox" name="chk2" value="vn af"
		<?php if(isset($_POST['chk2'])&& $_POST['chk2']=='vn af') echo 'checked'; else echo ""?>/>Vietnam<br>
	
	<input type="submit" value="submit"><br>
</form>

<?php
	if(isset($_POST['chk1'])) echo  $_POST['chk1'];
	if(isset($_POST['chk2'])) echo $_POST['chk2'];
		
?>

</body>
</html>
