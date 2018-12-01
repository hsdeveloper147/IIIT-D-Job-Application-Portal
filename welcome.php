
<?php
session_start();

?>
<html>

<head>
	<title>Welcome</title>
			<!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="css/main_styles.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="stylesheet" type="text/css" href="css/styles.css">

<style>
a{
  color:#FFF
}
.c{
  width:100%;
}
.c1{
  width:30%;
  margin:auto
}

body {
  background-image:url("images/welcome_img.jpg");
  background-size: 100%;}
</style>
</head>
<body id="body">

<?php 				
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
} else {
    die("<h1 style='margin-left:20%;margin-top:10px;color:red'>Unauthorized Access !!!<h1>");

}

?>
<div class="row">
<header id="header">
      <div style="max-width:75%!important;height: 15vh">
            <div id="site-logo">
              <a href="https://www.iiitd.ac.in/" title="Home"><img src="https://www.iiitd.ac.in/sites/all/themes/impact_theme/logo.png" alt="Home"></a>
              <a href="logout.php" class="btn tooltipped"style="position:fixed;top:10px;right:10px" data-position="bottom" data-tooltip="Click to Logout">
              <i class="material-icons">exit_to_app</i>
              </a>
            </div>
        </div>
        
	</header>
</div>


<br>

<div class="row">
  <div  class="col s12 m5 offset-s2">
    
    <h4 style="color:#3FAEA8"><b>Welcome</b></h4>
    <h5 style="color:#3FAEA8"><b>Instructions before filling the form</b></h5>

    <p class="flow-text" style="font-size:12px;font-weight: bold;">1.It is prefered to have scan of passport size photograph,
    signature and resume ready while filling form. However you can save form in the middle and add these later within the deadline 
    of Application form</p>
    <p class="flow-text" style="font-size:12px;font-weight: bold;">
      2. There are five different sections in application form and you have to fill all of the mandatory fields in form, then only
      you can submit form.
    </p>
    <p class="flow-text" style="font-size:12px;font-weight: bold;">
      3.You are required to save/update data in each of the five sections seperately. However, you are given facilty to fill one section 
      at a time ,save it and later you can fill other sections. DO REMEMBER TO SAVE/UPDATE SECTION ONCE FILLED
    </p>

    <?php if($_SESSION["user"][70]=="n"){
    
    echo '<button class=" btn waves-effect waves-light"><a href="application_form.php">Fill Application form</a></button>
    <br>
    <br>
    <p id="dwnld_text"  class="flow-text" style="font-size:12px;font-weight: bold;">DOWNLOAD PDF button will be active once you have filled application form and submit it successfully</p>
    <button id="disable" class=" btn waves-effect waves-light" ><a href="pdf.php">Download Pdf</a></button>
';
  }else if($_SESSION["user"][70]=="y"){
    
    echo '<button id="disable" class=" btn waves-effect waves-light"><a href="application_form.php">Fill Application form</a></button>
    <br>
    <br>
    <p id="dwnld_text"  class="flow-text" style="font-size:12px;font-weight: bold;">DOWNLOAD PDF button will be active once you have filled application form and submit it successfully</p>
    <button  class=" btn waves-effect waves-light" ><a href="pdf.php">Download Pdf</a></button>
';
}

?> 
 </div>
</div>
</body>

<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
  document.getElementById("disable").disabled = true;
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
  });

  window.addEventListener("resize", function() {
    if (window.matchMedia("(min-width: 500px)").matches) {
        console.log("Screen width is at least 750px");
        document.body.style.background = "#f3f3f3 url('images/welcome_img.jpg') no-repeat right top";
        document.body.style.backgroundSize = "100%";
      }


     else {
        console.log("Screen less than 750px");
        document.body.style.background = "#f3f3f3 url('images/white_back.jpg') no-repeat right top";
        document.body.style.backgroundSize = "100%";



    }
});
</script>
</html>