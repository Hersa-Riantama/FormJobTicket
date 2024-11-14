<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        table-layout: auto;
        border-spacing: 0;
    }

    td,
    th {
        border: 1px solid #1c2939;
        padding-left: 8px;
        position: relative;
        color: black;
        width: auto;
    }

    th.no-column,
    td.no-column {
        width: 5%;
        /* Atur lebar kolom "No." */
        text-align: center;
    }

    input,
    select {
        width: 100%;
        border: none;
        /* padding: 8px; */
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

    /* Membuat tabel responsif */
    .table-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        /* Memperhalus scroll pada perangkat iOS */
        margin: 10px 0;
        width: 100%;
        background-color: white;
        /* Pastikan kontainer mengisi seluruh lebar */
    }

    .top-aligned {
        vertical-align: top;
        padding-top: 8px;
        /* Adjust padding as needed */
    }

    /* Menambahkan media query untuk perangkat dengan lebar maksimum 600px */
    @media screen and (max-width: 600px) {

        /* Menjadikan tabel bisa digulir horizontal pada perangkat mobile */
        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        /* Pastikan tabel bisa digulir horizontal */
        table {
            width: 100%;
            display: block;
            /* Menjadikan tabel bisa digulirkan */
            table-layout: fixed;
            /* Mengatur layout tabel agar lebih responsif */
        }

        /* Mengatur lebar kolom dan padding untuk mobile */
        th,
        td {
            padding: 8px;
            font-size: 0.9rem;
            /* Menyesuaikan ukuran font agar lebih kecil */
        }

        /* Optional: Mengatur ukuran kolom untuk kolom tertentu jika dibutuhkan */
        th,
        td {
            min-width: 150px;
            /* Menjamin kolom tidak terlalu sempit */
        }
    }
</style>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <form id="formTambah" action="javascript:void(0);">
        <div class="form-group">

            <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tiket /</span> Form QR Code</h4>
                <div class="row justify-content-between align-items-start">
                    <h6 class="mb-0 text-hitam" style="font-weight: 100;">FRM.DGT.05.02/</h6>
                </div>
                <div class="row justify-content-between align-items-start">
                    <div class="col-xl-4 mb-5 d-flex justify-content-center">
                        <img src="<?= base_url('/assets/img/icons/Form QR Code.jpg') ?>"
                            style="width: 100%; max-width: 100%; max-height: 16rem; object-fit: cover;" alt="Logo" />
                    </div>

                    <div class="col-xl-4 mb-5 d-flex justify-content-center">
                        <img src="<?= base_url('/assets/img/icons/C2.png') ?>"
                            style="width: 70%; max-width: 100%; max-height: 16rem; object-fit: cover;" alt="Form C1" />
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <h5 class="card-header mb-0 text-hitam">FORMULIR PEMESANAN HALAMAN <i>QR CODE</i></h5>

            <div class="row mt-0 ms-0">
                <div class="col-xl-6 mb-2 px-0">
                    <div class="row mt-2 mb-2">
                        <label for="" class="col-12 col-md-3 col-form-label text-biru" style="font-size: large;">KODE
                            BUKU</label>
                        <div class="col-12 col-md-6">
                            <input class="form-control text-hitam border-hitam w-100" type="text"
                                value="<?= esc($tiketData['kode_buku']) ?>" id="" name="" readonly />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="" class="col-12 col-md-3 col-form-label text-biru" style="font-size: large;">JUDUL
                            BUKU</label>
                        <div class="col-12 col-md-6">
                            <input class="form-control text-hitam border-hitam w-100" type="text"
                                value="<?= esc($tiketData['judul_buku']) ?>" id="" name="" readonly />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <!-- Row 2 -->
            <div class="row">
                <!-- Column 1 -->
                <div class="col-xl-12 mb-2">
                    <div class="row">
                        <div class="col-md px-3">
                            <!-- <button id="addRowButton">Tambah Baris</button> -->
                            <div class="table-container">
                                <table id="dataTable">
                                    <tr>
                                        <th class="text-center">Kode Buku<br>(10 digit, cnth:<br>0024200260)</th>
                                        <th class="text-center no-column">No.</th>
                                        <th class="text-center">No. Halaman<br>(4 digit, cnth: 0001)</th>
                                        <th class="text-center">No. Konten<br>(2 digit, cnth: 01)</th>
                                        <th class="text-center">No. Halaman<br>Setelah direvisi</th>
                                        <th class="text-center">Ekstensi Konten<br>untuk video: MP4<br>untuk audio:
                                            MP3<br>PDF,RAR,APK</th>
                                    </tr>
                                </table>
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
                <div class="col-xl-5 mb-3">
                    <!-- Single Header for "Pemesan" -->
                    <h6 class="text-center border-xatas py-2 warna-pink text-hitam mb-0 mt-4">Pemesan</h6>

                    <div class="row mx-0 d-flex align-items-stretch">

                        <!-- Editor Card -->
                        <div class="col-12 col-md-6 mb-2 px-0 d-flex">
                            <div class="card h-100 mb-5 border-c2 w-100">
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate"
                                    style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                    <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                </div>
                                <div style="height: 1rem; background-color: transparent;"></div>
                                <p class="text-start mb-0 px-1 nama-editor text-hitam" style="font-size:x-small;">
                                    <?= '     '; ?>
                                </p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2"
                                    style="font-size:x-small">Editor</p>
                            </div>
                        </div>

                        <!-- Koord Editor Card -->
                        <div class="col-12 col-md-6 mb-2 px-0 d-flex">
                            <div class="card h-100 mb-5 border-c2 w-100">
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate"
                                    style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                    <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                </div>
                                <div style="height: 1rem; background-color: transparent;"></div>
                                <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= '     '; ?>
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
                            <div class="card h-100 border-c2 mb-5 w-100">
                                <h6 class="text-center border-bawah py-2 warna-pink text-hitam mb-0">Diperiksa</h6>
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate"
                                    style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                    <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                </div>
                                <div style="height: 1rem; background-color: transparent;"></div>
                                <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= '     '; ?>
                                </p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2"
                                    style="font-size:x-small;">Tim Multimedia</p>
                            </div>
                        </div>

                        <!-- Approval Card -->
                        <div class="col-12 col-md-4 mb-2 px-0 d-flex">
                            <div class="card h-100 border-c2 mb-5 w-100">
                                <h6 class="text-center border-bawah py-2 warna-pink text-hitam mb-0"><i>Approval</i>
                                </h6>
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate"
                                    style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                    <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                </div>
                                <div style="height: 1rem; background-color: transparent;"></div>
                                <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= '     '; ?>
                                </p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2"
                                    style="font-size:x-small;">Manager Platform Digital</p>
                            </div>
                        </div>

                        <!-- Arsip Card -->
                        <div class="col-12 col-md-4 mb-2 px-0 d-flex">
                            <div class="card h-100 border-c2 mb-5 w-100">
                                <h6 class="text-center border-bawah py-2 warna-pink text-hitam mb-0">Arsip</h6>
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate"
                                    style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                    <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                </div>
                                <div style="height: 1rem; background-color: transparent;"></div>
                                <p class="text-center mb-0 px-1 text-hitam" style="font-size:x-small;"><?= '     '; ?>
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
    document.addEventListener("DOMContentLoaded", function() {
        // const addRowButton = document.getElementById('addRowButton');
        const errorMessage = document.getElementById("errorMessage");
        const totalColumns = 6;
        let mergedCell = null;
        let rowSpanCount = 0;
        const kodeBuku = "<?= esc($tiketData['kode_buku']) ?>";


        function fetchEkstensiKonten() {
            return $.ajax({
                url: '<?= site_url('tiket/ekstensi') ?>',
                type: 'GET',
                dataType: 'json'
            });
        }

        function fetchData() {
            return $.ajax({
                url: '<?= site_url('tiket/getData') ?>', // Sesuaikan dengan endpoint baru
                type: 'GET',
                dataType: 'json'
            });
        }

        // function addRow(ekstensiOptions) {
        //     const newRow = document.createElement('tr');

        //     for (let i = 0; i < totalColumns; i++) {
        //         const newCell = document.createElement('td');
        //         // Tambahkan atribut data-col pada setiap cell
        //         newCell.setAttribute('data-col', getColumnName(i)); // Mengambil nama kolom berdasarkan index

        //         if (i === 0) {
        //             if (!mergedCell) {
        //                 mergedCell = document.createElement('td');
        //                 mergedCell.rowSpan = 1;
        //                 mergedCell.textContent = kodeBuku;
        //                 mergedCell.classList.add('top-aligned');
        //                 newRow.appendChild(mergedCell);
        //             }
        //             continue;
        //         }

        //         if (i === totalColumns - 1) {
        //             const select = document.createElement('select');
        //             const defaultOption = document.createElement('option');
        //             defaultOption.value = '';
        //             defaultOption.textContent = 'Pilih Ekstensi Konten';
        //             defaultOption.disabled = true;
        //             defaultOption.selected = true;
        //             select.appendChild(defaultOption);

        //             ekstensiOptions.forEach(optionText => {
        //                 const option = document.createElement('option');
        //                 option.value = optionText;
        //                 option.textContent = optionText;
        //                 select.appendChild(option);
        //             });
        //             newCell.appendChild(select);
        //             addNavigationListener(select);
        //         } else {
        //             const input = document.createElement('input');
        //             input.type = 'text';
        //             newCell.appendChild(input);
        //             addNavigationListener(input);
        //         }

        //         newRow.appendChild(newCell);
        //     }

        //     if (mergedCell) {
        //         mergedCell.rowSpan = ++rowSpanCount;
        //     }

        //     dataTable.appendChild(newRow);
        // }

        // function addRow(data, ekstensiOptions) {
        //     const newRow = document.createElement('tr');

        //     // Loop melalui kolom untuk setiap sel dalam baris
        //     for (let i = 0; i < totalColumns; i++) {
        //         const newCell = document.createElement('td');
        //         newCell.setAttribute('data-col', getColumnName(i));

        //         if (i === 0) {
        //             if (!mergedCell) {
        //                 mergedCell = document.createElement('td');
        //                 mergedCell.rowSpan = 1;
        //                 mergedCell.textContent = kodeBuku;
        //                 mergedCell.classList.add('top-aligned');
        //                 newRow.appendChild(mergedCell);
        //             }
        //             continue;
        //         }

        //         // Kolom input data dari database
        //         if (i === 1) {
        //             newCell.textContent = data.no || ''; // Tampilkan data "no"
        //         } else if (i === 2) {
        //             newCell.textContent = data.no_halaman || ''; // Tampilkan data "no_halaman"
        //         } else if (i === 3) {
        //             newCell.textContent = data.no_konten || ''; // Tampilkan data "no_konten"
        //         } else if (i === 4) {
        //             newCell.textContent = data.no_hal_rev || ''; // Tampilkan data "no_hal_rev"
        //         } else if (i === totalColumns - 1) {
        //             const select = document.createElement('select');
        //             const defaultOption = document.createElement('option');
        //             defaultOption.value = '';
        //             defaultOption.textContent = 'Pilih Ekstensi Konten';
        //             defaultOption.disabled = true;
        //             defaultOption.selected = true;
        //             select.appendChild(defaultOption);

        //             ekstensiOptions.forEach(optionText => {
        //                 const option = document.createElement('option');
        //                 option.value = optionText;
        //                 option.textContent = optionText;
        //                 select.appendChild(option);
        //             });
        //             newCell.appendChild(select);
        //             addNavigationListener(select);
        //         } else {
        //             const input = document.createElement('input');
        //             input.type = 'text';
        //             newCell.appendChild(input);
        //             addNavigationListener(input);
        //         }

        //         newRow.appendChild(newCell);
        //     }

        //     if (mergedCell) {
        //         mergedCell.rowSpan = ++rowSpanCount;
        //     }

        //     dataTable.appendChild(newRow);
        // }

        function addRow(data, ekstensiOptions) {
            const newRow = document.createElement('tr');

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
                if (i === 1 && data.no) {
                    newCell.textContent = data.no; // Tampilkan data "no" atau kosong
                } else if (i === 2 && data.no_halaman) {
                    newCell.textContent = data.no_halaman; // Tampilkan data "no_halaman" atau kosong
                } else if (i === 3 && data.no_konten) {
                    newCell.textContent = data.no_konten; // Tampilkan data "no_konten" atau kosong
                } else if (i === 4 && data.no_hal_rev) {
                    newCell.textContent = data.no_hal_rev; // Tampilkan data "no_hal_rev" atau kosong
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

            if (mergedCell) {
                mergedCell.rowSpan = ++rowSpanCount;
            }

            dataTable.appendChild(newRow);
        }

        function getColumnName(index) {
            const columnNames = ['', 'no', 'no_halaman', 'no_konten', 'no_hal_rev', 'ekstensi_konten'];
            return columnNames[index] || `col_${index}`; // Return default name if index is out of bounds
        }

        // Ambil ekstensi konten dari server dan tambahkan baris
        // fetchEkstensiKonten().done(function(ekstensiOptions) {
        //     fetchData().done(function(data) {
        //         data.forEach(rowData => {
        //             // Tambahkan 45 baris ke tabel saat halaman dimuat
        //             for (let i = 0; i < 5; i++) {
        //                 addRow(rowData, ekstensiOptions);
        //             }
        //         });
        //     });
        // });

        // fetchEkstensiKonten().done(function(ekstensiOptions) {
        //     fetchData().done(function(data) {
        //         // Tambahkan satu baris ke tabel untuk setiap item data dari database
        //         data.forEach(rowData => {
        //             addRow(rowData, ekstensiOptions);
        //         });
        //     });
        // });

        // const MAX_ROWS = 5; // Ubah sesuai jumlah baris yang diinginkan

        // fetchEkstensiKonten().done(function(ekstensiOptions) {
        //     fetchData().done(function(data) {
        //         // Batasi jumlah baris yang ditampilkan
        //         const limitedData = data.slice(0, MAX_ROWS);
        //         limitedData.forEach(rowData => {
        //             addRow(rowData, ekstensiOptions);
        //         });
        //     });
        // });

        fetchEkstensiKonten().done(function(ekstensiOptions) {
            fetchData().done(function(data) {
                // Tentukan jumlah minimum baris yang ingin ditampilkan
                const MIN_ROWS = 10;
                const emptyRowCount = MIN_ROWS - data.length;

                // Tambahkan baris berdasarkan data dari server
                data.forEach(rowData => {
                    addRow(rowData, ekstensiOptions);
                });

                // Tambahkan baris kosong jika data dari server kurang dari MIN_ROWS
                for (let i = 0; i < emptyRowCount; i++) {
                    addRow({}, ekstensiOptions); // Kirim objek kosong untuk baris kosong
                }
            });
        });

        addRowButton.addEventListener('click', function() {
            fetchEkstensiKonten().done(function(ekstensiOptions) {
                addRow(ekstensiOptions);
            });
        });

        function addNavigationListener(element) {
            element.addEventListener('keydown', (e) => {
                const inputs = dataTable.querySelectorAll('input, select');
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
                        targetIndex = index - 1;
                        break;
                    case 'ArrowRight':
                        targetIndex = index + 1;
                        break;
                    case 'ArrowUp':
                        targetIndex = index - totalColumns + 1;
                        break;
                    case 'ArrowDown':
                        targetIndex = index + totalColumns - 1;
                        break;
                    default:
                        return;
                }

                if (targetIndex >= 0 && targetIndex < inputs.length) {
                    inputs[targetIndex].focus();
                }
            });
        }
    });

    $(document).ready(function() {
        const form = $('#formTambah');
        const errorMessage = $('#errorMessage');
        const dataTable = $('#dataTable')[0];
        const idTiketC1 = <?= json_encode($tiketData['id_tiket']) ?>; // Gunakan `json_encode` agar nilainya valid di JavaScript

        form.submit(function(event) {
            event.preventDefault();

            const data = [];
            const rows = dataTable.querySelectorAll('tr');

            rows.forEach(row => {
                const rowData = {
                    no: row.querySelector('[data-col="no"] input')?.value || row.querySelector('[data-col="no"] select')?.value || '',
                    no_halaman: row.querySelector('[data-col="no_halaman"] input')?.value || row.querySelector('[data-col="no_halaman"] select')?.value || '',
                    no_konten: row.querySelector('[data-col="no_konten"] input')?.value || row.querySelector('[data-col="no_konten"] select')?.value || '',
                    no_halaman_revisi: row.querySelector('[data-col="no_hal_rev"] input')?.value || row.querySelector('[data-col="no_hal_rev"] select')?.value || '',
                    ekstensi_konten: row.querySelector('[data-col="ekstensi_konten"] select')?.value || ''
                };

                const hasValue = Object.values(rowData).some(value => value !== '');
                if (hasValue) {
                    data.push(rowData);
                }
            });

            $.ajax({
                url: 'http://localhost:8080/tambahC2',
                type: 'POST',
                data: {
                    id_tiket: idTiketC1, // Kirim id_tiket terpisah dari dataRows
                    dataRows: data
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert("Data berhasil disimpan!");
                        errorMessage.hide();
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