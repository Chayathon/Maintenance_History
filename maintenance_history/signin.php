<?php
    SESSION_START();
    include("conn.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin']))
    {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $sql = "SELECT * FROM `user` WHERE `Username` LIKE '$username' AND `Password` LIKE '$password'";
        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

        if(mysqli_num_rows($result))
        {
            $row = mysqli_fetch_array($result);
            $_SESSION["ID"] = $row["ID"];
            $_SESSION["username"] = $row["Username"];
            $_SESSION["success"] = "success";
            header("location: home");
        }
        else
        {
            $_SESSION['error'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
    }
?>