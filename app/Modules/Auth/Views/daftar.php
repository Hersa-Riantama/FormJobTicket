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
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" autofocus />
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_induk" class="form-label">Nomor Induk Karyawan</label>
                                <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" placeholder="Contoh : P1010" />
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Corporate</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Contoh : nama@erlangga.co.id" />
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="no_tlp" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukkan No. Telepon" />
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jk" id="jk">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="level_user" class="form-label">Level User</label>
                                <select class="form-select" name="level_user" id="level_user">
                                    <option value="" selected disabled>Pilih Level User</option>
                                    <option value="1">Admin Sistem</option>
                                    <option value="2">Tim Multimedia</option>
                                    <option value="3">Editor</option>
                                    <option value="4">Koord. Editor</option>
                                    <option value="5">Manager Platform</option>
                                </select>
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required />
                                    <label class="form-check-label" for="terms-conditions">Saya setuju dengan <a href="javascript:void(0);">kebijakan privasi & ketentuan</a></label>
                                </div>
                                <div class="error-message text-danger"></div>
                            </div>
                            <button class="btn btn-primary d-grid w-100" id="mendaftar">Mendaftar</button>
                        </form>
                        <!-- / Form -->

                        <p class="text-center">
                            <span>Sudah punya akun?</span>
                            <a href="http://localhost:8080/login">
                                <span>Login</span>
                            </a>
                        </p>
                        <p class="text-center">
                            <a href="http://localhost:8080/">
                                <span>Beranda</span>
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
        <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column text-center">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
    document.getElementById("nama").oninput = function(event) {
        event.target.setCustomValidity("");
    };
    document.getElementById("nama").oninvalid = function(event) {
        if (event.target.value.length < 3) {
            event.target.setCustomValidity("Nama Wajib Minimal 3 Huruf!");
            toastr.error("Nama harus lebih dari 3 karakter!", "Error");
        } else {
            event.target.setCustomValidity("Nomor Induk Wajib Diisi!");
        }
    };

    document.getElementById("nomor_induk").oninput = function(event) {
        event.target.setCustomValidity("");
    };
    document.getElementById("nomor_induk").oninvalid = function(event) {
        event.target.setCustomValidity("Nomor Induk Wajib Diisi!");
    };

    document.getElementById("email").oninput = function(event) {
        event.target.setCustomValidity("");
    };
    document.getElementById("email").oninvalid = function(event) {
        event.target.setCustomValidity("Email Wajib Diisi!");
    };

    document.getElementById("no_tlp").oninput = function(event) {
        event.target.setCustomValidity("");
    };
    document.getElementById("no_tlp").oninvalid = function(event) {
        event.target.setCustomValidity("No Tlp Wajib Diisi!");
    };

    document.getElementById("jk").oninput = function(event) {
        event.target.setCustomValidity("");
    };
    document.getElementById("jk").oninvalid = function(event) {
        event.target.setCustomValidity("Pilih Jenis Kelamin Anda!");
    };

    document.getElementById("level_user").oninput = function(event) {
        event.target.setCustomValidity("");
    };
    document.getElementById("level_user").oninvalid = function(event) {
        event.target.setCustomValidity("Pilih Level User Anda!");
    };

    document.getElementById("password").oninput = function(event) {
        event.target.setCustomValidity("");
    };
    document.getElementById("password").oninvalid = function(event) {
        event.target.setCustomValidity("Password Wajib Diisi!");
    };

    document.getElementById("terms-conditions").oninput = function(event) {
        event.target.setCustomValidity("");
    };
    document.getElementById("terms-conditions").oninvalid = function(event) {
        event.target.setCustomValidity("Silakan klik setujui");
    };

    $(document).ready(function() {
        $('#formAuthentication').submit(function(event) {
            event.preventDefault();

            // Clear previous error messages
            $('.error-message').text('').hide();

            // Assume form is valid until proven otherwise
            let isValid = true;

            // Check if all required fields are filled out
            $('#formAuthentication input, #formAuthentication select').each(function() {
                if ($(this).prop('required') && !$(this).val()) {
                    const errorMessageContainer = $(this).closest('.mb-3').find('.error-message');
                    errorMessageContainer.text('Field ini wajib diisi').show(); // Show error message for empty required fields
                    isValid = false;
                }
            });

            // Check if the checkbox is checked
            if (!$('#terms-conditions').is(':checked')) {
                // Show error message for the checkbox
                $('#terms-conditions').closest('.mb-3').find('.error-message').text('Silakan klik setujui').show();
                return; // Stop form submission
            }

            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('daftar'); ?>',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log(response); // Log the response
                    $('.error-message').text('').hide(); // Clear previous messages
                    if (response.Status === 'success') {
                        alert(response.Pesan);
                        window.location.href = '<?php echo base_url('login'); ?>';
                    } else {
                        // toastr.error(response.Pesan, "Error");
                        for (const [field, message] of Object.entries(response.Errors)) {
                            const errorMessageContainer = $('#' + field).closest('.mb-3').find('.error-message');
                            if (errorMessageContainer.length) {
                                errorMessageContainer.text(message).show(); // Show the error message
                            }
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Log the raw response
                    console.log(error);
                }
            });
        });
    });
</script>

</html>