<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <form id="formTiket" action="javascript:void(0);" method="post">
        <div class="form-group">

            <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Form /</span> Form Job Ticket</h4>
                <div class="row">
                    <div class="col-xl-9 mb-5">
                        <h1 class="card-header mb-2 display-1">Form <br>Job Ticket</h1>
                        <!-- <img src="<//?= base_url('upload/' . $file_name) ?>" alt=""> -->
                    </div>
                    <div class="col-xl-3 mb-5">
                        <h3 class="card-header text-center mb-2">Platform Digital
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </h3>
                        <div class="card border border-dark mx-4">
                            <div class="card-body p-2">
                                <div class="row">
                                    <div class="col-xl">
                                        <div class="card border" style="background-color:pink;">
                                            <h3 class="text-center rounded mb-0 p-2" style="background-color:lightpink;">Form</h3>
                                            <div class="card-body m-0 p-2">
                                                <h1 class="text-center mb-0 display-1">C</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <h1 class="text-center display-1 mb-0 mt-1" style="font-size: 7rem;">1</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                <h5 class="card-header mb-3">TIKET PEMESANAN DAN APPROVAL KONTEN MULTIMEDIA
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </h5>
                <!-- Row 1 -->
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-xl-4 mb-5">
                        <div class="card h-100 mb-4 border border-dark">
                            <h5 class="text-center rounded mt-4 mb-0 mx-4 py-2" style="background-color:pink;">Pembuatan Konten Multimedia</h5>
                            <!-- Checkboxes and Radios -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md px-3">
                                        <!-- <small class="text-light fw-medium">Checkboxes</small> -->
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="1" name="id_kategori[]" id="kategori1" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori1"> QR CODE </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="2" name="id_kategori[]" id="kategori2" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori2"> Animasi/Motion/Info Graphic </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="3" name="id_kategori[]" id="kategori3" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori3"> CBT/Aplikasi </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="4" name="id_kategori[]" id="kategori4" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori4"> Editing Video/Audio </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="5" name="id_kategori[]" id="kategori5" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori5"> Template Media Mengajar </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="6" name="id_kategori[]" id="kategori6" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori6"> Template Video </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="7" name="id_kategori[]" id="kategori7" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori7"> Game Edukasi </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="8" name="id_kategori[]" id="kategori8" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori8"> Augmented Reality (AR) </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="9" name="id_kategori[]" id="kategori9" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori9"> Lainnya </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-0" />
                        </div>
                    </div>
                    <!-- Column 2 -->
                    <div class="col-xl-8 mb-5">
                        <div class="card h-100 mb-4 border border-dark">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="tanggal_order" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">Tanggal Order</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="date" value="" id="tgl_order" name="tgl_order" style="border: 1px solid black;" placeholder="dd/mm/yyyy" required />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="pemesan" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">PEMESAN</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="" id="id_user" name="id_user" placeholder="Masukkan Pemesan" style="border: 1px solid black;" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nomor_job" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">NOMOR JOB</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="" id="nomor_job" name="nomor_job" placeholder="Masukkan Nomor Job" style="border: 1px solid black;" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kode_buku" class="form-label col-md-3 text-primary" style="font-size: var(--bs-body-font-size)">Kode Buku</label>
                                    <div class="col-md-9">
                                        <select id="kode_buku" class="form-select" name="id_buku" style="border: 1px solid black;">
                                            <!-- ajax -->
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="judul_buku" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">JUDUL BUKU</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" style="border: 1px solid black;" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="pengarang" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">PENGARANG</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="" id="pengarang" name="pengarang" placeholder="Masukkan Pengarang" style="border: 1px solid black;" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="target_terbit" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">TARGET TERBIT</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="year" value="" id="target_terbit" name="target_terbit" placeholder="Masukkan Target Terbit" style="border: 1px solid black;" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">Email</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="email" value="" id="email" name="email" placeholder="Masukkan Email" style="border: 1px solid black;" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="warna" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">WARNA</label>
                                    <div class="col-md">
                                        <div class="form-check form-check-inline rounded p-2 mb-2" style="border: 1px solid black;">
                                            <input class="form-check-input mx-1" type="radio" id="inlineRadio1" name="inlineRadioOption" value="BW" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary px-2" for="inlineRadio1">BW</label>
                                        </div>
                                        <div class="form-check form-check-inline rounded p-2 mb-2" style="border: 1px solid black;">
                                            <input class="form-check-input mx-1" type="radio" id="inlineRadio2" name="inlineRadioOption" value="2/2" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary px-2" for="inlineRadio2">2/2</label>
                                        </div>
                                        <div class="form-check form-check-inline rounded p-2 mb-2" style="border: 1px solid black;">
                                            <input class="form-check-input mx-1" type="radio" id="inlineRadio3" name="inlineRadioOption" value="3/3" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary px-2" for="inlineRadio3">3/3</label>
                                        </div>
                                        <div class="form-check form-check-inline rounded p-2 mb-2" style="border: 1px solid black;">
                                            <input class="form-check-input mx-1" type="radio" id="inlineRadio4" name="inlineRadioOption" value="4/4" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary px-2" for="inlineRadio4">4/4</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                <!-- Row 2 -->
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-xl-4 mb-5">
                        <div class="card h-100 border border-dark">
                            <div class="card-body">
                                <div class="row mb-0">

                                    <div class="col-xl-8 px-2 mb-3">
                                        <h6 class="text-center rounded py-2" style="background-color:pink;">Pemesan</h6>
                                        <div class="row mt-4 mx-0">

                                            <div class="col-xl mb-2 px-0">
                                                <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                    <div class="card-body p-1" class="CurentDate">
                                                        <p class="text-end" style="font-size:x-small;">dd/mm/yyyy</p>
                                                    </div>
                                                    <p class="text-start mb-0 px-1" style="font-size:x-small;">nama</p>
                                                    <p class="text-center text-primary rounded-bottom mb-0" style="font-size:x-small;background-color:pink; padding: 0.725rem 0 0.725rem;">Editor</p>
                                                </div>
                                            </div>
                                            <div class="col-xl mb-2 px-0">
                                                <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                    <div class="card-body p-1" class="CurentDate">
                                                        <p class="text-end" style="font-size:x-small;">dd/mm/yyyy</p>
                                                    </div>
                                                    <p class="text-start mb-0 px-1" style="font-size:x-small;">nama</p>
                                                    <p class="text-center text-primary rounded-bottom mb-0" style="font-size:x-small;background-color:pink; padding: 0.725rem 0 0.725rem;">Koord. Editor</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-4 px-2">
                                        <h6 class="text-center rounded py-2" style="background-color:pink;">Diterima</h6>
                                        <div class="row mt-4 mx-0">
                                            <div class="col-xl mb-2 px-0">
                                                <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                    <div class="card-body p-1">
                                                        <p class="text-end" style="font-size:x-small; color: var(--bs-card-bg);">dd/mm/yyyy</p>
                                                    </div>
                                                    <p class="text-start mb-0 px-1" style="font-size:x-small;">nama</p>
                                                    <p class="text-center text-primary rounded-bottom mb-0 py-1" style="font-size:x-small;background-color:pink;">Admin <br>Multimedia</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column 2 -->
                    <div class="col-xl-4 mb-5">
                        <div class="card h-100 border border-dark">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-xl px-2">
                                        <h6 class="text-center rounded py-2" style="background-color:pink;">KELENGKAPAN FILE YANG DISERTAKAN</h6>
                                        <div class="row mx-0 justify-content-center">
                                            <div class="col-xl-auto border boder-box border-dark rounded px-1 mx-1 mb-2 mt-2">
                                                <div class="form-check justify-center">
                                                    <input class="form-check-input" type="checkbox" name="kelengkapan[]" value="Image/Foto/Ilustrasi" id="defaultCheck11" style="border: 1px solid pink;" />
                                                    <label class="form-check-label text-primary" for="defaultCheck11"> Image/Foto/Ilustrasi </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mx-0 justify-content-center">
                                            <div class="col-xl-auto border boder-box border-dark rounded px-1 mx-1 mb-2">
                                                <div class="form-check justify-center">
                                                    <input class="form-check-input" type="checkbox" name="kelengkapan[]" value="Audio Mp3" id="defaultCheck12" style="border: 1px solid pink;" />
                                                    <label class="form-check-label text-primary" for="defaultCheck12"> Audio Mp3 </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-auto border boder-box border-dark rounded px-1 mx-1 mb-2">
                                                <div class="form-check justify-center">
                                                    <input class="form-check-input" type="checkbox" name="kelengkapan[]" value="PDF & RAR" id="defaultCheck13" style="border: 1px solid pink;" />
                                                    <label class="form-check-label text-primary" for="defaultCheck13"> PDF & RAR </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mx-0 justify-content-center">
                                            <div class="col-xl-auto border boder-box border-dark rounded px-1 mx-1 mb-2">
                                                <div class="form-check justify-center">
                                                    <input class="form-check-input" type="checkbox" name="kelengkapan[]" value="Video Mp4" id="defaultCheck14" style="border: 1px solid pink;" />
                                                    <label class="form-check-label text-primary" for="defaultCheck14"> Video Mp4 </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-auto border boder-box border-dark rounded px-1 mx-1 mb-2">
                                                <div class="form-check justify-center">
                                                    <input class="form-check-input" type="checkbox" name="kelengkapan[]" value="fla/xfl" id="defaultCheck15" style="border: 1px solid pink;" />
                                                    <label class="form-check-label text-primary" for="defaultCheck15"> fla/xfl </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mx-0 justify-content-center">
                                            <div class="col-xl-auto border boder-box border-dark rounded px-1 mx-1 mb-2">
                                                <div class="form-check justify-center">
                                                    <input class="form-check-input" type="checkbox" name="kelengkapan[]" value="Dummy" id="defaultCheck16" style="border: 1px solid pink;" />
                                                    <label class="form-check-label text-primary" for="defaultCheck16"> Dummy </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column 3 -->
                    <div class="col-xl-4 mb-5">
                        <div class="card h-100 border border-dark">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-xl">
                                        <h6 class="text-center rounded py-2" style="background-color:pink;">KELENGKAPAN FILE KONTEN QR CODE</h6>
                                        <div class="row mt-4 mx-0">
                                            <div class="col-xl-4 mb-2 px-1">
                                                <div class="card h-100 mb-4" style="border: 1px solid pink;">
                                                    <div class="card-body">

                                                    </div>
                                                    <p class="text-center rounded-bottom text-primary mb-0 p-1" style="font-size:x-small;background-color:pink;">Penyerahan Tahap 1</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 mb-2 px-1">
                                                <div class="card h-100 mb-4" style="border: 1px solid pink;">
                                                    <div class="card-body">

                                                    </div>
                                                    <p class="text-center rounded-bottom text-primary mb-0 p-1" style="font-size:x-small;background-color:pink;">Penyerahan Tahap 2</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 mb-2 px-1">
                                                <div class="card h-100 mb-4" style="border: 1px solid pink;">
                                                    <div class="card-body">

                                                    </div>
                                                    <p class="text-center rounded-bottom text-primary mb-0 p-1" style="font-size:x-small;background-color:pink;">Penyerahan Tahap 3</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-primary mt-2 mx-1 mb-0" style="font-size:xx-small;">
                                            *Penyerahan konten Qr code dapat diserahkan semua atau melalui 3 tahap
                                            penyerahan, maksimal 1 bulan setelah buku terbit konten sudah lengkap.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                <!-- Row 3 -->
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-xl-4 mb-5">
                        <div class="card h-100 border border-dark">
                            <div class="card-body">
                                <div class="row mb-0">
                                    <div class="col-xl py-2 px-1 mb-2">
                                        <div class="card" style="border: 1px solid pink;">
                                            <div class="card-body">

                                            </div>
                                            <p class="text-center rounded-bottom text-primary mb-0 py-1" style="font-size:x-small;background-color:pink;">Kor1</p>
                                        </div>
                                    </div>
                                    <div class="col-xl py-2 px-1 mb-2">
                                        <div class="card" style="border: 1px solid pink;">
                                            <div class="card-body">

                                            </div>
                                            <p class="text-center rounded-bottom text-primary mb-0 py-1" style="font-size:x-small;background-color:pink;">Rev1</p>
                                        </div>
                                    </div>

                                    <div class="col-xl py-2 px-1 mb-2">
                                        <div class="card" style="border: 1px solid pink;">
                                            <div class="card-body">

                                            </div>
                                            <p class="text-center rounded-bottom text-primary mb-0 py-1" style="font-size:x-small;background-color:pink;">Kor1</p>
                                        </div>
                                    </div>
                                    <div class="col-xl py-2 px-1 mb-2">
                                        <div class="card" style="border: 1px solid pink;">
                                            <div class="card-body">

                                            </div>
                                            <p class="text-center rounded-bottom text-primary mb-0 py-1" style="font-size:x-small;background-color:pink;">Rev1</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-0 justify-content-center">
                                    <div class="col-xl-3 py-2 px-1 mb-2">
                                        <div class="card" style="border: 1px solid pink;">
                                            <div class="card-body">

                                            </div>
                                            <p class="text-center rounded-bottom text-primary mb-0 py-1" style="font-size:x-small;background-color:pink;">Kor1</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 py-2 px-1 mb-2">
                                        <div class="card" style="border: 1px solid pink;">
                                            <div class="card-body">

                                            </div>
                                            <p class="text-center rounded-bottom text-primary mb-0 py-1" style="font-size:x-small;background-color:pink;">Rev1</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column 2 -->
                    <div class="col-xl-8 mb-5">
                        <div class="card h-100 border border-dark">
                            <div class="card-body">
                                <div class="row mb-0">

                                    <div class="col-xl-4 mb-3">
                                        <h6 class="text-center rounded py-2" style="background-color:pink;">Approval</h6>
                                        <div class="row mt-4 mx-0">
                                            <div class="col-xl mb-2 px-0">
                                                <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                    <div class="card-body p-1">
                                                        <p class="text-end" style="font-size:x-small; color: var(--bs-card-bg);">dd/mm/yyyy</p>
                                                    </div>
                                                    <p class="text-start mb-0 px-1" style="font-size:x-small; color: var(--bs-card-bg);">nama</p>
                                                    <p class="text-center text-primary rounded-bottom mb-0 py-1" style="font-size:x-small;background-color:pink;">Manager</br>Platform Digital</p>
                                                </div>
                                            </div>
                                            <div class="col-xl mb-2 px-0">
                                                <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                    <div class="card-body p-1" id="CurentDate">
                                                        <p class="text-end" style="font-size:x-small;">dd/mm/yyyy</p>
                                                    </div>
                                                    <p class="text-start mb-0 px-1" style="font-size:x-small;">nama</p>
                                                    <p class="text-center text-primary rounded-bottom mb-0" style="font-size:x-small;background-color:pink; padding: 0.725rem 0 0.725rem;">Koord. Editor</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-8">
                                        <h6 class="text-center rounded py-2" style="background-color:pink;">Catatan</h6>
                                        <div class="row mt-4 mx-1">
                                            <textarea class="form-control" id="Textarea1" name="Textarea1" rows="5" style="border: 1px solid pink;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                <!-- Row 4 -->
                <div class="row justify-content-center mb-3">
                    <div class="col-xl-6">
                        <button class="btn btn-primary d-grid w-100" id="btnsimpan">Simpan</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
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
    const dates = document.querySelectorAll('.text-end');
    const currentDate = new Date();
    const formattedDate = `${currentDate.getDate()}/${currentDate.getMonth() + 1}/${currentDate.getFullYear()}`;
    dates.forEach(date => {
        date.textContent = formattedDate;
    });
    $(document).ready(function() {
        $('#formTiket').submit(function(event) {
            event.preventDefault();

            // Collect selected checkboxes for kategori
            var selectedKategoris = [];
            var selectedkelengkapans = [];
            $('input[type="checkbox"]:checked').each(function() {
                selectedKategoris.push($(this).val());
            });
            // Add the selected kelengkapan to FormData
            $("input[name='kelengkapan[]']:checked").each(function () {
                selectedkelengkapans.push($(this).val());
            });
            
            var formData = $(this).serialize() + selectedkelengkapans.join(',') + selectedKategoris.join(',');
            var formUrl = 'http://localhost:8080/api/form'; // Ganti '/form' dengan URL endpoint yang sesuai

            $.ajax({
                type: 'POST',
                url: formUrl, // Tidak lagi menggunakan PHP echo di sini
                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log('Respons dari Server:', response); // Debugging
                    if (response.Status === 'success') {
                        alert(response.Pesan);
                        window.location.href = '<?= base_url('form'); ?>'; // Redirect ke URL yang sesuai
                    } else {
                        alert(response.Pesan);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error); // Debugging error
                    console.log('Status:', status); // Status error
                    console.log('xhr:', xhr); // XHR object untuk melihat lebih detail
                    alert('Terjadi kesalahan saat menyimpan data.'); // Bisa juga menampilkan alert di sini
                }
            });
        });
        $.ajax({
            url: 'http://localhost:8080/api/tampilbuku',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $.each(data, function(index, buku) {
                    $('#kode_buku').append(`<option value="${buku.kode_buku}">${buku.kode_buku}</option>`);
                });
            }
        });
        $('#kode_buku').change(function() {
            var kode_buku = $(this).val();
            if (kode_buku) {
                $.ajax({
                    url: 'http://localhost:8080/api/tampilbuku/' + kode_buku, // Replace with your endpoint
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log('Response data:', data);
                        // Update the fields based on the selected kode_buku
                        $('#judul_buku').val(data.judul_buku);
                        $('#pengarang').val(data.pengarang);
                        $('#target_terbit').val(data.target_terbit);
                        $('input[name="inlineRadioOption"][value="' + data.warna + '"]').prop('checked', true);
                    }
                });
            }
        });
        function getUserEmail() {
            var id_user = document.getElementById('id_user').value;
            
            if (id_user !== "") {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/get-email', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        document.getElementById('email').value = xhr.responseText;
                    }
                };
                xhr.send('id_user=' + id_user);
            } else {
                document.getElementById('email').value = '';  // Kosongkan email jika ID user dihapus
            }
        }

    });
</script>
<?= $this->endSection(); ?>