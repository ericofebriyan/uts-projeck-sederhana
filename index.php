<?php
$jadwalfile ='data.json';
$jadwaldata =file_exists(filename:$jadwalfile) ? json_decode(json :file_get_contents(filename: $jadwalfile), associative: true):[];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ( isset($_POST['hari']) && isset($_POST['jam']) && isset($_POST['kegiatan'])) {
        $newjadwal =[
        'hari' => $_POST['hari'],
        'jam' => $_POST['jam'],
        'kegiatan' => $_POST['kegiatan']
    ];
    $jadwaldata[] = $newjadwal;
    file_put_contents(filename: $jadwalfile, data: json_encode(value: $jadwaldata, flags: JSON_PRETTY_PRINT));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jadwal kegiatan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>jadwal kegiatan</h1>

        <form id="formjadwal" method ="POST">
            <input type="text" name="hari" id="hari"placeholder="hari" required>
            <input type="text" name="jam" id="jam"placeholder="jam" required>
            <input type="text" name="kegiatan" id="kegiatan"placeholder="kegiatan" required>
             <button type="submit">tambah jadwal</button>
        </form>
        <h2>daftar jadwal</h2>
        <table id="jadwaltable">
            <thead>
                <tr>
                    <th>hari</th>
                    <th>jam</th>
                    <th>kegiatan</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jadwaldata as $index => $jadwal): ?>
                    <tr>
                        <td><?= htmlspecialchars ( string: $jadwal['hari']) ?></td>
                        <td><?= htmlspecialchars ( string: $jadwal['jam']) ?></td>
                        <td><?= htmlspecialchars ( string: $jadwal['kegiatan']) ?></td>
                        <td><button class="deletBtn" data-index="<? $index ?>">hapus</button></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script scr="script.js"></script>
</body>
</html>