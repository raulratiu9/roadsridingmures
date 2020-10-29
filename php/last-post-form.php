<?php
    require_once 'classes/dbh.php';
    $sql = mysqli_query($conn, "SELECT * FROM entries ORDER BY entry_id DESC LIMIT 1");
    $print_data = mysqli_fetch_row($sql);
?>
