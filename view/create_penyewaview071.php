
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Tambah Data Penyewa</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Penyewa</h3>
                </div>

                <form action="<?= base_url('?url=Penyewa_C071/simpan') ?>"
                      method="POST"
                      enctype="multipart/form-data">

                    <div class="card-body">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text"
                                   name="user_plq071"
                                   class="form-control"
                                   placeholder="Masukkan username"
                                   maxlength="50"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password"
                                   name="Sandi071"
                                   class="form-control"
                                   placeholder="Masukkan password"
                                   maxlength="225"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text"
                                   name="Nik071"
                                   class="form-control"
                                   placeholder="Masukkan NIK"
                                   maxlength="20"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text"
                                   name="nm_lngkp071"
                                   class="form-control"
                                   placeholder="Masukkan nama lengkap"
                                   maxlength="100"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="text"
                                   name="no_hp071"
                                   class="form-control"
                                   placeholder="Masukkan nomor HP"
                                   maxlength="20"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea name="almt_lngkp071"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan alamat lengkap"
                                      required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Foto KTP</label>
                            <div class="custom-file">
                                <input type="file"
                                       name="ft_ktp"
                                       class="custom-file-input"
                                       id="fotoKtp"
                                       accept=".jpg,.jpeg,.png"
                                       required>
                                <label class="custom-file-label"
                                       for="fotoKtp">
                                    Pilih foto KTP
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Foto SIM A</label>
                            <div class="custom-file">
                                <input type="file"
                                       name="ft_sim_a"
                                       class="custom-file-input"
                                       id="fotoSim"
                                       accept=".jpg,.jpeg,.png"
                                       required>
                                <label class="custom-file-label"
                                       for="fotoSim">
                                    Pilih foto SIM A
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>

                        <a href="<?= base_url('?url=Penyewa_C071/index') ?>"
                           class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </section>
</div>

<script>
$(document).ready(function () {
    $('.custom-file-input').on('change', function () {
        var namaFile = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(namaFile);
    });
});
</script>