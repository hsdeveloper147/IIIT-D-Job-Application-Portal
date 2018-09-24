<!DOCTYPE html>

<html>
<head>
    <title>Application Form</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/main_styles.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <script src="js/load-image.all.min.js"></script>
        <style type="text/css">

        .main {
            padding:4%;
        }
         .tabs .tab a {
            font-size: 10px;
         }

         .label_format {
            color: green;
            font-size: 15px;
         }
         td.container {
            height: 5px;
        }

        tr { 
            line-height: 14px; 
            height: 10px;
        }

         table, th, td {
            border: 3px solid #d3d3d3;
            height: 10px;

         }

         td.container > div {
            width: 100%;
            height: 100%;
            overflow:hidden;
        }
        

         input{
             auto-fill: off;
         }

         .tab {
            background-color:  #e8f8f5 ;
            color: #000;
         }

    .disabled {
        pointer-events: none;
        cursor: default;
        background-color: #c0c0c0;

            }

    .error{
        color: #ff0000;
    }

       
}




        </style>

</head>
<body>

<?php session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
} else {
    die("<h1 style='margin-left:20%;margin-top:10px;color:red'>Unauthorized Access !!!<h1>");

}


header("Pragma-directive: no-cache");
    header("Cache-directive: no-cache");
    header("Cache-control: no-cache");
    header("Pragma: no-cache");
    header("Expires: 0");

$fn=$mn=$ln=$address=$city=$state=$pincode=$dob=$photo=$sign=$cv_uploaded="";
$page="";
$persoanl_success=$edu_success=$exp_success=$cv_success=$photo_success=$sign_success="y";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email=$_SESSION["user"][0];

    
        require 'conf.php';
        
    if(isset($_POST['act'])){
        if($_POST['act'] == 'personal'){
         
            $page='personal';

    $fn=$_POST["fn"];
    $mn=$_POST["mn"];
    $ln=$_POST["ln"];
    $dob=$_POST["dob"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    $pincode=$_POST["pincode"];
    
    $error=false;

    if(!$error){

        // if no error save to database



        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{


            $sql = "UPDATE user SET fn='$fn', mn='$mn' ,ln='$ln', dob='$dob', address='$address', city='$city', state='$state', pincode='$pincode', personal_form='y' WHERE email='$email' ";

            if ($conn->query($sql) === TRUE) {
               // echo "Updated successfully";

             $sql="SELECT * FROM user WHERE email='$email' ";

            $result=$conn->query($sql);

            if($result->num_rows>0){


                $row=mysqli_fetch_row($result);

                $_SESSION["user"]=$row;

            }


            } else {

                $persoanl_success="n";

                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }


    }

        }
        else if($_POST['act'] == 'education'){
            
                        $page="education";

            
    $s_passed=$_POST["s_passed"];
    $s_spec=$_POST["s_spec"];
    $s_board=$_POST["s_board"];
    $s_year=$_POST["s_year"];
    $s_marks=$_POST["s_marks"];
    $s_type=$_POST["s_type"];
    
    $u_passed=$_POST["u_passed"];
    $u_spec=$_POST["u_spec"];
    $u_board=$_POST["u_board"];
    $u_year=$_POST["u_year"];
    $u_marks=$_POST["u_marks"];
    $u_type=$_POST["u_type"];

    $p_passed=$_POST["p_passed"];
    $p_spec=$_POST["p_spec"];
    $p_board=$_POST["p_board"];
    $p_year=$_POST["p_year"];
    $p_marks=$_POST["p_marks"];
    $p_type=$_POST["p_type"];


    $error=false;

    if(!$error){

        // if no error save to database



        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{


            $sql = "UPDATE user SET s_passed='$s_passed', s_spec='$s_spec', s_board='$s_board', s_year='$s_year', s_marks='$s_marks', s_type='$s_type', u_passed='$u_passed', u_spec='$u_spec', u_board='$u_board', u_year='$u_year', u_marks='$u_marks', u_type='$u_type',  p_passed='$p_passed', p_spec='$p_spec', p_board='$p_board', p_year='$p_year', p_marks='$p_marks', p_type='$p_type', edu_form='y'  WHERE email='$email' ";

            if ($conn->query($sql) === TRUE) {
               // echo "Updated successfully";

             $sql="SELECT * FROM user WHERE email='$email' ";

            $result=$conn->query($sql);

            if($result->num_rows>0){


                $row=mysqli_fetch_row($result);

                $_SESSION["user"]=$row;

            }



            } else {

                echo $edu_success="n";
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }


    }
        }
        else if($_POST['act'] == 'resume'){
            $page="docs";

     
                        // Check if file was uploaded without errors
                        if(isset($_FILES["cv"]) && $_FILES["cv"]["error"] == 0){
                            //$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                            $filename = $_FILES["cv"]["name"];
                            $filetype = $_FILES["cv"]["type"];
                            $filesize = $_FILES["cv"]["size"];


                            if($filesize/(1024*1024)>1) {

                                $cv_success="n";
                                echo "file not ok";

                            }
                            else {
                            
                               // echo "file ok";
                            $dir="uploads/cv/";

                            $file_name=$email."_cv";
                        
                            // // Verify file extension
                             $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            // if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                        
                            // // Verify file size - 5MB maximum
                            // $maxsize = 5 * 1024 * 1024;
                            // if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                        
                            // Verify MYME type of the file
                           // if(in_array($filetype, $allowed)){
                                // Check whether file exists before uploading it
                                // if(file_exists("upload/" . $_FILES["photo"]["name"])){
                                //     echo $_FILES["photo"]["name"] . " is already exists.";
                                // } else{
                                    move_uploaded_file($_FILES["cv"]["tmp_name"], $dir. $file_name.".".$ext);
                                   // echo "Your resume was uploaded successfully.";

                                    // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{


            $sql = "UPDATE user SET cv='$file_name.$ext'  WHERE email='$email'";

            if ($conn->query($sql) === TRUE) {
              //  echo "Updated successfully";

             $sql="SELECT * FROM user WHERE email='$email' ";

            $result=$conn->query($sql);

            if($result->num_rows>0){


                $row=mysqli_fetch_row($result);

                $_SESSION["user"]=$row;

            }


            } else {

                $cv_success="n";
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $cv_uploaded=$_SESSION["user"][64];
            $conn->close();
        }
                               // } 
                            // } else{
                            //     echo "Error: There was a problem uploading your file. Please try again."; 
                            // }

            }
                        } else{
                            echo "Error: " . $_FILES["cv"]["error"];
                        }
                    
                    
        

            
                }

                else if($_POST['act'] == 'act_photo'){

            $page="images";

                        // Check if file was uploaded without errors
                        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                            $filename = $_FILES["photo"]["name"];
                            $filetype = $_FILES["photo"]["type"];
                            $filesize = $_FILES["photo"]["size"];
                            $maxsize = 1024*1024;

                            if($filesize > $maxsize) {
                                //die("Error: File size is larger than the allowed limit.");
                                echo "<script>alert('File size greater than 1MB')</script>";

                            }

                            elseif(!in_array($filetype, $allowed))
                            {
                                echo "<script>alert('Please upload jpg,jpeg,gif or png image only')</script>";
                            }

                            else {



                            $dir="uploads/photo/";

                            $file_name=$email."_photo";
                        
                            // // Verify file extension
                             $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            // if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                        
                            // // Verify file size - 5MB maximum
                            
                            
                            // Verify MYME type of the file
                           // if(in_array($filetype, $allowed)){
                                // Check whether file exists before uploading it
                                // if(file_exists("upload/" . $_FILES["photo"]["name"])){
                                //     echo $_FILES["photo"]["name"] . " is already exists.";
                                // } else{
                                    move_uploaded_file($_FILES["photo"]["tmp_name"], $dir. $file_name.".".$ext);
                                   // echo "Your Photo was uploaded successfully.";

                                    // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{


            $sql = "UPDATE user SET photo='$file_name.$ext'  WHERE email='$email'";

            if ($conn->query($sql) === TRUE) {
               // echo "Updated successfully";

             $sql="SELECT * FROM user WHERE email='$email' ";

            $result=$conn->query($sql);

            if($result->num_rows>0){


                $row=mysqli_fetch_row($result);

                $_SESSION["user"]=$row;

            }



            } else {

                $photo_success="n";

                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $photo="uploads/photo/".$_SESSION["user"][65];
            $conn->close();

        }
                               // } 
                            // } else{
                            //     echo "Error: There was a problem uploading your file. Please try again."; 
                            // }


                        }
                        
                        }
                         else{
                            echo "Error: " . $_FILES["photo"]["error"];
                        }
                    
                    
        
                    
                        }

                        else if($_POST['act'] == 'act_sign'){

                                $page="images";

                // Check if file was uploaded without errors
                if(isset($_FILES["sign"]) && $_FILES["sign"]["error"] == 0){
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["sign"]["name"];
                    $filetype = $_FILES["sign"]["type"];
                    $filesize = $_FILES["sign"]["size"];
                    $maxsize = 1024*200;

                            if($filesize > $maxsize) {
                                //die("Error: File size is larger than the allowed limit.");
                                echo "<script>alert('File size greater than 200KB')</script>";

                            }

                            elseif(!in_array($filetype, $allowed))
                            {
                                echo "<script>alert('Please upload jpg,jpeg,gif or png image only')</script>";
                            }

                            else {



                    $dir="uploads/sign/";

                    $file_name=$email."_sign";
                
                    // // Verify file extension
                     $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    // if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                
                    // // Verify file size - 5MB maximum
                    // $maxsize = 5 * 1024 * 1024;
                    // if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                
                    // Verify MYME type of the file
                   // if(in_array($filetype, $allowed)){
                        // Check whether file exists before uploading it
                        // if(file_exists("upload/" . $_FILES["photo"]["name"])){
                        //     echo $_FILES["photo"]["name"] . " is already exists.";
                        // } else{
                            move_uploaded_file($_FILES["sign"]["tmp_name"], $dir. $file_name.".".$ext);
                          //  echo "Your Signature was uploaded successfully.";

                            // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{


    $sql = "UPDATE user SET sign='$file_name.$ext'  WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
     //   echo "Updated successfully";

     $sql="SELECT * FROM user WHERE email='$email' ";

    $result=$conn->query($sql);

    if($result->num_rows>0){


        $row=mysqli_fetch_row($result);

        $_SESSION["user"]=$row;

    }


    } else {

        $sign_success="n";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sign="uploads/sign/".$_SESSION["user"][66];
    $conn->close();
}
                       // } 
                    // } else{
                    //     echo "Error: There was a problem uploading your file. Please try again."; 
                    // }


                }

                }
                 else{
                    echo "Error: " . $_FILES["sign"]["error"];
                }
            
            

                            
                                }


        else if($_POST['act'] == 'experience'){
            
                                $page="experience";

        
            
            $e1_org=$_POST["e1_org"];
            $e1_desg=$_POST["e1_desg"];
            $e1_from=$_POST["e1_from"];
            $e1_to=$_POST["e1_to"];
            $e1_payscale=$_POST["e1_payscale"];
            $e1_reason=$_POST["e1_reason"];
            $e1_exp=$_POST["e1_exp"];
            $e1_nature=$_POST["e1_nature"];

            $e2_org=$_POST["e2_org"];
            $e2_desg=$_POST["e2_desg"];
            $e2_from=$_POST["e2_from"];
            $e2_to=$_POST["e2_to"];
            $e2_payscale=$_POST["e2_payscale"];
            $e2_reason=$_POST["e2_reason"];
            $e2_exp=$_POST["e2_exp"];
            $e2_nature=$_POST["e2_nature"];

            $e1_org=$_POST["e1_org"];
            $e1_desg=$_POST["e1_desg"];
            $e1_from=$_POST["e1_from"];
            $e1_to=$_POST["e1_to"];
            $e1_payscale=$_POST["e1_payscale"];
            $e1_reason=$_POST["e1_reason"];
            $e1_exp=$_POST["e1_exp"];
            $e1_nature=$_POST["e1_nature"];

            $e3_org=$_POST["e3_org"];
            $e3_desg=$_POST["e3_desg"];
            $e3_from=$_POST["e3_from"];
            $e3_to=$_POST["e3_to"];
            $e3_payscale=$_POST["e3_payscale"];
            $e3_reason=$_POST["e3_reason"];
            $e3_exp=$_POST["e3_exp"];
            $e3_nature=$_POST["e3_nature"];

            $e4_org=$_POST["e4_org"];
            $e4_desg=$_POST["e4_desg"];
            $e4_from=$_POST["e4_from"];
            $e4_to=$_POST["e4_to"];
            $e4_payscale=$_POST["e4_payscale"];
            $e4_reason=$_POST["e4_reason"];
            $e4_exp=$_POST["e4_exp"];
            $e4_nature=$_POST["e4_nature"];

        
        
            $error=false;
        
            if(!$error){
        
                // if no error save to database
        
        
        
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                else{
        

                  
                    $sql = "UPDATE user SET e1_org='$e1_org', e1_desg='$e1_desg', e1_from='$e1_from', e1_to='$e1_to',  e1_payscale='$e1_payscale', e1_reason='$e1_reason', e1_exp='$e1_exp', e1_nature='$e1_nature', e2_org='$e2_org', e2_desg='$e2_desg', e2_from='$e2_from', e2_to='$e2_to', e2_payscale='$e2_payscale', e2_reason='$e2_reason', e2_exp='$e2_exp', e2_nature='$e2_nature', e3_org='$e3_org', e3_desg='$e3_desg', e3_from='$e3_from', e3_to='$e3_to',  e3_payscale='$e3_payscale', e3_reason='$e3_reason', e3_exp='$e3_exp', e3_nature='$e3_nature',  e4_org='$e4_org', e4_desg='$e4_desg', e4_from='$e4_from', e4_to='$e4_to', e4_payscale='$e4_payscale', e4_reason='$e4_reason', e4_exp='$e4_exp', e4_nature='$e4_nature', exp_form='y'  WHERE email='$email' ";
        
                    if ($conn->query($sql) === TRUE) {
                       // echo "Updated successfully";
        
                     $sql="SELECT * FROM user WHERE email='$email' ";
        
                    $result=$conn->query($sql);
        
                    if($result->num_rows>0){
        
        
                        $row=mysqli_fetch_row($result);
        
                        $_SESSION["user"]=$row;
        
                    }


        
                    } else {

                        $exp_success="n";
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
        
                    $conn->close();
                }
        
        
            }
                }


        else if($_POST['act'] == 'act_final'){


        // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                else{
        

                  
                    $sql = "UPDATE user SET final='y'  WHERE email='$email' ";
        
                    if ($conn->query($sql) === TRUE) {
                       // echo "Updated successfully";
        
                     $sql="SELECT * FROM user WHERE email='$email' ";
        
                    $result=$conn->query($sql);
        
                    if($result->num_rows>0){
        
        
                        $row=mysqli_fetch_row($result);
        
                        $_SESSION["user"]=$row;
        
                    }


                     header("Location: welcome.php"); 


        
                    } else {

                        $exp_success="n";
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
        
                    $conn->close();
                }
        


        }
    }
    
}

?>


<header id="header col s12">
      <div style="max-width:75%!important;height: 15vh">
            <div id="site-logo">
              <a href="" title="Home"><img src="https://www.iiitd.ac.in/sites/all/themes/impact_theme/logo.png" alt="Home"></a>
              <a href="logout.php" class="btn tooltipped"style="position:fixed;top:10px;right:15px;z-index:6" data-position="bottom" data-tooltip="Click to Logout">
              <i class="material-icons">exit_to_app</i>
              </a>

            </div>
        </div>
        
    </header>
    


  <div class="row">
    <div class="row">
    <div class="col s12">
      <div class="center"><h5 style="color: #3FAEA8"><b>Application Form</b></h5></div>     

      <?php if($page==""||$page=="personal"){
        echo '
      <ul class="tabs">
        <li class="tab col s2"><a class="active"  href="#test1" style="color: #3FAEA8"><b>Personal Information</b></a></li>
        <li class="tab col s3"><a  href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2 "><a href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s1"><a href="#test4" style="color: #3FAEA8"><b>Resume</b></a></li>
        <li class="tab col s2"><a href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][67]=='y'&&$_SESSION["user"][68]=='y'&&$_SESSION["user"][69]=='y'&&$_SESSION["user"][64]!=NULL&&$_SESSION["user"][65]!=NULL&&$_SESSION["user"][66]!=NULL){
                 echo '<li class="tab col s2"><a href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }
        else{
             echo '<li class="tab col s2"><a class="disabled" href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }

      echo '</ul>';
  }
  else if($page=="education"){
        echo '
      <ul class="tabs">
        <li class="tab col s2"><a   href="#test1" style="color: #3FAEA8"><b>Personal Information</b></a></li>
        <li class="tab col s3"><a  class="active" href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2 "><a href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s1"><a href="#test4" style="color: #3FAEA8"><b>Resume</b></a></li>
        <li class="tab col s2"><a href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][67]=='y'&&$_SESSION["user"][68]=='y'&&$_SESSION["user"][69]=='y'&&$_SESSION["user"][64]!=NULL&&$_SESSION["user"][65]!=NULL&&$_SESSION["user"][66]!=NULL){
                 echo '<li class="tab col s2"><a href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }
        else{
             echo '<li class="tab col s2"><a class="disabled" href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }

      echo '</ul>';
  }

    else if($page=="experience"){
        echo '
      <ul class="tabs">
        <li class="tab col s2"><a   href="#test1" style="color: #3FAEA8"><b>Personal Information</b></a></li>
        <li class="tab col s3"><a   href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2 "><a class="active" href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s1"><a href="#test4" style="color: #3FAEA8"><b>Resume</b></a></li>
        <li class="tab col s2"><a href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][67]=='y'&&$_SESSION["user"][68]=='y'&&$_SESSION["user"][69]=='y'&&$_SESSION["user"][64]!=NULL&&$_SESSION["user"][65]!=NULL&&$_SESSION["user"][66]!=NULL){
                 echo '<li class="tab col s2"><a href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }
        else{
             echo '<li class="tab col s2"><a class="disabled" href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }

      echo '</ul>';
  }

    else if($page=="images"){
       echo '
      <ul class="tabs">
        <li class="tab col s2"><a   href="#test1" style="color: #3FAEA8"><b>Personal Information</b></a></li>
        <li class="tab col s3"><a   href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2 "><a  href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s1"><a href="#test4" style="color: #3FAEA8"><b>Resume</b></a></li>
        <li class="tab col s2"><a class="active" href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][67]=='y'&&$_SESSION["user"][68]=='y'&&$_SESSION["user"][69]=='y'&&$_SESSION["user"][64]!=NULL&&$_SESSION["user"][65]!=NULL&&$_SESSION["user"][66]!=NULL){
                 echo '<li class="tab col s2"><a href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }
        else{
             echo '<li class="tab col s2"><a class="disabled" href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }

      echo '</ul>';
  }

   else if($page=="docs"){
     echo '
      <ul class="tabs">
        <li class="tab col s2"><a   href="#test1" style="color: #3FAEA8"><b>Personal Information</b></a></li>
        <li class="tab col s3"><a   href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2 "><a  href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s1"><a class="active" href="#test4" style="color: #3FAEA8"><b>Resume</b></a></li>
        <li class="tab col s2"><a  href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][67]=='y'&&$_SESSION["user"][68]=='y'&&$_SESSION["user"][69]=='y'&&$_SESSION["user"][64]!=NULL&&$_SESSION["user"][65]!=NULL&&$_SESSION["user"][66]!=NULL){
                 echo '<li class="tab col s2"><a href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }
        else{
             echo '<li class="tab col s2"><a class="disabled" href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }

      echo '</ul>';
  }

  ?>
    </div>


  <div id="main">
        


    <div id="test1" class="col s12 m8 offset-m2" style="margin-top:40px">

        
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

        <input type="hidden" name="act" value="personal"/>
        <h6 class="center">Enter Personal Information</h6><br>
        <table class="striped centered">

        <tr>
        <td>Email <span class="required">*</span> </td><td> <input type="email" name="email" value="<?php echo $_SESSION["user"][0] ?>" readonly></td>
        </tr>

        <tr>
        <td>Contact <span class="required">*</span> </td><td> <input type="text" name="contact" value="<?php echo $_SESSION["user"][4] ?>" readonly ></td>
        </tr>

        <tr>
        <td>First Name <span class="required">*</span></td><td> <input type="text" name="fn" value="<?php echo $_SESSION["user"][6] ?>" required></td>
        </tr>

        <tr>
        <td>Middle Name</td><td> <input type="text" name="mn" value="<?php echo $_SESSION["user"][7] ?>" ></td>
        </tr>

        <tr>
        <td>Last Name <span class="required">*</span></td><td> <input type="text" name="ln" value="<?php echo $_SESSION["user"][8] ?>" required></td>
        </tr>

        <tr>
        <td>Date of Birth <span class="required ">*</span></td><td> <input class="datepicker" autocomplete="off" name="dob" value="<?php echo $_SESSION["user"][9] ?>" required></td>
        </tr>

        <tr>
        <td>Address <span class="required">*</span></td><td> <input type="text" name="address" value="<?php echo $_SESSION["user"][10] ?>" required></td>
        </tr>

    
        <tr>
        <td>State <span class="required">*</span></td><td> <input type="text" name="state" value="<?php echo $_SESSION["user"][12] ?>" required></td>
        </tr>

        <tr>
        <td>City <span class="required">*</span></td><td> <input type="text" name="city" value="<?php echo $_SESSION["user"][11] ?>" required></td>
        </tr>

        <tr>
        <td>Pincode <span class="required">*</span></td><td> <input type="text" name="pincode" value="<?php echo $_SESSION["user"][13] ?>" required></td>
        </tr>


        </table>
        <br>

    <?php
   if($_SESSION["user"][69]=='n' ){
    echo '<button class=" btn waves-effect waves-light" type="submit" value="submit">Save     <i class="material-icons right">save</i></button>';
}
else{
        echo '<button class=" btn waves-effect waves-light" type="submit" value="submit">Update     <i class="material-icons right">save</i></button>';

}

?>

        </form>


        </div>
    <div id="test2" class="col" style="margin-left:25px;">
    <br>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="education"/>

    <h6 class="center">Enter Education Details</h6><br>

    <table class="striped centered">

    <tr>
    <th>
            Exams &nbsp;
        </th>
        <th>
        Exam Passed &nbsp; 
        </th>
        <th>
            Specialization/Subjects  &nbsp; 
        </th>
        <th>
            Board/College &nbsp; 
            </th>
            <th>
            Year of Passing &nbsp;
        </th>
        <th style="10px">
            Marks (%) &nbsp; 
        </th>
        <th>
            Regular / Distance 
    </th>
    </tr>

    <!-- <tr>
        <td> Secondary </td>
        <td><input type="text" name="hs_passed" value="<?php echo $_SESSION["user"][14] ?>"></td>
        <td><input type="text" name="hs_spec" value="<?php echo $_SESSION["user"][15] ?>" ></td>
        <td><input type="text" name="hs_board" value="<?php echo $_SESSION["user"][16] ?>" ></td>
        <td><input type="text" name="hs_year" value="<?php echo $_SESSION["user"][17] ?>"></td>
        <td><input type="text" name="hs_marks" value="<?php echo $_SESSION["user"][18] ?>"></td>
        <td>
              <select name="hs_type" required value="<?php echo $_SESSION["user"][19] ?>">
                  <option value="" disabled selected>Regular/Distance</option>
                  <option value="Regular">Regular</option>
                  <option value="Distance">Distance</option>
              </select>
        </td>

    </tr>
 -->
    <tr>
        <td> Senior Secondary </td>
        <td><input type="text" name="s_passed" value="<?php echo $_SESSION["user"][14] ?>"></td>
        <td><input type="text" name="s_spec" value="<?php echo $_SESSION["user"][15] ?>" ></td>
        <td><input type="text" name="s_board" value="<?php echo $_SESSION["user"][16] ?>" ></td>
        <td><input type="text" name="s_year" value="<?php echo $_SESSION["user"][17] ?>"></td>
        <td><input type="text" name="s_marks" value="<?php echo $_SESSION["user"][18] ?>"></td>
        <td>
              <select name="s_type" required value="<?php echo $_SESSION["user"][19] ?>">
                  <option value="" disabled selected>Regular/Distance</option>
                  <option value="Regular">Regular</option>
                  <option value="Distance">Distance</option>
              </select>
        </td>

    </tr>



    <tr>
        <td> Under Graduate </td>
        <td>
        <select name="u_passed" value="<?php echo $_SESSION["user"][20] ?>" >
            <option value="selectna" disabled selected>Select Degree</option>
            <option value="B.Tech">B.Tech</option>
            <option value="BE">BE</option>
            <option value="B.Sc">B.Sc</option>
            <option value="B.Com">B.Com</option>
            <option value="BA">BA</option>
            <option value="BCA">BCA</option>
            <option value="BBA">BBA</option>
            <option value="BJC">BJC</option>
            <option value="LLB">LLB</option>
            <option value="Other">Other</option>
        </select>
        </td>
        <td><input type="text" name="u_spec" value="<?php echo $_SESSION["user"][21] ?>"></td>
        <td><input type="text" name="u_board" value="<?php echo $_SESSION["user"][22] ?>"></td>
        <td><input type="text" name="u_year" value="<?php echo $_SESSION["user"][23] ?>"></td>
        <td><input type="text" name="u_marks" value="<?php echo $_SESSION["user"][24] ?>"></td>
        <td>
              <select autofocus name="u_type" required>
                  <option value="" disabled selected>Regular/Distance</option>
                  <option value="Regular" <?php if($_SESSION["user"][25]=="Regular") echo 'selected="selected"'; ?>>Regular</option>
                  <option value="Distance" <?php if($_SESSION["user"][25]=="Regular") echo 'selected="selected"'; ?>>Distance</option>
              </select>
        </td>

    </tr>


    <tr>
        <td> Post Graduate </td>
        <td><input type="text" name="p_passed" value="<?php echo $_SESSION["user"][26] ?>"></td>
        <td><input type="text" name="p_spec" value="<?php echo $_SESSION["user"][27] ?>" ></td>
        <td><input type="text" name="p_board" value="<?php echo $_SESSION["user"][28] ?>" ></td>
        <td><input type="text" name="p_year" value="<?php echo $_SESSION["user"][29] ?>"></td>
        <td><input type="text" name="p_marks" value="<?php echo $_SESSION["user"][30] ?>"></td>
        <td>
              <select name="p_type" required value="<?php echo $_SESSION["user"][31] ?>">
                  <option value="" disabled selected>Regular/Distance</option>
                  <option value="Regular">Regular</option>
                  <option value="Distance">Distance</option>
              </select>
        </td>

    </tr>


            </table>

    <br>

    <?php 

    if($_SESSION["user"][68]=='n' ){
    echo '<button class=" btn waves-effect waves-light" type="submit" value="submit">Save     <i class="material-icons right">save</i></button>';
}
else{
        echo '<button class=" btn waves-effect waves-light" type="submit" value="submit">Update     <i class="material-icons right">save</i></button>';

}
?>

            </form>

        </div>


        <div id="test3" class="col s12 m10 offset-m1">

            <br>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="experience"/>
        <h6 class="center"> Enter Experience Details (Starting from current employment)</h6><br>    

        <table class="striped centered">

    <tr>
    <th>
            Organization
        </th>
        <th>
        Designation&nbsp; 
        </th>
        <th>
            From &nbsp; 
        </th>
        <th>
            To &nbsp; 
            </th>
            
        <th>
            Payscale &nbsp; 
        </th>
        <th>
            Reason of leaving&nbsp; 
    </th>

    <th>
            Experience in months&nbsp; 
    </th>

    <th>
            Nature of work&nbsp; 
    </th>
    </tr>


    <tr>
        <td><input type="text" name="e1_org" value="<?php echo $_SESSION["user"][32] ?>"></td>
        <td><input type="text" name="e1_desg" value="<?php echo $_SESSION["user"][33] ?>" ></td>
        <td><input type="text" name="e1_from" value="<?php echo $_SESSION["user"][34] ?>" ></td>
        <td><input type="text" name="e1_to" value="<?php echo $_SESSION["user"][35] ?>"></td>
        <td><input type="text" name="e1_payscale" value="<?php echo $_SESSION["user"][36] ?>"></td>
        <td><input type="text" name="e1_reason" value="<?php echo $_SESSION["user"][37] ?>"></td>
        <td><input type="text" name="e1_exp" value="<?php echo $_SESSION["user"][38] ?>" ></td>
        <td><input type="text" name="e1_nature" value="<?php echo $_SESSION["user"][39] ?>"></td>


    </tr>

    <tr>
        <td><input type="text" name="e2_org" value="<?php echo $_SESSION["user"][40] ?>" ></td>
        <td><input type="text" name="e2_desg" value="<?php echo $_SESSION["user"][41] ?>"></td>
        <td><input type="text" name="e2_from" value="<?php echo $_SESSION["user"][42] ?>" ></td>
        <td><input type="text" name="e2_to" value="<?php echo $_SESSION["user"][43] ?>" ></td>
        <td><input type="text" name="e2_payscale" value="<?php echo $_SESSION["user"][44] ?>" ></td>
        <td><input type="text" name="e2_reason" value="<?php echo $_SESSION["user"][45] ?>" ></td>
        <td><input type="text" name="e2_exp" value="<?php echo $_SESSION["user"][46] ?>"></td>
        <td><input type="text" name="e2_nature" value="<?php echo $_SESSION["user"][47] ?>" ></td>


    </tr>

    <tr>
        <td><input type="text" name="e3_org" value="<?php echo $_SESSION["user"][48] ?>"></td>
        <td><input type="text" name="e3_desg" value="<?php echo $_SESSION["user"][49] ?>" ></td>
        <td><input type="text" name="e3_from" value="<?php echo $_SESSION["user"][50] ?>"></td>
        <td><input type="text" name="e3_to" value="<?php echo $_SESSION["user"][51] ?>" ></td>
        <td><input type="text" name="e3_payscale" value="<?php echo $_SESSION["user"][52] ?>" ></td>
        <td><input type="text" name="e3_reason" value="<?php echo $_SESSION["user"][53] ?>"></td>
        <td><input type="text" name="e3_exp" value="<?php echo $_SESSION["user"][54] ?>"></td>
        <td><input type="text" name="e3_nature" value="<?php echo $_SESSION["user"][55] ?>"></td>


    </tr>

    <tr>
        <td><input type="text" name="e4_org" value="<?php echo $_SESSION["user"][56] ?>"></td>
        <td><input type="text" name="e4_desg"  value="<?php echo $_SESSION["user"][57] ?>"></td>
        <td><input type="text" name="e4_from" value="<?php echo $_SESSION["user"][58] ?>" ></td>
        <td><input type="text" name="e4_to" value="<?php echo $_SESSION["user"][59] ?>"></td>
        <td><input type="text" name="e4_payscale" value="<?php echo $_SESSION["user"][60] ?>" ></td>
        <td><input type="text" name="e4_reason" value="<?php echo $_SESSION["user"][61] ?>"></td>
        <td><input type="text" name="e4_exp" value="<?php echo $_SESSION["user"][62] ?>"></td>
        <td><input type="text" name="e4_nature" value="<?php echo $_SESSION["user"][63] ?>" ></td>


    </tr>
    </table>

    <br>

    <?php
   if($_SESSION["user"][69]=='n' ){
    echo '<button class=" btn waves-effect waves-light" type="submit" value="submit">Save     <i class="material-icons right">save</i></button>';
}
else{
        echo '<button class=" btn waves-effect waves-light" type="submit" value="submit">Update     <i class="material-icons right">save</i></button>';

}

?>
    </form>
    </div>

    <?php 

    $photo="uploads/photo/".$_SESSION["user"][65];
    $sign="uploads/sign/".$_SESSION["user"][66];
    $cv_uploaded=$_SESSION["user"][64];



    if($_SESSION["user"][65]==""){
        $photo="images/sample_photo.png";
    }

    if($_SESSION["user"][66]==""){

        $sign="images/sign_sample.jpg";
    }

    ?>


        <div id="test4" class="col s12">
        
        <hr>
        <br>
        <h6 class="center" style="color:#3FAEA8"><b>Size of document should be less than 1MB</b></h6>
        <br>
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="resume"/>

        <div class="row" style="margin:0px;padding:0px">
                <div class="col m6 s12 center">
                    <label class="label_format" for="cv">Upload Resume</label>
                    <input required type="file" name="cv" id="cv"> 
                    <?php if($cv_uploaded!="")
                     echo " <br> Resume Uploaded  <br>
                    <a href='uploads/cv/$cv_uploaded?rand(0, 1000)'>Click To Review</a>
                    ";
                         
                    if($cv_success=="n")
                    echo "<br> <span class='error'> File Size greater than 1MB </span>";
                    ?>
                    <br>
                </div>

                <button class=" btn waves-effect waves-light" type="submit" value="submit">Upload<i class="material-icons right">cloud_upload</i></button>

                
            </div>

        </form>


        </div>

    
        <div id="test5" class="col s12">

        <hr><br>

    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="act_photo"/>

            <div class="row" style="margin:0px;padding:0px">
                <div class="col m6 s12 center">

                    <label class="label_format" for="photo">Upload Photograph</label>
                    <input required name="photo" type='file' onchange="readPHOTOURL(this);" style="margin:10%"/>
                    <h6>File size should be less than 1MB and jpg, jped, png, gif are allowed.</h6>
                    <br>
                    <button class=" btn waves-effect waves-light" type="submit" value="submit">Upload<i class="material-icons right">cloud_upload</i></button>

                </div>
                <div class="col m6 s12 center">
                    <img id="pic" src="<?php echo $photo ?>?1" alt="your photo" height="150px" width="120px" style="margin:10%"/>

                </div>
            </div>

            </form>

                <hr>

                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="act_sign"/>

            <div class="row" style="margin:0px;padding:0px">
                <div class="col m6 s12 center">
                    <label class="label_format" for="signInput">Upload Signature</label>
                    <input required name="sign" type='file' onchange="readSIGNURL(this);" style="margin:10%"/>
                    <h6>File size should be less than 200KB and jpg, jped, png, gif are allowed.</h6>
                    <br>
                    <button class=" btn waves-effect waves-light" type="submit" value="submit">Upload     <i class="material-icons right">cloud_upload</i></button>

                </div>
                <div class="col m6 s12 center">
                    <img id="sign" src="<?php echo $sign ?>?1" alt="your sign" height="100px" width="400px" style="margin:10%"/>

                </div>

            </div>

            </form>
            

    </div>

    <div id="test6" style="margin-left:5%;margin-right:5%;margin-top:2%">
        
          <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="act_final"/>

        <div class="row">


        <div class="col s12 m6"  style="margin-top:10px">
            <h5 style="color:#3FAEA8"><b>Personal Information</b></h5>
            <table  class="striped" style="border:1px solid black">
            <tr class="table_head">
            <td>Email</td>
            <td><?php echo $_SESSION["user"][0] ?></td>
            </tr>
            <tr>
            <td>Contact</td>
            <td><?php echo $_SESSION["user"][4] ?></td>
            </tr>
            <tr>
            <td>First Name</td>
            <td><?php echo $_SESSION["user"][6] ?></td>
            </tr>
            <tr>
            <td>Middle Name</td>
            <td><?php echo $_SESSION["user"][7] ?></td>
            </tr>
            <tr>
            <td>Last Name</td>
            <td><?php echo $_SESSION["user"][8] ?></td>
            </tr>
            <tr>
            <td>Date of Birth</td>
            <td><?php echo $_SESSION["user"][9] ?></td>
            </tr>
            <tr>
            <td>Address</td>
            <td><?php echo $_SESSION["user"][10] ?></td>
            </tr>
            <tr>
            <td>City</td>
            <td><?php echo $_SESSION["user"][11] ?></td>
            </tr>
            <tr>
            <td>State</td>
            <td><?php echo $_SESSION["user"][12] ?></td>
            </tr>
            <tr>
            <td>Pincode</td>
            <td><?php echo $_SESSION["user"][13] ?></td>
            </tr>

            </table>
        
        </div>

         <div class="col m6 s12 offset-m6 right" style="margin-left:0px;margin-top:20px;padding-left:5%">
             <h5 style="color:#3FAEA8"><b>Photograph</b></h5>
            <img class="center"  width="250px" height="200px"  src="uploads/photo/<?php echo $_SESSION["user"][65] ?>?1" alt="photo">
            <br><br><br>
            <h5  style="color:#3FAEA8"><b>Signaure</b></h5>
            <img class="center" width="300px" height="100px" src="uploads/sign/<?php echo $_SESSION["user"][66] ?>?1" alt="photo"/>
        </div>
     </div>


     <hr style="border: 1px dotted #3FAEA8;">


     <div class="row">
        <h5>Resume</h5>
                  <?php echo "<a href='uploads/cv/$cv_uploaded?rand(0, 1000)'>Click To Review to Resume</a>"; ?>

     </div>
     <hr style="border: 1px dotted #3FAEA8;">
     <br>

    <div class="s12">
        <h5 style="color:#3FAEA8" class="center"><b> Educations Information</b></h5>
        <br>

        <table class="striped" style="border:1px solid black">

        <tr class="table_head">
        <th>
                Exams &nbsp;
            </th>
            <th>
            Exam Passed &nbsp; 
            </th>
            <th>
                Specialization  &nbsp; 
            </th>
            <th>
                Board/College &nbsp; 
                </th>
                <th>
                Year of Passing &nbsp;
            </th>
            <th>
                Marks% &nbsp; 
            </th>
            <th>
                Regular / Distance 
        </th>
        </tr>

        <tr>
            <td>
            Secondary
            </td>
            <td>
            <?php echo $_SESSION["user"][14] ?>
            </td>
            <td>
            <?php echo $_SESSION["user"][15] ?>
            </td>
            <td>
            <?php echo $_SESSION["user"][16] ?>
            </td>
            <td>
            <?php echo $_SESSION["user"][17] ?>
            </td>
            <td>
            <?php echo $_SESSION["user"][18] ?>
            </td>
            <td>
            <?php echo $_SESSION["user"][19] ?>
            </td>
        </tr>

        <tr>
            <td>
            UG
            </td>
            <td>
            <?php echo $_SESSION["user"][20] ?>
            </td>
            <td>
            <?php echo $_SESSION["user"][21] ?>
            </td>
            <td>
            <?php echo $_SESSION["user"][22] ?>
            </td>
            <td>
            <?php echo $_SESSION["user"][23] ?>
            </td>
            <td>
            <?php echo $_SESSION["user"][24] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][25] ?>  
            </td>
        </tr>

        <tr>
            <td>
            PG
            </td>
            <td>
            <?php echo $_SESSION["user"][26] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][27] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][28] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][29] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][30] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][31] ?>  
            </td>
        </tr>


        </table>


        <br>
         <hr style="border: 1px dotted #3FAEA8;">
         <br>

        <h5 style="color:#3FAEA8" class="center"><b>Experience Details</b></h5>

         <br>

        <table class="striped">

        <tr class="table_head">
        <th>
                Organization
            </th>
            <th>
            Designation&nbsp; 
            </th>
            <th>
                From &nbsp; 
            </th>
            <th>
                To &nbsp; 
                </th>
                
            <th>
                Payscale &nbsp; 
            </th>
            <th>
                Reason of leaving&nbsp; 
        </th>

        <th>
                Experience in months&nbsp; 
        </th>

        <th>
                Nature of work&nbsp; 
        </th>
        </tr>



        <tr>
            <td>
            <?php echo $_SESSION["user"][32] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][33] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][34] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][35] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][36] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][37] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][38] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][39] ?>  
            </td>
        </tr>


        <tr>
            <td>
            <?php echo $_SESSION["user"][40] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][41] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][42] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][43] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][44] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][45] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][46] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][47] ?>  
            </td>
        </tr>



        <tr>
            <td>
            <?php echo $_SESSION["user"][48] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][49] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][50] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][51] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][52] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][53] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][54] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][55] ?>  
            </td>
        </tr>



        <tr>
            <td>
            <?php echo $_SESSION["user"][56] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][57] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][58] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][59] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][60] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][61] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][62] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][63] ?>  
            </td>
        </tr>


        </table>

    </div>

    <br>
     <hr style="border: 1px dotted #3FAEA8;">
     <br>


    <div class="row">
    
        <h5 style="color:#3FAEA8" class="center"><b>Declaration</b></h5>
        <br>
        <label style="color:#3FAEA8;margin:10px;font-size:16px;margin-left:15%">
            <span style="margin:2px;">
            <input  type="checkbox" id="check"/>
        </span>
            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  I do hereby declare that all the information given above is true to the best of my knowledge and belief. </b></label>
        <br>
        <br>
        <p class="center" style="color:#f00">Pleae be sure that the details are correct. Once submitted, you cannot edit the application form.
            You can go to previous tabs and ensure that given data is correct</p>
        <button id="submitButton" class="waves-effect waves btn col s6 offset-s3 m2 offset-m5 z-depth-5" style="margin-top:25px;color:#fff"
                type="submit" value="submit" name="action">
            Submit
        </button>

    </div>

</form>
  </div>
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
    
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script type="text/javascript">
            M.AutoInit();

            $("#submitButton").attr("disabled", "disabled");


            $("#check").change(function() {
                if(this.checked) {
                    alert("Pleae be sure that all the details are correct. Once submitted, you cannot edit the application form.")
                    //Do stuff
                     $("#submitButton").removeAttr("disabled");        
                }
                else {
                    //alert("hgh")
                     $("#submitButton").attr("disabled", "disabled");

                }
            });

              document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.tooltipped');
                var instances = M.Tooltip.init(elems);
              });

             function readPHOTOURL(input) {
                 
             if (input.files && input.files[0]) {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                    alert("called");

                     $('#pic')
                         .attr('src', e.target.result)
                         .width(100)
                         .height(100);
               
                 };

                 

            //
            //reader.readAsDataURL(input.files[0]);


             // resetOrientation(e.target.result, 5, function(resetBase64Image) {
             //     alert("adasd");
             //     resetImage.src = resetBase64Image;
             // });

            
            }
            

        }
            function readSIGNURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#sign')
                        .attr('src', e.target.result)
                        .width(400)
                        .height(100);
                };

                //reader.readAsDataURL(input.files[0]);
            }


        }

        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems);
  });



  // code for photo orientation
        function resetOrientation(srcBase64, srcOrientation, callback) {
            var img = new Image();  

            img.onload = function() {

            var width = img.width,
                    height = img.height,
                canvas = document.createElement('canvas'),
                    ctx = canvas.getContext("2d");
                
            // set proper canvas dimensions before transform & export
                if (4 < srcOrientation && srcOrientation < 9) {
                canvas.width = height;
            canvas.height = width;
            } else {
                canvas.width = width;
            canvas.height = height;
            }
            
            // transform context before drawing image
                switch (srcOrientation) {
            case 2: ctx.transform(-1, 0, 0, 1, width, 0); break;
            case 3: ctx.transform(-1, 0, 0, -1, width, height ); break;
            case 4: ctx.transform(1, 0, 0, -1, 0, height ); break;
            case 5: ctx.transform(0, 1, 1, 0, 0, 0); break;
            case 6: ctx.transform(0, 1, -1, 0, height , 0); break;
            case 7: ctx.transform(0, -1, -1, 0, height , width); break;
            case 8: ctx.transform(0, -1, 1, 0, 0, width); break;
            default: break;
            }

                // draw image
            ctx.drawImage(img, 0, 0);

                // export base64
                callback(canvas.toDataURL());
        };

            img.src = srcBase64;
            
        }

       

    </script>   
    

</body>
</html>