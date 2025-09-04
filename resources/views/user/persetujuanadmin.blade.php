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
        <li><a href="/tambahkegiatan"><i class="fas fa-graduation-cap"></i> Tambah Kegiatan</a></li>
        <li><a href="/laporanskpi"><i class="fas fa-file-alt"></i> Laporan SKPI</a></li>
        <li><a href="/persetujuanadmin" class="active"><i class="fas fa-user-check"></i> Persetujuan</a></li>
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

      <h3>Informasi Mahasiswa</h3>
      <table class="info-table">
          <thead>
              <tr>
                  <th>Kategori</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
                  <th>Tanggal</th>
                  <th>Status</th> {{-- ✅ Kolom status --}}
              </tr>
          </thead>
          <tbody>
              @foreach ($activities as $index => $activity)
                  <tr>
                      <td>{{ $activity->category->name ?? '-' }}</td>
                      <td>{{ $activity->title }}</td>
                      <td>{{ $activity->description }}</td>
                      <td>{{ \Carbon\Carbon::parse($activity->date)->format('d-m-Y') }}</td>
                      <td>{{ ucfirst($activity->status) }}</td> {{-- ✅ Menampilkan status --}}
                  </tr>
              @endforeach
          </tbody>
      </table>
      
    </main>
  </div>
    <script src="js/persetujuanadmin.js"></script>
</body>
</html>