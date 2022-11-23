
<html>
    <head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include ('includes/header.html');
?>
<?php


if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $conn = mysqli_connect ('localhost','root','','qlbanthucung') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
    $matc = $_GET['id'];
    $work = $_GET['work'];
    $sql = "SELECT tc.HinhAnh, tc.Ten, tc.MauSac, tc.DonGia, tc.MaThuCung, tc.tuoi, ncc.TenNCC, loai.TenLoai
    FROM (
        thu_cung as tc INNER JOIN loai ON tc.MaLoai = loai.MaLoai)
        INNER JOIN nha_cung_cap as ncc ON tc.MaNCC = ncc.MaNCC
    WHERE tc.MaThuCung='$matc'";
    $result = mysqli_query($conn, $sql);
    $rows=mysqli_fetch_row($result);
}

if (isset($_POST['huy'])){

    //nếu trang trước đó là search
    if(isset($_GET['search'])){
        header('Location:search.php');
    }else{
        header('Location:index.php');
    }
    
}

if (isset($_POST['xoa'])){
    $conn = mysqli_connect ('localhost','root','','qlbanthucung') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
    $sql = "DELETE 
            FROM thu_cung
            Where MaThuCung = '$matc'";
    mysqli_query($conn, $sql);
    header('Location:index.php');
}



?>

<!-- // 4.Xu ly du lieu tra ve -->

<?php echo $work=='delete'? 
"<div color='blue'>
<p class='title' align='center'>
    <font size='15'> XÓA PET</font>
</P>
</div>  ":
 "<div color='blue'>
 <p class='title' align='center'>
     <font size='15'> XEM CHI TIẾT PET</font>
 </P>
</div>  " ?>

<form action=""  method="POST">

 <table align="center" width="700" border="1" cellpadding="2" cellspacing="2" style="border-collapse:collapse; margin: 0 auto">


 
        <tr>
            <td>
            <p><b><?php echo "$rows[1]" ?></b> </p>
            </td>
        </tr>
        <tr>
            <td>
            <p><?php echo "$rows[2] - $rows[3] VNĐ"?></p>
            <img src ="hinh_anh/<?php echo $rows[0]?>" height=200 width =200 />
            </td>
            <td>
                <p><?php echo "$rows[5] tuổi"?></p>
                <p><?php echo "Loài: $rows[7] "?></p>
                <p><?php echo "Nhà cung cấp $rows[6] "?></p>
                
            </td>
        </tr>
        <tr>
            <?php 
                if($work=='delete'){
                    echo "<td>";
                    echo "<input class='w3-button w3-red w3-round-large' type = 'submit' name = 'xoa' value = 'Xoá'></input>";
                    echo"</td>";

                    echo "<td>";
                    echo "<input class='w3-button w3-green w3-round-large' type = 'submit' name = 'huy' value = 'Huỷ'></input>";
                    echo"</td>";
                }else{
                    echo "<td>";
                    echo "<input class='w3-button w3-green w3-round-large' type = 'submit' name = 'huy' value = 'Trở lại'></input>";
                    echo"</td>";
                }     
            ?>
        </tr>

    

        

        
    

	

 

</table>
</form>

</center>

<!-- // 5. Xoa ket qua khoi vung nho va Dong ket noi -->
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>

<?php
include ("includes/footer.html");
?>
</html>