<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.


function lay_mtc()
    {

		$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
    		or die ('Không thể kết nối tới database'. mysqli_connect_error());
        $sql = "SELECT (MaThuCung) FROM thu_cung";
        $result = mysqli_query($conn, $sql);
        $arr = [];
        $i = 0;
        if (mysqli_num_rows($result) <> 0) {
            while ($rows = mysqli_fetch_row($result)) {

                $sinh_matc = substr($rows['0'], 3, 3);
                $n_matc_new = (int)$sinh_matc;
                $arr[$i] = $n_matc_new;
                $i++;
            }
        }
        $matc_new = max($arr) + 1;
        return $matc_new;
    }

	//sinh mã thú cừng
	$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
    		or die ('Không thể kết nối tới database'. mysqli_connect_error());
    $sql = "SELECT (MaThuCung) FROM thu_cung";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) <> 0){
		if(lay_mtc() <10)
    	$matc  = "TC00". lay_mtc();
		else{
			$matc= lay_mtc() <100? "TC0". lay_mtc() : "TC". lay_mtc();
		}
	}else{
		//trường học chưa có thú cưng nào
		$matc = "TC001";
	}
	
	
$page_title = 'Register';
include ('includes/header.html');

$errors = array(); 

$file_name = "";
$file_size = "";

if(isset($_POST['luu'])){
	// Connect to the db.
	$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
	or die ('Không thể kết nối tới database'. mysqli_connect_error());

	



	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['tenthucung'])) {
		$errors[] = 'You forgot to enter your tenthucung.';
	} else {
		$ten = mysqli_real_escape_string($conn, trim($_POST['tenthucung'])). " ";
	}
	
	// Check for a last name:
	if (empty($_POST['tuoi'])) {
		$errors[] = 'You forgot to enter your Tuoi.';
	} else {
		$tuoi = mysqli_real_escape_string($conn, trim($_POST['tuoi']));
	}
	
	// Check for an email address:
	if (empty($_POST['mausac'])) {
		$errors[] = 'You forgot to enter your email mausac.';
	} else {
		$mau = mysqli_real_escape_string($conn, trim($_POST['mausac']));
	}

	// Check for an phone number:
	if (empty($_POST['dongia'])) {
		$errors[] = 'You forgot to enter your dongia.';
	} else {
		$dongia = mysqli_real_escape_string($conn, trim($_POST['dongia']));
	}

	if (empty($_POST['mancc'])) {
		$errors[] = 'You forgot to enter your mancc.';
	} else {
		$tenncc = $_POST['mancc'];
		echo $tenncc;
		$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
			or die ('Không thể kết nối tới database'. mysqli_connect_error());
			$query2 = "select MaNCC from nha_cung_cap where TenNCC = '$tenncc'";    //Hiển thị tên các hãng sữa
			$result2 = mysqli_query($conn, $query2); 
		$mancc = mysqli_real_escape_string($conn, trim($_POST['mancc']));
	}

	if (empty($_POST['maloai'])) {
		$errors[] = 'You forgot to enter your maloai.';
	} else {
		$tenloai = $_POST['maloai'];
		echo $tenloai;
		$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
			or die ('Không thể kết nối tới database'. mysqli_connect_error());
			$query2 = "select MaLoai from loai where TenLoai = '$tenloai'";    //Hiển thị tên các hãng sữa
			$result2 = mysqli_query($conn, $query2); 
		$maloai = mysqli_real_escape_string($conn, trim($_POST['maloai']));
	}
 
		$target = "hinh_anh/" . $_FILES["hinhanh"]["name"];
		move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target );
		$file_name = $_FILES["hinhanh"]["name"];
		$file_size = $_FILES["hinhanh"]["size"];
		$anhtc = $_FILES['hinhanh']['name'];
		echo $_FILES['hinhanh']['name'];
		echo $file_name;
		echo $file_size;
  

	
	// Check for a password and match against the confirmed password:
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
				

		$q = "INSERT INTO thu_cung (MaThuCung,Ten, Tuoi, MauSac, DonGia, MaNCC, MaLoai, HinhAnh) VALUES ('$matc','$ten', '$tuoi', '$mau', '$dongia', '$mancc', '$maloai', '$anhtc')";		
		$r = @mysqli_query ($conn, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			header('Location:index.php');
			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You are now registered. In Chapter 12 you will actually be able to log in!</p><p><br /></p>';	
		
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



	// Include the footer and quit the script:
	include ('includes/footer.html'); 
	exit();
	
} 
?>
<div class="container" style="margin: auto; max-width: 50%;" >
        <form method="POST" action=""  enctype="multipart/form-data">
      
               
                    <div color="blue">
                        <p class='title' align='center'>
                            <font size='15'> THÊM SẢN PHẨM</font>
                        </P>
                    </div>  
                
            
            <div class="form-group">
                <label for="mathucung">Mã thú cưng:</label>
                <input name="mathucung" class="form-control" disabled value="<?php echo $matc ?>">
            </div>
            <div class="form-group">
                <label for="tenthucung">Tên thú cưng:</label>
                <input name="tenthucung" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="tuoi">Tuổi:</label>
                <input name="tuoi" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="mausac">Màu sắc:</label>
                <input name="mausac" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="dongia">Đơn giá:</label>
                <input name="dongia" class="form-control" value="">
            </div>
			
            <div class="form-group">
				Nhà cung cấp
				<select style="margin:10px;" name="mancc" id="" class="w3-button w3-blue w3-round-large">
                        <?php 
						$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
						or die ('Không thể kết nối tới database'. mysqli_connect_error());
						$query2 = "select * from nha_cung_cap";    //Hiển thị tên các hãng sữa
                        $result2 = mysqli_query($conn, $query2); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result2)) :; ?>

                            <option value="<?php echo $rows2[0]; ?>"><?php echo $rows2[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
            </div>

            <div class="form-group">
				Loài
				<select style="margin:10px;" name="maloai" id="" class="w3-button w3-blue w3-round-large">
                        <?php 
						$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
						or die ('Không thể kết nối tới database'. mysqli_connect_error());
						$query2 = "select * from loai";    //Hiển thị tên các hãng sữa
                        $result2 = mysqli_query($conn, $query2); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result2)) :; ?>

                            <option value="<?php echo $rows2[0]; ?>"><?php echo $rows2[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
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