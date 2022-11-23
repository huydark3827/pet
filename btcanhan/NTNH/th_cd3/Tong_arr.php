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

<?php 


$str="";

$str_kq="";

$ketqua="";
$min = "";
$max = "";

function tong($arr)
{
    $tong = 0;
    for($i =0 ; $i < count($arr); $i++){
        $tong += $arr[$i];}
        return $tong;
    
}
function minn($arr)
{
    $min = $arr[0];
    for($i =0 ; $i < count($arr); $i++){
    if($min > $arr[$i])
    $min =  $arr[$i];
    
    }
    return $min;
}
function maxx($arr)
{
    $max = $arr[0];
    for($i =0 ; $i < count($arr); $i++){
    if($max < $arr[$i])
    $max =  $arr[$i];
    
    }
    return $max;
}

if(isset($_POST['tinh'])){

	$str=$_POST['mang'];

	$arr=explode(",",$str);

	$str_kq=implode(" , ",$arr);

	//$vitri=tim_kiem($arr,$so);

	//if($vitri!=-1){

	//	$ketqua="Tìm thấy ".$so." tại vị trí thứ ". $vitri ." của mảng.";
        $ketqua = tong($arr);

        $min = minn($arr);
        $max = maxx($arr);

	}

	else{

		$ketqua="Chua nhap!";

	}



?>

<form action="" method="post">

<table border="0" cellpadding="0">

	<th colspan="2"><h2>TÌM KIẾM</h2></th>

	<tr>

		<td>Nhập mảng:</td>

		<td><input type="text" name="mang" size= "70" value="<?php echo $str;?> "/></td>

	</tr>

	

	<tr>

		<td></td>

		<td><input type="submit" name="tinh"  size="20" value="   Tinh Tong  "/></td>

	</tr>

	<tr>

		<td>Mảng:</td>

		<td><input type="text" name="mang_kq" size= "70" disabled="disabled" value="<?php echo $str_kq;?> "/></td>

	</tr>

	

		<td>Kết quả:</td>

		<td><input type="text" name="kq" size= "70" disabled="disabled" value="<?php echo $ketqua;?> "/></td>

	</tr>

	<tr >


	</tr>

	

		<td>MIN:</td>

		<td><input type="text" name="min" size= "70" disabled="disabled" value="<?php echo $min;?> "/></td>

	</tr>


    </tr>

	

<td>MAX:</td>

<td><input type="text" name="max" size= "70" disabled="disabled" value="<?php echo $max;?> "/></td>

</tr>

	<tr >
		<td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>

		

	</tr>

</table>

</form>

</body>

</html>

