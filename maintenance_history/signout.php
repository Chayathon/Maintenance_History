<?php
    SESSION_START();
    SESSION_DESTROY();
    $_SESSION['logout'] = "ออกจากระบบสำเร็จ";
    HEADER("location: index");
?>