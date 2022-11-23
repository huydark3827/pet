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
    border: 1px solid black;
    color: black;
    text-align: center;
    height: 50px;
    
    
}


</style>
</head>
<body>
<?php include ('./includes/header.html'); ?>
<?php
$tensua = "";
$count = "";
$loaisua = "";
$hangsua = "";
if(session_id() === "") session_start();
if(isset($_POST['tim'])){
        if(isset($_POST['tensua']) && trim($_POST['tensua']) != ""){
            $tensua=trim($_POST['tensua']);
        }else {
            $tensua = "";
            echo "Nhập từ khoá tìm kiếm";
        }

            $loaisua = $_POST['loai'];
            $hangsua = $_POST['hang'];
        }

    
?>



<html>
    


<?php

    // if(isset($_POST['tim'])){
    //     if(isset($_POST['tensua']) && trim($_POST['tensua']) != ""){
    //         $tensua=trim($_POST['tensua']);
    //     }else {
    //         $tensua = "";
    //         echo "Nhập từ khoá tìm kiếm";
    //     }
        // 1. Ket noi CSDL
    
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
or die ('Không thể kết nối tới database'. mysqli_connect_error());
// 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    mysqli_set_charset($conn, 'UTF8');

    //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
    $sql = "
        SELECT sua.Hinh, sua.Ten_sua, sua.Trong_luong, sua.Don_gia, sua.Loi_ich, sua.TP_Dinh_Duong, sua.Ma_loai_sua, sua.Ma_hang_sua
        FROM (
            sua INNER JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua)
            INNER JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
        Where 1=1
        AND sua.Ten_sua LIKE '%$tensua%'
        AND loai_sua.Ma_loai_sua LIKE '%$loaisua%'
        AND hang_sua.Ma_hang_sua LIKE '%$hangsua%'
        "
        ;
    $result = mysqli_query($conn, $sql);
    $count =mysqli_num_rows($result);

// thanh tìm kiếm
// 4.Xu ly du lieu tra ve
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

?>







 <Center>
        <form action="" method="POST">
            <tr><th colspan="2">TÌM KIẾM THÔNG TIN SỮA</th></tr>
            <tr>
                <td colspan="2">
                Loại sữa
				<select style="margin:10px;" name="loai" id="">
                        <?php 
						$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
						or die ('Không thể kết nối tới database'. mysqli_connect_error());
						$query2 = "select * from loai_sua";    //Hiển thị tên các hãng sữa
                        $result2 = mysqli_query($conn, $query2); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result2)) :; ?>

                            <option value="<?php echo $rows2[0]; ?>"  <?php if(isset($_POST['loai']) && $_POST['loai'] == $rows2[0]) echo "selected"  ?>><?php echo $rows2[1]; ?></option>
                        <?php endwhile; ?>
                    </select>

                    Hãng sữa
				<select style="margin:10px;" name="hang" id="">
                        <?php 
						$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
						or die ('Không thể kết nối tới database'. mysqli_connect_error());
						$query2 = "select * from hang_sua";    //Hiển thị tên các hãng sữa
                        $result2 = mysqli_query($conn, $query2); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result2)) :; ?>

                            <option value="<?php echo $rows2[0]; ?>" <?php if(isset($_POST['hang']) && $_POST['hang'] == $rows2[0]) echo "selected"  ?>><?php echo $rows2[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                
                </td>
            </tr>
            <tr>
                <td colspan="2">Tên sữa: <input type="text" name="tensua" value="<?php if(isset($_POST['tensua'])) echo  $tensua?>">
                    <input type="submit" name="tim" value="Tìm">
                
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <?php
                    if(isset($_POST['tim']))
                            echo ($count!=null && $count>=1) ? "Đã tìm thấy $count kết quả!" : "Không có kết quả nào";
                        
                    ?>
                </td>
                
            </tr>
                
            
        </form>
    </Center>
<?php




 if(mysqli_num_rows($result)<>0)

 {	 

	while($rows=mysqli_fetch_row($result))

	{          echo "<tr>";

        echo "<tr bgcolor='#FFCC66'>";
        echo "<td colspan='2' align='center'><h2><font color='#FF9900' face='Comic sans MS' size='5'>";
        echo $rows[1];
        echo "</font></h2></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>";
        echo "<img src='./Hinh_sua/$rows[0]' width=150 height=150 style='padding: 20px;'>";
        echo "</td>";

        echo "<td width='400'>";
        echo "<strong>Thành phần dinh dưỡng: </strong></br>";
        echo $rows[5];
        echo "</br><strong>Lợi ích: </strong></br>";
        echo $rows[4];
        echo "<p align='left'>"."<strong>Trọng lượng:</strong> ".$rows[2]."g - <strong>Đơn giá:</strong> ".$rows[3]." VND"."</p>";
        echo "</td>";


        

        echo "</tr>";
		     

		     echo "</tr>";

	    

	}

 }



echo"</table>";


// 5. Xoa ket qua khoi vung nho va Dong ket noi
mysqli_free_result($result);
mysqli_close($conn);
    // }


?>

</html><?php include ('./includes/footer.html'); ?>
</body>
</html>