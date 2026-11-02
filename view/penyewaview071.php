<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DATA PENYEWA</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Data Penyewa
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Daftar Data Penyewa</h3>
                </div>

                <div class="card-body">

                    <!-- Tombol Tambah di kiri atas -->
                    <div class="mb-3">
                        <a href="<?= base_url('?url=Penyewa_C071/create_penyewa') ?>"
                           class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Data Penyewa
                        </a>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Foto KTP</th>
                                    <th>Foto SIM A</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php if (!empty($dtpenyewa)) : ?>

                                    <?php $no = 1; ?>

                                    <?php foreach ($dtpenyewa as $p) : ?>

                                        <tr>
                                            <td><?= $no++ ?></td>

                                            <td>
                                                <?= htmlspecialchars($p['user_plq071']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($p['Nik071']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($p['nm_lngkp071']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($p['no_hp071']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($p['almt_lngkp071']) ?>
                                            </td>

                                            <!-- Foto KTP -->
                                            <td class="text-center">

                                                <?php if (!empty($p['ft_ktp'])) : ?>

                                                    <img
                                                        src="<?= base_url('img/' . rawurlencode(basename($p['ft_ktp']))) ?>"
                                                        width="70"
                                                        height="50"
                                                        style="object-fit: cover; cursor:pointer;"
                                                        class="foto-penyewa"
                                                        data-foto="<?= base_url('img/' . rawurlencode(basename($p['ft_ktp']))) ?>"
                                                        alt="Foto KTP">

                                                <?php else : ?>

                                                    Tidak ada foto

                                                <?php endif; ?>

                                            </td>

                                            <!-- Foto SIM A -->
                                            <td class="text-center">

                                                <?php if (!empty($p['ft_sim_a'])) : ?>

                                                    <img
                                                        src="<?= base_url('img/' . rawurlencode(basename($p['ft_sim_a']))) ?>"
                                                        width="70"
                                                        height="50"
                                                        style="object-fit: cover; cursor:pointer;"
                                                        class="foto-penyewa"
                                                        data-foto="<?= base_url('img/' . rawurlencode(basename($p['ft_sim_a']))) ?>"
                                                        alt="Foto SIM A">

                                                <?php else : ?>

                                                    Tidak ada foto

                                                <?php endif; ?>

                                            </td>

                                            <!-- Tombol Aksi -->
                                            <td class="text-center">

                                                <a
                                                    href="<?= base_url('?url=Penyewa_C071/edit_penyewa&user_plq071=' . urlencode($p['user_plq071'])) ?>"
                                                    class="btn btn-warning btn-sm">

                                                    <i class="fas fa-edit"></i> Edit

                                                </a>

                                                <form
                                                    action="<?= base_url('?url=Penyewa_C071/hapus_penyewa') ?>"
                                                    method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Yakin ingin menghapus data penyewa ini?')">

                                                    <input
                                                        type="hidden"
                                                        name="user_plq071"
                                                        value="<?= htmlspecialchars($p['user_plq071']) ?>">

                                                    <button
                                                        type="submit"
                                                        class="btn btn-danger btn-sm">

                                                        <i class="fas fa-trash"></i> Hapus

                                                    </button>

                                                </form>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php else : ?>

                                    <tr>
                                        <td colspan="9" class="text-center">
                                            Belum ada data penyewa.
                                        </td>
                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>
    </section>

</div>

<!-- Modal Preview Foto -->
<div class="modal fade" id="modalFotoPenyewa" tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Preview Foto</h5>

                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body text-center">

                <img
                    id="gambarPreview"
                    src=""
                    class="img-fluid"
                    alt="Preview Foto">

            </div>

        </div>

    </div>

</div>

<script>
$(document).on('click', '.foto-penyewa', function () {

    $('#gambarPreview').attr('src', $(this).data('foto'));

    $('#modalFotoPenyewa').modal('show');

});
</script>
