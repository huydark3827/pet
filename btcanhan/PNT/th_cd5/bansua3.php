<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>  
table, th, td {  
    border: 1px solid black;  
    border-collapse: collapse;  
}  
th, td {  
    padding: 10px;  
}  
tr:nth-child(even) {  
    background-color: #eee;  
}  
th {  
    color: white;  
    background-color: gray;  
}  
</style> 
</head>
<body>
    <center>
    <?php include ('./includes/header.html'); ?>

<?php




// 1. Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
or die ('Không thể kết nối tới database'. mysqli_connect_error());
// 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    mysqli_set_charset($conn, 'UTF8');
    $rowsPerPage=3; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page']))
    { $_GET['page'] = 1;
    }
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    $offset =($_GET['page']-1)*$rowsPerPage;
    //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
    $result = mysqli_query($conn, 'SELECT * FROM khach_hang LIMIT '. $offset . ', ' .$rowsPerPage);
// 4.Xu ly du lieu tra ve
echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";

 echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

 echo '<tr >

    <th width="50">STT</th>

     <th width="50">Mã khách hàng</th>

    <th width="150">Tên khách hàng</th>

    <th width="70">Giới tính</th>

    <th width="150">Địa chỉ</th>

    <th width="150">Điện thoại</th>

    <th width="150">Email</th>


</tr>';



 if(mysqli_num_rows($result)<>0)

 {	 $stt=$offset + 1;
	while($rows=mysqli_fetch_row($result))
	{      
        
        echo "<tr>";

		     echo "<td>$stt</td>";

		     echo "<td>$rows[0]</td>";

		     echo "<td>$rows[1]</td>";

		     echo "<td>";
             if($rows[2] == 1)
              echo "<img src='nam.jpg' height = 50 width=50 >";
                else
              echo "<img src='nu.jpg' height = 50 width=50 >";
                
             
             echo "</td>";

             echo "<td>$rows[3]</td>";

             echo "<td>$rows[4]</td>";

             echo "<td>$rows[5]</td>";

		     echo "</tr>";

	             $stt+=1;

	}

 }

echo"</table>";



$re = mysqli_query($conn, 'select * from khach_hang');
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re);
//tổng số trang
$maxPage = floor($numRows/$rowsPerPage) + 1;

echo "<center>";
//về đầu

if ($_GET['page'] > 1)
{ echo "<a href=" .$_SERVER['PHP_SELF']."?page="."1".">
<<
</a> ";
}

//gắn thêm nút Back
//Điều kiện để hiển thị nút Back là trang hiện tại > 1
if ($_GET['page'] > 1)
{ echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">
<
</a> ";
}
//hiển thị số trang
for ($i=1 ; $i<=$maxPage ; $i++) //tạo link tương ứng tới các trang
{ if ($i == $_GET['page'])
echo '<b>'. $i. '</b> '; //trang hiện tại sẽ được bôi đậm
else
echo "<a href="
.$_SERVER['PHP_SELF']."?page=".$i.">".$i."</a> ";
}




//Điều kiện để hiển thị nút next là trang hiện tại < tổng số trang
if ($_GET['page'] < $maxPage)
{ echo "<a href = ". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">
>
</a>";
} 

//về cuối

if ($_GET['page'] < $maxPage)
{ echo "<a href=" .$_SERVER['PHP_SELF']."?page="."$maxPage".">
>>
</a> ";
}

echo "</center>";







// 5. Xoa ket qua khoi vung nho va Dong ket noi
mysqli_free_result($result);
mysqli_close($conn);

?>

<?php include ('./includes/footer.html'); ?>
    </center>
</body>
</html>