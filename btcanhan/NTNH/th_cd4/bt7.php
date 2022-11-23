<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mảng thay thế</title>

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
<center>
<?php include ('./includes/header.html'); ?>
<?php 
    function ThayThe($arr,$ctt,$tt)
    {
        $mangmoi = array();
        $mangmoi = $arr;
        foreach($mangmoi as $key => $giatri){
            if($giatri == trim($ctt))
            $mangmoi[$key] = trim($tt);
        }
            return $mangmoi;
    }

    $arr = array();
    $str = NULL;
    $mangmoi = array();

    if(isset($_POST['tinh'])){
        if(isset($_POST['mang'])){
            $str = $_POST['mang'];
            $arr = explode(",", $str);
            $mangmoi = ThayThe($arr, $_POST["ctt"], $_POST["tt"]);
            $str_moi = implode(",", $mangmoi);
        }
    }

?>
</center>

<center>
<form action="" method="post">
<table border="0" cellpadding="0">
    <th colspan="2"><h2>THAY THẾ</h2></th>
    <tr>
        <td>Nhập các phần tử:</td>
        <td><input type="text" name="mang" size= "70" value="<?php if(isset($_POST['mang'])) echo $_POST['mang'];?>"/></td>
    </tr>
    <tr>
        <td>Giá trị cần thay thế:</td>
        <td><input type="text" name="ctt" size="20" value="<?php if(isset($_POST['ctt'])) echo $_POST['ctt'];?>"/></td>
    </tr>
    <tr>
        <td>Giá trị thay thế:</td>
        <td><input type="text" name="tt" size="20" value="<?php if(isset($_POST['tt'])) echo $_POST['tt'];?>"/></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="tinh"  size="20" value="   Thay thế  "/></td>
    </tr>
    <tr>
        <td>Mảng cũ:</td>
        <td><input type="text" name="mangcu" size= "70" disabled="disabled" value='<?php if(isset($_POST['mang']) && isset($_POST['tinh']) ) echo $str; ?> '/></td>
    </tr>
        <td>Mảng sau khi thay thế:</td>
        <td><input type="text" name="mangmoi" size= "70" disabled="disabled" value='<?php if(isset($_POST['mang']) && isset($_POST['tinh']) ) echo $str_moi; ?> '/></td>
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