<!DOCTYPE html>
<html>
<head>
	<title>Phép tính</title>
</head>
<body>
	<?php 
	$pheptinh = $_REQUEST["pheptinh"];
	$so1 = $_REQUEST['so1'];
	$so2 = $_REQUEST['so2'];

	switch ($pheptinh){
		case "Cộng":
			$kq = $so1 + $so2;
			break;
		case "Trừ":
			$kq = $so1 - $so2;
			break;
		case "Nhân":
			$kq = $so1 * $so2;
			break;
		case "Chia":
			if($so2 != 0){
				$kq = round($so1 / $so2, 2);
			}else{
				$kq = "Không thể chia số 0";
			}
			
			break;
	}

	 ?>

	<form action="ketquapheptinh.php" method="post">
		<h1 style="color: blue; text-align: center;">PHÉP TÍNH TRÊN 2 SỐ</h1>
		<b style="color: red">Chọn phép tính</b>
		<?php echo $pheptinh; ?>
		<br>
		Số thứ 1 <input disabled="disabled" type="text" name="so1" value=" <?php echo $so1; ?> "> <br>
		Số thứ 2 <input disabled="disabled" type="text" name="so2" value="<?php echo $so2; ?> "> <br>
		Kết quả <input disabled="disabled" type="text" name="ketqua" value="<?php echo $kq; ?> "> <br>
	</form> 
	<a href="javascript:window.history.back(-1);">Tro ve trang truoc</a>

</body>
</html>