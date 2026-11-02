<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DATA MOBIL</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Data Mobil
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Isi Halaman -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <!-- Tombol Tambah -->
                    <a href="<?= base_url('?url=Mobil_C/create_mobil') ?>"
                       class="btn btn-primary mb-3">
                        <i class="fas fa-car"></i>
                        Tambah Data Mobil
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>No. Plat</th>
                                    <th>Nama Mobil</th>
                                    <th>Jumlah Kursi</th>
                                    <th>Jumlah Bagasi</th>
                                    <th>Jenis Mobil</th>
                                    <th>Transmisi</th>
                                    <th>Tahun</th>
                                    <th>Foto</th>
                                    <th>Biaya Perhari</th>
                                    <th>Catatan Unit</th>
                                    <th>Status Unit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                            <?php if (!empty($dtmobil)) : ?>

                                <?php foreach ($dtmobil as $m) : ?>

                                    <tr>
                                        <td>
                                            <?= htmlspecialchars($m['no_plat']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($m['nm_mobil']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($m['nkursi']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($m['nbagasi']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($m['jns_mobil']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($m['transmisi']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($m['thn_buat']) ?>
                                        </td>

                                        <!-- Foto Mobil -->
                                        <td style="min-width:120px;">

                                            <?php
                                            foreach (
                                                ['ft_depan', 'ft_blkg', 'ft_interior']
                                                as $field
                                            ) :

                                                $namaFoto = $m[$field] ?? '';

                                                if ($namaFoto !== '') :

                                                    $urlFoto = base_url(
                                                        'img/' .
                                                        rawurlencode(
                                                            basename($namaFoto)
                                                        )
                                                    );
                                            ?>

                                                <img
                                                    src="<?= htmlspecialchars($urlFoto, ENT_QUOTES) ?>"
                                                    alt="Foto <?= htmlspecialchars($m['nm_mobil'], ENT_QUOTES) ?>"
                                                    class="foto-mobil"
                                                    data-foto="<?= htmlspecialchars($urlFoto, ENT_QUOTES) ?>"
                                                    data-nama="<?= htmlspecialchars($m['nm_mobil'], ENT_QUOTES) ?>"
                                                    style="
                                                        width:100px;
                                                        height:auto;
                                                        margin-bottom:5px;
                                                        border-radius:5px;
                                                        cursor:pointer;
                                                    "
                                                    title="Klik untuk memperbesar">

                                                <br>

                                            <?php
                                                endif;
                                            endforeach;
                                            ?>

                                        </td>

                                        <!-- Biaya Perhari -->
                                        <td>
                                            Rp <?= number_format(
                                                (float) $m['hrg_hari'],
                                                0,
                                                ',',
                                                '.'
                                            ) ?>
                                        </td>

                                        <!-- Catatan -->
                                        <td>
                                            <?= htmlspecialchars(
                                                $m['cttn_unit'] ?? ''
                                            ) ?>
                                        </td>

                                        <!-- Status -->
                                        <td>
                                            <?= htmlspecialchars($m['status_unit']) ?>
                                        </td>

                                        <!-- Tombol Aksi -->
                                        <td style="min-width:100px;">

                                            <!-- Edit -->
                                            <a
                                                href="<?= base_url(
                                                    '?url=Mobil_C/edit_mobil&no_plat=' .
                                                    urlencode($m['no_plat'])
                                                ) ?>"
                                                class="btn btn-warning btn-sm mb-1">

                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>

                                            <!-- Hapus -->
                                            <form
                                                action="<?= base_url('?url=Mobil_C/hapus_mobil') ?>"
                                                method="post"
                                                style="display:inline;"
                                                onsubmit="return confirm('Yakin ingin menghapus data mobil <?= htmlspecialchars($m['no_plat'], ENT_QUOTES) ?>? Data yang dihapus tidak dapat dikembalikan.');">

                                                <input
                                                    type="hidden"
                                                    name="no_plat"
                                                    value="<?= htmlspecialchars(
                                                        $m['no_plat'],
                                                        ENT_QUOTES
                                                    ) ?>">

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm mb-1">

                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else : ?>

                                <tr>
                                    <td colspan="12" class="text-center">
                                        Data mobil belum tersedia.
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


<!-- Modal Preview Foto Mobil -->
<div class="modal fade"
     id="modalFotoMobil"
     tabindex="-1"
     role="dialog"
     aria-labelledby="judulFotoMobil"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg"
         role="document">

        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="judulFotoMobil">
                    Foto Mobil
                </h5>

                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Tutup">

                    <span aria-hidden="true">&times;</span>

                </button>
            </div>

            <!-- Isi Modal -->
            <div class="modal-body text-center">

                <img
                    id="gambarBesarMobil"
                    src=""
                    alt="Foto Mobil"
                    class="img-fluid"
                    style="
                        max-width:100%;
                        max-height:75vh;
                        object-fit:contain;
                    ">

            </div>

        </div>
    </div>
</div>


<!-- JavaScript Foto Mobil -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const semuaFoto = document.querySelectorAll('.foto-mobil');

    semuaFoto.forEach(function (foto) {

        foto.addEventListener('click', function () {

            const gambarBesar =
                document.getElementById('gambarBesarMobil');

            const judulFoto =
                document.getElementById('judulFotoMobil');

            gambarBesar.src = this.dataset.foto;
            gambarBesar.alt = 'Foto ' + this.dataset.nama;

            judulFoto.textContent =
                'Foto ' + this.dataset.nama;

            $('#modalFotoMobil').modal('show');

        });

    });

});
</script>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>