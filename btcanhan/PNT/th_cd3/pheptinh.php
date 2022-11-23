<?php include ('./includes/header.html'); ?>
<body>
<center>
	
<?php 
	$hople = 1;
		if(isset($_POST['tinh'])){
			if(!isset($_POST['pheptinh'])){
				$hople = 0;
				echo "Chưa chọn phép tính!\n";
			}
			if(!is_numeric($_POST['so1'])){
				$hople = 0;
				echo "số đầu tiên nhập sai!\n";
			}
			if(!is_numeric($_POST['so2'])){
				$hople = 0;
				echo "số thứ nhì nhập sai!\n";
			}

		}

	 ?>

	<form action="ketquapheptinh.php" method="GET">
		<h1 style="color: blue; text-align: center;">PHÉP TÍNH TRÊN 2 SỐ</h1>
		<b style="color: red">Chọn phép tính</b>
		<input type="radio" name="pheptinh" value="Cộng"> Cộng
		<input type="radio" name="pheptinh" value="Trừ"> trừ
		<input type="radio" name="pheptinh" value="Nhân"> nhân 
		<input type="radio" name="pheptinh" value="Chia"> chia
		<br>
		Số thứ nhất <input type="text" name="so1"> <br>
		Số thứ nhì <input type="text" name="so2"><br>
		<input type="submit" name="tinh" value="Tính">
	</form> 

</center>

</body>
<?php include ('./includes/footer.html'); ?>