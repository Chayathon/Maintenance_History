<?php
    SESSION_START();
    include 'conn.php';

    if(isset($_POST['add'])) {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $detail = $_POST['detail'];
        $note = $_POST['note'];

        // ตรวจสอบว่าไฟล์ถูกส่งมาโดยใช้ HTTP POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['more_pic'])) {
            $more_pic = $_FILES['more_pic'];

            // กำหนดโฟลเดอร์ที่ต้องการบันทึกไฟล์ที่อัปโหลด
            $targetDir = "images/gas/$detail-$date/more_pictures/";
    
            // ตรวจสอบว่าโฟลเดอร์เป้าหมายมีอยู่แล้วหรือไม่ หากไม่มีให้สร้างใหม่
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // ตรวจสอบจำนวนไฟล์ที่ถูกอัปโหลด
            $fileCount = count($more_pic['name']);
            $successCount = 0;

            for ($i = 0; $i < $fileCount; $i++) {
                // รับค่าต่าง ๆ ของไฟล์
                $fileName = basename($more_pic['name'][$i]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $fileTmpPath = $more_pic['tmp_name'][$i];
                $fileSize = $more_pic['size'][$i];
        
                // ตรวจสอบประเภทของไฟล์ (Optional)
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
                if (in_array($fileType, $allowedTypes)) {
                    // อัปโหลดไฟล์ไปยังโฟลเดอร์เป้าหมาย
                    if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
                        $successCount++;
                    }
                }
            }
        }

        // ตรวจสอบว่าไฟล์ถูกส่งมาโดยใช้ HTTP POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['quotation'])) {
            $quotation = $_FILES['quotation'];

            $targetDir = "images/gas/$detail-$date/quotation/";

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // รับค่าต่าง ๆ ของไฟล์
            $fileNameQuotation = basename($quotation['name']);
            $targetFilePath = $targetDir . $fileNameQuotation;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $fileTmpPath = $quotation['tmp_name'];
    
            // อัปโหลดไฟล์ไปยังโฟลเดอร์เป้าหมาย
            move_uploaded_file($fileTmpPath, $targetFilePath);
        }

        // ตรวจสอบว่าไฟล์ถูกส่งมาโดยใช้ HTTP POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['bill'])) {
            $bill = $_FILES['bill'];

            $targetDir = "images/gas/$detail-$date/bill/";

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // รับค่าต่าง ๆ ของไฟล์
            $fileNameBill = basename($bill['name']);
            $targetFilePath = $targetDir . $fileNameBill;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $fileTmpPath = $bill['tmp_name'];
    
            // อัปโหลดไฟล์ไปยังโฟลเดอร์เป้าหมาย
            move_uploaded_file($fileTmpPath, $targetFilePath);
        }

        // กำหนด Timezone
        date_default_timezone_set('Asia/Bangkok');

        // สร้าง DateTime object
        $datetime = new DateTime();

        // ดึงเวลาปัจจุบัน
        $current_date = $datetime->format('Y-m-d');
        $current_time = $datetime->format('H:i');

        $sql = "INSERT INTO `gas`(`Date`, `Detail`, `Note`, `Quotation`, `Bill`, `By`, `Lastestdate`, `Time`) VALUES ('$date','$detail','$note','$fileNameQuotation','$fileNameBill','$name','$current_date','$current_time')";
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
        $name = $_POST['name'];
        $date = $_POST['date'];
        $detail = $_POST['detail'];
        $note = $_POST['note'];

        // กำหนดโฟลเดอร์ที่ต้องการบันทึกไฟล์ที่อัปโหลด
        $targetDir = "images/gas/$detail-$date/more_pictures/";

        // ตรวจสอบว่าไฟล์ถูกส่งมาโดยใช้ HTTP POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['more_pic'])) {
            $more_pic = $_FILES['more_pic'];

            // ตรวจสอบจำนวนไฟล์ที่ถูกอัปโหลด
            $fileCount = count($more_pic['name']);
            $successCount = 0;

            for ($i = 0; $i < $fileCount; $i++) {
                // รับค่าต่าง ๆ ของไฟล์
                $fileName = basename($more_pic['name'][$i]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $fileTmpPath = $more_pic['tmp_name'][$i];
                $fileSize = $more_pic['size'][$i];
        
                // ตรวจสอบประเภทของไฟล์ (Optional)
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
                if (in_array($fileType, $allowedTypes)) {
                    // อัปโหลดไฟล์ไปยังโฟลเดอร์เป้าหมาย
                    if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
                        $successCount++;
                    }
                }
            }
        }

        // ตรวจสอบว่าไฟล์ถูกส่งมาโดยใช้ HTTP POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['quotation']) && $_FILES['quotation']['error'] == UPLOAD_ERR_OK) {
            $quotation = $_FILES['quotation'];

            $targetDir = "images/gas/$detail-$date/quotation/";

            // รับค่าต่าง ๆ ของไฟล์
            $fileNameQuotation = basename($quotation['name']);
            $targetFilePath = $targetDir . $fileNameQuotation;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $fileTmpPath = $quotation['tmp_name'];
    
            // อัปโหลดไฟล์ไปยังโฟลเดอร์เป้าหมาย
            move_uploaded_file($fileTmpPath, $targetFilePath);

            $sql = "UPDATE `gas` SET `Quotation` = '$fileNameQuotation' WHERE `ID` = '$id'";
            $result = mysqli_query($con, $sql);
        }

        // ตรวจสอบว่าไฟล์ถูกส่งมาโดยใช้ HTTP POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['bill']) && $_FILES['bill']['error'] == UPLOAD_ERR_OK) {
            $bill = $_FILES['bill'];

            $targetDir = "images/gas/$detail-$date/bill/";

            // รับค่าต่าง ๆ ของไฟล์
            $fileNameBill = basename($bill['name']);
            $targetFilePath = $targetDir . $fileNameBill;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $fileTmpPath = $bill['tmp_name'];
    
            // อัปโหลดไฟล์ไปยังโฟลเดอร์เป้าหมาย
            move_uploaded_file($fileTmpPath, $targetFilePath);

            $sql = "UPDATE `gas` SET `Bill` = '$fileNameBill' WHERE `ID` = '$id'";
            $result = mysqli_query($con, $sql);
        }

        // กำหนด Timezone
        date_default_timezone_set('Asia/Bangkok');

        // สร้าง DateTime object
        $datetime = new DateTime();

        // ดึงเวลาปัจจุบัน
        $current_date = $datetime->format('Y-m-d');
        $current_time = $datetime->format('H:i');

        $sql = "UPDATE `gas` SET `Date` = '$date',
                                `Note` = '$note',
                                `By` = '$name',
                                `Lastestdate` = '$current_date',
                                `Time` = '$current_time'
                WHERE `ID` = '$id'";
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

    function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return false;
        }
        
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        
        $items = scandir($dir);
        foreach ($items as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            
            $path = $dir . DIRECTORY_SEPARATOR . $item;
            if (is_dir($path)) {
                deleteDirectory($path);
            } else {
                unlink($path);
            }
        }
        
        return rmdir($dir);
    }

    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $detail = $_POST['detail'];

        $targetDir = "images/gas/$detail-$date/";

        deleteDirectory($targetDir);

        $sql = "DELETE FROM `gas` WHERE `ID` = '$id'";
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