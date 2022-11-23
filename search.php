<html>
<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
echo"<br>";
echo"<br>";

session_start();


if(isset($_POST['log_out'])){
    unset($_SESSION['dangnhap']);
}


if(!isset($_SESSION['dangnhap'])) {
    header('Location: dangnhap.php');
}


//Tìm kiếm mặc định
$tenpet = "";
$count = "";
$gia = 500000;
$tuoi = 1;
$loai = "PET001";
$valueGia = 1;
$valueTuoi= 1;


if(isset($_POST['tim'])){
    if(isset($_POST['tenpet']) && trim($_POST['tenpet']) != ""){
        $tenpet=trim($_POST['tenpet']);
    }else {
        $tenpet = "";
    }

    $valueGia = $_POST['gia'];
    $valueTuoi= $_POST['tuoi'];

    if($_POST['tuoi'] == 1){
        $tuoi = 1;
    }else{
        $tuoi = 10;
    }

    if($_POST['gia'] == 1){
        $gia = 500000;
    }else{
        $gia = 1000000;
    }

    $loai = $_POST['loai'];
        
    }
    



// 1. Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
or die ('Không thể kết nối tới database'. mysqli_connect_error());
// 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    mysqli_set_charset($conn, 'UTF8');
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset

    $sql = "
        SELECT tc.HinhAnh, tc.Ten, tc.MauSac, tc.DonGia, tc.MaThuCung, loai.MaLoai, tc.Tuoi
        FROM (
            thu_cung as tc INNER JOIN loai ON tc.MaLoai = loai.MaLoai)
            
        Where 1=1
        AND tc.Ten LIKE '%$tenpet%'
        AND loai.MaLoai LIKE '%$loai%'";
        // $sql .= $_POST['gia'] == 3 ? ">" :"<=" ;
        if($valueGia != 4){
            $sql .= "AND  tc.DonGia";
            if($valueGia == 3) 
                $sql .= ">" . "$gia ";
            else $sql .= "<=". "$gia ";
        }
        if($valueTuoi != 4){
            $sql .= "AND  tc.Tuoi";
            if($valueTuoi == 3) 
                $sql .= ">" . "$tuoi";
            else $sql .= "<=". "$tuoi";
        }

    // echo $sql;
        
    $result = mysqli_query($conn, $sql);
// 4.Xu ly du lieu tra ve


 if(isset($_SESSION['dangnhap'])) 
    $tennd = $_SESSION['dangnhap'][0];
else
    $tennd = "";
?>


 <form action="" method="POST">
    <p style="margin:0 25%">Xin chào <b><a href=''><?php echo $tennd ?></a></b>
    <input type="submit" name ='log_out' value="Đăng xuất"/>
    </p>
 </form>

 <Center>
        <form action="" method="POST">
            <tr><th colspan="2">TÌM KIẾM THÔNG TIN PET</th></tr>
            <br>
            <tr>
                <td colspan="2">
                Loài
				<select style="margin:10px;" name="loai" id="">
                        <?php 
						$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
						or die ('Không thể kết nối tới database'. mysqli_connect_error());
						$query2 = "select * from loai";    //Hiển thị tên các hãng sữa
                        $result2 = mysqli_query($conn, $query2); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result2)) :; ?>

                            <option value="<?php echo $rows2[0]; ?>" <?php if(isset($_POST['loai']) && $_POST['loai'] == $rows2[0]) echo "selected"  ?>><?php echo $rows2[1]; ?></option>
                            
                        <?php endwhile; ?>
                        <option value="" <?php if(isset($_POST['loai']) && $_POST['loai'] == "") echo "selected"  ?>>---</option>
                    </select>

                    Tuổi
				<select style="margin:10px;" name="tuoi" id="">
                        
                        

                            <option value="1" <?php if(isset($_POST['tuoi']) && $_POST['tuoi'] == 1) echo "selected"  ?>>< 1</option>
                            <option value="2" <?php if(isset($_POST['tuoi']) && $_POST['tuoi'] == 2) echo "selected"  ?>>< 10</option>
                            <option value="3" <?php if(isset($_POST['tuoi']) && $_POST['tuoi'] == 3) echo "selected"  ?>>> 10</option>
                            <option value="4" <?php if(isset($_POST['tuoi']) && $_POST['tuoi'] == 4) echo "selected"  ?>>> ---</option>
                        
                    </select>
                    Giá
                <select style="margin:10px;" name="gia" id="">
                        
                        

                        <option value="1" <?php if(isset($_POST['gia']) && $_POST['gia'] == 1) echo "selected"  ?>>< 500.000đ</option>
                        <option value="2" <?php if(isset($_POST['gia']) && $_POST['gia'] == 2) echo "selected"  ?>>< 1.000.000</option>
                        <option value="3" <?php if(isset($_POST['gia']) && $_POST['gia'] == 3) echo "selected"  ?>>> 1.000.000</option>
                        <option value="4" <?php if(isset($_POST['gia']) && $_POST['gia'] == 4) echo "selected"  ?>>---</option>
                    
                </select>
                
                </td>
            </tr>
            <tr>
                <td colspan="2">Tên pet: <input type="text" name="tenpet" value="<?php if(isset($_POST['tenpet'])) echo  $tenpet?>">
                    <input type="submit" name="tim" value="Tìm">
                
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <?php
                    if(isset($_POST['tim']))
                            echo ($count!=null && $count>=1) ? "<p>Đã tìm thấy $count kết quả!</p>" : "<p>Không có kết quả nào</p>";
                        
                    ?>
                </td>
                
            </tr>
                
            
        </form>
    </Center>

 
 <div color="blue">
                        <p class='title' align='center'>
                            <font size='15'> DANH SÁCH PET</font>
                        </P>
                    </div>  
<?php

 echo "<table width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse; margin: 0 auto;'>";




 if(mysqli_num_rows($result)<>0)
 {	
    $n = 0;

    while($rows=mysqli_fetch_row($result))
	{         
        echo ($n%3==0) ? "<tr>" : "";
        echo "<td style='padding: 10px'>";
        echo "<p><b style='font-family:cursive;'> $rows[1] </b> - <b style='font-family:cursive;'> $rows[6] tuổi </b> </p>";
        echo "<p>$rows[2] - $rows[3] VNĐ</p>";
        echo "<a  href= 'pet_detail.php?work=detal&id=$rows[4]&search=1'>";
        echo "<img src ='hinh_anh/$rows[0]' height=200 width =200 />";
        echo "</a>";
        echo "<br>";
        echo "<br>";

     
        echo "</td>";
        $n+=1;
        echo ($n%3==0) ? "</tr>" : "";

	}
    

        
}
        
    



echo"</table>";



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