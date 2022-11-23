<?php include ('./includes/header.html'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Phép tính</title>
</head>
<body>
<center>
	
<?php 
	$ketqua = "";
	$m=0;
	$n=0;
	if(isset($_POST['hthi'])){
			if(($_POST['m']>=2 && $_POST['m']<=5) && ($_POST['n']>=2 && $_POST['n']<=5)) {

				$m = $_POST['m'];
				$n = $_POST['n'];
			}
			else echo "Số dòng và số cột phải từ 2 đến 5";
		
	}

	$arr = array();

	for($i = 0; $i < $m; $i++){
		for($j = 0; $j < $n; $j++){
			$x = rand(-1000, 1000);
			$arr[$i][$j] = $x;
		}
	}


	for($i = 0; $i < $m; $i++){
		for($j = 0; $j < $n; $j++){
			$ketqua .= $arr[$i][$j]." ";
		}
		$ketqua .= "&#13;&#10;";
	}



		
	 ?>

	<form action="" method="POST">
		<h1 style="color: blue; text-align: center;">MA TRẬN</h1>
		<b style="color: red">Nhập số dòng và số cột của ma trận (2-5)</b>
		<br>
		Số dòng <input type="text" name="m" value="<?php if(isset($_POST['m'])) echo $_POST['m'] ?>"> <br>
		Số số cột <input type="text" name="n" value="<?php if(isset($_POST['n'])) echo $_POST['n'] ?>"><br>
		<input type="submit" name="hthi" value="Hiển thị"> <br>

		<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>
	</form> 
</center>


</body>
</html><?php include ('./includes/footer.html'); ?>