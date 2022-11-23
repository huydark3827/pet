<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <style>
    fieldset{
    display: inline-block
    }
    </style>

</head>



<body>
<?php include ('./includes/header.html'); ?>
<?php 



if(isset($_POST['ten']))  



    $chieudai=trim($_POST['ten']); 



else $ten="";



if(isset($_POST['diachi'])) 



    $chieurong=trim($_POST['diachi']); 



else $diachi="";

if(isset($_POST['num'])) 



    $chieurong=trim($_POST['num']); 



else $num="";



?>


<form align='center' action="FormUserKQ.php" name="myform" method="post">
<fieldset>
<table>

    <thead>

        
        <legend align='left'><b>ENTER YOUR PROFILE</b></legend>

    </thead>

    <tr><td>Họ tên :</td>

     <td><input type="text" name="ten" value="<?php  echo $ten;?> "/></td>

    </tr>

    <tr><td>Địa chỉ:</td>

     <td><input type="text" name="diachi" value="<?php  echo $diachi;?> "/></td>

    </tr>

    <tr><td>Số ĐT:</td>

     <td><input type="text" name="num" value="<?php  echo $num;?> "/></td>

    </tr> 

	<tr>
    <td>Giới tính:</td>
    <td>
    <input type="radio" name="radGT" value="Nam"<?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nam') echo 'checked="checked"';?> checked/>Nam
	<input type="radio" name="radGT" value="Nu" <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nu') echo 'checked="checked"';?>/>N&#7919;<br>
    </td>
    </tr>

	<tr><td>Quốc tịch:</td>
    <td>
    <select name="region">

<option value="Việt Nam" <?php if(isset($_POST['region'])&& $_POST['region']=='Việt Nam') echo 'selected';?>>

Việt Nam

</option>

<option value="Japan" <?php if(isset($_POST['region'])&& $_POST['region']=='Japan') echo 'selected';?>>

Japan

</option>

<option value="Canada" <?php if(isset($_POST['region'])&& $_POST['region']=='Canada') echo 'selected';?>>

Canada

</option>

</select>



    </td> 
    </tr>

<tr>
<td>Các môn đã học:</td>
<td>
        <input type="checkbox" name="chk1" value="PHP & SQL" 
		<?php if(isset($_POST['chk1'])&& $_POST['chk1']=='PHP & SQL') echo 'checked'; else echo ""?>/>PHP & SQL 
	    <input type="checkbox" name="chk2" value="C#"
		<?php if(isset($_POST['chk2'])&& $_POST['chk2']=='C#') echo 'checked'; else echo ""?>/>C#
        <input type="checkbox" name="chk3" value="XML"
		<?php if(isset($_POST['chk3'])&& $_POST['chk3']=='XML') echo 'checked'; else echo ""?>/>XML	
        <input type="checkbox" name="chk4" value="Python"
		<?php if(isset($_POST['chk4'])&& $_POST['chk4']=='Python') echo 'checked'; else echo ""?>/>Python

</td>
</tr>


    <tr><td>Ghi chú:</td>
    <td>
    <textarea name="comment" rows="3" cols="40" ><?php if(isset($_POST['comment'])) echo $_POST['comment']; ?></textarea>
    </td>
    </tr>



    <tr>
     <td colspan="2" align="center">
     
     <input type="submit" value="Gửi" name="gui" />
     <input type="reset" value="Hủy" name="huy" />
     
     </td>
    
    </tr>



</table>



</form>

</fieldset>
<?php include ('./includes/footer.html'); ?>
</body>



</html>