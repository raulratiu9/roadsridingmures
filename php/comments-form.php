<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', e => {
    Array.prototype.slice.call(document.querySelectorAll('button.edit-comment')).forEach(function(bttn) {
        bttn.addEventListener('click', function(e) {
            let div = this.nextElementSibling;
            div.classList.toggle('expanded')
        });
    });
});
</script>
<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', e => {
    Array.prototype.slice.call(document.querySelectorAll('button.reply')).forEach(function(bttn) {
        bttn.addEventListener('click', function(e) {
            let div = this.nextElementSibling;
            div.classList.toggle('expanded')
        });
    });
});
</script>

<?php
function TimeAgo($oldTime, $newTime)
{
    $timeCalc = strtotime($newTime) - strtotime($oldTime);
    if ($timeCalc >= (60 * 60 * 24 * 30 * 12 * 2)) {
        $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30 / 12) . " years ago";
    } else if ($timeCalc >= (60 * 60 * 24 * 30 * 12)) {
        $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30 / 12) . " year ago";
    } else if ($timeCalc >= (60 * 60 * 24 * 30 * 2)) {
        $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30) . " months ago";
    } else if ($timeCalc >= (60 * 60 * 24 * 30)) {
        $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30) . " month ago";
    } else if ($timeCalc >= (60 * 60 * 24 * 2)) {
        $timeCalc = intval($timeCalc / 60 / 60 / 24) . " days ago";
    } else if ($timeCalc >= (60 * 60 * 24)) {
        $timeCalc = " Yesterday";
    } else if ($timeCalc >= (60 * 60 * 2)) {
        $timeCalc = intval($timeCalc / 60 / 60) . " hours ago";
    } else if ($timeCalc >= (60 * 60)) {
        $timeCalc = intval($timeCalc / 60 / 60) . " hour ago";
    } else if ($timeCalc >= 60 * 2) {
        $timeCalc = intval($timeCalc / 60) . " minutes ago";
    } else if ($timeCalc >= 60) {
        $timeCalc = intval($timeCalc / 60) . " minute ago";
    } else if ($timeCalc >= 0) {
        $timeCalc .= " seconds ago";
    }
    return $timeCalc;
}

function setComments($conn)
{
    if (isset($_POST['submitc'])) {
        $entryid = $_GET['entry_id'];

        $uid     = $_POST['user_id'];
        $message = $_POST['comment'];

        $sql    = "INSERT INTO comments (entry_id, user_id, date, comment) VALUES ('$entryid','$uid', now(), '$message')";
        $result = $conn->query($sql);
        header("Location: single.php?entry_id=$entryid");
    }
}
function getComments($conn)
{
    $entryid = $_GET['entry_id'];
    $sql     = "SELECT * FROM comments WHERE entry_id='$entryid' ORDER BY date DESC";
    $result  = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id      = $row['user_id'];
        $sql2    = "SELECT * FROM users WHERE username='$id'";
        $result2 = $conn->query($sql2);
        if ($row2 = $result2->fetch_assoc()) {
            $sql3    = "SELECT * FROM users where username ='$id'";
            $result3 = $conn->query($sql3);

            if ($result3->num_rows > 0) {

                while ($row3 = $result3->fetch_assoc()) {
                    echo '<div class="profile-form"><img class="comment-avatar" src="' . $row3['avatar'] . '"><p class="username">' . $row2['username'] . '</p></div>';
                }
            }
            echo "<div class='comment-box'><p class='comment'>";
            echo nl2br($row['comment']);
            echo "</p>";
            echo "<p class='date'><i class='far fa-clock'></i> ";
            $query_time  = "Select date from comments";
            $result_time = $conn->query($query_time);
            $date        = $row['date'];

            echo TimeAgo($date, date("Y-m-d H:i:s")) . '</p>';

            $sql4    = "SELECT distinct * FROM replies WHERE comment_id='" . $row['comment_id'] . "' ORDER BY date DESC";
            $result4 = $conn->query($sql4);
            while ($row4 = $result4->fetch_assoc()) {
                $username = $row4['username'];
                $sql5     = "SELECT * FROM users WHERE username='$username'";
                $result5  = $conn->query($sql5);
                if ($row5 = $result5->fetch_assoc()) {
                    $sql6    = "SELECT * FROM users where username ='$username'";
                    $result6 = $conn->query($sql6);

                    if ($result6->num_rows > 0) {

                        while ($row6 = $result6->fetch_assoc()) {
                            echo '<div class="profile-reply-form"><img class="reply-avatar" src="' . $row5['avatar'] . '"><p class="reply-username">' . $row6['username'] . '</p></div>';
                        }
                        echo "<div class='reply-box'><p class='reply'>";
                        echo nl2br($row4['reply']);
                        echo "</p>";
                        echo "<p class='date'><i class='far fa-clock'></i> ";
                        $query_time  = "SELECT date FROM comments";
                        $result_time = $conn->query($query_time);
                        $date        = $row4['date'];

                        echo TimeAgo($date, date("Y-m-d H:i:s")) . '</p>';

                        if (isset($_SESSION['id'])) {
                            if ($_SESSION['id'] == $row4['username']) {
                            } else {
                                echo "
    <form class='delete-form' method='POST' action='" . deleteReplies($conn) . "'>
    <input type='hidden' name = 'reply_id' value='" . $row4['reply_id'] . "'>
    <button type='submit' name='deleter' class='delete-comment'>Delete</button>
    </form>
    <form method='POST' action=''>
    <input type='hidden' name = 'reply_id' value='" . $row4['reply_id'] . "'>
    <input type='hidden' name = 'username' value='" . $row4['username'] . "'>
    <input type='hidden' name = 'date' value='" . $row4['date'] . "'>
    <input type='hidden' name = 'reply' value='" . $row4['reply'] . "'>
    </form>";
     ?>
<?php
for ($i = 1; $i <= 10; $i++) {
    printf("<button type='submit' class='edit-comment'>Edit</button>
                                 <div class='content'>
                               <form class='hidden-content edit-form' method='POST' action='" . editReplies($conn) . "'>
                                   <input type='hidden' name='reply_id' value='" . $row4['reply_id'] . "'>
                                   <input type='hidden' name='username' value='" . $row4['username'] . "'>
                                   <input type='hidden' name='date' value='" . $row4['date'] . "'>
                                   <textarea class='comment' name='reply'>" . $row4['reply'] . "</textarea>
                                   <button name='editr' type='submit' class='editr'>Edit</button>
                               </form>
                               </div>");
         };
       }
     }
   }
 }
echo "</div>";
}

if(isset($_SESSION['id'])) {
  if($_SESSION['id'] == $row2['id']){
  echo "
  <form class='delete-form' method='POST' action='".deleteComments($conn)."'>
  <input type='hidden' name = 'comment_id' value='".$row['comment_id']."'>
  <button type='submit' name='submitd' class='delete-comment'>Delete</button>
  </form>
  <form method='POST' action=''>
  <input type='hidden' name = 'comment_id' value='".$row['comment_id']."'>
  <input type='hidden' name = 'user_id' value='".$row['user_id']."'>
  <input type='hidden' name = 'date' value='".$row['date']."'>
  <input type='hidden' name = 'comment' value='".$row['comment']."'>
  </form><button type='submit' class='reply'>Reply</button>
                              <div class='content'>
                              <form class='hidden-content edit-form' method='POST' action='".setReplies($conn)."'>
                                  <input type='hidden' name='comment_id' value='".$row['comment_id']."'>
                                  <input type='hidden' name='user_id' value='".$row['user_id']."'>
                                  <input type='hidden' name='date' value='".$row['date']."'>
                                  <textarea class='comment' name='reply'></textarea>
                                  <button name='submitr' type='submit' class='editc'>Reply</button>
                              </form></div>";
                              ?>
<?php
for( $i=1; $i <=10; $i++ ){
                    printf ("<button type='submit' class='edit-comment'>Edit</button>
                              <div class='content'>
                            <form class='hidden-content edit-form' method='POST' action='".editComments($conn)."'>
                                <input type='hidden' name='comment_id' value='".$row['comment_id']."'>
                                <input type='hidden' name='user_id' value='".$row['user_id']."'>
                                <input type='hidden' name='date' value='".$row['date']."'>
                                <textarea class='comment' name='comment'>".$row['comment']."</textarea>
                                <button name='submite' type='submit' class='editc'>Edit</button>
                            </form>
                            </div>");
                }
} else {
  echo "<button type='submit' class='reply'>Reply</button>
                              <div class='content'>
                              <form class='hidden-content edit-form' method='POST' action='".setReplies($conn)."'>
                                  <input type='hidden' name='comment_id' value='".$row['comment_id']."'>
                                  <input type='hidden' name='user_id' value='".$row['user_id']."'>
                                  <input type='hidden' name='date' value='".$row['date']."'>
                                  <textarea class='comment' name='reply'></textarea>
                                  <button name='submitr' type='submit' class='editc'>Reply</button>
                              </form></div>";
    }
  }
}
?>
</div>
<?php
	}
}
function editComments($conn) {
  if(isset($_POST['submite'])) {
  $cid = $_POST['comment_id'];
  $uid = $_POST['user_id'];
  $date = $_POST['date'];
  $message = $_POST['comment'];

  $sql = "UPDATE comments SET comment='$message' WHERE comment_id='$cid'";
  $result = $conn->query($sql);
  }
}
function deleteComments($conn){
   if(isset($_POST['submitd'])) {
    $cid = $_POST['comment_id'];

    $sql = "DELETE FROM comments WHERE comment_id='$cid'";
    $result = $conn->query($sql);
  }
}
function setReplies($conn) {
  if(isset($_POST['submitr'])) {
    $cid = $_POST['comment_id'];
    $entry_id = $_GET['entry_id'];
    $uid = $_SESSION['username'];
    $message = $_POST['reply'];

    $sql = "INSERT IGNORE INTO replies(entry_id, comment_id, username, date, reply) VALUES ('$entry_id', '$cid', '$uid', now(), '$message')";
    $result = $conn->query($sql);
    header("Location: single.php?entry_id=$entry_id");
  }
}
function editReplies($conn) {
  if(isset($_POST['editr'])) {
  $rid = $_POST['reply_id'];
  $uid = $_POST['username'];
  $date = $_POST['date'];
  $message = $_POST['reply'];

  $sql = "UPDATE replies SET reply='$message' WHERE reply_id='$rid'";
  $result = $conn->query($sql);
  }
}
function deleteReplies($conn){
  if(isset($_POST['deleter'])) {
    $rid = $_POST['reply_id'];

    $sql = "DELETE FROM replies WHERE reply_id='$rid'";
    $result = $conn->query($sql);
  }
}
?>
