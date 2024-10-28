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
                            <th>Kelola Tiket</th>
                            <th>Kode Form</th>
                            <th>Kategori</th>
                            <th>User</th>
                            <th>Nomor Job</th>
                            <th>Buku</th>
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
            url: 'http://localhost:8080/listform',
            dataType: 'json',
            success: function(response) {
                var kategoriMap = {};
                var bukuMap = {};
                var userMap = {};

                // Mapping kategori
                $.each(response.kategori, function(key, kategori) {
                    if (kategori.id_kategori && kategori.nama_kategori) {
                        kategoriMap[kategori.id_kategori] = kategori.nama_kategori;
                    }
                });

                // Mapping buku
                $.each(response.buku, function(key, buku) {
                    if (buku.id_buku && buku.judul_buku) {
                        bukuMap[buku.id_buku] = buku.judul_buku;
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
                $.each(response.tiket, function(key, value) {
                    // Pastikan id_kategori adalah array
                    if (typeof value.id_kategori === 'string') {
                        // Mengubah string JSON menjadi array jika diperlukan
                        try {
                            value.id_kategori = JSON.parse(value.id_kategori); // Parse JSON string
                        } catch (e) {
                            console.error('Error parsing id_kategori:', e);
                            value.id_kategori = []; // Set default kosong jika parsing gagal
                        }
                    }

                    // Map kategori
                    var kategoriNames = value.id_kategori.map(function(id) {
                        if (kategoriMap[id]) {
                            return kategoriMap[id]; // Jika ID ditemukan, kembalikan nama kategori
                        } else {
                            console.warn('Kategori tidak ditemukan untuk ID:', id); // Log peringatan
                            return 'Unknown Kategori'; // Jika tidak ditemukan, return unknown
                        }
                    }).join(', ');

                    // Ambil judul buku dan nama user
                    var judul_buku = bukuMap[value.id_buku] || 'Unknown Buku';
                    var nama = userMap[value.id_user] || 'Unknown User';

                    function encodeBase64Id(id) {
                        return btoa(id); // 'btoa' is used to encode to Base64
                    }

                    // Generate HTML untuk tabel
                    formData += '<tr>';
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
                    formData += '<td>' + kategoriNames + '</td>';
                    formData += '<td>' + nama + '</td>';
                    formData += '<td>' + value.nomor_job + '</td>';
                    formData += '<td>' + judul_buku + '</td>';
                    formData += '</tr>';
                });

                $('#formData').html(formData);
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
    })
</script>
<?= $this->endSection(); ?>