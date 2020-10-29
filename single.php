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
session_start();
ob_start();
date_default_timezone_set('Europe/Bucharest');
include 'php/comments-form.php';
mysqli_set_charset($conn, 'utf8');
require_once 'classes/entry.php';
$entry = new Entry();
$entry->SqlSelectEntryById($_GET['entry_id']); ?>
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
    <title>
    	<?php $conn = mysqli_connect("localhost", "root", "", "00252698_rrm");
    	$id = $entry->getId();
    	$result = mysqli_query($conn, "SELECT * FROM entries WHERE entry_id='$id'");
    	while ($row = mysqli_fetch_assoc($result)) {
    		if ($_GET['lang'] == 'en') {
    			echo $row['entry_title_en'];
    		} else { 
    			echo $entry->getTitle();
    		}
    	} ?>
    </title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="css/single-style.css">
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
				<?php echo "<a href='single.php?entry_id=".$entry->getId()." && lang=ro'>
				<img class='ro' src='images/ro.png'>
				</a>
				<a href='single.php?entry_id=".$entry->getId()." && lang=en'>
				<img class='eng' src='images/eng.png'>
				</a>"; ?>
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
					echo "<a href='experiences.php?lang=en' class='active'>Experiences</a>";
				} else {
					echo "<a href='experiences.php' class='active'>Experiențe</a>";
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
    	<?php require_once 'classes/entry.php';
    	$conn = mysqli_connect("localhost", "root", "", "00252698_rrm");
    	$id = $entry->getId();
        $result = mysqli_query ($conn, "SELECT * FROM entries WHERE entry_id='$id'");
        while ($row = mysqli_fetch_assoc($result)) { ?>
        	<div class="posts">
        		<?php if ($entry->getId() != -1) { ?>
        			<article class="post">
        				<header class="entry-header">
        					<time>
        						<span class="post-day">
        							<?php if ($_GET['lang'] == 'en') {
        								echo $row['entry_day'];
        							} else
        							echo $entry->getDay(); ?>	
        						</span>
                                <span class="post-month">
                                	<?php if ($_GET['lang'] == 'en') {
                                		echo $row['entry_month_en'];
                                		echo $row['entry_upload_en'];
                                	} else
                                	echo $entry->getMonth(); ?>	
                                </span>
                                <span class="post-year">
                                	<?php echo $entry->getYear(); ?>
                                </span>
                            </time>
                            <div class="title-wrap">
                            	<h2 class="title">
                            		<a href="single.php?entry_id=<?php echo $entry->getId(); ?>">
                            			<?php if ($_GET['lang'] == 'en') {
                            				echo $row['entry_title_en'];
                            			} else
                            			echo $entry->getTitle(); ?>
                            		</a>
                                </h2>
                            </div>
                        </header>
                        <div class="post-inner">
                        	<img src='<?php echo $entry->getFile(); ?>'>
                        </div>
                        <div class="post-content">
                        	<?php if ($_GET['lang'] == 'en') {
                        		echo $row['entry_content_en'];
                        	} else
                        	echo $entry->getContent(); ?>
                        </div>
                    <?php } ?>
                    
                    <div id="myModal" class="modal">
                    	<span class="close">&times;</span>
                    	<img class="modal-content" id="img01">
                    </div>
                    <div class="gallery">
                    	<div class="containerPhotos">
                    		<?php require_once 'classes/dbh.php';
                    		if (isset($_GET['entry_id'])) {
                    			$entry_id = $_GET['entry_id'];
                    			$query = mysqli_query($conn, "SELECT * FROM images WHERE entry_id='$entry_id'");
                    			if ($query->num_rows > 0) {
                    				while ($row = $query->fetch_assoc()) {
                    					$dirname = 'uploads/' . $row["file_name"];
                    					echo '<img class="photo" onclick="showImage(this)" id="myImg" src="' . $dirname . '" />';
                    				}
                    			}
                    		} ?>
                    	</div>
                    	<script type='text/javascript' src='js/modal-image.js'>
                    	</script>
                    </div>
                        <div class="rrm-container">
                        	<h1><?php if  ($_GET['lang'] == "en") {
                        		echo "You may also like...";
                        	} else {
                        		echo "S-ar putea să-ți placă și...";
                        	} ?> </h1>
        	                <?php
                        	require_once 'classes/dbh.php';
                        	if(isset($_GET['entry_id'])) {
                        		$entry_id = $_GET['entry_id'];
                        		$query = mysqli_query($conn, "SELECT * FROM entries ORDER BY entry_views ASC LIMIT 4 ");
                        		while ($row = mysqli_fetch_assoc($query)){
                        			if ($_GET['lang'] == 'en') {
                        			echo '<div class="rrm-card">';
                        			echo "<a href='single.php?entry_id=".$row['entry_id']." && lang=en'>";
                        			echo "<h2>".$row ['entry_title_en']."</h2>";
                        			echo '<img src="'.$row["entry_file"].'"><br>';
                        			echo '<img src="'.$row["entry_file3"].'">';
                        			echo "</div>";
                        		} else {
                        			                        			echo '<div class="rrm-card">';
                        			echo "<a href='single.php?entry_id=".$row['entry_id']." && lang=en'>";
                        			echo "<h2>".$row ['entry_title']."</h2>";
                        			echo '<img src="'.$row["entry_file"].'"><br>';
                        			echo '<img src="'.$row["entry_file3"].'">';
                        			echo "</div>";
                        		}
                        	}
                        	} ?>
    </div>
                    <div class="post-meta">
                    	<div class="post-type">
                    		<i class="fa fa-thumb-tack"></i>
                    	</div>
                    	<?php $id=$_GET['entry_id'];
                    	$currentid = $id;
                    	$prevquery= "SELECT * FROM entries WHERE entry_id < $currentid ORDER BY entry_id DESC LIMIT 1";
                    	$prevresult = $conn->query($prevquery);
                    	while($prevrow = mysqli_fetch_array($prevresult)) {
                    		$previd  = $prevrow['entry_id'];
                    	}
                    	$nextquery= "SELECT * FROM entries WHERE entry_id > $currentid ORDER BY entry_id ASC LIMIT 1";
                    	$nextresult = $conn->query($nextquery);
                    	while($nextrow = mysqli_fetch_array($nextresult)) {
                    		$nextid  = $nextrow['entry_id'];
                    	}
                    	$no_of_records_per_page = 1;
                    	$total_pages_sql = "SELECT COUNT(*) FROM entries";
                    	$result          = mysqli_query($conn, $total_pages_sql);
                    	$total_rows      = mysqli_fetch_array($result)[0];
                    	$total_pages     = ceil($total_rows / $no_of_records_per_page); ?>
                    	<li id="prev-post" class="<?php if($previd < 1){ echo 'disabled'; } ?>">
                    		<?php if ($_GET['lang'] == 'en') {
                    			echo '<a href="single.php?entry_id='.$previd.' && lang=en">';
                    		} else {
                    			echo '<a href="single.php?entry_id='.$previd.'">';
                    		}?>
                    		<i class="fa fa-arrow-left" aria-hidden="true"></i>
                    	    </a>
                    	</li>
                    	<span class="post-comments">
							<i class="fa fa-comments-o"></i>
							<?php $conn = mysqli_connect("localhost", "root", "", "00252698_rrm");
							$total_comments_sql = "SELECT COUNT(*) FROM comments WHERE entry_id=".$_GET['entry_id']."";
                            $result = mysqli_query($conn, $total_comments_sql);
                            $total_comments = mysqli_fetch_array($result)[0];
                            echo $total_comments;
                            if ($total_comments == 1) {
                            	if ($_GET['lang'] == 'en') {
                            		echo " comment";
                            	} else {
                            		echo " comentariu";
                            	}
                            } else if ($_GET['lang'] == 'en') {
                            	echo " comments";
                            } else {
                            	echo " comentarii";
                            } ?>
                        </span>
                        <span class="post-replies">
                        	<i class="fa fa-reply"></i>
                        	<?php $conn = mysqli_connect("localhost", "root", "", "00252698_rrm");
							$total_replies_sql = "SELECT COUNT(*) FROM comments WHERE entry_id=".$_GET['entry_id']."";
                            $result = mysqli_query($conn, $total_replies_sql);
                            $total_replies = mysqli_fetch_array($result)[0];
                            echo $total_replies;
                            if ($total_replies == 1) {
                            	if ($_GET['lang'] == 'en') {
                            		echo " reply";
                            	} else {
                            		echo " răspuns";
                            	}
                            } else if ($_GET['lang'] == 'en') {
                            	echo " replies";
                            } else {
                            	echo " răspunsuri";
                            } ?>
                        </span>
                        <span class="views">
                        	<i id="eye" class="fa fa-eye"></i>
                        	<?php require_once 'classes/dbh.php';
                        	if (isset($_GET['entry_id'])) {
                        		$entry_id = $_GET['entry_id'];
                        		$sql = "UPDATE entries SET entry_views = entry_views+1 WHERE entry_id = $entry_id";
                        		$conn->query($sql);
                        		$sql = "SELECT * FROM entries WHERE entry_id = $entry_id";
                        		$result = $conn->query($sql);
                        		if ($result->num_rows > 0) {
                        			while($row = $result->fetch_assoc()) {
                        				echo $row["entry_views"];
                        	if ($_GET['lang'] == 'en') {
                        		echo " views";
                        	} else {
                        		echo " vizualizări";
                        	}
                        }
                    }
                }
                        	$conn->close(); ?>
                        </span>
                        <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=http://roadsridingmures.ro/single.php?entry_id=<?php echo $entry->getId(); ?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
                        	<div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--large">
                        		<div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                        			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        				<path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z" />
                        			</svg>
                        		</div>
                        		<?php if ($_GET['lang'] == 'en') {
                        			echo "Share";
                        		} else {
                        			echo "Distribuie";
                        		} ?>
                        	</div>
                        </a>
                        <li id="next-post" class="<?php if($nextid < 1){ echo 'disabled'; } ?>">
                        	<?php if ($_GET['lang'] == 'en') {
                        		echo '<a href="single.php?entry_id='.$nextid.' && lang=en">';
                        	} else {
                        		echo '<a href="single.php?entry_id='.$nextid.'">';
                        	} ?>
                        	<i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </li>
                    </div>
                    <?php $conn = mysqli_connect("localhost", "root", "", "00252698_rrm");
                    if(isset($_SESSION['id'])) {
                    	$sql = "SELECT * FROM users where username = '" . $_SESSION['username'] . "'";
                    	$result = $conn->query($sql);
                    	if ($result->num_rows > 0) {
                    		while ($row = $result->fetch_assoc()) {
                    			echo '<form method="POST" action="'.setComments($conn).'"><div class="comment-form"><img class="comment-avatar" src="' . $row['avatar'] . '">';
                    		}
                    	} echo "<input type='hidden' name='user_id' value='".$_SESSION['username']."'>
                    	<input type='hidden' name='date' value='".date('d-m-Y H:i:s')."'>
                    	<textarea rows='1' class='comment' name='comment' placeholder='Leave a comment' required></textarea><br>
                    	<button class='comment' name='submitc' type='submit'>Comment</button>
                    	</form></div>";
                    } else {
                    	echo "<form class='blockf' method='POST' action='".setComments($conn)."'>
                    	<input type='hidden' name='user_id' value='Anonymous'>
                    	<input type='hidden' name='date' value='".date('d-m-Y H:i:s')."'>
                    	<textarea rows='1' class='comment' placeholder='You are logged out!' readonly='yes' name='comment'></textarea><br>
                    	</form><br><br>";
                    }
                    getComments($conn);
                    ?>
                </div>
            <?php } ?>
        </div>
        <aside>
			<?php 
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") {
					echo "<p class='error'>Fill in all fields!</p>";
				} else if ($_GET['error'] == "wrongpassword") {
					echo "<p class='error'>Invalid password!</p>";
				} else if ($_GET['error'] == "nouser") {
					echo "<p class='error'>Please register an account before login!</p>";
				}
			}
			if (isset($_GET['register'])) {
				if ($_GET['register'] == "succes") {
					echo "<p class='loggedin'>You can login now!</p>";
				}
			} ?>
			<div class="login-box">
				<?php if (isset($_SESSION['id'])) {
					echo "<form action='php/logout-form.php' method='POST'>
        		<button type='submit' class='btno' name='logout-submit'>";
        		if ($_GET['lang'] == 'en') {
        			echo "Log Out";
        		} else {
        			echo "Deconectare";
        		} 
        		echo "</button>
        		</form>";
				} else {
					echo "<h1 class='login'>"; ?>
					<?php if ($_GET['lang'] == 'en') {
						echo "Login";
					} else {
						echo "Autentificare";
					}
				echo "</h1>
				<div class='register'>
				<a href='register.php'><font face='Times New Roman'>
				<p>"; ?>
				<?php if ($_GET['lang'] == 'en') {
				   echo "</h1>
				   <div class='register'>
				   <a href='register.php?lang=en'><font face='Times New Roman'>
				   <p>
				   Have you not an account yet? Register now!";
				} else {
				   echo "</h1>
				   <div class='register'>
				   <a href='register.php'><font face='Times New Roman'>
				   <p>
				   Nu ai un cont încă? Înregistrează-te acum!";
				}
				echo "</p>
				</font>
				</a>
				</div>
                <form action='php/login-form.php' method='POST'>
                <div class='textbox'>
                <i class='fa fa-user' aria-hidden='true'></i>
                <input type='text' placeholder='Username' name='username' value=''>
                </div>
                <div class='textbox'>
                <i class='fa fa-lock' aria-hidden='true'></i>
                <input type='password' placeholder='Password' name='password' value=''>
                </div>
                <button type='submit' name='btn' class='btn'>";
                if ($_GET['lang'] == 'en') {
        			echo "Sign In";
        		} else {
        			echo "Autentificare";
        		} 
        		echo "</button>
                </div>
                </form>";
            } ?>
                <section class="status">
                	<?php if (isset($_SESSION['username'])) {
                		echo "<p class='loggedin'>";
                		if (isset($_SESSION['username'])) {
                			$sql = "SELECT * FROM users where username = '" .$_SESSION['username']. "'";
                			$result = $conn->query($sql);
                			if ($result->num_rows > 0) {
                				while ($row = $result->fetch_assoc()) {
                					echo "<img class='avatar' src='" . $row['avatar'] . "'>";
                				}
                			}
                			if ($_GET['lang'] == 'en') {
                				echo "Now you can leave a comment, ";
                			} else {
                				echo "Acum poți lăsa un comentariu, ";
                			}
                				echo ($_SESSION['username']);
                				echo "!</p>";
                				if ($_GET['lang'] == 'en') {
                					echo "<a href='update.php?lang=en'><button type='submit' class='edit' name='Edit'>";
                					echo "Edit profile";
                					echo "</button></a>";
                				} else {
                					echo "<a href='update.php'><button type='submit' class='edit' name='Edit'>";
                					echo "Modifică profilul";
                					echo "</button></a>";
                				}
                			}
                		} ?>
                </section>
                <div class="calendar">
                	<div class="image">
                		<h2 class="day">
                			<?php if ($_GET['lang'] == 'en') {
                				echo date("l, jS");
                				echo "<h3 class='month'>";
                				echo date("F Y");
                				echo "</h3>";
                			} else {
                				echo "<script type='text/javascript' src='js/day.js'>
                				</script>
                				</h2>
                				<h3 class='month'>
                				<script type='text/javascript' src='js/month.js'>
                				</script>";
                				echo date(" Y");
                				echo "</h3>";
                			} ?>
                		</h2>
                	</div>
                	<div class="datepicker"></div>
                	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
                	<script type="text/javascript" src="js/calendar.js"></script>
                </div>
               
                <div class="archive">
                	<?php if ($_GET['lang'] == 'en') {
                		$stmt = $conn->query("SELECT entry_year as year, entry_month_en as month, entry_id as id, entry_title_en as posts FROM entries GROUP BY year, month, id ORDER BY entry_upload DESC");
                		$data = array();
                		while ($row = mysqli_fetch_assoc($stmt)) {
                			$monthName = $row['month'];
                			$slug = 'a-'.$row['month'].'-'.$row['year'];
                			$data[$row['year']][$monthName][] = array('post' => "<a class='title' href='single.php?entry_id=".$row['id']." && lang=en'>".$row['posts']."</a><br>", 'slug' => 'a-'.$row['month'].'-'.$row['year']);
                		}
                	echo "<ul><h1 class='archive'>Archive</h1>";
                	foreach ($data as $year => $yearData) {
                		echo "<button class='collapsible'><li class='year'>$year</li><br/></button>";
                		echo "<ul>";
                		foreach ($yearData as $month => $monthData) {
                			echo "<div class='contentc'>";
                			echo "<li class='month'>$month<br/>";
                			echo "<div class='contentc'><ul class='contentc'>";
                			foreach ($monthData as $number => $postData) {
                				echo "<a href='#'>${postData['post']}</a></li>";
                			}
                			echo "</ul></li>";
                		}
                		echo "</ul></li>";
                	}
                	echo "</ul></div>";
                } else {
                	$stmt = $conn->query("SELECT entry_year as year, entry_month as month, entry_id as id, entry_title as posts FROM entries GROUP BY year, month, id ORDER BY entry_upload DESC");
                	$data = array();
                	while ($row = mysqli_fetch_assoc($stmt)) {
                		$monthName = $row['month'];
                		$slug = 'a-'.$row['month'].'-'.$row['year'];
                		$data[$row['year']][$monthName][] = array('post' => "<a class='title' href='single.php?entry_id=".$row['id']."'>".$row['posts']."</a><br>", 'slug' => 'a-'.$row['month'].'-'.$row['year']);
                	}
                	echo "<ul><h1 class='archive'>Arhive</h1>";
                	foreach ($data as $year => $yearData) {
                		echo "<button class='collapsible'><li class='year'>$year</li><br/></button>";
                		echo "<ul>";
                		foreach ($yearData as $month => $monthData) {
                			echo "<div class='contentc'>";
                			echo "<li class='month'>$month<br/>";
                			echo "<div class='contentc'><ul class='contentc'>";
                			foreach ($monthData as $number => $postData) {
                				echo "<a href='#'>${postData['post']}</a></li>";
                			}
                			echo "</ul></li>";
                		}
                		echo "</ul></li>";
                	}
                	echo "</ul></div>";
                } ?>
                <script type="text/javascript">
                	var coll = document.getElementsByClassName("collapsible");
                    var i;
                    for (i = 0; i < coll.length; i++) {
                    	coll[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var content = this.nextElementSibling;
                        if (content.style.display === "block") {
                        	content.style.display = "none";
                        } else {
                        	content.style.display = "block";
                        }
                    });
                }
                </script>
            </div>
        </aside>
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
