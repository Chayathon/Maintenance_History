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
    <title>Maintenance History</title>
</head>
<body>
    <?php
        SESSION_START();
        include('conn.php');
        include 'navbar.php';
    ?>

    <div class="flex justify-center"><p class="pt-4 pb-2 font-bold text-3xl">งานซ่อมบำรุง</p></div>
    <div class="grid grid-cols-4 gap-4 p-4">
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='water'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">ระบบน้ำ</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='air_conditioner'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">ระบบปรับอากาศ</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='water_treatment'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">ระบบบำบัดน้ำเสีย</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='elevator'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">ระบบลิฟท์</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='water_injection_pump'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">ระบบปั๊มฉีดน้ำ</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='air_pump'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">ระบบปั๊มลม</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='electricity'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">ระบบไฟฟ้า</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='ice_maker'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">เครื่องทำน้ำแข็ง</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='artesian_well'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">บ่อบาดาล</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='sound_system'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">เครื่องเสียงห้องประชุม</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='boiler'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">หม้อไอน้ำ</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='telephone'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">โทรศัพท์</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='fire_alarm'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">ระบบแจ้งเหตุเพลิงไหม้</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='television'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">โทรทัศน์</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='gas'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">สถานีแก๊ส</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='retort'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">รีทอร์ท</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='safety_officer'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">เจ้าหน้าที่ความปลอดภัย</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='light_sign'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">ป้ายไฟหน้าตึกวิเศษ</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='water_heater'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">เครื่องทำน้ำร้อน</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='freezer'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">ตู้แช่</h2>
            </div>
        </div>
        
        <div class="card w-full border-2 border-slate-400 shadow-xl cursor-pointer hover:border-emerald-400 hover:ring-2 hover:ring-emerald-200 hover:scale-105 transition duration-300" onclick="window.location='boiling_pot'">
            <div class="card-body items-center text-center">
                <h2 class="text-3xl font-bold ">หม้อต้มโรงผลิตอาหาร</h2>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>

    <script>
        new DataTable('#myTable', {
            order: [[0, 'desc']]
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
                        text: 'เข้าสู่ระบบสำเร็จ',
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