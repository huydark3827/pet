<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


	<style>
		table td{
			background-color: pink;
		}
		table th{
			background-color: palevioletred;
			font-size: large;
		}
	</style>
</head>
<body>
<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.

	
$page_title = 'Create';
include ('includes/header.html');

$errors = array(); 

$file_name = "";
$file_size = "";

if(isset($_POST['luu'])){
	// Connect to the db.
	$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
	or die ('Không thể kết nối tới database'. mysqli_connect_error());

	



	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
    
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
		$file_name = $_FILES["hinhanh"]["name"];
		$file_size = $_FILES["hinhanh"]["size"];
		$anh = $_FILES['hinhanh']['name'];
		echo $_FILES['hinhanh']['name'];
		echo $file_name;
		echo $file_size;
  

	
	// Check for a password and match against the confirmed password:
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
				
        echo "Không lỗi";
		$q = "INSERT INTO sua (Ma_sua,Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh) VALUES ('$masua','$ten', '$mahangsua', '$maloai', '$trongluong', '$dongia', '$TPdinhduong','$loiich', '$anh')";		
		$r = @mysqli_query ($conn, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			header("Location: b2.7_chitiet.php?id=$masua");
			// Print a message:
		// 	echo '<h1>Thank you!</h1>
		// <p>You are now registered. In Chapter 12 you will actually be able to log in!</p><p><br /></p>';	
		
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
		<table align='center' width='700' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>

<tr >

    <th colspan=2><center>THÊM SỮA MỚI</center></th>

     

</tr>

        
        <tr>
            <td width = 150>Mã sữa</td>
		    <td> <input name="masua" class="form-control" value=""></td>
        </tr>
        <tr>
            <td>Tên sữa</td>
		    <td><input type="text" name="tensua" value="" ></td>
        </tr>
            <td>Hãng sữa</td>
            <td colspan="2">
				<select style="margin:10px;" name="hangsua" id="">
                        <?php 
						$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
						or die ('Không thể kết nối tới database'. mysqli_connect_error());
						$query2 = "select * from hang_sua";    //Hiển thị tên các hãng sữa
                        $result2 = mysqli_query($conn, $query2); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result2)) :; ?>

                            <option value="<?php echo $rows2[0]; ?>"><?php echo $rows2[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
		    </td>
                
        </tr>
        <tr>
            <td>Loại sữa</td>
            <td>
			<select style="margin:10px;" name="loaisua" id="">
                        <?php 
						$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
						or die ('Không thể kết nối tới database'. mysqli_connect_error());
						$query2 = "select * from loai_sua";    //Hiển thị tên các hãng sữa
                        $result2 = mysqli_query($conn, $query2); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result2)) :; ?>

                            <option value="<?php echo $rows2[0]; ?>"><?php echo $rows2[1]; ?></option>
                        <?php endwhile; ?>
                    </select>	
			</td>
        </tr> 
        <tr>
            <td>Trọng lượng</td>
            <td><input name="trongluong" class="form-control" value=""></td>
        </tr>
        <tr>
            <td>Trọng lượng</td>
            <td><input name="dongia" class="form-control" value="">	</td>

		</tr>

		<tr>
            <td>TP dinh dưỡng</td>
            <td><textarea name = "TPdinhduong"  cols = "50" rows="2"></textarea></td>

		</tr>
		<tr>
            <td>Lợi ích</td>
            <td><textarea name = "loiich"  cols = "50" rows="2"></textarea>	</td>

		</tr>

		<tr>
            <td>Hình ảnh</td>
            <td><input  type="file"  name="hinhanh" class="form-control" />	</td>

		</tr>


        <tr>
			<td colspan="2"><center><button type="submit" class="btn btn-primary" name='luu'>Thêm</button></center></td>
		
		</tr>


</table>
        </form>
    </div>
<?php include ('includes/footer.html'); ?>
</body>
</html>