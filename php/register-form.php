<?php

if (isset($_POST['btn'])) {

    require '../classes/dbh.php';

    $username       = $_POST['username'];
    $email          = $_POST['mail'];
    $password       = $_POST['password'];
    $passwordRepeat = $_POST['cpassword'];
    $file           = $_FILES['avatar'];

    $file_name     = $_FILES['avatar']['name'];
    $file_type     = $_FILES['avatar']['type'];
    $file_tmp_name = $_FILES['avatar']['tmp_name'];
    $file_size     = $_FILES['avatar']['size'];

    $target_dir = "../php/avatars/";

    move_uploaded_file($file_tmp_name, "php/avatars/" . $file_name);

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($file_name)) {
        header("Location: ../register.php?error=emptyfields&username=" . $username . "&mail=" . $email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail");
        exit();
    } else if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invalidusername");
        exit();
    } else if (strlen($username) > 12) {
        header("Location: ../register.php?error=invalidusername");
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: ../register.php?error=cpassword&username=" . $username . "&mail=" . $email);
        exit();
    } else {
        $conn = mysqli_connect("localhost", "root", "", "blog_tut");
        $sql  = "SELECT id FROM users WHERE id=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
        } else {
            $sql         = "SELECT * FROM users WHERE username='$username'";
            $result      = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                header("Location: ../register.php?error=usertaken");
                exit();
            } else {
                $sql         = "SELECT * FROM users WHERE email='$email'";
                $result      = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    header("Location: ../register.php?error=mailtaken");
                    exit();
                } else {
                    $sql  = "INSERT INTO users (username, email, password, avatar, function) VALUES (?,?,?, '$target_dir$file_name', 'user')";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../register.php?error=sqlerror");
                        exit();
                    } else {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../experiences.php?register=succes");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    header("Location: ../register.php");
    exit();
}

?>
