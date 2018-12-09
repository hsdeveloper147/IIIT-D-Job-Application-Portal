<!DOCTYPE html>

<html>
<head>
	<title>Sign Up</title>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="css/main_styles.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 


		<link rel="stylesheet" type="text/css" href="css/styles.css">

<style type="text/css">
	.main {
		height:140vh;
		margin:0px;
		padding-bottom:0px;
		background-image:url("images/login_back.jpg");
	}

	.card {
		width: 80%;
	}

	.form-field {
		margin-top: 0px;
		margin-bottom: 0px;
	}

	input {
		

	}
</style>

<script src='https://www.google.com/recaptcha/api.js' async defer></script>

</head>
<body>

<?php 
		require 'conf.php';

	//	$table_name="user";


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

	//$name=$_POST["name"];
	$email=$_POST["email"];
	$pass=$_POST["password"];
	$retype=$_POST["retype"];
	$contact=$_POST["contact"];
	$apply_for=$_POST["postapp"];

	$ans = preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $pass); 

	if($ans == 0 && $ans == 1) {
		echo "Wrong password format";
		$error = true;
		//echo "<script>alert('Wrong Password Format')</script>";
	

		echo "<script> window.onload = function(){
    		document.getElementById('passerror').innerHTML = 'wp'</script> ;";
	}
	else if($pass!=$retype){

		$retype_error="Password Doesnot match";
		$error=true;
		echo "Password Doesnot match";


	}
	
	if(!$error){

		// if no error save to database



		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}


		else{

			$token=generateRandomString();
			$table_name="table";
			 $names=explode(" ",$apply_for);


                foreach ($names as $name) {
                    $table_name=$table_name."_".$name;
                }
                

			$sql = "INSERT INTO $table_name (email, password,signup_token,isvalidated,contact,apply_for) VALUES ('$email', '$pass','$token',false,'$contact','$apply_fo')";

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

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
  }
  else{


	  $sql = "SELECT name FROM posts";


	  $result=$conn->query($sql);

	  if($result->num_rows>0){


		 // $row=mysqli_fetch_row($result);

		 $jobs=array();

		  while ($row=mysqli_fetch_row($result))
		  {
			  array_push($jobs,$row);

		  }

  
	  } else {

	  }

	  $conn->close();
  }


?>

<header id="header col s12">
      <div style="max-width:75%!important;height: 15vh">
            <div id="site-logo">
              <a href="https://www.iiitd.ac.in/" title="Home"><img src="https://www.iiitd.ac.in/sites/all/themes/impact_theme/logo.png" alt="Home"></a>
            </div>
        </div>
        
	</header>
	

  <div class="main row" style="z-depth:4;">
  <div class="center col s12 m8 offset-m2"  
    style="background-color: white;opacity: 0.9; height: 95%;margin-bottom: 0; margin-top: 2vh;align-content: center;">
		<h4 id="reg_title">Sign Up</h4>
		<!-- <div class="row">
		 --><!-- <form class="col s12" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="off">
		<div class="row">
		 -->	<!-- <div class="input-field col s6">
			<i class="material-icons prefix" style="color:#3FAEA8">account_circle</i>
			<input id="icon_prefix" type="text" class="validate" name="name" value="<?php echo $name ?>" required>
			<label for="icon_prefix">Name</label>
			</div> -->
			<!-- <div class="input-field col s4">
			<i class="material-icons prefix" style="color:#3FAEA8">email</i>
			<input id="icon_telephone" type="email" autocomplete="off" class="validate" name="email" value="<?php echo $email ?>" required>
			<label for="icon_telephone">Email</label>
			</div>

			<div class="input-field col s4 offset-s1">
			<i class="material-icons prefix" style="color:#3FAEA8">phone</i>
			<input id="icon_prefix" type="number" autocomplete="off"  name="contact" value="<?php echo $contact ?>" required>
			<label for="icon_prefix">Contact Number</label>
			</div>
			
		</div>


		
		<div class="row" style="offset:0px">
			<div class="input-field col s4">
			<i class="material-icons prefix" style="color:#3FAEA8">fingerprint</i>
			<input id="icon_prefix" type="password" autocomplete="off"  name="password" value="<?php echo $password_error ?>" required>
			<label for="icon_prefix">Password</label>
			</div>
			<div class="input-field col s4 offset-s1">
			<i class="material-icons prefix" style="color:#3FAEA8">fingerprint</i>
			<input id="icon_telephone" type="password" autocomplete="off"  name="retype" value="<?php echo $retype_error ?>" required>
			<label for="icon_telephone">Retype Password</label>
			</div>
		</div>
		
		<div class="row">
			
			<div class="input-field col s6">
			<i class="material-icons prefix" style="color:#3FAEA8">school</i>
			<input id="icon_telephone" type="text" autocomplete="off" class="validate" name="qualification" value="<?php echo $qualification ?>" required>
			<label for="icon_telephone">Qualification</label>
			</div>
		</div>
		

        	<div class="row">	
			<div class="g-recaptcha" style="margin-left:20%;margin-right:20%;margin-bottom:5%;margin-top:0px;" 
			data-sitekey="6Le7ZHEUAAAAAAw-0XKthG0SAcNTDg7gyGEpD8Ck" data-callback="enableBtn"></div>	</div>
			

			<button id="submit" class="btn waves-effect waves-light z-depth-5" type="submit" value="submit" name="action">Submit
				<i class="material-icons right">send</i>
			</button>
			<span><?php echo $successfull_signup ?></span>
			</form>
			
			 -->

			 <form class="col s10 offset-s1"method="post" autocomplete="nope" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="off">
			 	
			 	<div class="row">
				<div class="input-field col s6">
				<i class="material-icons prefix" style="color:#3FAEA8">email</i>
				<input id="email" type="email" autocomplete="" class="validate" name="email" value="<?php echo $email ?>" required>
				<label for="email">Email</label>
				</div>

				<div class="input-field col s6">
				<i class="material-icons prefix" style="color:#3FAEA8">phone</i>
				<input id="contact" type="number" min="0" step="1" autocomplete="off"  name="contact" value="<?php echo $contact ?>" required>
				<label for="icon_prefix">Contact Number</label>
				</div>
				</div>


				<div class="row">
				<div class="input-field col s6">
				<i class="material-icons prefix" style="color:#3FAEA8">fingerprint</i>
				<input id="password" type="password" autocomplete="off"  name="password" value="<?php echo $password_error ?>" required>
				<label for="password">Password</label>
				</div>
				
				<div class="input-field col s6">
				<i class="material-icons prefix" style="color:#3FAEA8">fingerprint</i>
				<input id="retype" type="password" autocomplete="off"  name="retype" value="<?php echo $retype_error ?>" required>
				<label for="retype">Retype Password</label>
				</div>
				</div>
				<div>
					<p id="passerror">
					</p>
				</div>
				<br>
				<div class="input-field col s12">

				<select name="postapp" required>
				<option value="" disabled selected>Choose Post you are applying for</option>


				
				 <?php 

				foreach ($jobs as $job) {
					echo($job[0]);
					echo("<br>");
					echo "<option value='$job[0]'>$job[0]</option>";


				
					}


?>			   
			 </select>
			 <label>Post appying for</label>

			 	</div>

			 <div class="g-recaptcha col s12" style="margin-left:20%;margin-right:20%;margin-bottom:5%;margin-top:0px;" 
			 data-sitekey="6Le7ZHEUAAAAAAw-0XKthG0SAcNTDg7gyGEpD8Ck" data-callback="enableBtn"></div>
			
			 <button id="submit" class="btn waves-effect waves-light z-depth-5" type="submit" value="submit" name="action">Submit
				<i class="material-icons right">send</i>
			</button>
			<span><?php echo $successfull_signup ?></span>

			 </form>
		

			<div class="col s12 center">
				<a class="waves-effect waves btn  z-depth-5" style="margin-top:25px" href="login.php"><i class="material-icons left"></i>Already Registered? Login</a>
				<a class="waves-effect waves-light btn  z-depth-5" style="margin-top:25px" href="index.php"><i class="material-icons left"></i>Back to Main Page</a>
			</div> 
			
		</div>
   </div>





	<footer class="page-footer">
		<div class="footer-copyright">
		<div class="container">
		2018 Copyright | IIITD
		<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
		</div>
		</div>
	</footer>
		

	<!--JavaScript at end of body for optimized loading-->

	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript">
	 document.getElementById("submit").disabled = true;

	function enableBtn(){
    document.getElementById("submit").disabled = false;
   }
	document.addEventListener('DOMContentLoaded', function() {
	var elems = document.querySelectorAll('.carousel');
	var instances = M.Carousel.init(elems);
	});

	$(document).ready(function(){
	    $('select').formSelect();
	  });

	</script>

	
    


</body>
</html>