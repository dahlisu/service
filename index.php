<?php
$koneksi = mysqli_connect("localhost", "root", "", "servis");
if (!$koneksi) die("Koneksi gagal: " . mysqli_connect_error());

$edit_mode = false;
$edit_data = null;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_mode = true;

    $get_data = mysqli_query($koneksi, "SELECT * FROM kendaraan1 WHERE id='$id'");
    $edit_data = mysqli_fetch_assoc($get_data);
}

if (isset($_POST['simpan'])) {
    $merk = $_POST['merk'];
    $tahun_pembuatan = $_POST['tahun_pembuatan'];
    $pemilik = $_POST['pemilik'];
    $email = $_POST['email'];
    $plat = $_POST['plat'];
    $akhir_pajak = $_POST['akhir_pajak'];
    $akhir_plat = $_POST['akhir_plat'];
    $akhir_kir = $_POST['akhir_kir'];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $update = mysqli_query($koneksi, "UPDATE kendaraan1 SET
            merk='$merk',
            tahun_pembuatan='$tahun_pembuatan',
            pemilik='$pemilik',
            email='$email',
            plat='$plat',
            akhir_pajak='$akhir_pajak',
            akhir_plat='$akhir_plat',
            akhir_kir='$akhir_kir'
            WHERE id='$id'
        ");

        echo $update ? "<script>alert('Data berhasil diupdate'); window.location.href='';</script>"
                     : "<script>alert('Gagal update data');</script>";
    } else {
        $simpan = mysqli_query($koneksi, "INSERT INTO kendaraan1 
            (merk, tahun_pembuatan, pemilik, email, plat, akhir_pajak, akhir_plat, akhir_kir) 
            VALUES 
            ('$merk', '$tahun_pembuatan', '$pemilik', '$email', '$plat', '$akhir_pajak', '$akhir_plat', '$akhir_kir')");

        echo $simpan ? "<script>alert('Data berhasil ditambahkan'); window.location.href='';</script>"
                     : "<script>alert('Gagal menambahkan data');</script>";
    }
}

$total_query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kendaraan1");
$total_data = mysqli_fetch_assoc($total_query);
$total_kendaraan = $total_data['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kendaraan - PT. TASHA INDONESIA</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #eef2f7; margin: 0; padding: 0; }
        header { background-color: #003366; color: white; padding: 20px; text-align: center; }
        .dashboard { padding: 30px; }
        .card { background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 30px; text-align: center; }
        .card h3 { margin: 0; font-size: 20px; color: #666; }
        .card h1 { margin: 10px 0; font-size: 40px; color: #003366; }
        table { width: 100%; border-collapse: collapse; background-color: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        th, td { padding: 12px 10px; text-align: center; border-bottom: 1px solid #ddd; }
        th { background-color: #003366; color: white; }
        tr:hover { background-color: #f1f1f1; }
        form { background: white; padding: 20px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        input, select { width: 100%; padding: 10px; margin: 8px 0 20px; border: 1px solid #ccc; border-radius: 5px; }
        button { background-color: #003366; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #20eeddff; }
        a.edit-link { color: #007BFF; text-decoration: none; }
    </style>
</head>
<body>
<header>
    <h1>Dashboard Kendaraan</h1>
    <h2>PT. TASHA INDONESIA</h2>
</header>

<div class="dashboard">
    <div class="card">
        <h3>Total Kendaraan Terdaftar</h3>
        <h1><?= $total_kendaraan ?></h1>
    </div>

    <form method="POST">
        <h2><?= $edit_mode ? 'Form Edit Kendaraan' : 'Form Tambah Kendaraan' ?></h2>

        <?php if ($edit_mode): ?>
            <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
        <?php endif; ?>

        <label>Merk Kendaraan</label>
        <input type="text" name="merk" value="<?= $edit_mode ? $edit_data['merk'] : '' ?>" required>

        <label>Tahun Pembuatan</label>
        <input type="number" name="tahun_pembuatan" value="<?= $edit_mode ? $edit_data['tahun_pembuatan'] : '' ?>" required>

        <label>Pemilik</label>
        <input type="text" name="pemilik" value="<?= $edit_mode ? $edit_data['pemilik'] : '' ?>" required>

        <label>Email Pemilik (Digunakan untuk WA)</label>
        <input type="email" name="email" value="<?= $edit_mode ? $edit_data['email'] : '' ?>" required>

        <label>Plat Nomor</label>
        <input type="text" name="plat" value="<?= $edit_mode ? $edit_data['plat'] : '' ?>" required>

        <label>Tanggal Akhir Pajak</label>
        <input type="date" name="akhir_pajak" value="<?= $edit_mode ? $edit_data['akhir_pajak'] : '' ?>">

        <label>Tanggal Akhir Plat</label>
        <input type="date" name="akhir_plat" value="<?= $edit_mode ? $edit_data['akhir_plat'] : '' ?>">

        <label>Tanggal Akhir KIR</label>
        <input type="date" name="akhir_kir" value="<?= $edit_mode ? $edit_data['akhir_kir'] : '' ?>">

        <button type="submit" name="simpan"><?= $edit_mode ? 'Update' : 'Simpan Data' ?></button>
    </form>

    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Merk</th>
            <th>Tahun</th>
            <th>Pemilik</th>
            <th>Email</th>
            <th>Plat</th>
            <th>Akhir Pajak</th>
            <th>Akhir Plat</th>
            <th>Akhir KIR</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $hari_ini = date("Y-m-d");
        $wa_links = [];

        $query = mysqli_query($koneksi, "SELECT * FROM kendaraan1 ORDER BY id ASC");
        while ($data = mysqli_fetch_array($query)) {
            $pesan = "";

            if ($data['akhir_pajak'] <= $hari_ini || $data['akhir_plat'] <= $hari_ini || $data['akhir_kir'] <= $hari_ini) {
                $pesan .= "Halo {$data['pemilik']},\n";
                $pesan .= "Kendaraan Anda dengan plat *{$data['plat']}*:\n";

                if ($data['akhir_pajak'] <= $hari_ini) {
                    $pesan .= "- Pajak sudah jatuh tempo (akhir: {$data['akhir_pajak']})\n";
                }
                if ($data['akhir_plat'] <= $hari_ini) {
                    $pesan .= "- Plat sudah jatuh tempo (akhir: {$data['akhir_plat']})\n";
                }
                if ($data['akhir_kir'] <= $hari_ini) {
                    $pesan .= "- KIR sudah jatuh tempo (akhir: {$data['akhir_kir']})\n";
                }

                $pesan .= "\nHarap segera diperbarui ya.\nTerima kasih!";
                $wa_links[] = "https://wa.me/?text=" . urlencode($pesan);
            }

            echo "<tr>
                <td>$no</td>
                <td>{$data['merk']}</td>
                <td>{$data['tahun_pembuatan']}</td>
                <td>{$data['pemilik']}</td>
                <td>{$data['email']}</td>
                <td>{$data['plat']}</td>
                <td>{$data['akhir_pajak']}</td>
                <td>{$data['akhir_plat']}</td>
                <td>{$data['akhir_kir']}</td>
                <td><a class='edit-link' href='?edit={$data['id']}'>Edit</a></td>
            </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>
</div>

<script>
    const reminderLinks = <?= json_encode($wa_links) ?>;
    if (reminderLinks.length > 0) {
        if (confirm("Ada kendaraan yang jatuh tempo. Kirim pengingat lewat WhatsApp?")) {
            reminderLinks.forEach(link => {
                window.open(link, '_blank');
            });
        }
    }
</script>
</body>
</html>
