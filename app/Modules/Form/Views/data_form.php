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
                // Call API to get categories and books
                $.when(
                    $.ajax({ url: 'http://localhost:8080/api/kategori', dataType: 'json' }),
                    $.ajax({ url: 'http://localhost:8080/api/buku', dataType: 'json' })
                ).done(function(kategoriResponse, bukuResponse) {
                    var kategoriMap = {};
                    var bukuMap = {};

                    // Access the arrays inside kategoriResponse and bukuResponse using their keys
                    var kategoriData = kategoriResponse[0].kategori || []; // Access the 'kategori' array
                    var bukuData = bukuResponse[0].buku || []; // Access the 'buku' array

                    // Map kategori by id
                    $.each(kategoriData, function(key, kategori) {
                        if (kategori.id_kategori && kategori.nama_kategori) {
                            kategoriMap[kategori.id_kategori] = kategori.nama_kategori;
                        } else {
                            console.log('Kategori missing fields:', kategori);
                        }
                    });

                    // Map buku by id
                    $.each(bukuData, function(key, buku) {
                        if (buku.id_buku && buku.judul_buku) {
                            bukuMap[buku.id_buku] = buku.judul_buku;
                        } else {
                            console.log('Buku missing fields:', buku);
                        }
                    });

                    var formData = '';
                    $.each(data.tiket, function(key, value) {
                        // Try to find the matching kategori and buku
                        var nama_kategori = kategoriMap[value.id_kategori] || 'Unknown Kategori';
                        var judul_buku = bukuMap[value.id_buku] || 'Unknown Buku';

                        // Log the id_kategori and id_buku to check mapping
                        console.log('Mapping kategori:', value.id_kategori, '->', nama_kategori);
                        console.log('Mapping buku:', value.id_buku, '->', judul_buku);

                        formData += '<tr>';
                        formData += '<td>' + value.kode_form + '</td>';
                        formData += '<td>' + nama_kategori + '</td>';
                        formData += '<td>' + value.id_user + '</td>';
                        formData += '<td>' + value.nomor_job + '</td>';
                        formData += '<td>' + judul_buku + '</td>';
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
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching kategori or buku:', textStatus, errorThrown);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching List Form:', error);
                alert('Failed to fetch data from API.');
            }
        });

    }

 </script>
<?= $this->endSection(); ?>