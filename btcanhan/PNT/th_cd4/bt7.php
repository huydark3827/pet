
<?php include ('./includes/header.html'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem</title>

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
<?php



function ThayThe($arr, $ctt, $tt){
    $mangmoi = array();
    $mangmoi = $arr;
    foreach($mangmoi as $key => $x) {
        if($x == trim($ctt))
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
        $mangmoi = ThayThe($arr, $_POST["ctt"], $_POST['tt']);
        $newstr = implode(",", $mangmoi);
    } 

}

?>

<form action="" method="post">

<table border="0" cellpadding="0">

<tr ><td colspan="2" >THAY THẾ</td></tr>

<tr>

    <td>Nhập dãy số</td>
    <td><input type='text' name='mang' size= '70' value='<?php if(isset($_POST['mang'])) echo $_POST['mang']; ?> '/></td>

    <td>(*)</td>

</tr>

<tr>

    <td>Giá trị cần thay thế</td>
    <td><input type='text' name='ctt' size= '70' value='<?php if(isset($_POST['ctt'])) echo $_POST['ctt']; ?> '/></td>

    <td>(*)</td>

</tr>

<tr>

    <td>Giá trị thay thế</td>
    <td><input type='text' name='tt' size= '70' value='<?php if(isset($_POST['tt'])) echo $_POST['tt']; ?> '/></td>

    <td>(*)</td>

</tr>

<tr>
<td><input type="submit" name="tinh"  size="3" value="  Thay thế "/></td>
</tr>

<tr>

    <td>Dãy số cũ</td> 
    <td><input type='text' disabled="disabled " name='mangcu' size= '70' value='<?php if(isset($_POST['mang']) && isset($_POST['tinh']) ) echo $str; ?> '/></td>



</tr>

<tr>

    <td>Dãy số mới</td>
    <td><input type='text'  disabled="disabled "  name='mangmoi' size= '70' value='<?php if(isset($_POST['mang']) && isset($_POST['tinh']) ) echo $newstr; ?> '/></td>



</tr>




</table>




</form>
</center>

</body>

</html>
<?php include ('./includes/footer.html'); ?>
