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
    <meta name="google-site-verification" content="UAzu7mxe2DNPgAQ1B1jkDuomEGRaAwPEzvSLVxp235o" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144837750-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-144837750-1');
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-4809817712279740",
            enable_page_level_ads: true
        });
    </script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roads Riding Mureș</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="css/home-style.css">
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
                <a href='index.php?lang=ro'>
                    <img class='ro' src='images/ro.png'>
                </a>
                <a href='index.php?lang=en'>
                    <img class='eng' src='images/eng.png'>
                </a>
            </div>
            <li>
                <?php if ($_GET['lang'] == 'en') {
                echo "<a href='index.php?lang=en' class='active'>Home</a>";
              } else {
                echo "<a href='index.php' class='active'>Acasă</a>";
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
        </ul>
    </nav>
    <div class="container">
        <ul class="counties">
            <li class="Cluj">
                <a target="_blank" href="https://photos.app.goo.gl/96A6xQXwkUHYgZMa9">
                    <img src="images/cluj.png"></a>
            </li>
            <li class="Bistrița-Năsăud">
                <a target="_blank" href="https://photos.app.goo.gl/U6v4NrZ4AznhZtcL8">
                    <img src="images/bistrita-nasaud.png"></a>
            </li>
            <li class="Mureș">
                <a target="_blank" href="https://photos.app.goo.gl/P8frkuyd2uB4YZ557">
                    <img src="images/mures.png"></a>
            </li>
        </ul>
        <div class="last-post">
            <p align="center">
                <font face="DiskusDMed" size="10" color="black"><b><u>
                  <?php if ($_GET['lang'] == 'en') {
                    echo "Last post";
                  } else {
                    echo "Ultima postare";
                  }?></u></b>
                </font>
            </p>
            <?php require_once 'php/last-post-form.php'; ?>
                <article class="post">
                    <header class="entry-header">
                        <time>
                            <span class="post-day">
                              <?php if ($_GET['lang'] == 'en') {
                                echo $print_data[2];
                              } else
                                echo $print_data[1]; ?>
                            </span>
                            <span class="post-month">
                              <?php if ($_GET['lang'] == 'en') {
                                echo $print_data[4];
                                echo $print_data[7];
                              } else
                                echo $print_data[3]; ?>
                            </span>
                            <span class="post-year"><?php echo $print_data[5]; ?></span>
                        </time>
                        <div class="title-wrap">
                            <h2 class="title">
                            	<?php if ($_GET['lang'] == 'en') {
                            		echo "<a href='single.php?entry_id=".$print_data[0]." && lang=en'>";
                            	} else {
                            		echo "<a href='single.php?entry_id=".$print_data[0]."'>";
                            	} ?>
                                  <?php if ($_GET['lang'] == 'en') {
                                    echo $print_data[11];
                                  } else
                                    echo $print_data[10]; ?>
                                </a>
                            </h2>
                        </div>
                    </header>
                    <?php if ($_GET['lang'] == 'en') {
                    	echo "<a href='single.php?entry_id=".$print_data[0]." && lang=en'>";
                    } else {
                    	echo "<a href='single.php?entry_id=".$print_data[0]."'>";
                    } ?>
                      <img src='<?php echo $print_data[16]; ?>' height='150' width='275'>
                      <img src='<?php echo $print_data[17]; ?>' height='150' width='275'>
                      <img src='<?php echo $print_data[18]; ?>' height='150' width='275'>
                      <img src='<?php echo $print_data[19]; ?>' height='150' width='275'>
                    </a>
                    <div class="content">
                        <?php if ($_GET['lang'] == 'en') {
                          echo $print_data[13];
                        } else
                          echo $print_data[12]; ?>
                    </div>
                    
        </div>
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