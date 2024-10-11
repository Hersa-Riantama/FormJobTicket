<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Form /</span> Kelola Tiket</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Tiket</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Form</th>
                            <th>Kategori</th>
                            <th>Tanggal Order</th>
                            <th>User</th>
                            <th>Nomor Job</th>
                            <th>Buku</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="formData">
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
            url: 'http://localhost:8080/api/listform',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var formData = '';
                $.each(data.tiket, function(key, value) {
                    formData += '<tr>';
                    formData += '<td>' + value.kode_form + '</td>';
                    formData += '<td>' + value.id_kategori + '</td>';
                    formData += '<td>' + value.tgl_order + '</td>';
                    formData += '<td>' + value.id_user + '</td>';
                    formData += '<td>' + value.nomor_job + '</td>';
                    formData += '<td>' + value.id_buku + '</td>';
                    formData += '<td>';
                    formData += '<div class="dropdown">';
                    formData += '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">';
                    formData += '<i class="bx bx-dots-horizontal-rounded"></i>';
                    formData += '</button>';
                    formData += '<div class="dropdown-menu">';
                    formData += '<a class="dropdown-item dropdown-item-edit" href="javascript:void(0);" data-id_tiket="' + value.id_tiket + '"><i class="bx bx-edit-alt me-2"></i> Edit</a>';
                    formData += '<a class="dropdown-item dropdown-item-delete" style="color: red;" href="javascript:void(0);" data-id_tiket="' + value.id_tiket + '"><i class="bx bx-trash me-2"></i> Delete</a>';
                    formData += '</div>';
                    formData += '</div>';
                    formData += '</td>';
                    formData += '</tr>';
                });
                $('#formData').html(formData);
            }
        });
    }
 </script>
<?= $this->endSection(); ?>