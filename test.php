
<html>
<head>
    <title>Application Form</title>
        <!--Import Google Icon Font-->
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

        
      </head>
    <body>
<form action="#">

    <p>
      <label>
        <input type="checkbox" />
        <span>Red</span>
      </label>
    </p>
    <p>
      <label>
        <input type="checkbox" checked="checked" />
        <span>Yellow</span>
      </label>
    </p>
    <p>
      <label>
        <input type="checkbox" class="filled-in" checked="checked" />
        <span>Filled in</span>
      </label>
    </p>
    <p>
      <label>
        <input id="indeterminate-checkbox" type="checkbox" />
        <span>Indeterminate Style</span>
      </label>
    </p>
    <p>
      <label>
        <input type="checkbox" checked="checked" disabled="disabled" />
        <span>Green</span>
      </label>
    </p>
    <p>
      <label>
        <input type="checkbox" disabled="disabled" />
        <span>Brown</span>
      </label>
    </p>
  </form>
        

        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea2" class="materialize-textarea" data-length="120"></textarea>
            <label for="textarea2">Textarea</label>
          </div>
        </div>

        <form action="#">
    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
  </form>
        

      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript">
 $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });
      </script>

<?php
require_once 'include/Database.php';
require_once 'include/Sessions.php';
require_once 'include/Functions.php';

if (isset($_POST['addPostButton']) || isset($_FILES['image'])) {

    $imageName = $_POST['image'];
    $imageDirectory = 'uploads/' . basename($_FILES['image']['name']);

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imageDirectory)) {
        $_SESSION['ErrorMessage'] = 'File is invalid!';
    } else {
        global $ConnectingDB;
        $stmt = $ConnectingDB->prepare("INSERT INTO posts(image) VALUES('$imageName')");
        if ($stmt->execute()) {
            $_SESSION['SuccessMessage'] = 'Post created';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.css">
    <link type="text/css" rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form action="add-post.php" method="post">
        <div class="row">
            <div class="file-field input-field">
                <div class="btn green">
                    <span>File</span>
                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path" placeholder="Choose an image">
                </div>
            </div>
        </div>
    </form>
</body>
</html>

    </body>
