

<?php include ('./includes/header.html'); ?>

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

function Add($baihat, $hang, &$arr){
    foreach($arr as $key => $x){
        if ($key == $hang) return "Hạng $key đã có!";
    }
    $arr[$hang] = $baihat;
    ksort($arr);
    var_dump($_SESSION['arr']);

}

function Xuat($arr){
    $kq = NULL;
    foreach($arr as $key => $x){
        $kq .= $key. ". " . $x . "<br>";
    }
    return $kq;
}

function XoaSession(){
    $_SESSION['arr'] = array();
}

if (session_id() === '') session_start();

if(!isset($_SESSION["arr"])) $_SESSION["arr"] = array();

$ketqua = NULL;
$kq = null;

if(isset($_POST['tinh'])){
    if(isset($_POST['baihat']) && $_POST['baihat'] != ""){
        if(isset($_POST['xephang']) && $_POST['xephang'] != ""){
            Add($_POST['baihat'], $_POST['xephang'], $_SESSION["arr"]);
            $ketqua = Xuat($_SESSION["arr"]);
        }else{
            $ketqua = Xuat($_SESSION["arr"]);
            echo "Chưa nhập xếp hạng!";
        } 
    }else{
        $ketqua = Xuat($_SESSION["arr"]);
        echo "Chưa nhập bài hát!";
    } 
        
}



if(isset($_POST['xoa'])){
    XoaSession();
        
}

if(isset($_POST['showbxh'])){
    echo $ketqua;
        
}
        


?>



<form action="" method="post">

<table border="0" cellpadding="10">

<th colspan="5"><h2>Thêm bài hát</h2></th>

<tr>
    <td> Nhập bài hát:</td>
    <td ><input type='text' name='baihat' size= '50'/></td>
</tr>

<tr>

    <td> Xếp hạng:</td>
    <td ><input type='text' name='xephang' size= '50'/></td>
</tr>

    
<tr>

    <td align="center"><input  type="submit" name="tinh"  size="20" value="  Thêm  "/></td>

    <td align="center"><input  type="submit" name="xoa"  size="20" value="  Xoá danh sách  "/></td>

</tr>



<tr>

<td align="center"><input  type="submit" name="showbxh"  size="20" value="  Bảng xếp hạng  "/></td>

    <?php
        
            echo "<td> $ketqua </td>"; ?>
        
</tr>
</table>
</form>
</center>

</body>

<?php include ('./includes/footer.html'); ?>

