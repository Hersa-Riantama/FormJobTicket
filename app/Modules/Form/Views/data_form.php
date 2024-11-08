<?= $this->extend('template/admin_template');

use Modules\Auth\Models\AuthModel; ?>
<?= $this->section('content'); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tiket /</span> Kelola Tiket</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Tiket</h5>
            <div class="px-4">
                <select id="statusFilter" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="2">Ditolak</option>
                    <option value="10">Approved</option>
                    <option value="5">Menunggu</option>
                </select>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table" id="dataTables">
                    <thead>
                        <tr>
                            <th style="display: none;">ID Tiket</th>
                            <th>Approval</th>
                            <th>Kode Form</th>
                            <th>Nomor Job</th>
                            <th>Editor</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Tanggal dibuat</th>
                            <th>Kelola Tiket</th>
                            <?php if ($userData['level_user'] === 'Editor'): ?>
                                <th>Tolak Tiket</th>
                            <?php endif; ?>
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
<!-- / Layout wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
$AuthModel = new AuthModel();
$userId = session()->get('id_user');
$userData = $AuthModel->find($userId);
$isKoordEditor = ($userData && isset($userData['level_user']) && $userData['level_user'] === 'Koord Editor') ? 'true' : 'false';
$validLevels = ['Admin Sistem', 'Tim Multimedia', 'Manager Platform', 'Editor'];
$level_user = ($userData && isset($userData['level_user']) && in_array($userData['level_user'], $validLevels)) ? [$userData['level_user']] : [];
?>
<script>
    function formatDate(dateString) {
        const options = {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        };
        const date = new Date(dateString);

        // Format tanggal sesuai dengan d-m-y
        return date.toLocaleDateString('en-GB', options); // 'en-GB' menghasilkan format d-m-y
    }

    $(document).ready(function() {
        loadData();
    });

    function loadData() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/listform',
            dataType: 'json',
            success: function(response) {
                var kodeBukuMap = {};
                var bukuMap = {};
                var userMap = {};

                // Mapping buku
                $.each(response.buku, function(key, buku) {
                    if (buku.id_buku && buku.judul_buku) {
                        bukuMap[buku.id_buku] = buku.judul_buku;
                    }
                    if (buku.id_buku && buku.kode_buku) {
                        kodeBukuMap[buku.id_buku] = buku.kode_buku;
                    }
                });

                // Mapping user
                $.each(response.user, function(key, user) {
                    if (user.id_user && user.nama) {
                        userMap[user.id_user] = user.nama;
                    }
                });

                // Generate table
                var formData = '';
                var isKoordEditor = <?= $isKoordEditor; ?>;
                var islevel_user = <?= json_encode($level_user); ?>;
                console.log("Is Koord Editor:", isKoordEditor);
                $.each(response.tiket, function(key, value) {

                    // Ambil judul buku dan nama user
                    var kode_buku = kodeBukuMap[value.id_buku] || 'Unknown Kode';
                    var judul_buku = bukuMap[value.id_buku] || 'Unknown Buku';
                    var nama = userMap[value.id_user] || 'Unknown User';

                    function encodeBase64Id(id) {
                        return btoa(id); // 'btoa' digunakan untuk encoding Base64
                    }

                    // Generate HTML untuk tabel
                    formData += '<tr>';
                    formData += '<td>' + value.id_tiket + '</td>';
                    formData += '<td>';
                    // Periksa apakah tiket sudah ditolak oleh Editor
                    if (value.approved_order_editor === 'R') {
                        formData += '<div class="d-flex">';
                        formData += '<span class="badge  bg-label-danger badge-centers fixed-width-ditolak">Ditolak</span>';
                        formData += '</div>';
                    } else {
                        if (isKoordEditor) {
                            // Order Approval untuk Koord Editor
                            formData += '<div class="d-flex mb-2">';

                            // Order Approval Toggle
                            formData += '<label class="switch switch-success">';
                            formData += '<input type="checkbox" class="switch-input" ' + (value.approved_order_koord === 'Y' ? 'checked' : '') + ' onclick="approveOrder(' + value.id_tiket + ', this.checked)">';
                            formData += '<span class="switch-toggle-slider"></span>';
                            formData += '</label>';
                            formData += '<span class="ms-5">' + (value.approved_order_koord === 'Y' ? 'Order' : 'Order') + '</span>';
                            formData += '</div>';

                            // ACC Approval Toggle
                            formData += '<div class="d-flex">';
                            formData += '<label class="switch switch-success">';
                            formData += '<input type="checkbox" class="switch-input"' + (value.approved_acc_koord === 'Y' ? 'checked' : '') + ' onclick="approveAcc(' + value.id_tiket + ', this.checked)">';
                            formData += '<span class="switch-toggle-slider"></span>';
                            formData += '</label>';
                            formData += '<span class="ms-5">' + (value.approved_acc_koord === 'Y' ? 'Acc' : 'ACC') + '</span>';
                            formData += '</div>';
                        } else if (islevel_user.length > 0) { // Check for valid levels
                            formData += '<div class="d-flex">';
                            let isApproved = false;

                            // Approval Toggle for other user levels
                            islevel_user.forEach(level => {
                                if (level === 'Admin Sistem') {
                                    formData += '<label class="switch switch-success">';
                                    formData += '<input type="checkbox" class="switch-input"' + (value.approved_order_admin === 'Y' ? 'checked' : '') + ' onclick="approveTicket(' + value.id_tiket + ', this.checked)">';
                                    formData += '<span class="switch-toggle-slider"></span>';
                                    formData += '</label>';
                                    // formData += '<span class="ms-2">' + (value.approved_order_admin === 'Y' ? 'Approved' : 'Setuju') + '</span>';
                                    isApproved = true;
                                } else if (level === 'Manager Platform') {
                                    formData += '<label class="switch switch-success">';
                                    formData += '<input type="checkbox" class="switch-input"' + (value.approved_acc_manager === 'Y' ? 'checked' : '') + ' onclick="approveTicket(' + value.id_tiket + ', this.checked)">';
                                    formData += '<span class="switch-toggle-slider"></span>';
                                    formData += '</label>';
                                    // formData += '<span class="ms-2">' + (value.approved_acc_manager === 'Y' ? 'Approved' : 'Setuju') + '</span>';
                                    isApproved = true;
                                } else if (level === 'Tim Multimedia') {
                                    formData += '<label class="switch switch-success">';
                                    formData += '<input type="checkbox" class="switch-input"' + (value.approved_multimedia === 'Y' ? 'checked' : '') + ' onclick="approveTicket(' + value.id_tiket + ', this.checked)">';
                                    formData += '<span class="switch-toggle-slider"></span>';
                                    formData += '</label>';
                                    // formData += '<span class="ms-2">' + (value.approved_multimedia === 'Y' ? 'Approved' : 'Setuju') + '</span>';
                                    isApproved = true;
                                } else if (level === 'Editor') {
                                    formData += '<label class="switch switch-success">';
                                    formData += '<input type="checkbox" class="switch-input"' + (value.approved_order_editor === 'Y' ? 'checked' : '') + ' onclick="approveTicket(' + value.id_tiket + ', this.checked)">';
                                    formData += '<span class="switch-toggle-slider"></span>';
                                    formData += '</label>';
                                    // formData += '<span class="ms-2">' + (value.approved_multimedia === 'Y' ? 'Approved' : 'Setuju') + '</span>';
                                    isApproved = true;
                                }
                            });
                            if (!isApproved) {
                                formData += '<label class="switch switch-success">';
                                formData += '<input type="checkbox" class="switch-input" onclick="toggleApproval(' + value.id_tiket + ', this.checked)">';
                                formData += '<span class="switch-toggle-slider"></span>';
                                formData += '</label>';
                                formData += '<span class="ms-2">Setuju</span>';
                            }
                            formData += '</div>';
                        }
                    }
                    formData += '</td>';
                    formData += '<td>' + value.kode_form + '</td>';
                    formData += '<td>' + value.nomor_job + '</td>';
                    formData += '<td class="wrap-text">' + nama + '</td>';
                    formData += '<td>' + kode_buku + '</td>';
                    formData += '<td class="wrap-text">' + judul_buku + '</td>';
                    formData += '<td>' + formatDate(value.created_at) + '</td>';
                    formData += '<td>';
                    formData += '<div class="d-flex justify-content-start align-items-center">';

                    formData += '<a class="btn rounded-pill btn-icon btn-label-primary item-detail me-2" href="javascript:void(0);" data-id_tiket="' + encodeBase64Id(value.id_tiket) + '" title="Detail Tiket">';
                    formData += '<span class="tf-icons bx bx-show bx-sm"></span>';
                    formData += '</a>';

                    formData += '<a class="btn rounded-pill btn-icon btn-label-danger item-delete" href="javascript:void(0);" data-id_tiket="' + value.id_tiket + '" title="Hapus Tiket">';
                    formData += '<span class="tf-icons bx bx-trash bx-sm"></span>';
                    formData += '</a>';

                    formData += '</div>';
                    formData += '</td>';
                    if (islevel_user.includes("Editor")) {
                        if (value.approved_order_editor !== 'R') {
                            formData += '<td>';
                            formData += '<button class="btn btn-danger btn-disapprove fixed-width-ditolak" data-id_tiket="' + value.id_tiket + '" onclick="disapproveTicket(' + value.id_tiket + ')">Tolak Tiket</button>';
                            formData += '</td>';
                        } else {
                            formData += '<td>';
                            formData += '<button class="btn btn-secondary disabled btn-disapprove fixed-width-ditolak">Tolak Tiket</button>';
                            formData += '</td>';
                        }
                    }
                    formData += '</tr>';
                });
                $('#formData').html(formData);
                if ($.fn.DataTable.isDataTable('#dataTables')) {
                    // If it is, use clear and rows.add to reload data
                    $('#dataTables').DataTable().clear().rows.add($('#formData').find('tr')).draw(false);
                } else {
                    // Initialize DataTables only once, after data has been loaded
                    $('#dataTables').DataTable({
                        responsive: true,
                        order: [
                            [0, 'asc']
                        ], // Urutkan berdasarkan kolom kedua jika diperlukan
                        columnDefs: [{
                            targets: 0, // Kolom pertama (ID Tiket)
                            visible: false,
                            searchable: false
                        }],
                        language: {
                            url: "https://cdn.datatables.net/plug-ins/1.13.5/i18n/id.json"
                        }
                    });

                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching List Form:', error);
            }
        });
    }

    $(document).on('click', '.item-detail', function() {
        var id_tiket = $(this).data('id_tiket');
        window.location.href = '/detail/' + id_tiket; // Redirect to the detail page
    });

    $(document).on('click', '.item-delete', function() {
        var id_tiket = $(this).data('id_tiket');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan menghapus tiket ini.',
            icon: 'warning',
            showCancelButton: true, // Menampilkan tombol 'Batal'
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            allowOutsideClick: true, // Mengizinkan klik di luar untuk menutup alert
            backdrop: true // Latar belakang dengan efek
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: 'http://localhost:8080/delete/' + id_tiket, // Redirect to the detail page
                    dataType: 'json',
                    success: function(response) {
                        loadData()
                        Swal.fire('Berhasil!', 'Tiket berhasil dihapus.', 'success'); // Menampilkan pesan sukses
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching List Form:', error);
                    }
                });
            }
        });
    });

    $('.btn-approve').on('click', function() {
        const id_tiket = $(this).data('id_tiket');
        approveTicket(id_tiket);
    });

    function approveTicket(id_tiket, isChecked) {
        // Ambil referensi ke checkbox yang mengaktifkan fungsi ini
        const checkbox = event.target;

        // Tampilkan dialog konfirmasi SweetAlert
        Swal.fire({
            title: isChecked ? 'Apakah Anda yakin?' : 'Apakah Anda yakin ingin membatalkan approval?',
            text: isChecked ? 'Anda akan approve tiket ini.' : 'Anda akan membatalkan approval tiket ini.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: isChecked ? 'Ya, Approve!' : 'Ya, Batalkan Approval!',
            cancelButtonText: 'Batal',
            allowOutsideClick: true,
            backdrop: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, lanjutkan dengan AJAX request
                $.ajax({
                    type: 'POST',
                    url: 'approveTiket',
                    data: {
                        id_tiket: id_tiket,
                        status: isChecked ? 'Y' : 'N'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#approveButton').hide();
                            const successMessage = isChecked ? 'Tiket berhasil diapprove.' : 'Approval tiket berhasil dibatalkan.';
                            Swal.fire('Berhasil!', successMessage, 'success'); // Menampilkan pesan sukses
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Terjadi kesalahan saat mencoba mengubah status approval tiket');
                    }
                });
            } else {
                // Jika pengguna membatalkan, kembalikan status checkbox ke posisi semula
                checkbox.checked = !isChecked;
            }
        });
    }

    $('.btn-approve').on('click', function() {
        const id_tiket = $(this).data('id_tiket');
        approveOrder(id_tiket);
    });

    function approveOrder(id_tiket, isChecked) {
        // Tentukan judul dan teks berdasarkan nilai isChecked
        const title = isChecked ? 'Apakah Anda yakin?' : 'Apakah Anda yakin ingin membatalkan approval?';
        const text = isChecked ? 'Anda akan approve tiket ini.' : 'Anda akan membatalkan approval tiket ini.';
        const confirmButtonText = isChecked ? 'Ya, Approve!' : 'Ya, Batalkan Approval!';

        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: confirmButtonText,
            cancelButtonText: 'Batal',
            allowOutsideClick: true,
            backdrop: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'approveOrderKoord', // URL endpoint yang sesuai
                    data: {
                        id_tiket: id_tiket,
                        status: isChecked ? 'Y' : 'N'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#approveButton').hide();
                            loadData(); // Panggil fungsi untuk memperbarui data
                            const successMessage = isChecked ?
                                'Tiket berhasil diapprove.' :
                                'Approval tiket berhasil dibatalkan.';
                            Swal.fire('Berhasil!', successMessage, 'success'); // Menampilkan pesan sukses
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Terjadi kesalahan saat mencoba mengubah status approval tiket');
                    }
                });
            }
        });
    }

    $('.btn-approve').on('click', function() {
        const id_tiket = $(this).data('id_tiket');
        approveAcc(id_tiket);
    });

    function approveAcc(id_tiket, isChecked) {
        // Tentukan judul dan teks berdasarkan nilai isChecked
        const title = isChecked ? 'Apakah Anda yakin?' : 'Apakah Anda yakin ingin membatalkan approval?';
        const text = isChecked ? 'Anda akan approve ACC tiket ini.' : 'Anda akan membatalkan ACC tiket ini.';
        const confirmButtonText = isChecked ? 'Ya, Approve!' : 'Ya, Batalkan Approval!';

        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: confirmButtonText,
            cancelButtonText: 'Batal',
            allowOutsideClick: true,
            backdrop: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'approveAccKoord', // URL endpoint yang sesuai
                    data: {
                        id_tiket: id_tiket,
                        status: isChecked ? 'Y' : 'N'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#approveButton').hide();
                            location.reload(); // Reload halaman setelah berhasil
                            const successMessage = isChecked ?
                                'Tiket berhasil di-ACC.' :
                                'Approval ACC tiket berhasil dibatalkan.';
                            Swal.fire('Berhasil!', successMessage, 'success'); // Menampilkan pesan sukses
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Terjadi kesalahan saat mencoba mengubah status ACC tiket');
                    }
                });
            }
        });
    }

    $('.btn-disapprove').on('click', function() {
        const id_tiket = $(this).data('id_tiket');
        disapproveTicket(id_tiket); // Reject
    });

    function disapproveTicket(id_tiket) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan menolak tiket ini.',
            icon: 'warning',
            showCancelButton: true, // Menampilkan tombol 'Batal'
            confirmButtonText: 'Ya, Tolak!',
            cancelButtonText: 'Batal',
            allowOutsideClick: true, // Mengizinkan klik di luar untuk menutup alert
            backdrop: true // Latar belakang dengan efek
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'disapproveTicket', // Adjust this URL to match your route
                    data: {
                        id_tiket: id_tiket
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            $('#approveButton').hide();
                            loadData();
                            Swal.fire('Berhasil!', 'Tiket berhasil ditolak.', 'success')
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('An error occurred while trying to disapprove the ticket');
                    }
                });
            }
        });
    }
</script>
<?= $this->endSection(); ?>