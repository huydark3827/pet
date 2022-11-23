
<?php include ('./includes/header.html'); ?>
<form action="" name="myform" method="post">

	Your Name: <input type="test" name="Name" size=20 value="<?php if(isset($_POST['Name'])) echo $_POST['Name'];?>" />

	<br>

	<input type="submit" name="submit" value="Submit">

</form>

<?php
	if (isset($_POST["Name"]))
		print "Hello " . $_POST["Name"];
?>

</body>
<?php include ('./includes/footer.html'); ?>
