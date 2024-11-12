<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #1c2939;
        padding: 8px;
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
    <form id="detailTiket" action="javascript:void(0);" method="get">
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
                            <input class="form-control text-hitam border-hitam w-100" type="text" value="" id="" name=""
                                readonly />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="" class="col-12 col-md-3 col-form-label text-biru" style="font-size: large;">JUDUL
                            BUKU</label>
                        <div class="col-12 col-md-6">
                            <input class="form-control text-hitam border-hitam w-100" type="text" value="" id="" name=""
                                readonly />
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
                    <button class="btn btn-primary d-grid w-100" id="btnsimpan">Simpan</button>
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
    const addRowButton = document.getElementById('addRowButton');
    const dataTable = document.getElementById('dataTable');
    const totalColumns = 6; // Jumlah kolom di tabel
    let mergedCell = null; // Track the merged cell for the first column
    let rowSpanCount = 1;

    function addRow() {
        const newRow = document.createElement('tr');

        for (let i = 0; i < totalColumns; i++) {
            const newCell = document.createElement('td');

            // For the first column, merge cells by only creating one merged cell
            if (i === 0) {
                if (mergedCell === null) {
                    // Create the initial merged cell and add it to the first row
                    mergedCell = document.createElement('td');
                    mergedCell.rowSpan = rowSpanCount;
                    mergedCell.textContent = 'Merged Content'; // Customize the text if needed
                    mergedCell.classList.add('top-aligned');
                    newRow.appendChild(mergedCell);
                } else {
                    // Increment the row span for the existing merged cell
                    rowSpanCount++;
                    mergedCell.rowSpan = rowSpanCount;
                    // Skip adding a new cell in this column for the merged rows
                    continue;
                }
            } else if (i === totalColumns - 1) {
                // Create the dropdown in the last column
                const select = document.createElement('select');

                // Default unselectable option
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Pilih Ekstensi Konten';
                defaultOption.disabled = true;
                defaultOption.selected = true;
                select.appendChild(defaultOption);

                // Other selectable options
                ['MP4', 'MP3', 'PDF', 'RAR', 'APK'].forEach(optionText => {
                    const option = document.createElement('option');
                    option.value = optionText;
                    option.textContent = optionText;
                    select.appendChild(option);
                });
                newCell.appendChild(select);
                addNavigationListener(select);
            } else {
                // Regular text input for other columns
                const input = document.createElement('input');
                input.type = 'text';
                newCell.appendChild(input);
                addNavigationListener(input);
            }

            // Append cell to the row if it's not the first merged cell (already handled)
            if (i !== 0 || mergedCell === null) {
                newRow.appendChild(newCell);
            }
        }

        dataTable.appendChild(newRow);
    }

    // Fungsi untuk menambahkan navigasi keyboard ke setiap input atau select
    function addNavigationListener(element) {
        element.addEventListener('keydown', (e) => {
            const inputs = dataTable.querySelectorAll('input, select');
            const index = Array.from(inputs).indexOf(e.target);

            // Mencegah aksi default
            e.preventDefault();

            const currentRow = Math.floor(index / totalColumns);
            const currentColumn = index % totalColumns;

            let targetIndex = -1;

            switch (e.key) {
                case 'Enter':
                case 'Tab':
                    const nextInput = inputs[index + 1];
                    if (nextInput) {
                        nextInput.focus();
                    }
                    break;

                case 'ArrowLeft':
                    const prevInput = inputs[index - 1];
                    if (prevInput) {
                        prevInput.focus();
                    }
                    break;

                case 'ArrowRight':
                    const nextInputRight = inputs[index + 1];
                    if (nextInputRight) {
                        nextInputRight.focus();
                    }
                    break;
                case 'ArrowUp':
                    // Panah atas: Pindah ke elemen input di baris atas
                    if ((index + 1) - totalColumns >= 0) {
                        inputs[index - totalColumns + 1].focus();
                    }
                    break;
                case 'ArrowDown':
                    // Panah bawah: Pindah ke elemen input di baris bawah
                    if ((index - 1) + totalColumns < inputs.length) {
                        inputs[index + totalColumns - 1].focus();
                    }
                    break;
                default:
                    break;
            }
        });
    }

    // Tambahkan 45 baris ke tabel saat halaman dimuat
    for (let i = 0; i < 45; i++) {
        addRow();
    }
</script>

<?= $this->endSection(); ?>