<html>
<body>
<center>
<?php include ('./includes/header.html'); ?>
YOUR PROFILE: <br>
Họ Tên <?php echo $_POST["ten"]; ?> <br>
Giới tính <?php echo $_POST["radGT"]; ?> <br>
Địa chỉ <?php echo $_POST["diachi"]; ?> <br>
Số ĐT <?php echo $_POST["num"]; ?> <br>
Quốc Tịch <?php echo $_POST["region"]; ?> <br>
Môn Học 
<?php 
if(isset($_POST['chk1'])) echo  $_POST['chk1'];
if(isset($_POST['chk2'])) echo  $_POST['chk2'];
if(isset($_POST['chk3'])) echo  $_POST['chk3'];
if(isset($_POST['chk4'])) echo  $_POST['chk4'];
?> <br>
    
Ghi chú <?php echo $_POST["comment"]; ?> <br>
<a href="javascript:window.history.back(-1);">Tro ve trang truoc</a>
<?php include ('./includes/footer.html'); ?>
</center>
</body>
</html>