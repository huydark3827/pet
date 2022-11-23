<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>  
table, th, td {  
    border: 1px solid black;  
    border-collapse: collapse;  
}  
th, td {  
    padding: 10px;  
}  
tr:nth-child(even) {  
    background-color: #eee;  
}  
th {  
    color: white;  
    background-color: gray;  
}  
</style> 
</head>
<body>
    <center>
    <?php include ('./includes/header.html'); ?>

<?php

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $conn = mysqli_connect ('localhost','root','','qlbansua') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
    $makh = $_GET['id'];
    $work = $_GET['work'];
    $sql = "SELECT * FROM khach_hang
    WHERE Ma_khach_hang='$makh'";
    $result = mysqli_query($conn, $sql);
    $rows=mysqli_fetch_row($result);
}

//kiem dang trong giao dien xoa

$isDelete = $work == "delete" ? true : false;


if (isset($_POST['xoa'])){
    $conn = mysqli_connect ('localhost','root','','qlbansua') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
    $errors = false;

    $q = "SELECT Ma_khach_hang 
    FROM khach_hang 
    WHERE EXISTS (SELECT Ma_khach_hang 
                  FROM khach_hang 
                  WHERE khach_hang.Ma_khach_hang = '$makh')";
    
    $r= mysqli_query($conn, $q);
    if(mysqli_num_rows($result)<>0)
        $errors = true;
    else $errors = false;
    if($errors){
        echo '<h1>System Error</h1>
                <p class="error">Khách hàng tham gia hoá đơn không thể xoá!</p>'; 
                
                // Debugging message:
    }else{
        $sql = "DELETE 
            FROM khach_hang
            Where Ma_khach_hang = '$makh'";
        mysqli_query($conn, $sql);
        header('Location:2.12.php');
    }
    
}

if (isset($_POST['capnhat'])){

        // Connect to the db.
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die ('Không thể kết nối tới database'. mysqli_connect_error());

        $errors = array(); // Initialize an error array.
    
        
        // Check for name:
        if (empty($_POST['tenkh'])) {
            $errors[] = 'You forgot to enter your last name.';
        } else {
            $tenkh = mysqli_real_escape_string($conn, trim($_POST['tenkh']));
        }
        //gioitinh
        if($_POST['gioiTinh'] == "Nam"){
            $phai = mysqli_real_escape_string($conn, "0");
        }else{
            $phai = mysqli_real_escape_string($conn, "1");
        }
        
    
        // Check for an phone number:
        if (empty($_POST['diachi'])) {
            $errors[] = 'You forgot to enter your diachi.';
        } else {
            $diachi = mysqli_real_escape_string($conn, trim($_POST['diachi']));
        }
    
        if (empty($_POST['dienthoai'])) {
            $errors[] = 'You forgot to enter your phone number.';
        } else {
            $dienthoai = mysqli_real_escape_string($conn, trim($_POST['dienthoai']));
        }
        
        if (empty($_POST['email'])) {
            $errors[] = 'You forgot to enter your phone email.';
        } else {
            $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        }
        

        
        // Check for a password and match against the confirmed password:
        
        if (empty($errors)) { // If everything's OK.
        
            // Register the user in the database...
            
            // Make the query:
            $q = $query =
            "UPDATE khach_hang
            SET  Ten_khach_hang = '$tenkh', Phai =$phai, Dia_chi = '$diachi',
            Dien_thoai = '$dienthoai',
            Email = '$email'
                    WHERE Ma_khach_hang = '$makh'";
            echo $q;
            $r = @mysqli_query ($conn, $q); // Run the query.
            if ($r) { // If it ran OK.
                echo "<script>alert('Đã cập nhật $makh!');</script>";
                
                header('Location:2.12.php');
    
            
            
            } else { // If it did not run OK.
                
                // Public message:
                echo '<h1>System Error</h1>
                <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
                
                // Debugging message:
                echo '<p>' . mysqli_error($conn) . '<br /><br />Query: ' . $q . '</p>';
                            
            } // End of if ($r) IF.
            
            mysqli_close($conn); // Close the database connection.
    
            // Include the footer and quit the script:
            include ('includes/footer.html'); 
            exit();
            
        } else { // Report the errors.
        
            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br />';
            foreach ($errors as $msg) { // Print each error.
                echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';
            
        } // End of if (empty($errors)) IF.
    

    
}

?>






<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>

<form action="" method="POST">
<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>

<tr >

    <th colspan=2>CẬP NHẬT THÔNG TIN KHÁC HÀNG</th>

     

</tr>

        
        <tr>
            <td width = 150>Mã KH</td>
		    <td> <input type="text" name="makh" value="<?php echo $rows[0]?>" disabled></td>
        </tr>
        <tr>
            <td>Tên khách hàng</td>
		    <td><input type="text" name="tenkh" value="<?php echo $rows[1]?>" <?php if($isDelete) echo "disabled"?>></td>
        </tr>
            <td>Phái</td>
            <td colspan="2"><input type="radio" name="gioiTinh" value="Nam" <?php if($rows[2] == 0) echo 'checked="checked"';  ?> <?php if($isDelete) echo "disabled"?>/>  Nam
			<input type="radio" name="gioiTinh" value="Nữ" <?php if($rows[2] == 1) echo 'checked="checked"';?>/> Nữ
		    </td>
                
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachi" value="<?php echo $rows[3]?>" <?php if($isDelete) echo "disabled"?>></td>
        </tr> 
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" name="dienthoai" value="<?php echo $rows[4]?>" <?php if($isDelete) echo "disabled"?>></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $rows[5]?>" <?php if($isDelete) echo "disabled"?>></td>

		</tr>
        <tr>
        <?php 
                if($work=='delete'){
                    echo "<td colspan=2>";
                    echo "<center><input type = 'submit' name = 'xoa' value = 'Xoá'></input></center>";
                    echo"</td>";

                }else{
                    echo "<td colspan=2>";
                    echo "<center><input  type = 'submit' name = 'capnhat' value = 'Cập nhật'></input></center>";
                    echo"</td>";
                }     
            ?>

		</tr>


</table>

</form>

</center>






<?php
// 5. Xoa ket qua khoi vung nho va Dong ket noi
mysqli_free_result($result);
mysqli_close($conn);

?>

<?php include ('./includes/footer.html'); ?>
    </center>
</body>
</html>