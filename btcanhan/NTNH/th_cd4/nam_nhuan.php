

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
    
    function NamNhuan($year){
        if($year % 400 == 0 || ($year %4==0 && $year % 100 != 0)){
            return 1;
        }
        return 0;
    }

    $arr = array();
    $kq = NULL;

    if(isset($_POST['tim1'])){

        $year = $_POST['b2k'];

		if(isset($_POST['b2k'])){

            foreach(range($year, 2000) as $x){
                if(NamNhuan($x) == 1) $kq .= $x . " ";
            }

		}
	}

    if(isset($_POST['tim2'])){
        $year = $_POST['l2k'];

		if(isset($_POST['l2k'])){

            foreach(range(2000, $year) as $x){
                if(NamNhuan($x) == 1) $kq .= $x . " ";
            }

		}
	}

    if($kq == NULL) $kq = "Không có năm nhuận";
    

    
?>



<form action="" method="post">

<table border="0" cellpadding="0">

	<tr ><td> Năm nhập vào nhỏ hơn năm 2000</td></tr>

    <tr ><td>TÌM NĂM NHUẬN</td></tr>

	<tr>

		<td>Năm</td>

		<td><input type='text' name='b2k' size= '70' value='<?php if(isset($_POST['b2k'])) echo $_POST['b2k']; ?> '/></td>

	</tr>

    <tr>

		<td><input type="submit" name="tim1"  size="20" value="  Tìm năm nhuận "/></td>

	</tr>

    <tr>
        <td></td>
		<td><input type='text' name='kq1' size= '70' value='<?php if(isset($_POST['tim1'])) echo $kq; ?> '/></td>

	</tr>

    <tr > <td>Năm nhập vào lớn hơn năm 2000</td> </tr>

    <tr > <td>TÌM NĂM NHUẬN</td> </tr>

	<tr>

		<td>Năm</td>

		<td><input type='text' name='l2k' size= '70' value='<?php if(isset($_POST['l2k'])) echo $_POST['l2k']; ?> '/></td>

	</tr>

    <tr>


		<td><input type="submit" name="tim2"  size="20" value="  Tìm năm nhuận "/></td>

	</tr>

    <tr>
        <td></td>
		<td><input type='text' name='kq2' size= '70' value='<?php if(isset($_POST['tim2'])) echo $kq; ?> '/></td>

	</tr>

	

</table>




</form>

</body>

</html>

