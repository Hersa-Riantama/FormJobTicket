<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login</title>
    <style>
        .toast {
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 10px;
            opacity: 1; /* Set opacity to 1 to ensure visibility */
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.8); /* Ensure background is visible */
            transition: opacity 0.5s ease; /* Smooth transition */
        }
        .toast-success {
            background-color: #4CAF50;
        }
        .toast-error {
            background-color: #f44336;
        }
    </style>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">

                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="javascript:void(0);" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bold text-capitalize">Login</span>
                            </a>
                        </div>

                        <!-- Form -->
                        <form id="formAuthentication" class="mb-3" action="javascript:void(0);" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Masukkan Email"
                                    autofocus />
                                    <span id="emailError" style="color:red; display:none;">Email wajib diisi</span>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <span id="passwordError" style="color:red; display:none;">Password wajib diisi</span>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit" onclick="validateLogin()">Masuk</button>
                            </div>
                        </form>
                        <!-- / Form -->

                        <p class="text-center">
                            <span>Belum punya akun?</span>
                            <a href="http://localhost:8080/daftar">
                                <span>Daftar</span>
                            </a>
                        </p>
                        <p class="text-center">
                            <a href="http://localhost:8080/">
                                <span>Beranda</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://erlanggaonline.com/" target="_blank" class="footer-link fw-medium">ErlanggaOnline</a>
            </div>
        </div>
    </footer>
    <!-- / Footer -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function validateLogin() {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            let isValid = true;

            // Reset pesan error
            document.getElementById('emailError').style.display = 'none';
            document.getElementById('passwordError').style.display = 'none';

            if (!email) {
                document.getElementById('emailError').style.display = 'inline';
                isValid = false;
            }
            if (!password) {
                document.getElementById('passwordError').style.display = 'inline';
                isValid = false;
            }

            if (isValid) {
                loginUser (email, password);
            }
        }

        function loginUser (email, password) {
            $.ajax({
                url: 'http://localhost:8080/login', // Ganti dengan URL login backend
                method: 'POST',
                dataType: 'json',
                data: { 
                    email: email, 
                    password: password 
                },
                success: function (response) {
                    console.log("Server response:", response);
                    if (response.Status === 'success') {
                        toastr.success('Login berhasil');
                        window.location.href = '/dashboard'; // Redirect jika login berhasil
                    } else {
                        toastr.error(response.Pesan);
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = "Terjadi kesalahan saat login";
                    if (xhr.responseJSON && xhr.responseJSON.Pesan) {
                        errorMessage = xhr.responseJSON.Pesan; // Mengambil pesan dari respons JSON
                    }
                    toastr.error(errorMessage);
                }
            });
        }
    </script>
</body>
</html>