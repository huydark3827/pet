<!DOCTYPE html>
<html>
<head>
    <title>Phép tính</title>
</head>
<body>

  <center>
  <?php include ('./includes/header.html'); ?>
  <?php 

$php = NULL;
$c = NULL;
$xml = NULL;
$python = NULL;
$ghichu = NULL;

$hoten = $_REQUEST['hoten'];
$diachi = $_REQUEST['diachi'];
$gioitinh = $_REQUEST['gt'];
$sdt = $_REQUEST['sdt'];
$quoctich = $_REQUEST['quoctich'];

if(isset($_REQUEST['php'])){
    $php = $_REQUEST['php'] . ", ";
}
if(isset($_REQUEST['c'])){
    $c = $_REQUEST['c'] . ", ";
}
if(isset($_REQUEST['xml'])){
    $xml = $_REQUEST['xml'] . ", ";
}
if(isset($_REQUEST['python'])){
    $python = $_REQUEST['python'];
}

$ghichu = $_REQUEST['ghichu'];

?>

<b>Bạn đã đăng nhập thành công </b><br>

<?php

echo "Họ tên: ". $hoten; echo "<br>";
echo "Địa chỉ: ". $diachi;echo "<br>";
echo "Số điện thoại: ". $sdt;echo "<br>";
echo "Giới tính: ". $gioitinh;echo "<br>";
echo "Quốc tịch: ". $quoctich;echo "<br>";
echo "Môn học: ". $php . $c. $xml. $python; echo "<br>";
echo "Ghi chú: ". $ghichu;echo "<br>";
?>

<?php include ('./includes/footer.html'); ?>
  </center>


</body>
</html>