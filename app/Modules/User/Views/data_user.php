<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">User /</span> Kelola User</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List User</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nomer Induk</th>
                            <th>Email</th>
                            <th>No.Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Level User</th>
                            <th>Status User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="UserData">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        loadData();
    });

    function loadData() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/api/user',
            dataType: 'json',
            success: function(data) {
                var UserData = '';
                $.each(data.user, function(key, value) {
                    UserData += '<tr>';
                    UserData += '<td>' + value.nama + '</td>';
                    UserData += '<td>' + value.nomor_induk + '</td>';
                    UserData += '<td>' + value.email + '</td>';
                    UserData += '<td>' + value.no_tlp + '</td>';
                    UserData += '<td>' + value.jk + '</td>';
                    UserData += '<td>' + value.level_user + '</td>';

                    // Tombol Verifikasi (Hanya muncul jika user belum diverifikasi)
                    if (value.verifikasi === 'N') { // Jika user belum diverifikasi
                        UserData += '<td><button class="badge btn btn-danger btn-verify" data-id_user="' + value.id_user + '">Verifikasi</button></td>';
                    } else {
                        UserData += '<td><span class="badge bg-success">Terverifikasi</span></td>';
                    }

                    UserData += '<td>';
                    UserData += '<div class="dropdown">';
                    UserData += '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">';
                    UserData += '<i class="bx bx-dots-horizontal-rounded"></i>';
                    UserData += '</button>';
                    UserData += '<div class="dropdown-menu">';
                    UserData += '<a class="dropdown-item dropdown-item-edit" href="javascript:void(0);" data-id_user="' + value.id_user + '"><i class="bx bx-edit-alt me-2"></i> Edit</a>';
                    UserData += '<a class="dropdown-item dropdown-item-delete" style="color: red;" href="javascript:void(0);" data-id_user="' + value.id_user + '"><i class="bx bx-trash me-2"></i> Delete</a>';
                    UserData += '</div>';
                    UserData += '</div>';
                    UserData += '</td>';
                    UserData += '</tr>';
                });
                $('#UserData').html(UserData);
            }
        });
    }
    // Fungsi untuk memverifikasi user
    function verifikasiUser(id_user) {
        console.log(id_user);
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8080/api/verify_user/' + id_user,
            data: {
                id_user: id_user
            },
            success: function(response) {
                alert(response.Pesan); // Tampilkan pesan dari response
                loadData(); // Reload data setelah verifikasi berhasil
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
                alert('Gagal memverifikasi user.');
            }
        });
    }

    // Event listener untuk tombol Verifikasi
    $(document).on('click', '.btn-verify', function() {
        var id_user = $(this).data('id_user');
        if (confirm('Apakah Anda yakin ingin memverifikasi user ini?')) {
            verifikasiUser(id_user);
        }
    });
</script>
<!-- / Layout wrapper -->
<?= $this->endSection(); ?>