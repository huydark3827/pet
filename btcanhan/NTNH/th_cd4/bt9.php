

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem</title>

<style type="text/css">

	table{

		color: green;

		background-color: pink;		

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



function SapXepTang($arr){

    sort($arr);

    return $arr;
}

function SapXepGiam($arr){

    rsort($arr);

    return $arr;
}

    $arra = array();
    $arrb = array();
    $arrc = array();
    $str = NULL;
    $str2 = NULL;
    $mangtang = array();
    $manggiam = array();

    $na = NULL;$nb =NULL;


    if(isset($_POST['tinh'])){

        if(isset($_POST['manga'])  && isset($_POST['mangb'])){

            $str = $_POST['manga'];
            $arra = explode(",", $str);

            $str = $_POST['mangb'];
            $arrb = explode(",", $str);

            $na = count($arra);
            $nb = count($arrb);

            $arrc = array_merge($arra, $arrb);
            $str = implode(", ",$arrc);

            $mangtang = implode(", ",SapXepTang($arrc));
            $manggiam = implode(", ",SapXepGiam($arrc));
            
        } 

    }

    
?>

<?php include ('./includes/header.html'); ?>

<center>
<form action="" method="post">

<table border="0" cellpadding="0">

    <tr ><td colspan="2" >Đếm phần tử, ghép mảng và sắp xếp</td></tr>

	<tr>

		<td>Array A</td>
        <td><input type='text' name='manga' size= '40' placeholder='Nhap vao mang a' value='<?php if(isset($_POST['manga'])) echo $_POST['manga']; ?> ' /></td>

		<td>(*)</td>

	</tr>

    <tr>

		<td>Array B</td>
        <td><input type='text' name='mangb' size= '40' value='<?php if(isset($_POST['mangb'])) echo $_POST['mangb']; ?> '/></td>

		<td>(*)</td>

	</tr>


    <tr>
    <td><input type="submit" name="tinh"  size="3" value="  Sắp xếp "/></td>
    </tr>

    <tr>

		<td>Array A</td> 
        <td><input type='text' disabled="disabled " name='na' size= '40' value='<?php if(isset($_POST['tinh']) ) echo $na; ?> '/></td>

	

	</tr>

    <tr>

		<td>Array B</td> 
        <td><input type='text' disabled="disabled " name='nb' size= '40' value='<?php if(isset($_POST['tinh']) ) echo $nb; ?> '/></td>

	

	</tr>

    <tr>

		<td>Array C</td> 
        <td><input type='text' disabled="disabled " name='mangc' size= '40' value='<?php if(isset($_POST['tinh']) ) echo $str; ?> '/></td>

	

	</tr>

    <tr>

		<td>Array C tăng</td> 
        <td><input type='text' disabled="disabled " name='mangtang' size= '40' value='<?php if(isset($_POST['tinh']) ) echo $mangtang; ?> '/></td>

	

	</tr>

    <tr>

		<td>Array C giảm</td> 
        <td><input type='text' disabled="disabled " name='manggiam' size= '40' value='<?php if(isset($_POST['tinh']) ) echo $manggiam; ?> '/></td>

	

	</tr>

</table>




</form>
</center>
<?php include ('./includes/footer.html'); ?>

</body>

</html>