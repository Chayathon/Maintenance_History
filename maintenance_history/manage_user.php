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
    <title>Manage User</title>
</head>
<body>
    <?php
        SESSION_START();
        include('conn.php');

        @$ID = $_SESSION['ID'];

        $sql = "SELECT * FROM `user` WHERE `ID` = '$ID'";
        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($result))
        {
            $name = $row['Username'];
            $pass = $row['Password'];
            $status = $row['Status'];
        }

        if(!isset($_SESSION['ID']) && $status != 1) {
            $_SESSION['error-path'] = "error";
            HEADER('Location: index');
        }

        if($status == 0) {
            $status_name = 'ผู้ใช้';
        } elseif($status == 1) {
            $status_name = 'ผู้ดูแลสูงสุด';
        } elseif($status == 2) {
            $status_name = 'ผู้ดูแล';
        }
    ?>

    <?php include 'navbar.php'; ?>

    <div class="md:container md:mx-auto px-2 py-4">
        <div class="card bg-base-100 drop-shadow-[0_15px_35px_rgba(0,0,0,0.25)]">
            <div class="card-body">
                <div class="flex">
                    <p class="font-bold text-xl text-center">จัดการผู้ใช้</p>
                </div>
                <div class="flex justify-end">
                    <!-- You can open the modal using ID.showModal() method -->
                    <button class="btn btn-accent" onclick="add_modal.showModal()"><i class="fas fa-plus"></i>เพิ่ม</button>
                    <dialog id="add_modal" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>

                            <form name="add" id="add" action="user_db" method="post">
                                <label class="input input-bordered flex items-center my-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70 mr-2"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" /></svg>
                                    <input type="text" class="grow" name="username" placeholder="Username" required />
                                </label>
                                <label class="input input-bordered flex items-center my-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70 mr-2"><path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" /></svg>
                                    <input type="password" class="grow" name="password" placeholder="Password" required />
                                </label>
                                <select class="select select-bordered w-full text-base" name="status" required>
                                    <option disabled selected>สถานะ</option>
                                    <option value="0">ผู้ใช้ (สามารถดูได้อย่างเดียว)</option>
                                    <option value="1">ผู้ดูแลระบบ (สามารถ เพิ่ม ลบ แก้ไข ได้)</option>
                                    <option value="2">ผู้ดูแลระบบสูงสุด (ทำได้ทุกอย่าง)</option>
                                </select>
                                <div class="flex justify-center pt-4">    
                                    <button type="submit" class="btn btn-wide btn-accent" name="add">เพิ่ม</button>
                                </div>
                            </form>
                        </div>
                    </dialog>
                </div>

                <?php
                    $sql_user = "SELECT * FROM `user`";
                    $result_user = mysqli_query($con, $sql_user);

                    while($row = mysqli_fetch_array($result_user))
                    {
                        $status = $row['Status'];
                    }


                    function status($status) {
                        if($status == 0) {
                            $status_name = 'ผู้ใช้';
                        } elseif($status == 1) {
                            $status_name = 'ผู้ดูแล';
                        } elseif($status == 2) {
                            $status_name = 'ผู้ดูแลสูงสุด';
                        }

                        return $status_name;
                    }
                ?>
                
                <div class="overflow-x-auto">
                    <table class="table row-border hover" id="myTable">
                        <thead>
                            <tr class="bg-slate-200">
                                <th>ลำดับ</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>รหัสผ่าน</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result_user as $row) { ?>
                                <tr>
                                    <td align="center"><?php echo $row['ID']; ?></td>
                                    <td align="left"><?php echo $row['Username']; ?></td>
                                    <td align="left"><?php echo $row['Password']; ?></td>
                                    <td align="left"><?php echo status($row['Status']); ?></td>
                                    <td align="center">
                                        <div class="join">
                                            <button class="btn btn-warning btn-xs join-item" onclick="edit_modal<?php echo $row['ID']; ?>.showModal()"><i class="fas fa-edit"></i>แก้ไข</button>
                                            <button class="btn btn-error btn-xs join-item" onclick="delete_modal<?php echo $row['ID']; ?>.showModal()"><i class="fas fa-trash-alt"></i>ลบ</button>
                                        </div>
                                    </td>
                                </tr>
                                    
                                <dialog id="edit_modal<?php echo $row['ID']; ?>" class="modal">
                                    <div class="modal-box">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>

                                        <form name="edit" id="edit" method="post" action="user_db">
                                            <input type="hidden" name="id" value="<?php echo $row['ID'];?>">
                                            <label class="input input-bordered flex items-center gap-2 mt-6 my-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70 mr-2"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" /></svg>
                                                <input type="text" class="grow" name="username" value="<?php echo $row['Username']; ?>" />
                                            </label>
                                            <label class="input input-bordered flex items-center gap-2 my-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70 mr-2"><path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" /></svg>
                                                <input type="text" class="grow" name="password" value="<?php echo $row['Password']; ?>" readonly />
                                            </label>
                                            <select class="select select-bordered w-full text-base" name="status">
                                                <option disabled selected>สถานะ</option>
                                                <option value="0">ผู้ใช้ (สามารถดูได้อย่างเดียว)</option>
                                                <option value="1">ผู้ดูแลระบบ (สามารถ เพิ่ม ลบ แก้ไข ได้)</option>
                                                <option value="2">ผู้ดูแลระบบสูงสุด (ทำได้ทุกอย่าง)</option>
                                            </select>

                                            <div class="flex justify-center pt-4">    
                                                <button type="submit" class="btn btn-wide btn-warning" name="edit">แก้ไข</button>
                                            </div>
                                        </form>
                                    </div>
                                </dialog>

                                <dialog id="delete_modal<?php echo $row['ID']; ?>" class="modal">
                                    <div class="modal-box">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>

                                        <form name="delete" id="delete" method="post" action="user_db">
                                            <p align="center">ยืนยันที่จะลบผู้ใช้ <u><i><?php echo $row['Username']; ?></i></u> ?</p>
                                            <input type="hidden" name="id" value="<?php echo $row['ID'];?>">

                                            <div class="flex justify-center pt-6">    
                                                <button type="submit" class="btn btn-wide btn-error" name="delete">ลบ</button>
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
        new DataTable('#myTable');
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