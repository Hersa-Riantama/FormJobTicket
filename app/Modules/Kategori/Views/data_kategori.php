<?= $this->extend('template/admin_template');

use Modules\Auth\Models\AuthModel; ?>

<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Kategori /</span> Kelola Kategori</h4>
        <div class="row justify-content-end">
            <!-- <div class="col-xl-auto mb-4 justify-content-end">
                <button class="btn btn-primary d-grid" id="btn-add">Tambah Kategori</button>
            </div> -->
        </div>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Kategori</h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="dataTables">
                    <thead>
                        <tr>
                            <th style="display: none;">ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Kelola Kategori</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="kategoriData">
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm" action="javascript:void(0);" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                                <div class="error-message text-danger"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" id="btn-update" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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

<script>
    $(document).ready(function() {
        loadData();
    });

    function loadData() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/kategori',
            dataType: 'json',
            success: function(data) {
                var kategoriData = '';
                $.each(data.kategori, function(key, value) {
                    kategoriData += '<tr>';
                    kategoriData += '<td>' + value.id_kategori + '</td>';
                    kategoriData += '<td>' + value.nama_kategori + '</td>';

                    kategoriData += '<td>';
                    kategoriData += '<div class="d-flex justify-content-start align-items-center">';

                    kategoriData += '<a class="btn rounded-pill btn-icon btn-label-primary item-edit me-2" href="javascript:void(0);"data-id_kategori="' + value.id_kategori + '" title="Edit Kategori">';
                    kategoriData += '<span class="tf-icons bx bx-edit bx-sm"></span>';
                    kategoriData += '</a>';

                    kategoriData += '<a class="btn rounded-pill btn-icon btn-label-danger item-delete" href="javascript:void(0);" data-id_kategori="' + value.id_kategori + '" title="Hapus Kategori">';
                    kategoriData += '<span class="tf-icons bx bx-trash bx-sm"></span>';
                    kategoriData += '</a>';

                    kategoriData += '</div>';
                    kategoriData += '</td>';
                    kategoriData += '</tr>';
                });
                $('#kategoriData').html(kategoriData);
                if ($.fn.DataTable.isDataTable('#dataTables')) {
                    // If it is, use clear and rows.add to reload data
                    $('#dataTables').DataTable().clear().rows.add($('#kategoriData').find('tr')).draw(false);
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
                        },
                        "stateSave": true, // Mengaktifkan penyimpanan state (pagination, sort, dll)
                        "stateSaveCallback": function(settings, data) {
                            // Simpan state DataTable di localStorage
                            localStorage.setItem('DataTables_state', JSON.stringify(data));
                        },
                        "stateLoadCallback": function(settings) {
                            // Ambil state DataTable dari localStorage jika ada
                            return JSON.parse(localStorage.getItem('DataTables_state'));
                        }
                    });
                    // Periksa apakah ada halaman tersimpan di localStorage
                    var savedPage = localStorage.getItem('DataTables_currentPage');
                    if (savedPage !== null) {
                        table.page(parseInt(savedPage)).draw(false); // Set halaman terakhir
                    }

                    // Event listener untuk menangkap perubahan halaman
                    // table.on('page', function() {
                    //     var currentPage = table.page();
                    //     localStorage.setItem('DataTables_currentPage', currentPage); // Simpan halaman saat ini
                    // });

                }
            }
        });
    }

    $(document).on('click', '.item-edit', function() {
        var id_kategori = $(this).data('id_kategori');
        if (!id_kategori) {
            console.log('ID Kategori :', id_kategori);
            return;
        }
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/kategori/' + id_kategori,
            dataType: 'json',
            success: function(response) {
                if (response.data_kategori) {
                    $('#nama_kategori').val(response.data_kategori.nama_kategori);
                    $('#btn-update').data('id_kategori', response.data_kategori.id_kategori);
                } else {
                    console.log('Data kategori tidak ditemukan');
                }
                $('#editModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.log('Error:', xhr.responseText); // Log jika terjadi error
            }
        });
    });

    // Fungsi untuk update data
    $(document).on('click', '#btn-update', function() {
        var id_kategori = $(this).data('id_kategori');
        $('.error-message').text('').hide();
        console.log(id_kategori);
        if (!id_kategori) {
            console.log('ID Kategori tidak ditemukan!'); // Log jika ID tidak ada
            return; // Hentikan eksekusi jika ID tidak valid
        }
        if (id_kategori) {
            var nama_kategori = $('#nama_kategori').val();

            $('#editModal').modal('show');
            $.ajax({
                type: 'PUT',
                url: 'http://localhost:8080/kategori/' + id_kategori,
                data: JSON.stringify({
                    nama_kategori: nama_kategori,
                }),
                contentType: 'application/json',
                success: function(response) {
                    if (response.Status === 'success') {
                        console.log('Response:', response);
                        loadData();
                        $('#editModal').modal('hide');
                        Swal.fire('Berhasil!', 'Kategori berhasil diperbarui.', 'success'); // Menampilkan pesan sukses
                    } else {
                        for (const [field, message] of Object.entries(response.pesan)) {
                            const errorMessageContainer = $('#' + field).closest('.mb-3').find('.error-message');
                            if (errorMessageContainer.length) {
                                errorMessageContainer.text(message).show(); // Show the error message
                            }
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', xhr.responseText);
                }
            });
        } else {
            console.log('ID Kategori tidak ditemukan pada tombol');
        }
    });

    // Fungsi untuk delete data
    $(document).on('click', '.item-delete', function() {
        var id_kategori = $(this).data('id_kategori');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan menghapus kategori ini.',
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
                    url: 'http://localhost:8080/kategori/' + id_kategori,
                    success: function() {
                        loadData();
                        Swal.fire('Berhasil!', 'Kategori berhasil dihapus.', 'success'); // Menampilkan pesan sukses
                    },
                    error: function(xhr, status, error) {
                        alert("Gagal menghapus kategori: " + xhr.responseText); // Error handling
                    }
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>