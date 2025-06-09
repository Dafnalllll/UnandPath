<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://img.icons8.com/ios-filled/50/000000/book.png" type="image/png" />
    <link rel="stylesheet" href="css/persetujuanadmin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <title>Unand Path | Persetujuan Admin</title>
</head>
<body>
    <!-- Tombol Toggle Sidebar -->
  <button class="toggle-btn" id="toggleSidebarBtn">
    <i class="fas fa-bars"></i>
  </button>

  <div class="dashboard">
    <!-- Tambahkan class 'closed' agar sidebar tertutup saat awal -->
    <aside class="sidebar closed" id="sidebar">
      <h2>UnandPath</h2>
      <ul>
        <li><a href="/dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="/akademik"><i class="fas fa-graduation-cap"></i> Kegiatan Akademik</a></li>
        <li><a href="/nonakademik"><i class="fas fa-basketball-ball"></i> Kegiatan Non-Akademik</a></li>
        <li><a href="/laporanskpi"><i class="fas fa-file-alt"></i> Laporan SKPI</a></li>
        <li><a href="/persetujuanadmin"><i class="fas fa-user-check"></i> Persetujuan Admin</a></li>
      </ul>
    </aside>

    <main class="main-content expanded" id="mainContent">
        <div class="profile">👤 Mahasiswa</div>
        <h3>Informasi Mahasiswa</h3>
        <table class="info-table" id="tabelMahasiswa">
            <thead>
              <tr>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody id="dataMahasiswa">
              <tr>
                <td>Kegiatan Akademik</td>
                <td>Mengikuti 22 SKS pada Semester Genap 2024/2025</td>
              </tr>
              <tr>
                <td>Kegiatan Non-Akademik</td>
                <td>Aktif di UKM Robotika dan BEM Fakultas</td>
              </tr>
            </tbody>
          </table>
    </main>
  </div>
    <script src="js/persetujuanadmin.js"></script>
</body>
</html>