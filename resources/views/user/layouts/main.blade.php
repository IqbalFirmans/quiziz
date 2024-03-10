<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png') }}">
    <title>Quiziz | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Link Izitoast Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    @yield('head')
    <style>
        :root {
            --bs-blue: #63B3ED;
            --bs-indigo: #596CFF;
            --bs-purple: #6f42c1;
            --bs-pink: #d63384;
            --bs-red: #F56565;
            --bs-orange: #fd7e14;
            --bs-yellow: #FBD38D;
            --bs-green: #81E6D9;
            --bs-teal: #20c997;
            --bs-cyan: #0dcaf0;
            --bs-white: #fff;
            --bs-gray: #6c757d;
            --bs-gray-dark: #343a40;
            --bs-gray-100: #f8f9fa;
            --bs-gray-200: #f0f2f5;
            --bs-gray-300: #dee2e6;
            --bs-gray-400: #ced4da;
            --bs-gray-500: #adb5bd;
            --bs-gray-600: #6c757d;
            --bs-gray-700: #495057;
            --bs-gray-800: #343a40;
            --bs-gray-900: #212529;
            --bs-primary: #e91e63;
            --bs-secondary: #7b809a;
            --bs-success: #4CAF50;
            --bs-info: #1A73E8;
            --bs-warning: #fb8c00;
            --bs-danger: #F44335;
            --bs-light: #f0f2f5;
            --bs-dark: #344767;
            --bs-white: #fff;
            --bs-dark-blue: #1A237E;
            --bs-primary-rgb: 233, 30, 99;
            --bs-secondary-rgb: , 128, 154;
            --bs-success-rgb: 76, 175, 80;
            --bs-info-rgb: 26, 115, 232;
            --bs-warning-rgb: 251, 140, 0;
            --bs-danger-rgb: 244, 67, 53;
            --bs-light-rgb: 240, 242, 245;
            --bs-dark-rgb: 52, 71, 103;
            --bs-white-rgb: 255, 255, 255;
            --bs-dark-blue-rgb: 26, 35, 126;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-body-color-rgb: , 128, 154;
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-font-sans-serif: "Roboto", Helvetica, Arial, sans-serif;
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-font-size: 1rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #7b809a;
            --bs-body-bg: #fff;
            --bs-border-width: 1px;
            --bs-border-style: solid;
            --bs-border-color: #dee2e6;
            --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
            --bs-border-radius: 0.375rem;
            --bs-border-radius-sm: 0.125rem;
            --bs-border-radius-lg: 0.5rem;
            --bs-border-radius-xl: 0.75rem;
            --bs-border-radius-2xl: 1rem;
            --bs-border-radius-pill: 50rem;
            --bs-link-color: #e91e63;
            --bs-link-hover-color: #e91e63;
            --bs-code-color: #d63384;
            --bs-highlight-bg: #fcf8e3;
        }

        body {
            background-color: #fbfbfb;
        }

        .dropdown-driver {
            border: 1px solid black;
            margin: 10px;
        }

        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 58px 0 0;
            /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 240px;
            z-index: 600;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }

        .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }
    </style>
    @stack('css')
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class=" mt-3">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="/user/home"
                        class="list-group-item list-group-item-action my-1 py-2 ripple {{ request()->is('user/home') ? 'bg-primary rounded text-white' : 'bg-light' }}"
                        aria-current="true">
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Home</span>
                    </a>
                    <a href="/user/share"
                        class="list-group-item list-group-item-action my-1 py-2 ripple {{ request()->is('user/share') ? 'bg-primary rounded text-white' : 'bg-light' }}"
                        aria-current="true">
                        <i class="fa-solid fa-share fa-fw me-3"></i><span>Share</span>
                    </a>
                    @auth
                        @if (Auth::user()->role == 'admin')
                            <a href="/admin/dashboard"
                                class="list-group-item list-group-item-action my-1 py-2 ripple {{ request()->is('admin/dashboard') ? 'bg-primary rounded text-white' : 'bg-light' }}"
                                aria-current="true">
                                <i class="fa-solid fa-user-tie fa-fw me-3"></i><span>Dashboard Admin</span>
                            </a>
                        @else
                            <a href="/user/profile"
                                class="list-group-item list-group-item-action my-1 py-2 ripple {{ request()->is('user/profile') ? 'bg-primary rounded text-white' : 'bg-light' }}"
                                aria-current="true">
                                <i class="fa-solid fa-user fa-fw me-3"></i><span>Profile</span>
                            </a>
                            <a href="/user/quiziz"
                                class="list-group-item list-group-item-action my-1 py-2 ripple {{ request()->is('user/quiziz') ? 'bg-primary rounded text-white' : 'bg-light' }}"
                                aria-current="true">
                                <i class="fa-solid fa-q fa-fw me-3"></i></i><span>Quiz</span>
                            </a>
                        @endif
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="list-group-item bg-light list-group-item-action my-1 py-2 ripple"
                                aria-current="true">
                                <i class="fa-solid fa-right-to-bracket fa-fw me-3"></i><span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="/auth/login" class="list-group-item bg-light list-group-item-action my-1 py-2 ripple"
                            aria-current="true">
                            <i class="fa-solid fa-right-to-bracket fa-fw me-3"></i><span>Login</span>
                        </a>
                    @endauth
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top border border-md">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" style="margin-right: 10px;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand d-flex gap-2" href="#">
                    <img src="{{ asset('admin/assets/img/favicon.png') }}" width="30" height="30" alt="">
                    <h3 class="text-dark">Quiziz</h3>
                </a>
                <!-- Search form -->

            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            @yield('content')
        </div>
    </main>
    <!--Main layout-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        @if (session('success'))
            iziToast.success({
                title: 'Sukses!',
                message: "{{ session('success') }}",
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
    </script>
    @stack('js')
</body>

</html>
