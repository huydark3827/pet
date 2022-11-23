<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem va thay the</title>

<style type="text/css">

    table{

        color: #ffff00;

        background-color: gray;     

    }

    table th{

        background-color: blue;

        font-style: vni-times;

        color: yellow;

    }

</style>
</head>
<body>
<?php 

function TimKiem($arr, $so){

    foreach($arr as $key => $x) {
        if($x == trim($so))
            return "Số ". $so. " tại vị trí: ". $key; ;
    }
        return "Không tìm thấy";
    
    
}

$arr = array();
$str_kq = NULL;
$ketqua = NULL;

if(isset($_POST['tinh'])){

    if(isset($_POST['mang'])){
        $str = $_POST['mang'];
        $arr = explode(",", $str);
        $ketqua = TimKiem($arr, $_POST["so"]);
    } 

}
?>
<?php include ('./includes/header.html'); ?>
<center>
<form action="" method="post">
<table border="0" cellpadding="0">
    <th colspan="2"><h2>TÌM KIẾM</h2></th>
    <tr>
        <td>Nhập mảng:</td>
        <td><input type="text" name="mang" size= "70" value="<?php if(isset($_POST['mang'])) echo $_POST['mang']; ?>"/></td>
    </tr>
    <tr>
        <td>Nhập số cần tìm:</td>
        <td><input type="text" name="so" size="20" value="<?php if(isset($_POST['so'])) echo $_POST['so'];?>"/></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="tinh"  size="20" value="   Tìm kiếm  "/></td>
    </tr>
    <tr>
        <td>Mảng:</td>
        <td><input type="text" name="mang_kq" size= "70" disabled="disabled" value="<?php if(isset($_POST['mang']) && isset($_POST['tinh']) ) echo $str; ?> "/></td>
    </tr>
        <td>Kết quả tìm kiếm:</td>
        <td><input type="text" name="kq" size= "70" disabled="disabled" value="<?php echo $ketqua;?>"/></td>
    </tr>
    <tr >
        <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
    </tr>
</table>
</form>
</center>
<?php include ('./includes/footer.html'); ?>

</body>
</html>