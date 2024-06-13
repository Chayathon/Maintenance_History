<?php
    SESSION_START();
    include 'conn.php';

    if(isset($_POST['add'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        $sql = "INSERT INTO `user`(`Username`, `Password`, `Status`) VALUES ('$username','$password','$status')";
        $result = mysqli_query($con, $sql);

        if($result) {
            $_SESSION['success'] = "success";
            echo "<script type = text/javascript>";
            echo "window.history.back();";
            echo "</script>";
        }
        else {
            $_SESSION['error'] = "error";
            echo "<script type = text/javascript>";
            echo "window.history.back();";
            echo "</script>";
        }
    }

    if(isset($_POST['edit'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        $sql = "UPDATE `user` SET `Username` = '$username', `Password` = '$password', `Status` = '$status' WHERE `ID` = '$id'";
        $result = mysqli_query($con, $sql);

        if($result) {
            $_SESSION['success'] = "success";
            echo "<script type = text/javascript>";
            echo "window.history.back();";
            echo "</script>";
        }
        else {
            $_SESSION['error'] = "error";
            echo "<script type = text/javascript>";
            echo "window.history.back();";
            echo "</script>";
        }
    }

    if(isset($_POST['delete'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM `user` WHERE `ID` = '$id'";
        $result = mysqli_query($con, $sql);

        if($result) {
            $_SESSION['success'] = "success";
            echo "<script type = text/javascript>";
            echo "window.history.back();";
            echo "</script>";
        }
        else {
            $_SESSION['error'] = "error";
            echo "<script type = text/javascript>";
            echo "window.history.back();";
            echo "</script>";
        }
    }
?>