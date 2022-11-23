
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

function GhiFile($str){
    $path = 'output.txt';
    $fp = fopen($path, "w+");

    fwrite($fp, $str);

    fclose($fp);
}

function Tong($arr){
    $tong =0 ;
    foreach($arr as $x) $tong +=$x;
    return $tong;
}

$arr = array();
$str = NULL;
$kq = NULL;



if(isset($_POST['tinh'])){

    if(isset($_POST['mang'])){
        $str = $_POST['mang'];
        $arr = explode(",", $str);

        $arr_al = implode(" ", $arr);
        GhiFile($arr_al);
    } 

    echo $str;

    print_r($arr);


    if($str == NULL) {
        echo "Chưa nhập mảng";
    }
        
    else{
        $kq = Tong($arr);
    }
}










?>



<form action="" method="post">

<table border="0" cellpadding="0">

<tr ><td colspan="2" >NHẬP VÀ TÍNH TRÊN DÃY SỐ</td></tr>

<tr>

    <td>Nhập dãy số</td>
    <td><input type='text' name='mang' size= '70' value='<?php if(isset($_POST['mang'])) echo $_POST['mang']; ?> '/></td>

    <td>(*)</td>

</tr>

<tr>
<td><input type="submit" name="tinh"  size="3" value="  Tổng dãy số "/></td>
</tr>

<tr>

    <td>Tổng dãy số</td>
    <td><input type='text' name='ketqua' size= '70' value='<?php echo $kq; ?> '/></td>



</tr>




</table>




</form>
</center>

</body>

</html>
<?php include ('./includes/footer.html'); ?>
