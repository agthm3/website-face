<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/index.css" />

    <title>Smart Attendance</title>

</head>

<body>
    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">


        <div class="col-lg-12">
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <button class="btn-notif d-block d-md-none">
                        <img src="./assets/img/global/bell.svg" alt="" />
                    </button>
                </div>
            </div>

            <div class="content">
                <div class="row mt-5" style="justify-content: center">

                    <div class="row" style="justify-content: center">
                        <div class="col-lg-6">
                            <div class="document-card">
                                <div class="document-item row" style="justify-content:center">
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <!-- Menggunakan kelas img-fluid untuk membuat gambar responsif -->
                                        <img src="{{ asset('assets/img/unhas.png') }}" class="img-fluid"
                                            alt="Logo UNHAS">
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <!-- Menggunakan kelas img-fluid untuk membuat gambar responsif -->
                                        <img src="{{ asset('assets/img/Logo.jpg') }}" class="img-fluid"
                                            alt="Logo Perusahaan">
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <!-- Email input -->
                                        <div class="form-outline mb-1 mt-3">
                                            <input type="text" name="name" id="form2Example1"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example1">Name</label>
                                        </div>
                                        <div class="form-outline mb-1">
                                            <input type="email" name="email" id="form2Example1"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example1">Email address</label>
                                        </div>
                                        <div class="form-outline mb-1">
                                            <input type="text" name="label" id="form2Example1"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example1">Face Label </label>
                                        </div>
                                        <div class="form-outline mb-1">
                                            <input type="text" name="uuid" id="form2Example1"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example1">UUID</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-1">
                                            <input type="password" name="password" id="form2Example2"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example2">Password</label>
                                        </div>
                                        <div class="form-outline mb-1">
                                            <input type="password" name="password_confirmation" id="form2Example2"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example2">Konfirmasi Password</label>
                                        </div>


                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Sign In
                                        </button>

                                        <!-- Register buttons -->
                                        <div class="text-center">
                                            <p>
                                                Sudah punya akun?
                                                <a href="{{ route('login') }}">Login</a>
                                            </p>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
