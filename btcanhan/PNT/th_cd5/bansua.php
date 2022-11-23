<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>


	<style type="text/css">

table{
    border-collapse: collapse;
    width: 75%;
    height: auto;

    color: #ffff00;

    background-color: whitesmoke;     
    text-align: center;
    border: black 3px;
    margin: auto;
  width: 50%;
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
// 1. Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
or die ('Không thể kết nối tới database'. mysqli_connect_error());
// 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
$sql = "SELECT * FROM Khach_hang";
$result = mysqli_query($conn, $sql);
// 4.Xu ly du lieu tra ve
echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></P>";

 echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

 echo '<tr>

    <th width="50">STT</th>

     <th width="50">Mã KH</th>

    <th width="150">Tên KH</th>

    <th width="200">Giới tính</th>

</tr>';



 if(mysqli_num_rows($result)<>0)

 {	 $stt=1;

	while($rows=mysqli_fetch_row($result))

	{          echo "<tr>";

		     echo "<td>$stt</td>";

		     echo "<td>$rows[0]</td>";

		     echo "<td>$rows[1]</td>";

		     echo "<td>$rows[2]</td>";

		     echo "</tr>";

	             $stt+=1;

	}

 }

echo"</table>";
// 5. Xoa ket qua khoi vung nho va Dong ket noi
mysqli_free_result($result);
mysqli_close($conn);
?>
<?php include ('./includes/footer.html'); ?>
</body>
</html>