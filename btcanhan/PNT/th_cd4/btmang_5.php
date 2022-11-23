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

function TaoMang($n, &$arr){
     

    for($i=0;$i<$n;$i++)

    {

        $x=rand(10,20);

        $arr[$i]=$x;

    }
}

function GTLN($arr){
    $max = $arr[0];

    foreach($arr as $i){
        if($i > $max) $max = $i; 
    }

    return $max;
} 

function GTNN($arr){
    $min = $arr[0];

    foreach($arr as $i){
        if($i < $min) $min = $i; 
    }

    return $min;
}    

function Tong($arr){
    $tong = 0;
    foreach($arr as $i){
        $tong += $i;
    }

    return $tong;
}

$arr = array();
$mang = "";
 $gtln = "";
 $gtnn = "";
 $tong = "";


if(isset($_POST['tim'])){

$n = $_POST['n'];

TaoMang($n, $arr);

$mang = implode(" ", $arr);

$gtln = GTLN($arr);
$gtnn = GTNN($arr);
$tong = Tong($arr);

}

?>

<form action="" method="post">

<table border="0" cellpadding="0">

<th colspan="2"><h2>TÌM KIẾM</h2></th>

<tr>

    <td>Nhập số phần tử:</td>

    <td><input type="text" name="n" size= "70" value="<?php if(isset($_POST['n'])) echo $_POST['n'] ?> "/></td>

</tr>

<tr>



</tr>

<tr>

    <td></td>

    <td><input type="submit" name="tim"  size="20" value="   Tìm kiếm  "/></td>

</tr>





    <td>Mảng:</td>

    <td><input type="text" name="mang" size= "70" disabled="disabled" value="<?php echo $mang;?> "/></td>

</tr>

</tr>





    <td>GTLN:</td>

    <td><input type="text" name="ln" size= "70" disabled="disabled" value="<?php echo $gtln;?> "/></td>

</tr>

</tr>





    <td>GTNN:</td>

    <td><input type="text" name="nn" size= "70" disabled="disabled" value="<?php echo $gtnn;?> "/></td>

</tr>

</tr>





    <td>Tổng:</td>

    <td><input type="text" name="tong" size= "70" disabled="disabled" value="<?php echo $tong;?> "/></td>

</tr>

<tr >

    <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>

    

</tr>

</table>

</form>
</center>

</body>

</html>

<?php include ('./includes/footer.html'); ?>