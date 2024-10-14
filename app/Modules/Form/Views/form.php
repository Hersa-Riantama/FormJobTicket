<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <form id="formTiket" action="javascript:void(0);" method="post">
        <div class="form-group">

            <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Form /</span> Form QR Code</h4>
                <div class="row">
                    <div class="col-xl-9 mb-5">
                        <h1 class="card-header mb-2 display-1">FORM <br>QR CODE</h1>
                        <!-- <img src="<//?= base_url('upload/' . $file_name) ?>" alt=""> -->
                    </div>
                    <div class="col-xl-3 mb-5">
                        <h3 class="card-header text-center mb-2">Platform Digital</h3>
                        <div class="card border border-dark mx-4">
                            <div class="card-body p-2">
                                <div class="row">
                                    <div class="col-xl">
                                        <div class="card border" style="background-color:pink;">
                                            <h3 class="text-center rounded mb-0 p-2" style="background-color:lightpink;"><i>Form</i></h3>
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
                <h5 class="card-header mb-3">TIKET PEMESANAN DAN <i>APPROVAL</i> KONTEN MULTIMEDIA </h5>
                <!-- Row 1 -->
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-xl-4 mb-2">
                        <div class="card h-100 mb-4 border border-dark">
                            <h5 class="text-left rounded mt-4 mb-0 mx-4 py-2 px-2" style="background-color:pink;"><i>CHECKLIST</i> PEMBUATAN <br>KONTEN MULTIMEDIA</h5>
                            <!-- Checkboxes and Radios -->
                            <div class="card-body pb-0 pt-2">
                                <div class="row">
                                    <div class="col-md px-3">
                                        <!-- <small class="text-light fw-medium">Checkboxes</small> -->
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="1" name="id_kategori[]" id="kategori1" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori1"> <i>QR CODE</i> </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="2" name="id_kategori[]" id="kategori2" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori2"> <i>Link QR Code</i> </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="3" name="id_kategori[]" id="kategori3" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori3"> CBT/Aplikasi </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="4" name="id_kategori[]" id="kategori4" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori4"> Edit Video/Audio </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="5" name="id_kategori[]" id="kategori5" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori5"> <i>Template</i> Media Mengajar </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="6" name="id_kategori[]" id="kategori6" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori6"> Standarisasi Media Mengajar </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="7" name="id_kategori[]" id="kategori7" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori7"> <i>Template</i> Video </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="8" name="id_kategori[]" id="kategori8" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori8"> Animasi/<i>Motion</i> </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="9" name="id_kategori[]" id="kategori9" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori9"> <i>Augmented Reality</i> (AR) </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="10" name="id_kategori[]" id="kategori10" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori10"> <i>Game</i> Edukasi </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="9" name="id_kategori[]" id="kategori11" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori11"> Lainnya </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-0" />
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="col-xl-8 mb-2">
                        <div class="card h-100 mb-4 border border-dark">
                            <div class="card-body pb-0">

                                <div class="mb-3 row">
                                    <label for="pemesan" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">PEMESAN</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="<?= esc($user['nama']) ?>" id="id_user" name="id_user" placeholder="Masukkan Pemesan" style="border: 1px solid black;" />
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
                                    <label for="nomor_job" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">NOMOR JOB</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="" id="nomor_job" name="nomor_job" placeholder="Masukkan Nomor Job" style="border: 1px solid black;" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="judul_buku" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">JUDUL BUKU</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" value="" id="judul_buku" name="judul_buku" row="2" placeholder="Masukkan Judul Buku" style="border: 1px solid black;"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="pengarang" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">PENULIS</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="" id="pengarang" name="pengarang" placeholder="Masukkan Penulis" style="border: 1px solid black;" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="target_terbit" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">TARGET TERBIT</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="year" value="" id="target_terbit" name="target_terbit" placeholder="Masukkan Target Terbit" style="border: 1px solid black;" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jml_qr" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">Jumlah <i>QR Code</i></label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="" id="jml_qr" name="jml_qr" placeholder="Masukkan Jumlah QR Code" style="border: 1px solid black;" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-md-3 col-form-label text-primary" style="font-size: var(--bs-body-font-size)">Email</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="email" value="<?= esc($user['email']) ?>" id="email" name="email" placeholder="Masukkan Email" style="border: 1px solid black;" />
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
                                        <p class="text-bold mt-2 mb-0" style="font-size:x-small;">*keterangan warna isi buku</p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md">
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
                    <div class="col-xl-4 mb-2">
                        <div class="card h-100 mb-4 border border-dark">
                            <h5 class="text-left rounded mt-4 mb-0 mx-4 py-2 px-2" style="background-color:pink;"><i>CHECKLIST APPROVAL</i> <br>KONTEN MULTIMEDIA</h5>
                            <!-- Checkboxes and Radios -->
                            <div class="card-body pb-0 pt-2">
                                <div class="row">
                                    <div class="col-md px-3">
                                        <!-- <small class="text-light fw-medium">Checkboxes</small> -->
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="12" name="id_kategori[]" id="kategori12" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori12"> Sudah diperiksa <i>pemesan</i> </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="13" name="id_kategori[]" id="kategori13" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori13"> Sudah di-<i>approve </i>atasan </label>
                                        </div>

                                        <h6 class="text-left text-primary mt-4 mb-0" style="font-weight: bold;">Kelengkapan file yang di-<i>upload</i>*</h6>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="14" name="id_kategori[]" id="kategori14" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori14"> Video Mp4 </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="15" name="id_kategori[]" id="kategori15" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori15"> Audio Mp3 </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="16" name="id_kategori[]" id="kategori16" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori16"> PDF/RAR </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="17" name="id_kategori[]" id="kategori17" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori17"> Fla/xfl (APK) </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="18" name="id_kategori[]" id="kategori18" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori18"> Gambar/Foto/Ilustrasi </label>
                                        </div>
                                        <p class="text mt-3 mb-0" style="font-size:x-small;">
                                            *Ukuran file dari konten yang akan diupload tidak
                                            melebihi 30 MB
                                        </p>

                                        <h6 class="text-left text-primary mt-4 mb-0" style="font-weight: bold;">Kelengkapan file konten*</h6>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="19" name="id_kategori[]" id="kategori19" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori19"> Penyerahan Tahap 1 </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="20" name="id_kategori[]" id="kategori20" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori20"> Penyerahan Tahap 2 </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" value="21" name="id_kategori[]" id="kategori21" style="border: 1px solid pink;" />
                                            <label class="form-check-label text-primary" for="kategori21"> Penyerahan Tahap 3 </label>
                                        </div>
                                        <p class="text mt-3 mb-0" style="font-size:x-small;">
                                            *Konten <i>QR Code</i> harus dilengkapi maksimal satu
                                            bulan setelah buku terbit. Penyerahan konten
                                            dapat dilakukan sekaligus atau melalui tiga tahap.
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="col-xl-8">
                        <!-- Row 2-1 -->
                        <div class="row">
                            <div class="col-xl mb-2">
                                <div class="card h-100 border border-dark">
                                    <div class="card-body pb-0">
                                        <div class="row mb-0">

                                            <div class="col-xl-5 mb-3">
                                                <h6 class="text-center rounded py-2" style="background-color:pink;">Pemesan</h6>
                                                <div class="row mt-4 mx-0">

                                                    <div class="col-xl mb-2 px-0">
                                                        <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                            <div class="card-body p-1 d-flex justify-content-left" id="CurentDate">
                                                                <p class="text-start text-primary display-inl" style="font-size:xx-small;">tanggal: </p>
                                                                <p class="text-end" style="font-size:xx-small;">dd/mm/yyyy</p>
                                                            </div>
                                                            <p class="text-center mb-0 px-1" style="font-size:x-small;">nama</p>
                                                            <p class="text-center text-primary rounded-bottom mb-0 py-1" style="font-size:x-small;background-color:pink;">Editor</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl mb-2 px-0">
                                                        <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                            <div class="card-body p-1 d-flex justify-content-left" id="CurentDate">
                                                                <p class="text-start text-primary display-inl" style="font-size:xx-small;">tanggal: </p>
                                                                <p class="text-end" style="font-size:xx-small;">dd/mm/yyyy</p>
                                                            </div>
                                                            <p class="text-center mb-0 px-1" style="font-size:x-small;">nama</p>
                                                            <p class="text-center text-primary rounded-bottom mb-0 py-1" style="font-size:x-small;background-color:pink;">Koord. Editor</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text mt-2 mb-0" style="font-size:x-small;">
                                                    *Tulis tanggal dan nama
                                                </p>
                                            </div>

                                            <div class="col-xl-7 mb-2">
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

                        <!-- Row 2-2 -->
                        <div class="row">
                            <div class="col-xl mb-2">
                                <div class="card h-100 border border-dark">
                                    <div class="card-body pb-0">
                                        <div class="row mb-0">

                                            <div class="col-xl-3 mb-3">
                                                <h6 class="text-center rounded py-2" style="background-color:pink;">Memeriksa</h6>
                                                <div class="row mt-4 mx-0">

                                                    <div class="col-xl mb-2 px-0">
                                                        <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                            <div class="card-body p-1 d-flex justify-content-left" id="CurentDate">
                                                                <p class="text-start text-primary display-inl" style="font-size:xx-small;">tanggal: </p>
                                                                <p class="text-end" style="font-size:xx-small;">dd/mm/yyyy</p>
                                                            </div>
                                                            <p class="text-center mb-0 px-1" style="font-size:x-small;">nama</p>
                                                            <p class="text-center text-primary rounded-bottom mb-0 py-1" style="font-size:x-small;background-color:pink;">Tim Multimedia</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text mt-2 mb-0" style="font-size:x-small;">
                                                    *Diisi oleh tim multimedia
                                                </p>
                                            </div>

                                            <div class="col-xl-9">
                                                <h6 class="text-center rounded py-2" style="background-color:pink;">Keterangan Tanggal</h6>
                                                <div class="row mt-4 mx-1">
                                                    <div class="col-xl mb-2 px-0">
                                                        <div class="card h-100 mb-3" style="border: 1px solid pink;">
                                                            <div class="card-body p-1">
                                                                <div class="row mb-3 px-2">
                                                                    <label for="tgl_selesai" class="col-md-6 col-form-label text-primary">Tgl selesai pengerjaan</label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" type="date" value="" id="tgl_selesai" name="tgl_selesai" style="border: 1px solid black;" />
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2 px-2">
                                                                    <label for="tgl_upload" class="col-md-6 col-form-label text-primary">Tgl <i>upload</i> konten <i>QR Code</i></label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" type="date" value="" id="tgl_upload" name="tgl_upload" style="border: 1px solid black;" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Row 2-3 -->
                        <div class="row">
                            <div class="col-xl mb-2">
                                <div class="card h-100 border border-dark">
                                    <div class="card-body pb-0">
                                        <div class="row mb-0">

                                            <div class="col-xl-7 mb-3">
                                                <h6 class="text-center rounded py-2" style="background-color:pink;"><i>Approval</i></h6>
                                                <div class="row mt-4 mx-0">
                                                    <div class="col-xl mb-2 px-0">
                                                        <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                            <div class="card-body p-1 d-flex justify-content-left" id="CurentDate">
                                                                <p class="text-start text-primary display-inl" style="font-size:xx-small;">tanggal: </p>
                                                                <p class="text-end" style="font-size:xx-small;">dd/mm/yyyy</p>
                                                            </div>
                                                            <p class="text-center mb-0 px-1" style="font-size:x-small;">nama</p>
                                                            <p class="text-center text-primary rounded-bottom mb-0" style="font-size:x-small;background-color:pink; padding: 0.725rem 0 0.725rem;">Koord. Editor</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl mb-2 px-0">
                                                        <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                            <div class="card-body p-1 d-flex justify-content-left" id="CurentDate">
                                                                <p class="text-start text-primary display-inl" style="font-size:xx-small;">tanggal: </p>
                                                                <p class="text-end" style="font-size:xx-small;">dd/mm/yyyy</p>
                                                            </div>
                                                            <p class="text-center mb-0 px-1" style="font-size:x-small;">nama</p>
                                                            <p class="text-center text-primary rounded-bottom mb-0 py-1" style="font-size:x-small;background-color:pink;">Manager</br>Platform Digital</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text mt-2 mb-0" style="font-size:x-small;">
                                                    *Tulis tanggal dan nama
                                                </p>
                                            </div>

                                            <div class="col-xl-4" style="margin-left: auto;">
                                                <h6 class="text-center rounded py-2" style="background-color:pink;">Arsip</h6>
                                                <div class="row mt-4 mx-0">
                                                    <div class="col-xl mb-2 px-0">
                                                        <div class="card h-100 mb-5" style="border: 1px solid pink;">
                                                            <div class="card-body p-1 d-flex justify-content-left" id="CurentDate">
                                                                <p class="text-start text-primary display-inl" style="font-size:xx-small;">tanggal: </p>
                                                                <p class="text-end" style="font-size:xx-small;">dd/mm/yyyy</p>
                                                            </div>
                                                            <p class="text-center mb-0 px-1" style="font-size:x-small;">nama</p>
                                                            <p class="text-center text-primary rounded-bottom mb-0" style="font-size:x-small;background-color:pink; padding: 0.725rem 0 0.725rem;">Admin</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                    <!-- Row 3 -->
                    <div class="row justify-content-center my-3">
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
            $("input[name='kelengkapan[]']:checked").each(function() {
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
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        document.getElementById('email').value = xhr.responseText;
                    }
                };
                xhr.send('id_user=' + id_user);
            } else {
                document.getElementById('email').value = ''; // Kosongkan email jika ID user dihapus
            }
        }

    });
</script>
<?= $this->endSection(); ?>