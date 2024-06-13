<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Light Sign</title>
</head>
<body>
    <?php
        SESSION_START();
        include('conn.php');

        @$ID = $_SESSION['ID'];

        $sql_user = "SELECT * FROM `user` WHERE `ID` = '$ID'";
        $result_user = mysqli_query($con, $sql_user);

        while($row = mysqli_fetch_array($result_user))
        {
            $name = $row['Username'];
            $status = $row['Status'];
        }
    ?>
    
    <?php include 'navbar.php'; ?>

    <div class="md:container md:mx-auto px-2 py-4">
        <div class="card bg-base-100 drop-shadow-[0_15px_35px_rgba(0,0,0,0.25)]">
            <div class="card-body">
                <div class="flex">
                    <p class="font-bold text-xl text-center">ป้ายไฟ หน้าตึกวิเศษ</p>
                </div>
                <div class="flex justify-end">
                    <!-- You can open the modal using ID.showModal() method -->
                    <button class="btn btn-accent" onclick="add_modal.showModal()" <?php if(@$status < 1) { ?> disabled <?php } ?>><i class="fas fa-plus"></i>เพิ่ม</button>
                    <dialog id="add_modal" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>

                            <form name="add" id="add" method="post" enctype="multipart/form-data" action="light_sign_db.php">
                                <script>
                                    function formatDate(input) {
                                        // แปลง format เป็น dd/mm/yyyy
                                        var dateParts = input.value.split("-");
                                        var formattedDate = dateParts[2] + "/" + dateParts[1] + "/" + dateParts[0];
                                        // แสดงผลลัพธ์
                                        document.getElementById("formattedDate").innerHTML = formattedDate;
                                    }
                                </script>
                                <input type="hidden" name="name" value="<?php echo $name; ?>">
                                <label class="input input-bordered flex items-center gap-2 mt-6 my-4">
                                    วันที่
                                    <input type="date" class="grow" name="date" id="dateInput" onchange="formatDate(this)" required />
                                    <div id="formattedDate"></div>
                                </label>
                                <label class="input input-bordered flex items-center gap-2 my-4">
                                    รายละเอียด
                                    <input type="text" class="grow" name="detail" required />
                                </label>
                                <label class="input input-bordered flex items-center gap-2 my-4">
                                    หมายเหตุ
                                    <input type="text" class="grow" name="note" />
                                </label>
                                <label class="input input-bordered flex items-center gap-2 my-4">
                                    ช่าง
                                    <input type="text" class="grow" name="technician" />
                                </label>
                                <div class="label">
                                    <span class="label-text">รูปเพิ่มเติม</span>
                                </div>
                                <input type="file" class="file-input file-input-bordered w-full flex items-center gap-2 mb-4" name="more_pic[]" accept="image/*" multiple/>
                                <div class="label">
                                    <span class="label-text">ใบเสนอราคา</span>
                                </div>
                                <input type="file" class="file-input file-input-bordered w-full flex items-center gap-2 mb-4" name="quotation" accept=".pdf, .jpeg, .jpg, .png, .gif, .heic" />
                                <div class="label">
                                    <span class="label-text">วางบิล</span>
                                </div>
                                <input type="file" class="file-input file-input-bordered w-full flex items-center gap-2 mb-4" name="bill" accept=".pdf, .jpeg, .jpg, .png, .gif, .heic" />

                                <div class="flex justify-center pt-4">    
                                    <button type="submit" class="btn btn-wide btn-success" name="add">เพิ่มข้อมูล</button>
                                </div>
                            </form>
                        </div>
                    </dialog>
                </div>

                <?php
                    include 'conn.php';

                    $sql = "SELECT * FROM `light_sign`";
                    $result = mysqli_query($con, $sql);

                    function convertYear($date) {
                        // แยกปี เดือน และวันออกจากวันที่ที่ระบุ
                        $dateArray = explode('-', $date);
                        $year = (int)$dateArray[0];
                        $month = $dateArray[1];
                        $day = $dateArray[2];

                        // เพิ่ม 543 ปี เพื่อเปลี่ยนจาก ค.ศ. เป็น พ.ศ.
                        $buddhistYear = $year + 543;

                        // ประกอบปี เดือน วัน กลับเป็นรูปแบบเดิม
                        return sprintf('%04d-%02d-%02d', $buddhistYear, $month, $day);
                    }
                ?>
                
                <div class="overflow-x-auto">
                    <table class="table row-border hover" id="myTable">
                        <thead>
                            <tr class="bg-slate-200">
                                <th>วันที่</th>
                                <th>รายละเอียด</th>
                                <th>หมายเหตุ</th>
                                <th>ช่าง</th>
                                <th>ล่าสุดโดย</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result as $row) { ?>
                                <tr>
                                    <td><?php echo convertYear($row['Date']); ?></td>
                                    <td class="cursor-pointer" onclick="picture_modal<?php echo $row['ID']; ?>.showModal()"><?php echo $row['Detail']; ?></td>
                                    <td><?php echo $row['Note']; ?></td>
                                    <td><?php echo $row['Technician']; ?></td>
                                    <td><div class="tooltip" data-tip="<?php echo convertYear($row['Lastestdate']); ?> <?php echo $row['Time']; ?>"><?php echo $row['By']; ?></div></td>
                                    <td>
                                        <div class="join">
                                            <button class="btn btn-warning btn-xs join-item" onclick="edit_modal<?php echo $row['ID']; ?>.showModal()" <?php if(@$status < 1) { ?> disabled <?php } ?>><i class="fas fa-edit"></i>แก้ไข</button>
                                            <button class="btn btn-error btn-xs join-item" onclick="delete_modal<?php echo $row['ID']; ?>.showModal()" <?php if(@$status < 1) { ?> disabled <?php } ?>><i class="fas fa-trash-alt"></i>ลบ</button>
                                        </div>
                                    </td>
                                </tr>

                                <dialog id="picture_modal<?php echo $row['ID']; ?>" class="modal">
                                    <div class="modal-box w-11/12 max-w-5xl">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>

                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <p class="font-bold">ใบเสนอราคา</p>
                                                <a class="hover:underline" href="images/light_sign/<?php echo $row['Detail']; ?>/quotation/<?php echo $row['Quotation']; ?>" target="_blank"><?php echo $row['Quotation']; ?></a>
                                            </div>
                                            <div>
                                                <p class="font-bold">วางบิล</p>
                                                <a class="hover:underline" href="images/light_sign/<?php echo $row['Detail']; ?>/bill/<?php echo $row['Bill']; ?>" target="_blank"><?php echo $row['Bill']; ?></a>
                                            </div>
                                        </div>

                                        <?php
                                            $targetFolder = $row['Detail'] . "-" . $row['Date'];
                                            $directory = "images/light_sign/$targetFolder/more_pictures/";
                            
                                            if (is_dir($directory)) {
                                                $files = scandir($directory);
                                                echo "<div class='grid gap-6 grid-cols-3 pt-5'>";
                                                foreach ($files as $file) {
                                                    if ($file !== '.' && $file !== '..') {
                                                        echo "<div><a href='$directory$file' target='_blank'><img class='border border-black rounded-xl drop-shadow-lg hover:scale-105 transition duration-300' src='$directory$file'></a></div>";
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                </dialog>

                                <dialog id="edit_modal<?php echo $row['ID']; ?>" class="modal">
                                    <div class="modal-box">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>

                                        <form name="edit" id="edit" method="post" enctype="multipart/form-data" action="light_sign_db.php">
                                            <script>
                                                function formatDate(input) {
                                                    // แปลง format เป็น dd/mm/yyyy
                                                    var dateParts = input.value.split("-");
                                                    var formattedDate = dateParts[2] + "/" + dateParts[1] + "/" + dateParts[0];
                                                    // แสดงผลลัพธ์
                                                    document.getElementById("formattedDate").innerHTML = formattedDate;
                                                }
                                            </script>
                                            <input type="hidden" name="id" value="<?php echo $row['ID'];?>">
                                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                                            <label class="input input-bordered text-slate-400 flex items-center gap-2 mt-6 my-4">
                                                วันที่
                                                <input type="date" class="grow" name="date" id="dateInput" value="<?php echo $row['Date']; ?>" onchange="formatDate(this)" readonly />
                                                <div id="formattedDate"></div>
                                            </label>
                                            <label class="input input-bordered text-slate-400 flex items-center gap-2 my-4">
                                                รายละเอียด
                                                <input type="text" class="grow" name="detail" value="<?php echo $row['Detail']; ?>" readonly />
                                            </label>
                                            <label class="input input-bordered flex items-center gap-2 my-4">
                                                หมายเหตุ
                                                <input type="text" class="grow" name="note" value="<?php echo $row['Note']; ?>" />
                                            </label>
                                            <label class="input input-bordered flex items-center gap-2 my-4">
                                                ช่าง
                                                <input type="text" class="grow" name="technician" value="<?php echo $row['Technician']; ?>" />
                                            </label>
                                            <div class="label">
                                                <span class="label-text">เพิ่มรูป</span>
                                            </div>
                                            <input type="file" class="file-input file-input-bordered w-full flex items-center gap-2 mb-4" name="more_pic[]" accept="image/*" multiple/>
                                            <div class="label">
                                                <span class="label-text">ใบเสนอราคา</span>
                                            </div>
                                            <label class="input input-bordered text-slate-400 flex items-center my-1">
                                                ไฟล์เดิม :&nbsp;
                                                <input type="text" class="grow" value="<?php echo $row['Quotation']; ?>" disabled />
                                            </label>
                                            <input type="file" class="file-input file-input-bordered w-full flex items-center gap-2 mb-4" name="quotation" accept=".pdf, .jpeg, .jpg, .png, .gif, .heic" />
                                            <div class="label">
                                                <span class="label-text">วางบิล</span>
                                            </div>
                                            <label class="input input-bordered text-slate-400 flex items-center my-1">
                                                ไฟล์เดิม :&nbsp;
                                                <input type="text" class="grow" value="<?php echo $row['Bill']; ?>" disabled />
                                            </label>
                                            <input type="file" class="file-input file-input-bordered w-full flex items-center gap-2 mb-4" name="bill" accept=".pdf, .jpeg, .jpg, .png, .gif, .heic" />

                                            <div class="flex justify-center pt-4">    
                                                <button type="submit" class="btn btn-wide btn-warning" name="edit">แก้ไขข้อมูล</button>
                                            </div>
                                        </form>
                                    </div>
                                </dialog>

                                <dialog id="delete_modal<?php echo $row['ID']; ?>" class="modal">
                                    <div class="modal-box">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>

                                        <form name="delete" id="delete" method="post" action="light_sign_db.php">
                                            <p class="font-bold" align="center">
                                                ยืนยันที่จะลบข้อมูล<br>
                                                    วันที่ : <?php echo $row['Date']; ?><br>
                                                    รายละเอียด : <?php echo $row['Detail']; ?> ?
                                            </p>
                                            <input type="hidden" name="id" value="<?php echo $row['ID'];?>">
                                            <input type="hidden" name="date" value="<?php echo $row['Date'];?>">
                                            <input type="hidden" name="detail" value="<?php echo $row['Detail'];?>">

                                            <div class="flex justify-center pt-6">    
                                                <button type="submit" class="btn btn-wide btn-error" name="delete">ลบข้อมูล</button>
                                            </div>
                                        </form>
                                    </div>
                                </dialog>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>

    <script>
        new DataTable('#myTable', {
            order: [[0, 'desc']],
            responsive: true,
            columnDefs: [
                {className: 'centered', targets: [0, 3, 4, 5]},
            ]
        });
    </script>

    <?php
        if(isset($_SESSION['success']))
        {
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            ";
        }
        else if(isset($_SESSION['error']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Failed!',
                    showConfirmButton: false,
                    timer: 1500
                })
                </script>
            ";
        }
        unset($_SESSION['success']);
        unset($_SESSION['error']);
    ?>
</body>
</html>