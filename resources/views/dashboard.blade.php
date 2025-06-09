<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <link rel="icon" href="https://img.icons8.com/ios-filled/50/000000/book.png" type="image/png" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="css/dashboard.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <title>UnandPath | Dashboard</title>
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

    <!-- Tambahkan class 'expanded' agar main-content tidak terdorong -->
    <main class="main-content expanded" id="mainContent">
      <div class="profile">👤 Mahasiswa</div>
      <section class="cards">
        <div class="card">
          <h3>Kegiatan Akademik</h3>
          <p>kegiatan</p>
        </div>
        <div class="card">
          <h3>Kegiatan Non-Akademik</h3>
          <p>kegiatan</p>
        </div>
        <div class="card">
          <h3>Progress SKPI</h3>
          <div class="progress-bar">
            <div class="progress" style="width: 60%;"></div>
          </div>
          <p>% lengkap</p>
        </div>
      </section>

      <section class="activity-log">
        <h2>Aktivitas Terbaru</h2>
        <ul>
          <li>✅ Seminar Nasional - disetujui</li>
          <li>🕒 Magang di PT XYZ - menunggu verifikasi</li>
          <li>✅ Lomba UI/UX - disetujui</li>
        </ul>
      </section>

      <button class="add-button">+ Tambah Kegiatan</button>
    </main>
  </div>

  <script src="js/dashboard.js"></script>
</body>
</html>
