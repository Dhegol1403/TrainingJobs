<?php
session_start();
include '../config/database.php';

if ($_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>

<!-- div konten dashboard-->
<div class="dashboard-content">
    <h1>Dashboard</h1>
    <p>Selamat datang, Admin! Berikut adalah ringkasan data:</p>
    <div class="dashboard-cards">
        <div class="card">
            <h2>150</h2>
            <p>Pengguna Aktif</p>
        </div>
        <div class="card">
            <h2>320</h2>
            <p>Total Soal</p>
        </div>
        <div class="card">
            <h2>95%</h2>
            <p>Tingkat Kelulusan</p>
        </div>
        <div class="card">
            <h2>25</h2>
            <p>Sesi Ujian Berlangsung</p>
        </div>
    </div>
    <div class="dashboard-chart">
        <h2>Statistik Ujian</h2>
        <canvas id="examChart"></canvas>
    </div>
    <div class="dashboard-actions">
        <button onclick="location.href='add_question.php'">Tambah Soal</button>
        <button onclick="location.href='view_results.php'">Lihat Hasil</button>
    </div>
</div>
<canvas id="examChart" width="800" height="400"></canvas>


<!--div tutup di sini-->

        </div>
    </div>
    <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                    <span class="icon"><img src="../img/logo-karawang.png" alt=""></span>
                    <span class="title" style="font-size:20px; margin-top:10px;">DISNAKER</span>
                    </a>
                </li>
                <li>
                    <a href="admin_dashboard.php">
                        <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="add_question.php">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="title">Kumpulan Soal</span>
                    </a>
                </li>
                <li>
                    <a href="view_results.php">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="title">Hasil Jawaban</span>
                    </a>
                </li>
                <li>        
                    <a href="admin_setting.php">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Setting Ujian</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <script src="../js/main.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   const ctx = document.getElementById('examChart').getContext('2d');
const examChart = new Chart(ctx, {
    type: 'bar', // Tipe grafik: bar
    data: {
        labels: ['0-20', '21-40', '41-60', '61-80', '81-100'], // Rentang nilai
        datasets: [{
            label: 'Persentase Peserta',
            data: [5, 15, 30, 40, 10], // Persentase peserta di masing-masing rentang nilai
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)', // Warna untuk setiap rentang
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)', // Warna border
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            },
            tooltip: {
                enabled: true
            }
        },
        scales: {
            y: {
                beginAtZero: true, // Mulai sumbu Y dari 0
                ticks: {
                    stepSize: 10, // Interval di sumbu Y
                    max: 100 // Maksimum sumbu Y adalah 100% (persentase)
                }
            }
        }
    }
});

</script>

</body>
</html>
