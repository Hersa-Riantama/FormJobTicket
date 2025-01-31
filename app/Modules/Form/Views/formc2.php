<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        /* Atur lebar tabel secara tetap */
        table-layout: fixed;
        /* Pastikan lebar kolom tetap */
        border-spacing: 0;
    }

    td,
    th {
        border: 1px solid #1c2939;
        padding: 8px;
        /* Padding yang lebih baik */
        position: relative;
        color: black;
        text-align: center;
    }

    /* Container untuk tabel */
    .table-container {
        overflow-x: auto;
        /* Aktifkan scroll horizontal */
        -webkit-overflow-scrolling: touch;
        /* Memperhalus scroll pada perangkat iOS */
        margin: 10px 0;
        width: 100%;
        /* Container mengikuti lebar parent */
        background-color: white;
    }

    input {
        width: 100%;
        border: none;
        padding: 0px;
        box-sizing: border-box;
    }

    select {
        width: 100%;
        border: none;
        padding: 8px;
        box-sizing: border-box;
    }

    input:focus,
    select:focus {
        outline: 2px solid blue;
    }

    button {
        margin: 10px 0;
        padding: 10px;
    }

    .top-aligned {
        vertical-align: top;
        text-align: center;
        padding-top: 8px;
    }
</style>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <form id="formTambah" action="javascript:void(0);">
        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tiket /</span> Form QR Code</h4>
            <div class="row justify-content-between align-items-start">
                <h6 class="mb-0 text-hitam" style="font-weight: 100;">FRM.DGT.05.02/</h6>
            </div>
            <div class="row justify-content-between align-items-start">
                <div class="col-12 col-sm-5 col-md-4 mb-5 d-flex justify-content-center">
                    <img src="<?= base_url('/assets/img/icons/Form QR Code.jpg') ?>"
                        style="width: 100%; max-width: 100%; max-height: 16rem; object-fit: contain;" alt="Logo" />
                </div>

                <div class="col-12 col-sm-5 col-md-4 mb-5 d-flex justify-content-center">
                    <img src="<?= base_url('/assets/img/icons/C2.png') ?>"
                        style="width: 70%; max-width: 100%; max-height: 16rem; object-fit: contain;" alt="Form C2" />
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <h5 class="card-header mb-0 text-hitam">FORMULIR PEMESANAN HALAMAN <i>QR CODE</i></h5>

            <div class="row mt-0 mx-0">
                <div class="col-xl-6 mb-2 px-0">
                    <div class="row mt-2 mb-2">
                        <label for="" class="col-12 col-md-3 col-form-label text-biru" style="font-size: large;">KODE
                            BUKU</label>
                        <div class="col-12 col-md-6">
                            <span class="form-control text-hitam border-hitam w-100"><?= esc($tiketData['kode_buku']) ?></span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="" class="col-12 col-md-3 col-form-label text-biru" style="font-size: large;">JUDUL
                            BUKU</label>
                        <div class="col-12 col-md-6">
                            <span class="form-control text-hitam border-hitam w-100"><?= esc($tiketData['judul_buku']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <!-- Row 1 -->
            <div class="row">
                <!-- Column 1 -->
                <div class="col-xl-12 mb-2">
                    <!-- <button id="addRowButton">Tambah Baris</button> -->
                    <div class="table-container">
                        <table id="tableC2">
                            <tr>
                                <th class="text-center" style="width: 150px;">Kode Buku<br>(10 digit, cnth:<br>0024200260)</th>
                                <th class="text-center d-none">ID Tiket C2</th>
                                <th class="text-center" style="width: 50px;">No.</th>
                                <th class="text-center" style="width: 150px;">No. Halaman<br>(4 digit, cnth: 0001)</th>
                                <th class="text-center" style="width: 150px;">No. Konten<br>(2 digit, cnth: 01)</th>
                                <th class="text-center" style="width: 150px;">No. Halaman<br>Setelah direvisi</th>
                                <th class="text-center" style="width: 150px;">Ekstensi Konten<br>untuk video: MP4<br>untuk audio: MP3<br>PDF,RAR,APK</th>
                                <th class="text-center" style="width: 50px;">Aksi</th>
                            </tr>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary" id="addRowButton" type="button">Tambah Baris</button>
                        <!-- <div id="paginationContainer" class="d-flex justify-content-center mt-3"></div> -->
                        <!-- <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">2</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <!-- Row 1 -->
            <div class="row">
                <!-- Column 1 (Pemesan) -->
                <div class="col-xl-5 mb-3">
                    <!-- Single Header for "Pemesan" -->
                    <h6 class="text-center border-xatas py-2 warna-pink text-hitam mb-0 mt-4">Pemesan</h6>

                    <div class="row mx-0 d-flex align-items-stretch">

                        <!-- Editor Card -->
                        <div class="col-12 col-md-6 mb-2 px-0 d-flex">
                            <div class="card h-100 border-c2 w-100 <?= in_array($tiketData['approved_order_editor'], ['Y', 'R']) ? 'mb-2' : 'mb-5'; ?>">
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                        <?= $tiketData['approved_order_editor'] === 'R' ? 'Tanggal Rejected:' : 'Tanggal:' ?>
                                    </p>
                                    <?php if (!empty($tiketData['tgl_order_editor']) && $tiketData['tgl_order_editor'] !== '0000-00-00' && $tiketData['tgl_order_editor'] !== '-0001-11-30'): ?>
                                        <p class="text-start text-biru" style="font-size:xx-small;"> <?= date('d/m/Y', strtotime($tiketData['tgl_order_editor'])); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <?php if ($tiketData['approved_order_editor'] === 'Y'): ?>
                                    <div class="approved-status">
                                        <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                    </div>
                                <?php elseif ($tiketData['approved_order_editor'] === 'R'): ?>
                                    <div class="approved-status">
                                        <img src="<?= base_url('/assets/img/icons/rejected.png') ?>" style="height: 3.5rem;" alt="Rejected" />
                                    </div>
                                <?php else: ?>
                                    <!-- Ruang Kosong -->
                                    <div style="height: 1rem; background-color: transparent;">
                                    </div>
                                <?php endif; ?>
                                <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;">
                                    <?= esc($tiketData['editor_nama'] ?? '     ') ?>
                                </p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2"
                                    style="font-size:x-small">Editor</p>
                            </div>
                        </div>

                        <!-- Koord Editor Card -->
                        <div class="col-12 col-md-6 mb-2 px-0 d-flex">
                            <div class="card h-100 border-c2 w-100 <?= in_array($tiketData['approved_order_koord'], ['Y', 'R']) ? 'mb-2' : 'mb-5'; ?>">
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                        <?= $tiketData['approved_order_koord'] === 'R' ? 'Tanggal Rejected:' : 'Tanggal:' ?>
                                    </p>
                                    <?php if (!empty($tiketData['tgl_order_koord']) && $tiketData['tgl_order_koord'] !== '0000-00-00' && $tiketData['tgl_order_koord'] !== '-0001-11-30'): ?>
                                        <p class="text-start text-biru" style="font-size:xx-small;">
                                            <?= date('d/m/Y', strtotime($tiketData['tgl_order_koord'])); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <?php if ($tiketData['approved_order_koord'] === 'Y'): ?>
                                    <div class="approved-status">
                                        <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                    </div>
                                <?php elseif ($tiketData['approved_order_koord'] === 'R'): ?>
                                    <div class="approved-status">
                                        <img src="<?= base_url('/assets/img/icons/rejected.png') ?>" style="height: 3.5rem;" alt="Rejected" />
                                    </div>
                                <?php else: ?>
                                    <!-- Ruang Kosong -->
                                    <div style="height: 1rem; background-color: transparent;">
                                    </div>
                                <?php endif; ?>
                                <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;">
                                    <?= esc($tiketData['koord_nama'] ?? '     ') ?>
                                </p>
                                <p class="text-center text-biru mb-0 py-1 nama-koord warna-pink border-atas2"
                                    style="font-size:x-small;">Koord. Editor</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Combined Column for "Diperiksa," "Approval," and "Arsip" -->
                <div class="col-xl-7 mb-3">
                    <div class="row mt-4 mx-0 d-flex align-items-stretch">

                        <!-- Diperiksa Card -->
                        <div class="col-12 col-md-4 mb-2 px-0 d-flex">
                            <div class="card h-100 border-c2 w-100 <?= in_array($tiketData['approved_multimedia'], ['Y', 'R']) ? 'mb-2' : 'mb-5'; ?>">
                                <h6 class="text-center border-bawah py-2 warna-pink text-hitam mb-0">Diperiksa</h6>
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                        <?= $tiketData['approved_multimedia'] === 'R' ? 'Tanggal Rejected:' : 'Tanggal:' ?>
                                    </p>
                                    <?php if (!empty($tiketData['tgl_acc_multimedia']) && $tiketData['tgl_acc_multimedia'] !== '0000-00-00' && $tiketData['tgl_acc_multimedia'] !== '-0001-11-30'): ?>
                                        <p class="text-start text-biru" style="font-size:xx-small;">
                                            <?= date('d/m/Y', strtotime($tiketData['tgl_acc_multimedia'])); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <?php if ($tiketData['approved_multimedia'] === 'Y'): ?>
                                    <div class="approved-status">
                                        <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                    </div>
                                <?php elseif ($tiketData['approved_multimedia'] === 'R'): ?>
                                    <div class="approved-status">
                                        <img src="<?= base_url('/assets/img/icons/rejected.png') ?>" style="height: 3.5rem;" alt="Rejected" />
                                    </div>
                                <?php else: ?>
                                    <!-- Ruang Kosong -->
                                    <div style="height: 1rem; background-color: transparent;">
                                    </div>
                                <?php endif; ?>
                                <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;">
                                    <?php if ($userData['level_user'] === 'Tim Multimedia'): ?>
                                        <?= esc($tiketData['multimedia_nama'] ?? $userData['nama']); ?>
                                    <?php else: ?>
                                        <?= esc($tiketData['multimedia_nama'] ?? '     '); ?>
                                    <?php endif; ?>
                                </p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2"
                                    style="font-size:x-small;">Tim Multimedia</p>
                            </div>
                        </div>

                        <!-- Approval Card -->
                        <div class="col-12 col-md-4 mb-2 px-0 d-flex">
                            <div class="card h-100 border-c2 w-100 <?= in_array($tiketData['approved_acc_manager'], ['Y', 'R']) ? 'mb-2' : 'mb-5'; ?>">
                                <h6 class="text-center border-bawah py-2 warna-pink text-hitam mb-0"><i>Approval</i>
                                </h6>
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                        <?= $tiketData['approved_acc_manager'] === 'R' ? 'Tanggal Rejected:' : 'Tanggal:' ?>
                                    </p>
                                    <?php if (!empty($tiketData['tgl_acc_manager']) && $tiketData['tgl_acc_manager'] !== '0000-00-00' && $tiketData['tgl_acc_manager'] !== '-0001-11-30'): ?>
                                        <p class="text-start text-biru"
                                            style="font-size:xx-small;">
                                            <?= date('d/m/Y', strtotime($tiketData['tgl_acc_manager'])); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <?php if ($tiketData['approved_acc_manager'] === 'Y'): ?>
                                    <div class="approved-status">
                                        <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                    </div>
                                <?php elseif ($tiketData['approved_acc_manager'] === 'R'): ?>
                                    <div class="approved-status">
                                        <img src="<?= base_url('/assets/img/icons/rejected.png') ?>" style="height: 3.5rem;" alt="Rejected" />
                                    </div>
                                <?php else: ?>
                                    <!-- Ruang Kosong -->
                                    <div style="height: 1rem; background-color: transparent;">
                                    </div>
                                <?php endif; ?>
                                <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;">Suksma</p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2" style="font-size:x-small;">Manager Platform Digital</p>
                            </div>
                        </div>

                        <!-- Arsip Card -->
                        <div class="col-12 col-md-4 mb-2 px-0 d-flex">
                            <div class="card h-100 border-c2 w-100 <?= in_array($tiketData['approved_order_admin'], ['Y', 'R']) ? 'mb-2' : 'mb-5'; ?>">
                                <h6 class="text-center border-bawah py-2 warna-pink text-hitam mb-0">Arsip</h6>
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                        <?= $tiketData['approved_order_admin'] === 'R' ? 'Tanggal Rejected:' : 'Tanggal:' ?>
                                    </p>
                                    <?php if (!empty($tiketData['tgl_acc_admin']) && $tiketData['tgl_acc_admin'] !== '0000-00-00' && $tiketData['tgl_acc_admin'] !== '-0001-11-30'): ?>
                                        <p class="text-start text-biru" style="font-size:xx-small;">
                                            <?= date('d/m/Y', strtotime($tiketData['tgl_acc_admin'])); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <?php if ($tiketData['approved_order_admin'] === 'Y'): ?>
                                    <div class="approved-status">
                                        <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                    </div>
                                <?php elseif ($tiketData['approved_order_admin'] === 'R'): ?>
                                    <div class="approved-status">
                                        <img src="<?= base_url('/assets/img/icons/rejected.png') ?>" style="height: 3.5rem;" alt="Rejected" />
                                    </div>
                                <?php else: ?>
                                    <!-- Ruang Kosong -->
                                    <div style="height: 1rem; background-color: transparent;">
                                    </div>
                                <?php endif; ?>
                                <p class="text-center mb-0 px-1 text-hitam" style="font-size:x-small;">
                                    <?php if ($userData['level_user'] === 'Admin Sistem'): ?>
                                        <?= esc($tiketData['admin_nama'] ?? $userData['nama']); ?>
                                    <?php else: ?>
                                        <?= esc($tiketData['admin_nama'] ?? '     '); ?>
                                    <?php endif; ?>
                                </p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2"
                                    style="font-size:x-small;">Admin</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <!-- Row 2 -->
            <div class="row">
                <!-- Column 1 (Pemesan) -->
                <div class="col-xl-12 mb-3">
                    <div class="col-xl-12 d-flex justify-content-center">
                        <img src="<?= base_url('/assets/img/icons/C2 ket.png') ?>"
                            style="width: 100%; max-width: 100%; max-height: 16rem; object-fit: cover;" alt="Logo" />
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <!-- Row 3 -->
            <div class="row justify-content-center my-3">
                <div class="col-xl-6">
                    <button id="btnsimpan" class="btn btn-primary d-grid w-100">Simpan</button>
                    <p id="errorMessage" class="text-danger" style="display:none;"></p>
                </div>
            </div>
        </div>
    </form>
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
<!-- / Content wrapper -->
</div>
<!-- / Layout page -->
</div>
<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const idTiketC1 = <?= json_encode($tiketData['id_tiket']) ?>;

    $(document).ready(function() {
        const addRowButton = document.getElementById('addRowButton');
        const errorMessage = document.getElementById("errorMessage");
        const totalColumns = 7;
        let mergedCell = null;
        let rowSpanCount = 0;
        const kodeBuku = "<?= esc($tiketData['kode_buku']) ?>";
        tiket = encodeBase64(idTiketC1);
        let isEditMode = false;
        let editRowId = null;

        function encodeBase64(id) {
            return btoa(id); // 'btoa' digunakan untuk encoding Base64
        }

        function addNavigationListener(element) {
            element.addEventListener('keydown', (e) => {
                const inputs = tableC2.querySelectorAll('input, select');
                const index = Array.from(inputs).indexOf(e.target);

                if (index === -1) return;

                let targetIndex = index;
                if (e.target.tagName.toLowerCase() === 'select' && (e.key === 'ArrowUp' || e.key === 'ArrowDown' || e.key === 'ArrowRight')) {
                    e.preventDefault();
                }

                switch (e.key) {
                    case 'Enter':
                    case 'Tab':
                        e.preventDefault();
                        targetIndex = index + 1;
                        break;
                    case 'ArrowLeft':
                        e.preventDefault();
                        targetIndex = index - 1;
                        break;
                    case 'ArrowRight':
                        targetIndex = index + 1;
                        break;
                    case 'ArrowUp':
                        targetIndex = index - totalColumns + 2;
                        break;
                    case 'ArrowDown':
                        targetIndex = index + totalColumns - 2;
                        break;
                    default:
                        return;
                }

                if (targetIndex >= 0 && targetIndex < inputs.length) {
                    inputs[targetIndex].focus();
                }
            });
        }

        function getColumnName(index) {
            const columnNames = ['', 'id_tiket_c2', 'no', 'no_halaman', 'no_konten', 'no_hal_rev', 'ekstensi_konten', 'Aksi'];
            return columnNames[index] || `col_${index}`; // Return default name if index is out of bounds
        }

        function fetchEkstensiKonten() {
            return $.ajax({
                url: '<?= site_url('tiket/ekstensi') ?>',
                type: 'GET',
                dataType: 'json'
            });
        }

        function fetchData(tiket) {
            return $.ajax({
                url: '<?= site_url('tiket/getData') ?>' + '?tiket=' + tiket, // Sesuaikan dengan endpoint baru
                type: 'GET',
                dataType: 'json'
            });
        }

        fetchEkstensiKonten().done(function(ekstensiOptions) {
            fetchData(tiket).done(function(data) {
                // Tentukan jumlah minimum baris yang ingin ditampilkan
                const MIN_ROWS = 10;
                let currentPage = 1;
                const emptyRowCount = MIN_ROWS - data.length;
                let number = 1;
                // Tambahkan baris berdasarkan data dari server
                data.forEach(rowData => {
                    addRow(rowData, ekstensiOptions, number);
                    number++;
                });

                // Tambahkan baris kosong jika data dari server kurang dari MIN_ROWS
                for (let i = 0; i < emptyRowCount; i++) {
                    addRow({}, ekstensiOptions, number); // Kirim objek kosong untuk baris kosong
                    number++;
                }
            });
        });

        // Menambahkan event listener ke tombol addRowButton
        $('#addRowButton').on('click', function() {
            fetchEkstensiKonten().done(function(ekstensiOptions) {
                const tableC2 = $('#tableC2')[0];
                const number = tableC2.rows.length; // Menentukan nomor urut baris baru
                addRow({}, ekstensiOptions, number); // Menambahkan baris baru dengan data kosong
            });
        });

        function addRow(data, ekstensiOptions, number) {
            const newRow = document.createElement('tr')

            // Existing row setup for update mode
            if (data.id_tiket) {
                isEditMode = true;
                editRowId = data.id_tiket;
            }
            // Loop melalui setiap kolom untuk setiap sel dalam baris
            for (let i = 0; i < totalColumns; i++) {
                const newCell = document.createElement('td');
                newCell.setAttribute('data-col', getColumnName(i));

                // Kolom pertama khusus
                if (i === 0) {
                    if (!mergedCell) {
                        mergedCell = document.createElement('td');
                        mergedCell.rowSpan = 1;
                        mergedCell.textContent = kodeBuku;
                        mergedCell.classList.add('top-aligned');
                        newRow.appendChild(mergedCell);
                    }
                    continue;
                }

                // Kolom input data dari database atau kosong jika tidak ada data
                if (i === 1) {
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = data.id_tiket_c2; // Tetapkan nilai kosong
                    input.readOnly = true;
                    // input.textContent = data.no; // Tampilkan data "no" atau kosong
                    newCell.appendChild(input);
                    addNavigationListener(input);

                    // Sembunyikan kolom
                    newCell.style.display = "none"; // Menyembunyikan sel dalam tabel
                } else if (i === 2) {
                    const input = document.createElement('span');
                    input.classList.add('mb-0');
                    // input.type = 'text';
                    // input.value = number; // Tetapkan nilai kosong
                    input.textContent = number; // Tampilkan data number
                    // newRow.appendChild(input)
                    // input.readOnly = true;
                    newCell.appendChild(input);
                    addNavigationListener(input);
                } else if (i === 3 && data.no_halaman) {
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = data.no_halaman; // Tetapkan nilai kosong
                    // input.textContent = data.no_halaman; // Tampilkan data "no_halaman" atau kosong
                    newCell.appendChild(input);
                    addNavigationListener(input);
                } else if (i === 4 && data.no_konten) {
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = data.no_konten; // Tetapkan nilai kosong
                    // input.textContent = data.no_konten; // Tampilkan data "no_konten" atau kosong
                    newCell.appendChild(input);
                    addNavigationListener(input);
                } else if (i === 5 && data.no_hal_rev) {
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = data.no_hal_rev; // Tetapkan nilai kosong
                    // input.textContent = data.no_hal_rev; // Tampilkan data "no_hal_rev" atau kosong
                    newCell.appendChild(input);
                    addNavigationListener(input);
                } else if (i === totalColumns - 1) {
                    const select = document.createElement('select');
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = 'Pilih Ekstensi Konten';
                    defaultOption.disabled = true;
                    defaultOption.selected = true;
                    select.appendChild(defaultOption);

                    ekstensiOptions.forEach(optionText => {
                        const option = document.createElement('option');
                        option.value = optionText;
                        option.textContent = optionText;
                        select.appendChild(option);

                        // Cek apakah nilai ini ada di data dan jika ada, set option sebagai terpilih
                        if (data.ekstensi_konten && data.ekstensi_konten === optionText) {
                            option.selected = true; // Pilih opsi yang sesuai dengan nilai dari database
                        }
                    });
                    newCell.appendChild(select);
                    addNavigationListener(select);
                } else {
                    // Jika kolom tidak memiliki data dari database, tambahkan input kosong
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = ''; // Tetapkan nilai kosong
                    newCell.appendChild(input);
                    addNavigationListener(input);
                }
                newRow.appendChild(newCell);
            }

            // Menambahkan tombol Delete pada row terakhir (sebagai contoh)
            const deleteCell = document.createElement('td');
            // deleteCell.classList.add('aksi');
            const deleteButton = document.createElement('a');
            deleteButton.classList.add('rounded-pill', 'btn-icon', 'btn-label-danger');
            deleteButton.setAttribute('type', 'button');
            deleteButton.setAttribute('title', 'Hapus Baris');
            // Membuat ikon dengan Font Awesome atau Boxicons
            const icon = document.createElement('span');
            icon.classList.add('tf-icons', 'bx', 'bx-trash', 'bx-sm'); // Menambahkan kelas untuk ikon
            // Menambahkan ikon ke dalam tombol <a>
            deleteButton.appendChild(icon);
            deleteButton.addEventListener('click', function() {
                // Panggil fungsi untuk menghapus data
                deleteRow(data.id_tiket_c2);
            });
            deleteCell.appendChild(deleteButton);
            newRow.appendChild(deleteCell);

            if (mergedCell) {
                mergedCell.rowSpan = ++rowSpanCount;
            }

            tableC2.appendChild(newRow);
        }

        function deleteRow(idTiket) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda akan menghapus baris ini.',
                icon: 'warning',
                showCancelButton: true, // Menampilkan tombol 'Batal'
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                allowOutsideClick: true, // Mengizinkan klik di luar untuk menutup alert
                backdrop: true // Latar belakang dengan efek
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://localhost:8080/tiket/hapus/' + idTiket, // Menggunakan segment
                        type: 'DELETE', // Sesuai dengan routing
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                // Reset mode edit setelah delete berhasil
                                isEditMode = false;
                                editRowId = null;
                                Swal.fire('Berhasil!', 'Baris berhasil dihapus.', 'success').then(function() {
                                    location.reload();
                                }); // Menampilkan pesan sukses
                            } else {
                                alert("Terjadi kesalahan: " + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Gagal terhubung ke server. Silakan coba lagi.");
                        }
                    });
                }
            });
        }

        // function tambah(idTiket) {
        const form = $('#formTambah');
        // const errorMessage = $('#errorMessage');
        const tableC2 = $('#tableC2')[0];

        // Listen for form submission
        $('#formTambah').submit(function(event) {
            event.preventDefault();

            const data = [];
            const rows = tableC2.querySelectorAll('tr');

            rows.forEach(row => {
                const rowData = {
                    id_tiket_c2: row.querySelector('[data-col="id_tiket_c2"] input')?.value || '',
                    no_halaman: row.querySelector('[data-col="no_halaman"] input')?.value || '',
                    no_konten: row.querySelector('[data-col="no_konten"] input')?.value || '',
                    no_halaman_revisi: row.querySelector('[data-col="no_hal_rev"] input')?.value || '',
                    ekstensi_konten: row.querySelector('[data-col="ekstensi_konten"] select')?.value || ''
                };
                // If editing, send the `editRowId` as well
                if (isEditMode) {
                    rowData.id_tiket = editRowId;
                }

                // Periksa apakah ada nilai selain 'no' yang tidak kosong
                const hasOtherValues = rowData.no_halaman || rowData.no_konten || rowData.no_halaman_revisi || rowData.ekstensi_konten;

                // Jika ada nilai selain 'no', masukkan ke dalam array
                if (hasOtherValues) {
                    data.push(rowData);
                }

                // if (Object.values(rowData).some(value => value !== '')) {
                //     data.push(rowData);
                // }
            });


            $.ajax({
                url: 'http://localhost:8080/saveC2',
                type: 'POST',
                data: {
                    id_tiket: idTiketC1, // Kirim id_tiket terpisah dari dataRows
                    dataRows: data
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire('Berhasil!', 'Data berhasil disimpan.', 'success').then(function() {
                            location.reload();
                        });
                        // errorMessage.hide();
                    } else {
                        errorMessage.text(response.message || "Terjadi kesalahan saat menyimpan data.");
                        errorMessage.show();
                    }
                },
                error: function(xhr, status, error) {
                    errorMessage.text("Gagal terhubung ke server. Silakan coba lagi.");
                    errorMessage.show();
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>