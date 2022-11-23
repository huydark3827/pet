<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Register</title>
    <style>

table td input{

background-color:white;

}
    </style>
</head>
<body>
<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.


function lay_mkh()
    {

		$conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
    		or die ('Không thể kết nối tới database'. mysqli_connect_error());
        $sql = "SELECT (MaKH) FROM khach_hang";
        $result = mysqli_query($conn, $sql);
        $arr = [];
        $i = 0;
        if (mysqli_num_rows($result) <> 0) {
            while ($rows = mysqli_fetch_row($result)) {

                $sinh_makh = substr($rows['0'], 3, 3);
                $n_makh_new = (int)$sinh_makh;
                $arr[$i] = $n_makh_new;
                $i++;
            }
        }
        $makh_new = max($arr) + 1;
        return $makh_new;
    }
	if(lay_mkh() <10)
    	$makh  = "KH00". lay_mkh();
	else{
		$makh= lay_mkh() <100? "KH0". lay_mkh() : "KH". lay_mkh();
	}
	
$page_title = 'Register';
include ('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Connect to the db.
    $conn = mysqli_connect('localhost', 'root', '', 'qlbanthucung')
    or die ('Không thể kết nối tới database'. mysqli_connect_error());



	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$name = mysqli_real_escape_string($conn, trim($_POST['first_name'])). " ";
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$name .= mysqli_real_escape_string($conn, trim($_POST['last_name']));
	}
	
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($conn, trim($_POST['email']));
	}

    // Check for an phone number:
	if (empty($_POST['phone'])) {
		$errors[] = 'You forgot to enter your phone number.';
	} else {
		$phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
	}
	
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = mysqli_real_escape_string($conn, trim($_POST['pass1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO khach_hang (MaKH,TenKH, SDT, Email, Password) VALUES ('$makh','$name', '$phone', '$e', '$p')";		
		$r = @mysqli_query ($conn, $q); // Run the query.
		if ($r) { // If it ran OK.
		
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
?>
<center><h1>Register</h1></center>

<form action="dangky.php" method="post">
    <center>
    <table>
        <tr>
            <td>
            First Name:
            </td>
            <td>
            <input type="text" name="first_name" size="15" maxlength="30" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" />
            </td>
        </tr>
        <tr>
            <td>
            Last Name:
            </td>
            <td>
            <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" />
            </td>
        </tr>



        <tr>
            <td>
            Email Address:
            </td>
            <td>
            <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  />
            </td>
        </tr>

        <tr>
            <td>
            Phone:
            </td>
            <td>
            <input type="text" name="phone" size="20" maxlength="60" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"  />
            </td>
        </tr>
        <tr>
            <td>
            Password:
            </td>
            <td>
            <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  />
            </td>
        </tr>
        <tr>
            <td>
            Confirm Password:
            </td>
            <td>
            <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  />
            </td>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" name="submit" value="Register" class='w3-button w3-green w3-round-large'/></th>
        </tr>
    </table>
    </center>
    
</form>
<?php include ('includes/footer.html'); ?>
</body>
</html>