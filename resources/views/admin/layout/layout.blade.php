<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Toast -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
</head>

<body style="background:#f1f5f9;overflow-x:hidden;">

    <!-- Sidebar -->
    <div id="sidebar"
        style="width:250px;height:100vh;position:fixed;right:0;top:0;background:linear-gradient(180deg,#0f172a,#1e293b);padding:20px;color:#fff;transition:0.3s;z-index:1000;margin-right: 0; transform: translateX(100%);">
        <h4 class="mb-4"><i class="fa fa-book"></i> المكتبة</h4>

        <a href="{{ route('admin.dashboard') }}" class="d-block mb-2 text-decoration-none"
            style="color:#cbd5e1;padding:10px;border-radius:10px;">
            <i class="fa fa-home me-2"></i> الرئيسية
        </a>

        <a href="{{ route('admin.books') }}" class="d-block mb-2 text-decoration-none"
            style="color:#cbd5e1;padding:10px;border-radius:10px;">
            <i class="fa fa-book-open me-2"></i> الكتب
        </a>

        <a href="{{ route('admin.admins') }}" class="d-block mb-2 text-decoration-none"
            style="color:#cbd5e1;padding:10px;border-radius:10px;">
            <i class="fa fa-user-shield me-2"></i> الأدمن
        </a>


        <a href="{{ route('admin.users') }}" class="d-block text-decoration-none"
            style="color:#cbd5e1;padding:10px;border-radius:10px;">
            <i class="fa fa-users me-2"></i> المستخدمين
        </a>
        <hr>
        <a href="{{ route('client.index') }}" class="d-block mb-2 text-decoration-none text-white">
            <i class="fa-solid fa-home"></i> الرئيسية
        </a>

    </div>

    @yield('content')

    <!-- JS -->
    <script>
        let isOpen = false;

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');

            if (isOpen) {
                sidebar.style.transform = 'translateX(100%)';
                content.style.marginRight = '0';
            } else {
                sidebar.style.transform = 'translateX(0)';
                content.style.marginRight = '260px';
            }

            isOpen = !isOpen;
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Then load Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('toast')
</body>

</html>
