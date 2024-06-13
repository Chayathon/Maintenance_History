<!DOCTYPE html>
<html lang="en" class="bg-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Maintenance History</title>
</head>
<body>
    <?php SESSION_START(); ?>
    <div class="flex justify-center py-56">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="font-bold text-2xl text-center">งานซ่อมบำรุง แผนกงานระบบ</h2>
                <form action="signin" method="post">
                    <label class="input input-bordered flex items-center my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70 mr-2"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" /></svg>
                        <input type="text" class="grow" name="username" placeholder="Username" required />
                    </label>
                    <label class="input input-bordered flex items-center my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70 mr-2"><path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" /></svg>
                        <input type="password" class="grow" name="password" placeholder="Password" required />
                    </label>
                    <button type="submit" class="btn btn-block btn-accent text-base" name="signin">เข้าสู่ระบบ</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>

    <?php
        if(isset($_SESSION['logout']))
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
                    text: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        else if(isset($_SESSION['error-path']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Failed!',
                    text: 'กรุณาเข้าสู่ระบบ!',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        unset($_SESSION['logout']);
        unset($_SESSION['error']);
        unset($_SESSION['error-path']);
    ?>
</body>
</html>