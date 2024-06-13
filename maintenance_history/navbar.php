<?php
    @$ID = $_SESSION['ID'];

    if(!isset($_SESSION['ID'])) {
        $_SESSION['error-path'] = "error";
        echo "<script type = text/javascript>";
        echo "window.history.back();";
        echo "</script>";
    }
    
    $sql = "SELECT * FROM `user` WHERE `ID` = '$ID'";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result))
    {
        $name = $row['Username'];
        $pass = $row['Password'];
        $status = $row['Status'];
    }
?>

<div class="navbar bg-base-300">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a>งานซ่อมบำรุง</a>
                    <ul class="p-2">
                        <li><a href="water">น้ำ</a></li>
                        <li><a href="air_conditioner">ปรับอากาศ</a></li>
                        <li><a href="water_treatment">บำบัดน้ำเสีย</a></li>
                        <li><a href="elevator">ลิฟท์</a></li>
                        <li><a href="water_injection_pump">ปั๊มฉีดน้ำ</a></li>
                        <li><a href="air_pump">ปั๊มลม</a></li>
                        <li><a href="electricity">ไฟฟ้า</a></li>
                        <li><a href="ice_maker">เครื่องทำน้ำแข็ง</a></li>
                        <li><a href="artesian_well">บ่อบาดาล</a></li>
                        <li><a href="sound_system">เครื่องเสียงห้องประชุม</a></li>
                        <li><a href="boiler">หม้อไอน้ำ</a></li>
                        <li><a href="telephone">โทรศัพท์</a></li>
                        <li><a href="fire_alarm">ระบบแจ้งเหตุเพลิงไหม้</a></li>
                        <li><a href="television">โทรทัศน์</a></li>
                        <li><a href="gas">สถานีแก๊ส</a></li>
                        <li><a href="retort">รีทอร์ท</a></li>
                        <li><a href="safety_officer">เจ้าหน้าที่ความปลอดภัย</a></li>
                        <li><a href="light_sign">ป้ายไฟหน้าตึกวิเศษ</a></li>
                        <li><a href="water_heater">เครื่องทำน้ำร้อน</a></li>
                        <li><a href="freezer">ตู้แช่</a></li>
                        <li><a href="boiling_pot">หม้อต้มโรงผลิตอาหาร</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <a class="btn btn-ghost text-xl" href="home"><?php echo $name; ?></a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li <?php if(@$status != 2) { ?> hidden <?php } ?>><a href="manage_user">จัดการผู้ใช้</a></li>
            <li>
                <details>
                    <summary>งานซ่อมบำรุง&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</summary>
                    <ul class="p-2 z-10 bg-base-300">
                        <li><a href="water">น้ำ</a></li>
                        <li><a href="air_conditioner">ปรับอากาศ</a></li>
                        <li><a href="water_treatment">บำบัดน้ำเสีย</a></li>
                        <li><a href="elevator">ลิฟท์</a></li>
                        <li><a href="water_injection_pump">ปั๊มฉีดน้ำ</a></li>
                        <li><a href="air_pump">ปั๊มลม</a></li>
                        <li><a href="electricity">ไฟฟ้า</a></li>
                        <li><a href="ice_maker">เครื่องทำน้ำแข็ง</a></li>
                        <li><a href="artesian_well">บ่อบาดาล</a></li>
                        <li><a href="sound_system">เครื่องเสียงห้องประชุม</a></li>
                        <li><a href="boiler">หม้อไอน้ำ</a></li>
                        <li><a href="telephone">โทรศัพท์</a></li>
                        <li><a href="fire_alarm">ระบบแจ้งเหตุเพลิงไหม้</a></li>
                        <li><a href="television">โทรทัศน์</a></li>
                        <li><a href="gas">สถานีแก๊ส</a></li>
                        <li><a href="retort">รีทอร์ท</a></li>
                        <li><a href="safety_officer">เจ้าหน้าที่ความปลอดภัย</a></li>
                        <li><a href="light_sign">ป้ายไฟหน้าตึกวิเศษ</a></li>
                        <li><a href="water_heater">เครื่องทำน้ำร้อน</a></li>
                        <li><a href="freezer">ตู้แช่</a></li>
                        <li><a href="boiling_pot">หม้อต้มโรงผลิตอาหาร</a></li>
                    </ul>
                </details>
            </li>
            <li><button onclick="edit_profile<?php echo $ID; ?>.showModal()">แก้ไขโปรไฟล์</button></li>
        </ul>
    </div>
    <div class="navbar-end">
        <a class="btn btn-outline btn-sm" href="signout">ออกจากระบบ</a>
    </div>
</div>

<dialog id="edit_profile<?php echo $ID; ?>" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <p class="font-bold text-lg" align="center">แก้ไขโปรไฟล์</p>
        <form name="edit" id="edit" method="post" enctype="multipart/form-data" action="user_db">
            <input type="hidden" name="id" value="<?php echo $ID;?> ">
            <label class="input input-bordered flex items-center my-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70 mr-2"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" /></svg>
                <input type="text" class="grow" name="username" placeholder="Username" value="<?php echo $name; ?>" />
            </label>
            <label class="input input-bordered flex items-center my-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70 mr-2"><path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" /></svg>
                <input type="password" class="grow" name="password" placeholder="Password" value="<?php echo $pass; ?>" />
            </label>
            <div class="flex justify-center pt-4">    
                <button type="submit" class="btn btn-wide btn-warning text-base" name="edit">บันทึก</button>
            </div>
        </form>
    </div>
</dialog>