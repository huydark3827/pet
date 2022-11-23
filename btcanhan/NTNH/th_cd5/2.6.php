

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
    height: 100%;

    color: #ffff00;

    background-color: whitesmoke;     
    text-align: center;
    border: black 3px;
    margin: auto;

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

// 1. Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
or die ('Không thể kết nối tới database'. mysqli_connect_error());
// 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    mysqli_set_charset($conn, 'UTF8');
    $rowsPerPage=10; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page']))
    { $_GET['page'] = 1;
    }
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    $offset =($_GET['page']-1)*$rowsPerPage;
    //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset


$sql ="SELECT Ten_sua,Ten_hang_sua,Ten_loai,Trong_luong,Don_gia,Hinh
FROM sua s INNER JOIN loai_sua ls ON s.Ma_loai_sua = ls.Ma_loai_sua
				 INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua


";
$result = mysqli_query($conn, $sql . ' LIMIT '. $offset . ', ' .$rowsPerPage);

$n=0;
echo "<table align='center' width=fit-content border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

 echo '
 <tr >
    <td colspan=10 ><center><font size="5" color="blue"> THÔNG TIN HÃNG SỮA</font></center></td>
 </tr>';


    if(mysqli_num_rows($result)<>0)
    {	$stt=$offset+ 1;
       $n = 0;
  while($rows=mysqli_fetch_row($result))
{
    
     echo $n%5==0 ? "<tr>" : "";
        echo "<td>";
        echo "<img src='Hinh_sua/$rows[5]' height =50 width=50</img>";
        echo "</td>";
        echo "<td ><p><b> $rows[0] </b> </p> <br> 
                    $rows[1] <br>
                    $rows[2] <br>
                    $rows[3] <br>
                    $rows[4]
                    </td>";
                    $n++;
    echo $n%5==0? "</tr>" :"";
}

    }
  echo "</table>";

  $re = mysqli_query($conn, 'select * from sua');
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

</body>
</html>