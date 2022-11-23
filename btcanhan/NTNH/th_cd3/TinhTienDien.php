<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TienDien</title>
    <style >

body {  

    background-color: #888;

}

table{

    background: #ffd94d;

    border: 0 solid yellow;

}

thead{

    background: #fff14d;    

}

td {

    color: blue;

}

h3{

    font-family: verdana;

    text-align: center;

    /* text-anchor: middle; */

    color: #ff8100;

    font-size: medium;

}

</style>

</head>
<body>







<center>
<?php include ('./includes/header.html'); ?>

<?php 


if(isset($_POST['name']))  



$csc=trim($_POST['name']); 



else $name='';


if(isset($_POST['csc']))  



$csc=trim($_POST['csc']); 



else $csc=25;



if(isset($_POST['csm'])) 



$csm=trim($_POST['csm']); 



else $csm=30;


if(isset($_POST['dongia'])) 



$dongia=trim($_POST['dongia']); 



else $dongia=20000;




if(isset($_POST['tinh']))



if (is_numeric($csc) && is_numeric($csm) )  



    $tien=$dongia*($csm - $csc);



else {



        echo "<font color='red'>Vui lòng nhập vào số! </font>"; 



        $tien="";



    }



else $tien=0;



?>






</center>
<center>
<form action="" method="post">

<table align='center'>

<thead>

<th colspan="2" align="center"><h3>TINH TIEN DIEN</h3></th>

</thead>

<tr><td>Ten chu ho:</td>

<td><input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; else echo "" ?> "/></td>

</tr>



<tr><td>Chi so cu:</td>

<td><input type="text" name="csc" value="<?php  echo $csc;?> "/></td>

</tr>



<tr><td>Chi so moi:</td>

<td><input type="text" name="csm" value="<?php  echo $csm;?> "/></td>

</tr>



<tr><td>Don gia:</td>

<td><input type="text" name="dongia" value="<?php  echo $dongia;?>"/></td>

</tr>

<tr><td>So tien thanh toan:</td>



<td><input type="text" name="tien" disabled="disabled" value="<?php  echo $tien;?> "/></td>



</tr>



<tr>



<td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>



</tr>



</table>



</form>

<?php include ('./includes/footer.html'); ?>
</center>

</body>
</html>