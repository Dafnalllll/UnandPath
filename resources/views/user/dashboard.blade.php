<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <link rel="icon" href="https://img.icons8.com/ios-filled/50/000000/book.png" type="image/png" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="/css/dashboard.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <title>UnandPath | Dashboard</title>
</head>
<body>

  <!-- Tombol Toggle Sidebar -->
  <button class="toggle-btn" id="toggleSidebarBtn">
    <i class="fas fa-bars"></i>
  </button>

  <div class="dashboard">
    <aside class="sidebar closed" id="sidebar">
      <h2>UnandPath</h2>
      <ul>
        <li><a href="/tambahkegiatan"><i class="fas fa-graduation-cap"></i> Tambah Kegiatan</a></li>
        <li><a href="/laporanskpi"><i class="fas fa-file-alt"></i> Laporan SKPI</a></li>
        <li><a href="/persetujuanadmin"><i class="fas fa-user-check"></i> Persetujuan</a></li>
        <li>
          <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="logout-button">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </aside>

    <main class="main-content expanded" id="mainContent">
      <div class="profile">👤 {{ Auth::user()->name ?? 'Mahasiswa' }}</div>

      <section class="cards">
        <div class="card">
          <h3>Kegiatan Akademik</h3>
          <p>{{ $akademikCount }} </p>
        </div>
        <div class="card">
          <h3>Kegiatan Non-Akademik</h3>
          <p>{{ $nonakademikCount }} </p>
        </div>
      </section>

      <section class="activity-log">
        <h2>Aktivitas Terbaru</h2>
        <ul>
            @forelse ($activities as $activity)
                <li>
                    {{ $activity->status === 'disetujui' ? '✅' : '🕒' }}
                    {{ $activity->title }} - {{ $activity->status }}
                </li>
            @empty
                <li>Tidak ada aktivitas terbaru.</li>
            @endforelse
        </ul>
    </section>
    

      <button id="addKegiatanBtn" class="add-button">+ Tambah Kegiatan</button>
    </main>
  </div>

  <!-- Pisah file JS -->
  <script src="/js/dashboard.js"></script>
</body>
</html>
