<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // role: admin or mahasiswa

    if ($role == 'admin') {
        // Query untuk mencari admin berdasarkan username dan password
        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            header("Location: admin/dashboardAdmin.php");
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    } elseif ($role == 'mahasiswa') {
        // Query untuk mencari mahasiswa berdasarkan username dan password
        $query = "SELECT * FROM loginmhs where username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'mahasiswa';
            $_SESSION['id'] = $row['id'];
            $_SESSION['idMahasiswa'] = $row['idMahasiswa'];
            header("Location: mahasiswa/dashboardMhs.php");
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    }
}
?>