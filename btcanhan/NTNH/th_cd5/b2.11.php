<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>New</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include ('includes/header.html'); 
echo "<br>";echo "<br>";echo "<br>";
?>

<?php
$errors = array(); 

$file_name = "";
$file_size = "";

if(isset($_POST['luu'])){
	// Connect to the db.
	$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
	or die ('Không thể kết nối tới database'. mysqli_connect_error());

	$errors = array(); // Initialize an error array.

    if (empty($_POST['masua'])) {
        $errors[] = 'You forgot to enter your masua.';
    } else {
        $masua = mysqli_real_escape_string($conn, trim($_POST['masua'])). " ";
    }
	if (empty($_POST['tensua'])) {
		$errors[] = 'You forgot to enter your tensua.';
	} else {
		$ten = mysqli_real_escape_string($conn, trim($_POST['tensua'])). " ";
	}
	
	// Check for a last name:
	if (empty($_POST['trongluong'])) {
		$errors[] = 'You forgot to enter your trongluong.';
	} else {
		$trongluong = mysqli_real_escape_string($conn, trim($_POST['trongluong']));
	}
	
	// Check for an email address:
	if (empty($_POST['dongia'])) {
		$errors[] = 'You forgot to enter your dongia.';
	} else {
		$dongia = mysqli_real_escape_string($conn, trim($_POST['dongia']));
	}

	// Check for an phone number:
	if (empty($_POST['TPdinhduong'])) {
		$errors[] = 'You forgot to enter your TPdinhduong.';
	} else {
		$TPdinhduong = mysqli_real_escape_string($conn, trim($_POST['TPdinhduong']));
	}

    if (empty($_POST['loiich'])) {
		$errors[] = 'You forgot to enter your loiich.';
	} else {
		$loiich = mysqli_real_escape_string($conn, trim($_POST['loiich']));
	}

    $mahangsua = mysqli_real_escape_string($conn, trim($_POST['hangsua']));
    $maloai = mysqli_real_escape_string($conn, trim($_POST['loaisua']));

	$target = "Hinh_sua/" . $_FILES["hinhanh"]["name"];
		move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target );
		$anh = $_FILES['hinhanh']['name'];
  
        if (empty($errors)) {
            echo "Không lỗi";
            $q = "INSERT INTO sua (Ma_sua,Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh) 
            VALUES ('$masua','$ten', '$mahangsua', '$maloai', '$trongluong', '$dongia', '$TPdinhduong','$loiich', '$anh')";		
            $r = @mysqli_query ($conn, $q);

            if ($r) { // If it ran OK.
                header("Location: 2.7_ct.php?id=$masua");
	                } else { // If it did not run OK.
                        // Public message:
                        echo '<h1>System Error</h1>
                        <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 

                        // Debugging message:
                        echo '<p>' . mysqli_error($conn) . '<br /><br />Query: ' . $q . '</p>';
                                    
                        } // End of if ($r) IF.

                        mysqli_close($conn); // Close the database connection.
                    }else{
                        echo '<h1>Error!</h1>
                    <p class="error">The following error(s) occurred:<br />';
                    foreach ($errors as $msg) { // Print each error.
                        echo " - $msg<br />\n";
                    }
                    echo '</p><p>Please try again.</p><p><br /></p>';
                    }
                    exit();
                } 

?>
<div class="container" style="margin: auto; max-width: 50%;  border-left:6px solid red;border-bottom:6px solid red; background-color: pink;"  >
        <form method="POST" action=""  enctype="multipart/form-data">
      
               
                    <div>
                        <p class='title' align='center'>
                            <font size='15' color="red" > THÊM SẢN PHẨM</font>
                        </P>
                    </div>  
                
            
            <div class="form-group">
                <label for="masua">Mã sua:</label>
                <input name="masua" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="tensua">Tên sua:</label>
                <input name="tensua" class="form-control" value="">
            </div>
			
            <div class="form-group">
				Hang sua
				<select style="margin:10px;" name="hangsua" id="" class="w3-button w3-blue w3-round-large">
                        <?php 
						$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
						or die ('Không thể kết nối tới database'. mysqli_connect_error());
						$query2 = "select * from hang_sua";    //Hiển thị tên các hãng sữa
                        $result2 = mysqli_query($conn, $query2); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result2)) :; ?>

                            <option value="<?php echo $rows2[0]; ?>"><?php echo $rows2[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
            </div>

            <div class="form-group">
            Loại sữa
            <select style="margin:10px;" name="loaisua" id="" class="w3-button w3-blue w3-round-large">
                        <?php 
						$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
						or die ('Không thể kết nối tới database'. mysqli_connect_error());
						$query2 = "select * from loai_sua";    //Hiển thị tên các hãng sữa
                        $result2 = mysqli_query($conn, $query2); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result2)) :; ?>

                            <option value="<?php echo $rows2[0]; ?>"><?php echo $rows2[1]; ?></option>
                        <?php endwhile; ?>
                    </select>	
            </div>

            <div class="form-group">
                <label for="trongluong">Trọng lượng:</label>
                <input name="trongluong" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="dongia">Đơn giá:</label>
                <input name="dongia" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="TPdinhduong">TP dinh dưỡng:</label>
                <input name="TPdinhduong" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="loiich">Lợi ích:</label>
                <input name="loiich" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="hinhanh">Hình ảnh:</label>
                <input  type="file"  name="hinhanh" class="form-control" />
            </div>
			
			
            <button type="submit" class="w3-button w3-green w3-round-large" name='luu'>Thêm</button>
            <button type="submit" class="w3-button w3-green w3-round-large" name='back'><a href="index.php">Trở về</a></button>
			
        </form>
    </div>
<?php include ('includes/footer.html'); ?>
</body>
</html>