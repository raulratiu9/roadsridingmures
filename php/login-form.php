<?php

if (isset($_POST['btn'])) {

    require '../classes/dbh.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: ../experiences.php?error=emptyfields");
        exit();
    } else {
        $sql  = "SELECT * FROM users WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../experiences.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $cpassword = password_verify($password, $row['password']);
                if ($cpassword == false) {
                    header("Location: ../experiences.php?error=wrongpassword");
                    exit();
                } else if ($cpassword == true) {
                    session_start();
                    $_SESSION['id']       = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    if ($row['user_type'] == 'Admin') {
                        $_SESSION['isAdmin'] = true;
                    } else {
                        $_SESSION['isAdmin'] = false;
                    }
                    if ($_SESSION['isAdmin']) {
                        header("Location: ../aexperiences.php");
                        exit;
                    } else {
                        header("Location:../experiences.php");
                        exit();
                    }

                }
            } else {
                header("Location: ../experiences.php?error=nouser");
                exit();
            }
        }
    }
}
?>
