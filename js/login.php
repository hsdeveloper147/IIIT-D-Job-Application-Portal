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

</head>
<body>

<?php 

$email=$pass=$login_error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

		$email=$_POST["email"];
		$pass=$_POST["pass"];


		$servername = "localhost";
		$username = "id6793236_root";
		$password = "himdib1994";
		$dbname = "id6793236_portal";


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

				echo "<br>".$user_name;
				header("Location: welcome.php"); 

			}
			else{

				$login_error="Invalid username or password OR email not verified";
				$email="";
				echo "Invalid username or password OR email not verified";
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
	

  <div class="main row" style="margin-bottom: 5px;">
  <div class="center col s6 offset-s6" 
    style="background-color: white;opacity: 0.9; height: 90%;margin-top: 5vh;align-content: center;margin-left: 25%;">
        <h4 id="reg_title">Login</h4>
        <div class="row">
			<form class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="row">
				<div class="input-field col s8 offset-s2">
				<input id="email" type="email" name="email" class="validate" value="<?php echo $email ?>" required>
				<label for="email">Email</label>
				<span class="helper-text" data-error="Invalid Email"></span>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s8 offset-s2">
				<input id="pass" type="password" name="pass" class="validate" required>
				<label for="pass">Password</label>
				<span class="helper-text"></span>
				</div>
			</div>

			<button class="btn waves-effect waves-light" type="submit" value="submit" name="action">Submit
				<i class="material-icons right">send</i>
			</button>
			<span class="error"><?php echo $login_error ?></span>

			</form>
		</div>
   </div>

  </div>


<h2> Login</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

<table>
<tr>

<td>Email </td><td> <input type="text" placeholder="Enter your Email" name="email" value="<?php echo $email ?>" required></td>
</tr>
<tr>
<td>Password </td><td> <input type="password" name="pass" required></td>
</tr>
</table>
<button type="submit" value="submit">Submit</button>

<span class="error"><?php echo $login_error ?></span>

</form>

<?php 
	
	
?>


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
	document.addEventListener('DOMContentLoaded', function() {
	var elems = document.querySelectorAll('.carousel');
	var instances = M.Carousel.init(elems);
	});
	</script>


</body>
</html>