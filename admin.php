<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/main_styles.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

    <?php
                session_start();

        require 'conf.php';

        if(!array_key_exists("admin",$_SESSION) || $_SESSION["admin"]!="ok"){

                                header("Location: unautherized.php"); 


                    }


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $jobs=array();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{


            $sql = "SELECT name FROM posts";


            $result=$conn->query($sql);

            if($result->num_rows>0){


               // $row=mysqli_fetch_row($result);


                while ($row=mysqli_fetch_row($result))
                {
                    array_push($jobs,$row[0]);

                }

        
            } else {

            }

            $conn->close();
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                            
            if(isset($_POST['act'])){
                if($_POST['act'] == 'new_post'){
         
            $cando=TRUE;

            foreach ($jobs as $job) {

                    if(strtolower($job)==strtolower($_POST["post"])){

                        $cando=FALSE;
                    }
                }
                            // Create connection

        if($cando==TRUE){

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{

            $post=$_POST["post"];


            $dt=date("Y-m-d");

            $sql = "INSERT INTO posts (name,date,available) VALUES ('$post','$dt','yes') ";


            if ($conn->query($sql) === TRUE) {

                $names=explode(" ",$post);
                
                $table_name="table";

                foreach ($names as $name) {
                    $table_name=$table_name."_".$name;
                }

                $sql2="CREATE Table $table_name (email VARCHAR(100) NOT NULL,
                password VARCHAR(100) NOT NULL,
                signup_token VARCHAR(10) NOT NULL,
                isvalidated tinyint(1) NOT NULL,
                contact VARCHAR(20) NOT NULL,
                apply_for VARCHAR(100) NOT NULL,
                fn VARCHAR(100),
                mn VARCHAR(100),
                ln VARCHAR(100),
                dob VARCHAR(20),
                address VARCHAR(200) ,
                city VARCHAR(100) ,
                state VARCHAR(100),
                pincode VARCHAR(10), 
                cv VARCHAR(100),
                photo VARCHAR(100),
                sign VARCHAR(100),

                personal_form VARCHAR(50) DEFAULT 'n',
                edu_form VARCHAR(50) DEFAULT 'n',
                exp_form VARCHAR(50) DEFAULT 'n',
                final VARCHAR(50) DEFAULT 'n'  NOT NULL,

                gender VARCHAR(10),
                martial VARCHAR(10),
                category VARCHAR(50),
                curr_emp VARCHAR(10),
                past_interview VARCHAR(10),
                past_interview_post VARCHAR(500),
                disability VARCHAR(10),
                disability_type VARCHAR(500),
                nationality VARCHAR(200),
                domicile VARCHAR(500),
                s_name VARCHAR(50),
                s_passed VARCHAR(100),
                s_spec VARCHAR(100),
                s_board VARCHAR(100),
                s_year VARCHAR(100), 
                s_dur VARCHAR(50),
                s_marks VARCHAR(100),
                s_type VARCHAR(100),
                s_doc VARCHAR(200),

                ss_name VARCHAR(50),
                ss_passed VARCHAR(100),
                ss_spec VARCHAR(100),
                ss_board VARCHAR(100),
                ss_year VARCHAR(100), 
                ss_dur VARCHAR(50),
                ss_marks VARCHAR(100),
                ss_type VARCHAR(100),
                ss_doc VARCHAR(200),


                u_name VARCHAR(50),
                u_passed VARCHAR(100),
                u_spec VARCHAR(100),
                u_board VARCHAR(100),
                u_year VARCHAR(100), 
                u_dur VARCHAR(50),
                u_marks VARCHAR(100),
                u_type VARCHAR(100),
                u_doc VARCHAR(200),

                
                p_name VARCHAR(50),
                p_passed VARCHAR(100),
                p_spec VARCHAR(100),
                p_board VARCHAR(100),
                p_year VARCHAR(100), 
                p_dur VARCHAR(50),
                p_marks VARCHAR(100),
                p_type VARCHAR(100),
                p_doc VARCHAR(200),


                e5_name VARCHAR(50),
                e5_passed VARCHAR(100),
                e5_spec VARCHAR(100),
                e5_board VARCHAR(100),
                e5_year VARCHAR(100), 
                e5_dur VARCHAR(50),
                e5_marks VARCHAR(100),
                e5_type VARCHAR(100),
                e5_doc VARCHAR(200),

                e6_name VARCHAR(50),
                e6_passed VARCHAR(100),
                e6_spec VARCHAR(100),
                e6_board VARCHAR(100),
                e6_year VARCHAR(100), 
                e6_dur VARCHAR(50),
                e6_marks VARCHAR(100),
                e6_type VARCHAR(100),
                e6_doc VARCHAR(200),

                e1_org VARCHAR(100),
                e1_desg	 VARCHAR(100),
                e1_from VARCHAR(100),
                e1_to VARCHAR(100),
                e1_payscale VARCHAR(100),
                e1_reason VARCHAR(500),
                e1_exp VARCHAR(100),
                e1_nature VARCHAR(100),
                
                e2_org VARCHAR(100),
                e2_desg	 VARCHAR(100),
                e2_from VARCHAR(100),
                e2_to VARCHAR(100),
                e2_payscale VARCHAR(100),
                e2_reason VARCHAR(500),
                e2_exp VARCHAR(100),
                e2_nature VARCHAR(100),

                e3_org VARCHAR(100),
                e3_desg	 VARCHAR(100),
                e3_from VARCHAR(100),
                e3_to VARCHAR(100),
                e3_payscale VARCHAR(100),
                e3_reason VARCHAR(500),
                e3_exp VARCHAR(100),
                e3_nature VARCHAR(100),

                e4_org VARCHAR(100),
                e4_desg	 VARCHAR(100),
                e4_from VARCHAR(100),
                e4_to VARCHAR(100),
                e4_payscale VARCHAR(100),
                e4_reason VARCHAR(500),
                e4_exp VARCHAR(100),
                e4_nature VARCHAR(100),

                e5_org VARCHAR(100),
                e5_desg  VARCHAR(100),
                e5_from VARCHAR(100),
                e5_to VARCHAR(100),
                e5_payscale VARCHAR(100),
                e5_reason VARCHAR(500),
                e5_exp VARCHAR(100),
                e5_nature VARCHAR(100),

                key_r VARCHAR(2000),
                other_form VARCHAR(10),
                sop VARCHAR(5000),
                training VARCHAR(2000),
                h_read VARCHAR(10),
                h_write VARCHAR(10),
                h_speak VARCHAR(10),
                e_read VARCHAR(10),
                e_write VARCHAR(10),
                e_speak VARCHAR(10),
                otherlang VARCHAR(500)

                

                )";
                

                if($conn->query($sql2)===TRUE){



                    $sql = "SELECT name FROM posts";


                    $result=$conn->query($sql);
        
                    if($result->num_rows>0){
        
        
                        $jobs=array();
        
                        while ($row=mysqli_fetch_row($result))
                        {
                            array_push($jobs,$row[0]);
        
                        }
        
                
                    } else {
        
                    }
        
                }
                else{
                    echo "Table not created";
                    echo "Error: " . $sql2 . "<br>" . $conn->error;

                }

            }
            else{

                    echo $edu_success="n";
                    echo "Error: " . $sql . "<br>" . $conn->error;
                
            }

            $conn->close();
        }

}
        else{

            echo "Job Already Exist";
        }
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
        <h4 id="reg_title"> Welcome Admin</h4>

        <h5>Current Job Openings</h5>

        <?php 

    
            foreach ($jobs as $job) {
                echo($job);
                echo("<br>");
                

            
        }

        
        ?>
        <br>
        <hr>
        <br>
        <br>
    
        Add A New Post

 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

<input type="hidden" name="act" value="new_post"/>
        <input type="text" placeholder="Enter Post Name" name="post">

    <button class=" btn waves-effect waves-light" type="submit" value="submit">Add<i class="material-icons right">add</i></button>
        </form>

       
   </div>

  </div>
  
  <div class="row mid" style="margin-bottom: 5px">
    <div class="col s12 m6" style="background-color: #3FAEA8;height: 250px">
      <h6 class="center" style="color: white"> IIITD at a glance</h6>
      <div class="carousel">
      <a class="carousel-item" href="#one!"><img src="images/pic1.jpg"></a>
      <a class="carousel-item" href="#two!"><img src="images/pic2.jpg"></a>
      <a class="carousel-item" href="#three!"><img src="images/pic3.jpg"></a>
      <a class="carousel-item" href="#four!"><img src="images/pic4.jpg"></a>
      <a class="carousel-item" href="#five!"><img src="images/pic5.jpg"></a>
      <a class="carousel-item" href="#five!"><img src="images/pic6.jpg"></a> 
  </div>
    </div>
    <div class="col s12 m6" style="margin-left: 0px;padding-left: 5px">
           <div id="map" style="background-color: #3FAEA8">
              <iframe class="center" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11075.87778235345!2d77.26371385989347!3d28.
              544488183466956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3e564daac1d%3A0x2c582e340e7bc556!2s
              Indraprastha+Institute+of+Information+Technology+Delhi!5e0!3m2!1sen!2sin!4v1534964467056" height="240px" width="95%"
               frameborder="0" style="border:0;margin: 5px;margin-left: 10px"  allowfullscreen></iframe>
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
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.carousel');
        var instances = M.Carousel.init(elems);
      });
      </script>
     
    </body>
  </html>
        
