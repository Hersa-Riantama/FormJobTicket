<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Buku /</span> List Buku</h4>
        <div class="row justify-content-end">
            <!-- <div class="col-xl-8">
            </div> -->
            <div class="col-xl-auto mb-4 justify-conten-end">
                <button class="btn btn-primary d-grid">Tambah Buku</button>
            </div>
        </div>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Buku</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Target Terbit</th>
                            <th>Warna</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php foreach ($buku as $item): ?>
                                        <tr>
                                            <td><?= esc($item['kode_buku']); ?></td>
                                            <td><?= esc($item['judul_buku']); ?></td>
                                            <td><?= esc($item['pengarang']); ?></td>
                                            <td><?= esc($item['target_terbit']); ?></td>
                                            <td><?= esc($item['warna']); ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-file me-2"></i> Detail</a>
                                                        <a class="dropdown-item dropdown-item-edit" href="javascript:void(0);" data-id="<?= esc($item['id_buku']); ?>"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                                        <a class="dropdown-item dropdown-item-delete" style="color: red;" href="javascript:void(0);" data-id="<?= esc($item['id_buku']); ?>"><i class="bx bx-trash me-2"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

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