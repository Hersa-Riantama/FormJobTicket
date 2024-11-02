<?= $this->extend('template/admin_template');

use Modules\Auth\Models\AuthModel; ?>
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
                <table class="table" id="dataTables">
                    <thead>
                        <tr>
                            <th style="display: none;">ID Tiket</th>
                            <th>Approval</th>
                            <th>Kelola Tiket</th>
                            <th>Kode Form</th>
                            <th>Nomor Job</th>
                            <th>Editor</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Tanggal dibuat</th>
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
                console.log("Is Koord Editor:", isKoordEditor);
                $.each(response.tiket, function(key, value) {

                    // Ambil judul buku dan nama user
                    var kode_buku = kodeBukuMap[value.id_buku] || 'Unknown Kode'
                    var judul_buku = bukuMap[value.id_buku] || 'Unknown Buku';
                    var nama = userMap[value.id_user] || 'Unknown User';


                    function encodeBase64Id(id) {
                        return btoa(id); // 'btoa' is used to encode to Base64
                    }

                    // Generate HTML untuk tabel
                    formData += '<tr>';
                    formData += '<td>' + value.id_tiket + '</td>';
                    formData += '<td>';
                    if (isKoordEditor) {
                        if (value.approved_order_koord === 'Y') {
                            formData += '<div class="button-group d-flex">'
                            formData += '<span class="badge bg-success">Order Approved</span>';
                            formData += '</div>'
                        } else {
                            formData += '<div class="button-group d-flex">'
                            formData += '<button class="btn btn-success me-2" onclick="approveOrder(' + value.id_tiket + ')">Setuju Order</button>';
                            formData += '<button class="btn btn-danger me-2" onclick="rejectOrder(' + value.id_tiket + ')">Tidak Setuju Order</button>';
                            formData += '</div>'
                        }
                        formData += '<br>';
                        if (value.approved_acc_koord === 'Y') {
                            formData += '<div class="button-group d-flex">'
                            formData += '<span class="badge bg-success">Acc Approved</span>';
                            formData += '</div>'
                        } else {
                            formData += '<div class="button-group d-flex">'
                            formData += '<button class="btn btn-success me-2" onclick="approveACC(' + value.id_tiket + ')">Setuju ACC</button>';
                            formData += '<button class="btn btn-danger me-2" onclick="rejectACC(' + value.id_tiket + ')">Tidak Setuju ACC</button>';
                            formData += '</div>'
                        }
                    } else {
                        formData += '<div class="button-group d-flex">'
                        formData += '<button class="btn btn-success btn-approve me-1" data-id_tiket="' + value.id_tiket + '">Setuju</button>';
                        formData += '<button class="btn btn-danger btn-disapprove" data-id_tiket="' + value.id_tiket + '">Tidak Setuju</button>';
                        formData += '</div>'
                    }
                    formData += '</td>';
                    formData += '<td>';
                    formData += '<div class="dropdown">';
                    formData += '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">';
                    formData += '<i class="bx bx-dots-horizontal-rounded"></i>';
                    formData += '</button>';
                    formData += '<div class="dropdown-menu">';
                    formData += '<a class="dropdown-item dropdown-item-detail" href="javascript:void(0);" data-id_tiket="' + encodeBase64Id(value.id_tiket) + '"><i class="bx bx-edit-alt me-2"></i>Detail</a>';
                    formData += '<a class="dropdown-item dropdown-item-delete" style="color: red;" href="javascript:void(0);" data-id_tiket="' + value.id_tiket + '"><i class="bx bx-trash me-2"></i> Delete</a>';
                    formData += '</div>';
                    formData += '</div>';
                    formData += '</td>';
                    formData += '<td>' + value.kode_form + '</td>';
                    formData += '<td class="wrap-text">' + value.nomor_job + '</td>';
                    formData += '<td class="wrap-text">' + nama + '</td>';
                    formData += '<td>' + kode_buku + '</td>';
                    formData += '<td class="wrap-text">' + judul_buku + '</td>';
                    formData += '<td class="wrap-text">' + formatDate(value.created_at) + '</td>';
                    formData += '</tr>';
                });

                $('#formData').html(formData);

                // Destroy DataTable if it exists, then initialize it
                if ($.fn.DataTable.isDataTable('#dataTables')) {
                    $('#dataTables').DataTable().destroy();
                }
                $('#dataTables').DataTable({
                    responsive: true,
                    order: [
                        [0, 'asc']
                    ], // Mengurutkan berdasarkan kolom ID
                    columnDefs: [{
                            targets: 0,
                            visible: false
                        } // Sembunyikan kolom ID
                    ]
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching List Form:', error);
            }
        });
    }
    $(document).on('click', '.dropdown-item-detail', function() {
        var id_tiket = $(this).data('id_tiket');
        window.location.href = '/detail/' + id_tiket; // Redirect to the detail page
    });

    $(document).on('click', '.dropdown-item-delete', function() {
        var id_tiket = $(this).data('id_tiket');
        var konfirmasi = confirm("Apakah Anda yakin hapus buku ini? ");
        if (konfirmasi) {
            $.ajax({
                type: 'DELETE',
                url: 'http://localhost:8080/delete/' + id_tiket, // Redirect to the detail page
                dataType: 'json',
                success: function(response) {
                    location.reload()
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching List Form:', error);
                }
            });
        }
    });
</script>
<?= $this->endSection(); ?>