<!DOCTYPE html>

<html>
<head>
    <title>Application Form</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/main_styles.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="print.css" media="print">

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
            font-size: 10px;
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

            font-size: 10px;
            
         }

         


        .tabs .tab a:hover {
            background-color: #e8f5e9;
            color:#000;
        } /*Text color on hover*/

        .tabs .tab a.active {
            background-color:#e8f5e9;
            color:#000;
        } /*Background and text color when a tab is active*/

        .tabs .indicator {
            background-color:#000;
        } /*Color of underline*/

    .disabled {
        pointer-events: none;
        cursor: default;
        background-color: #c0c0c0;

            }

    .error{
        color: #ff0000;
    }
    .tab{
        border: 1px solid green;
    }
    #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: #eee;
      border: 1px solid black;
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 4px;
    }

    #myBtn:hover {
      background-color: #e8f5e9;
    }
    
   table.fixed {table-layout:fixed; width:90px;}/*Setting the table width is important!*/
table.fixed td {overflow:hidden;}/*Hide text outside the cell.*/
table.fixed td:nth-of-type(1) {width:20px;}/*Setting the width of column 1.*/
table.fixed td:nth-of-type(2) {width:30px;}/*Setting the width of column 2.*/
table.fixed td:nth-of-type(3) {width:40px;}/*Setting the width of column 3.*/

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

    $s_doc_error=false;
    $ss_doc_error=false;
    $u_doc_error=false;

    $p_doc_error=false;
    $e5_doc_error=false;
    $e6_doc_error=false;

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
    if(isset($_POST["e5_type"])){
        $e5_type=$_POST["e5_type"];

    }else{
        $e5_type="";
    }


    $e6_name=$_POST["e6_name"];
    $e6_passed=$_POST["e6_passed"];
    $e6_spec=$_POST["e6_spec"];
    $e6_board=$_POST["e6_board"];
    $e6_year=$_POST["e6_year"];
    $e6_dur=$_POST["e6_dur"];
    $e6_marks=$_POST["e6_marks"];
    if(isset($_POST["e6_type"])){
        $e6_type=$_POST["e6_type"];

    }else{
        $e6_type="";
    }


    if(isset($_POST["h_read"])){
        $h_read=$_POST["h_read"];

    }else{
        $h_read="No";
    }

    
    if(isset($_POST["h_write"])){
        $h_write=$_POST["h_write"];

    }else{
        $h_write="No";
    }

    
    if(isset($_POST["h_speak"])){
        $h_speak=$_POST["h_speak"];

    }else{
        $h_speak="No";
    }

    
    if(isset($_POST["e_read"])){
        $e_read=$_POST["e_read"];

    }else{
        $e_read="No";
    }

    
    if(isset($_POST["e_write"])){
        $e_write=$_POST["e_write"];

    }else{
        $e_write="No";
    }

    
    if(isset($_POST["e_speak"])){
        $e_speak=$_POST["e_speak"];

    }else{
        $e_speak="No";
    }

    $otherlang=$_POST["otherlang"];

    $error=false;


   if(isset($_FILES["s_doc"]) && $_FILES["s_doc"]["error"] == 0){
        $allowed = array('pdf'=>'application/pdf');
        $filename = $_FILES["s_doc"]["name"];
        $filetype = $_FILES["s_doc"]["type"];
        $filesize = $_FILES["s_doc"]["size"];
        $maxsize = 1024*1024;

        if($filesize > $maxsize) {
              //die("Error: File size is larger than the allowed limit.");
              echo "<script>alert('File size greater than 1MB')</script>";
            $s_doc_error=true;
            $error=true;


        }

        elseif(!in_array($filetype, $allowed))
        {
              echo "<script>alert('Please upload pdf only')</script>";
                  $s_doc_error=true;
                $error=true;


         }

         else {

              $dir="uploads".DIRECTORY_SEPARATOR."s_doc".DIRECTORY_SEPARATOR;

              $file_name=$email."_s_doc";
                        
             // // Verify file extension
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
                
                move_uploaded_file($_FILES["s_doc"]["tmp_name"], $dir. $file_name.".".$ext);
                 //echo "Your Photo was uploaded successfully.";

                 }
                    
                }
                else{
                }


    if(isset($_FILES["ss_doc"]) && $_FILES["ss_doc"]["error"] == 0){
        $allowed = array('pdf'=>'application/pdf');
        $filename = $_FILES["ss_doc"]["name"];
        $filetype = $_FILES["ss_doc"]["type"];
        $filesize = $_FILES["ss_doc"]["size"];
        $maxsize = 1024*1024;

        if($filesize > $maxsize) {
              //die("Error: File size is larger than the allowed limit.");
              echo "<script>alert('File size greater than 1MB')</script>";
            $ss_doc_error=true;
            $error=true;


        }

        elseif(!in_array($filetype, $allowed))
        {
              echo "<script>alert('Please upload pdf only')</script>";
                  $ss_doc_error=true;
                $error=true;


         }

         else {

              $dir="uploads".DIRECTORY_SEPARATOR."ss_doc".DIRECTORY_SEPARATOR;

              $file_name=$email."_ss_doc";
                        
             // // Verify file extension
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
                
                move_uploaded_file($_FILES["ss_doc"]["tmp_name"], $dir. $file_name.".".$ext);
                 //echo "Your Photo was uploaded successfully.";

                 }
                    
                }
                else{
                }


    if(isset($_FILES["u_doc"]) && $_FILES["u_doc"]["error"] == 0){
        $allowed = array('pdf'=>'application/pdf');
        $filename = $_FILES["u_doc"]["name"];
        $filetype = $_FILES["u_doc"]["type"];
        $filesize = $_FILES["u_doc"]["size"];
        $maxsize = 1024*1024;

        if($filesize > $maxsize) {
              //die("Error: File size is larger than the allowed limit.");
              echo "<script>alert('File size greater than 1MB')</script>";
            $u_doc_error=true;
            $error=true;


        }

        elseif(!in_array($filetype, $allowed))
        {
              echo "<script>alert('Please upload pdf only')</script>";
                  $u_doc_error=true;
                $error=true;


         }

         else {

              $dir="uploads".DIRECTORY_SEPARATOR."u_doc".DIRECTORY_SEPARATOR;

              $file_name=$email."_u_doc";
                        
             // // Verify file extension
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
                
                move_uploaded_file($_FILES["u_doc"]["tmp_name"], $dir. $file_name.".".$ext);
                 //echo "Your Photo was uploaded successfully.";

                 }
                    
                }
                else{
                }


    if(isset($_FILES["p_doc"]) && $_FILES["p_doc"]["error"] == 0){
        $allowed = array('pdf'=>'application/pdf');
        $filename = $_FILES["p_doc"]["name"];
        $filetype = $_FILES["p_doc"]["type"];
        $filesize = $_FILES["p_doc"]["size"];
        $maxsize = 1024*1024;

        if($filesize > $maxsize) {
              //die("Error: File size is larger than the allowed limit.");
              echo "<script>alert('File size greater than 1MB')</script>";
            $p_doc_error=true;
            $error=true;


        }

        elseif(!in_array($filetype, $allowed))
        {
              echo "<script>alert('Please upload pdf only')</script>";
                  $p_doc_error=true;
                $error=true;


         }

         else {

              $dir="uploads".DIRECTORY_SEPARATOR."p_doc".DIRECTORY_SEPARATOR;

              $file_name=$email."_p_doc";
                        
             // // Verify file extension
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
                
                move_uploaded_file($_FILES["p_doc"]["tmp_name"], $dir. $file_name.".".$ext);
               //  echo "Your Photo was uploaded successfully.";

                 }
                    
                }
                else{
                }


    if(isset($_FILES["e5_doc"]) && $_FILES["e5_doc"]["error"] == 0){
        $allowed = array('pdf'=>'application/pdf');
        $filename = $_FILES["e5_doc"]["name"];
        $filetype = $_FILES["e5_doc"]["type"];
        $filesize = $_FILES["e5_doc"]["size"];
        $maxsize = 1024*1024;

        if($filesize > $maxsize) {
              //die("Error: File size is larger than the allowed limit.");
              echo "<script>alert('File size greater than 1MB')</script>";
            $e5_doc_error=true;
            $error=true;


        }

        elseif(!in_array($filetype, $allowed))
        {
              echo "<script>alert('Please upload pdf only')</script>";
                  $e5_doc_error=true;
                $error=true;


         }

         else {

              $dir="uploads/e5_doc/";

              $dir="uploads".DIRECTORY_SEPARATOR."e5_doc".DIRECTORY_SEPARATOR;
                        
             // // Verify file extension
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
                
                move_uploaded_file($_FILES["e5_doc"]["tmp_name"], $dir. $file_name.".".$ext);
                // echo "Your Photo was uploaded successfully.";

                 }
                    
                }
                else{
                }


    if(isset($_FILES["e6_doc"]) && $_FILES["e6_doc"]["error"] == 0){
        $allowed = array('pdf'=>'application/pdf');
        $filename = $_FILES["e6_doc"]["name"];
        $filetype = $_FILES["e6_doc"]["type"];
        $filesize = $_FILES["e6_doc"]["size"];
        $maxsize = 1024*1024;

        if($filesize > $maxsize) {
              //die("Error: File size is larger than the allowed limit.");
              echo "<script>alert('File size greater than 1MB')</script>";
            $e6_doc_error=true;
            $error=true;


        }

        elseif(!in_array($filetype, $allowed))
        {
              echo "<script>alert('Please upload pdf only')</script>";
                  $e6_doc_error=true;
                $error=true;


         }

         else {

              $dir="uploads/e6_doc/";

              $dir="uploads".DIRECTORY_SEPARATOR."e6_doc".DIRECTORY_SEPARATOR;
                        
             // // Verify file extension
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
                
                move_uploaded_file($_FILES["e6_doc"]["tmp_name"], $dir. $file_name.".".$ext);
                // echo "Your Photo was uploaded successfully.";

                 }
                    
                }
                else{
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


            $sql = "UPDATE $table_name SET s_passed='$s_passed', s_spec='$s_spec', s_board='$s_board', s_year='$s_year', s_dur='$s_dur', s_marks='$s_marks', s_type='$s_type',  ss_passed='$ss_passed', ss_spec='$ss_spec', ss_board='$ss_board', ss_year='$ss_year', ss_dur='$ss_dur', ss_marks='$ss_marks', ss_type='$s_type', u_passed='$u_passed', u_spec='$u_spec', u_board='$u_board', u_year='$u_year', u_dur='$u_dur', u_marks='$u_marks', u_type='$u_type',  p_passed='$p_passed', p_spec='$p_spec', p_board='$p_board', p_year='$p_year', p_dur='$p_dur', p_marks='$p_marks', p_type='$p_type', e5_name='$e5_name', e5_passed='$e5_passed', e5_spec='$e5_spec', e5_board='$e5_board', e5_year='$e5_year', e5_dur='$e5_dur', e5_marks='$e5_marks', e5_type='$e5_type', e6_name='$e6_name', e6_passed='$e6_passed', e6_spec='$e6_spec', e6_board='$e6_board', e6_year='$e6_year', e6_dur='$e6_dur', e6_marks='$e6_marks', e6_type='$e6_type', h_read='$h_read', h_write='$h_write',h_speak='$h_speak',e_read='$e_read',e_write='$e_write',e_speak='$e_speak', otherlang='$otherlang' ,edu_form='y'  WHERE email='$email' ";

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

                else if($_POST['act'] == 's_doc'){
                $page="docs";

                        // Check if file was uploaded without errors
                        if(isset($_FILES["cv"]) && $_FILES["cv"]["error"] == 0){
                            
                            $filename = $_FILES["cv"]["name"];
                            $filetype = $_FILES["cv"]["type"];
                            $filesize = $_FILES["cv"]["size"];

                            if($filesize/(1024*1024)>1) {

                                $cv_success="n";
                                echo "file not ok";

                            }
                            else {
                            $dir="uploads/cv/";
                            $file_name=$email."_cv";
                        
                            // // Verify file extension
                             $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            // if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                            move_uploaded_file($_FILES["cv"]["tmp_name"], $dir. $file_name.".".$ext);
                         
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


        $sql = "UPDATE $table_name SET sop='$sop', training='$training', other_form='y'  WHERE email='$email'";

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
    <a  href="logout.php" style="float:right;margin:20px;" class="btn tooltipped right notprint" style="position:relative;top:10px;right:15px;z-index:6" data-position="bottom" data-tooltip="Click to Logout">
              Logout<span><i class="material-icons">exit_to_app</i></span>
              </a>
      <div style="max-width:75%!important;height: 15vh">
            <div id="site-logo">
              <a href=""title="Home"><img src="https://www.iiitd.ac.in/sites/all/themes/impact_theme/logo.png" alt="Home"></a>
              

            </div>

        </div>

    </header>

    

  <div class="row">
    <div class="row">
    <div class="col s12">
      <div class="center"><h5 style="color: #3FAEA8"><b>Application Form</b></h5></div>     

      <?php if($page==""||$page=="personal"){
        echo '
      <ul class="tabs notprint">
        <li class="tab col s2"><a class="active"  href="#test1" style="color: #3FAEA8"><b>Personal Information</b></a></li>
        <li class="tab col s2"><a  href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
        <li class="tab col s2 "><a href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
        <li class="tab col s2 "><a  href="#test7" style="color: #3FAEA8"><b>Other Details</b></a></li>
        
        <li class="tab col s2"><a href="#test5" style="color: #3FAEA8"><b>Photo And Signature</b></a></li>';

        if($_SESSION["user"][17]=='y'&&$_SESSION["user"][18]=='y'&&$_SESSION["user"][19]=='y'&&$_SESSION["user"][126]=='y'&&$_SESSION["user"][15]!=NULL&&$_SESSION["user"][16]!=NULL){
                 echo '<li class="tab col s2"><a href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';
        }
        else{
             //echo '<li class="tab col s2"><a href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';
              echo '<li class="tab col s2"><a class="disabled" href="#test6" style="color: #3FAEA8"><b>Final Submit</b></a></li>';

        }

      echo '</ul>';
  }
  else if($page=="education"){
        echo '
      <ul class="tabs notprint">
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
      <ul class="tabs notprint">
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
      <ul class="tabs notprint">
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
      <ul class="tabs notprint">
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
    <ul class="tabs notprint">
      <li class="tab col s2"><a   href="#test1" style="color: #3FAEA8"><b>Personal Information</b></a></li>
      <li class="tab col s2"><a   href="#test2"  style="color: #3FAEA8"><b>Educational Qualifications</b></a></li>
      <li class="tab col s2 "><a  href="#test3" style="color: #3FAEA8"><b>Experience Details</b></a></li>
      <li class="tab col s2 "><a class="active"  href="#test7" style="color: #3FAEA8"><b>Other Details</b></a></li>
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
        


    <div id="test1" class="col s12 m8 offset-m2" style="margin:40px">

        
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

        <input type="hidden" name="act" value="personal"/>
        <h6 class="center" style="color:#3FAEA8"><b>Enter Personal Information</b></h6><br>
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
        <script type="text/javascript">
                function change2(obj){

                    var idx = obj.selectedIndex; 
                    var val = obj.options[idx].value;
                    //alert(val);
                // dis = document.getElementById("disId");
                 box = document.getElementById("yess");

                // box.style.display = "inline";
                 if(val == "Yes"){
                   box.style.display = "inline";
                   //alert("yes");
                 }
                 else if(val == "No"){
                     box.style.display = "none";
                     //alert("no");
                 }
            }
            </script> 
        <td> 
            <select autofocus name="past_interview" required onchange="change2(this);">
                  <option value="" disabled selected>Yes/No</option>
                  <option value="Yes" <?php if($_SESSION["user"][25]=="Yes") echo 'selected="selected"'; ?>>Yes</option>
                  <option value="No" <?php if($_SESSION["user"][25]=="No") echo 'selected="selected"'; ?>>No</option>

              </select>
            <div id="yess" id="intervDiv" style="display: block;"> <label for="field2"><span>For which post ?</span>
            <input name="past_interview_post" class="input-field" type="text" required value="<?php echo $_SESSION["user"][26] ?>" ></label></div>


        </td>
        </tr>
            <?php

            if($_SESSION["user"][25]=="Yes"){
                
            ?>
            <script type="text/javascript">
            document.getElementById("yess").style.display="inline";
            </script>
            <?php    

            }
            else{
            ?>
            <script type="text/javascript">
            document.getElementById("yess").style.display="none";
            </script>

            <?php

            }

            ?>
        <tr>
        <td>Physical Disability  <span class="required">*</span></td>
        <script type="text/javascript">
                function change1(obj){

                    var idx = obj.selectedIndex; 
                    var val = obj.options[idx].value;
                //    alert(val);
                // dis = document.getElementById("disId");
                 box = document.getElementById("yesBoxx");

                // box.style.display = "inline";
                 if(val == "Yes"){
                   box.style.display = "inline";
                   //alert("yes");
                 }
                 else if(val == "No"){
                     box.style.display = "none";
                     //alert("no");
                 }
            }
            </script>  
        <td><select id="disId" autofocus name="disability" required onchange="change1(this);">
                  <option value="" disabled selected>Yes/No</option>
                  <option value="Yes" <?php if($_SESSION["user"][27]=="Yes") echo 'selected="selected"'; ?>>Yes</option>
                  <option value="No" <?php if($_SESSION["user"][27]=="No") echo 'selected="selected"'; ?>>No</option>

              </select>
            
            <div id="yesBoxx" id="phydis" style="display: block;"> <label for="field2"><span>If Yes, then Type of Disablity</span>
            <input name="disability_type" class="input-field" required type="text" value="<?php echo $_SESSION["user"][28] ?>" ></label></div>

        </td>
        </tr>



            <?php

            if($_SESSION["user"][27]=="Yes"){
                
            ?>
            <script type="text/javascript">
            document.getElementById("yesBoxx").style.display="inline";
            </script>
            <?php    

            }
            else{
            ?>
            <script type="text/javascript">
            document.getElementById("yesBoxx").style.display="none";
            </script>

            <?php

            }

            ?>


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

<?php
  $s_doc=$_SESSION["user"][39];
    $ss_doc=$_SESSION["user"][48];
    $u_doc=$_SESSION["user"][57];
    $p_doc=$_SESSION["user"][66];
    $e5_doc=$_SESSION["user"][75];
    $e6_doc=$_SESSION["user"][84];


?>

        </div>
    <div id="test2" class="col" style="margin-left:25px;margin-right:25px;">
    <br>

    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="education"/>

    <h6 class="center" style="color:#3FAEA8"><b>Enter Education Details</b></h6><br>
   

    <table class="striped centered">
        
    <tr>
    <th>
            Examination &nbsp;
        </th style="10px;width:25px">
        <th style="10px;width:120px">
        Examination Passed &nbsp; 
        </th>
        <th style="10px;width:25px">
            Specialization/Subjects  &nbsp; 
        </th>
        <th style="10px;width:25px">
            Board/Institute &nbsp; 
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
        <th style="10px;width:200px">
            Regular / Distance / Part-Time &nbsp;
    </th>
    <th style="10px;width:100px"> Upload Document 
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
                    <?php if($s_doc!="")
                     echo " <br> Doc Uploaded  <br>
                    <a href='uploads/s_doc/$s_doc?rand(0, 1000)'>Click To Review</a>";
                         
                    if($s_doc_error)
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
         <?php if($ss_doc!="")
                     echo " <br> Doc Uploaded  <br>
                    <a href='uploads/s_doc/$ss_doc?rand(0, 1000)'>Click To Review</a>";
                         
                    if($ss_doc_error)
                    echo "<br> <span class='error'> File Size greater than 1MB </span>";
                    ?>
        </td>    

    </tr>



    <tr>
    <td>Under Graduate</td>

        <td>
        <select name="u_passed"  required>
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
         <?php if($u_doc!="")
                     echo " <br> Doc Uploaded  <br>
                    <a href='uploads/u_doc/$s_doc?rand(0, 1000)'>Click To Review</a>";
                         
                    if($u_doc_error)
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
         <?php if($p_doc!="")
                     echo " <br> Doc Uploaded  <br>
                    <a href='uploads/s_doc/$p_doc?rand(0, 1000)'>Click To Review</a>";
                         
                    if($p_doc_error)
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
         <?php if($e5_doc!="")
                     echo " <br> Doc Uploaded  <br>
                    <a href='uploads/s_doc/$e5_doc?rand(0, 1000)'>Click To Review</a>";
                         
                    if($e5_doc_error)
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
         <?php if($e6_doc!="")
                     echo " <br> Doc Uploaded  <br>
                    <a href='uploads/s_doc/$e6_doc?rand(0, 1000)'>Click To Review</a>";
                         
                    if($e6_doc_error)
                    echo "<br> <span class='error'> File Size greater than 1MB </span>";
                    ?>
        </td>    

    </tr>           
     </table>

     <br>
     <span style="position:absolute;left:20px" id="addmore" class=" btn waves-effect waves-light right" onclick="addmore();">Add More <i class="material-icons right">add</i></span>

     <span style="position:absolute;left:160px" id="deleterow" class=" btn waves-effect waves-light right" onclick="deleterow();">Delete row <i class="material-icons right">delete</i></span>

            <br>
            <br>
            <br>
<h6 class="left" style="color:#3FAEA8"><b>Languages Known :</b></h6><br>

<br>
<div style="width:150px; float:left;">Hindi

        <p>
        <label>
        <input type="checkbox" id="h_read" name="h_read" value="Yes" />
        <span>Read</span>
      </label>
  </p><p>
      <label>
        <input type="checkbox" id="h_write" name="h_write"
               value="Yes" />
        <span>Write</span>
      </label>
      </p><p>
      <label>
        <input type="checkbox" id="h_speak" name="h_speak"
               value="Yes"  />
        <span>Speak</span>
      </label>
  </p>
</div>
<div style="width:150px; float:left;">English
    
    <p>
        <label>
        <input type="checkbox" id="e_read" name="e_read" value="Yes" />
        <span>Read</span>
      </label>
  </p><p>
      <label>
        <input type="checkbox" id="e_write" name="e_write"
               value="Yes" />
        <span>Write</span>
      </label>
      </p><p>
      <label>
        <input type="checkbox" id="e_speak" name="e_speak"
               value="Yes"  />
        <span>Speak</span>
      </label>
  </p>

</div>

<br>
<br>

<div class="left" style="clear: both;">Other Languages Known (Write comma seperated if more than one) </div><label><input name="otherlang" class="tel-number-field" type="text" placeholder="Specify here" value="<?php echo $_SESSION["user"][135]   ?>"></label>
<br>

    <br>

    <?php 

    if($_SESSION["user"][18]=='n' ){
    echo '<button class=" btn waves-effect waves-light" style="margin-bottom:20px;" type="submit" value="submit">Save     <i class="material-icons right">save</i></button>';
}
else{
        echo '<button class=" btn waves-effect waves-light"  style="margin-bottom:20px"="submit" value="submit">Update     <i class="material-icons right">save</i></button>';

}
?>

            </form>

        </div>


        <div id="test3" class="col s12 m10 offset-m1" style="margin-left:5%;margin-right:5%">

            <br>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="experience"/>
    <h6 class="center" style="color:#3FAEA8"><b> Enter Experience Details (Starting from current employment)</b></h6><br>
    

        <table class="striped centered">

    <tr>
    <th>
            Organization
        </th>
        <th>
        Designation&nbsp; 
        </th>
        <th>
            From (mm/yyyy)&nbsp; 
        </th>
        <th>
            To (mm/yyyy)&nbsp; 
            </th>
            
        <th> 
            Payscale &nbsp; 

        </th>
        <th>
            Reason of leaving&nbsp; 
    </th>

    <th>
            Experience (in months)&nbsp; 
    </th>

    <th>
            Nature of work&nbsp; 
    </th>
    </tr>


    <tr id="exp1" style="display:none">
        <td><input type="text" id="e1_org" name="e1_org"  value="<?php echo $_SESSION["user"][85] ?>"></td>
        <td><input type="text" id="e1_desg" name="e1_desg"  value="<?php echo $_SESSION["user"][86] ?>" ></td>
        <td><input type="text" id="e1_from" name="e1_from"  value="<?php echo $_SESSION["user"][87] ?>" ></td>
        <td><input type="text" id="e1_to"  name="e1_to"  value="<?php echo $_SESSION["user"][88] ?>"></td>
        <td><input type="text" id="e1_payscale"   name="e1_payscale" value="<?php echo $_SESSION["user"][89] ?>"></td>
        <td><input type="text" id="e1_reason"  name="e1_reason" value="<?php echo $_SESSION["user"][90] ?>"></td>
        <td><input type="text" id="e1_exp"  name="e1_exp" value="<?php echo $_SESSION["user"][91] ?>" ></td>
        <td><input type="text" id="e1_nature"  name="e1_nature" value="<?php echo $_SESSION["user"][92] ?>"></td>


    </tr>

    <tr id="exp2" style="display:none">
        <td><input type="text" id="e2_org"  name="e2_org" value="<?php echo $_SESSION["user"][93] ?>" ></td>
        <td><input type="text" id="e2_desg"   name="e2_desg" value="<?php echo $_SESSION["user"][94] ?>"></td>
        <td><input type="text" id="e2_from"  name="e2_from" value="<?php echo $_SESSION["user"][95] ?>" ></td>
        <td><input type="text" id="e2_to"   name="e2_to" value="<?php echo $_SESSION["user"][96] ?>" ></td>
        <td><input type="text" id="e2_payscale"  name="e2_payscale" value="<?php echo $_SESSION["user"][97] ?>" ></td>
        <td><input type="text" id="e2_reason"  name="e2_reason" value="<?php echo $_SESSION["user"][98] ?>" ></td>
        <td><input type="text" id="e2_exp"  name="e2_exp" value="<?php echo $_SESSION["user"][99] ?>"></td>
        <td><input type="text" id="e2_nature"  name="e2_nature" value="<?php echo $_SESSION["user"][100] ?>" ></td>


    </tr>

    <tr id="exp3" style="display:none">
        <td><input type="text" id="e3_org" name="e3_org" value="<?php echo $_SESSION["user"][101] ?>" ></td>
        <td><input type="text" id="e3_desg" name="e3_desg" value="<?php echo $_SESSION["user"][102] ?>" ></td>
        <td><input type="text" id="e3_from" name="e3_from" value="<?php echo $_SESSION["user"][103] ?>"></td>
        <td><input type="text" id="e3_to" name="e3_to" value="<?php echo $_SESSION["user"][104] ?>" ></td>
        <td><input type="text" id="e3_payscale" name="e3_payscale" value="<?php echo $_SESSION["user"][105] ?>" ></td>
        <td><input type="text" id="e3_reason" name="e3_reason" value="<?php echo $_SESSION["user"][106] ?>"></td>
        <td><input type="text" id="e3_exp" name="e3_exp" value="<?php echo $_SESSION["user"][107] ?>"></td>
        <td><input type="text" id="e3_nature" name="e3_nature" value="<?php echo $_SESSION["user"][108] ?>"></td>


    </tr>

    <tr id="exp4" style="display:none">
        <td><input type="text" id="e4_org" name="e4_org" value="<?php echo $_SESSION["user"][109] ?>" ></td>
        <td><input type="text" id="e4_desg" name="e4_desg"  value="<?php echo $_SESSION["user"][110] ?>"></td>
        <td><input type="text" id="e4_from" name="e4_from" value="<?php echo $_SESSION["user"][111] ?>" ></td>
        <td><input type="text" id="e4_to" name="e4_to" value="<?php echo $_SESSION["user"][112] ?>"></td>
        <td><input type="text" id="e4_payscale" name="e4_payscale" value="<?php echo $_SESSION["user"][113] ?>" ></td>
        <td><input type="text" id="e4_reason" name="e4_reason" value="<?php echo $_SESSION["user"][114] ?>"></td>
        <td><input type="text" id="e4_exp" name="e4_exp" value="<?php echo $_SESSION["user"][115] ?>"></td>
        <td><input type="text" id="e4_nature" name="e4_nature" value="<?php echo $_SESSION["user"][116] ?>" ></td>


    </tr>
    <tr id="exp5" style="display:none">
        <td><input type="text" id="e5_org" name="e5_org" value="<?php echo $_SESSION["user"][117] ?>"></td>
        <td><input type="text" id="e5_desg" name="e5_desg"  value="<?php echo $_SESSION["user"][118] ?>"></td>
        <td><input type="text" id="e5_from" name="e5_from" value="<?php echo $_SESSION["user"][119] ?>" ></td>
        <td><input type="text" id="e5_to" name="e5_to" value="<?php echo $_SESSION["user"][120] ?>"></td>
        <td><input type="text" id="e5_payscale" name="e5_payscale" value="<?php echo $_SESSION["user"][121] ?>" ></td>
        <td><input type="text" id="e5_reason" name="e5_reason" value="<?php echo $_SESSION["user"][122] ?>"></td>
        <td><input type="text" id="e5_exp" name="e5_exp" value="<?php echo $_SESSION["user"][123] ?>"></td>
        <td><input type="text" id="e5_nature"  name="e5_nature" value="<?php echo $_SESSION["user"][124] ?>" ></td>


    </tr>
    </table>

    <span style="position:absolute;margin:4px;margin-left:4%;left:20px" id="addmore1" class=" btn waves-effect waves-light right" onclick="addmore1();">Add More <i class="material-icons right">add</i></span>

<span style="position:absolute;left:160px;margin:4px;margin-left:5%;" id="deleterow1" class=" btn waves-effect waves-light right" onclick="deleterow1();">Delete row <i class="material-icons right">delete</i></span>


    <br>    <br>
    <br>
    

    <div class="col s8 offset-s2" style="margin:50px;padding:10px;border-color: #3FAEA8!important;border: solid; border-width: thin;
            ">
                <h6 style="text-align: center;padding-left:20px;color:#3FAEA8"><b>Key Responsibilities</b></h6>  

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="text1" name="key_r"  placeholder="key responsibility" data-length="10" class="materialize-textarea" ><?php echo $_SESSION["user"][125] ?></textarea>
                      <div id="result1"></div>   
                      <p style="color:green" class="left">You Can not use special characters other than allowed ones (left parenthesis, right parenthesis, comma and fullstop)</p>               
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

    <!-- <button style="position:relative;top:-300px"  id="addmore1" class=" btn waves-effect waves-light right" onclick="addmore1();">Add More <i class="material-icons right">add</i></button> -->


    

    </div>

    <?php 

    $photo="uploads/photo/".$_SESSION["user"][15];
    $sign="uploads/sign/".$_SESSION["user"][16];
    $cv_uploaded=$_SESSION["user"][64];
    $s_doc=$_SESSION["user"][64];
    $ss_doc=$_SESSION["user"][64];
    $u_doc=$_SESSION["user"][64];
    $p_doc=$_SESSION["user"][64];
    $e5_doc=$_SESSION["user"][64];
    $e6_doc=$_SESSION["user"][64];



    if($_SESSION["user"][65]==""){
        $photo="images/sample_photo.png";
    }

    if($_SESSION["user"][66]==""){

        $sign="images/sign.jpg";
    }

    ?>


        <div id="test5" class="row">

        <hr style="border: 1px dotted #3FAEA8;"><br>



    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="act_photo"/>

            <div class="row" style="margin:0px;padding:0px">
                <div class="col m6 s12 center">

                    <label class="label_format" for="photo">Upload Photograph</label>
                    <input required name="photo" type='file' onchange="readPHOTOURL(this);" style="margin:10%"/>
                    <h6>File size should be less than 1MB.<br>Only jpg, jped, png, gif are allowed.</h6>
                    <br>
                    <button class=" btn waves-effect waves-light" type="submit" value="submit">Upload<i class="material-icons right">cloud_upload</i></button>

                </div>
                <div class="col m6 s12 center">
                    <img id="pic" src="<?php $ph = $_SESSION["user"][15]; if($ph != "") echo "uploads/photo/".$_SESSION["user"][15]; else echo "images/sample_photo.png"; ?>" alt="your photo" height="150px" width="120px" style="margin:10%"/>

                </div>
            </div>

            </form>

<hr style="border: 1px dotted #3FAEA8;">
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="act_sign"/>

            <div class="row" style="margin:0px;padding:0px">
                <div class="col m6 s12 center">
                    <label class="label_format" for="signInput">Upload Signature</label>
                    <input required name="sign" type='file' onchange="readSIGNURL(this);" style="margin:10%"/>
                    <h6>File size should be less than 200KB.<br>Only jpg, jped, png, gif files are allowed.</h6>
                    <br>
                    <button class=" btn waves-effect waves-light" style="margin-bottom: 20px;" type="submit" value="submit">Upload     <i class="material-icons right">cloud_upload</i></button>

                </div>
                <div class="col m6 s12 center">
                    <img id="sign" src="<?php $si = $_SESSION["user"][16]; if($si != "") echo "uploads/sign/".$_SESSION["user"][16]; else echo "images/sign_sample.jpg"; ?>" alt="your sign" height="80px" width="250px" style="margin:10%"/>

                </div>

            </div>

            </form>
            

    </div>

    <div class="print" id="test6" style="margin-left:5%;margin-right:5%;margin-top:2%">
        
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="act_final"/> 
       
             <hr style="border: 1px dotted #3FAEA8;clear:both">


        <div class="row" style="clear:both">


        <div class="col s12 m7"  style="margin-top:10px;float:left">
            <h6 style="color:#3FAEA8"><b>Personal Information</b></h6>
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
            <td>Gender</td>
            <td><?php echo $_SESSION["user"][21] ?></td>
            </tr>
            <tr>
            <td>Marital Status</td>
            <td><?php echo $_SESSION["user"][22] ?></td>
            </tr>
            <tr>
            <td>Category</td>
            <td><?php echo $_SESSION["user"][23] ?></td>
            </tr>
            
        
            <tr>
            <td>Current Emp of IIIT-D ?  </td>
            <td><?php echo $_SESSION["user"][24] ?></td>
            </tr>
            <tr>
            <td>Ever Interviewed by IIITD ? </td>
            <td><?php echo $_SESSION["user"][25] ?>

                <?php 
                    if($_SESSION["user"][25]=="Yes"){
                        echo "<br>Post applied for:";
                        echo $_SESSION["user"][26] ;
                    }
                ?>
            </td>
            </tr>
            <tr>
            <td>Physical Disability </td>
            <td><?php echo $_SESSION["user"][27] ?>

                <?php 
                    if($_SESSION["user"][27]=="Yes"){
                        echo "<br>Type of Disability:";
                        echo $_SESSION["user"][28] ;
                    }
                ?>
            </td>
            </tr>
            <tr>
            <tr>
            <td>Nationality</td>
            <td><?php echo $_SESSION["user"][29] ?></td>
            </tr>
            <tr>
            <td>Domicile</td>
            <td> <?php echo $_SESSION["user"][30] ?></td>
            </tr>
        
        
            <tr>
            <td>Address</td>
            <td> <?php echo $_SESSION["user"][10] ?></td>
            </tr>

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

     
        <br>
        
        </div>

         <div class="col m4 s12 offset-m6" style="margin-left:0px;margin-top:20px;padding-left:5%">
             <div class="left" style="margin-left:24px;float:left">
                <h5 style="color:#3FAEA8"><b>Photograph</b></h5>
                <img class="center"  style="width:180px;height:210px;" src="uploads/photo/<?php echo $_SESSION["user"][15] ?>?" alt="photo" >
                <br><br><br>
            
             </div>
             <br>
             <div>
                 <br><br><br>
                 <h5  style="color:#3FAEA8"><b>Signature</b></h5>
            <img class="center"  style="width:300px;height:100px;" src="uploads/sign/<?php echo $_SESSION["user"][16] ?>?" alt="photo"/>
       
             </div>
             </div>

        
     </div>



     <hr style="border: 1px dotted #3FAEA8;">
     
     
     <br><br><br>

    <div class="s12">
        <h6 style="color:#3FAEA8" class="center"><b> Educational Information</b></h6>
        <br>

        <table class="striped" style="border:1px solid black">

        <tr class="table_head">
        <th>
                Examination &nbsp;
            </th>
            <th>
            Examination Passed &nbsp; 
            </th>
            <th>
                Specialization/Subjects  &nbsp; 
            </th>
            <th>
                Board/Institute &nbsp; 
                </th>
                <th>
                Year of Passing &nbsp;
            </th>
            <th>
                Duration(in years) &nbsp; 
            </th>
            <th>
                Marks% &nbsp; 
            </th>
           
            <th>
                Regular / Distance /Part
        </th>
        </tr>

        <tr>
            <td>
            Secondary
            </td>
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
        </tr>
        <tr>
            <td>
            Senior Secondary
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
            UG
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
            <td>
            <?php echo $_SESSION["user"][56] ?>  
            </td>
        </tr>

        <tr>
            <td>
            PG
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
            <td>
            <?php echo $_SESSION["user"][64] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][65] ?>  
            </td>
        </tr>
        <tr id="fex1" style="display:none">
            <td>
            <?php echo $_SESSION["user"][67] ?> 
            </td>
            <td>
            <?php echo $_SESSION["user"][68] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][69] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][70] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][71] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][72] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][73] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][74] ?>  
            </td>
        </tr>
        <tr id="fex2" style="display:none">
            <td>
            <?php echo $_SESSION["user"][76] ?> 
            </td>
            <td>
            <?php echo $_SESSION["user"][77] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][78] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][79] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][80] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][81] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][82] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][83] ?>  
            </td>
        </tr>


        </table>

        <br>
        <h6 style="color:#3FAEA8" class="center"><b>Languages Known</b></h6>
        <br>
        <table class="center" class="fixed">
            <col width="90px" />
            <col width="90px" />
            <col width="90px" />

            <col width="90px" />

            <tr>
                <th>Language
                </th>
                <th>Can Read
                </th>
                <th>Can Write
                </th>
                <th>Can Speak
                </th>
            </tr>
            <tr>
                <td>Hindi
                </td>
                <td><?php echo $_SESSION["user"][129] ?>
                </td>
                <td><?php echo $_SESSION["user"][130]?>
                </td>
                <td><?php echo $_SESSION["user"][131] ?>
                </td>
            </tr>
            <tr>
                <td>English
                </td>
                <td><?php echo $_SESSION["user"][132] ?>
                </td>
                <td><?php echo $_SESSION["user"][133] ?>
                </td>
                <td><?php echo $_SESSION["user"][134] ?>
                </td>
            </tr>

            
        </table>
        <div class="center"><span style="color:#3FAEA8"><b>Other Lanugaes Known:</b></span><?php echo $_SESSION["user"][135]  ?></div>

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
                From (mm/yyyy)&nbsp; 
            </th>
            <th>
                To (mm/yyyy) &nbsp; 
                </th>
                
            <th>
                Payscale &nbsp; 
            </th>
            <th>
                Reason of leaving&nbsp; 
        </th>

        <th>
                Experience (in months)&nbsp; 
        </th>

        <th>
                Nature of work&nbsp; 
        </th>
        </tr>



        <tr id="fexp1" style="display:none">
            <td>
            <?php echo $_SESSION["user"][85] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][86] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][87] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][88] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][89] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][90] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][91] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][92] ?>  
            </td>
        </tr>


        <tr id="fexp2"  style="display:none">
            <td>
            <?php echo $_SESSION["user"][93] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][94] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][95] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][96] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][97] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][98] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][99] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][100] ?>  
            </td>
        </tr>



        <tr id="fexp3" style="display:none">
            <td>
            <?php echo $_SESSION["user"][101] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][102] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][103] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][104] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][105] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][106] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][107] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][108] ?>  
            </td>
        </tr>



        <tr id="fexp4" style="display:none">
            <td>
            <?php echo $_SESSION["user"][109] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][110] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][111] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][112] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][113] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][114] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][115] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][116] ?>  
            </td>
        </tr>
    
    <tr id="fexp5" style="display:none">
            <td>
            <?php echo $_SESSION["user"][117] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][118] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][119] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][120] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][121] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][122] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][123] ?>  
            </td>
            <td>
            <?php echo $_SESSION["user"][124] ?>  
            </td>
        </tr>
    

        </table>



    </div>

    <br>
     <hr style="border: 1px dotted #3FAEA8;">
     <br>
      <p style="clear:both"></p>

     <p style="color:#3FAEA8;margin-bottom: 4px" class="left"><b>Key Responsibilities :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp </b></p>
     <div class="col s6 offset-s3">
     <p class="left col s6 offset-s3"><?php $v1 = $_SESSION["user"][125]; if($v1!="") echo $v1; else echo "NA";?></p>
     </div>

      <p style="clear:both"></p>
     <br>

     <p style="color:#3FAEA8;margin-bottom: 4px" class="left"><b>Statement of Purpose :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp </b></p>
     <div class="col s6 offset-s3">
     <p class="left col s6 offset-s3"><?php $v1 = $_SESSION["user"][127]; if($v1!="") echo $v1; else echo "NA";?></p>
     </div>
     
     <br><br>
     <p style="clear:both;color:#3FAEA8;margin-bottom: 4px" class="left"><b>Training Undertaken : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></p>
     <div class="col s6 offset-s3" >
     <p class="left col s6 offset-s3"><?php $v2 = $_SESSION["user"][128];  if($v2!="") echo $v2; else echo "NA"?></p>
    </div>
     <p style="clear:both"></p>
     <br><br>
<br><hr style="border: 1px dotted #3FAEA8;"/>
    <div class="row" >
    
        <h5 class="notprint" style="clear:both;color:#3FAEA8" class="center"><b>Declaration</b></h5>
        <br>
        <label class="notprint"  style="color:#3FAEA8;margin:10px;font-size:16px;margin-left:15%">
            <span style="margin:2px;">
            <input  type="checkbox" id="check"/>
        </span>
            <b class="print">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I do hereby declare that all the information given above is true to the best of my knowledge and belief. </b></label>
        <br>
        <br>
        <p class="notprint" class="center" style="color:#f00">Pleae be sure that the details are correct. Once submitted, you cannot edit the application form.
            You can go to previous tabs and ensure that given data is correct</p>
        <button id="submitButton" class="waves-effect waves btn col s6 offset-s3 m2 offset-m5 z-depth-5 notprint" style="margin-top:25px;color:#fff"
                type="submit" value="submit" name="action">
            Submit
        </button>




        

    </div>

</form>
        <button class="notprint" onclick="window.print();return false;">
            Print
        </button>
  </div>



      <div id="test7" class="notprint" style="margin-left:5%;margin-right:5%;margin-top:2%">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="hidden" name="act" value="other"/>
            <div class="row"  style="border-color: #3FAEA8!important;border: solid; border-width: thin;
            ">

                <h6 style="text-align: center;padding-left:20px;color:#3FAEA8"><b>Statement of Purpose</b></h6>  

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="text2" name="sop"  class="materialize-textarea" ><?php echo $_SESSION["user"][127] ?></textarea>
                      <div id="result2"></div>  
                       <p style="color:green" class="left">You cann ot use special characters other than allowed ones (left parenthesis, right parenthesis, comma and fullstop)</p>               
               
               
                         </div>
                  </div>
            </div>
            <br><hr style="border: 1px dotted #3FAEA8;"/><br>

            <div class="row"  style="border-color: #3FAEA8!important;border: solid; border-width: thin;
            ">
                <h6 style="text-align: center;padding-left:20px;color:#3FAEA8"><b>Training Undertaken</b></h6>  

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="text3" name="training"  class=" notprint materialize-textarea" ><?php echo $_SESSION["user"][128] ?></textarea>
                      <div id="result3"></div>  
                       <p style="color:green" class="left">You can not use special characters other than allowed ones (left parenthesis, right parenthesis, comma and fullstop)</p>               
               
                 
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
<br><br><br>
    </div>
  </div>
</div>
    <button class="notprint" onclick="topFunction()" id="myBtn" title="Go to top"><img src="images/top.png" width="25px" height="25px"></button>
    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
    <footer class="page-footer notprint">

        <div class="footer-copyright">
        <div class="container">
        © 2018 &nbsp;| Designed by: Himanshu Sundriyal,&nbsp;Divyanshu Sundriyal &nbsp;| &nbsp;Powered by: Web Admin IIIT-D 
        
        </div>
        </div>
    </footer>
    
    <script type="text/javascript" src="js/materialize.js"></script>

<?php

if($_SESSION["user"][67]!=""){
    ?>
<script type="text/javascript" language="javascript">
                document.getElementById("ex1").style.display = "table-row";
                document.getElementById("fex1").style.display = "table-row";


</script>
<?php

}
else{

    ?>
    <script type="text/javascript" language="javascript">
    jQuery( "#deleterow" ).css("background-color", "grey");
    
    
    </script>
    <?php

}

?>

<?php

if($_SESSION["user"][76]!=""){
    ?>
<script type="text/javascript" language="javascript">
                document.getElementById("ex2").style.display = "table-row";
                document.getElementById("fex2").style.display = "table-row";
                document.getElementById("addmore").disabled = true;
                jQuery( "#addmore" ).css("background-color", "grey");

</script>
<?php

}

?>



<?php

if($_SESSION["user"][85]!=""){
    ?>
<script type="text/javascript" language="javascript">
                document.getElementById("exp1").style.display = "table-row";
                document.getElementById("fexp1").style.display = "table-row";
               
</script>
<?php

}
else{

    ?>
    <script type="text/javascript" language="javascript">
    jQuery( "#deleterow1" ).css("background-color", "grey");
    
    
    </script>
    <?php

}


?>

<?php

if($_SESSION["user"][93]!=""){
    ?>
<script type="text/javascript" language="javascript">
                document.getElementById("exp2").style.display = "table-row";
                document.getElementById("fexp2").style.display = "table-row";
               
</script>
<?php

}

?>


<?php

if($_SESSION["user"][101]!=""){
    ?>
<script type="text/javascript" language="javascript">
                document.getElementById("exp3").style.display = "table-row";
                document.getElementById("fexp3").style.display = "table-row";


</script>
<?php

}

?>


<?php

if($_SESSION["user"][109]!=""){
    ?>
<script type="text/javascript" language="javascript">
                document.getElementById("exp4").style.display = "table-row";
                document.getElementById("fexp4").style.display = "table-row";
               
</script>
<?php

}

?>

<?php

if($_SESSION["user"][117]!=""){
    ?>
<script type="text/javascript" language="javascript">
                document.getElementById("exp5").style.display = "table-row";
                document.getElementById("fexp5").style.display = "table-row";
                document.getElementById("addmore1").disabled = true;
                // jQuery( "#addmore1" ).css("background-color", "grey");

</script>
<?php

}

?>

<?php

if($_SESSION["user"][129]=="Yes"){
    ?>
<script type="text/javascript" language="javascript">
              $('#h_read').prop('checked', true);

</script>
<?php

}

?>

<?php

if($_SESSION["user"][130]=="Yes"){
    ?>
<script type="text/javascript" language="javascript">
              $('#h_write').prop('checked', true);

</script>
<?php

}

?>

<?php

if($_SESSION["user"][131]=="Yes"){
    ?>
<script type="text/javascript" language="javascript">
              $('#h_speak').prop('checked', true);

</script>
<?php

}

?>

<?php

if($_SESSION["user"][132]=="Yes"){
    ?>
<script type="text/javascript" language="javascript">
              $('#e_read').prop('checked', true);

</script>
<?php

}

?>

<?php

if($_SESSION["user"][133]=="Yes"){
    ?>
<script type="text/javascript" language="javascript">
              $('#e_write').prop('checked', true);

</script>
<?php

}

?>

<?php

if($_SESSION["user"][134]=="Yes"){
    ?>
<script type="text/javascript" language="javascript">
              $('#e_speak').prop('checked', true);

</script>
<?php

}

?>
<script src="js/alphanumm.js"></script>

<script type="text/javascript">

$("#text1").alphanum({allow :    '(),.', });
$("#text2").alphanum({allow :    '(),.', });
$("#text3").alphanum({allow :    '(),.', });

</script>

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
            function readFile(event) {

            var file = event.target.files[0];
            var reader = new FileReader();

                 reader.onload = function (event) {
                    alert(event.target.result);
                    
                 };
            reader.readAsText(file);
            
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
                var e4 = document.getElementById("exp4");
                var e5 = document.getElementById("exp5");
                

                if(e1.style.display == "none"){

                    jQuery( "#deleterow1" ).css("background-color", "");

                    document.getElementById("exp1").style.display = "table-row";
                    $("#e1_org").prop('required',true);
                    $("#e1_desg").prop('required',true);
                    $("#e1_from").prop('required',true);
                    $("#e1_to").prop('required',true);
                    $("#e1_payscale").prop('required',true);
                    $("#e1_reason").prop('required',true);
                    $("#e1_exp").prop('required',true);
                    $("#e1_nature").prop('required',true);


                 }
                else if(e2.style.display == "none"){

                    document.getElementById("exp2").style.display = "table-row";
                    $("#e2_org").prop('required',true);
                    $("#e2_desg").prop('required',true);
                    $("#e2_from").prop('required',true);
                    $("#e2_to").prop('required',true);
                    $("#e2_payscale").prop('required',true);
                    $("#e2_reason").prop('required',true);
                    $("#e2_exp").prop('required',true);
                    $("#e2_nature").prop('required',true);
                }
                else if(e3.style.display == "none"){
                    document.getElementById("exp3").style.display = "table-row";
                    // jQuery( "#addmore1" ).css("background-color", "grey");

                    $("#e3_org").prop('required',true);
                    $("#e3_desg").prop('required',true);
                    $("#e3_from").prop('required',true);
                    $("#e3_to").prop('required',true);
                    $("#e3_payscale").prop('required',true);
                    $("#e3_reason").prop('required',true);
                    $("#e3_exp").prop('required',true);
                    $("#e3_nature").prop('required',true);
                }
                else if(e4.style.display == "none"){
                    document.getElementById("exp4").style.display = "table-row";

                    $("#e4_org").prop('required',true);
                    $("#e4_desg").prop('required',true);
                    $("#e4_from").prop('required',true);
                    $("#e4_to").prop('required',true);
                    $("#e4_payscale").prop('required',true);
                    $("#e4_reason").prop('required',true);
                    $("#e4_exp").prop('required',true);
                    $("#e4_nature").prop('required',true);
                }
                else if(e5.style.display == "none"){
                    document.getElementById("exp5").style.display = "table-row";
                    jQuery( "#addmore1" ).css("background-color", "grey");

                    $("#e5_org").prop('required',true);
                    $("#e5_desg").prop('required',true);
                    $("#e5_from").prop('required',true);
                    $("#e5_to").prop('required',true);
                    $("#e5_payscale").prop('required',true);
                    $("#e5_reason").prop('required',true);
                    $("#e5_exp").prop('required',true);
                    $("#e5_nature").prop('required',true);
                }
                
               }
    

                 
                function deleterow1() {
                var e1 = document.getElementById("exp1");
                var e2 = document.getElementById("exp2");
                var e3 = document.getElementById("exp3");
                var e4 = document.getElementById("exp4");
                var e5 = document.getElementById("exp5");


                if(e5.style.display == "table-row"){

                    jQuery( "#addmore1" ).css("background-color", "");

                    document.getElementById("exp5").style.display = "none";
                    $("#e5_org").prop('required',false);
                    $("#e5_desg").prop('required',false);
                    $("#e5_from").prop('required',false);
                    $("#e5_to").prop('required',false);
                    $("#e5_payscale").prop('required',false);
                    $("#e5_reason").prop('required',false);
                    $("#e5_exp").prop('required',false);
                    $("#e5_nature").prop('required',false);

                       $('#e5_org').val('');
                       $('#e5_desg').val('');
                       $('#e5_from').val('');
                       $('#e5_to').val('');
                       $('#e5_payscale').val('');
                       $('#e5_reason').val('');
                       $('#e5_exp').val('');
                       $('#e5_nature').val('');

                 }
                else if(e4.style.display == "table-row"){

                    document.getElementById("exp4").style.display = "none";
                    $("#e4_org").prop('required',false);
                    $("#e4_desg").prop('required',false);
                    $("#e4_from").prop('required',false);
                    $("#e4_to").prop('required',false);
                    $("#e4_payscale").prop('required',false);
                    $("#e4_reason").prop('required',false);
                    $("#e4_exp").prop('required',false);
                    $("#e4_nature").prop('required',false);
              
                    $('#e4_org').val('');
                       $('#e4_desg').val('');
                       $('#e4_from').val('');
                       $('#e4_to').val('');
                       $('#e4_payscale').val('');
                       $('#e4_reason').val('');
                       $('#e4_exp').val('');
                       $('#e4_nature').val('');
                }
                else if(e3.style.display == "table-row"){
                    document.getElementById("exp3").style.display = "none";

                    $("#e3_org").prop('required',false);
                    $("#e3_desg").prop('required',false);
                    $("#e3_from").prop('required',false);
                    $("#e3_to").prop('required',false);
                    $("#e3_payscale").prop('required',false);
                    $("#e3_reason").prop('required',false);
                    $("#e3_exp").prop('required',false);
                    $("#e3_nature").prop('required',false);
              
                    $('#e3_org').val('');
                       $('#e3_desg').val('');
                       $('#e3_from').val('');
                       $('#e3_to').val('');
                       $('#e3_payscale').val('');
                       $('#e3_reason').val('');
                       $('#e3_exp').val('');
                       $('#e3_nature').val('');
                }
                else if(e2.style.display == "table-row"){

                    jQuery( "#addmore1" ).css("background-color", "");

                    document.getElementById("exp2").style.display = "none";
                    $("#e2_org").prop('required',false);
                    $("#e2_desg").prop('required',false);
                    $("#e2_from").prop('required',false);
                    $("#e2_to").prop('required',false);
                    $("#e2_payscale").prop('required',false);
                    $("#e2_reason").prop('required',false);
                    $("#e2_exp").prop('required',false);
                    $("#e2_nature").prop('required',false);

                       $('#e2_org').val('');
                       $('#e2_desg').val('');
                       $('#e2_from').val('');
                       $('#e2_to').val('');
                       $('#e2_payscale').val('');
                       $('#e2_reason').val('');
                       $('#e2_exp').val('');
                       $('#e2_nature').val('');

                 }
                 else if(e1.style.display == "table-row"){

                    jQuery( "#addmore1" ).css("background-color", "");
                    jQuery( "#deleterow1" ).css("background-color", "grey");


                    document.getElementById("exp1").style.display = "none";
                    $("#e1_org").prop('required',false);
                    $("#e1_desg").prop('required',false);
                    $("#e1_from").prop('required',false);
                    $("#e1_to").prop('required',false);
                    $("#e1_payscale").prop('required',false);
                    $("#e1_reason").prop('required',false);
                    $("#e1_exp").prop('required',false);
                    $("#e1_nature").prop('required',false);

                       $('#e1_org').val('');
                       $('#e1_desg').val('');
                       $('#e1_from').val('');
                       $('#e1_to').val('');
                       $('#e1_payscale').val('');
                       $('#e1_reason').val('');
                       $('#e1_exp').val('');
                       $('#e1_nature').val('');

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
                        .width(250)
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


function wordCount( val ){
    var wom = val.match(/\S+/g);
    return {
        charactersNoSpaces : val.replace(/\s+/g, '').length,
        characters         : val.length,
        words              : wom ? wom.length : 0,
        lines              : val.split(/\r*\n/).length
    };
}

var textarea1 = document.getElementById("text1");
var result1   = document.getElementById("result1");
var textarea2 = document.getElementById("text2");
var result2   = document.getElementById("result2");
var textarea3 = document.getElementById("text3");
var result3   = document.getElementById("result3");

textarea1.addEventListener("input", function(){
  var v = wordCount( this.value );
  if(v.words > 99) alert("Word Limit Reached");
  result1.innerHTML = (
      "<br>Words: "+ v.words +
      " &nbsp; &nbsp;Words Left: "+ (100 - v.words)
  );
}, false);


textarea2.addEventListener("input", function(){
  var v = wordCount( this.value );
  if(v.words > 199) alert("Word Limit Reached");
  result2.innerHTML = (
      "<br>Words: "+ v.words +
      "&nbsp; &nbsp;Words Left: "+ (200 - v.words)
  );
}, false);

textarea3.addEventListener("input", function(){
  var v = wordCount( this.value );
  if(v.words > 199) alert("Word Limit Reached");
  result3.innerHTML = (
      "<br>Words: "+ v.words +
      "&nbsp; &nbsp;Words Left: "+ (200 - v.words)
  );
}, false);

//   $( "#text1" ).keypress(function(e) {
     
//      if (e.which < 48 || 
//     (e.which > 57 && e.which < 65) || 
//     (e.which > 90 && e.which < 97) ||
//     e.which > 122) {
//         if(e.which != 41 && e.which != 40 && e.which != 32 && e.which != 44 && e.which != 46)
//             e.preventDefault();
// }
// });    

// $(function(){

//    $( "#text1" ).bind( 'paste',function()
//    {
//        setTimeout(function()
//        { 
//           //get the value of the input text
//           var data= $( '#textInput' ).val() ;
//           //replace the special characters to '' 
//           var dataFull = data.replace(/[^\w\s]/gi, '');
//           //set the new value of the input text without special characters
//           $( '#textInput' ).val(dataFull);
//        });

//     });
// });
    </script>   
    

</body>
</html>