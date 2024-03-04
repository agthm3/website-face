<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />

    <title>Smart Attendance</title>
    <style>
        .sidebar-logo {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        img {
            height: 1rem;
            /* Atur sesuai ukuran teks di sidebar */
            width: auto;
            margin-right: 0.5rem;
        }

        .sidebar-logo span {
            font-size: 1rem;
            /* Ukuran font teks di sidebar */
            font-weight: bold;
        }

        /* Sesuaikan ukuran logo saat ukuran layar berubah */
        @media (min-width: 992px) {
            img {
                height: 3rem;
            }

            .sidebar-logo span {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">
            <aside class="sidebar">
                <a href="#" class="sidebar-logo">

                    <div class="d-flex justify-content-start align-items-center">
                        <span>Smart Attendance</span>
                    </div>



                    <button id="toggle-navbar" onclick="toggleNavbar()">
                        <img src="./assets/img/global/navbar-times.svg" alt="" />
                    </button>
                </a>
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-end">
                        <!-- Menggunakan Flexbox untuk mendorong konten ke kanan -->
                        <img src="{{ asset('assets/img/unhas.png') }}" alt="Logo" class="align-self-center">
                    </div>
                    <div class="col-lg-6 d-flex justify-content-start">
                        <!-- Menggunakan Flexbox untuk mendorong konten ke kiri -->
                        <img src="{{ asset('assets/img/Logo.jpg') }}" alt="Logo" class="align-self-center">
                    </div>
                </div>

                <h5 class="sidebar-title"> Dashboard</h5>

                <a href="{{ route('home.index') }}" class="sidebar-item active" onclick="toggleActive(this)">
                    <!-- <img src="./assets/img/global/grid.svg" alt=""> -->

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 14H14V21H21V14Z" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M10 14H3V21H10V14Z" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M21 3H14V10H21V3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M10 3H3V10H10V3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                    <span>Home</span>
                </a>
                <a href="{{ route('rekap.index') }}" class="sidebar-item active" onclick="toggleActive(this)">
                    <!-- <img src="./assets/img/global/grid.svg" alt=""> -->

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 14H14V21H21V14Z" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M10 14H3V21H10V14Z" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M21 3H14V10H21V3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M10 3H3V10H10V3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                    <span>Rekap Absensi</span>
                </a>

                <div class="dropdown">
                    <a class="sidebar-item active btn btn-secondary dropdown-toggle" onclick="toggleActive(this)"
                        type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="./assets/img/global/grid.svg" alt=""> -->

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 14H14V21H21V14Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 14H3V21H10V14Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M21 3H14V10H21V3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 3H3V10H10V3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>Video Pembelajaran VR </span>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('video.otot') }}">Sistem Otot & Rangka</a></li>
                        <li><a class="dropdown-item" href="{{ route('video.pencernaan') }}">Sistem Pencernaan</a></li>
                        <li><a class="dropdown-item" href="{{ route('video.pernapasan') }}">Sistem Pernapasan</a></li>
                        <li><a class="dropdown-item" href="{{ route('video.eksresi') }}">Sistem Ekstraksi</a></li>
                    </ul>
                </div>


            </aside>
        </div>

        <div class="col-12 col-xl-9">
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <div class="d-flex justify-content-start align-items-center">
                        <button id="toggle-navbar" onclick="toggleNavbar()">
                            <img src="./assets/img/global/burger.svg" class="mb-2" alt="" />
                        </button>
                        <h2 class="nav-title">Dashboard</h2>
                    </div>
                    <button class="btn-notif d-block d-md-none">
                        <img src="./assets/img/global/bell.svg" alt="" />
                    </button>
                </div>

                <div class="d-flex justify-content-between align-items-center nav-input-container">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger d-none d-md-block">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
        const navbar = document.querySelector(".col-navbar");
        const cover = document.querySelector(".screen-cover");

        const sidebar_items = document.querySelectorAll(".sidebar-item");

        function toggleNavbar() {
            navbar.classList.toggle("d-none");
            cover.classList.toggle("d-none");
        }

        function toggleActive(e) {
            sidebar_items.forEach(function(v, k) {
                v.classList.remove("active");
            });
            e.closest(".sidebar-item").classList.add("active");
        }
    </script>


</body>

</html>
