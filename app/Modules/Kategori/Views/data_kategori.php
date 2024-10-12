<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Kategori /</span> Kelola Kategori</h4>
        <div class="row justify-content-end">
            <div class="col-xl-auto mb-4 justify-content-end">
                <button class="btn btn-primary d-grid" id="btn-add">Tambah Kategori</button>
            </div>
        </div>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Kategori</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="kategoriData">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        loadData();
    });
    function loadData() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/api/kategori',
            dataType: 'json',
            success: function(data) {
                var kategoriData = '';
                $.each(data.kategori, function(key, value) {
                    kategoriData += '<tr>';
                    kategoriData += '<td>' + value.nama_kategori + '</td>';
                    kategoriData += '<td>';
                    kategoriData += '<div class="dropdown">';
                    kategoriData += '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">';
                    kategoriData += '<i class="bx bx-dots-horizontal-rounded"></i>';
                    kategoriData += '</button>';
                    kategoriData += '<div class="dropdown-menu">';
                    kategoriData += '<a class="dropdown-item dropdown-item-edit" href="javascript:void(0);" data-id_kategori="' + value.id_kategori + '"><i class="bx bx-edit-alt me-2"></i> Edit</a>';
                    kategoriData += '<a class="dropdown-item dropdown-item-delete" style="color: red;" href="javascript:void(0);" data-id_kategori="' + value.id_kategori + '"><i class="bx bx-trash me-2"></i> Delete</a>';
                    kategoriData += '</div>';
                    kategoriData += '</div>';
                    kategoriData += '</td>';
                    kategoriData += '</tr>';
                });
                $('#kategoriData').html(kategoriData);
            }
        });
    }
</script>
<?= $this->endSection(); ?>