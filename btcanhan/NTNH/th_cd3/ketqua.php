<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>

<center>
    
<?php include ('./includes/header.html'); ?>    
<?php 



if(isset($_POST['numa']))  



    $numa=trim($_POST['numa']); 



else $numa=0;



if(isset($_POST['numb'])) 



    $numb=trim($_POST['numb']); 



else $numb=0;


if(isset($_POST['tinh']))



if (is_numeric($numa) && is_numeric($numb))  
{

if(isset($_POST['pt'])&&$_POST['pt']=='cong')
  $ketqua=$numa + $numb; 
        if(isset($_POST['pt'])&&$_POST['pt']=='tru')      
            $ketqua=$numa - $numb; 
            if(isset($_POST['pt'])&&$_POST['pt']=='nhan')    
                $ketqua=$numa * $numb; 
                if(isset($_POST['pt'])&&$_POST['pt']=='chia')  
                    $ketqua=$numa / $numb; 

}

        else {



                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 



                $ketqua="";



            }



else $ketqua=0;





?>

<form action="" method="post">
    <h2>TINH HAI SO</h2>
	<input type="radio" name="pt" value="cong"<?php if(isset($_POST['pt'])&&$_POST['pt']=='cong') echo 'checked="checked"';?> checked/>		cong
	<input type="radio" name="pt" value="tru" <?php if(isset($_POST['pt'])&&$_POST['pt']=='tru') echo 'checked="checked"';?>/>tru
	<input type="radio" name="pt" value="nhan" <?php if(isset($_POST['pt'])&&$_POST['pt']=='nhan') echo 'checked="checked"';?>/>nhan
    	<input type="radio" name="pt" value="chia" <?php if(isset($_POST['pt'])&&$_POST['pt']=='chia') echo 'checked="checked"';?>/>chia
	<br>
    <table>
        <tr><td>So thu nhat:</td>

<td><input type="text" name="numa" value="<?php  echo $numa;?> "/></td>

</tr>

<tr><td>So thu hai:</td>

<td><input type="text" name="numb" value="<?php  echo $numb;?> "/></td>

</tr>

<tr><td>Ket qua:</td>

<td><input type="text" name="ketqua" disabled="disabled" value="<?php  echo $ketqua;?> "/></td>

</tr>

</table>
    <input type="submit" value="Tinh" name="tinh">
</form>
	
<a href="javascript:window.history.back(-1);">Tro ve trang truoc</a>
<?php include ('./includes/footer.html'); ?>
</center>
</body>
</html>