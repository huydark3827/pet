

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


$arr = array();
$str = NULL;
$mangtang = array();
$manggiam = array();

    // sort($arr);

    // return $arr;

    $temp="";
    $daySo = "";
    for($i = 0; $i < count($arr); $i++)
    {
        for($j = $i + 1; $j < count($arr); $j++)
        {
            if($arr[$i] > $arr[$j])
            {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
    // -- in ra màn hình
    $mangtang="";


function SapXepGiam($arr){

    rsort($arr);

    return $arr;
}



  

    if(isset($_POST['tinh'])){

        if(isset($_POST['mang'])){
            $str = $_POST['mang'];
            $arr = explode(",", trim($str));
            for($i = 0; $i<count($arr);	$i++)
            {
                $daySo .= "$arr[$i]  ";
            }
            $mangtang .= $daySo;
            // $mangtang = implode(", ",SapXepTang($arr));
            $manggiam = implode(",",SapXepGiam($arr));
            
        } 

    }




    
   
    
    

    
?>

<?php include ('./includes/header.html'); ?>

<center>
<form action="" method="post">

<table border="0" cellpadding="0">

    <tr ><td colspan="2" >TÌM KIẾM</td></tr>

	<tr>

		<td>Nhập dãy số</td>
        <td><input type='text' name='mang' size= '70' value='<?php if(isset($_POST['mang'])) echo $_POST['mang']; ?> '/></td>

		<td>(*)</td>

	</tr>

    



    <tr>
    <td><input type="submit" name="tinh"  size="3" value="  Sắp xếp "/></td>
    </tr>

    <tr>

		<td>Mảng tăng</td> 
        <td><input type='text' disabled="disabled " name='mangtang' size= '70' value='<?php if(isset($_POST['mang']) && isset($_POST['tinh']) ) echo $mangtang; ?> '/></td>

	

	</tr>

    <tr>

		<td>Mảng giảm</td> 
        <td><input type='text' disabled="disabled " name='manggiam' size= '70' value='<?php if(isset($_POST['mang']) && isset($_POST['tinh']) ) echo $manggiam; ?> '/></td>

	

	</tr>

   
    

	

</table>




</form>
</center>
<?php include ('./includes/footer.html'); ?>
</body>

</html>

