<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>  
table, th, td {  
    border: 1px solid pink;  
    border-collapse: collapse;  
}  
th, td {  
    padding: 10px;  
}  
</style>

</head>
<body>
    

<?php 
$page_title = 'Thành viên & phân công';
include ('includes/header.html');
echo "<br>";
echo "<br>"; ?>

<center>
<table cel border="1">
    <tr>
        <th colspan="2">Thành viên nhóm</th>
    </tr>
    <tr>
        <td>
            Họ tên
        </td>
        <td>
            Phân công
        </td>
    </tr>
    <tr>
        <td>
        Phan Ngọc Thịnh
        </td>
        <td>
            Thiết kế SQL<br>
            Đăng nhập <br>
            Đăng xuất<br>
            Thêm BT cá nhân<br>
            Thêm pet<br>
            Sửa pet<br>
            Tìm kiếm
            
        </td>
    </tr>
    <tr>
        <td>Nguyễn Trương Ngọc Huy</td>
        <td>Thiết kế web <br>
            Word<br>
            Đăng ký<br>
            Thêm BT cá nhân<br>
            Xóa pet<br>
            Xem chi tiết<br>
            Hiện danh sách
        </td>   
    </tr>
    <tr>
        <th colspan="2"><a href="index.php">Trở về</a></th>
    </tr>
</table>
</center>

<?php include ('includes/footer.html'); ?>
</body>
</html>