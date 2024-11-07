<?= $this->extend('template/admin_template');

use Modules\Auth\Models\AuthModel; ?>

<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Buku /</span> Kelola Buku</h4>
        <div class="row justify-content-end">
            <?php
            // Ambil data user dari sesi
            $AuthModel = new AuthModel();
            $userId = session()->get('id_user');

            if (!empty($userId)) {
                // Ambil data user dari database
                $userData = $AuthModel->find($userId);

                if ($userData && isset($userData['level_user'])) {
                    $allowUser = ['Editor', 'Koord Editor'];
                    if (in_array($userData['level_user'], $allowUser)) {
            ?>
                        <div class="col-xl-auto mb-4 justify-content-end">
                            <button class="btn btn-primary d-grid" id="btn-add">Tambah Buku</button>
                        </div>
            <?php
                    }
                } else {
                    echo '<script>alert("Level user tidak ditemukan."); history.back();</script>';
                }
            } else {
                echo '<script>alert("User tidak ditemukan atau sesi tidak valid."); history.back();</script>';
            }
            ?>

        </div>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Buku</h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="dataTables">
                    <thead>
                        <tr>
                            <th style="display: none;">ID Buku</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Target Terbit</th>
                            <th>Warna</th>
                            <th>Kelola Buku</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="bukuData">
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm" action="javascript:void(0);" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kode_buku_update" class="form-label">Kode Buku</label>
                                <input type="text" class="form-control" id="kode_buku_update" name="kode_buku">
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="judul_buku_update" class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" id="judul_buku_update" name="judul_buku">
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="pengarang_update" class="form-label">Pengarang</label>
                                <input type="text" class="form-control" id="pengarang_update" name="pengarang">
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="target_terbit_update" class="form-label">Target Terbit</label>
                                <input type="year" class="form-control" id="target_terbit_update" name="target_terbit">
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Warna</label><br>
                                <div class="form-check-inline">
                                    <input type="radio" id="bw" name="warna" value="BW">
                                    <label for="bw">BW</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" id="2-2" name="warna" value="2/2">
                                    <label for="2-2">2/2</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" id="3-3" name="warna" value="3/3">
                                    <label for="3-3">3/3</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" id="4-4" name="warna" value="4/4">
                                    <label for="4-4">4/4</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" id="btn-update" data-id_buku="" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Buku -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="addForm" action="javascript:void(0);" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Tambah Buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kode_buku" class="form-label">Kode Buku</label>
                                <input type="text" class="form-control" id="kode_buku" name="kode_buku">
                                <div id="kode_bukuError" class="error-pesan text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="judul_buku" class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" id="judul_buku" name="judul_buku">
                                <div id="judul_bukuError" class="error-pesan text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="pengarang" class="form-label">Pengarang</label>
                                <input type="text" class="form-control" id="pengarang" name="pengarang">
                                <div id="pengarangError" class="error-pesan text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="target_terbit" class="form-label">Target Terbit</label>
                                <input type="year" class="form-control" id="target_terbit" name="target_terbit">
                                <div id="target_terbitError" class="error-pesan text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="warna" class="form-label">Warna</label><br>
                                <div class="form-check-inline">
                                    <input type="radio" id="warna_bw" name="warna" value="BW">
                                    <label for="warna_bw">BW</label>
                                </div>
                                <div id="pilihWarna" class="form-check-inline">
                                    <input type="radio" id="warna_2-2" name="warna" value="2/2">
                                    <label for="warna_2-2">2/2</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" id="warna_3-3" name="warna" value="3/3">
                                    <label for="warna_3-3">3/3</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" id="warna_4-4" name="warna" value="4/4">
                                    <label for="warna_4-4">4/4</label>
                                </div>
                                <div id="warnaError" class="error-pesan text-danger"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" id="btn-tambah">Simpan</button>
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
    // Fungsi untuk menampilkan data dari database
    function loadData() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/buku',
            dataType: 'json',
            success: function(data) {
                var bukuData = '';
                $.each(data.buku, function(key, value) {
                    bukuData += '<tr>';
                    bukuData += '<td>' + value.id_buku + '</td>';
                    bukuData += '<td>' + value.kode_buku + '</td>';
                    bukuData += '<td class="wrap-text">' + value.judul_buku + '</td>';
                    bukuData += '<td class="wrap-text">' + value.pengarang + '</td>';
                    bukuData += '<td>' + value.target_terbit + '</td>';
                    bukuData += '<td>' + value.warna + '</td>';
                    bukuData += '<td>';
                    bukuData += '<div class="dropdown">';
                    bukuData += '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">';
                    bukuData += '<i class="bx bx-dots-horizontal-rounded"></i>';
                    bukuData += '</button>';
                    bukuData += '<div class="dropdown-menu">';
                    bukuData += '<a class="dropdown-item dropdown-item-edit" href="javascript:void(0);" data-id_buku="' + value.id_buku + '"><i class="bx bx-edit-alt me-2"></i> Edit</a>';
                    bukuData += '<a class="dropdown-item dropdown-item-delete" style="color: red;" href="javascript:void(0);" data-id_buku="' + value.id_buku + '"><i class="bx bx-trash me-2"></i> Delete</a>';
                    bukuData += '</div>';
                    bukuData += '</div>';
                    bukuData += '</td>';
                    bukuData += '</tr>';
                });
                $('#bukuData').html(bukuData);
                if ($.fn.DataTable.isDataTable('#dataTables')) {
                    // If it is, use clear and rows.add to reload data
                    $('#dataTables').DataTable().clear().rows.add($('#bukuData').find('tr')).draw(false);
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
            },
            error: function(xhr, status, error) {
                console.error('Error loading data:', xhr.responseText);
            }
        });
    }
    // Fungsi untuk edit data
    $(document).on('click', '.dropdown-item-edit', function() {
        var id_buku = $(this).data('id_buku');
        console.log('ID Buku:', id_buku);

        if (!id_buku) {
            console.log('ID tidak ditemukan!'); // Log jika ID undefined
            return; // Hentikan eksekusi jika ID tidak valid
        }

        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/buku/' + id_buku,
            dataType: 'json',
            success: function(response) {
                console.log('Respons API:', response); // Lihat respons API

                // Pastikan untuk memeriksa data_buku dari respons
                if (response.data_buku) {
                    $('#kode_buku_update').val(response.data_buku.kode_buku);
                    $('#judul_buku_update').val(response.data_buku.judul_buku);
                    $('#pengarang_update').val(response.data_buku.pengarang);
                    $('#target_terbit_update').val(response.data_buku.target_terbit);

                    // Mengatur pilihan radio button untuk warna
                    $('input[name="warna"]').prop('checked', false); // Reset pilihan
                    $('input[name="warna"][value="' + response.data_buku.warna + '"]').prop('checked', true);

                    $('#btn-update').data('id_buku', response.data_buku.id_buku);
                } else {
                    console.log('Data buku tidak ditemukan');
                }

                // Tampilkan modal setelah data berhasil diisi
                $('#editModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.log('Error:', xhr.responseText); // Log jika terjadi error
            }
        });
    });

    // Fungsi untuk delete data
    $(document).on('click', '.dropdown-item-delete', function() {
        var id_buku = $(this).data('id_buku');

        // Gunakan SweetAlert2 untuk konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan menghapus buku ini.',
            icon: 'warning',
            showCancelButton: true, // Menampilkan tombol 'Batal'
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            allowOutsideClick: true, // Mengizinkan klik di luar untuk menutup alert
            backdrop: true // Latar belakang dengan efek
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan 'Ya, Hapus!'
                $.ajax({
                    type: 'DELETE',
                    url: 'http://localhost:8080/buku/' + id_buku,
                    success: function() {
                        loadData(); // Memuat ulang data setelah penghapusan
                        Swal.fire('Berhasil!', 'Buku berhasil dihapus.', 'success'); // Menampilkan pesan sukses
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error!', 'Gagal menghapus buku: ' + xhr.responseText, 'error'); // Menampilkan pesan error
                    }
                });
            }
        });
    });

    // Fungsi untuk update data
    $(document).on('click', '#btn-update', function() {
        var id_buku = $(this).data('id_buku');
        $('.error-message').text('').hide(); // Reset semua pesan kesalahan

        if (!id_buku) {
            console.log('ID buku tidak ditemukan!'); // Log jika ID tidak ada
            return; // Hentikan eksekusi jika ID tidak valid
        }
        if (id_buku) {
            var kode_buku = $('#kode_buku_update').val();
            var judul_buku = $('#judul_buku_update').val();
            var pengarang = $('#pengarang_update').val();
            var target_terbit = $('#target_terbit_update').val();
            var warna = $('input[name="warna"]:checked').val();

            $.ajax({
                type: 'PUT',
                url: 'http://localhost:8080/buku/' + id_buku,
                contentType: 'application/json',
                data: JSON.stringify({
                    kode_buku: kode_buku,
                    judul_buku: judul_buku,
                    pengarang: pengarang,
                    target_terbit: target_terbit,
                    warna: warna
                }),
                success: function(response) {
                    console.log('Respons lengkap:', response); // Debugging: Log respons lengkap

                    if (response.Status === 'success') {
                        console.log('Response:', response);
                        $('#editModal').modal('hide');
                        loadData();
                        Swal.fire('Berhasil!', 'Buku berhasil diperbarui.', 'success'); // Menampilkan pesan sukses
                    } else {
                        // Periksa apakah response.Errors ada dan bukan undefined
                        if (response.Errors && typeof response.Errors === 'object') {
                            for (const [field, message] of Object.entries(response.Errors)) {
                                const errorMessageContainer = $('#' + field + '_update').closest('.mb-3').find('.error-message');
                                if (errorMessageContainer.length) {
                                    errorMessageContainer.text(message).show(); // Tampilkan pesan kesalahan
                                }
                            }
                        } else {
                            console.error('Errors tidak ditemukan di respons:', response); // Log jika tidak ada Errors
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', xhr.responseText);
                }
            });
        }
    });

    // Fungsi untuk menampilkan modal tambah
    $(document).on('click', '#btn-add', function() {
        // Reset semua input di dalam form agar kosong
        $('#addForm')[0].reset();

        // Tampilkan modal menggunakan Bootstrap
        $('#addModal').modal('show');
    });

    // Fungsi untuk tambah data
    $(document).on('submit', '#addForm', function(event) {
        event.preventDefault();
        $('.error-pesan').text('').hide();

        if (this.checkValidity()) {
            // Ambil data dari form
            var kode_buku = $('#kode_buku').val();
            var judul_buku = $('#judul_buku').val();
            var pengarang = $('#pengarang').val();
            var target_terbit = $('#target_terbit').val();
            var warna = $('input[name="warna"]:checked').val();

            $.ajax({
                type: 'POST',
                url: 'http://localhost:8080/buku',
                contentType: 'application/json',
                data: JSON.stringify({
                    kode_buku: kode_buku,
                    judul_buku: judul_buku,
                    pengarang: pengarang,
                    target_terbit: target_terbit,
                    warna: warna
                }),
                success: function(response) {
                    if (response.Status === 'success') {
                        console.log(response); // Menampilkan respon sukses
                        $('#addModal').modal('hide'); // Menutup modal
                        loadData(); // Panggil fungsi untuk memuat data (misalnya dari database)
                        Swal.fire('Berhasil!', 'Buku berhasil ditambah.', 'success'); // Menampilkan pesan sukses
                    } else {
                        for (const [field, message] of Object.entries(response.pesan)) {
                            const PesanError = $('#' + field + 'Error');
                            if (PesanError.length) {
                                PesanError.text(message).show(); // Show the error message
                            }
                        }
                    }
                },

                error: function(xhr, status, error) {
                    console.log('Error:', xhr.responseText);
                }
            })
        }
    });
</script>

<?= $this->endSection(); ?>