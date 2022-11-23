<html>
<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

table{
    border-collapse: collapse;
    width: 75%;
    height: 100%;
    color: #ffff00;
    background-color: whitesmoke;     
    text-align: center;
    margin: auto;
    border: 3px solid lightblue;
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

/* tr:nth-child(odd) 
{
    background-color: lightblue;
} */
</style>

</head>

<body >

<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include ('includes/header.html');
?>
<?php
echo"<br>";



session_start();


if(isset($_POST['log_out'])){
    unset($_SESSION['dangnhap']);
}


if(!isset($_SESSION['dangnhap'])) {
    header('Location: dangnhap.php');
}




// 1. Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
or die ('Không thể kết nối tới database'. mysqli_connect_error());
// 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    mysqli_set_charset($conn, 'UTF8');
    $rowsPerPage=6; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page']))
    { $_GET['page'] = 1;
    }
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    $offset =($_GET['page']-1)*$rowsPerPage;
    //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset

    $sql = "
        SELECT tc.HinhAnh, tc.Ten, tc.MauSac, tc.DonGia, tc.MaThuCung
        FROM (
            thu_cung as tc INNER JOIN loai ON tc.MaLoai = loai.MaLoai)
            INNER JOIN nha_cung_cap as ncc ON tc.MaNCC = ncc.MaNCC";
    $result = mysqli_query($conn, 'SELECT tc.HinhAnh, tc.Ten, tc.MauSac, tc.DonGia, tc.MaThuCung
    FROM (
        thu_cung as tc INNER JOIN loai ON tc.MaLoai = loai.MaLoai)
        INNER JOIN nha_cung_cap as ncc ON tc.MaNCC = ncc.MaNCC LIMIT '. $offset . ', ' .$rowsPerPage);
// 4.Xu ly du lieu tra ve


 if(isset($_SESSION['dangnhap'])) 
    $tennd = $_SESSION['dangnhap'][0];
else
    $tennd = "";
?>
 <form action="" method="POST">
    <p style="margin:0 25%">Xin chào <b><a href=''><?php echo $tennd ?></a></b>
    <input type="submit" name ='log_out' value="Đăng xuất" class='w3-button w3-green w3-round-large'/>
    </p>
 </form>
<br>

 <p style="margin:0 25%">
 <a href="create.php" style="font-size: 20;"class="w3-button w3-xsmall w3-teal">Thêm mới <i class="fa fa-plus"></i></a>
 <a href="search.php" style="font-size: 20;"class="w3-button w3-xsmall w3-teal" >Tìm kiếm <i class="fa fa-search"></i></a>
</p>
 
 <div color="blue">
                        <p class='title' align='center'>
                            <font size='15'> DANH SÁCH PET</font>
                        </P>
                    </div>  
<?php

 echo "<table width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse; margin: 0 auto;'>";




 if(mysqli_num_rows($result)<>0)
 {	$stt=$offset+ 1;
    $n = 0;

    while($rows=mysqli_fetch_row($result))
	{         
        echo ($n%3==0) ? "<tr>" : "";
        echo "<td style='padding: 10px'>";
        echo "<p><b style='font-family:cursive;'> $rows[1] </b> </p>";
        echo "<p>$rows[2] - $rows[3] VNĐ</p>";
        echo "<a  href= 'pet_detail.php?work=detal&id=$rows[4]'>";
        echo "<img src ='hinh_anh/$rows[0]' height=200 width =200 />";
        echo "</a>";
        echo "<br>";
        echo "<br>";
        
        echo "<a class='w3-button w3-green w3-round-large' href= 'edit.php?id=$rows[4]'>Sửa</a>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a class='w3-button w3-green w3-round-large' href= 'pet_detail.php?work=delete&id=$rows[4]'>Xoá</a>";

     
        echo "</td>";
        $n+=1;
        echo ($n%3==0) ? "</tr>" : "";

	}
    

        
}
        
    



echo"</table>";

$re = mysqli_query($conn, 'select * from thu_cung');
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re);
//tổng số trang
$maxPage = floor($numRows/$rowsPerPage) + 1;
echo "<br>";
echo "<br>";
 
echo "<center>";
//về đầu

if ($_GET['page'] > 1)
{ echo "<a class='w3-button w3-green w3-round-large' href=" .$_SERVER['PHP_SELF']."?page="."1".">
<< TOP
</a> ";
}
// <p><button class="w3-button w3-green">Green</button></p>
//gắn thêm nút Back
//Điều kiện để hiển thị nút Back là trang hiện tại > 1
if ($_GET['page'] > 1)
{ echo "<a class='w3-button w3-green w3-round-large' href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">
< PREVIOUS
</a> ";
}
//hiển thị số trang
for ($i=1 ; $i<=$maxPage ; $i++) //tạo link tương ứng tới các trang
{ if ($i == $_GET['page'])
echo '<b class="w3-button w3-red w3-round-large">'. $i. '</b> '; //trang hiện tại sẽ được bôi đậm
else
echo "<a class='w3-button w3-green w3-round-large' href="
.$_SERVER['PHP_SELF']."?page=".$i.">".$i."</a> ";
}




//Điều kiện để hiển thị nút next là trang hiện tại < tổng số trang
if ($_GET['page'] < $maxPage)
{ echo "<a class='w3-button w3-green w3-round-large' href = ". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">
NEXT >
</a>";
} 

//về cuối

if ($_GET['page'] < $maxPage)
{ echo "<a class='w3-button w3-green w3-round-large' href=" .$_SERVER['PHP_SELF']."?page="."$maxPage".">
END >>
</a> ";
}

echo "</center>";

// 5. Xoa ket qua khoi vung nho va Dong ket noi
mysqli_free_result($result);
mysqli_close($conn);
?>

<?php
echo "<br>";
echo "<br>";
 
include ('includes/footer.html');
?>
</body>

</html>