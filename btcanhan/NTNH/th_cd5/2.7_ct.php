<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chi tiết sản phẩm</title>

	<style type="text/css">
table{
    border-collapse: collapse;
  
    height: auto;

    color: #ffff00;

    background-color: whitesmoke;     
    text-align: center;
    border: black 3px;
    margin: auto;
  width: 70%;
  border: 3px solid green;
  padding: 10px;

}

table th{

    background-color: blue;

    font-style: vni-times;

    color: yellow;
    text-align: center;
    height: 40px;



}

table td
{
	border: 1px solid black;
    color: black;
    text-align: center;
    height: 50px;
    
    
}

tr:nth-child(odd) 
{
    background-color: lightblue;
}
</style>
</head>
<body>
<?php include ('./includes/header.html'); ?>
	<?php 

		if (isset($_GET["id"]) && !empty($_GET["id"])) {
			$conn = mysqli_connect ('localhost','root','','qlbansua') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
			$MaSua = $_GET['id'];
			$select = "SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, sua.Hinh, sua.TP_Dinh_Duong, sua.Loi_ich, sua.Trong_luong, sua.Don_gia FROM sua, loai_sua, hang_sua WHERE sua.Ma_sua = '$MaSua' and sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua ";
			$result = mysqli_query($conn, $select);

		}

		echo "<table align='center' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
		 if(mysqli_num_rows($result)<>0)
		 {
		 	$rows=mysqli_fetch_row($result);
			
				echo "<tr bgcolor='#FFCC66'>";
				echo "<td colspan='2' align='center'><h2><font color='#FF9900' face='Comic sans MS' size='5'>";
				echo $rows[0]." - ".$rows[1];
				echo "</font></h2></td>";
				echo "</tr>";

		    	echo "<tr>";
		    	echo "<td>";
		    	echo "<img src='./Hinh_sua/$rows[2]' width=150 height=150 style='padding: 20px;'>";
		    	echo "</td>";

		    	echo "<td width='400'>";
		    	echo "<strong>Thành phần dinh dưỡng: </strong></br>";
		    	echo $rows[3];
		    	echo "</br><strong>Lợi ích: </strong></br>";
		    	echo $rows[4];
				echo "<p align='right'>"."<strong>Trọng lượng:</strong> ".$rows[5]."g - <strong>Đơn giá:</strong> ".$rows[6]." VND"."</p>";
		    	echo "</td>";


		    	

		    	echo "</tr>";
		    	echo "<tr>";
		    	echo "<td>";
		    	echo "<a href='2.7.php'>Quay về</a>";
		    	echo "</td>";
		    	echo "</tr>";
					
			
		 }
		echo"</table>";
	?>
	<?php include ('./includes/footer.html'); ?>
</body>
</html>