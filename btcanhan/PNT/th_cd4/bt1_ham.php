<?php include ('./includes/header.html'); ?>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Xử lý n</title>

</head>

<body>

<center>
<?php

function TaoMang($n, &$arr){
     

    for($i=0;$i<$n;$i++)

    {

        $x=rand(-100,200);

        $arr[$i]=$x;

    }
}

function DemChan($arr){
    $count = 0;
    foreach($arr as $x){
        if($x%2==0) $count++;
    }
    return $count;
}

function DemBe100($arr){
    $count = 0;
    foreach($arr as $x){
        if($x < 100) $count++;
    }
    return $count;
}

function TongAm($arr){
    $tong = 0;
    foreach($arr as $x){
        if($x <0) $tong += $x;
    }

    return $tong;
}

function DemKeCuoi0($arr){
    $count = 0;
    foreach($arr as $x){
        $x /=10;
        if($x%10 == 0 && $x >10) $count++;
    }
    return $count;
}

function SapXep($arr){

    sort($arr);

    return $arr;
}


if(isset($_POST['n'])) $n=$_POST['n'];

else $n=0;



$ketqua="";

if(isset($_POST['hthi'])) 

{   //tạo mảng có n phần tử, các phần tử có giá trị [-100,100]

    $arr=array();
    TaoMang($n, $arr);

    //In ra mảng vừa tạo

    $ketqua="Mảng được tạo là:" .implode(" ",$arr)."&#13;&#10;";



    //Tìm và in ra các số dương chẵn trong mảng dùng hàm foreach
    
    

    $ketqua.="Có ".DemChan($arr)." số chẵn trong mảng". "&#13;&#10;";

    $ketqua.="Có ".DemBe100($arr)." số bén hơn 100 trong mảng". "&#13;&#10;";

    $ketqua.="Có ".DemKeCuoi0($arr)." số kề cuối là 0 trong mảng". "&#13;&#10;";

    $ketqua .= "Sắp xếp: ". implode(", ", SapXep($arr));



    

            

}

?>

<form action="" method="post">

Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>

<input type="submit" name="hthi" value="Hiển thị"/><br>

Kết quả: <br>

<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>

</form>

</center>
</body>

<?php include ('./includes/footer.html'); ?>