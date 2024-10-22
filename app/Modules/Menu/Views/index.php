    <?= $this->extend('template/admin_template'); ?>
    <?= $this->section('content'); ?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span>Dashboard</h4>
            <!-- Row 1 -->
            <div class="row">

                <!-- Column 1 -->
                <?php if (isset($_SESSION['level_user']) && in_array($_SESSION['level_user'], ['Admin Sistem'])) : ?>
                    <div class="col-lg-auto col-md-auto col-auto mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <span class="fw-bold text-center fs-4 d-block mb-3">Jumlah User</span>
                                <h3 class="card-title text-center fs-1 my-3"><?= $user; ?></h3>
                                <a class="smal-box-footer p-3 mx-5" href="http://localhost:8080/user">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <!-- / Column 1 -->

                    <!-- Column 2 -->
                    <div class="col-lg-auto col-md-auto col-auto mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <span class="fw-bold text-center fs-4 d-block mb-3">Jumlah Kategori</span>
                                <h3 class="card-title text-center fs-1 my-3"><?= $kategori; ?></h3>
                                <a class="smal-box-footer p-3 mx-5" href="http://localhost:8080/kategori">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- / Column 2 -->

                <!-- Column 3 -->
                <?php if (isset($_SESSION['level_user']) && in_array($_SESSION['level_user'], ['Admin Sistem', 'Editor', 'Koord Editor'])) : ?>
                    <div class="col-lg-auto col-md-auto col-auto mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <span class="fw-bold text-center fs-4 d-block mb-3">Jumlah Buku</span>
                                <h3 class="card-title text-center fs-1 my-3"><?= $buku; ?></h3>
                                <a class="smal-box-footer p-3 mx-5" href="http://localhost:8080/buku">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- / Column 3 -->

                <!-- Column 4 -->
                <?php if (isset($_SESSION['level_user']) && in_array($_SESSION['level_user'], ['Admin Sistem', 'Tim Multimedia', 'Editor', 'Koord Editor', 'Manager Platform'])) : ?>
                    <div class="col-lg-auto col-md-auto col-auto mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <span class="fw-bold text-center fs-4 d-block mb-3">Jumlah Tiket</span>
                                <h3 class="card-title text-center fs-1 my-3"><?= $form; ?></h3>
                                <a class="smal-box-footer p-3 mx-5" href="http://localhost:8080/listform">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- / Column 4 -->

            </div>
            <!-- / Row 1 -->

            <!-- Modal untuk memilih data -->
            <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dataModalLabel">Koord. Editor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" hidden>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding-bottom:0.25rem">
                            <select id="dataSelect" class="form-control">
                                <!-- Pilihan akan diisi dengan data dari database -->
                            </select>
                            <p class="text-bold mt-2 mb-0" style="font-size:x-small;">*Jika Tidak Terdapat Nama Pada Koord. Editor, Mohon Hubungi Koord. Editor Untuk Membuat Akun Terlebih Dahulu</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="saveDataBtn" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class=" content-footer footer bg-footer-theme">
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const idUser = <?= $userData['id_user'] ?>; // Mengambil id_user dari session
            const dataModal = new bootstrap.Modal(document.getElementById('dataModal'));

            // Panggil API untuk mendapatkan status pengguna
            fetch(`/check-user-status`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.statusText);
                    }
                    return response.json(); // Ambil respons sebagai JSON
                })
                .then(data => {
                    console.log(data);
                    if (data.showModal) {
                        dataModal.show(); // Tampilkan modal jika perlu
                        // Cek apakah modal bisa ditutup
                        if (!data.canCloseModal) {
                            // Cegah penutupan modal
                            $('#dataModal').on('hide.bs.modal', function(e) {
                                e.preventDefault(); // Cegah penutupan
                            });
                        }
                    }
                })
                .catch(error => console.error('Error fetching user status:', error));

            const saveButton = document.getElementById('saveDataBtn');
            const selectInput = document.getElementById('dataSelect');

            selectInput.addEventListener('change', function() {
                saveButton.disabled = !selectInput.value; // Aktifkan tombol jika ada pilihan
            });

            saveButton.addEventListener('click', function() {
                const idKoord = selectInput.value;

                // Kirim pilihan pengguna ke API untuk disimpan
                fetch('/register-selection', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_user: idUser,
                        id_koord: idKoord
                    })
                }).then(response => {
                    if (response.ok) {
                        // Menghapus event handler yang mencegah modal ditutup
                        $('#dataModal').off('hide.bs.modal');
                        // Tutup modal setelah menyimpan
                        $('#dataModal').modal('hide');
                        dataModal.hide(); // Tutup modal setelah berhasil menyimpan
                        // alert('Pilihan berhasil disimpan!');
                    }
                });
            });

        });

        $(document).ready(function() {
            // Fungsi untuk mengambil data koordinator dari API dan menampilkan di modal
            function loadKoordinators() {
                $.ajax({
                    url: '/koord', // URL endpoint API
                    method: 'GET',
                    success: function(data) {
                        let dataSelect = $('#dataSelect');
                        dataSelect.empty(); // Kosongkan pilihan sebelumnya
                        dataSelect.append('<option value="" disabled selected>Pilih Koord. Editor</option>'); // Tambahkan opsi default

                        // Tambahkan opsi berdasarkan data dari database
                        data.forEach(function(koord) {
                            dataSelect.append(`<option value="${koord.id_user}">${koord.nama}</option>`); // Pastikan nama field sesuai
                        });
                    },
                    error: function(xhr) {
                        console.error('Error fetching coordinators:', xhr);
                    }
                });
            }

            // Panggil fungsi untuk memuat koordinator saat modal ditampilkan
            $('#dataModal').on('show.bs.modal', function() {
                loadKoordinators();
            });

            // Simpan pilihan ketika tombol "Simpan Pilihan" ditekan
            $('#saveDataBtn').click(function() {
                const selectedKoord = $('#dataSelect').val();
                if (selectedKoord) {
                    // Lakukan penyimpanan pilihan di sini
                    console.log('Selected Koord ID:', selectedKoord);
                    // Tambahkan AJAX untuk menyimpan pilihan jika diperlukan
                } else {
                    alert('Silakan pilih koord. editor.');
                }
            });
        });
    </script>
    <?= $this->endSection(); ?>