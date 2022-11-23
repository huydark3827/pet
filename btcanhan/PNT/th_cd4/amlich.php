

<?php include ('./includes/header.html'); ?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem</title>

<style type="text/css">

	table{

		color: #ffff00;

		background-color: gray;		

	}

	table th{

		background-color: blue;

		font-style: vni-times;

		color: yellow;

	}

</style>



<body>

	<center>
	<?php

$mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
$mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
$mang_anh = array("hoi.jpg", "chuot.jpg", "suu.jpg", "dan.jpg", "meo.jpg", "thin.jpg", "ty.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");





$kq = NULL;
$hinh_anh = "";
 $nam_al = NULL;

if(isset($_POST['tim'])){
	if(isset($_POST['nam']) && trim($_POST['nam'])!= ""){
		echo isset($_POST['nam']);

		$nam = (int)trim($_POST['nam']);

		$nam -= 3;

		$can = $nam%10;

		$chi = $nam%12;

		$nam_al = $mang_can[$can];
		$nam_al .= " ". $mang_chi[$chi];

		$hinh = $mang_anh[$chi];

		$hinh_anh = "<img src='images/$hinh' >";

	}else echo "Chưa nhập năm bạn ơi!";
}




?>



<form action="" method="post">

<table border="0" cellpadding="0">

<tr ><td>TÍNH NĂM ÂM LỊCH</td></tr>

<tr>

	<td>Năm dương lịch</td>
	<td></td>

	<td>Năm âm lịch</td>

</tr>


<tr>
	
	<td><input type='text' name='nam' size= '20' value='<?php if(isset($_POST['nam'])) echo $_POST['nam']; ?> '/></td>
	<td><input type="submit" name="tim"  size="3" value="  => "/></td>
	<td><input type='text' name='amlich' disabled="disabled" size= '20' value='<?php echo $nam_al; ?> '/></td>
</tr>

<tr>
	<td colspan="3" align="center"><?php echo $hinh_anh ?> </td> 
</tr>



</table>




</form>
	</center>

</body>

<?php include ('./includes/footer.html'); ?>

