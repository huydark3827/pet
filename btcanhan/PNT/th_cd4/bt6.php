
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



function TimKiem($arr, $soct){

    foreach($arr as $key => $x) {
        if($x == trim($soct))
            return "Số ". $soct. " tại vị trí: ". $key; ;
    }
        return "Không tìm thấy";
    
    
}

$arr = array();
$str = NULL;
$ketqua = NULL;

if(isset($_POST['tinh'])){

    if(isset($_POST['mang'])){
        $str = $_POST['mang'];
        $arr = explode(",", $str);
        $ketqua = TimKiem($arr, $_POST["soct"]);
    } 

}

?>

<form action="" method="post">

<table border="0" cellpadding="0">

<tr ><td colspan="2" >TÌM KIẾM</td></tr>

<tr>

    <td>Nhập dãy số</td>
    <td><input type='text' name='mang' size= '70' value='<?php if(isset($_POST['mang'])) echo $_POST['mang']; ?> '/></td>

    <td>(*)</td>

</tr>

<tr>

    <td>Nhập số cần tìm</td>
    <td><input type='text' name='soct' size= '70' value='<?php if(isset($_POST['soct'])) echo $_POST['soct']; ?> '/></td>

    <td>(*)</td>

</tr>



<tr>
<td><input type="submit" name="tinh"  size="3" value="  Tìm "/></td>
</tr>

<tr>

    <td>Mảng</td> 
    <td><input type='text' disabled="disabled " name='mangcu' size= '70' value='<?php if(isset($_POST['mang']) && isset($_POST['tinh']) ) echo $str; ?> '/></td>



</tr>

<tr>

    <td>Kết quả</td>
    <td><input type='text'  disabled="disabled "  name='ketqua' size= '70' value='<?php echo $ketqua; ?> '/></td>



</tr>




</table>




</form>
    </center>

</body>

</html>

<?php include ('./includes/footer.html'); ?>

