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


if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $conn = mysqli_connect ('localhost','root','','qlbanthucung') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
    $matc = $_GET['id'];
    $sql = "SELECT tc.HinhAnh, tc.Ten, tc.MauSac, tc.DonGia, tc.MaThuCung,tc.Tuoi,tc.MaNCC, ncc.TenNCC, loai.MaLoai
    FROM (
        thu_cung as tc INNER JOIN loai ON tc.MaLoai = loai.MaLoai)
        INNER JOIN nha_cung_cap as ncc ON tc.MaNCC = ncc.MaNCC
    WHERE tc.MaThuCung='$matc'";
    $result = mysqli_query($conn, $sql);
    $rows=mysqli_fetch_row($result);
    $mancc = $rows[7];
    $maloai = $rows[8];
}
	
$page_title = 'Edit';
include ('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Connect to the db.
    $conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
    or die ('Không thể kết nối tới database'. mysqli_connect_error());



	$errors = array(); // Initialize an error array.

	
	// Check for a last name:
	if (empty($_POST['tenthucung'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$tenthucung = mysqli_real_escape_string($conn, trim($_POST['tenthucung']));
	}
	
	// Check for an email address:
	if (empty($_POST['tuoi'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$tuoi = mysqli_real_escape_string($conn, trim($_POST['tuoi']));
	}

    // Check for an phone number:
	if (empty($_POST['mausac'])) {
		$errors[] = 'You forgot to enter your phone number.';
	} else {
		$mausac = mysqli_real_escape_string($conn, trim($_POST['mausac']));
	}

    if (empty($_POST['dongia'])) {
		$errors[] = 'You forgot to enter your phone number.';
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

    if($_FILES["hinhanh"] == null ||$_FILES["hinhanh"]['name']=="" ){
        $anhtc = $rows[0];
		echo $anhtc;

    }else{
        $target = "hinh_anh/" . $_FILES["hinhanh"]["name"];
		move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target );
		$file_name = $_FILES["hinhanh"]["name"];
		$file_size = $_FILES["hinhanh"]["size"];
		$anhtc = $_FILES['hinhanh']['name'];
		echo $_FILES['hinhanh']['name'];
		echo $file_name;
		echo $file_size;
    }
    

	
	// Check for a password and match against the confirmed password:
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = $query =
        "UPDATE thu_cung
        SET  Ten = '$tenthucung', Tuoi =$tuoi, MauSac = '$mausac',
        DonGia = '$dongia',
        HinhAnh = '$anhtc',
        MaNCC = '$mancc',
        MaLoai = '$maloai'
                WHERE MaThuCung = '$matc'
        ";;		
		$r = @mysqli_query ($conn, $q); // Run the query.
		if ($r) { // If it ran OK.
            echo "<script>alert('Đã cập nhật $matc!');</script>";
            header("Location:index.php");
            
            

		
		
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
	
	mysqli_close($conn); // Close the database connection.

} // End of the main Submit conditional.


if(isset($_POST['back'])){
    header('Location:index.php');
}
?>
<div class="container" style="margin: auto; max-width: 50%;" >
        <form method="POST" action=""  enctype="multipart/form-data">
      
               
                    <div color="blue">
                        <p class='title' align='center'>
                            <font size='15'> CẬP NHẬT SẢN PHẨM</font>
                        </P>
                    </div>  
                
            
            <div class="form-group">
                <label for="mathucung">Mã thú cưng:</label>
                <input name="mathucung" class="form-control" disabled value="<?php echo $matc ?>">
            </div>
            <div class="form-group">
                <label for="tenthucung">Tên thú cưng:</label>
                <input name="tenthucung" class="form-control" value="<?php echo $rows[1] ?>">
            </div>
            <div class="form-group">
                <label for="tuoi">Tuổi:</label>
                <input name="tuoi" class="form-control" value="<?php echo $rows[5] ?>">
            </div>
            <div class="form-group">
                <label for="mausac">Màu sắc:</label>
                <input name="mausac" class="form-control" value="<?php echo $rows[2] ?>">
            </div>
            <div class="form-group">
                <label for="dongia">Đơn giá:</label>
                <input name="dongia" class="form-control" value="<?php echo $rows[3] ?>">
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

                            <option value="<?php echo $rows2[0]; ?>"  <?php if($rows2[0]==$mancc) echo 'selected';?> ><?php echo $rows2[1];?> </option>
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

                        <option value="<?php echo $rows2[0]; ?>"  <?php if($rows2[0]==$maloai) echo 'selected';?> ><?php echo $rows2[1];?> </option>
                        <?php endwhile; ?>
                    </select>
            </div>
            <div class="form-group">
                <label for="hinhanh">Hình ảnh:</label>
                <input  type="file"  name="hinhanh" class="form-control" value="<?php echo "hinh_anh/".$rows[0] ?>" />
            </div>
			
			
            <button type="submit" class="w3-button w3-green w3-round-large" name='luu'>Cập nhật</button>
            <button type="submit" class="w3-button w3-green w3-round-large" name='back'><a href="index.php">Trở về</a></button>
			
        </form>
    </div>
<?php include ('includes/footer.html'); ?>
</body>
</html>