<html>

<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
<?php 

$email=$name=$password=$retype=$contact=$qualification=$retype_error=$email_error=$password_error="";

$successfull_signup="";
$error=false;


	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$name=$_POST["name"];
	$email=$_POST["email"];
	$pass=$_POST["password"];
	$retype=$_POST["retype"];
	$contact=$_POST["contact"];
	$qualification=$_POST["qualification"];

	if($pass!=$retype){

		$retype_error="Password Doesnot match";
		$error=true;
		echo "Password Doesnot match";

	}

	if(!$error){

		// if no error save to database

		$servername = "localhost";
		$username = "id6793236_root";
		$password = "himdib1994";
		$dbname = "id6793236_portal";


		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		else{

			$token=generateRandomString();

			$sql = "INSERT INTO user (email, name, password,signup_token,isvalidated,contact,qualification) VALUES ('$email', '$name', '$pass','$token',false,'$contact','$qualification')";

			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";

			    $msg = "http://localhost/validation/$token";
			    $successfull_signup="Signup successfully.";

			    echo "alert('Sign Up Successfull')";
				header("Location: login.php"); 


				$msg = wordwrap($msg,70);
				// ini_set("SMTP","ssl://smtp.gmail.com");
				// ini_set("smtp_port","465");
				// ini_set('sendmail_from ','webmaster@tutorialspoint.com');

				// mail($email,"Activation Link for online applciation portal",$msg);


			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
		}


	}


}

?>

<h1> IIIT Delhi Online Applciation Portal</h1>

<hr>
<h2 class="center"> Sign Up</h2>

<div class="center">
<br>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<table class="table">

<tr>
<td>Name</td>
<td><input type="text" placeholder="Enter  Name"  name="name" value="<?php echo $name ?>" required></td>
</tr>



<tr>
<td>Email</td>
<td><input type="text" placeholder="Enter Email"  name="email" value="<?php echo $email ?>"><span class="error"><?php echo $email_error?></span></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password"  name="password" ><span class="error"><?php echo $password_error?></span></td>
</tr>

<tr>
<td>Retype Password</td>
<td><input type="password" name="retype"> <span class="error"><?php echo $retype_error?></span></td>
</tr>

<tr>
<td>Contact Number</td>
<td><input type="text" placeholder="Enter  Contact Number"  name="contact" value="<?php echo $contact ?>" required></td>
</tr>

<tr>
<td>Qualification</td>
<td><input type="text" placeholder="Enter Maximum Qualification"  name="qualification" value="<?php echo $qualification ?>" required></td>
</tr>

</table>
 <tr><button  type="submit" value="submit">Submit</button>
</tr>
</form>

<br>
<span><?php echo $successfull_signup ?></span>

<?php 



?>
</div>
</body>
</html>