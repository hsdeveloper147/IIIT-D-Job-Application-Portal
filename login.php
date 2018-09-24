<!DOCTYPE html>

<html>
<head>
	<title>Login</title>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="css/main_styles.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="stylesheet" type="text/css" href="css/styles.css">

<style type="text/css">
	.main {
		height:120vh;
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
</style>

<script src='https://www.google.com/recaptcha/api.js' async defer></script>

</head>
<body>

<?php 

$email=$pass=$login_error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

		$email=$_POST["email"];
		$pass=$_POST["pass"];
		
        require 'conf.php';


		$conn=new mysqli($servername,$username,$password,$dbname);

		if($conn->connect_error){
			die("Connection Failed".$conn->connect_error);
		}
		else{

			$sql="SELECT * FROM user WHERE email='$email' AND password='$pass'";

			$result=$conn->query($sql);

			if($result->num_rows>0){

				echo "Login Success";

				session_start();


				$row=mysqli_fetch_row($result);
				$_SESSION["user"]=$row;

				//$user_name=$row[1];

				echo "<br>".$username;
				
	 			   $_SESSION['loggedin'] = true;
	    		   $_SESSION['username'] = $username; // $username coming from the form, such as $_POST['username']
				
				header("Location: welcome.php"); 

			}
			else{

				$login_error="Invalid username or password";
				$email="";
				//echo "Invalid username or password";
			}



		}

	}

?>

<header id="header col s12">
      <div style="max-width:75%!important;height: 15vh">
            <div id="site-logo">
              <a href="https://www.iiitd.ac.in/" title="Home"><img src="https://www.iiitd.ac.in/sites/all/themes/impact_theme/logo.png" alt="Home"></a>
            </div>
        </div>
        
	</header>
	

  <div class="main row">
  <div class="center col s12 m6 offset-m3"  
    style="background-color: white;opacity: 0.9; height: 95%;margin-bottom: 0; margin-top: 2vh;align-content: center;">
		<h4 id="reg_title">Login</h4>
		<div class="error card center" style="color:#3FAEA8"><h5><?php echo $login_error ?></h5></div>

        <div class="row" style="margin:5px">
			<form class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="card col s8 offset-s2">
			<div class="row form-field" style="margin-bottom:10%;">
				<div class="input-field col s8 offset-s2">
				<i class="material-icons prefix">email</i>
				<input id="email" type="email" name="email" class="validate" value="<?php echo $email ?>" required>
				<label for="email">Email</label>
				<span class="helper-text" data-error="Invalid Email"></span>
				</div>
			</div>

			<div class="row form-field" style="margin-bottom:15%;">
				<div class="input-field col s8 offset-s2">
				<i class="material-icons prefix">fingerprint</i>
				<input id="pass" type="password" name="pass" class="validate" required>
				<label for="pass">Password</label>
				<span class="helper-text"></span>
				</div>
			</div>
			<div class="row" >
				
			<div class="col s12 g-recaptcha" style="margin-left:10%;margin-right:10%;margin-bottom:5%;margin-top:0px;"
			 data-sitekey="6Le7ZHEUAAAAAAw-0XKthG0SAcNTDg7gyGEpD8Ck" data-callback="enableBtn"
			 data-theme="light" data-size="normal"></div>

			</div>


		</div>

			
			
			<button id="submit" class="btn waves-effect waves-light z-depth-5" type="submit" value="submit" name="action">Submit
				<i class="material-icons right">send</i>
			</button>

			</form>

			
			<a class="waves-effect waves btn  z-depth-5" style="margin-top:25px" href="signup.php"><i class="material-icons left"></i>New User? Sign Up</a>
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
	</script>

	
    


</body>
</html>