<?php
error_reporting(E_ERROR | E_WARNING);
include "classes/dbh.php";
if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (isset($_SESSION['lang'])) {
    include "lang_" . $_SESSION['lang'] . ".php";
} else {
    include "lang_en.php";
}
?>
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
    <title>Roads Riding Mureș - Contact</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="css/contact-style.css">
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
            <div class='languages'>
                <a href='contact.php?lang=ro'>
                    <img class='ro' src='images/ro.png'>
                </a>
                <a href='contact.php?lang=en'>
                    <img class='eng' src='images/eng.png'>
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
                echo "<a href='contact.php?lang=en' class='active'>Contact</a>";
              } else {
                echo "<a href='contact.php' class='active'>Contact</a>";
              } ?>
            </li>
        </ul>
    </nav>
    <div class="container">
      <?php
if (isset($_GET['message'])) {
   if ($_GET['message'] == 'sent') {
       if ($_GET['lang'] == 'en') {
           echo "<p class='sent'>You have successfully sent the message!</p>";
       } else {
           echo "<p class='sent'>Ai trimis mesajul cu succes!</p>";
       }
   }
} ?>
      <h2>
          <?php if ($_GET['lang'] == 'en') {
            echo "CONTACT US";
          } else {
            echo "CONTACTEAZĂ-NE";
          } ?>
      </h2>
      <form class="contact-form" action="php/contact-form.php" method="POST">
          <div class="input-field">
              <input type="text" name="name" required>
              <label>
                <?php if ($_GET['lang'] == 'en') {
                  echo "Name";
                } else {
                  echo "Nume";
                } ?>
              </label>
          </div>
          <div class="input-field">
              <input type="email" name="mail" required>
              <label>E-mail</label>
          </div>
          <div class="input-field">
              <input type="text" name="location" required>
              <label>
                <?php if ($_GET['lang'] == 'en') {
                  echo "Location";
                } else {
                  echo "Localitate";
                } ?>
              </label>
          </div>
          <div class="input-field">
              <textarea name="message" rows="3" required></textarea>
              <label>
                <?php if ($_GET['lang'] == 'en') {
                  echo "Message";
                } else {
                  echo "Mesaj";
                } ?>
              </label>
          </div>
              <input type="submit" name="submit" value="<?php if ($_GET['lang'] == 'en') {echo "Send message";} else {echo "Trimite mesajul";}?>" class="button">
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
                <li class="instagram"><a target="_blank" href="https://www.instagram.com/raul_rattiu/?hl=ro"><i class="fab fa fa-instagram"></i></a></li>
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
    <script type="text/javascript" id="cookieinfo" src="//cookieinfoscript.com/js/cookieinfo.min.js" data-bg="#496923" data-fg="#FFFFFF" data-link="#8e2020" data-divlink="#fff" data-divlinkbg="#8e2020" data-cookie="CookieInfoScript" data-text-align="left" data-close-text="Got it!">
    </script>
</body>

</html>
