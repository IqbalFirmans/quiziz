<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png') }}">
    <title>
        @yield('title')
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href=" {{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
    <!-- Link Izitoast Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
    <main class="main-content  mt-0">
        <section>
            @yield('content')
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        @if (session('success'))
            iziToast.success({
                title: 'Sukses!',
                message: "{{ session('success') }}",
                position: 'topRight'
            });
        @endif
        @if (session('status'))
            iziToast.success({
                title: 'Sukses!',
                message: "{{ session('status') }}",
                position: 'topRight'
            });
        @endif
        @if ($errors->any())
            iziToast.error({
                title: 'Erorr!',
                message: "{{ $errors->first() }}",
                position: 'topRight'
            });
        @endif

        function eye()
        {
            let eye = document.getElementById("eye");
            eye.style.display = "none";
            let eye_slash = document.getElementById("eye_slash");
            eye_slash.style.display = "block";
            let password = document.getElementById("password");
            password.type = "password";
        }
        function eye_slash()
        {
            let eye = document.getElementById("eye");
            eye.style.display = "block";
            let eye_slash = document.getElementById("eye_slash");
            eye_slash.style.display = "none";
            let password = document.getElementById("password");
            password.type = "text";
        }

        // new password function
        function new_eye()
        {
            let eye = document.getElementById("new_eye");
            eye.style.display = "none";
            let eye_slash = document.getElementById("new_eye_slash");
            eye_slash.style.display = "block";
            let new_password = document.getElementById("new_password");
            new_password.type = "password";
        }
        function new_eye_slash()
        {
            let eye = document.getElementById("new_eye");
            eye.style.display = "block";
            let eye_slash = document.getElementById("new_eye_slash");
            eye_slash.style.display = "none";
            let new_password = document.getElementById("new_password");
            new_password.type = "text";
        }


    </script>
</body>

</html>
