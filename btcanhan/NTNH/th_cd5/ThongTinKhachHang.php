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
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
$sql="select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi from khach_hang";





$result = mysqli_query($conn, $sql);
echo "<P align='center'><font size='5'> THÔNG TIN KHACH HANG</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
echo '<tr>
<th width="50">STT</th>
<th width="50">Mã khách hàng</th>
<th width="150">Tên khách hàng</th>
<th width="200">Giới tính</th>
<th width="200">Địa chỉ</th>
</tr>';

$rowsPerPage=5; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page']))
{ 
    $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset =($_GET['page']-1)*$rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
$result = mysqli_query($conn, 'SELECT Ma_khach_hang, Ten_khach_hang, Phai,
Dia_Chi FROM khach_hang LIMIT '. $offset . ', ' .$rowsPerPage);
if(mysqli_num_rows($result)<>0)
{
     $stt=$offset+1;
while($rows=mysqli_fetch_row($result))
{ echo "<tr>";
echo "<td>$stt</td>";
echo "<td>$rows[0]</td>";
echo "<td>$rows[1]</td>";
echo "<td>";


    if($rows[2]==1)
        echo "<img src='gender/nam.png' width=50px, height=50px> ";
    else
        echo "<img src='gender/nu.png' width=50px, height=50px> ";


echo "</td>";
echo "<td>$rows[3]</td>";

echo "</tr>";
$stt+=1;
}//while
}
echo"</table>";

//---Tính số trang để hiển thị
if(mysqli_num_rows($result)<>0)
{
//hiển thị dữ liệu
}
echo"</table>";
$re = mysqli_query($conn, 'select * from khach_hang');
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re); 
//tổng số trang
$maxPage = floor($numRows/$rowsPerPage) + 1; 



//gắn thêm nút Back
if ($_GET['page'] > 1)
echo "<a href=" .$_SERVER['PHP_SELF']."?page="
.($_GET['page']-1).">Back</a> "; 
for ($i=1 ; $i<=$maxPage ; $i++) //tạo link tương ứng tới các trang
{ if ($i == $_GET['page'])
echo '<b>Trang '. $i. '</b> '; //trang hiện tại sẽ được bôi đậm
else
echo "<a href=" 
.$_SERVER['PHP_SELF']."?page=".$i.">Trang".$i."</a> ";
}
//gắn thêm nút Next
if ($_GET['page'] < $maxPage)
echo "<a href=". $_SERVER['PHP_SELF']."?page="
.($_GET['page']+1).">Next</a>";




?>
<?php include ('./includes/footer.html'); ?>



</body>
</html>
