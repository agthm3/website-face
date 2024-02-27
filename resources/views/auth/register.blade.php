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

                <h5 class="sidebar-title">Dashboard</h5>
            </aside>
        </div>

        <div class="col-12 col-xl-9">
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <button class="btn-notif d-block d-md-none">
                        <img src="./assets/img/global/bell.svg" alt="" />
                    </button>
                </div>
            </div>

            <div class="content">
                <div class="row mt-5">
                    <h3>Register</h3>
                    <div class="document-card">
                        <div class="document-item row">
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
                                <div class="form-outline mb-4">
                                    <input type="text" name="name" id="form2Example1" class="form-control" />
                                    <label class="form-label" for="form2Example1">Name</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="form2Example1" class="form-control" />
                                    <label class="form-label" for="form2Example1">Email address</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" name="label" id="form2Example1" class="form-control" />
                                    <label class="form-label" for="form2Example1">Face Label </label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" name="uuid" id="form2Example1" class="form-control" />
                                    <label class="form-label" for="form2Example1">UUID</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form2Example2" class="form-control" />
                                    <label class="form-label" for="form2Example2">Password</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" name="password_confirmation" id="form2Example2"
                                        class="form-control" />
                                    <label class="form-label" for="form2Example2">Konfirmasi Password</label>
                                </div>


                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Register
                                </button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>
                                        Not a member?
                                        <a href="#!">Register</a>
                                    </p>
                                    <p>or sign up with:</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>
                            </form>
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
