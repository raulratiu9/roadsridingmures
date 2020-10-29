<?php error_reporting (E_ERROR | E_WARNING);
include "classes/dbh.php";
if (isset($_GET['lang']) && !empty($_GET['lang'])) {
  $_SESSION['lang'] = $_GET['lang'];
}
if (isset($_SESSION['lang'])) {
  include "lang_" . $_SESSION['lang'] . ".php";
} else {
  include "lang_en.php";
}
session_start(); ?>
<!DOCTYPE html>
<html>

<head>
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144837750-1"></script>
   <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-144837750-1');
    </script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roads Riding Mureș - Admin</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="css/create-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://db.onlinewebfonts.com/c/2e7d665b85417f52a587805b74edffde?family=DiskusDMed">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/navigation.js"></script>
</head>

<body>
  <script>
    function changeLang() {
      document.getElementById('form_lang').submit();
    }
  </script>
  <div class="responsive-bar">
    <div class="toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="responsive-logo">
      <img src="images/logo.png">
    </div>
  </div>
  <nav>
    <div class="logo">
      <img src="images/logo.png">
    </div>
    <ul>
      <div class="languages">
        <a href="create.php?lang=ro">
          <img class="ro" src="images/ro.png">
        </a>
        <a href="create.php?lang=en">
          <img class="eng" src="images/eng.png">
        </a>
      </div>
      <li>
        <?php if ($_GET['lang'] == 'en') {
          echo "<a href='index.php?lang=en'>Home</a>";
        } else {
          echo "<a href='index.php'>Acasă</a>";
        } ?>
      </li>
      <li>
        <?php if ($_GET['lang'] == 'en') {
          echo "<a href='about.php?lang=en'>About</a>";
        } else {
          echo "<a href='about.php'>Despre</a>";
        } ?>
      </li>
      <li>
        <?php if ($_GET['lang'] == 'en') {
          echo "<a href='experiences.php?lang=en'>Experiences</a>";
        } else {
          echo "<a href='experiences.php'>Experiențe</a>";
        } ?>
      </li>
      <li>
        <?php if ($_GET['lang'] == 'en') {
          echo "<a href='contact.php?lang=en'>Contact</a>";
        } else {
          echo "<a href='contact.php'>Contact</a>";
        } ?>
      </li>
      <li>
        <?php if ($_GET['lang'] == 'en') {
          echo "<a href='create.php?lang=en' class='active'>Admin</a>";
        } else {
          echo "<a href='create.php' class='active'>Admin</a>";
        } ?>
    </ul>
  </nav>
  <div class="container">
    <?php require_once 'classes/entry.php';
    if (isset($_POST['publishing'])) {
        $entry = new Entry();
        $entry->createNewFromPOST($_POST);
        $entry->SqlInsertEntry();
        if (isset($_POST["submit"])) {
            $errors = array(); 
            $extension = array("jpeg","jpg","png","gif");
            $conn = mysqli_connect("localhost", "00252698_rrm", "324681Taxi.", "00252698_rrm");
            foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
                $uploadThisFile = true;
                $file_name = $_FILES["files"]["name"][$key];
                $file_tmp = $_FILES["files"]["tmp_name"][$key];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                if (!in_array(strtolower($ext),$extension)) {
                    array_push($errors, "<p class='error'>File $file_name is invalid.</p>");
                    $uploadThisFile = false;
                }
                if ($uploadThisFile) {
                    $filename=basename($file_name,$ext);
                    $newFileName=$filename.$ext;
                    move_uploaded_file ($_FILES["files"]["tmp_name"][$key],"uploads/".$newFileName);
                    $entry_id = $entry->getId();
                    $query = "INSERT INTO images(file_name, entry_id) VALUES('".$newFileName."', '".$entry_id."')";
                    mysqli_query($conn, $query);
                }
            }
            mysqli_close($conn);
            $count = count($errors);
            if($count != 0){
                foreach($errors as $error){
                    echo $error."<br/>";
                }
            }
        } ?>
        <div class="entry">
            <a class="entry" href="single.php?entry_id=<?php echo $entry->getId(); ?>">View Post</a>
        </div>
        <?php } ?>
        <h2>Create a New Post</h2>
        <form class="create-form" action="" method="POST" enctype="multipart/form-data">
            <img class="ro" src="images/ro.png">
            <div class="input-field">
                <input type="day" name="entry_day" required>
                <label>Ziua</label>
            </div>
            <div class="input-field">
                <input type="text" name="entry_month" required>
                <label>Luna</label>
            </div>
            <div class="input-field">
                <input type="text" name="entry_year" required>
                <label>Anul</label>
            </div>
            <div class="input-field">
                <input type="text" name="entry_title" required></input>
                <label>Titlul</label>
            </div>
            <div class="input-field">
                <input type="text" name="entry_author" required></input>
                <label>Autorul</label>
            </div>
            <div class="input-field">
                <textarea name="entry_excerpt" rows="3" required></textarea>
                <label>Fragmentul</label>
            </div>
            <div class="input-field">
                <textarea name="entry_content" rows="3" required></textarea>
                <label>Conținutul</label>
            </div>
            <img class="eng" src="images/eng.png">
            <div class="input-field">
                <input type="day" name="entry_day_en" required>
                <label>Name of the day</label>
            </div>
            <div class="input-field">
                <input type="day" name="entry_upload_en" required>
                <label>Day</label>
            </div>
            <div class="input-field">
                <input type="text" name="entry_month_en" required>
                <label>Month</label>
            </div>
            <div class="input-field">
                <input type="text" name="entry_title_en" required></input>
                <label>Title</label>
            </div>
            <div class="input-field">
                <textarea name="entry_excerpt_en" rows="3" required></textarea>
                <label>Excerpt</label>
            </div>
            <div class="input-field">
                <textarea name="entry_content_en" rows="3" required></textarea>
                <label>Content</label>
            </div>
            <div class="input-field">
                <input class="file" type="file" name="entry_file" >
                <label>Image</label>
            </div>
            <div class="input-field">
                <input class="file" type="file" name="entry_file2" >
                <label>Home Image 2</label>
            </div>
            <div class="input-field">
                <input class="file" type="file" name="entry_file3" >
                <label>Home Image 3</label>
            </div>
            <div class="input-field">
                <input class="file" type="file" name="entry_file4" >
                <label>Home Image 4</label>
            </div>
            <div class="input-field">
                <input class="file" type="file" name="files[]" multiple="multiple" >
                <label>Content Images</label>
            </div>
            <input type="hidden" name="publishing" />
            <input type="submit" name="submit" value="Publish New Post" class="button">
        </form>
    </div>
    <footer>
      <div class="follow">
        <p>
          <font face="DiskusDMed" size="7" color="black">Follow us</font>
        </p>
        <ul class="socialize-footer">
          <li class="snapchat"><a target="_blank" href="https://www.snapchat.com/add/raulratiu9"><i class="fab fa fa-snapchat-ghost"></i></a></li>
                <li class="facebook"><a target="_blank" href="https://www.facebook.com/roadsridingmures/"><i class="fab fa fa-facebook"></i></a></li>
                <li class="instagram"><a target="_blank" href="https://www.instagram.com/arpi.nagy.2004/?hl=ro"><i class="fab fa fa-instagram"></i></a></li>
                <li class="linkedin"><a target="_blank" href="https://www.linkedin.com/in/raul-ra%C5%A3iu-ab1754188/"><i class="fab fa fa-linkedin-in"></i></a></li>
                <li class="privacy-policy"><a target="_blank" title="Privacy Policy" href="https://www.privacypolicygenerator.info/live.php?token=kkAG5LelKgyNazEO7FVlZvQNykHLllqj"><i class="fab fa fa-link"></i></a></li>
            </ul>
        </div>
        <div class="routes">
            <p>
                <font face="DiskusDMed" size="7" color="black">Our explored routes</font>
            </p>
            <iframe src="https://www.google.com/maps/d/embed?mid=1D1qb4abP_G7K7xfvUvVUZLKn_l1k5Lg4&hl=ro" width="396" height="338"></iframe>
        </div>
        <div class="copyright">
            <img class="bikers" src="images/bikers.png">
            <p>
                <font face="Times New Roman" size="5" color="black"><b>Copyright © 2019 Raul Rațiu. All Rights Reserved.</b></font>
            </p>
        </div>
    </footer>
</body>

</html>
