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
                <table class="table" id="dataTables">
                    <thead>
                        <tr>
                            <th style="display: none;">ID User</th>
                            <th>Status User</th>
                            <th>Nama</th>
                            <th>Nomer Induk</th>
                            <th>Email</th>
                            <th>No.Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Level User</th>
                            <th>Kelola User</th>
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
            url: 'http://localhost:8080/user',
            dataType: 'json',
            success: function(data) {
                var UserData = '';
                $.each(data.user, function(key, value) {
                    UserData += '<tr>';
                    UserData += '<td>' + value.id_user + '</td>';
                    // Tombol Verifikasi (Hanya muncul jika user belum diverifikasi)
                    if (value.verifikasi === 'N') { // Jika user belum diverifikasi
                        UserData += '<td class="center-text"><button class="badge btn btn-danger btn-verify fixed-width-user" data-id_user="' + value.id_user + '">Verifikasi</button></td>';
                    } else if (value.verifikasi === 'R') {
                        UserData += '<td class="center-text"><button class="badge btn btn-danger btn-verify fixed-width-user" data-id_user="' + value.id_user + '">Verifikasi</button></td>';
                    } else {
                        UserData += '<td class="center-text"><span class="badge  bg-label-success fixed-width-user">Terverifikasi</span></td>';
                    }
                    UserData += '<td class="wrap-text">' + value.nama + '</td>';
                    UserData += '<td>' + value.nomor_induk + '</td>';
                    UserData += '<td class="wrap-text">' + value.email + '</td>';
                    UserData += '<td>' + value.no_tlp + '</td>';
                    UserData += '<td>' + value.jk + '</td>';
                    UserData += '<td>' + value.level_user + '</td>';

                    UserData += '<td>';
                    UserData += '<div class="d-flex justify-content-start align-items-center">';

                    if (value.verifikasi === 'N') {
                        UserData += '<a class="btn rounded-pill btn-icon btn-label-secondary disabled" href="javascript:void(0);" title="Suspend User">';
                        UserData += '<span class="tf-icons bx bx-user-x bx-sm"></span>';
                        UserData += '</a>';
                    } else {
                        UserData += '<a class="btn rounded-pill btn-icon btn-label-danger item-suspend" href="javascript:void(0);" data-id_user="' + value.id_user + '" title="Suspend User">';
                        UserData += '<span class="tf-icons bx bx-user-x bx-sm"></span>';
                        UserData += '</a>';
                    }

                    UserData += '</div>';
                    UserData += '</td>';
                    UserData += '</tr>';
                });
                $('#UserData').html(UserData);
                if ($.fn.DataTable.isDataTable('#dataTables')) {
                    // If it is, use clear and rows.add to reload data
                    $('#dataTables').DataTable().clear().rows.add($('#UserData').find('tr')).draw(false);
                } else {
                    // Initialize DataTables only once, after data has been loaded
                    $('#dataTables').DataTable({
                        responsive: true,
                        order: [
                            [0, 'asc']
                        ], // Mengurutkan berdasarkan kolom ID
                        columnDefs: [{
                            targets: 0, // Sembunyikan kolom ID
                            visible: false,
                            searchable: false
                        }],
                        language: {
                            url: "https://cdn.datatables.net/plug-ins/1.13.5/i18n/id.json"
                        }
                    });
                }
            }
        });
    }
    // Fungsi untuk memverifikasi user
    function verifikasiUser(id_user) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan memverifikasi user ini.',
            icon: 'warning',
            showCancelButton: true, // Menampilkan tombol 'Batal'
            confirmButtonText: 'Ya, Verifikasi!',
            cancelButtonText: 'Batal',
            allowOutsideClick: true, // Mengizinkan klik di luar untuk menutup alert
            backdrop: true // Latar belakang dengan efek
        }).then((result) => {
            console.log(id_user);
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:8080/verify_user/' + id_user,
                    data: {
                        id_user: id_user
                    },
                    success: function(response) {
                        loadData();
                        Swal.fire('Berhasil!', 'User berhasil diverifikasi.', 'success'); // Menampilkan pesan sukses
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('Gagal memverifikasi user.');
                    }
                });
            }
        });
    }

    // Event listener untuk tombol Verifikasi
    $(document).on('click', '.btn-verify', function() {
        var id_user = $(this).data('id_user');
        verifikasiUser(id_user);
    });
    $(document).on('click', '.item-suspend', function() {
        var id_user = $(this).data('id_user');
        console.log("Selected User ID:", id_user);
        // Gunakan SweetAlert2 untuk konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan suspend user ini.',
            icon: 'warning',
            showCancelButton: true, // Menampilkan tombol 'Batal'
            confirmButtonText: 'Ya, Suspend!',
            cancelButtonText: 'Batal',
            allowOutsideClick: true, // Mengizinkan klik di luar untuk menutup alert
            backdrop: true // Latar belakang dengan efek
        }).then((result) => {
            if (!id_user) {
                alert("ID user tidak ditemukan!"); // Tambahkan error handling jika id_user undefined
                return;
            }
            if (result.isConfirmed) {
                $.ajax({
                    url: 'http://localhost:8080/suspend/' + id_user, // Replace with your actual endpoint
                    type: 'PUT', // Assuming it's a PUT request to update the user's status
                    dataType: 'json',
                    success: function(response) {
                        loadData();
                        Swal.fire('Berhasil!', 'User berhasil disuspend.', 'success'); // Menampilkan pesan sukses
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX Error:', xhr.responseText);
                        alert('Terjadi Kesalahan saat Suspend user.');
                    }
                });
            }
        });
    });
</script>
<!-- / Layout wrapper -->
<?= $this->endSection(); ?>