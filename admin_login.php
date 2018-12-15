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

require 'conf.php';



        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id=$_POST["id"];
            $password=$_POST["password"];

            if($id=="admin" and $password=="root"){

                                    session_start();
                                     $_SESSION["admin"]="ok";


                    header("Location: admin.php"); 


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
        <h4 id="reg_title">Admin Login</h4>


        
        
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

        <input type="text" placeholder="Admin ID" name="id">

        <input type="password" placeholder="Admin Password" name="password">


    <button class=" btn waves-effect waves-light" type="submit" value="submit">Login<i class="material-icons right">login</i></button>
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
        
