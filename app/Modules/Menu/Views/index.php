    <?= $this->extend('template/admin_template'); ?>
    <?= $this->section('content'); ?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span>Dashboard</h4>
            <!-- Row 1 -->
            <div class="row">

                <!-- Column 1 -->
                <div class="col-lg-auto col-md-auto col-auto mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <span class="fw-bold text-center fs-4 d-block mb-3">Jumlah User</span>
                            <h3 class="card-title text-center fs-1 my-3"><?= $user; ?></h3>
                            <a class="smal-box-footer p-3 mx-5" href="http://localhost:8080/user">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- / Column 1 -->

                <!-- Column 2 -->
                <div class="col-lg-auto col-md-auto col-auto mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <span class="fw-bold text-center fs-4 d-block mb-3">Jumlah Kategori</span>
                            <h3 class="card-title text-center fs-1 my-3"><?= $kategori; ?></h3>
                            <a class="smal-box-footer p-3 mx-5" href="http://localhost:8080/kategori">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- / Column 2 -->

                <!-- Column 3 -->
                <div class="col-lg-auto col-md-auto col-auto mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <span class="fw-bold text-center fs-4 d-block mb-3">Jumlah Buku</span>
                            <h3 class="card-title text-center fs-1 my-3"><?= $buku; ?></h3>
                            <a class="smal-box-footer p-3 mx-5" href="http://localhost:8080/buku">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- / Column 3 -->

                <!-- Column 4 -->
                <div class="col-lg-auto col-md-auto col-auto mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <span class="fw-bold text-center fs-4 d-block mb-3">Jumlah Tiket</span>
                            <h3 class="card-title text-center fs-1 my-3"><?= $form; ?></h3>
                            <a class="smal-box-footer p-3 mx-5" href="http://localhost:8080/listform">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- / Column 4 -->

            </div>
            <!-- / Row 1 -->

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

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <?= $this->endSection(); ?>