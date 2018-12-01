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
        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
        <style type="text/css">

        

        .main {
            padding:4%;
        }
         .tabs .tab a {
            font-size: 8px;
            padding:0 0px;
            width:100%;
            margin:0px
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
            font-size:8px;
            
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

$table_name="user";

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
} else {
    //die("<h1 style='margin-left:20%;margin-top:10px;color:red'>Unauthorized Access !!!<h1>");

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

    $gender=$_POST["gender"];
    $martial=$_POST["martial"];
    $category=$_POST["category"];
    $curr_emp=$_POST["curr_emp"];
    $past_interview=$_POST["past_interview"];
    $past_interview_post=$_POST["past_interview_post"];
    $disability=$_POST["disability"];
    $disability_type=$_POST["disability_type"];
    $nationality=$_POST["nationality"];
    $domicile=$_POST["domicile"];


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


            $sql = "UPDATE $table_name SET fn='$fn', mn='$mn' ,ln='$ln', dob='$dob',gender='$gender',martial='$martial',category='$category',curr_emp='$curr_emp',past_interview='$past_interview',past_interview_post='$past_interview_post',disability='$disability',disability_type='$disability_type',nationality='$nationality', domicile='$domicile', address='$address', city='$city', state='$state', pincode='$pincode', personal_form='y' WHERE email='$email' ";

            if ($conn->query($sql) === TRUE) {
               // echo "Updated successfully";

             $sql="SELECT * FROM $table_name WHERE email='$email' ";

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
    $s_dur=$_POST["s_dur"];
    $s_marks=$_POST["s_marks"];
    $s_type=$_POST["s_type"];

    
    $ss_passed=$_POST["ss_passed"];
    $ss_spec=$_POST["ss_spec"];
    $ss_board=$_POST["ss_board"];
    $ss_year=$_POST["ss_year"];
    $ss_dur=$_POST["ss_dur"];
    $ss_marks=$_POST["ss_marks"];
    $ss_type=$_POST["ss_type"];
    
    $u_passed=$_POST["u_passed"];
    $u_spec=$_POST["u_spec"];
    $u_board=$_POST["u_board"];
    $u_year=$_POST["u_year"];
    $u_dur=$_POST["u_dur"];
    $u_marks=$_POST["u_marks"];
    $u_type=$_POST["u_type"];

    $p_passed=$_POST["p_passed"];
    $p_spec=$_POST["p_spec"];
    $p_board=$_POST["p_board"];
    $p_year=$_POST["p_year"];
    $p_dur=$_POST["p_dur"];
    $p_marks=$_POST["p_marks"];
    $p_type=$_POST["p_type"];


    $e5_name=$_POST["e5_name"];
    $e5_passed=$_POST["e5_passed"];
    $e5_spec=$_POST["e5_spec"];
    $e5_board=$_POST["e5_board"];
    $e5_year=$_POST["e5_year"];
    $e5_dur=$_POST["e5_dur"];
    $e5_marks=$_POST["e5_marks"];
    $e5_type=$_POST["e5_type"];


    $e6_name=$_POST["e6_name"];
    $e6_passed=$_POST["e6_passed"];
    $e6_spec=$_POST["e6_spec"];
    $e6_board=$_POST["e6_board"];
    $e6_year=$_POST["e6_year"];
    $e6_dur=$_POST["e6_dur"];
    $e6_marks=$_POST["e6_marks"];
    $e6_type=$_POST["e6_type"];


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


            $sql = "UPDATE $table_name SET s_passed='$s_passed', s_spec='$s_spec', s_board='$s_board', s_year='$s_year', s_dur='$s_dur', s_marks='$s_marks', s_type='$s_type',  ss_passed='$ss_passed', ss_spec='$ss_spec', ss_board='$ss_board', ss_year='$ss_year', ss_dur='$ss_dur', ss_marks='$ss_marks', ss_type='$s_type', u_passed='$u_passed', u_spec='$u_spec', u_board='$u_board', u_year='$u_year', u_dur='$u_dur', u_marks='$u_marks', u_type='$u_type',  p_passed='$p_passed', p_spec='$p_spec', p_board='$p_board', p_year='$p_year', p_dur='$p_dur', p_marks='$p_marks', p_type='$p_type', e5_name='$e5_name', e5_passed='$e5_passed', e5_spec='$e5_spec', e5_board='$e5_board', e5_year='$e5_year', e5_dur='$e5_dur', e5_marks='$e5_marks', e5_type='$e5_type', e6_name='$e6_name', e6_passed='$e6_passed', e6_spec='$e6_spec', e6_board='$e6_board', e6_year='$e6_year', e6_dur='$e6_dur', e6_marks='$e6_marks', e6_type='$e6_type', edu_form='y'  WHERE email='$email' ";

            if ($conn->query($sql) === TRUE) {
               // echo "Updated successfully";

             $sql="SELECT * FROM $table_name WHERE email='$email' ";

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


            $sql = "UPDATE $table_name SET cv='$file_name.$ext'  WHERE email='$email'";

            if ($conn->query($sql) === TRUE) {
              //  echo "Updated successfully";

             $sql="SELECT * FROM $table_name WHERE email='$email' ";

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


            $sql = "UPDATE $table_name SET photo='$file_name.$ext'  WHERE email='$email'";

            if ($conn->query($sql) === TRUE) {
               // echo "Updated successfully";

             $sql="SELECT * FROM $table_name WHERE email='$email' ";

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


    $sql = "UPDATE $table_name SET sign='$file_name.$ext'  WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
     //   echo "Updated successfully";

     $sql="SELECT * FROM $table_name WHERE email='$email' ";

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

            $e5_org=$_POST["e5_org"];
            $e5_desg=$_POST["e5_desg"];
            $e5_from=$_POST["e5_from"];
            $e5_to=$_POST["e5_to"];
            $e5_payscale=$_POST["e5_payscale"];
            $e5_reason=$_POST["e5_reason"];
            $e5_exp=$_POST["e5_exp"];
            $e5_nature=$_POST["e5_nature"];

            $key_r=$_POST["key_r"];

        
        
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
        

                  
                    $sql = "UPDATE $table_name SET e1_org='$e1_org', e1_desg='$e1_desg', e1_from='$e1_from', e1_to='$e1_to',  e1_payscale='$e1_payscale', e1_reason='$e1_reason', e1_exp='$e1_exp', e1_nature='$e1_nature', e2_org='$e2_org', e2_desg='$e2_desg', e2_from='$e2_from', e2_to='$e2_to', e2_payscale='$e2_payscale', e2_reason='$e2_reason', e2_exp='$e2_exp', e2_nature='$e2_nature', e3_org='$e3_org', e3_desg='$e3_desg', e3_from='$e3_from', e3_to='$e3_to',  e3_payscale='$e3_payscale', e3_reason='$e3_reason', e3_exp='$e3_exp', e3_nature='$e3_nature',  e4_org='$e4_org', e4_desg='$e4_desg', e4_from='$e4_from', e4_to='$e4_to', e4_payscale='$e4_payscale', e4_reason='$e4_reason', e4_exp='$e4_exp', e4_nature='$e4_nature',  e5_org='$e5_org', e5_desg='$e5_desg', e5_from='$e5_from', e5_to='$e5_to', e5_payscale='$e5_payscale', e5_reason='$e5_reason', e5_exp='$e5_exp', e5_nature='$e5_nature', key_r='$key_r', exp_form='y'  WHERE email='$email' ";
        
                    if ($conn->query($sql) === TRUE) {
                       // echo "Updated successfully";
        
                     $sql="SELECT * FROM $table_name WHERE email='$email' ";
        
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

 else if($_POST['act'] == 'other'){
            
     $page="other";

        



$error=false;

if(!$error){

    // if no error save to database

    $sop=$_POST["sop"];
    $training=$_POST["training"];



    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{


        $sql = "UPDATE $table_name SET sop='$sop', training='$training', other_form='y'  WHERE email='$email' ";

        if ($conn->query($sql) === TRUE) {
           // echo "Updated successfully";

         $sql="SELECT * FROM $table_name WHERE email='$email' ";

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


        else if($_POST['act'] == 'act_final'){


        // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                else{
        

                  
                    $sql = "UPDATE $table_name SET final='y'  WHERE email='$email' ";
        
                    if ($conn->query($sql) === TRUE) {
                       // echo "Updated successfully";
        
                     $sql="SELECT * FROM $table_name WHERE email='$email' ";
        
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
        <li class="tab col s2"><a  href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2 "><a href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s2 "><a  href="#test7" style="color: #3FAEA8"><b>Other Details</b></a></li>
        
        <li class="tab col s2"><a href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][17]=='y'&&$_SESSION["user"][18]=='y'&&$_SESSION["user"][19]=='y'&&$_SESSION["user"][126]=='y'&&$_SESSION["user"][15]!=NULL&&$_SESSION["user"][16]!=NULL){
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
        <li class="tab col s2"><a  class="active" href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2"><a href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s2"><a  href="#test7" style="color: #3FAEA8"><b>Other Details</b></a></li>
        
        <li class="tab col s2"><a href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][17]=='y'&&$_SESSION["user"][18]=='y'&&$_SESSION["user"][19]=='y'&&$_SESSION["user"][126]=='y'&&$_SESSION["user"][15]!=NULL&&$_SESSION["user"][16]!=NULL){
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
        <li class="tab col s2"><a   href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2 "><a class="active" href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s2 "><a  href="#test7" style="color: #3FAEA8"><b>Other Details</b></a></li>
         
        <li class="tab col s2"><a href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][17]=='y'&&$_SESSION["user"][18]=='y'&&$_SESSION["user"][19]=='y'&&$_SESSION["user"][126]=='y'&&$_SESSION["user"][15]!=NULL&&$_SESSION["user"][16]!=NULL){
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
        <li class="tab col s2"><a   href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2 "><a  href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s2 "><a  href="#test7" style="color: #3FAEA8"><b>Other Details</b></a></li>
        
        <li class="tab col s2"><a class="active" href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][17]=='y'&&$_SESSION["user"][18]=='y'&&$_SESSION["user"][19]=='y'&&$_SESSION["user"][126]=='y'&&$_SESSION["user"][15]!=NULL&&$_SESSION["user"][16]!=NULL){
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
        <li class="tab col s2"><a   href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2 "><a  href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s2 "><a  href="#test7" style="color: #3FAEA8"><b>Other Details</b></a></li>
        <li class="tab col s2"><a  href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][17]=='y'&&$_SESSION["user"][18]=='y'&&$_SESSION["user"][19]=='y'&&$_SESSION["user"][126]=='y'&&$_SESSION["user"][15]!=NULL&&$_SESSION["user"][16]!=NULL){
            echo '<li class="tab col s2"><a href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }
        else{
             echo '<li class="tab col s2"><a class="disabled" href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }

      echo '</ul>';
  }

  else if($page=="other"){

    echo '
    <ul class="tabs">
      <li class="tab col s2"><a   href="#test1" style="color: #3FAEA8"><b>Personal Information</b></a></li>
      <li class="tab col s3"><a   href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
      <li class="tab col s2 "><a  href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
      <li class="tab col s2 "><a class="active" href="#test7" style="color: #3FAEA8"><b>Other Details</b></a></li>
      <li class="tab col s2"><a  href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

      if($_SESSION["user"][17]=='y'&&$_SESSION["user"][18]=='y'&&$_SESSION["user"][19]=='y'&&$_SESSION["user"][126]=='y'&&$_SESSION["user"][15]!=NULL&&$_SESSION["user"][16]!=NULL){
        echo '<li class="tab col s2"><a href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

      }
      else{
           echo '<li class="tab col s2"><a class="disabled" href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

      }

    echo '</ul>';
}
 

  ?>
    </div>
</div>
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
        <td>Gender <span class="required">*</span></td>
         <td>
              <select autofocus name="gender" required>
                  <option value="" disabled selected>Gender</option>
                  <option value="Male" <?php if($_SESSION["user"][21]=="Male") echo 'selected="selected"'; ?>>Male</option>
                  <option value="Female" <?php if($_SESSION["user"][21]=="Female") echo 'selected="selected"'; ?>>Female</option>
                  <option value="Transgender" <?php if($_SESSION["user"][21]=="Transgender") echo 'selected="selected"'; ?>>Transgender</option>

              </select>
        </td>
        </tr>

        <tr>
        <td>Marital Status <span class="required">*</span></td>
        <td>
              <select autofocus name="martial" required>
                  <option value="" disabled selected>Married/Unmarried</option>
                  <option value="Married" <?php if($_SESSION["user"][22]=="Married") echo 'selected="selected"'; ?>>Married</option>
                  <option value="Unmarried" <?php if($_SESSION["user"][22]=="Unmarried") echo 'selected="selected"'; ?>>Unmarried</option>

              </select>
        </td>
        </tr>
        <tr>
        <td>Category <span class="required">*</span></td>
        <td>
              <select autofocus name="category" required>
                  <option value="" disabled selected>Category</option>
                  <option value="General" <?php if($_SESSION["user"][23]=="General") echo 'selected="selected"'; ?>>General</option>
                  <option value="OBC Creamy Layer" <?php if($_SESSION["user"][23]=="OBC Creamy Layer") echo 'selected="selected"'; ?>>OBC Creamy Layer</option>
                  <option value="OBC Non Creamy Layer" <?php if($_SESSION["user"][23]=="OBC Non Creamy Layer") echo 'selected="selected"'; ?>>OBC Non Creamy Layer</option>
                  <option value="SC" <?php if($_SESSION["user"][23]=="SC") echo 'selected="selected"'; ?>>SC</option>
                  <option value="ST" <?php if($_SESSION["user"][23]=="ST") echo 'selected="selected"'; ?>>ST</option>
                  <option value="Ex-Serviceman" <?php if($_SESSION["user"][23]=="Ex-Serviceman") echo 'selected="selected"'; ?>>Ex-Serviceman</option>
              </select>
        </td>
        </tr>
        <tr>
        <td>Current Emp of IIIT-D ?  <span class="required">*</span></td>
        <td>
              <select autofocus name="curr_emp" required>
                  <option value="" disabled selected>Yes/No</option>
                  <option value="Yes" <?php if($_SESSION["user"][24]=="Yes") echo 'selected="selected"'; ?>>Yes</option>
                  <option value="No" <?php if($_SESSION["user"][24]=="No") echo 'selected="selected"'; ?>>No</option>

              </select>
        </td>       
        </tr>
        <tr>
        <td>Ever Interviewed by IIITD ?  <span class="required">*</span></td>
        <td> 
            <select autofocus name="past_interview" required>
                  <option value="" disabled selected>Yes/No</option>
                  <option value="Yes" <?php if($_SESSION["user"][25]=="Yes") echo 'selected="selected"'; ?>>Yes</option>
                  <option value="No" <?php if($_SESSION["user"][25]=="No") echo 'selected="selected"'; ?>>No</option>

              </select>
            <div class="yess" id="intervDiv" style="display: block;"> <label for="field2"><span>When and for which post ?</span>
            <input name="past_interview_post" class="input-field" type="text" value="<?php echo $_SESSION["user"][26] ?>" ></label></div>


        </td>
        </tr>
        <tr>
        <td>Physical Disability  <span class="required">*</span></td>
        <td><select autofocus name="disability" required>
                  <option value="" disabled selected>Yes/No</option>
                  <option value="Yes" <?php if($_SESSION["user"][27]=="Yes") echo 'selected="selected"'; ?>>Yes</option>
                  <option value="No" <?php if($_SESSION["user"][27]=="No") echo 'selected="selected"'; ?>>No</option>

              </select>
            <div class="yesBoxx" id="phydis" style="display: block;"> <label for="field2"><span>If Yes, then Type of Disablity</span>
            <input name="disability_type" class="input-field" type="text" value="<?php echo $_SESSION["user"][28] ?>" ></label></div>

        </td>
        </tr>

        <tr>
        <td>Nationality<span class="required">*</span></td>
        <td> <input name="nationality" class="input-field" id="national" type="text" value="<?php echo $_SESSION["user"][29] ?>" required></td>
        </tr>
        <tr>
        <td>Domicile<span class="required">*</span></td>
        <td> <input name="domicile" class="input-field" id="domici" type="text" value="<?php echo $_SESSION["user"][30] ?>" required></td>
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
   if($_SESSION["user"][17]=='n' ){
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
        </th style="10px;width:25px">
        <th style="10px;width:120px">
        Exam Passed &nbsp; 
        </th>
        <th style="10px;width:25px">
            Specialization/Subjects  &nbsp; 
        </th>
        <th style="10px;width:25px">
            Board/College &nbsp; 
            </th>
        <th style="10px;width:25px">
            Year of Passing &nbsp;
        </th>
        <th style="10px;width:20px"> 
            Duration(in years)
        </th>    
        <th style="10px;width:15px">
            Marks (%) &nbsp; 
        </th>
        <th style="10px;width:150px">
            Regular / Distance / Part-Time
    </th>
    <th> Upload Document 
    </th>    
    </tr>


    <tr>
    <td>Secondary</td>
        <td><input type="text" name="s_passed" value="<?php echo $_SESSION["user"][32] ?>" required></td>
        <td><input type="text" name="s_spec" value="<?php echo $_SESSION["user"][33] ?>" required></td>
        <td><input type="text" name="s_board" value="<?php echo $_SESSION["user"][34] ?>" required></td>
        <td><input type="text" name="s_year" value="<?php echo $_SESSION["user"][35] ?>" required></td>
        <td><input type="text" name="s_dur" value="<?php echo $_SESSION["user"][36] ?>" required></td>
        <td><input type="text" name="s_marks" value="<?php echo $_SESSION["user"][37] ?>" required></td>
        <td>
        <select autofocus name="s_type" required>
                  <option value="" disabled selected>Choose Option</option>
                  <option value="Regular" <?php if($_SESSION["user"][38]=="Regular") echo 'selected="selected"'; ?>>Regular</option>
                  <option value="Distance" <?php if($_SESSION["user"][38]=="Distance") echo 'selected="selected"'; ?>>Distance</option>
                  <option value="Part" <?php if($_SESSION["user"][38]=="Part") echo 'selected="selected"'; ?>>Part-Time</option>

              </select>
        </td>
        <td>
         <input required type="file" name="s_doc" id="cv" > 
                    <?php if($cv_uploaded!="")
                     echo " <br> Doc Uploaded  <br>
                    <a href='uploads/cv/$cv_uploaded?rand(0, 1000)'>Click To Review</a>
                    ";
                         
                    if($cv_success=="n")
                    echo "<br> <span class='error'> File Size greater than 1MB </span>";
                    ?>
        </td>            

    </tr>
    <tr>
    <td>Senior Secondary</td>
        <td><input type="text" name="ss_passed" value="<?php echo $_SESSION["user"][41] ?>" required></td>
        <td><input type="text" name="ss_spec" value="<?php echo $_SESSION["user"][42] ?>" required></td>
        <td><input type="text" name="ss_board" value="<?php echo $_SESSION["user"][43] ?>" required></td>
        <td><input type="text" name="ss_year" value="<?php echo $_SESSION["user"][44] ?>" required></td>
        <td><input type="text" name="ss_dur" value="<?php echo $_SESSION["user"][45] ?>" required></td>

        <td><input type="text" name="ss_marks" value="<?php echo $_SESSION["user"][46] ?>" required></td>
        <td>
        <select autofocus name="ss_type" required>
                  <option value="" disabled selected>Choose Option</option>
                  <option value="Regular" <?php if($_SESSION["user"][47]=="Regular") echo 'selected="selected"'; ?>>Regular</option>
                  <option value="Distance" <?php if($_SESSION["user"][47]=="Distance") echo 'selected="selected"'; ?>>Distance</option>
                  <option value="Part" <?php if($_SESSION["user"][47]=="Part") echo 'selected="selected"'; ?>>Part-Time</option>

              </select>
        </td>
        <td>
         <input required type="file" name="ss_doc" id="cv" > 
                    <?php if($cv_uploaded!="")
                     echo " <br> Resume Uploaded  <br>
                    <a href='uploads/cv/$cv_uploaded?rand(0, 1000)'>Click To Review</a>
                    ";
                         
                    if($cv_success=="n")
                    echo "<br> <span class='error'> File Size greater than 1MB </span>";
                    ?>
        </td>    

    </tr>



    <tr>
    <td>Under Graduate</td>

        <td>
        <select name="u_passed" value="<?php echo $_SESSION["user"][50] ?>" required>
            <option value="selectna" disabled selected>Select Degree</option>
            <option value="B.Tech" <?php if($_SESSION["user"][50]=="B.Tech") echo 'selected="selected"'; ?>>B.Tech</option>
            <option value="BE" <?php if($_SESSION["user"][50]=="BE") echo 'selected="selected"'; ?>>BE</option>
            <option value="B.Sc" <?php if($_SESSION["user"][50]=="B.Sc") echo 'selected="selected"'; ?>>B.Sc</option>
            <option value="B.Com" <?php if($_SESSION["user"][50]=="B.Com") echo 'selected="selected"'; ?>>B.Com</option>
            <option value="BA" <?php if($_SESSION["user"][50]=="BA") echo 'selected="selected"'; ?>>BA</option>
            <option value="BCA" <?php if($_SESSION["user"][50]=="BCA") echo 'selected="selected"'; ?>>BCA</option>
            <option value="BBA" <?php if($_SESSION["user"][50]=="BBA") echo 'selected="selected"'; ?>>BBA</option>
            <option value="BJC" <?php if($_SESSION["user"][50]=="BJC") echo 'selected="selected"'; ?>>BJC</option>
            <option value="LLB" <?php if($_SESSION["user"][50]=="LLB") echo 'selected="selected"'; ?>>LLB</option>
            <option value="Other" <?php if($_SESSION["user"][50]=="Other") echo 'selected="selected"'; ?>>Other</option>

        </select>
        </td>
        <td><input type="text" name="u_spec" value="<?php echo $_SESSION["user"][51] ?>" required></td>
        <td><input type="text" name="u_board" value="<?php echo $_SESSION["user"][52] ?>" required></td>
        <td><input type="text" name="u_year" value="<?php echo $_SESSION["user"][53] ?>" required></td>
        <td><input type="text" name="u_dur" value="<?php echo $_SESSION["user"][54] ?>" required></td>

        <td><input type="text" name="u_marks" value="<?php echo $_SESSION["user"][55] ?>" required></td>
        <td>
              <select autofocus name="u_type" required>
                  <option value="" disabled selected>Choose Option</option>
                  <option value="Regular" <?php if($_SESSION["user"][56]=="Regular") echo 'selected="selected"'; ?>>Regular</option>
                  <option value="Distance" <?php if($_SESSION["user"][56]=="Distance") echo 'selected="selected"'; ?>>Distance</option>
                  <option value="Part" <?php if($_SESSION["user"][56]=="Part") echo 'selected="selected"'; ?>>Part-Time</option>

              </select>
        </td>
        <td>
         <input required type="file" name="u_doc" id="cv"> 
                    <?php if($cv_uploaded!="")
                     echo " <br> Resume Uploaded  <br>
                    <a href='uploads/cv/$cv_uploaded?rand(0, 1000)'>Click To Review</a>
                    ";
                         
                    if($cv_success=="n")
                    echo "<br> <span class='error'> File Size greater than 1MB </span>";
                    ?>
        </td>    

    </tr>

    <tr>
    <td>Post Graduate</td>
        <td><input type="text" name="p_passed" value="<?php echo $_SESSION["user"][59] ?>" required></td>
        <td><input type="text" name="p_spec" value="<?php echo $_SESSION["user"][60] ?>" required></td>
        <td><input type="text" name="p_board" value="<?php echo $_SESSION["user"][61] ?>" required></td>
        <td><input type="text" name="p_year" value="<?php echo $_SESSION["user"][62] ?>" required></td>
        <td><input type="text" name="p_dur" value="<?php echo $_SESSION["user"][63] ?>" required></td>

        <td><input type="text" name="p_marks" value="<?php echo $_SESSION["user"][64] ?>" required></td>
        <td>
        <select autofocus name="p_type" required>
                  <option value="" disabled selected>Choose Option</option>
                  <option value="Regular" <?php if($_SESSION["user"][65]=="Regular") echo 'selected="selected"'; ?>>Regular</option>
                  <option value="Distance" <?php if($_SESSION["user"][65]=="Distance") echo 'selected="selected"'; ?>>Distance</option>
                  <option value="Part" <?php if($_SESSION["user"][65]=="Part") echo 'selected="selected"'; ?>>Part-Time</option>

              </select>
        </td>
        <td>
         <input required type="file" name="p_doc" id="cv"> 
                    <?php if($cv_uploaded!="")
                     echo " <br> Resume Uploaded  <br>
                    <a href='uploads/cv/$cv_uploaded?rand(0, 1000)'>Click To Review</a>
                    ";
                         
                    if($cv_success=="n")
                    echo "<br> <span class='error'> File Size greater than 1MB </span>";
                    ?>
        </td>    

    </tr>


    <tr id="ex1" style="display: none">
        <td><input type="text" id="e5_name" name="e5_name" value="<?php echo $_SESSION["user"][67] ?>"></td>
        <td><input type="text" id="e5_passed" name="e5_passed" value="<?php echo $_SESSION["user"][68] ?>"></td>
        <td><input type="text" id="e5_spec" name="e5_spec" value="<?php echo $_SESSION["user"][69] ?>" ></td>
        <td><input type="text" id="e5_board" name="e5_board" value="<?php echo $_SESSION["user"][70] ?>" ></td>
        <td><input type="text" id="e5_year" name="e5_year" value="<?php echo $_SESSION["user"][71] ?>"></td>
        <td><input type="text" id="e5_dur" name="e5_dur" value="<?php echo $_SESSION["user"][72] ?>"></td>

        <td><input type="text" id="e5_marks" name="e5_marks" value="<?php echo $_SESSION["user"][73] ?>"></td>
        <td>
        <select autofocus id="e5_type" name="e5_type" >
                  <option value="" disabled selected>Choose Option</option>
                  <option value="Regular" <?php if($_SESSION["user"][74]=="Regular") echo 'selected="selected"'; ?>>Regular</option>
                  <option value="Distance" <?php if($_SESSION["user"][74]=="Distance") echo 'selected="selected"'; ?>>Distance</option>
                  <option value="Part" <?php if($_SESSION["user"][74]=="Part") echo 'selected="selected"'; ?>>Part-Time</option>

              </select>
        </td>
        <td>
         <input  type="file" name="e5_doc" id="e5_doc"> 
                    <?php if($cv_uploaded!="")
                     echo " <br> Resume Uploaded  <br>
                    <a href='uploads/cv/$cv_uploaded?rand(0, 1000)'>Click To Review</a>
                    ";
                         
                    if($cv_success=="n")
                    echo "<br> <span class='error'> File Size greater than 1MB </span>";
                    ?>
        </td>    

    </tr>


    <tr id="ex2" style="display: none">
        <td><input type="text" id="e6_name" name="e6_name" value="<?php echo $_SESSION["user"][76] ?>"></td>
        <td><input type="text" id="e6_passed" name="e6_passed" value="<?php echo $_SESSION["user"][77] ?>"></td>
        <td><input type="text" id="e6_spec" name="e6_spec" value="<?php echo $_SESSION["user"][78] ?>" ></td>
        <td><input type="text" id="e6_board" name="e6_board" value="<?php echo $_SESSION["user"][79] ?>" ></td>
        <td><input type="text" id="e6_year" name="e6_year" value="<?php echo $_SESSION["user"][80] ?>"></td>
        <td><input type="text" id="e6_dur" name="e6_dur" value="<?php echo $_SESSION["user"][81] ?>"></td>

        <td><input type="text" id="e6_marks" name="e6_marks" value="<?php echo $_SESSION["user"][82] ?>"></td>
        <td>
        <select autofocus id="e6_type" name="e6_type" >
                  <option value="" disabled selected>Choose Option</option>
                  <option value="Regular" <?php if($_SESSION["user"][83]=="Regular") echo 'selected="selected"'; ?>>Regular</option>
                  <option value="Distance" <?php if($_SESSION["user"][83]=="Distance") echo 'selected="selected"'; ?>>Distance</option>
                  <option value="Part" <?php if($_SESSION["user"][83]=="Part") echo 'selected="selected"'; ?>>Part-Time</option>

              </select>
        </td>
        <td>
         <input  type="file" name="e6_doc" id="e6_doc"> 
                    <?php if($cv_uploaded!="")
                     echo " <br> Resume Uploaded  <br>
                    <a href='uploads/cv/$cv_uploaded?rand(0, 1000)'>Click To Review</a>
                    ";
                         
                    if($cv_success=="n")
                    echo "<br> <span class='error'> File Size greater than 1MB </span>";
                    ?>
        </td>    

    </tr>           
     </table>
     <span style="position:absolute;left:20px" id="addmore" class=" btn waves-effect waves-light right" onclick="addmore();">Add More <i class="material-icons right">add</i></span>

     <span style="position:absolute;left:160px" id="deleterow" class=" btn waves-effect waves-light right" onclick="deleterow();">Delete row <i class="material-icons right">delete</i></span>

            <br>
            <br>
            <br>
<div class="form-style-2-heading">Languages Known : </div>
<div style="width:150px; float:left;">Hindi</div><label>&nbsp;&nbsp;&nbsp;&nbsp;<input name="hindi1[]" type="checkbox" checked="" value="Read">&nbsp;&nbsp;Read &nbsp;&nbsp; <input name="hindi1[]" type="checkbox" value="Write">&nbsp;&nbsp;Write &nbsp; &nbsp; <input name="hindi1[]" type="checkbox" value="Speak">&nbsp;&nbsp;Speak</label>
<br>
<div style="width:150px; float:left;">English</div><label>&nbsp;&nbsp;&nbsp;&nbsp;<input name="english1[]" type="checkbox" checked="" value="Read">&nbsp;&nbsp;Read &nbsp;&nbsp; <input name="english1[]" type="checkbox" value="Write">&nbsp;&nbsp;Write &nbsp; &nbsp; <input name="english1[]" type="checkbox" value="Speak">&nbsp;&nbsp;Speak</label>
<div style="width:150px; float:left;">Others (Specify) </div><label><input name="otherlang" class="tel-number-field" type="text" placeholder="Specify here" value=""></label>
<br>

    <br>

    <br><br>
    <?php 

    if($_SESSION["user"][18]=='n' ){
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
        <td><input type="text" name="e1_org" value="<?php echo $_SESSION["user"][85] ?>"></td>
        <td><input type="text" name="e1_desg" value="<?php echo $_SESSION["user"][86] ?>" ></td>
        <td><input type="text" name="e1_from" value="<?php echo $_SESSION["user"][87] ?>" ></td>
        <td><input type="text" name="e1_to" value="<?php echo $_SESSION["user"][88] ?>"></td>
        <td><input type="text" name="e1_payscale" value="<?php echo $_SESSION["user"][89] ?>"></td>
        <td><input type="text" name="e1_reason" value="<?php echo $_SESSION["user"][90] ?>"></td>
        <td><input type="text" name="e1_exp" value="<?php echo $_SESSION["user"][91] ?>" ></td>
        <td><input type="text" name="e1_nature" value="<?php echo $_SESSION["user"][92] ?>"></td>


    </tr>

    <tr >
        <td><input type="text" name="e2_org" value="<?php echo $_SESSION["user"][93] ?>" ></td>
        <td><input type="text" name="e2_desg" value="<?php echo $_SESSION["user"][94] ?>"></td>
        <td><input type="text" name="e2_from" value="<?php echo $_SESSION["user"][95] ?>" ></td>
        <td><input type="text" name="e2_to" value="<?php echo $_SESSION["user"][96] ?>" ></td>
        <td><input type="text" name="e2_payscale" value="<?php echo $_SESSION["user"][97] ?>" ></td>
        <td><input type="text" name="e2_reason" value="<?php echo $_SESSION["user"][98] ?>" ></td>
        <td><input type="text" name="e2_exp" value="<?php echo $_SESSION["user"][99] ?>"></td>
        <td><input type="text" name="e2_nature" value="<?php echo $_SESSION["user"][100] ?>" ></td>


    </tr>

    <tr id="exp1" style="display:none">
        <td><input type="text" name="e3_org" value="<?php echo $_SESSION["user"][101] ?>" required></td>
        <td><input type="text" name="e3_desg" value="<?php echo $_SESSION["user"][102] ?>" ></td>
        <td><input type="text" name="e3_from" value="<?php echo $_SESSION["user"][103] ?>"></td>
        <td><input type="text" name="e3_to" value="<?php echo $_SESSION["user"][104] ?>" ></td>
        <td><input type="text" name="e3_payscale" value="<?php echo $_SESSION["user"][105] ?>" ></td>
        <td><input type="text" name="e3_reason" value="<?php echo $_SESSION["user"][106] ?>"></td>
        <td><input type="text" name="e3_exp" value="<?php echo $_SESSION["user"][107] ?>"></td>
        <td><input type="text" name="e3_nature" value="<?php echo $_SESSION["user"][108] ?>"></td>


    </tr>

    <tr id="exp2" style="display:none">
        <td><input type="text" name="e4_org" value="<?php echo $_SESSION["user"][109] ?>" required></td>
        <td><input type="text" name="e4_desg"  value="<?php echo $_SESSION["user"][110] ?>"></td>
        <td><input type="text" name="e4_from" value="<?php echo $_SESSION["user"][111] ?>" ></td>
        <td><input type="text" name="e4_to" value="<?php echo $_SESSION["user"][112] ?>"></td>
        <td><input type="text" name="e4_payscale" value="<?php echo $_SESSION["user"][113] ?>" ></td>
        <td><input type="text" name="e4_reason" value="<?php echo $_SESSION["user"][114] ?>"></td>
        <td><input type="text" name="e4_exp" value="<?php echo $_SESSION["user"][115] ?>"></td>
        <td><input type="text" name="e4_nature" value="<?php echo $_SESSION["user"][116] ?>" ></td>


    </tr>
    <tr id="exp3" style="display:none">
        <td><input type="text" name="e5_org" value="<?php echo $_SESSION["user"][117] ?>"></td>
        <td><input type="text" name="e5_desg"  value="<?php echo $_SESSION["user"][118] ?>"></td>
        <td><input type="text" name="e5_from" value="<?php echo $_SESSION["user"][119] ?>" ></td>
        <td><input type="text" name="e5_to" value="<?php echo $_SESSION["user"][120] ?>"></td>
        <td><input type="text" name="e5_payscale" value="<?php echo $_SESSION["user"][121] ?>" ></td>
        <td><input type="text" name="e5_reason" value="<?php echo $_SESSION["user"][122] ?>"></td>
        <td><input type="text" name="e5_exp" value="<?php echo $_SESSION["user"][123] ?>"></td>
        <td><input type="text" name="e5_nature" value="<?php echo $_SESSION["user"][124] ?>" ></td>


    </tr>
    </table>

    <br>    <br>
    <br>
    

    <div class="col s8 offset-s2" style="margin:50px">
                <h5 style="text-align: center;padding:20px">Key Responsibilities</h5>  

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="word_count3" name="key_r"  placeholder="key responsibility" class="materialize-textarea" ><?php echo $_SESSION["user"][125] ?></textarea>
                      <label for="word_count3">Textarea</label>
                        Total word count: <span id="display_count3">0</span> words. 
                        Words left: <span id="word_left3">100</span>                   
                         </div>
                  </div>
            </div>
    

    <?php
   if($_SESSION["user"][19]=='n' ){
    echo '<button style="margin:50px;" class="btn waves-effect waves-light" type="submit" value="submit">Save     <i class="material-icons right">save</i></button>';
}
else{
        echo '<button class=" btn waves-effect waves-light" type="submit" value="submit">Update     <i class="material-icons right">save</i></button>';

}

?>
    </form>
    <br><br><br>

    <button style="position:relative;top:-300px"  id="addmore1" class=" btn waves-effect waves-light right" onclick="addmore1();">Add More <i class="material-icons right">add</i></button>


    

    </div>

    <?php 

    $photo="uploads/photo/".$_SESSION["user"][15];
    $sign="uploads/sign/".$_SESSION["user"][16];
    $cv_uploaded=$_SESSION["user"][64];



    if($_SESSION["user"][65]==""){
        $photo="images/sample_photo.png";
    }

    if($_SESSION["user"][66]==""){

        $sign="images/sign_sample.jpg";
    }

    ?>


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
                    <img id="pic" src="<?php echo "uploads/photo/".$_SESSION["user"][15] ?>?1" alt="your photo" height="150px" width="120px" style="margin:10%"/>

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
                    <img id="sign" src="<?php echo "uploads/sign/".$_SESSION["user"][16] ?>?1" alt="your sign" height="100px" width="400px" style="margin:10%"/>

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


      <div id="test7" style="margin-left:5%;margin-right:5%;margin-top:2%">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="other"/>
            <div class="row"  style="background-color:#dbfcfa;border-radius:20px;border-color: #2196F3!important;
    color: #000!important;background-color: #ddffff!important;border-left: 6px ridge #3FAEA8!important;">

                <h5 style="text-align: center;padding:20px">Enter Statement of Purpose</h5>  

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="word_count" name="sop"  class="materialize-textarea" ><?php echo $_SESSION["user"][127] ?></textarea>
                      <label for="word_count">Textarea</label>
                        Total word count: <span id="display_count">0</span> words. 
                        Words left: <span id="word_left">500</span>                   
                         </div>
                  </div>
            </div>

            <div class="row"  style="background-color:#dbfcfa;border-radius:20px;border-color: #2196F3!important;
    color: #000!important;background-color: #ddffff!important;border-left: 6px ridge #3FAEA8!important;">
                <h5 style="text-align: center;padding:20px">Training Undertaken</h5>  

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="word_count1" name="training"  class="materialize-textarea" ><?php echo $_SESSION["user"][128] ?></textarea>
                      <label for="word_count1">Textarea</label>
                        Total word count: <span id="display_count1">0</span> words. 
                        Words left: <span id="word_left1">200</span>                   
                         </div>
                  </div>
            </div>

                <?php
   if($_SESSION["user"][126]=='n' ){
    echo '<button class=" btn waves-effect waves-light" type="submit" value="submit">Save     <i class="material-icons right">save</i></button>';
}
else{
        echo '<button class=" btn waves-effect waves-light" type="submit" value="submit">Update     <i class="material-icons right">save</i></button>';

}

?>
                          
</form>
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

<?php

if($_SESSION["user"][67]!=""){
    ?>
<script type="text/javascript" language="javascript">
                document.getElementById("ex1").style.display = "table-row";


</script>
<?php

}
else{
    jQuery( "#deleterow" ).css("background-color", "grey");

}

?>

<?php

if($_SESSION["user"][76]!=""){
    ?>
<script type="text/javascript" language="javascript">
                document.getElementById("ex2").style.display = "table-row";
                document.getElementById("addmore").disabled = true;
                jQuery( "#addmore" ).css("background-color", "grey");

</script>
<?php

}

?>

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

            }
            }

              function addmore() {
                var e1 = document.getElementById("ex1");
                var e2 = document.getElementById("ex2");

                if(e1.style.display == "none"){

                    document.getElementById("ex1").style.display = "table-row";
                    jQuery( "#deleterow" ).css("background-color", "");

                    $("#e5_name").prop('required',true);
                    $("#e5_passed").prop('required',true);
                    $("#e5_spec").prop('required',true);
                    $("#e5_board").prop('required',true);
                    $("#e5_year").prop('required',true);
                    $("#e5_dur").prop('required',true);
                    $("#e5_marks").prop('required',true);
                    $("#e5_type").prop('required',true);
                    $("#e5_doc").prop('required',true);

                }
                else if(e2.style.display == "none"){

                    document.getElementById("ex2").style.display = "table-row";
                    document.getElementById("addmore").disabled = true;
                    jQuery( "#addmore" ).css("background-color", "grey");

                    $("#e6_name").prop('required',true);
                    $("#e6_passed").prop('required',true);
                    $("#e6_spec").prop('required',true);
                    $("#e6_board").prop('required',true);
                    $("#e6_year").prop('required',true);
                    $("#e6_dur").prop('required',true);
                    $("#e6_marks").prop('required',true);
                    $("#e6_type").prop('required',true);
                    $("#e6_doc").prop('required',true);

               
                }
                
               }

             
             function deleterow(){
                   
                   var e1 = document.getElementById("ex1");
                   var e2 = document.getElementById("ex2");
   
                   if(e2.style.display == "table-row"){
   
                    jQuery( "#addmore" ).css("background-color", "");

                       document.getElementById("ex2").style.display = "none";
                       $("#e6_name").prop('required',false);
                       $("#e6_passed").prop('required',false);
                       $("#e6_spec").prop('required',false);
                       $("#e6_board").prop('required',false);
                       $("#e6_year").prop('required',false);
                       $("#e6_dur").prop('required',false);
                       $("#e6_marks").prop('required',false);
                       $("#e6_type").prop('required',false);
                       $("#e6_doc").prop('required',false);

                       $('#e6_name').val('');
                       $('#e6_passed').val('');
                       $('#e6_spec').val('');
                       $('#e6_board').val('');
                       $('#e6_year').val('');
                       $('#e6_dur').val('');
                       $('#e6_marks').val('');
                       $('#e6_type').val('');
                       $('#e6_doc').val('');
                    
   
                   }
                   else if(e1.style.display == "table-row"){
   
                       document.getElementById("ex1").style.display = "none";
                       //document.getElementById("addmore").disabled = true;
                       jQuery( "#deleterow" ).css("background-color", "grey");

                       $("#e5_name").prop('required',false);
                       $("#e5_passed").prop('required',false);
                       $("#e5_spec").prop('required',false);
                       $("#e5_board").prop('required',false);
                       $("#e5_year").prop('required',false);
                       $("#e5_dur").prop('required',false);
                       $("#e5_marks").prop('required',false);
                       $("#e5_type").prop('required',false);
                       $("#e5_doc").prop('required',false);

                         $('#e5_name').val('');
                       $('#e5_passed').val('');
                       $('#e5_spec').val('');
                       $('#e5_board').val('');
                       $('#e5_year').val('');
                       $('#e5_dur').val('');
                       $('#e5_marks').val('');
                       $('#e5_type').val('');
                       $('#e5_doc').val('');
   
                  
                  }
   
             }   

                function addmore1() {
                var e1 = document.getElementById("exp1");
                var e2 = document.getElementById("exp2");
                var e3 = document.getElementById("exp3");


                if(e1.style.display == "none"){

                    document.getElementById("exp1").style.display = "table-row";
                }
                else if(e2.style.display == "none"){

                    document.getElementById("exp2").style.display = "table-row";
                }
                else if(e3.style.display == "none"){
                    document.getElementById("exp3").style.display = "table-row";
                    document.getElementById("addmore1").disabled = true;

                }
                
               }
    

                 

            //
            //reader.readAsDataURL(input.files[0]);


             // resetOrientation(e.target.result, 5, function(resetBase64Image) {
             //     alert("adasd");
             //     resetImage.src = resetBase64Image;
             // });

            
                        

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

        // $(document).ready(function(){

        //     // Add new element
        //     $("#addMore").click(function(){
        //         alert("adsad");
        //     }
        // }

    //     $(document).ready(function() {
    // $('input#input_text, textarea#textarea2').characterCounter();
    //  });
       $(document).ready(function() {
  $("#word_count").on('keyup', function() {

    var words = this.value.match(/\S+/g).length;


    if (words > 500) {
      // Split the string on first 200 words and rejoin on spaces
      var trimmed = $(this).val().split(/\s+/, 200).join(" ");
      // Add a space at the end to make sure more typing creates new words
      $(this).val(trimmed + " ");
    }

    else {
      $('#display_count').text(words);
      $('#word_left').text(500-words);
    }
  });
}); 

            $(document).ready(function() {
  $("#word_count1").on('keyup', function() {

    var words = this.value.match(/\S+/g).length;


    if (words > 200) {
      // Split the string on first 200 words and rejoin on spaces
      var trimmed = $(this).val().split(/\s+/, 200).join(" ");
      // Add a space at the end to make sure more typing creates new words
      $(this).val(trimmed + " ");
    }

    else {
      $('#display_count1').text(words);
      $('#word_left1').text(200-words);
    }
  });
}); 


            $(document).ready(function() {
  $("#word_count3").on('keyup', function() {

    var words = this.value.match(/\S+/g).length;


    if (words > 200) {
      // Split the string on first 200 words and rejoin on spaces
      var trimmed = $(this).val().split(/\s+/, 200).join(" ");
      // Add a space at the end to make sure more typing creates new words
      $(this).val(trimmed + " ");
    }

    else {
      $('#display_count3').text(words);
      $('#word_left3').text(200-words);
    }
  });
}); 

      
    </script>   
    

</body>
</html>