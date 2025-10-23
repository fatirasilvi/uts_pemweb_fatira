<?php
session_start();
include 'koneksi.php';

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Jika cookie aktif, login otomatis
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];

    $query = mysqli_query($conn, "SELECT * FROM tabel_akun2 WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $data['username'];
        $_SESSION['nim'] = $data['nim'];
        header("Location: dashboard.php");
        exit();
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $remember = isset($_POST['remember']);

    // Hapus cookie lama
    setcookie('username', '', time() - 3600, '/');
    setcookie('password', '', time() - 3600, '/');

    $query = mysqli_query($conn, "SELECT * FROM tabel_akun2 WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        $_SESSION['username'] = $data['username'];
        $_SESSION['nim'] = $data['nim'];

        if ($remember) {
            setcookie('username', $data['username'], time() + 60, '/'); // 1 menit
            setcookie('password', $data['password'], time() + 60, '/');
        }

        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4 fw-bold">Login Mahasiswa</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember me (1 menit)</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
