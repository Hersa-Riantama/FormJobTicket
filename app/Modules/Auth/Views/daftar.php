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

    <title>Daftar</title>

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

                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="javascript:void(0);" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bold text-capitalize">Daftar</span>
                            </a>
                        </div>
                        <!-- Form -->
                        <form id="formAuthentication" class="mb-3" action="javascript:void(0);" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama"
                                    name="nama"
                                    placeholder="Masukkan Nama"
                                    autofocus />
                            </div>

                            <div class="mb-3">
                                <label for="nomor_induk" class="form-label">Nomor Induk</label>
                                <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" placeholder="Masukkan Nomor Induk" />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" />
                            </div>

                            <div class="mb-3">
                                <label for="no_tlp" class="form-label">No.Telepon</label>
                                <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukkan No.Telepon" />
                            </div>

                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Jelamin</label>
                                <select class="form-select" name="jk" aria-label="Default select example"required>
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="level_user" class="form-label">Level User</label>
                                <select class="form-select"  name= "level_user" aria-label="Default select example" required>
                                    <option selected disabled>Pilih Level User</option>
                                    <option value="1">Admin Sistem</option>
                                    <option value="2">Admin Multimedia</option>
                                    <option value="3">Editor</option>
                                    <option value="4">Koord. Editor</option>
                                    <option value="5">Manager Platform</option>
                                </select>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
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
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                    <label class="form-check-label" for="terms-conditions">
                                        Saya setuju dengan
                                        <a href="javascript:void(0);">kebijakan privasi & ketentuan</a>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100" id="mendaftar">Mendaftar</button>
                        </form>
                        <!-- / Form -->

                        <p class="text-center">
                            <span>Sudah punya akun?</span>
                            <a href="http://localhost:8080/api/login">
                                <span>Login</span>
                            </a>
                        </p>

                    </div>
                </div>
                <!-- Register Card -->

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
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formAuthentication');
    const button = document.getElementById('mendaftar');

    button.addEventListener('click', function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();

        xhr.open('POST', '<?php echo base_url('daftar'); ?>', true);
        xhr.send(formData);

        xhr.onload = function () {
            const response = JSON.parse(xhr.responseText);
            if (xhr.status === 201) {
                alert(response.Pesan); // Menampilkan pesan sukses
                window.location.href = '<?= base_url('login'); ?>';
            } else if (xhr.status === 400) {
                // Menangani kesalahan validasi
                const errors = response.Pesan; // Memastikan ini berisi kesalahan
                for (const key in errors) {
                    const errorMessage = errors[key];
                    // Menampilkan pesan kesalahan di dekat input yang sesuai
                    const errorSpan = document.getElementById(key + 'Error');
                    if (errorSpan) {
                        errorSpan.textContent = errorMessage;
                    }
                }
            } else {
                console.error('Error:', xhr.statusText);
            }
        };
    });
});
</script>
</html>