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
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roads Riding Mureș - About</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="css/about-style.css">
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
                <a href='about.php?lang=ro'>
                    <img class='ro' src='images/ro.png'>
                </a>
                <a href='about.php?lang=en'>
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
                echo "<a href='about.php?lang=en' class='active'>About</a>";
              } else {
                echo "<a href='about.php' class='active'>Despre</a>";
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
    <div class="pimg1">
        <div class="ptext">
            <span class="border">
                      <strong>
                        <?php if ($_GET['lang'] == 'en') {
                          echo "RIDING IS OUR PASSION";
                        } else {
                          echo "TRASEELE SUNT PASIUNEA NOASTRĂ";
                        } ?>
                      </strong>
            </span>
        </div>
    </div>
    <section class="section about">
        <p class='text' align="center">
            <?php if ($_GET['lang'] == 'en') {
          echo "Roads Riding Mureș is more and more than a blog. It is a panel built of spectaculous landscapes seen on two tires. Always when you ride your bike, you are fulfilled. Why? Because you have a passion and that passion gives you the opportunity of exploring roads from another perspective, of hearing the nature sounds or enjoying moving. This blog is also built with my heart from passion. The purpose of this blog is to convince you to escape from your routine and join us for the future routes from three counties: Mureș, Bistrița-Năsăud and Cluj. Therefore, come on to enjoy together by our country's riches!";
          } else {
          echo "Roads Riding Mureș este mult mai mult decât un blog. Este un tablou alcătuit din peisaje spectaculoase văzute pe două roți. Mereu când urci pe bicicletă, simți că ești împlinit. De ce? Pentru că ai o pasiune, iar acea pasiune îți oferă oportunitatea de a explora drumurile dintr-o altă perspectivă, de a auzi glasul naturii și de a te bucura de mișcare. Acest blog, de asemenea, a fost realizat din pasiune. Scopul înfințării acestui blog este de a vă convinge să ieșiți din rutină și să participați alături de noi la viitoarele trasee din cele trei județe: Mureș, Bistrița-Năsăud și Cluj. Așadar, haideți să ne bucurăm împreună de bogățiile acestei țări!";
          } ?>
        </p>
    </section>
    <div class="pimg2">
        <div class="ptext">
            <span class="border trans">
              <?php if ($_GET['lang'] == 'en') {
                echo "Our history";
              } else {
                echo "Istoria noastră";
              } ?>
            </span>
        </div>
    </div>
    <section class="section section-dark">
        <p class='text' align="center">
            <?php if ($_GET['lang'] == 'en') {
          echo "All starts in my childhood with the first ride, but with assisted wheels. So, in contrast to other, I hardly broke up of them, but although I had started learning alone since I was seven years old, out of ambition. I started to ride in front of my home, then I rode to the store and then I was riding step by step further away my village every evening. All of this, until I met two older guys which they were riding with me on new and interesting roads. I was fascinating of each advance, and I would to discover more and more places. And from that, I had been riding for fun on as more as possible roads until it become a hobby for me. I was more and more interested to discover nearby locations. Today, I have achieved to make a group from some guys also interested to admire the landscapes on two tires, in spite of that we have to avoid different obstacles.";
          } else {
          echo "Totul începe în copilărie, cu prima pedalare cu roți ajutătoare. Ei bine, spre deosebire de alții, eu m-am despărțit foarte greu de roțile ajutătoare, dar totuși, din ambiție am învățat singur la 7 ani. Am început să merg cu bicicleta în fața casei, apoi la magazin, iar apoi încet, încet am mers mai departe de sat singur seară de seară, pentru mine fiind o ieșire din rutină. Toate acestea, până când întâlnesc doi băieți mai mari care mă poartă pe drumuri noi și interesante. Eram fascinat de fiecare înaintare, încât doream să descopăr tot mai multe locuri. Și uite așa, tot mai des mergeam cu bicicleta de distracție pe cât mai multe drumuri până când a devenit un hobby pentru mine. Eram tot mai dornic să descopăr împrejurimile. Azi, am reușit să alcătuim un grup format din câțiva băieți dornici și ei să admire peisajele pe două roți, în ciuda faptului că suntem puși față în față cu anumite obstacole.";
          } ?>
        </p>
    </section>
    <div class="pimg3">
        <div class="ptext">
            <span class="border trans">
              <?php if ($_GET['lang'] == 'en') {
                echo "Our objectives";
              } else {
                echo "Obiectivele noastre";
              } ?>
            </span>
        </div>
    </div>
    <section class="section section-dark">
        <p class='text' align="center">
            <?php if ($_GET['lang'] == 'en') {
          echo "We want to make a bigger group, to be stronger and to explore more and more routes nearby. We want to show all what they are losing and also to promote our country's tourism. We hold a lot at our infrastructure, which, unfortunately isn't so pleasant, but we hope that we will bring a change even in this sight. But the most important thing is to enjoy you of our country's riches, wherever you are.";
          } else {
          echo "Vrem să ne mărim echipa, să fim cât mai uniți și să explorăm mult mai multe rute din jurul nostru. Vrem să arătăm tuturor ce ratează și totodată să promovăm turismul țării. Ținem foarte mult și la infrastructură, care, din păcate nu este prea favorabilă, însă sperăm să aducem o schimbare și în această privință. Dar cel mai important este să vă bucurați voi, oriunde v-ați afla, de bogățiile țării noastre.";
          } ?>
        </p>
    </section>
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
