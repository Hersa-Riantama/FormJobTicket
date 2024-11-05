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

    $(document).ready(function () {
        loadData();
    });

    function loadData() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/listform',
            dataType: 'json',
            success: function (response) {
                var kodeBukuMap = {};
                var bukuMap = {};
                var userMap = {};

                // Mapping buku
                $.each(response.buku, function (key, buku) {
                    if (buku.id_buku && buku.judul_buku) {
                        bukuMap[buku.id_buku] = buku.judul_buku;
                    }
                    if (buku.id_buku && buku.kode_buku) {
                        kodeBukuMap[buku.id_buku] = buku.kode_buku;
                    }
                });

                // Mapping user
                $.each(response.user, function (key, user) {
                    if (user.id_user && user.nama) {
                        userMap[user.id_user] = user.nama;
                    }
                });

                // Generate table
                var formData = '';
                var isKoordEditor = <?= $isKoordEditor; ?>;
                var islevel_user = <?= json_encode($level_user); ?>;
                console.log("Is Koord Editor:", isKoordEditor);
                $.each(response.tiket, function (key, value) {

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
                        formData += '<div class="button-group d-flex">';
                        formData += '<span class="label text-approve bg-disapproved badge-centers fixed-width-ditolak">Ditolak</span>';
                        formData += '</div>';
                    } else {
                        // Jika belum ditolak, lanjutkan dengan logika biasa untuk rendering tombol
                        if (isKoordEditor) {
                            // Logika approval untuk Koord Editor
                            formData += '<div class="button-group d-flex mb-2">';

                            // Order Approval
                            if (value.approved_order_koord === 'Y') {
                                formData += '<span class="label text-approve bg-approved me-2 badge-centers fixed-width">Order Approved</span>';
                                formData += '<button class="btn btn-danger btn-disapprove fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="disapproveOrder(' + value.id_tiket + ')">Batalkan Order</button>';
                            } else if (value.approved_order_koord === 'R') {
                                formData += '<span class="label text-approve bg-disapproved me-2 badge-centers fixed-width">Order Ditolak</span>';
                                formData += '<button class="btn btn-success btn-approve fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="approveOrder(' + value.id_tiket + ')">Setuju Order</button>';
                            } else {
                                formData += '<button class="btn btn-success btn-approve me-2 fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="approveOrder(' + value.id_tiket + ')">Setuju Order</button>';
                                formData += '<button class="btn btn-danger btn-disapprove fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="disapproveOrder(' + value.id_tiket + ')">Batalkan Order</button>';
                            }
                            formData += '</div>';

                            // ACC Approval
                            formData += '<div class="button-group d-flex">';
                            if (value.approved_acc_koord === 'Y') {
                                formData += '<span class="label text-approve bg-approved me-2 badge-centers fixed-width">ACC Approved</span>';
                                formData += '<button class="btn btn-danger btn-disapprove fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="disapproveAcc(' + value.id_tiket + ')">Batalkan ACC</button>';
                            } else if (value.approved_acc_koord === 'R') {
                                formData += '<span class="label text-approve bg-disapproved me-2 badge-centers fixed-width">ACC Ditolak</span>';
                                formData += '<button class="btn btn-success btn-approve fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="approveAcc(' + value.id_tiket + ')">Setuju ACC</button>';
                            } else {
                                formData += '<button class="btn btn-success btn-approve me-2 fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="approveAcc(' + value.id_tiket + ')">Setuju ACC</button>';
                                formData += '<button class="btn btn-danger btn-disapprove fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="disapproveAcc(' + value.id_tiket + ')">Batalkan ACC</button>';
                            }
                            formData += '</div>';
                        } else if (islevel_user.length > 0) { // Check if there are valid levels
                            formData += '<div class="button-group d-flex">';
                            let isApproved = false;

                            // Display approval status based on other user levels
                            islevel_user.forEach(level => {
                                if (level === 'Admin Sistem' && value.approved_order_admin === 'Y') {
                                    formData += '<span class="label text-approve bg-approved me-2 badge-centers fixed-width">Approved</span>';
                                    formData += '<button class="btn btn-danger btn-disapprove fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="disapproveTicket(' + value.id_tiket + ')">Batalkan</button>';
                                    isApproved = true;
                                } else if (level === 'Admin Sistem' && value.approved_order_admin === 'R') {
                                    formData += '<span class="label text-approve bg-disapproved me-2 badge-centers fixed-width">Ditolak</span>';
                                    formData += '<button class="btn btn-success btn-approve fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="approveTicket(' + value.id_tiket + ')">Setuju</button>';
                                    isApproved = true;
                                } else if (level === 'Manager Platform' && value.approved_acc_manager === 'Y') {
                                    formData += '<span class="label text-approve bg-approved me-2 badge-centers fixed-width">Approved</span>';
                                    formData += '<button class="btn btn-danger btn-disapprove fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="disapproveTicket(' + value.id_tiket + ')">Batalkan</button>';
                                    isApproved = true;
                                } else if (level === 'Manager Platform' && value.approved_multimedia === 'R') {
                                    formData += '<span class="label text-approve bg-disapproved me-2 badge-centers fixed-width">Ditolak</span>';
                                    formData += '<button class="btn btn-danger btn-disapprove fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="disapproveTicket(' + value.id_tiket + ')">Batalkan</button>';
                                    isApproved = true;
                                } else if (level === 'Tim Multimedia' && value.approved_multimedia === 'Y') {
                                    formData += '<span class="label text-approve bg-approved me-2 badge-centers fixed-width">Approved</span>';
                                    formData += '<button class="btn btn-danger btn-disapprove fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="disapproveTicket(' + value.id_tiket + ')">Batalkan</button>';
                                    isApproved = true;
                                } else if (level === 'Tim Multimedia' && value.approved_multimedia === 'R') {
                                    formData += '<span class="label text-approve bg-disapproved me-2 badge-centers fixed-width">Ditolak</span>';
                                    formData += '<button class="btn btn-danger btn-disapprove fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="disapproveTicket(' + value.id_tiket + ')">Batalkan</button>';
                                    isApproved = true;
                                }
                            });
                            if (!isApproved) {
                                formData += '<button class="btn btn-success btn-approve me-2 fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="approveTicket(' + value.id_tiket + ')">Setuju</button>';
                                formData += '<button class="btn btn-danger btn-disapprove fixed-width" data-id_tiket="' + value.id_tiket + '" onclick="disapproveTicket(' + value.id_tiket + ')">Tidak Setuju</button>';
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
                        ], // Order by ID column
                        columnDefs: [{
                            targets: 0, // Hide ID column
                            visible: false
                        }]
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching List Form:', error);
            }
        });
    }
    $(document).on('click', '.dropdown-item-detail', function () {
        var id_tiket = $(this).data('id_tiket');
        window.location.href = '/detail/' + id_tiket; // Redirect to the detail page
    });

    $(document).on('click', '.dropdown-item-delete', function () {
        var id_tiket = $(this).data('id_tiket');
        var konfirmasi = confirm("Apakah Anda yakin hapus buku ini? ");
        if (konfirmasi) {
            $.ajax({
                type: 'DELETE',
                url: 'http://localhost:8080/delete/' + id_tiket, // Redirect to the detail page
                dataType: 'json',
                success: function (response) {
                    location.reload()
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching List Form:', error);
                }
            });
        }
    });
    $('.btn-approve').on('click', function () {
        const id_tiket = $(this).data('id_tiket');
        approveTicket(id_tiket);
    });
    $('.btn-disapprove').on('click', function () {
        const id_tiket = $(this).data('id_tiket');
        approveTicket(id_tiket); // Reject
    });

    function approveTicket(id_tiket) {
        $.ajax({
            type: 'POST',
            url: 'approveTiket',
            data: {
                id_tiket: id_tiket
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#approveButton').hide();
                    $('.approved-status').html('<span class="badge bg-success">Approved</span>');
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
                alert('An error occurred while trying to approve the ticket');
            }
        });
    }

    function disapproveTicket(id_tiket) {
        $.ajax({
            type: 'POST',
            url: 'disapproveTicket', // Adjust this URL to match your route
            data: {
                id_tiket: id_tiket
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#approveButton').hide();
                    $('.approved-status').html('<span class="badge bg-success">Approved</span>');
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
                alert('An error occurred while trying to disapprove the ticket');
            }
        });
    }
    $('.btn-approve').on('click', function () {
        const id_tiket = $(this).data('id_tiket');
        approveOrder(id_tiket);
    });
    $('.btn-disapprove').on('click', function () {
        const id_tiket = $(this).data('id_tiket');
        disapproveOrder(id_tiket);
    });

    function approveOrder(id_tiket) {
        $.ajax({
            type: 'POST',
            url: 'approveOrderKoord', // Adjust this URL to match your route
            data: {
                id_tiket: id_tiket
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#approveButton').hide();
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
                alert('An error occurred while trying to disapprove the ticket');
            }
        });
    }

    function disapproveOrder(id_tiket) {
        $.ajax({
            type: 'POST',
            url: 'disapproveOrderKoord', // Adjust this URL to match your route
            data: {
                id_tiket: id_tiket
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#approveButton').hide();
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
                alert('An error occurred while trying to disapprove the ticket');
            }
        });
    }
    $('.btn-approve').on('click', function () {
        const id_tiket = $(this).data('id_tiket');
        approveAcc(id_tiket);
    });
    $('.btn-disapprove').on('click', function () {
        const id_tiket = $(this).data('id_tiket');
        disapproveAcc(id_tiket);
    });

    function approveAcc(id_tiket) {
        $.ajax({
            type: 'POST',
            url: 'approveAccKoord', // Adjust this URL to match your route
            data: {
                id_tiket: id_tiket
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#approveButton').hide();
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
                alert('An error occurred while trying to disapprove the ticket');
            }
        });
    }

    function disapproveAcc(id_tiket) {
        $.ajax({
            type: 'POST',
            url: 'disapprovedAccKoord', // Adjust this URL to match your route
            data: {
                id_tiket: id_tiket
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#approveButton').hide();
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
                alert('An error occurred while trying to disapprove the ticket');
            }
        });
    }

</script>
<?= $this->endSection(); ?>