<?php
session_start();
include 'koneksi.php';

// Cek session atau cookie
if (!isset($_SESSION['username'])) {
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        $username = $_COOKIE['username'];
        $password = $_COOKIE['password'];

        $query = mysqli_query($conn, "SELECT * FROM tabel_akun2 WHERE username='$username' AND password='$password'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $data['username'];
            $_SESSION['nim'] = $data['nim'];
        } else {
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }
}

$username = $_SESSION['username'];
$nim = $_SESSION['nim'];

// Ambil data mahasiswa
$query = mysqli_query($conn, "SELECT * FROM tabel_mahasiswa2 WHERE NIM='$nim'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .ipk-hijau { color: white; background-color: green; padding: 5px 10px; border-radius: 5px; }
        .ipk-biru { color: white; background-color: blue; padding: 5px 10px; border-radius: 5px; }
        .ipk-merah { color: white; background-color: crimson; padding: 5px 10px; border-radius: 5px; }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Dashboard Mahasiswa</h2>

    <div class="card shadow p-4">
        <h4 class="mb-3">Selamat datang, <?php echo ucfirst($username); ?>!</h4>

        <?php if ($data) { ?>
        <table class="table table-bordered">
            <tr><th>NIM</th><td><?php echo $data['nim']; ?></td></tr>
            <tr><th>Nama</th><td><?php echo $data['nama']; ?></td></tr>
            <tr><th>Program Studi</th><td><?php echo $data['prodi']; ?></td></tr>
            <tr><th>Angkatan</th><td><?php echo $data['angkatan']; ?></td></tr>
            <tr><th>Alamat</th><td><?php echo $data['alamat']; ?></td></tr>
            <tr><th>Semester</th><td><?php echo $data['semester']; ?></td></tr>
            <tr>
                <th>IPK</th>
                <td>
                    <?php
                    $ipk = $data['ipk'];
                    if ($ipk >= 3.50) echo "<span class='ipk-hijau'>$ipk</span>";
                    elseif ($ipk >= 3.00) echo "<span class='ipk-biru'>$ipk</span>";
                    else echo "<span class='ipk-merah'>$ipk</span>";
                    ?>
                </td>
            </tr>
        </table>
        <?php } else { echo "<p class='text-danger'>Data mahasiswa tidak ditemukan!</p>"; } ?>

        <div class="text-end">
            <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
        </div>
    </div>
</div>

</body>
</html>
