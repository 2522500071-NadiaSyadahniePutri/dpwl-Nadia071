<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <h2>Daftar Mahasiswa</h2>

    <table>
        <tr>
            <th>NO.</th>
            <th>NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>ALAMAT</th>
            <th>NO. TELP</th>
        </tr>

        <?php
        $i = 1;
        foreach ($datamhs as $mhs) {
        ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $mhs['nim']; ?></td>
                <td><?= $mhs['nama']; ?></td>
                <td><?= $mhs['alamat']; ?></td>
                <td><?= $mhs['no_telp']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>
</html>